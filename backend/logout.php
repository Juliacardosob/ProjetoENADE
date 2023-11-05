<?php
session_start();

$data = $_POST;

if(isset($_SESSION)){
    if($data['type'] == "logout"){
        session_destroy();
        header("Location: ../pages/index.php");
    }
    else{
        echo "erro";
    }
}

