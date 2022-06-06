<?php
    if(isset($_POST['email'])){
        include('connect.php');

        $nome = $_POST['nome'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $email = $_POST['email'];

        $mysqli->query("INSERT INTO usuarios (nome, senha, email) VALUES ('$nome', '$senha', '$email')");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
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
              <div class="card-body">

                <div class="text-center">
                  <img src="assets/clansLogos/ucColor.png"
                    style="width: 115px;" alt="logo">
                  <h4 class="loginTitle mt-1 mb-5 pb-1">União Cósmica</h4>
                </div>

                <form name="formCad" action="" method="post">
                  <p class="accText">Por favor insira os dados da conta</p>

                  <div class="form-outline mb-4">
                    <input type="text" name="nome" id="formUC" class="form-control" />
                    <label class="form-label formLbl">Usuário</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" name="senha" id="formUC" class="form-control" />
                    <label class="form-label formLbl">Senha</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" name="repSenha" id="formUC" class="form-control" />
                    <label class="form-label formLbl">Confirme a Senha</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="formUC" class="form-control" />
                    <label class="form-label formLbl">Email</label>
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 btnLogin" type="submit" onclick="return validarSenha()">Cadastrar</button>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <a type="button" href="telaLogin.php" class="btn btn-outline-blue">Voltar</a>
                  </div>

                </form>

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