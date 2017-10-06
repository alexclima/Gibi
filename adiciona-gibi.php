<?php
    require_once "cabecalho.php";    
    require_once "Gibi.php";
    require_once "GibiDao.php";
    require_once 'conecta.php';
    
    $gibi = new Gibi();
    
    
    $gibi->setNome($_REQUEST['nome']);
    $gibi->setNumero($_REQUEST['numero']);
    $gibi->setEditora($_REQUEST['editora']);
    
    $gibiDao = new GibiDao($conexao);
    
    if($gibiDao->insere($gibi)){?>
        <p class="alert alert-info">O Gibi <?=$gibi->getNome()?> foi adicionado com sucesso</p>
    <?php }else{?>
        <p class="alert alert-danger">O Gibi <?=$gibi->getNome()?> nao foi adicionado</p>
    <?php }
    require_once "rodape.php";
?>