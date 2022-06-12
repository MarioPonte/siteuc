<?php

    include("connect.php");

    $id = filter_input(INPUT_POST,'id',FILTER_SANITIZE_NUMBER_INT);
    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_UNSAFE_RAW);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_UNSAFE_RAW);

    $imagemNova = $_FILES['imagem']['name'];
    $imagemVelha = $_POST['imagemVelha'];

    if($imagemNova != ''){
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

            $editarImagem = $novoNomeDaImagem . "." . $extensao;

            unlink("assets/newsImg/" . $_POST['imagemVelha']);
            move_uploaded_file($imagem["tmp_name"], $pasta . $editarImagem);
        }
    }else{
        $editarImagem = $imagemVelha;
    }

    $consulta = "UPDATE noticias SET titulo='$titulo', descricao='$descricao', imagem='$editarImagem' WHERE id='$id'";
    $resultadoNoticia = mysqli_query($mysqli, $consulta);

    if(mysqli_affected_rows($mysqli)){
        header("Location: index.php#noticias");
    }else{
        header("Location: index.php#noticias");
    }

?>