<?php	
	include("../config.php");
	if(isset($_POST["adiciona"])){
		$curso=$_POST["curso"];
		$duracao=$_POST["duracao"];
		$preco=$_POST["preco"];
		$local=$_POST["local"];
		$categoria=$_POST["categoria"];
		$inicio=$_POST["inicio"];
		$foto=$_FILES["foto"];
		$texto=$_POST["texto"];
		//upload de foto
		if(!empty($foto["name"])){
			if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/",$foto["type"])){
				//erro: formato foto incorreto
				echo "formato incorreto";
				header("Location: adicionarCurso.php?msg&cod=2");
				die();
			}
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
			$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
			$caminho_imagem = "../img/" . $nome_imagem;
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);
			//Adicionando Curso
			$prep_procura=$conexao->prepare("INSERT INTO `cursos` (`Id`, `Curso`, `Duracao`, `Preco`, `Local`, `CategoriaId`, `Inicio`, `Texto`, `Foto`) VALUES (NULL, :pCurso, :pDuracao, :pPreco, :pLocal, :pCategoriaId, :pInicio, :pTexto, :pFoto);");
			$prep_procura->bindValue(":pCurso", $curso);
			$prep_procura->bindValue(":pDuracao", $duracao);
			$prep_procura->bindValue(":pPreco", $preco);
			$prep_procura->bindValue(":pLocal", $local);
			$prep_procura->bindValue(":pCategoriaId", $categoria);
			$prep_procura->bindValue(":pInicio", $inicio);
			$prep_procura->bindValue(":pTexto", $texto);
			$prep_procura->bindValue(":pFoto", $nome_imagem);
			$prep_procura->execute();
			header("Location: curso.php?msg&cod=1");
			die();
		}
		else{
			//erro: foto não selecionada
			echo "foto não selecionada";
			header("Location: adicionarCurso.php?msg&cod=1");
			die();
		}
	}
	if(isset($_GET['excluir'])){
		$id=$_GET['id'];
		$prep_excluir = $conexao->prepare("DELETE FROM `cursos` WHERE `cursos`.`Id` = :pId");
		$prep_excluir->bindValue(":pId",$id);
		$prep_excluir->execute();
		header("Location: curso.php?msg&cod=2");
		die();
	}
	if(isset($_POST['alterar'])){
		if(isset($_POST["alterar"])){
			$Id = $_POST["Id"];
			$curso=$_POST["curso"];
			$duracao=$_POST["duracao"];
			$preco=$_POST["preco"];
			$local=$_POST["local"];
			$categoria=$_POST["categoria"];
			$inicio=$_POST["inicio"];
			$foto=$_FILES["foto"];
			$texto=$_POST["texto"];
			//upload de foto
			if(!empty($foto["name"])){
				if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/",$foto["type"])){
					//erro: formato foto incorreto
					echo "formato incorreto";
					header("Location: AlterarCurso.php?msg&cod=2&Alterar&id=".$Id."");
					die();
				}
				preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
				$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
				$caminho_imagem = "../img/" . $nome_imagem;
				move_uploaded_file($foto["tmp_name"], $caminho_imagem);
			}
				else{
				//erro: foto não selecionada
				$prep_imagem = $conexao->prepare("SELECT `Foto` FROM `cursos` WHERE `cursos`.`Id` = :pId");
				$prep_imagem->bindValue(":pId", $Id);
				$prep_imagem->execute();
				$row=$prep_imagem->fetch();
				$nome_imagem = $row["Foto"];
			}
				//Adicionando Curso
				$prep_procura=$conexao->prepare("UPDATE `cursos` SET `Curso` = :pCurso, `Duracao` = :pDuracao, `Preco` = :pPreco, `Local` = :pLocal, `CategoriaId` = :pCategoriaId ,`Inicio` = :pInicio, `Texto` = :pTexto, `Foto` = :pFoto WHERE `cursos`.`Id` = :pId;");
				$prep_procura->bindValue(":pId", $Id);
				$prep_procura->bindValue(":pCurso", $curso);
				$prep_procura->bindValue(":pDuracao", $duracao);
				$prep_procura->bindValue(":pPreco", $preco);
				$prep_procura->bindValue(":pLocal", $local);
				$prep_procura->bindValue(":pCategoriaId", $categoria);
				$prep_procura->bindValue(":pInicio", $inicio);
				$prep_procura->bindValue(":pTexto", $texto);
				$prep_procura->bindValue(":pFoto", $nome_imagem);
				$prep_procura->execute();
				header("Location: curso.php?msg&cod=3");
				die();
			
		}
	}

?>