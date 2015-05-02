<?php

require_once("./dao/confBD.php");
require_once("./dao/AlunoVO.php");
include_once("/upload_file.php");
?>

<!DOCTYPE html>

<?php include_once 'dao/AlunoDAO.php';?>
<?php include_once 'dao/AlunoVO.php';?>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>YearBook</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

  <!--  <style>#colunas > div > div{background: #CCC; border: thin black solid;}</style>-->
  </head>
  <body>
  <nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">YearBooks</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
          <li class="active"><a href="index.php">Main Page</a></li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>   

<?php
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
                    
                        ?>
                         <div class="container">
                           <h1>Cadastro efetuado com sucesso.</h1>
                         </div> 
                        <?php
			 
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

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
