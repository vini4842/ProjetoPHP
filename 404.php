<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Escola Curitibana | 404</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

    <!-- Fontes -->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">   
    <!-- slider -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">          
    <!-- cores -->
    <link id="switcher" href="assets/css/theme-color/default-theme.css" rel="stylesheet">  

    <!-- estilo -->
    <link href="assets/css/style.css" rel="stylesheet">    

   
    <!-- fontes -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,700' rel='stylesheet' type='text/css'>
    

   

  </head>
  <body>
  
  <!--botao -->
    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>      
    </a>
  <!-- botao -->

  <!-- cabeçalho  -->
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
  <!-- cabeçalho  -->
  <!-- menu -->
  <section id="mu-menu">
    <nav class="navbar navbar-default" role="navigation">  
      <div class="container">
        <div class="navbar-header">
          <!-- OBILE  -->
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
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cursos <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="course.php">Cursos e categorias</a></li>                
                
              </ul>
            </li>           
                
            <li><a href="contact.php">Contato</a></li>
            <li class="active"><a href="404.php">Erro 404</a></li>               
            <li><a href="#" id="mu-search-icon"><i class="fa fa-search"></i></a></li>
          </ul>                     
        </div><!--/.nav-collapse -->        
      </div>     
    </nav>
  </section>
  <!-- menu -->
  <!--  -->
  <div id="mu-search">
    <div class="mu-search-area">      
      <button class="mu-search-close"><span class="fa fa-close"></span></button>
      <div class="container">
        <div class="row">
          <div class="col-md-12">            
            <form class="mu-search-form">
              <input type="search" placeholder="...">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--  -->
 <!--  -->
 <section id="mu-page-breadcrumb">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-page-breadcrumb-area">
           <h2>404</h2>
           <ol class="breadcrumb">
            <li><a href="#">Home</a></li>            
            <li class="active">404</li>
          </ol>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- -->

  <!-- conteúdo  -->
  <section id="mu-error">
    <div class="container">
      <div class="row">
       <div class="col-md-12">
          <div class="mu-error-area">
            <p>Cara, te enganaram!</p>
            <span>Essa página n existe .</span>
            <h2>Erro 404</h2>
            <a class="mu-post-btn" href="index.php">Vai pro início</a>
          </div>
        </div>
      </div>
    </div>
  </section>
 <!-- conteúdo  -->
 

 



  <!-- jQuery  -->
  <script src="assets/js/jquery.min.js"></script>  

  <script src="assets/js/bootstrap.js"></script>   
  <!-- slider -->
  <script type="text/javascript" src="assets/js/slick.js"></script>
  <!--  -->
  <script type="text/javascript" src="assets/js/waypoints.js"></script>
  <script type="text/javascript" src="assets/js/jquery.counterup.js"></script>  

  <!-- js -->
  <script src="assets/js/custom.js"></script> 

  </body>
</html>