<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog-Post</title>
</head>
<body>
<?php $res = $this->edit();?>
<form action="" method="post" enctype="multipart/form-data">
    <input placeholder="Title" type="text" name="title" autofocus size="48" value="<?php echo $res['title']; ?>"><br><br>
    <textarea placeholder="Content" name="content" cols="50" rows="20" ><?php echo $res['content']; ?></textarea><br><br>
    <input type="submit" name="edit" value="Edit">
</form>
</body>
</html>