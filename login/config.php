<?php
	try
	{
		$banco = "escolacuritibana";
		$senha = "positivo";
	$conexao = new PDO('mysql:host=localhost;dbname=escolacuritibana', 'root','positivo');
	$conexao -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	{
		echo "Erro de conexão ao banco - Erro: " . $e->getMessage();

	}
?>