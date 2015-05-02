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
          <li class="active"><a href="cadastroUsuario.php">Cadastrar Usuário</a></li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>   

     <div class="container">

      <div>
		 <form method="POST" enctype="multipart/form-data" action="./cadastroNovoUsuario.php">
		 <h3>Cadastro</h3>
			  <div >
				<label for="InputNome">Nome:</label><br/>
				<input type="text" id="nome" name="nome" placeholder="Nome" required autofocus>
			  </div>
                          <div>
                              
				<label for="cidade">Cidade:</label><br/>
                                <input type="text" id="cidade" name="cidade" placeholder="cidade">
                                        
			  </div>
                          
                           <div>
                              
				<label for="estado">Estado:</label><br/>
                                <input type="text" id="estado" name="estado" placeholder="estado">
                                        
			  </div>
                 
                          <div>
				<label for="InputFoto">Foto:</label><br/>
				<input type="file"  id="InputFoto" name="foto" placeholder="Foto" required autofocus>
			  </div>
                 
                          <div>
				<label for="InputEmail">E-Mail:</label><br/>
				<input type="text" id="email" name="email" placeholder="E-mail" required autofocus>
			  </div>
                          
                          <div>
				<label for="InputDescricao">Descrição:</label><br/>
                                <textarea rows="6" cols="20" id="InputDescricao" name="descricao" placeholder="Descrição" required autofocus></textarea>
                                
			  </div>
                

			  <button type="submit">Cadastrar</button>
		 </form>

	 </div>
  
    </div>
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

