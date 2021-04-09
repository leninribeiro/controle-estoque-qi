<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Controle de Estoque - Novo fornecedor</title>
</head>

<body>
    <div class="container container-sm col-6">
        <h3 class="text-center">
            Controle de Estoque <br> Cadastro de Fornecedor
        </h3>
        <form action="../controllers/create-provider.php" method="POST" class="form-control">
            <div class="input-group mb-3">
                <span class="input-group-text">Nome: </span>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">E-mail: </span>
                <input type="text" class="form-control" name="email" id="email">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Telefone: </span>
                <input type="text" class="form-control" name="telephone" id="telephone">
            </div>
            <hr>
            <div class="input-group mb-3">
                <span class="input-group-text">Logradouro: </span>
                <input type="text" class="form-control" name="street" id="street">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Numero: </span>
                <input type="text" class="form-control" name="adr_number" id="adr_number">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Cidade: </span>
                <input type="text" class="form-control" name="city" id="city">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Estado: </span>
                <input type="text" class="form-control" name="state" id="state">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">CEP: </span>
                <input type="text" class="form-control" name="cep" id="cep">
            </div>
            <br>
            <div class="btn-group" role="group">
                <input type="submit" class="btn btn-primary" value="Adicionar">
                <a href="/controle-estoque-qi/src/views/dashboard.php" class="btn btn-dark">Voltar</a>
            </div>
        </form>
    </div>
</body>

</html>