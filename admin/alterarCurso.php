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
						if(isset($_GET['Alterar'])){
							$id = $_GET['id'];
							$exib_alt = $conexao->prepare("SELECT * FROM `cursos` WHERE `cursos`.`Id` = :pId");
							$exib_alt->bindValue(":pId", $id);
							$exib_alt->execute();
							$row_alt=$exib_alt->fetch();
						}  					
				   ?>    
                 
                 <div class="col-lg-12 col-md-6">
						<?php
							if(isset($_GET["msg"])){
								$cod = $_GET["cod"];
								if ($cod == 1){
									?>
									<div class='alert alert-dismissible alert-danger'>
										<button type='button' class='close' data-dismiss='alert'>&times;</button>
										<strong>Imagem Não Selecionada</strong>.
									</div>
									<?php
								}
								if ($cod == 2){
									?>
									<div class='alert alert-dismissible alert-danger'>
										<button type='button' class='close' data-dismiss='alert'>&times;</button>
										<strong>Formato da Imagem inválido</strong>.
									</div>
									<?php
								}
							}
						?>
                        <form method="POST" action="validacaoCursoCRUD.php" class="form-horizontal"  enctype="multipart/form-data">
							<fieldset>
							<legend> Alterar Curso</legend>
							<input type="hidden" name="Id" value="<?php echo $row_alt['Id']; ?>" />
							<div class="form-group">
								<label class="control-label col-sm-2" for="curso">Curso: </label>
								<div class="col-sm-10">
									<input name="curso"type="text" class="form-control" width="30%" value="<?php echo $row_alt['Curso']; ?>" required/>
								</div>
							</div>
							<div class="form-group">
									<label class="control-label col-sm-2" for="duracao">Duração: </label>
									<div class="col-sm-10">
										<div class="input-group">
											<input name="duracao"type="number" class="form-control" width="30%" value="<?php echo $row_alt['Duracao']; ?>" required/>
											<span class="input-group-addon" id="basic-addon2">Semanas</span>
										</div>
									</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="preco">Preco: </label>
								<div class="col-sm-10">
									<div class="input-group">
										<span class="input-group-addon">R$</span>
										<input name="preco"type="number" step="0.01" class="form-control" width="30%" value="<?php echo $row_alt['Preco']; ?>" required/>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="local">Local: </label>
								<div class="col-sm-10">
									<input name="local"type="text" class="form-control" width="30%" value="<?php echo $row_alt['Local']; ?>" required/>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="categoria">Categoria: </label>
								<div class="col-sm-10">
									<select name="categoria" class="form-control">
										<?php
											$prep_procura=$conexao->prepare('SELECT * FROM `categorias`');
											$prep_procura->execute(); 
											$prep_procura_2=$conexao->prepare('SELECT * FROM `categorias`');
											$prep_procura_2->execute(); 
											while($row=$prep_procura->fetch()){
												if($row['Id'] == $row_alt['CategoriaId']){
													$categoriaDefault = $row['Categoria'];
													break;
												}
											}
											echo "<option value='".row_alt['CategoriaId']."'>".$categoriaDefault."</option>";
											while($row=$prep_procura_2->fetch()){
												if($row['Id'] != $row_alt['CategoriaId']){
													echo "<option value='".$row['Id']."'>".$row['Categoria']."</td>";
												}
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="incio">Data de Inicio: </label>
								<div class="col-sm-10">
									<input name="inicio"type="date" class="form-control" width="30%" value="<?php echo $row_alt['Inicio']; ?>" required/>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="foto">Foto: </label>
								<div class="col-sm-10">
									<input name="foto" type="file" value="<?php echo $row_alt['Foto']; ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" for="texto">Descrição: </label>
								<div class="col-sm-10">
									<textarea name="texto" class="form-control" rows="4" cols="50" maxlength="500">
										<?php echo $row_alt['Texto']; ?>
									</textarea>
								</div>
							</div>
							<input name="alterar" type="submit" class="btn btn-success" value="Alterar"/> | <input type="reset" class="btn btn-warning" value="Resetar"/> | <a href="curso.php" class="btn btn-danger"> Cancelar </a>
							</fieldset>
						</form>
                 
                
                 
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
