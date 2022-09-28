<?php
    if(isset($_GET['id'])){
        $id= (int)$_GET['id'];
        $slide= Painel::select('tb_slides','id = ?', array($id));
    }else{
        Painel::alert('erro','Você precisa passar o seu login ID :(');
        die();
    }
   ?>
   
    <div class="box-content">
        <h2>Editar slide</h2>

        <form method="post" enctype="multipart/form-data">

        <?php 
        if(isset($_POST['acao'])){
            //enviei o meu formulário
        
            $nome = $_POST['nome'];
            $imagem = $_FILES['imagem'];
            $imagem_atual= $_POST['imagem_atual'];

            if($imagem['name'] != ''){
                //Existe o upload de imagem.
                if(Painel::imagemValida($imagem)){
                    Painel::deleteFileSlide($imagem_atual);
                    $imagem=Painel::uploadfileSlide($imagem);
                    $arr= ['nome'=>$nome,'slide'=>$imagem,'id'=>$id,'nome_tabela'=>'tb_slides'];
                    Painel::update($arr);
                    $slide= Painel::select('tb_slides','id = ?', array($id));
                    Painel::alert('sucesso','O slide foi editado junto a imagem!');
                }else{
                    Painel::alert('erro','Não  possível atualizar junto a imagem!');
                }

            }else{
                $imagem = $imagem_atual;
                $arr= ['nome'=>$nome,'slide'=>$imagem,'id'=>$id,'nome_tabela'=>'tb_slides'];
                Painel::update($arr);
                $slide= Painel::select('tb_slides','id = ?', array($id));
                Painel::alert('sucesso', 'O Slide foi editado com sucesso!');
            }

        }
        
        
        ?>

            <div class="form-group">
                <label>Nome:</label>
                <input type="text" name="nome" required value= <?php echo $slide['nome'];?>>
            </div><!--form-group-->
        

            <div class="form-group">
                <label style="padding: 5px;">Imagem</label>
                <img style="width:70px; height: 70px; border-radius: 50%;" src="<?php echo INCLUDE_PATH_PAINEL?>../imagens/<?php echo $slide['slide'];?>" alt="">
                <input type="file" name="imagem">
                <input type="hidden" name="imagem_atual" value="<?php echo $slide['slide'];?>">
            </div><!--form-group-->

            <div class="form-group">
            <input type="submit" name="acao" value="Atualizar!">
            </div><!--form-group-->
            

        </form>
    </div><!--box-content-->