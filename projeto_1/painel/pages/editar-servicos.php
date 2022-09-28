<?php 
    if(isset($_GET['id'])){
        $id= (int)$_GET['id'];
        $servicos = Painel::select('tb_site.servicos','id = ?', array($id));
    }else{
        Painel::alert('erro','Você precisa passar o seu login ID :(');
        die();
    }
?>

<div class="box-content">
    <h2>Editar Serviço</h2>

    <form method="post" enctype="multipart/form-data">

            <?php 
                if(isset($_POST['acao'])){
                    if(Painel::update($_POST)){
                        Painel::alert('sucesso','Serviço editado com sucesso!');
                        $servicos = Painel::select('tb_site.servicos','id = ?',array($id));
                    }else{
                        Painel::alert('erro','Campos vazios não são permetidos!');
                    }              
                }
    
             ?>

        <div class="form-group">
            <label>Nome da pessoa:</label>
            <input type="text" name="nome" value="<?php echo $servicos['nome'];?>" >

        <div class="form-group">
            <label>Serviço:</label>
         <textarea name="servico" cols="50" rows="10"> <?php echo $servicos['servico'];?> </textarea>
        </div><!--form-group-->

        <div class="form-group">
            <label>Data:</label>
            <input formato="data" type="text" name="data" value="<?php echo $servicos['data'];?>" >
        </div><!--form-group-->
     

        <div class="form-group"> 
           <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="hidden" name="nome_tabela" value="tb_site.servicos">
           <input type="submit" name="acao" value="Atualizar!">
        </div><!--form-group-->
        

    </form>
</div><!--box-content-->