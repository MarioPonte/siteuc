<?php

    include("connect.php");

    $id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);

    $consultaImagem = "SELECT imagem FROM noticias WHERE id='$id'";
    $conImagem = $mysqli->query($consultaImagem);
    $row = mysqli_fetch_array($conImagem);

    unlink("assets/newsImg/" . $row["imagem"]);

    $consulta = "DELETE FROM noticias WHERE id='$id'";
    $con = mysqli_query($mysqli,$consulta);

    if(mysqli_affected_rows($mysqli)){
        header("Location: index.php#noticias");
    }

?>