<?php

    require_once "cabecalho.php"; 
    require_once "Gibi.php";
    require_once "GibiDao.php";
    require_once 'conecta.php';
    
    $gibi = new Gibi();
    
    $gibi->setUuid($_REQUEST['uuid']);    
    $gibi->setNome($_REQUEST['nome']);
    $gibi->setNumero($_REQUEST['numero']);
    $gibi->setEditora($_REQUEST['editora']);
    $gibi->setImagem($_REQUEST['imagem']);
    
    $gibiDao = new GibiDao($conexao);   

         if($gibiDao->altera($gibi)){
            ?>

                <p class="alert alert-info">Gibi <?=$gibi->getNome()?>,  alterado com sucesso</p>

                    <?php }else{
                        $msg=mysqli_error($conexao);
                        error_log($msg);
                        ?>

                <p class="alert alert-danger">Gibi <?=$gibi->getNome()?>, nao foi alterado </p>

            <?php  
         }

require_once "rodape.php"; ?>

