<?php


namespace Model;


class UserModel
{
    public function auth() {
        if (isset($_POST['login']) && !empty($_POST['login'])) {
            include "database.php";
            $login = strip_tags($_POST['userLogin']);
            $password = strip_tags($_POST['password']);
            $login = pg_escape_string($db, $login);
            $password = pg_escape_string($db, $password);
            $sql = "SELECT * FROM users WHERE login='$login' LIMIT 1";
            $query = pg_query($db, $sql);
            $row = pg_fetch_array($query);
            $id = $row['id'];
            $password_hash = $row['password'];
            if (password_verify($password, $password_hash)) {
                $_SESSION['login'] = $login;
                $_SESSION['id'] = $id;
                echo $_SESSION['id'];
                header("Location: .");
            } else {
                echo "<p>You didn't enter the correct password</p>";
            }
        }
    }

    public function register() {
        include "database.php";
        if (isset($_POST['register']) && !empty($_POST['register'])) {
            $login = strip_tags($_POST['login']);
            $password = strip_tags($_POST['password']);
            $passwordConfirm = strip_tags($_POST['passwordConfirm']);
            $mail = strip_tags($_POST['mail']);
            $login = pg_escape_string($db, $login);
            $password = pg_escape_string($db, $password);
            $passwordConfirm = pg_escape_string($db, $passwordConfirm);
            $mail = pg_escape_string($db, $mail);
            if ($password != $passwordConfirm) {
                echo 'The passwords don\'t match';
                return;
            }
            $password = password_hash($password, PASSWORD_DEFAULT);
            $passwordConfirm = password_hash($passwordConfirm, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users(login, password, mail) VALUES('$login', '$password', '$mail')";
            $sqlLogin = "SELECT login FROM users WHERE login = '$login'";
            $sqlMail = "SELECT mail FROM users WHERE mail = '$mail'";
            $sqlLoginCheck = pg_query($db, $sqlLogin);
            $sqlMailCheck = pg_query($db, $sqlMail);
            if ($login == '' || $password == '' || $passwordConfirm == '' || $mail == '') {
                echo "Please fill the form";
                return;
            }
            if ($login == '') {
                echo 'Please insert a login';
                return;
            }
            if ($password == '' || $passwordConfirm == '') {
                echo 'Please insert a password';
                return;
            }
            if (pg_num_rows($sqlLoginCheck)) {
                echo 'There is a user with this login';
                return;
            }
            if (!filter_var($mail, FILTER_VALIDATE_EMAIL) || $mail == '') {
                echo 'This mail isn\'t valid';
                return;
            }
            if (pg_num_rows($sqlMailCheck)) {
                echo 'This mail is already use';
                return;
            }
            echo pg_query($db, $sql);
            header("Location: login");
        }
    }
}