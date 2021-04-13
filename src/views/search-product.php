<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Controle de Estoque - Pesquisa</title>
</head>

<body>
    <div class="container">
        <h3 class="text-center">Controle de Estoque <br> Pesquisa de Produto</h3>
        <form action="./search-product-view.php" method="post" class="form-control">
            <div class="row">
                <div class="input-group mb-3">
                    <select class="form-select form-select-sm col-sm-3" aria-label=".form-select-sm example" name="search_args">
                        <option selected>Qual o argumento da sua busca?</option>
                        <option value="1">Código do produto</option>
                        <option value="2">Nome do fornecedor</option>
                    </select>
                    <input type="text" class="form-control col-8" name="arg_value" id="arg_value">
                </div>
            </div>
            <div class="row">
                <input type="submit" value="Pesquisar" class="btn btn-secondary">
            </div>
        </form>
    </div>
</body>

</html>