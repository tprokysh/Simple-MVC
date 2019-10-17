<?php

namespace Model;

class PostModel
{
    public function getPosts() {
        include "database.php";
        $sql = 'SELECT * FROM posts ORDER BY id DESC';
        $result = pg_query($db, $sql)
        or die(pg_errormessage());
        $posts = "";
        if (pg_num_rows($result) > 0) {
            while ($row = pg_fetch_assoc($result)) {
                $id = $row['id'];
                $title = $row['title'];
                $content = $row['content'];
                $date = $row['date'];
                $user_id = $row['user_id'];
                if ((isset($_SESSION['login']) && !empty($_SESSION['id']) && $_SESSION['id'] == $user_id) ||
                    isset($_SESSION['login']) && $_SESSION['login'] == 'admin') {
                    $admin = "<div class='del'><a href='delpost?pid=$id'>Delete</a></div>&nbsp;<div class='edit'><a href='editpost?pid=$id'>Edit</a></div>";
                } else {
                    $admin = "";
                }
                $output = $content;
                $posts .= "<div class='post'><h2><a href='view_post.php?pid=$id'>$title</a></h2><h3>$date</h3><div class='content'><p>$output</p></div>$admin</div>";
            }
            return $posts;
        } else {
            return "There is 0 posts";
        }
    }

    public function addPost() {
        include "database.php";
        if (isset($_POST['post']) && !empty($_POST['post'])) {
            $title = strip_tags($_POST['title']);
            $content = strip_tags($_POST['content']);
            $title = pg_escape_string($db, $title);
            $content = pg_escape_string($db, $content);
            $date = date('l jS \of F Y h:i:s A');
            $user_id = $_SESSION['id'];
            if ($title == "" || $content == "") {
                return "Please complete your post";
            }
            $sql = "INSERT INTO posts(title, content, date, user_id) VALUES ('$title', '$content', '$date', '$user_id')";
            pg_query($db, $sql);
            header("Location: .");
        }
    }

    public function delPost() {
        include "database.php";
        $pid = $_GET['pid'];
        $sql = "DELETE FROM posts WHERE id = '$pid'";
        pg_query($db, $sql);
        header("Location: .");
    }

    public function editPost() {
        include "database.php";
        $pid = $_GET['pid'];
        if (isset($_POST['edit']) && !empty($_POST['edit'])) {
            $title = strip_tags($_POST['title']);
            $content = strip_tags($_POST['content']);
            $title = pg_escape_string($db, $title);
            $content = pg_escape_string($db, $content);
            $date = date('l jS \of F Y h:i:s A');
            if ($title == "" || $content == "") {
                echo "Please complete your post";
                return;
            }
            $sql = "UPDATE posts SET title = '$title', content = '$content', date = '$date' WHERE id = $pid";
            pg_query($db, $sql);
            header("Location: .");
        } else {
            $sql = "SELECT * FROM posts WHERE id='$pid' LIMIT 1";
            $query = pg_query($db, $sql);
            if (pg_num_rows($query) > 0) {
                while ($row = pg_fetch_assoc($query)) {
                    $title = $row['title'];
                    $content = $row['content'];
                }
            }
            return array('title' => $title, 'content' => $content);
        }
    }
}