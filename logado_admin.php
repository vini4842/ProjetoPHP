<?php

session_start();
$logado = $_SESSION['login'];

echo("Você está logado como admin". $logado);


?>