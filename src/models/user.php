<?php
require_once('connection.php');
session_start();

class User
{
    private $username;
    private $password;
    private $email;

    function __construct($username, $password, $email = "")
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }


    function login()
    {
        $conn = db_connection();
        $sql = 'SELECT username, password FROM users WHERE username= :username AND password= :password';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);
        $stmt->execute();
        if ($stmt->fetch()) {
            $_SESSION['username'] = $this->username;
            header('location:/controle-estoque-qi/src/views/dashboard.php');
        } else {
            unset($_SESSION['username']);
            echo "Nenhum usuário localizado com essa combinação de usuário/senha.";
        }
    }

    function save()
    {
        $conn = db_connection();
        $sql = 'INSERT INTO `users`(`username`, `password`, `email`) VALUES (:username, :password, :email)';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':email', $this->email);
        if ($stmt->execute()) {
            header('location:/controle-estoque-qi/index.html');
        } else {
            echo "Ocorreu um erro ao incluir este usuário.";
        }
    }
}
