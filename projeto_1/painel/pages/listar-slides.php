<?php
    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        $selectImagem= Mysql::conectar()->prepare("SELECT slide FROM `tb_slides` WHERE id = ?");
        $selectImagem->execute(array($_GET['excluir']));

        $imagem= $selectImagem->fetch()['slide'];
        Painel::deleteFileSlide($imagem);
        Painel::deletar('tb_slides',$idExcluir);
        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-slides');
    }else if(isset($_GET['order']) && isset($_GET['id'])){
        Painel::orderItem('tb_slides',$_GET['order'],$_GET['id']);
    }

    $paginaAtual= isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina= 4;
    $slides = Painel::selectAll('tb_slides', ($paginaAtual -1)* $porPagina,$porPagina);
?>

    <div class="box-content">
    <h2>Slides Cadastrados</h2>
   <div class="wraper-table">
    <table>
        <tr>
            <td>nome</td>
            <td>slides</td>
            <td>Editar</td>
            <td>Excluir</td>
            <td>#</td>
            <td>#</td>
        </tr>

        <?php
            foreach ($slides as $key => $value) {      
        ?>

        <tr>
            <td><?php echo $value['nome']; ?></td>
            <td><img style="width:50px; height: 50px;" src="<?php echo INCLUDE_PATH_PAINEL?>../imagens/<?php echo $value['slide'];?>" alt=""></td>
            <td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL?>editar-slides?id=<?php echo $value['id'];?>"> Editar</a></td>
            <td><a  actionBtn="delete" class=" btn delete" href="<?php echo INCLUDE_PATH_PAINEL?>listar-slides?excluir=<?php echo $value['id'];?>"> Excluir</a></td>
            <td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL?>listar-slides?order=up&id=<?php echo $value['id'];?>"><i >&#8593;</i></a></td>	
            <td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL?>listar-slides?order=down&id=<?php echo $value['id'];?>"><i>&#8595;</i></a></td>
           
        </tr>
        <?php } ?>
    </table>
    </div><!--wraper-table-->

    <div class="paginacao">
       <?php 
            $totalPaginas = ceil(count(Painel::selectAll('tb_slides')) / $porPagina);

            for($i = 1; $i <= $totalPaginas; $i ++){
                if($i == $paginaAtual)
                    echo '<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'listar-slides?pagina='.$i.'">'.$i.'</a>';
                else
                    echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-slides?pagina='.$i.'">'.$i.'</a>';
            }
       ?>
    </div><!--paginacao-->

</div><!--box-content-->