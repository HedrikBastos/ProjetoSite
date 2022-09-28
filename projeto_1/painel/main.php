<?php
    if(isset($_GET['Loggout'])){
        Painel::loggout();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL?>css/style.css">
    <title>Document</title>
</head>

<body>
    <div class="menu">
        <div class="menu-wraper">
        <div class="box-usuario">
            <?php
                if($_SESSION['imagem']==''){
            ?>
            <div class="avatar-usuario">
                <img name="avatar" src="../icons/person_white_24dp.svg" alt="avatar-usuario">
            </div><!--avatar-usuario-->
            <?php }else{ ?>
                <div class="imagem-usuario">
                    <img src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $_SESSION['imagem'];?>" alt="foto"/>
                </div><!--imagem-usuario-->
                <?php } ?>
            <div class="nome-usuario">
                <p><?php echo $_SESSION['nome']; ?></p>
                <p><?php echo pegaCargo($_SESSION['cargo']); ?></p>
            </div><!--nome-usuario-->
        </div><!--box-usuario-->
        <div class="items-menu">
            <h2>Cadastro</h2>
            <a <?php selecioneMenu('cadastrar-depoimentos');?> href="<?php INCLUDE_PATH_PAINEL?>cadastrar-depoimentos">Cadastrar Depoimentos</a>
            <a  <?php selecioneMenu('cadastrar-servico');?> href="<?php INCLUDE_PATH_PAINEL?>cadastrar-servico">Cadastrar Serviço</a>
            <a  <?php selecioneMenu('cadastrar-slides');?> href="<?php INCLUDE_PATH_PAINEL?>cadastrar-slides">Cadastrar Slides</a>
            <h2>Gestão</h2>
            <a <?php selecioneMenu('listar-depoimentos');?> href="<?php INCLUDE_PATH_PAINEL?>listar-depoimentos">Listar Depoimentos</a>
            <a <?php selecioneMenu('listar-servicos');?> href="<?php INCLUDE_PATH_PAINEL?>listar-servicos">Listar serviços</a>
            <a <?php selecioneMenu('listar-slides');?> href="<?php INCLUDE_PATH_PAINEL?>listar-slides">Listar Slides</a>
            <h2>Administração do painel</h2>
            <a <?php selecioneMenu('editar-usuarios');?> href="<?php INCLUDE_PATH_PAINEL?>editar-usuarios">Editar Usuário</a>
            <a <?php selecioneMenu('adicionar-usuarios');?> <?php verificaPermissaoMenu(2); ?> href="<?php INCLUDE_PATH_PAINEL?>adicionar-usuarios">Adicionar Usuários</a>
            <h2>Configuração Geral</h2>
            <a <?php selecioneMenu('editar-site');?> href="<?php INCLUDE_PATH_PAINEL?>config-site">Configuraçães do Site</a>
        </div><!--items-menu-->
        </div><!--menu-wraper-->
    </div><!--menu-->
    <header>
        <div class="center">
            <div class="menu-btn">
                <img src="../icons/menu_white_24dp.svg" alt="menu">
            </div><!--menu-btn-->
            <div class="loggout">
              <a <?php if(@$_GET['url']==''){?> style="background: #60727a79; padding: 17px;" <?php } ?> href=" <?php echo INCLUDE_PATH_PAINEL ?>"><img src="..//icons/home_white_24dp.svg" alt="pagina inicial"><span>Página Inicial</span></a>
                <a href="<?php echo INCLUDE_PATH_PAINEL?>?Loggout"><img src="../icons/close_white_24dp.svg" alt="Sair"> <span>Sair </span></a>

            </div><!--div-loggout-->
            <div class="clear"></div>
        </div>
    </header>
<div class="content">

   <?php Painel::carregarPagina(); ?>             
    
</div><!--contant-->
<script src="<?php echo INCLUDE_PATH?>js/jquery.js"></script>
<script  src="<?php echo INCLUDE_PATH_PAINEL?>js/jquery.mask.js"></script>
<script  src="<?php echo INCLUDE_PATH_PAINEL?>js/main.js"></script>
</body>
</html>