<?php

    include("connect.php");

    // Query de consulta das noticias da base de dados

    $consulta = "SELECT * FROM noticias LIMIT 6";
    $con = $mysqli->query($consulta) or die($mysqli->error);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Favicon-->
    <link rel="shortcut icon" href="assets/ucico.png" type="image/x-icon">
    <!-- Font Awesome icons (free version)-->
    <script src="https://kit.fontawesome.com/af5e23e73e.js" crossorigin="anonymous"></script>
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
        rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />

    <!-- Jquery -->

    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
</head>
<body class="bg-primary text-center">
    <h1 class="text-white">Adicionar Noticia</h1>
    <form action="processaNoticia.php" method="POST">
        <div class="form-group">
            <label class="text-white">Titulo</label>
            <input class="form-control" type="text" name="titulo" placeholder="Titulo da Noticia...">
        </div>
        <div class="form-group">
            <label class="text-white">Descrição</label>
            <input class="form-control" type="text" name="descricao" placeholder="Descrição da Noticia...">
        </div>
        <div class="form-group">
            <label class="text-white">Imagem</label>
            <input class="form-control" type="text" name="imagem" placeholder="Imagem da Noticia...">
        </div>

        <input class="btn btn-primary" type="submit" value="Adicionar Noticia">
    </form>

    <a href="index.php#noticias">Voltar</a>
</body>
</html>