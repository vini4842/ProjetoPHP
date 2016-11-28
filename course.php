<?php
	include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Escola Curitibana | Cursos</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

    <!-- Fontes -->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">   
    <!-- slider -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">          
    <!-- cor do tema -->
    <link id="switcher" href="assets/css/theme-color/default-theme.css" rel="stylesheet">  

    <!-- estilo próprio -->
    <link href="assets/css/style.css" rel="stylesheet">    

   
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,700' rel='stylesheet' type='text/css'>
    

    

  </head>
  <body>
  <!--botão -->
    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>      
    </a>
  <!--  -->

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
  <!-- cabeçalho  -->
  <!-- menu -->
  <section id="mu-menu">
    <nav class="navbar navbar-default" role="navigation">  
      <div class="container">
        <div class="navbar-header">
          <!-- menu mobile -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- LOGO -->              
          <!-- TEXTO DA LOGO -->
          <a class="navbar-brand" href="index.php"><i class="fa fa-university"></i><span>Escola Curitibana</span></a>
          <!-- IMG DA LOGO  -->
          <!-- <a class="navbar-brand" href="index.php"><img src="assets/img/logo.png" alt="logo"></a> -->
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
            <li><a href="index.php">Home</a></li>            
            <li class="dropdown active">
              <a href="#" class="dropdown-toggle active" data-toggle="dropdown">Cursos <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                             
                <li><a href="course-detail.php">Curso detalhe</a></li>                
              </ul>
            </li>           
           
               
            <li><a href="contact.php">Contato</a></li>
            <li><a href="404.php">Página 404</a></li>               
            <li><a href="#" id="mu-search-icon"><i class="fa fa-search"></i></a></li>
          </ul>                   
        </div><!--/.nav -->        
      </div>     
    </nav>
  </section>
  <!-- Fim menu -->
  <!-- Input procura -->
  <div id="mu-search">
    <div class="mu-search-area">      
      <button class="mu-search-close"><span class="fa fa-close"></span></button>
      <div class="container">
        <div class="row">
          <div class="col-md-12">            
            <form class="mu-search-form">
              <input type="search" placeholder="Procurar...">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Fim input -->
 <!-- Página -->
 <section id="mu-page-breadcrumb">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-page-breadcrumb-area">
           <h2>Cursos</h2>
           <ol class="breadcrumb">
            <li><a href="#">Home</a></li>            
            <li class="active">Cursos</li>
          </ol>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- Pagina -->
 <section id="mu-course-content">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">
              <div class="col-md-9">
                <!-- conteúdo -->
                <div class="mu-course-container">
                  <div class="row">
					<?php
						if(isset($_GET['filtro'])){
							$filtro = $_GET['id'];
						}
						else{
							$filtro = 0;
						}
						$prep_exibir=$conexao->prepare('SELECT * FROM `cursos` ORDER BY `Id` DESC');
						$prep_exibir->execute();
						while($row=$prep_exibir->fetch()){
							$prep_procura=$conexao->prepare('SELECT * FROM `categorias`');
							$prep_procura->execute(); 
							while($row_2=$prep_procura->fetch()){
								if($row['CategoriaId'] == $row_2['Id']){
									$categoria = $row_2['Categoria'];
									break;
								}
							}
							if($filtro != 0){
								if($row["CategoriaId"] != $filtro){
									continue;
								}
							}
							
					?>
                    <div class="col-md-6 col-sm-6">
                    <div class="mu-latest-course-single">
                      <figure class="mu-latest-course-img">
                        <?php echo "<a href='#'><img src='img/".$row['Foto']."' width='250' height='270' alt='img' /></a>"; ?>
                        <figcaption class="mu-latest-course-imgcaption">
                          <a href="#"><?php echo $categoria; ?></a>
                          <span><i class="fa fa-clock-o"></i><?php echo $row['Duracao']; ?> Semanas</span>
                        </figcaption>
                      </figure>
                      <div class="mu-latest-course-single-content">
                        <h4><a href="#"><?php echo $row['Curso']; ?></a></h4>
                        <p>Conheça mais sobre o curso de <?php echo $categoria ?>. Nossos cursos oferecem o conhecimento que você precisa para te fazer crescer no mercade de trabalho. Também oferecemos garantia de aprendizado. </p>
                        <div class="mu-latest-course-single-contbottom">
                          <?php echo "<a class='mu-course-details' href='course-detail.php?detalhes&id=".$row['Id']."'>Detalhe</a>"; ?>
                          <span class="mu-course-price" href="#">R$<?php echo $row['Preco']; ?></span>
                        </div>
                      </div>
                    </div> 
					</div>  
					<?php
						}
					?>
					<!--
                  <div class="col-md-6 col-sm-6">
                    <div class="mu-latest-course-single">
                      <figure class="mu-latest-course-img">
                        <a href="#"><img src="assets/img/courses/2.jpg" alt="img"></a>
                        <figcaption class="mu-latest-course-imgcaption">
                          <a href="#">Curso 2 </a>
                          <span><i class="fa fa-clock-o"></i>75 dias</span>
                        </figcaption>
                      </figure>
                      <div class="mu-latest-course-single-content">
                        <h4><a href="#">Lorem ipsum dolor sit amet.</a></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet quod nisi quisquam modi dolore, dicta obcaecati architecto quidem ullam quia.</p>
                        <div class="mu-latest-course-single-contbottom">
                          <a class="mu-course-Detalhes" href="#">Detalhes</a>
                          <span class="mu-course-price" href="#">R$165.00</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <div class="mu-latest-course-single">
                      <figure class="mu-latest-course-img">
                        <a href="#"><img src="assets/img/courses/1.jpg" alt="img"></a>
                        <figcaption class="mu-latest-course-imgcaption">
                          <a href="#">Curso 3</a>
                          <span><i class="fa fa-clock-o"></i>90 dias</span>
                        </figcaption>
                      </figure>
                      <div class="mu-latest-course-single-content">
                        <h4><a href="#">Lorem ipsum dolor sit amet.</a></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet quod nisi quisquam modi dolore, dicta obcaecati architecto quidem ullam quia.</p>
                        <div class="mu-latest-course-single-contbottom">
                          <a class="mu-course-Detalhes" href="#">Detalhes</a>
                          <span class="mu-course-price" href="#">R$165.00</span>
                        </div>
                      </div>
                    </div> 
                  </div>                  
                  <div class="col-md-6 col-sm-6">
                    <div class="mu-latest-course-single">
                      <figure class="mu-latest-course-img">
                        <a href="#"><img src="assets/img/courses/2.jpg" alt="img"></a>
                        <figcaption class="mu-latest-course-imgcaption">
                          <a href="#">Curso 4 </a>
                          <span><i class="fa fa-clock-o"></i>75 dias</span>
                        </figcaption>
                      </figure>
                      <div class="mu-latest-course-single-content">
                        <h4><a href="#">Lorem ipsum dolor sit amet.</a></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet quod nisi quisquam modi dolore, dicta obcaecati architecto quidem ullam quia.</p>
                        <div class="mu-latest-course-single-contbottom">
                          <a class="mu-course-Detalhes" href="#">Detalhes</a>
                          <span class="mu-course-price" href="#">R$165.00</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <div class="mu-latest-course-single">
                      <figure class="mu-latest-course-img">
                        <a href="#"><img src="assets/img/courses/1.jpg" alt="img"></a>
                        <figcaption class="mu-latest-course-imgcaption">
                          <a href="#">Curso 5</a>
                          <span><i class="fa fa-clock-o"></i>90 dias</span>
                        </figcaption>
                      </figure>
                      <div class="mu-latest-course-single-content">
                        <h4><a href="#">Lorem ipsum dolor sit amet.</a></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet quod nisi quisquam modi dolore, dicta obcaecati architecto quidem ullam quia.</p>
                        <div class="mu-latest-course-single-contbottom">
                          <a class="mu-course-Detalhes" href="#">Detalhes</a>
                          <span class="mu-course-price" href="#">R$165.00</span>
                        </div>
                      </div>
                    </div> 
                  </div>                  
                  <div class="col-md-6 col-sm-6">
                    <div class="mu-latest-course-single">
                      <figure class="mu-latest-course-img">
                        <a href="#"><img src="assets/img/courses/2.jpg" alt="img"></a>
                        <figcaption class="mu-latest-course-imgcaption">
                          <a href="#">Curso 6 </a>
                          <span><i class="fa fa-clock-o"></i>75 dias</span>
                        </figcaption>
                      </figure>
                      <div class="mu-latest-course-single-content">
                        <h4><a href="#">Lorem ipsum dolor sit amet.</a></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet quod nisi quisquam modi dolore, dicta obcaecati architecto quidem ullam quia.</p>
                        <div class="mu-latest-course-single-contbottom">
                          <a class="mu-course-Detalhes" href="#">Detalhes</a>
                          <span class="mu-course-price" href="#">R$165.00</span>
                        </div>
                      </div>
                    </div>
                  </div>
					-->
                  </div>
                </div>
                <!-- fim conteúdo -->
                
              </div>
              <div class="col-md-3">
                <!-- SideBar -->
                <aside class="mu-sidebar">
                  <!-- Categorias -->
                  <div class="mu-single-sidebar">
					<?php
						$prep_cat=$conexao->prepare('SELECT * FROM `categorias`');
						$prep_cat->execute();    					
					?>  
                    <h3>Categorias</h3>
                    <ul class="mu-sidebar-catg">
							<?php
								while($row=$prep_cat->fetch()){
									echo "<li><a href='course.php?filtro&id=".$row['Id']."'>".$row['Categoria']."</a></li>";
								}
							?>
							<li><a href='course.php?filtro&id=0'>Todas</a></li>
                    </ul>
                  </div>
                  <!-- Categorias -->
                </aside>
                <!-- / fim sidebar -->
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>

  <!-- rodapé -->
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
                  <li><a href="#">link legal</a></li>
                
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget">
                <h4>Ajuda</h4>
                <ul>
                  <li><a href="">Socorro!</a></li>
                                 
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget">
                <h4>Newsletter</h4>
                <p>Põem seu e-mail ai </p>
                <form class="mu-subscribe-form">
                  <input type="email" placeholder="Aqui mesmo">
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
    <!-- fimfooter -->
    <!-- direitos -->
    <div class="mu-footer-bottom">
      <div class="container">
        <div class="mu-footer-bottom-area">
          <p>&copy; Direitos não servem pra nada; Desenvolvido por eu</p>
        </div>
      </div>
    </div>
    <!-- direitos -->
  </footer>
  <!-- fim rodapé -->


<!-- jQuery -->
  <script src="assets/js/jquery.min.js"></script>  
 
  <script src="assets/js/bootstrap.js"></script>   
  <!-- slider -->
  <script type="text/javascript" src="assets/js/slick.js"></script>
  <!-- Contador -->
  <script type="text/javascript" src="assets/js/waypoints.js"></script>
  <script type="text/javascript" src="assets/js/jquery.counterup.js"></script>  

  <!-- pADRÃO js -->
  <script src="assets/js/custom.js"></script> 

  </body>
</html>