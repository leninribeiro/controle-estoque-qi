<?php
require_once "../models/product.php";

session_start();

if (!isset($_SESSION['username'])) {
    header('location:/controle-estoque-qi/');
}


$id = isset($_GET['id']) ? $_GET['id'] : null;

if (empty($id)) {
    header('location:./dashboard.php');
    exit;
}

$product = new Product($id);
$productInfo = $product->get();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Controle de Estoque - Alterar Produto</title>
</head>

<body>
    <div class="container container-sm">
        <h3 class="text-center">
            Controle de Estoque <br> Alteração de Produto
        </h3>
        <form action="../controllers/update-product-controller.php" method="POST" class="form-control">
        <input type="hidden" name="id" value="<?= $id ?>">
            <div class="input-group mb-3">
                <span class="input-group-text">Marca: </span>
                <input type="text" class="form-control" name="brand" id="brand" value="<?= $productInfo['brand'] ?>">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Modelo: </span>
                <input type="text" class="form-control" name="model" id="model" value="<?= $productInfo['model'] ?>">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Cor: </span>
                <input type="text" class="form-control" name="color" id="color" value="<?= $productInfo['color'] ?>">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Preco: </span>
                <input type="text" class="form-control" name="price" id="price" value="<?= $productInfo['price'] ?>">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Codigo de fornecedor: </span>
                <input type="text" class="form-control" name="provider_id" id="provider_id" value="<?= $productInfo['provider_id'] ?>">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Data de fabricação: </span>
                <input type="text" class="form-control" name="manufactured_at" id="manufactured_at" value="<?= $productInfo['manufactured_at'] ?>">
            </div>
            <div class="btn-group" role="group">
                <input type="submit" class="btn btn-primary" value="Adicionar">
                <a href="/controle-estoque-qi/src/views/dashboard.php" class="btn btn-dark">Voltar</a>
            </div>
        </form>
    </div>
</body>

</html>