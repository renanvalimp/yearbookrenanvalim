<?php

include_once 'confBD.php';
include_once 'AlunoVO.php';
class AlunoDAO {
    public static function listarAlunos(){
        $conn = conn_mysql();                
        
        $SQL = "SELECT * FROM alunos";
        
        $operacao = $conn->prepare($SQL);
        
        $gravar = $operacao->execute();
        
        $resulado = $operacao->fetchAll();
        
         $array = array();
        foreach ($resulado as $linha) {
          $alunos = new AlunoVO();
          $alunos->setId($linha["id"]);
          $alunos->setNome(utf8_encode($linha["nome"]));
          $alunos->setDescricao(utf8_encode($linha["descricao"]));
          $alunos->setFoto($linha["foto"]);
          $alunos->setCidade($linha["cidade"]);
          $alunos->setEstado($linha["estado"]);
          $alunos->setEmail($linha["email"]);
          
          $array[] = array($alunos);
        }
        
        return $array;
        
    }
    
    
    public static function PegarAluno( $idaluno){
        $conn = conn_mysql();                
        
        $SQL = "SELECT * FROM alunos WHERE ID = ?";
        
        $operacao = $conn->prepare($SQL);
        
        $gravar = $operacao->execute(array($idaluno));
        
        $resulado = $operacao->fetchAll();
        
         $array = array();
        foreach ($resulado as $linha) {
          $alunos = new AlunoVO();
          $alunos->setId($linha["id"]);
          $alunos->setNome(utf8_encode($linha["nome"]));
          $alunos->setDescricao(utf8_encode($linha["descricao"]));
          $alunos->setFoto($linha["foto"]);
          $alunos->setCidade($linha["cidade"]);
          $alunos->setEstado($linha["estado"]);
          $alunos->setEmail($linha["email"]);
          
          $array[] = array($alunos);
        }
        
        return $array;
        
    }
}
