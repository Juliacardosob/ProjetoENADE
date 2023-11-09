<?php
include_once("../help/url.php");

    $db_host = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "projetoenade";

    try {
        $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        
    } catch (PDOException $e) {
        // Captura de exceção em caso de erro
        echo "Erro na conexão com o banco de dados: " . $e->getMessage();
    }
    
?>