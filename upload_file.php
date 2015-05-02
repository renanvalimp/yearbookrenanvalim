<?php

function inserirFoto($Usuario, $Foto){
$permissoes = array("gif", "jpeg", "jpg", "png", "image/gif", "image/jpeg", "image/jpg", "image/png");  //strings de tipos e extensoes validas
$temp = explode(".", basename($Foto["name"]));
$extensao = end($temp);

if ((in_array($extensao, $permissoes))
&& (in_array($Foto["type"], $permissoes))
&& ($Foto["size"] < 999999))
  {
  if ($Foto["error"] > 0)
    {
    echo "<h1>Erro no envio, código: " . $Foto["error"] . "</h1>";
    }
  else
    {
	  $dirUploads = "fotos/";
      $nomeUsuario = $Usuario."/";	  
	  
	  if(!file_exists ( $dirUploads ))
			mkdir($dirUploads, 0500);  //permissao de leitura e execucao
	  
	  $caminhoUpload = $dirUploads.$nomeUsuario;
	  if(!file_exists ( $caminhoUpload ))
			mkdir($caminhoUpload, 0700);  //permissoes de escrita, leitura e execucao
			
	  $pathCompleto = $caminhoUpload.basename($Foto["name"]);
      if(move_uploaded_file($Foto["tmp_name"], $pathCompleto)){
                return $pathCompleto;
		
      }else{
                return null;
                 }
    }
  }
else
  {
  echo "<h1>Arquivo inválido<h1>";
  }
include ("../modelos/rodape_html.html");
}
?> 