<section class="banner-container">
<?php 
					$sql = MySql::conectar()->prepare("SELECT * FROM `tb_slides` ORDER BY order_id ");
					$sql->execute();
					$slides = $sql->fetchAll();
					foreach ($slides as $key => $value) {
				?>
	<div class="banner-single" style="  background:url(<?php echo INCLUDE_PATH_PAINEL?>../imagens/<?php echo $value['slide'];?>">
             </div>
<!--banner-single-->
	<div class="overlay"></div><!--overlay-->
		<div class="center">
	<?php }?>
		<form>
			<h2>Qual o seu melhor e-mail?</h2>
			<input type="email" name="email" required />
			<input type="submit" name="acao" value="Cadastrar!">
		</form>
		</div><!--center-->
		<div class="bullets">
			
		</div><!--bullets-->
	</section><!--banner-container-->

	<section class="descricao-autor">
		<div class="center">
		<div class="w50 left">
			<h2><?php echo $infoSite['nome_autor']; ?></h2>
			<p><?php echo $infoSite['descricao']; ?></p>
		</div><!--w50-->
		<div class="w50 left">
				<img class="right" src="imagens/.jpg" />
		</div><!--w50-->
		<div class="clear"></div>
		</div><!--center-->
	</section><!--descricao-autor-->

	<section class="especialidades">		
		<div class="center">
		<h2 class="title">Especialidades</h2>
			
		<?php foreach ($infoi as $key => $value) {

			?>
			
		<div class="w33 left box-especialidades">
				<h3 class="icon"><img src="<?php echo INCLUDE_PATH_PAINEL?>../icons/<?php echo $value['icone'];?>" alt="ar-condicionado"></h3>
				<h4><?php echo $value['titulo'];?></h4>
				<p><?php echo $value['descricao']; ?> </p>
		</div><!--box-especialidades-->

		<?php }?>
		
		
			<div class="clear"></div>
		</div><!--center-->
	</section><!--especialidades-->

	<section class="extras">
		
		<div class="center">
			<div  id="depoimentos" class="w50 left depoimentos-container">
				<h2 class="title">Depoimentos dos nossos clientes</h2>
				<?php 
					$sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.depoimentos` ORDER BY order_id ASC LIMIT 3");
					$sql->execute();
					$depoimentos = $sql->fetchAll();
					foreach ($depoimentos as $key => $value) {
				?>
				<div class="depoimento-single">
				
					<p class="depoimento-descricao"> <?php echo  $value['depoimentos'];?>	</p>
					<p class="nome-autor"> <?php echo  $value['nome']; ?> -  <?php echo  $value['data'];?> </p>
				</div><!--deipoimento-single-->
				<?php } ?>
			</div><!--w50-->
			
			<div id="servicos" class="w50 left servicos-container">
				<h2 class="title">Serviços</h2>
				<div class="servicos">
					
					<ul>
						<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
						<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
						<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
					</ul>
				</div><!--servicos-->
			</div><!--w50-->
			<div class="clear"></div>
		</div><!--center-->

	</section><!--extras-->