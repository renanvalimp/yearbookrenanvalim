<?php

require_once("./dao/confBD.php");
require_once("./dao/AlunoVO.php");
include_once("/upload_file.php");

try
{

	$origem = basename($_SERVER['HTTP_REFERER']);
	if((count($_POST)!=8)&&($origem!='cadastroUsuario.php')){
		header("Location:./acessoNegado.php");
		die();
	}

	else{
		
		$conexao = conn_mysql();
		
                $alunos = new AlunoVO();
                $alunos->setNome(utf8_encode(htmlspecialchars($_POST['nome'])));
		$alunos->setDescricao(utf8_encode(htmlspecialchars($_POST['descricao'])));
		$alunos->setCidade(utf8_encode(htmlspecialchars($_POST['cidade'])));
                $alunos->setEstado(utf8_encode(htmlspecialchars($_POST['estado'])));
                $alunos->setEmail(utf8_encode(htmlspecialchars($_POST['email'])));
                $alunos->setFoto($_FILES['foto']);

                $caminhoFoto = inserirFoto($alunos->getNome(), $alunos->getFoto());
                
		$SQLInsert = 'INSERT INTO alunos ( nome, descricao, foto, cidade, estado, email)
			  		  VALUES (?, ?, ?, ?, ?, ?)';

		$operacao = $conexao->prepare($SQLInsert);					  
		
		$inserir = $operacao->execute(array($alunos->getNome(), $alunos->getDescricao(), $caminhoFoto, $alunos->getCidade(), $alunos->getEstado(), $alunos->getEmail()));
		
	
		$conexao = null;
		
	
		if ($inserir){
			 echo "<h1>Cadastro efetuado com sucesso.</h1>\n";
			 echo "<p><a href=\"./index.php\">Página principal</a></p>\n";
		}
		else {
			echo "<h1>Erro na operação.</h1>\n";
				$arr = $operacao->errorInfo();		//mensagem de erro retornada pelo SGBD
				$erro = utf8_decode($arr[2]);
				echo "<p>$erro</p>";							//deve ser melhor tratado em um caso real
			    echo "<p><a href=\"./cadastroUsuario.php\">Retornar</a></p>\n";
		}
    }
}
catch (PDOException $e)
{
    // caso ocorra uma exceção, exibe na tela
    echo "Erro!: " . $e->getMessage() . "<br>";
    die();
}


?>
