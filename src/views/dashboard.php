<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('location:/controle-estoque-qi/');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Controle de Estoque - Dashboard</title>
</head>

<body>
    <div class="container container-sm col-6">
        <h4 class="text-center">Bem-vindo, <?php echo $_SESSION['username'] ?></h4>
        <div class="row">
            <div class="col justify-content-center">
                <a href="./list-products.php" class="btn btn-secondary mb-3">Listar produtos</a><br>
                <a href="./list-providers.php" class="btn btn-secondary">Listar fornecedores</a>
            </div>
            <div class="col justify-content-center">
                <a href="./product-form.php" class="btn btn-secondary mb-3">Adicionar produto</a><br>
                <a href="./provider-form.php" class="btn btn-secondary">Adicionar fornecedor</a>
            </div>
        </div>
    </div>
</body>

</html>