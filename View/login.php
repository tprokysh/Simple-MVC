<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Style/style.css">
    <title>Document</title>
</head>
<body>
    <div class="login">
        <?php $this->login(); ?>
        <h1>Login</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <input placeholder="Login" type="text" name="userLogin" autofocus><br><br>
            <input placeholder="Password" type="password" name="password"><br><br>
            <input type="submit" value="Login" name="login">
        </form>
        <h3>Or</h3>
        <div class="toReg">
            <a href="register">Register</a>
        </div>
    </div>
</body>
</html>
