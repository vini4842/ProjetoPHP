<?php

include("../config.php");

session_start();
$usuario = $_SESSION['login'];
$nivel = $_SESSION['nivel'];

if(!isset($usuario) || $nivel != 0)
{
  header("Location: ../login/sem_permissao.php");
}
?>

<?php
if(isset($_POST['enviar']))
  {
    $texto = $_POST['texto'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $website = $_POST['website'];
    $email = $_POST['email'];
    $id = $_POST['id'];

    $prep_grava=$conexao->prepare('UPDATE `contato` SET `Id`=:pid,`Texto`=:ptexto,`Endereço`=:pendereco,`Telefone`=:ptelefone,`Website`=:pwebsite,`Email`=:pemail WHERE `Id` = :pid;');

    $prep_grava->bindValue(':pid',$id);  
    $prep_grava->bindValue(':ptexto',$texto);
    $prep_grava->bindValue(':pendereco',$endereco);
    $prep_grava->bindValue(':ptelefone',$telefone);
    $prep_grava->bindValue(':pwebsite',$website);
    $prep_grava->bindValue(':pemail',$email); 
    $prep_grava->execute();

    
    echo"<script>";
    echo "window.location.href = 'index.php';";
    echo "</script>";
  }
  ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Escola Curitibana</title>
  <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
     
           
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><i class="fa fa-university"></i><span>Escola Curitibana</span></a>
                    
                </div>
              
                <span class="logout-spn" >
                  <a href="../login/logout.php" style="color:#fff;">LOGOUT</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 


                    <li class="active-link">
                        <a href="index.php" ><i class="fa fa-desktop "></i>Dashboard </a>
                    </li>
                   

                    
                    
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h2>Contato</h2>   
                    </div>
                </div>              
               
              <div class="row text-center pad-top">
                 <?php
                    $prep_exibir=$conexao->prepare('SELECT * FROM `contato`');
                    $prep_exibir->execute();                   
                    
                  ?>
 
              <div class="col-lg-12 col-md-6">
                        <h5>Contato</h5>
                        
                        <div class="col-lg-12 col-md-4">
                 <form action="" method="POST">
                        <div class="form-group">

                        <?php
                        while ($row=$prep_exibir->fetch()) {
                          
                        ?>
                        <input type="hidden" name="id" value="<?php echo $row['Id'] ?>">

                            <label for="categoria">Texto de contato</label>
                            <input type="text" class="form-control" name="texto" value="<?php echo $row['Texto']; ?>" required="required" />

                            <label for="categoria">Endereço</label>
                            <input type="text" class="form-control" name="endereco" value="<?php echo $row['Endereco']; ?>" required="required" />  

                            <label for="categoria">Telefone</label>
                            <input type="text" class="form-control" name="telefone" value="<?php echo $row['Telefone']; ?>" required="required" />  

                            <label for="categoria">Website</label>
                            <input type="text" class="form-control" name="website" value="<?php echo $row['Website']; ?>" required="required" />  

                            <label for="categoria">E-mail</label>
                            <input type="text" class="form-control" name="email" value="<?php echo $row['Email']; ?>" required="required" />                         


                            <?php
                          }
                            ?>
                        </div>
                        <div class="form-group" align="right">
                          <input type="submit" class="btn btn-success" name="enviar" value="Cadastrar">
                        </div>
                  </form>      
                  </div>            


                    </div>
                 
                
                 
              </div>
                
                
                
         
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">
      
    
          
        </div>
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html> 
