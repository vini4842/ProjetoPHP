<?php
session_start(); 
session_destroy(); 
session_unset(); 

echo"<h3 align='center'>Você saiu! Você será redirecionado em 5 segundos!</h3>";
echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=../index.php'>";
?>