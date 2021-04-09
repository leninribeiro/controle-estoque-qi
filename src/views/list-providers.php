<?php
require_once('../models/provider.php');
$prov = new Provider();
$providerList = $prov->listAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Controle de Estoque - Fornecedores</title>
</head>

<body>
    <div class="container">
        <h3 class="text-center"> Controle de Estoque <br> Lista de Fornecedores</h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Rua</th>
                    <th scope="col">Número</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                    <th scope="col">CEP</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($providerList as $provider) { ?>
                    <tr>
                        <th scope="row"><?php echo $provider['provider_id'] ?></th>
                        <td><?php echo $provider['name'] ?></td>
                        <td><?php echo $provider['telephone'] ?></td>
                        <td><?php echo $provider['street'] ?></td>
                        <td><?php echo $provider['adr_number'] ?></td>
                        <td><?php echo $provider['city'] ?></td>
                        <td><?php echo $provider['state'] ?></td>
                        <td><?php echo $provider['cep'] ?></td>
                        <td><?php echo $provider['email'] ?></td>
                        <td>
                            <div class="row">
                                <a class="btn btn-secondary mb-2" href="../views/update-provider.php?id=<?php echo $provider['provider_id'] ?>">Alterar</a>
                            </div>
                            <div class="row">
                                <a class="btn btn-secondary" href="../controllers/delete-provider.php?id=<?php echo $provider['provider_id'] ?>" onclick="return confirm('Tem certeza que deseja excluir o registro?');">Excluir</a>
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