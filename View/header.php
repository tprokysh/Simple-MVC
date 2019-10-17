<div class="header">
    <?php if (isset($_SESSION['id'])): ?>
        <a href='logout' class='logoutBtn'>Logout</a>
        <a href='addpost' class='createBtn'>Create</a>
        <h1>Hello, <?php echo $_SESSION['login']; ?></h1>
    <?php else: ?>
        <a href='register' class='registerBtn'>Register</a>
        <a href='login' class='loginBtn'>Login</a>
    <?php endif; ?>
</div>