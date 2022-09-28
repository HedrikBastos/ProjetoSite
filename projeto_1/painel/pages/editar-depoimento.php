<?php 
    if(isset($_GET['id'])){
        $id= (int)$_GET['id'];
        $depoimentos = Painel::select('tb_site.depoimentos','id = ?', array($id));
    }else{
        Painel::alert('erro','Você precisa passar o seu login ID :(');
        die();
    }
?>

<div class="box-content">
    <h2>Editar depoimento</h2>

    <form method="post" enctype="multipart/form-data">

            <?php 
                if(isset($_POST['acao'])){
                    if(Painel::update($_POST)){
                        Painel::alert('sucesso','Depoimento editado com sucesso!');
                        $depoimentos = Painel::select('tb_site.depoimentos','id = ?',array($id));
                    }else{
                        Painel::alert('erro','Campos vazios não são permetidos!');
                    }              
                }
    
             ?>

        <div class="form-group">
            <label>Nome da pessoa:</label>
            <input type="text" name="nome" value="<?php echo $depoimentos['nome'];?>" >

        <div class="form-group">
            <label>depoimentos:</label>
         <textarea name="depoimentos" cols="50" rows="10"> <?php echo $depoimentos['depoimentos'];?> </textarea>
        </div><!--form-group-->

        <div class="form-group">
            <label>Data:</label>
            <input formato="data" type="text" name="data" value="<?php echo $depoimentos['data'];?>" >
        </div><!--form-group-->
     

        <div class="form-group"> 
           <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="hidden" name="nome_tabela" value="tb_site.depoimentos">
           <input type="submit" name="acao" value="Atualizar!">
        </div><!--form-group-->
        

    </form>
</div><!--box-content-->