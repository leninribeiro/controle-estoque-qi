<?php

require_once('../models/user.php');

$username = isset($_POST['username']) ? $_POST['username'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;

if (empty($username) || empty($password) || empty($email)) {
    echo "Preencha todos os campos!";
    exit;
}

$user = new User($username, $password, $email);

$user->save();
