<?php
    
    $hostname = "localhost";
    $basededados = "uniaocosmica";
    $utilizador = "root";
    $senha = "";

    $mysqli = new mysqli($hostname,$utilizador,$senha,$basededados);

    if($mysqli->connect_errno){
        echo "Falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
?>