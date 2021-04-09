<?php
require_once('../models/provider.php');

$name = isset($_POST['name']) ? $_POST['name'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$telephone = isset($_POST['telephone']) ? $_POST['telephone'] : null;
$street = isset($_POST['street']) ? $_POST['street'] : null;
$adr_number = isset($_POST['adr_number']) ? $_POST['adr_number'] : null;
$city = isset($_POST['city']) ? $_POST['city'] : null;
$state = isset($_POST['state']) ? $_POST['state'] : null;
$cep = isset($_POST['cep']) ? $_POST['cep'] : null;

if (
    empty($name) || empty($email) || empty($telephone) || empty($street) ||
    empty($adr_number) || empty($city) || empty($state) || empty($cep)
) {
    echo "Preencha todos os campos!";
    exit;
};

$provider = new Provider($name, $email, $telephone, $street, $adr_number, $city, $state, $cep);

$provider->save();
