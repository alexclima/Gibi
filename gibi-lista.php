<?php 
    require_once "conecta.php";
    require_once "cabecalho.php";
    require_once "GibiDao.php";
    

    $gibiDao = new GibiDao($conexao);
    
    $gibis = $gibiDao->lista();

?>

<?php 
    if(array_key_exists('removido',$_REQUEST)){
        if ($_REQUEST['removido']=='true'){
        ?>
        <p class="alert alert-info msg">Gibi Removido com sucesso</p>
    <?php
        }else{
    ?>
        <p class="alert alert-danger msg">Gibi nao removido</p> 
    <?php
        }
    }
?>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="text-center">Listagem</h1>
                </div>
                
                <table class="table table-hover">
                    
                        <thead>
                            
                            <tr>
                              <th>Nome</th>
                              <th class="text-center">Numero</th>
                              <th></th>
                              <th></th> 
                            </tr>
                            
                        </thead>
                    <?php
                        foreach($gibis as $gibi): 
                    ?>
                        <tr>                       

                            <td>  <?= $gibi->getNome()?></td>
                            
                            <td class="text-center">  <?= $gibi->getNumero()?></td>

                            <td>            
                                <form action="remove-gibi.php" method="post">

                                    <input type="hidden" name="uuid" value="<?= $gibi->getUuid()?>">

                                    <button type="submit" class="remove btn btn-danger">Remover</button>
                                </form>
                            </td>

                            <td>            
                                <a class="btn btn-default" href="index.php?uuid=<?= $gibi->getUuid()?>">Alterar</a>
                            </td>
                        </tr>
                    <?php
                        endforeach; 
                    ?>
                </table>
            </div>
        </div>
<script>
    [...document.querySelectorAll('table tr .remove')]
    .forEach(a=>a.onclick=event=>{
        if (!confirm('confirma?')){
            event.preventDefault();
        };
    });

    setTimeout(()=>document.querySelector('.msg').remove(),5000);
</script>
<?php 
    require_once "rodape.php";    
?>