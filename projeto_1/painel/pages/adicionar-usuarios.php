<?php
    verificaPermissaoPagina(2);
?>

<div class="box-content">
    <h2>Adicionar usuário</h2>

    <form method="post" enctype="multipart/form-data">

    <?php 
    if(isset($_POST['acao'])){
        //enviei o meu formulário
        $login= $_POST['login'];
        $nome = $_POST['nome'];
        $senha = $_POST['password'];
        $imagem = $_FILES['imagem'];
        $cargo= $_POST['cargo'];

        if($login ==''){
            Painel::alert('erro','O login esta vazio!');
        }else if($nome == ''){
            Painel::alert('erro','O nome esta vazio!');
        }else if($senha==''){
            Painel::alert('erro','Senha não preenchida!');
        }else if($cargo==''){
            Painel::alert('erro','Cargo precisa ser selecionado!');
        }else if($imagem==''){
            Painel::alert('erro','A imagem precisa ser selecionada!');
        }else{
            //podemos cadastrar!
            if($cargo >= $_SESSION['cargo']){
                Painel::alert('erro','Você precisa selecionar um cargo menos que o seu!');
            }else if(Painel::imagemValida($imagem)== false){
                Painel::alert('erro','Imagem muito grande ou formato inválido!');
            }else if(Usuario::userExists($login)){
                Painel::alert('erro','Login já existe!');
                
            }
            
            else{
                //Apenas casdastrar no bando de dados!
                $usuario = new Usuario();
                $imagem= Painel::uploadfile($imagem);
                $usuario->cadastrarUsuario($login,$senha,$imagem,$nome,$cargo);
                Painel::alert('sucesso','Usuário '.$login.' cadastrado com sucesso!');
            }
        }
       
    }
    
    ?>

        <div class="form-group">
            <label>Login:</label>
            <input type="text" name="login"  >

        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome"  >
        </div><!--form-group-->
        <div class="form-group">
            <label>Senha:</label>
            <input type="password" name="password"  >
        </div><!--form-group-->

        <form class="form-group">
            <label for="cargos">
                <select name="cargo">
                    <?php foreach (Painel::$cargos as $key => $value) {
                        echo '<option value="'.$key.'">'.$value.'</option>';
                    } ?>
                </select>
            </label>
        </form><!--form-group-->

        <div class="form-group">
            <label>Imagem</label>
            <input type="file" name="imagem" >
        </div><!--form-group-->

        <div class="form-group">
           <input type="submit" name="acao" value="Atualizar!">
        </div><!--form-group-->
        

    </form>
</div><!--box-content-->