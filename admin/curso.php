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
                     <h2>Cursos</h2>   
                    </div>
                </div>              
               
            <div class="row text-center pad-top">
                <?php
                    $prep_exibir=$conexao->prepare('SELECT * FROM `cursos`');
                    $prep_exibir->execute();    					
				?>    
				  <div class="col-lg-12 col-md-6">
					<h5>Cursos Cadastrados</h5>
					<?php
						if(isset($_GET["msg"])){
							$cod = $_GET["cod"];
							if ($cod == 1){
								?>
								<div class='alert alert-dismissible alert-success'>
									<button type='button' class='close' data-dismiss='alert'>&times;</button>
									<strong>Cadastro Realizado com sucesso</strong>.
								</div>
								<?php
							}
							if ($cod == 2){
								?>
									<div class='alert alert-dismissible alert-success'>
									<button type='button' class='close' data-dismiss='alert'>&times;</button>
									<strong>Curso Excluido com Sucesso</strong>.
									</div>
								<?php
							}
							if ($cod == 3){
								?>
									<div class='alert alert-dismissible alert-success'>
									<button type='button' class='close' data-dismiss='alert'>&times;</button>
									<strong>Curso Alterado com Sucesso</strong>.
									</div>
								<?php
							}
						}
					?>
					<table class="table table-striped table-bordered table-hover">
						<thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Foto</th>
                                    <th>Curso</th> 
									<th>Duração</th>
									<th>Preco</th> 		
									<th>Local</th>
									<th>Categoria</th>
									<th>Inicio</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                while($row=$prep_exibir->fetch()){
									$prep_procura=$conexao->prepare('SELECT * FROM `categorias`');
									$prep_procura->execute(); 
									while($row_2=$prep_procura->fetch()){
										if($row['CategoriaId'] == $row_2['Id']){
											$categoria = $row_2['Categoria'];
											break;
										}
									}
                                    echo "<tr>";
                                    echo "<td>".$row['Id']."</td>";
									echo "<td> <img src=../img/".$row['Foto']." width='150' hright='200'/> </td>";
                                    echo "<td>".$row['Curso']."</td>";
									echo "<td>".$row['Duracao']." semanas</td>";
									echo "<td> R$".$row['Preco']."</td>";
									echo "<td>".$row['Local']."</td>";
									echo "<td>".$categoria."</td>";
									echo "<td>".$row['Inicio']."</td>";
                                    echo"<td><a href='validacaoCursoCRUD.php?excluir&id=".$row['Id']."'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span>
                                    <a href='alterarCurso.php?Alterar&id=".$row['Id']."'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>
                                    </td>";
									echo "</tr>";
                                }
                                ?>                   
                            </tbody>
					</table>
						<div align="right">
							<a href="adicionarCurso.php"><button type="button" align="right" class="btn btn-success">Adicionar Curso</button></a>
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
