
<div class="box-content">
    <h2>Cadastrar Slider</h2>

    <form method="post" enctype="multipart/form-data">

    <?php 
    if(isset($_POST['acao'])){
        $nome = $_POST['nome'];
        $imagem = $_FILES['imagem'];       
        
        if($nome == ''){
            Painel::alert('erro','O nome esta vazio!');
        }else{
            //podemos cadastrar!
             if(Painel::imagemValida($imagem)== false){
                Painel::alert('erro','Imagem muito grande ou formato inválido!');
            }
            
            else{
                //Apenas casdastrar no bando de dados!
                //include '../classes/lib/WideImage.php' ;
                $imagem= Painel::uploadfileSlide($imagem);
                //WideImage :: load ( 'uploads/'.$imagem) -> resize ( 100 ) -> saveToFile ( 'uploads/'.$imagem ) ;
                $arr= ['nome'=>$nome,'slide'=>$imagem,'order_by'=>'0','nome_tabela'=>'tb_slides'];
                Painel::insert($arr);
                Painel::alert('sucesso','Slide cadastrado com sucesso!');
            }
    }}
       
    
    
    ?>

        <div class="form-group">
            <label>Nome do Slider:</label>
            <input type="text" name="nome"  >
        </div><!--form-group-->

        <div class="form-group">
            <label>Imagem</label>
            <input type="file" name="imagem" >
        </div><!--form-group-->

        <div class="form-group">
           <input type="submit" name="acao" value="Atualizar!">
        </div><!--form-group-->
        

    </form>
</div><!--box-content-->