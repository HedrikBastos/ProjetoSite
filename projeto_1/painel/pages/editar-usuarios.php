
   <div class="box-content">
        <h2>Editar usuário</h2>

        <form method="post" enctype="multipart/form-data">

        <?php 
        if(isset($_POST['acao'])){
            //enviei o meu formulário
        
            $nome = $_POST['nome'];
            $senha = $_POST['password'];
            $imagem = $_FILES['imagem'];
            $imagem_atual= $_POST['imagem_atual'];
            $usuario = new Usuario();

            if($imagem['name'] != ''){
                //Existe o upload de imagem.
                if(Painel::imagemValida($imagem)){
                    Painel::deleteFile($imagem_atual);
                    $imagem=Painel::uploadfile($imagem);
                    if($usuario->atualizarUsuario($nome,$senha,$imagem)){
                    $_SESSION['imagem'] = $imagem;
                    Painel::alert('sucesso','Atualizado com sucesso junto a imagem!');
                }else{
                    Painel::alert('erro','Não  possível atualizar junto a imagem!');
                }

            }else{
                Painel::alert('erro', 'Formato não é valido');
            }

            }else{ 
                $imagem= $imagem_atual;
                if($usuario-> atualizarUsuario($nome,$senha,$imagem)){
                    Painel::alert('sucesso','Atualizado com sucesso!');
                }else{
                    Painel::alert('erro','Não  possível atualizar!');
                }
            
            }
        }
        
        ?>

            <div class="form-group">
                <label>Nome:</label>
                <input type="text" name="nome" required value=<?php echo $_SESSION['nome'];?>>
            </div><!--form-group-->
            <div class="form-group">
                <label>Senha:</label>
                <input type="password" name="password" required value=<?php echo $_SESSION['password'];?>>
            </div><!--form-group-->

            <div class="form-group">
                <label>Imagem</label>
                <input type="file" name="imagem" required>
                <input type="hidden" name="imagem_atual" value="<?php echo $_SESSION['imagem'];?>">
            </div><!--form-group-->

            <div class="form-group">
            <input type="submit" name="acao" value="Atualizar!">
            </div><!--form-group-->
            

        </form>
    </div><!--box-content-->