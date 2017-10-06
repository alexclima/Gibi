<?php
    require_once "cabecalho.php";
    require_once "GibiDao.php";
    require_once "Gibi.php";
    
    
    $gibi = new Gibi();
    
    
    $action='adiciona-gibi.php';     
    $ehAlteracao=false;
    $Marvel = "";
    $Dc = "";        
    
    
    if(isset($_REQUEST['uuid'])){
        
        require_once "conecta.php";
        
        $action = 'altera-gibi.php';
        $ehAlteracao=true;

        $gibiDao = new GibiDao($conexao);

        $gibi = $gibiDao->busca($_REQUEST['uuid']);
        
        if ("Marvel"==$gibi->getEditora()){
            $Marvel = "selected";
            $Dc = "";
        }else{
            $Marvel = "";
            $Dc = "selected"; 
        }         
        
    }
?>
    <main class="container">
        <div class="row">
            <div>
                <h1><?= $ehAlteracao?"Altera Gibis":"Guarda Gibis"?></h1>
                    <form action = "<?= $action?>" method="post">
                    
                    <input type="hidden" name="uuid" value="<?= $gibi->getUuid()?>">
                    
                    <div class="form-group">
                        <label for="">Gibi:</label> 
                        <input type="text" class="form-control" name="nome" value="<?= $gibi->getNome();?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="">Numero:</label> 
                        <input type="text" class="form-control" name="numero" value="<?= $gibi->getNumero();?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="">Editora:</label> 
                        <select class="form-control"name="editora">                                                                                
                            <option value="">Escolha a Editora</option>
                            <option disabled>-----------------</option>
                            <option value="Marvel" <?=$Marvel?>>Marvel</option>
                            <option value="Dc" <?=$Dc?>>Dc Comics</option>                            
                        </select>
                    </div>
                    
                    <input type="hidden" name="imagem" value="<?= $gibi->getImagem()?>">
                    
                    <button type="submit" class="btn btn-default">Guardar</button>
                </form>
            </div>
        </div>
    </main>

    <div class="row">
        
    </div>    

<?php
    require_once "rodape.php";
?>