<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Controle de Estoque - Novo produto</title>
</head>

<body>
    <div class="container container-sm col-6">
        <h3 class="text-center">
            Controle de Estoque <br> Cadastro de Produto
        </h3>
        <form action="../controllers/create-product.php" method="POST" class="form-control">
            <div class="input-group mb-3">
                <span class="input-group-text">Marca: </span>
                <input type="text" class="form-control" name="brand" id="brand">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Modelo: </span>
                <input type="text" class="form-control" name="model" id="model">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Cor: </span>
                <input type="text" class="form-control" name="color" id="color">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Preco: </span>
                <input type="text" class="form-control" name="price" id="price">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Codigo de fornecedor: </span>
                <input type="text" class="form-control" name="provider_id" id="provider_id">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Data de fabricação: </span>
                <input type="text" class="form-control" name="manufactured_at" id="manufactured_at">
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