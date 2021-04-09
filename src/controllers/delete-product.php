<?php
require_once('../models/product.php');

$id = isset($_GET['id']) ? $_GET['id'] : null;

if (empty($id)) {
    echo "ID do produto não informado para exclusão.";
    exit;
}

$product = new Product($id);
$product->delete();