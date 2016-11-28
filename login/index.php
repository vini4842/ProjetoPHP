<?php
ob_start();
  include("../config.php");

  if(isset($_POST['logar']))
  {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    

    $prep_select=$conexao->prepare('SELECT * FROM `usuarios` WHERE `Email` = :pusuario AND `Senha` = :psenha');
    $prep_select->bindValue(':pusuario',$usuario);
    $prep_select->bindValue(':psenha',md5($senha));
    $prep_select->execute();    

     if($prep_select->rowCount()>0)
     {
      session_start();
      $_SESSION['login'] = $usuario;
      if($usuario != "admin")
      {
        $_SESSION['nivel'] = 1;
         header("Location: ../index.php");
      }
      else
      {
         $_SESSION['nivel'] = 0;
         header("Location: ../admin/index.php");
      }

       while($row=$prep_select->fetch())
       {
          $_SESSION['nome'] = $row['Nome'];
       }


      
      
     }
     else
     {
      echo "<p align='center'>Usuário inválido!</p>";
     }
  }


?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Escola Curitibana - Login</title>

  <link rel='stylesheet' href='http://codepen.io/assets/libs/fullpage/jquery-ui.css'>

    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />

</head>

<body>

  <div class="login-card">
    <h1>Login</h1><br>
  <form action="#" method="POST">
    <input type="text" name="usuario" placeholder="Email">
    <input type="password" name="senha" placeholder="Senha">
    <input type="submit" name="logar" class="login login-submit" value="login">
  </form>

  <div class="login-help">
    <a href="registrar.php">Registre-se</a> 
  </div>
</div>

<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->

  <script src='http://codepen.io/assets/libs/fullpage/jquery_and_jqueryui.js'></script>

</body>

</html>