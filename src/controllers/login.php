<?php
require_once('../models/user.php');
$username = isset($_POST['username']) ? $_POST['username'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

if (empty($username) || empty($password)) {
    echo "Preencha todos os campos!";
    exit;
}

$user = new User($username, $password);

$user->login();
