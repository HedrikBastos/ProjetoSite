<?php
    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        Painel::deletar('tb_site.especial',$idExcluir);
        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-especial');
    }else if(isset($_GET['order']) && isset($_GET['id'])){
        Painel::orderItem('tb_site.especial',$_GET['order'],$_GET['id']);
    }

    $paginaAtual= isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina= 4;
    $servico = Painel::selectAll('tb_site.especial', ($paginaAtual -1)* $porPagina,$porPagina);
    $SiteConfig = Painel::select('tb_site.config',false);
?>

<div class="box-content">
    <h2>Editar Site</h2>
    <form method="post" enctype="multipart/form-data">
        <?php 
                if(isset($_POST['acao'])){
                    if(Painel::update($_POST,true)){
                        Painel::alert('sucesso','Site editado com sucesso!');
                        $SiteConfig = Painel::select('tb_site.config',false);
                    }else{
                        Painel::alert('erro','Campos vazios não são permetidos!');
                    }              
                }
    
        ?>


                
        <div class="wraper-table">
            <div class="form-group">
                <label>Titulo do site:</label>
                <input type="text" name="titulo" value="<?php echo $SiteConfig['titulo'];?>" >
            </div><!--form-group-->

            <div class="form-group">
                <label>nome do autor:</label>
                <input type="text" name="nome_autor" value="<?php echo $SiteConfig['nome_autor'];?>" >
                </div><!--form-group-->

            <div class="form-group">
                <label>Descrição:</label>
                 <textarea name="descricao" cols="50" rows="10"> <?php echo $SiteConfig['descricao'];?> </textarea>
            </div><!--form-group-->

        <div class="form-group">      
            <input type="hidden" name="nome_tabela" value="tb_site.config">
           <input type="submit" name="acao" value="Atualizar!">
        </div><!--form-group-->
    </form>
   
    <table>
        <tr>
        <td>Título e ícone</td>
            <td>Descrição</td>            
            <td>Editar </td>
            
           
        </tr>

        <?php
            foreach ($servico as $key => $value) {      
        ?>

        <tr>
            <td><?php echo $value['titulo']; ?></td>
            <td><?php echo $value['descricao'] ?> </td>
            
            <td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL?>editar-site?id=<?php echo $value['id'];?>"> Editar</a></td>
            
           
           
        </tr>
        <?php } ?>
    </table>
    </div><!--wraper-table-->

    <div class="paginacao">
       <?php 
            $totalPaginas = ceil(count(Painel::selectAll('tb_site.especial')) / $porPagina);

            for($i = 1; $i <= $totalPaginas; $i ++){
                if($i == $paginaAtual)
                    echo '<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'editar-site?pagina='.$i.'">'.$i.'</a>';
                else
                    echo '<a href="'.INCLUDE_PATH_PAINEL.'editar-site?pagina='.$i.'">'.$i.'</a>';
            }
       ?>
    </div><!--paginacao-->

</div><!--box-content-->