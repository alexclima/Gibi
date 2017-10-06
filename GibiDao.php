<?php
    require_once "conecta.php";
    require_once "Gibi.php";       
    
    class GibiDao{
        
       private $conexao;

        function __construct($conexao){
            $this->conexao=$conexao;           
        }        
        
        function lista(){
            $gibis = array();
            $query = "SELECT * FROM gibis order by nome asc";
            $resultado = mysqli_query($this->conexao,$query);
            error_log(mysqli_error($this->conexao));
            while($array = mysqli_fetch_assoc($resultado)){
                
                $gibi =new Gibi();

                $gibi->setId($array['id']);
                $gibi->setUuid($array['uuid']);
                $gibi->setNome($array['nome']);
                $gibi->setNumero($array['numero']);
                $gibi->setEditora($array['editora']);
                $gibi->setImagem($array['imagem']);

                array_push($gibis,$gibi);
            }
            return $gibis;
        }
        
        function insere($gibi){
            $uuid = uniqid();            
            $query = "INSERT INTO gibis(uuid,nome,numero,editora,imagem) VALUES ('$uuid','{$gibi->getNome()}','{$gibi->getNumero()}','{$gibi->getEditora()}','{$gibi->getImagem()}')";
            $resultado = mysqli_query($this->conexao,$query);
            return $resultado;
        }
        
        function busca($uuid){
            $query = "SELECT * FROM gibis WHERE uuid='{$uuid}'";
            $resultado = mysqli_query($this->conexao,$query);
            $array=mysqli_fetch_assoc($resultado);
            
            $gibi = new Gibi;
            $gibi->setId($array['id']);
            $gibi->setUuid($array['uuid']);
            $gibi->setNome($array['nome']);
            $gibi->setNumero($array['numero']);
            $gibi->setEditora($array['editora']);
            $gibi->setImagem($array['imagem']); 
            
            return $gibi;
        }
        
        function remove($uuid){
            $query = "DELETE FROM gibis WHERE uuid='{$uuid}'";
            $resultado = mysqli_query($this->conexao,$query);
            return $resultado;
        }
        
        function altera($gibi){
            $query = "UPDATE gibis SET nome='{$gibi->getNome()}',numero='{$gibi->getNumero()}',editora='{$gibi->getEditora()}',imagem='{$gibi->getImagem()}' WHERE uuid='{$gibi->getUuid()}'";
            $resultado = mysqli_query($this->conexao,$query);
            return $resultado;
        }
        
    } 
?>