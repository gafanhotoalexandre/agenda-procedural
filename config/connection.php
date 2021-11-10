<?php

$host = 'localhost';
$db = 'agenda';
$user = 'root';
$pass = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    
    // Ativando Modo de Erros
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Erro de execução
    $error = $e->getMessage();
    echo "Erro: $error";
}
