<?php
$password = "admin";
$passwordHash = password_hash($password , PASSWORD_DEFAULT);
echo $passwordHash . "\n";