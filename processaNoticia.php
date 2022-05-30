<?php

    include("connect.php");

    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_UNSAFE_RAW);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_UNSAFE_RAW);
    $data = date("Y-m-d");
    



    // Imagem da Noticia

    if(isset($_FILES['imagem'])){
        $imagem = $_FILES['imagem'];

        if($imagem['error']){
            die("Falha ao enviar o arquivo");
        }

        if($imagem['size']>5242880){
            die("A imagem inserida é muito grande. Máximo:5mb");
        }

        $pasta = "assets/newsImg/";
        $nomeDaImagem = $imagem['name'];
        $novoNomeDaImagem = uniqid();
        $extensao = strtolower(pathinfo($nomeDaImagem, PATHINFO_EXTENSION));

        if($extensao != "jpg" && $extensao != "png"){
            die("Tipo de arquivo não aceite");
        }

        $path = $novoNomeDaImagem . "." . $extensao;

        $deuCerto = move_uploaded_file($imagem["tmp_name"], $pasta . $path);

        if($deuCerto){
            //echo "<p>arquivo enviado</p>";
        }else{
            echo "<p>arquivo não enviado</p>";
        }
    }




    $consulta = "INSERT INTO noticias (titulo, descricao, data, imagem) VALUES ('$titulo', '$descricao', '$data', '$path')";
    $resultadoNoticia = mysqli_query($mysqli,$consulta);

    if(mysqli_insert_id($mysqli)){
        header("Location:index.php#noticias");
    }
?>