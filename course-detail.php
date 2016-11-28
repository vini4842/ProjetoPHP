<?php
	include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Escola Curitibana | Detalhes do curso</title>

    <!-- icone -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

    <!-- Fonte -->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">   
    <!-- slider -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">          
    <!-- cores -->
    <link id="switcher" href="assets/css/theme-color/default-theme.css" rel="stylesheet">

    <!-- estilo -->
    <link href="assets/css/style.css" rel="stylesheet">    

   
    <!-- Fontes -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,700' rel='stylesheet' type='text/css'>
    

  

  </head>
  <body>
    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>      
    </a>
  <!-- botao -->

  <!-- Cabeçalho  -->
  <header id="mu-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-header-area">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="mu-header-top-left">
                  <div class="mu-top-email">
                    <i class="fa fa-envelope"></i>
                    <span></span>
                  </div>
                  <div class="mu-top-phone">
                    <i class="fa fa-phone"></i>
                    <span></span>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="mu-header-top-right">
                  <nav>
                    <ul class="mu-top-social-nav">
                      <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                      <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                      <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                      <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                      <?php
                      session_start();
                      if(!isset($_SESSION['login']))
                      {
                         echo("<li><a href='login/index.php'>Login</a></li>");
                      }
                      else
                      {
                        $usuario = $_SESSION['nome'];
                         echo("<li><a href='login/logout.php'>Bem vindo ".$usuario."</a></li>");
                      }
                     
                      ?>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- fim cabeçalho  -->
  <!-- menu -->
  <section id="mu-menu">
    <nav class="navbar navbar-default" role="navigation">  
      <div class="container">
        <div class="navbar-header">
          <!-- celular -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- LOGO -->              
          <!-- TEXTO LOGO -->
          <a class="navbar-brand" href="index.php"><i class="fa fa-university"></i><span>Escola Curitibana</span></a>
          <!-- IMG LOGO  -->
          <!-- <a class="navbar-brand" href="index.php"><img src="assets/img/logo.png" alt="logo"></a> -->
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
            <li><a href="index.php">Home</a></li>            
            <li class="dropdown active">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cursos <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="course.php">Cursos e categorias</a></li>                
               
              </ul>
            </li>           
           
            <li><a href="contact.php">Contato</a></li>
            <li><a href="404.php">Erro 404</a></li>               
            <li><a href="#" id="mu-search-icon"><i class="fa fa-search"></i></a></li>
          </ul>                    
        </div><!--/.nav -->        
      </div>     
    </nav>
  </section>
  <!-- menu -->
  <!-- input pesquisa -->
  <div id="mu-search">
    <div class="mu-search-area">      
      <button class="mu-search-close"><span class="fa fa-close"></span></button>
      <div class="container">
        <div class="row">
          <div class="col-md-12">            
            <form class="mu-search-form">
              <input type="search" placeholder="Pesquisa ai">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- fim input -->
 <!-- Paginação -->
 <section id="mu-page-breadcrumb">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-page-breadcrumb-area">
           <h2>Datelhes do curso</h2>
           <ol class="breadcrumb">
            <li><a href="#">Home</a></li>            
            <li class="active">Detalhes do curso</li>
          </ol>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- Paginação -->
 <section id="mu-course-content">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">
              <div class="col-md-9">
                <!-- conteúdo -->
					<?php
						if(isset($_GET['detalhes'])){
							$id = $_GET['id'];
							$prep_exibir = $conexao->prepare("SELECT * FROM `cursos` WHERE `cursos`.`Id` = :pId");
							$prep_exibir->bindValue(":pId", $id);
							$prep_exibir->execute();
							$row=$prep_exibir->fetch();
							$prep_procura=$conexao->prepare('SELECT * FROM `categorias`');
							$prep_procura->execute();
							while($row_2=$prep_procura->fetch()){
								if($row_2['Id'] == $row['CategoriaId']){
									$categoria = $row_2['Categoria'];
									break;
								}
							}
						}else{
							header("Location: index.php");
							die();
						}
				   ?>   
                <div class="mu-course-container mu-course-details">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="mu-latest-course-single">
                        <figure class="mu-latest-course-img">
                          <?php echo "<a href='#'><img src='img/".$row['Foto']."' width='500' height='520' alt='img' /></a>"; ?>
                          <figcaption class="mu-latest-course-imgcaption">
                            <a href="#">Curso</a>
                            <span><i class="fa fa-clock-o"></i><?php echo $row['Duracao'] * 7; ?> dias</span>
                          </figcaption>
                        </figure>
                        <div class="mu-latest-course-single-content">
                          <h2><a href="#"><?php echo $row['Curso']; ?></a></h2>
                          <h4>Informações do Curso</h4>
                          <ul>
                            <li> <span>Preço do curso</span> <span>R$ <?php echo $row['Preco']; ?></span></li>
                            <li> <span>Local</span> <span><?php echo $row['Local']; ?></span></li>
                            <li> <span>Categoria</span> <span><?php echo $categoria; ?></span></li>
                            <li> <span>Duração do curso</span> <span><?php echo $row['Duracao']; ?> semanas</span></li>
                            <li> <span>Início do curso</span> <span> <?php echo $row['Inicio']; ?></span></li>
                          </ul>
                          <h4>Descrição</h4>
                          <?php echo $row['Texto']; ?>
                        </div>
                      </div> 
                    </div>                                   
                  </div>
                </div>
                <!-- fim do curso -->
              </div>
             
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>

  <!-- Rodapé -->
  <footer id="mu-footer">
    <!-- footer -->
    <div class="mu-footer-top">
      <div class="container">
        <div class="mu-footer-top-area">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget">
                <h4>Informação</h4>
                <ul>
                  <li><a href="#">Link Legal</a></li>
                 
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget">
                <h4>Socorro</h4>
                <ul>
                  <li><a href="">Meu gato sumiu</a></li>
                                
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget">
                <h4>Newsletter</h4>
                <p>Ninguém ve isso</p>
                <form class="mu-subscribe-form">
                  <input type="email" placeholder="Mas se inscreve ai">
                  <button class="mu-subscribe-btn" type="submit">Mandar!</button>
                </form>               
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget">
                <h4>Contato</h4>
                <address>
                   <?php

                    $prep_exibir=$conexao->prepare('SELECT * FROM `contato`');
                    $prep_exibir->execute();
                   while ($row=$prep_exibir->fetch()) 
                    {
                        echo"<p>".$row['Endereco']."</p>";
                        echo"<p>Telefone: ".$row['Telefone']."</p>";
                        echo"<p>Website: ".$row['Website']."</p>";
                        echo"<p>Email: ".$row['Email']."</p>";
                    }
                ?>
                </address>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- fim rodapé -->
    <!-- footer -->
    <div class="mu-footer-bottom">
      <div class="container">
        <div class="mu-footer-bottom-area">
          <p>Direitos maneiros</p>
        </div>
      </div>
    </div>
    <!-- footer -->
  </footer>
  <!-- footer -->



  <!-- jQuery -->
  <script src="assets/js/jquery.min.js"></script>  

  <script src="assets/js/bootstrap.js"></script>   
  <!-- slider -->
  <script type="text/javascript" src="assets/js/slick.js"></script>
  <!-- COntador -->
  <script type="text/javascript" src="assets/js/waypoints.js"></script>
  <script type="text/javascript" src="assets/js/jquery.counterup.js"></script>  

  <!-- padrão js -->
  <script src="assets/js/custom.js"></script> 

  </body>
</html>