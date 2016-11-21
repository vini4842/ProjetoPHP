<?php

  include("config.php");

  if(isset($_POST['logar']))
  {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $num = 0;

    $prep_select=$conexao->prepare('SELECT * FROM `usuarios` WHERE `usuarios`.`email` = :pusuario');
    $prep_select->bindValue(':pusuario',$usuario);
    $prep_select->execute();

    if($prep_select->rowCount()==0)
    {

  $prep_grava=$conexao->prepare('INSERT INTO `usuarios` (`id`, `email`, `senha`, `nivel`) VALUES (NULL, :pusuario, :psenha, :pnum);');

  $prep_grava->bindValue(':pusuario',$usuario);
  $prep_grava->bindValue(':psenha',$senha);
  $prep_grava->bindValue(':pnum',$num);
  $prep_grava->execute();
  echo "<p align='center'>Registrado com sucesso!</p>";
  }
  else
  {
    echo "<p align='center'>Já há dados cadastrados com esse e-mail!</p>";
  }
}


?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Escola Curitibana - Registre-se</title>

  <link rel='stylesheet' href='http://codepen.io/assets/libs/fullpage/jquery-ui.css'>

    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />

</head>

<body>

  <div class="login-card">
    <h1>Registre-se</h1><br>
  <form action="#" method="POST">
    <input type="text" name="usuario" placeholder="Digite seu email">
    <input type="password" name="senha" placeholder="Digite sua senha">
    <input type="submit" name="logar" class="login login-submit" value="Registrar">
  </form>

  <div class="login-help">
    <a href="index.php">Login</a> 
  </div>
</div>

<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->

  <script src='http://codepen.io/assets/libs/fullpage/jquery_and_jqueryui.js'></script>

</body>

</html>