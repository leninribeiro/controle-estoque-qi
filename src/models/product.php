<?php
require_once('connection.php');

class Product
{
    private $id;
    private $brand;
    private $model;
    private $color;
    private $price;
    private $provider_id;
    private $manufactured_at;

    function __construct($id = "", $brand = "", $model = "", $color = "", $price = "", $provider_id = "", $manufactured_at = "")
    {
        $this->id = $id;
        $this->brand = $brand;
        $this->model = $model;
        $this->color = $color;
        $this->price = $price;
        $this->provider_id = $provider_id;
        $this->manufactured_at = $manufactured_at;
    }

    function save()
    {
        $conn = db_connection();
        $sql = 'INSERT INTO `products`(`provider_id`, `brand`, `model`, `color`, `price`, `manufactured_at`) 
            VALUES (:provider_id, :brand, :model, :color, :price, :manufactured_at)';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':provider_id', $this->provider_id);
        $stmt->bindParam(':brand', $this->brand);
        $stmt->bindParam(':model', $this->model);
        $stmt->bindParam(':color', $this->color);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':manufactured_at', $this->manufactured_at);

        if ($stmt->execute()) {
            header('location:/controle-estoque-qi/src/views/dashboard.php');
        } else {
            echo "Ocorreu um erro ao adicionar este produto.";
        }
    }

    function update()
    {
        $PDO = db_connection();
        $stmt = $PDO->prepare("UPDATE products SET provider_id= :provider_id, brand= :brand, model= :model,
            color= :color, price= :price WHERE id=:id");
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        $stmt->bindParam(':provider_id', $this->provider_id, PDO::PARAM_INT);
        $stmt->bindParam(':brand', $this->brand);
        $stmt->bindParam(':model', $this->model);
        $stmt->bindParam(':color', $this->color);
        $stmt->bindParam(':price', $this->price);
        if ($stmt->execute()) {
            header("Location: index.php");
        } else {
            echo "Ocorreu um erro na alteração do produto";
            print_r($stmt->errorInfo());
        }
    }

    function delete()
    {
        $conn = db_connection();
        $sql = 'DELETE FROM products WHERE id = :id';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            header('location:../views/list-products.php');
        } else {
            echo "Ocorreu um erro ao exluir este produto.";
        }
    }

    function getByProviderName($provider_name) {
        $conn = db_connection();
        $sql = 'SELECT id,brand,model,color,price,manufactured_at,
            created_at,name,telephone,street,adr_number,city,state,cep 
            FROM products as p1 INNER JOIN providers as p2 
            ON p1.provider_id = p2.provider_id WHERE p2.name = :name
            ORDER BY id';

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":name", $provider_name);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getByID($id) {
        $conn = db_connection();
        $sql = "SELECT id,brand,model,color,price,manufactured_at,
        created_at,name,telephone,street,adr_number,city,state,cep 
        FROM products as p1 INNER JOIN providers as p2 
        ON p1.provider_id = p2.provider_id WHERE p1.id = :id 
        ORDER BY id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function get()
    {
        $conn = db_connection();
        $stmt = $conn->prepare("SELECT id,brand,model,color,price,provider_id,manufactured_at FROM products 
            WHERE id = :id");
        $stmt->bindParam(":id", $this->id, PDO::FETCH_ASSOC);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function listAll()
    {
        $conn = db_connection();
        $sql = 'SELECT id,brand,model,color,price,manufactured_at,
            created_at,name,telephone,street,adr_number,city,state,cep 
            FROM products as p1 INNER JOIN providers as p2 
            ON p1.provider_id = p2.provider_id 
            ORDER BY id';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
