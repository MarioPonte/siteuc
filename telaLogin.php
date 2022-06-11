<?php
    include('connect.php');

    if(isset($_POST['nome']) || isset($_POST['senha'])){
      if(strlen($_POST['nome']) == 0){
        echo "Prencha o Nickname";
      }else if(strlen($_POST['senha']) == 0){
        echo "Prencha a Senha";
      }else{
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];

        $sql_code = "SELECT * FROM usuarios WHERE nome = '$nome' LIMIT 1";
        $sql_query = $mysqli->query($sql_code) or die($mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1){
          $usuario = $sql_query->fetch_assoc();

          

          if(password_verify($senha, $usuario['senha'])){
            if(!isset($_SESSION)){
              session_start();
            }
  
            $_SESSION['user'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['cargo'] = $usuario['cargo'];

            header("Location: index.php");
          }else{
            echo "Falha ao logar";
          }
        }else{
          echo "Falha ao logar";
        }
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
<body class="text-center" style="background-color: #24133B;">
<section class="h-100 gradient-form">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-lg text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="assets/clansLogos/ucColor.png"
                    style="width: 185px;" alt="logo">
                  <h4 class="loginTitle mt-1 mb-5 pb-1">União Cósmica</h4>
                </div>

                <form action="" method="POST">
                  <p class="accText">Por favor entre com a sua conta</p>

                  <div class="form-outline mb-4">
                    <input type="text" name="nome" id="formUC" class="form-control" />
                    <label class="form-label formLbl">Usuário</label>
                  </div>

                  <div class="form-outline mb-4">
                    <div class="divPassword">
                      <input id="inputSenha" type="password" name="senha" class="form-control" />
                      <button type="button" id="showBtn" onclick="eyeClick()"><i class="fa-solid fa-eye"></i></button>
                    </div>
                    <label class="form-label formLbl">Senha</label>
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 btnLogin" type="submit">Login</button>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2 notHaveAcc">Não tem uma conta?</p>
                    <a type="button" href="telaCadastro.php" class="btn btn-outline-blue">Crie agora</a>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4 loginTextTitle">Divirta-se conosco!</h4>
                <p class="small mb-0 loginTextDescription">Fique ligado em todas as atividades e noticias da nossa comunidade.</p>
                <div class="socialmediaLogin text-white">
                    <div class="socialm"><a href="https://discord.com/invite/uniaocosmicabr" target="_blank"><i class="socialmediaLogo fa-brands fa-discord"></i></a></div>
                    <div class="socialm"><a href="https://www.facebook.com/uniaocosmicabr" target="_blank"><i class="socialmediaLogo fa-brands fa-facebook"></i></a></div>
                    <div class="socialm"><a href="https://www.instagram.com/uniaocosmica/" target="_blank"><i class="socialmediaLogo fa-brands fa-instagram"></i></a></div>
                    <div class="socialm"><a href="https://twitter.com/uniaocosmicabr" target="_blank"><i class="socialmediaLogo fa-brands fa-twitter"></i></a></div>
                    <div class="socialm"><a href="https://www.youtube.com/channel/UCLlQi5BS8wEew2qok_L6UmA" target="_blank"><i class="socialmediaLogo fa-brands fa-youtube"></i></a></div>
                </div>
                <a class="backToSiteBtn" href="index.php">Voltar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="js/scripts.js"></script>
</body>
</html>