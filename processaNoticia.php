<?php

    include("connect.php");

    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_UNSAFE_RAW);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_UNSAFE_RAW);
    $data = date("Y-m-d");
    $imagem = filter_input(INPUT_POST, 'imagem', FILTER_UNSAFE_RAW);

    $consulta = "INSERT INTO noticias (titulo, descricao, data, imagem) VALUES ('$titulo', '$descricao', '$data', '$imagem')";
    $resultadoNoticia = mysqli_query($mysqli,$consulta);

    if(mysqli_insert_id($mysqli)){
        header("Location:index.php#noticias");
    }
?>