
<div class="box-content">
    <h2>Cadastrar Serviço</h2>

    <form method="post" enctype="multipart/form-data">

    <?php 
    if(isset($_POST['acao'])){
        if(Painel::insert($_POST)){
            Painel::alert('sucesso','Serviço cadastrado com sucesso!');
        }else{
            Painel::alert('erro','Campos vazios não são permitidos!');
        }
    }    
    
    ?>

        <div class="form-group">
            <label>Nome da pessoa:</label>
            <input type="text" name="nome"  >

        <div class="form-group">
            <label>Serviço:</label>
         <textarea name="servico" cols="50" rows="10"></textarea>
        </div><!--form-group-->

        <div class="form-group">
            <label>Data:</label>
            <input formato="data" type="text" name="data">
        </div><!--form-group-->
     

        <div class="form-group">
            <input type="hidden" name="order_id" value="0">
            <input type="hidden" name="nome_tabela" value="tb_site.servicos">
           <input type="submit" name="acao" value="Cadastrar!">
        </div><!--form-group-->
        

    </form>
</div><!--box-content-->