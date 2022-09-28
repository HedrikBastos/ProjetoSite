<?php
   session_start();
   date_default_timezone_set('America/Sao_Paulo');
    $autoload= function($class){
        if($class== 'Email'){
           include('classes/phpmailer/PHPMailerAutoload.php');
        }

        include('classes/'.$class.'.php');
    };

    spl_autoload_register($autoload);

    define('INCLUDE_PATH','http://localhost/projeto_1/');
    define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');

    define('BASE_DIR_PAINEL',__DIR__.'/painel/');

    //Conectar com banco de dados
    define('HOST','localhost');
    define('USER','root');
    define('PASSWORD','');
    define('DATABASE','projeto_1');

    //Constantes para o painel de controle
    define('Nome_empresa','projeto_1');     

    //funções do painel
    function pegaCargo($indice){
        $cargos = ['0'=> 'Normal', '1' => 'Colaborador', '2'=> 'Administrador'];

        return Painel::$cargos[$indice];
    }

    function selecioneMenu($par){
        $url = explode('/',@$_GET['url'])[0];
        if($url == $par){
         echo 'class="menu-active"';
        }
    }

    function verificaPermissaoMenu($permissao){
        if($_SESSION['cargo'] <= $permissao){
            return;
        }else{
            echo 'style="display:none;"';
        }
    }

    function verificaPermissaoPagina($permissao){
        if($_SESSION['cargo'] == $permissao){
            return;
        }else{
            include('painel/pages/permissao-negada.php');
            die();
        }
    }


?>