<?php
require_once('../models/product.php');

session_start();

if (!isset($_SESSION['username'])) {
    header('location:/controle-estoque-qi/');
}


$search_arg = isset($_POST['search_args']) ? $_POST['search_args'] : null;
$arg_value = isset($_POST['arg_value']) ? $_POST['arg_value'] : null;

if (empty($search_arg) || empty($arg_value)) {
    echo "Preencha todos os campos do formulário!";
    exit;
}

$p = new Product();
switch ($search_arg) {
    case 1:
        $productList = $p->getByID($arg_value);
        break;
    case 2:
        $productList = $p->getByProviderName($arg_value);
        break;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Controle de Estoque - Produtos</title>
</head>

<body>
    <div class="container">
        <h3 class="text-center"> Controle de Estoque <br> Lista de Produtos</h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Cor</th>
                    <th scope="col">Preco</th>
                    <th scope="col">Fabricado em</th>
                    <th scope="col">Registrado em</th>
                    <th scope="col">Nome Fornecedor</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productList as $product) { ?>
                    <tr>
                        <th scope="row"><?php echo $product['id'] ?></th>
                        <td><?php echo $product['brand'] ?></td>
                        <td><?php echo $product['model'] ?></td>
                        <td><?php echo $product['color'] ?></td>
                        <td><?php echo $product['price'] ?></td>
                        <td><?php echo $product['manufactured_at'] ?></td>
                        <td><?php echo date("d/m/Y h:m:s", strtotime($product['created_at'])) ?></td>
                        <td><?php echo $product['name'] ?></td>
                        <td>
                            <div class="row">
                                <a class="btn btn-secondary mb-2" href="../views/update-product.php?id=<?php echo $product['id'] ?>">Alterar</a>
                            </div>
                            <div class="row">
                                <a class="btn btn-secondary" href="../controllers/delete-product.php?id=<?php echo $product['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir o registro?');">Excluir</a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a class="btn btn-dark" href="./dashboard.php">Voltar</a>
    </div>
</body>

</html>