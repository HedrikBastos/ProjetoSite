<?php include('config.php');?>
<?php Site::updateUsuarioOnline(); ?>
<?php Site::contador(); ?>
<?php
	$infoSite= MySql::conectar()->prepare("SELECT * FROM `tb_site.config`");
	$infoSite->execute();
	$infoSite= $infoSite->fetch();

	$infoi= MySql::conectar()->prepare("SELECT * FROM `tb_site.especial`");
	$infoi->execute();
	$infoi= $infoi->fetchAll();
?>
<!DOCTYPE html>

<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content= "palavras-chaves,do,meu,site">
	<meta name="description" content="Descrição do meu site">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH;?>estilo/style.css">
		<title><?php echo $infoSite['titulo']; ?></title>
</head>
<body>
<base base="<?php echo INCLUDE_PATH; ?>" />
	<?php 
		$url = isset($_GET['url']) ? $_GET['url'] : 'home';

		switch ($url) {
			case 'depoimentos':
				echo '<target target="depoimentos" />';
				break;

			case 'servicos':
				echo '<target target="servicos" />';
				break;
		}
	?>

	

	<header>
		<div class="center">
			<div class="logo left "><a href="<?php echo INCLUDE_PATH; ?>"><?php echo $infoSite['titulo']; ?></a></div><!--logo-->
			<nav class="desktop right">
				<ul >
					<li><a href="<?php echo INCLUDE_PATH; ?>">Home</a> </li>
					<li><a href="<?php echo INCLUDE_PATH; ?>depoimentos">Depoimentos</a> </li>
					<li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a> </li>
					<li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a> </li>
				</ul>
			</nav>

			<nav class="mobile right">
			<div class="botao-menu-mobile">
				<img class="menu left" src="icons/menu_white_24dp.svg" alt="menu">
				
				<ul>
					<li><a href="<?php echo INCLUDE_PATH; ?>">Home</a> </li>
					<li><a href="<?php echo INCLUDE_PATH; ?>depoimentos">Depoimentos</a> </li>
					<li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a> </li>
					<li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a> </li>
				</ul>
								
			</nav>
			<div class="clear"></div><!--clear-->
		</div><!--center--->		
		
	</header>

	<div class="container-principal">
	<?php 
			
			if(file_exists('pages/'.$url.'.php')){
			
				include('pages/'.$url.'.php');
			}else{
				if($url != 'depoimentos' && $url != 'servicos'){
					$pagina404 = true;
					include('pages/404.php');
				}else{
					include('pages/home.php');
				}
			}
		?>

	</div><!--container-principal-->

	<footer <?php if(isset($pagina404 )&& $pagina404 == true  ) echo 'class="fixed"';?>>
		<div class="center">
			<p>Todos os direitos reservados</p>
		</div><!--center-->
	</footer>
	<script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyA0Ym0JYzqKYvm5d2DmDjrgajGku_x8DWw"></script>
	<script src="<?php echo INCLUDE_PATH; ?>js/map.js"></script>
	<script src="<?php echo INCLUDE_PATH; ?>js/scripts.js"></script>
	

	<?php
		if($url == 'home' || $url == ''){
	?>
	
	<script src="<?php echo INCLUDE_PATH; ?>js/slider.js"></script>
	<?php } ?>
	<script src="<?php echo INCLUDE_PATH; ?>js/especialidades.js"></script>
</body>
</html>