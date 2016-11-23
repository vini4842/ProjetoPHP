<?php

include("../config.php");
	$id = $_GET['id'];

	$prep_cursos=$conexao->prepare('SELECT * FROM `cursos` where `CategoriaId` = :pidCat');
                                    $prep_cursos->bindValue(':pidCat',$id); 
                                    $prep_cursos->execute(); 
    if($prep_cursos->rowCount() != 0)
    {
    	 echo "<h1 style='color:#F00' align='center'>Categoria não pode ser excluída!</h1>";
    	 echo "<meta HTTP-EQUIV='refresh' CONTENT=3;URL=categoria.php>";
    }
    else{

	$prep_grava=$conexao->prepare('DELETE FROM `categorias` WHERE `Id` = :pid');

    $prep_grava->bindValue(':pid',$id);   
    $prep_grava->execute();
    header("Location: categoria.php");
    }
?>