<?php
    if(isset($_GET['id'])){
        $id= (int)$_GET['id'];
        $site= Painel::select('tb_site.especial','id = ?', array($id));
    }else{
        Painel::alert('erro','Você precisa passar o seu login ID :(');
        die();
    }
   ?>
   
    <div class="box-content">
        <h2>Editar Especialidade</h2>

        <form method="post" enctype="multipart/form-data">

        <?php 
        if(isset($_POST['acao'])){
            //enviei o meu formulário
        
            $descricao = $_POST['descricao'];
            $imagem = $_FILES['imagem'];
            $imagem_atual= $_POST['imagem_atual'];

            if($imagem['name'] != ''){
                //Existe o upload de imagem.
                if(Painel::imagemValidaIcon($imagem)){
                    Painel::deleteFileIcon($imagem_atual);
                    $imagem=Painel::uploadfileIcon($imagem);
                    $arr= ['descricao'=>$descricao,'icone'=>$imagem,'id'=>$id,'nome_tabela'=>'tb_site.especial'];
                    Painel::update($arr);
                    $slide= Painel::select('tb_site.especial','id = ?', array($id));
                    Painel::alert('sucesso','O site foi editado junto a imagem!');
                }else{
                    Painel::alert('erro','Não  possível atualizar junto a imagem!');
                }

            }else{
                $imagem = $imagem_atual;
                $arr= ['descricao'=>$descricao,'icone'=>$imagem,'id'=>$id,'nome_tabela'=>'tb_site.especial'];
                Painel::update($arr);
                $site= Painel::select('tb_site.especial','id = ?', array($id));
                Painel::alert('sucesso', 'O Site foi editado com sucesso!');
            }

        }

        
        ?>
          <div class="form-group">
                <label>Titulo:</label>
                <input type="text" name="descricao" required value="<?php echo $site['titulo'];?>">
            </div><!--form-group-->

            <div class="form-group">
                <label>Descrição:</label>
                <input type="text" name="descricao" required value= "<?php echo $site['descricao'];?>">
            </div><!--form-group-->
        

            <div class="form-group">
                <label style="padding: 5px;">Icone</label>
                <img style=" background-color:black; width:70px; height: 70px; border-radius: 50%;" src="<?php echo INCLUDE_PATH_PAINEL?>../icons/<?php echo $site['icone'];?>" alt="">
                <input type="file" name="imagem">
                <input type="hidden" name="imagem_atual" value="<?php echo $site['icone'];?>">
            </div><!--form-group-->

            <div class="form-group">
            <input type="submit" name="acao" value="Atualizar!">
            </div><!--form-group-->
            

        </form>
    </div><!--box-content-->