<?php
require_once('connection.php');

class Provider
{
    private $id;
    private $name;
    private $email;
    private $telephone;
    private $street;
    private $adr_number;
    private $city;
    private $state;
    private $cep;

    function __construct($id = '', $name = '', $email = '', $telephone = '', $street = '', $adr_number = '', $city = '', $state = '', $cep = '')
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->street = $street;
        $this->adr_number = $adr_number;
        $this->city = $city;
        $this->state = $state;
        $this->cep = $cep;
    }

    function save()
    {
        $conn = db_connection();
        $sql = 'INSERT INTO `providers`(`name`, `telephone`, `street`, `adr_number`, `city`, `state`, `cep`, `email`)
            VALUES (:name, :telephone, :street, :adr_number, :city, :state, :cep, :email)';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':telephone', $this->telephone);
        $stmt->bindParam(':street', $this->street);
        $stmt->bindParam(':adr_number', $this->adr_number);
        $stmt->bindParam(':city', $this->city);
        $stmt->bindParam(':state', $this->state);
        $stmt->bindParam(':cep', $this->cep);
        $stmt->bindParam(':email', $this->email);

        if ($stmt->execute()) {
            header('location:/controle-estoque-qi/src/views/dashboard.php');
            exit;
        } else {
            echo "Ocorreu um erro ao adicionar este fornecedor!";
        }
    }

    function update()
    {
        $PDO = db_connection();
        $stmt = $PDO->prepare("UPDATE providers SET name= :name, email= :email,
            telephone= :telephone, street= :street, adr_number= :adr_number, city= :city, state= :state, cep= :cep WHERE provider_id=:provider_id");

        $stmt->bindParam(':provider_id', $this->id, PDO::PARAM_INT);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":telephone", $this->telephone);
        $stmt->bindParam(":street", $this->street);
        $stmt->bindParam(":adr_number", $this->adr_number);
        $stmt->bindParam(":city", $this->city);
        $stmt->bindParam(":state", $this->state);
        $stmt->bindParam(":cep", $this->cep);

        if ($stmt->execute()) {
            header("Location: ../views/list-providers.php");
        } else {
            echo "Ocorreu um erro na alteração do fornecedor";
            print_r($stmt->errorInfo());
        }
    }

    function get()
    {
        $conn = db_connection();
        $stmt = $conn->prepare("SELECT provider_id, name, email, telephone, street, adr_number, city, state, cep FROM providers 
            WHERE provider_id = :id");
        $stmt->bindParam(":id", $this->id, PDO::FETCH_ASSOC);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function delete()
    {
        $conn = db_connection();
        $sql = 'DELETE FROM providers WHERE provider_id = :id';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            header('location:../views/list-providers.php');
        } else {
            echo "Ocorreu um erro ao exluir este fornecedor.";
        }
    }

    function listAll()
    {
        $conn = db_connection();
        $sql = 'SELECT provider_id, name, telephone, street, adr_number, city,
            state, cep, email 
            FROM providers 
            ORDER BY provider_id';

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
