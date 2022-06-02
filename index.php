<?php

    include("connect.php");

    // Query de consulta das noticias da base de dados

    $consulta = "SELECT * FROM noticias ORDER BY data DESC LIMIT 6";
    $con = $mysqli->query($consulta) or die($mysqli->error);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>União Cósmica</title>
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

<body id="page-top" onLoad="loading()">

    <!-- Preload -->

    <div class="box-load">
        <div class="pre"></div>
    </div>

    <!-- ******* -->

    <div class="contentPage">

        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top"><img id="logoBrand" src="assets/ucico.png" alt="" srcset=""></a>
                <button class="navbarMenu navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation"><i class="fa-solid fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#noticias">Noticias</a></li>
                        <li class="nav-item"><a class="nav-link" href="#comunidade">Comunidade</a></li>
                        <li class="nav-item"><a class="nav-link" href="#membros">Membros</a></li>
                        <li class="nav-item"><a class="nav-link" href="#discord"><i class="fa-brands fa-discord"></i> Discord</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 id="pageTitle" class="text-white font-weight-bold">União Cósmica</h1>
                    </div>
                    <div class="col-lg-20 align-self-baseline">
                        <p id="pageDescription" class="text-white-75 mb-5">A maior comunidade de língua portuguesa do
                            Warframe!</p>
                        <div id="clansLogosDiv">

                            <div class="tc-container">
                                <img class="bot-img" src="assets/clansLogos/toWhite.png" alt="" srcset="">
                                <img class="top-img" src="assets/clansLogos/toColor.png" alt="" srcset="">
                            </div>
                            <div class="tc-container">
                                <img class="bot-img" src="assets/clansLogos/taWhite.png" alt="" srcset="">
                                <img class="top-img" src="assets/clansLogos/taColor.png" alt="" srcset="">
                            </div>
                            <div class="tc-container">
                                <img class="bot-img" src="assets/clansLogos/tanWhite.png" alt="" srcset="">
                                <img class="top-img" src="assets/clansLogos/tanColor.png" alt="" srcset="">
                            </div>
                            <div class="tc-container">
                                <img class="bot-img" src="assets/clansLogos/tlWhite.png" alt="" srcset="">
                                <img class="top-img" src="assets/clansLogos/tlColor.png" alt="" srcset="">
                            </div>
                        </div>
                        <a class="btn btnMore" href="#noticias"><i class="fa-solid fa-chevron-down"></i></a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Noticias-->
        <section class="page-section bg-primary" id="noticias">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col text-center">
                        <h2 class="titlesec mt-0">Noticias</h2>

                        <div class="newsAdmPanel">
                            <a href="addNoticia.php" class="newsAdmBtn"><i class="fa-solid fa-plus"></i> Adicionar Noticia</a>
                        </div>

                        <div class="album py-5">
                            <div class="container">
                                <div class="row">

                                    <?php while($dado = $con->fetch_array()){ ?>
                            
                                        <div class="col-md-4">
                                            <div class="card newsCard mb-4 box-shadow">
                                                <img class="card-img-top" src="assets/newsImg/<?php echo $dado["imagem"]; ?>" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Imagem">
                                                <div class="card-body">
                                                    <p class="card-title"><?php echo $dado["titulo"]; ?></p>
                                                    <p class="card-text"><?php echo $dado["descricao"]; ?></p>
                                                    <p class="card-date"><?php echo date("d/m/Y", strtotime($dado["data"])); ?></p>

                                                    <p class="card-status">
                                                        <a id="btnEdit" href="editarNoticia.php?id=<?php echo $dado["id"]; ?>"><i class="fa-solid fa-pen"></i></a><a id="btnDelete" href="javascript: if(confirm('Tem certeza que deseja apagar esta noticia?')) location.href='excluirNoticia.php?id=<?php echo $dado["id"]; ?>';"><i class="fa-solid fa-trash"></i></a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>
                                
                                </div>
                            </div>
                          </div>

                    </div>
                </div>
            </div>
        </section>

        <!-- Comunidade-->
        <section class="page-section bg-primary" id="comunidade">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="titlesec mt-0">Comunidade</h2>
                        <p class="text-white-75 mb-4">Fundado por pessoas que desejavam ter companhia para jogar e se
                            divertir, começamos nossa trajetória em 2017. A partir daí conquistamos diversos companheiros de
                            jornada e decidimos expandir para que todos os que buscam alguém para tirar dúvidas ou jogar
                            casualmente com amigos tivesse o seu lugar nesse jogo incrível.</p>
                        <p class="text-white-75 mb-4">Somos uma das maiores e melhores alianças do Warframe, com mais de
                            3900 membros in-game e mais de 7100 membros no servidor do discord. A aliança é feita de
                            jogadores para jogadores. Todos são bem-vindos ao nosso servidor, que possui inúmeras
                            ferramentas para agregar na sua jornada pelo Warframe.</p>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5">
                    <img id="ucwhite" src="assets/ucwhite.png" alt="" srcset="">
                </div>
            </div>
        </section>

        <!-- History-->
        <section class="page-section bg-secondary" id="membros">
            <div class="container">
                <h2 class="titlesec text-center mt-0">Membros</h2>
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="memberInfo text-center">
                            <img class="memberPhoto" src="assets/membros/Pedro_Kami.png" alt="" srcset="">
                            <p class="memberPhrase text-white-75">"Se estiver procurando uma comunidade que te receba de braços abertos, você a encontrou :D"</p>
                            <p class="memberName">Pedro_Kami</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="memberInfo text-center">
                            <img class="memberPhoto" src="assets/membros/Heid.png" alt="" srcset="">
                            <p class="memberPhrase text-white-75">"os dojos dos clãs da aliança são obras de arte"</p>
                            <p class="memberName">Heid</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="memberInfo text-center">
                            <img class="memberPhoto" src="assets/membros/Baiano.png" alt="" srcset="">
                            <p class="memberPhrase text-white-75">"Ótimo suporte para todos os jogadores e dojos muito bem decorados!"</p>
                            <p class="memberName">Baiano</p>
                        </div>
                    </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
                    <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                    <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

        </section>

        <!-- Discord-->
        <section class="page-section bg-primary" id="discord">
            <div class="container px-4 px-lg-5">
                <div class="ourDiscord row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="titlesec mt-0">Nosso Discord</h2>
                        <div class="row featurette">
                            <div class="col-md-7 order-md-2">
                                <h2 class="joinUs">Junte-se a nós</h2>
                                <p class="text-white-75 mb-4">Acesse o nosso servidor oficial do Discord e entre hoje mesmo para um dos
                                            quatro clãs da União Cósmica. Não temos restrição de maestria. Faça parte de uma aliança feita
                                            para você!</p>
                            </div>
                            <div class="col-md-5 order-md-1">
                                <img class="discordLogo" src="assets/img/discordpartner.png" alt="" srcset="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="beneficts">
                    <div class="discordBeneficts text-white">
                        <p id="benefictsTitle" >Beneficios:</p>
                        <ul id="benefictsList" class="list">
                            <li class="listItem">Eventos exclusivos para membros <i class="fa-solid fa-award"></i></li>
                            <li class="listItem">Atividades exclusivas <i class="fa-solid fa-gamepad"></i></li>
                            <li class="listItem">Prémios unicos <i class="fa-solid fa-trophy"></i></li>
                            <li class="listItem">Comunidade de amigos sempre pronta a ajudar <i class="fa-solid fa-user-group"></i></li>
                            <li class="listItem">Um bot único, com várias funcionalidades pra você continuar no Warframe, mesmo não estando nele <i class="fa-solid fa-robot"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="btnDiscordDiv">
                    <a class="btnDiscord" href="https://discord.com/invite/uniaocosmicabr" target="_blank"><i class="fa-brands fa-discord"></i> Entre agora mesmo</a>
                </div>
            </div>
        </section>

        <!-- ScrollUp Button-->
        <a href="#"><div class="btn-scroll-up"><i class="fa-solid fa-chevron-up"></i></div></a>

        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="socialmedia text-white">
                <div class="socialm"><a href="https://www.facebook.com/uniaocosmicabr" target="_blank"><i class="socialmediaLogo fa-brands fa-facebook"></i></a></div>
                <div class="socialm"><a href="https://www.instagram.com/uniaocosmicabr/" target="_blank"><i class="socialmediaLogo fa-brands fa-instagram"></i></a></div>
                <div class="socialm"><a href="https://twitter.com/uniaocosmicabr" target="_blank"><i class="socialmediaLogo fa-brands fa-twitter"></i></a></div>
                <div class="socialm"><a href="https://www.youtube.com/channel/UCLlQi5BS8wEew2qok_L6UmA" target="_blank"><i class="socialmediaLogo fa-brands fa-youtube"></i></a></div>
            </div>
            <div class="container px-4 px-lg-5">
                <div class="small text-center text-muted">&copy; Todos os direitos reservados a Mário Ponte / União Cósmica
                    - 2022</div>
            </div>
        </footer>

    </div>

    
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>