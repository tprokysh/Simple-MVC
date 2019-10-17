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
    <div class="reg">
        <?php $this->reg(); ?>
        <h1>Registration</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <input placeholder="Login" type="text" name="login" autofocus><br><br>
            <input placeholder="Password" type="password" name="password"><br><br>
            <input placeholder="Confirm password" type="password" name="passwordConfirm"><br><br>
            <input placeholder="E-mail" type="text" name="mail"><br><br>
            <input type="submit" value="Register" name="register">
        </form>
    </div>
</body>
</html>
