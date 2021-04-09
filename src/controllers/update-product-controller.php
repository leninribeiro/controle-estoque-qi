<?php
require_once('../models/product.php');

$id = isset($_POST['id']) ? $_POST['id'] : null;
$brand = isset($_POST['brand']) ? $_POST['brand'] : null;
$model = isset($_POST['model']) ? $_POST['model'] : null;
$color = isset($_POST['color']) ? $_POST['color'] : null;
$price = isset($_POST['price']) ? $_POST['price'] : null;
$provider_id = isset($_POST['provider_id']) ? $_POST['provider_id'] : null;
$manufactured_at = isset($_POST['manufactured_at']) ? $_POST['manufactured_at'] : null;

if (empty($id) || empty($brand) || empty($model) || empty($color) || empty($price) || empty($provider_id) || empty($manufactured_at)) {
    echo "É preciso preencher todos os campos do formulário de cadastro!";
    exit;
}

$product = new Product($id, $brand, $model, $color, $price, $provider_id, $manufactured_at);
$product->update();