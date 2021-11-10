<?php

session_start();

require_once 'connection.php';
require_once 'url.php';

$data = $_POST;

if (!empty($data)) {
    // Modificações no Banco

    // CRIAR Contato
    if ($data['type'] === 'create') {
        $name = $data['name'];
        $phone = $data['phone'];
        $observations = $data['observations'];

        $query = "INSERT INTO contacts (name, phone, observations) VALUES (:name, :phone, :observations)";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':observations', $observations);
        try {
            $stmt->execute();
            $_SESSION['msg'] = 'Contato criado com sucesso!';
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo 'Erro: '. $error;
        }
    // ATUALIZAR
    } else if ($data['type'] === 'edit') {
        $name = $data['name'];
        $phone = $data['phone'];
        $observations = $data['observations'];
        $id = $data['id'];

        $query = 'UPDATE contacts 
                  SET name = :name, phone = :phone, observations = :observations 
                  WHERE id = :id';

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':observations', $observations);
        $stmt->bindParam(':id', $id);

        try {
            $stmt->execute();
            $_SESSION['msg'] = 'Contato atualizado com sucesso!';
        } catch (PDOException $e) {
            // erro de conexão
            $error = $e->getMessage();
            echo 'Erro: '. $error;
        }
    // DELETAR
    } else if ($data['type'] === 'delete') {
        $id = $data['id'];
        
        $query = 'DELETE FROM contacts WHERE id = :id';

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);

        try {
            $stmt->execute();
            $_SESSION['msg'] = 'Contato removido com sucesso!';
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo 'Erro: '. $error;
        }
    }

    // Redirecionando para a Home
    header('Location: '. BASE_URL .'../index.php');

} else {
    // Seleção de Dados
    $id;
    if (!empty($_GET)) {
        $id = $_GET['id'];
    }

    if (!empty($id)) {
        // Retornando somente um contato
        $query = 'SELECT * FROM contacts WHERE id = :id';

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $contact = $stmt->fetch(PDO::FETCH_ASSOC);;
    } else {
        // Retornando todos os contatos
        $query = 'SELECT * FROM contacts';
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $contacts = [];
        $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

$conn = null;
