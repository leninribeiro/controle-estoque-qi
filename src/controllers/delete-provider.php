<?php
require_once('../models/provider.php');

$id = isset($_GET['id']) ? $_GET['id'] : null;

if (empty($id)) {
    echo "ID do fornecedor não informado para exclusão.";
    exit;
}

$provider = new Provider($id);
$provider->delete();