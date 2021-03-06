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
          
          <?php 
           $i = 1;
      $array = AlunoDAO::listarAlunos();
      foreach ($array as $linha){
       
        ?>  

    <?php
    if($i == 1){
    ?>    
    <div class="row">
    <?php  } ?>
        <div class="col-sm-6 col-md-3">
            <img class="img-rounded" width="130px" height="180px" src="<?php echo $linha[0]->getFoto();?>" 
                 class="img-responsive" alt="<?php echo $linha[0]->getNome();?>">
            <p><?php echo $linha[0]->getNome();?></p>
            <p><?php echo $linha[0]->getDescricao();?></p>
            <p><a href="perfil.php?id=<?php echo $linha[0]->getId(); ?>"><button class="btn btn-info">Mais detalhes</button></a></p>
        </div>
    <?php
    if($i == 4){
    ?>     
    </div>
    <?php } ?>
          <?php $i++; if($i == 5){$i = 1;} } ?>
      </div>
      
      
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>