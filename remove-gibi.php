<?php
      
    require_once "Gibi.php";
    require_once "GibiDao.php";
    require_once 'conecta.php';
    
    $gibi = new Gibi();
        
    $uuid = $_REQUEST['uuid'];    
    
    $gibiDao = new GibiDao($conexao);
    
    if($gibiDao->remove($uuid)){
        header('Location:gibi-lista.php?removido=true');
    }else{ 
        header('Location:gibi-lista.php?removido=false');
    }
    die();    
?>
