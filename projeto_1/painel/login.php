<?php
if(isset($_COOKIE['lembrar'])){
    $user =$_COOKIE['user'];
    $password = $_COOKIE['password'];
    $sql= MySql::conectar()->prepare("SELECT * FROM `tb_adm.usuarios` WHERE user = ? AND password = ?");
    $sql->execute(array($user,$password));
    if($sql->rowCount()== 1){
        $info = $sql->fetch();
        $_SESSION['login']= true;
        $_SESSION['user']= $user;
        $_SESSION['password']= $password;
        $_SESSION['cargo']=$info['cargo'];
        $_SESSION['nome']=$info['nome'];
        $_SESSION['imagem']=$info['img'];
        header('Location: '.INCLUDE_PATH_PAINEL);
        die();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL?>css/style.css">
    <title>Document</title>
</head>
<body>
    
    <div class="box-login">
        <?php
           if(isset($_POST['acao'])){
               $user=$_POST['user'];
               $password=$_POST['password'];
               $sql= MySql::conectar()->prepare("SELECT * FROM `tb_adm.usuarios` WHERE user = ? AND password = ?");
                $sql->execute(array($user,$password));
                if($sql->rowCount()== 1){
                    $info= $sql ->fetch();
                    //logamos com sucesso.
                    $_SESSION['login']= true;
                    $_SESSION['user']= $user;
                    $_SESSION['password']= $password;
                    $_SESSION['cargo']=$info['cargo'];
                    $_SESSION['nome']=$info['nome'];
                    $_SESSION['imagem']=$info['img'];
                    if(isset($_POST['lembrar'])){
                        setcookie('lembrar',true,time()+(60*60*24),'/');
                        setcookie('user',$user,time()+(60*60*24),'/');
                        setcookie('password',$password,time()+(60*60*24),'/');
                    }
                    header('Location: '.INCLUDE_PATH_PAINEL);
                    die();
                }else{
                    //falhou
                    echo ' <div class="erro-box"> <img src="../icons/sentiment_very_dissatisfied_white_24dp.svg" alt="SAD">  Usuário ou senha incorretos!</div>';
                }
                

           }
        ?>
        <h2>Faça login:</h2>
        <form method="POST" action="">
            <input type="text" name="user" id="" placeholder="Login" required>
            <input type="password" name="password" id="" placeholder="Senha" required>
        <div class="left">
            <input type="submit" name="acao" value="Logar">
        </div>
        <div class="form-group-login ">
            <label>Lembrar-me</label>
            <input type="checkbox" name="lembrar" />
        </div>
        <div class="clear"></div>
        </form>
    </div><!--box-login-->
   
</body>
</html>