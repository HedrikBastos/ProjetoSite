<?php 
    $usuariosOnline = Painel::listarUsuariosOnline();
    $pegaVisitasTotais= MySql::conectar()->prepare("SELECT * FROM `tb_adm_visitas`");
    $pegaVisitasTotais->execute();

    $pegaVisitasTotais=$pegaVisitasTotais->rowCount();

    $pegaVisitasHoje= MySql::conectar()->prepare("SELECT * FROM `tb_adm_visitas` WHERE dia= ?");
    $pegaVisitasHoje->execute(array(date('Y-m-d')));

    $pegaVisitasHoje=$pegaVisitasHoje->rowCount();
?>

<section class="box-content left w100">
            <h2><!--cazinha do painel de controle--></h2>
            <h2>Painel de Controle - <?php echo Nome_empresa ?></h2>

            <div class="box-metricas">
                
                <div class="box-metrica-single">
                    <div class="box-metrica-wraper">
                        <h2>Usuário Online</h2>
                        <p><?php  echo count($usuariosOnline);?></p>
                    </div><!--box-metrica-wraper-->
                </div><!--box-metrica-single-->
                <div class="box-metrica-single">
                <div class="box-metrica-wraper">
                        <h2>Total de Visitas</h2>
                        <p><?php echo $pegaVisitasTotais ?></p>
                    </div><!--box-metrica-wraper-->
                </div><!--box-metrica-single-->
                <div class="box-metrica-single">
                <div class="box-metrica-wraper">
                        <h2>Visistas Hoje</h2>
                        <p><?php echo $pegaVisitasHoje ?></p>
                    </div><!--box-metrica-wraper-->
                </div><!--box-metrica-single-->
                <div class="clear"></div>
            </div><!--box-metricas-->  

   </section><!--box-content-->
   <section class="box-content left w100">
       <h2><img src="" alt=""> Usuários Online</h2>
       <div class="table-responsive">

            <div class="row">
                <div class="col">
                    <span>IP</span>
                </div><!--col-->
                <div class="col">
                    <span>Última Ação</span>
                </div><!--col-->
                <div class="clear"></div>
            </div><!--row-->

            <?php 
                foreach ($usuariosOnline as $key => $value){
            ?>

            <div class="row">
                <div class="col">
                    <span><?php echo $value['ip']?></span>
                </div><!--col-->
                <div class="col">
                    <span><?php echo date('d/m/Y H:i:s',strtotime($value['ultima_acao']))?></span>
                </div><!--col-->
                <div class="clear"></div>
            </div><!--row-->
            <?php }?>

       </div><!--table-responsive-->
   </section><!--box-content-->

   <?php if($_SESSION['cargo']== 2){?>
       </section><!--box-content-->
       <section class="box-content left w100">
           <h2><img src="" alt=""> Usuários Painel</h2>
           <div class="table-responsive">
    
                <div class="row">
                    <div class="col">
                        <span>Nome</span>
                    </div><!--col-->
                    <div class="col">
                        <span>Cargo</span>
                    </div><!--col-->
                    <div class="clear"></div>
                </div><!--row-->
    
                <?php 
                    $usuariosPainel = Mysql::conectar()->prepare("SELECT * FROM `tb_adm.usuarios`");
                    $usuariosPainel->execute();
                    $usuariosPainel = $usuariosPainel->fetchAll();
                    foreach ($usuariosPainel as $key => $value){
                ?>
    
                <div class="row">
                    <div class="col">
                        <span><?php echo $value['user']?></span>
                    </div><!--col-->
                    <div class="col">
                        <span><?php echo pegaCargo($value['cargo']); ?></span>
                    </div><!--col-->
                    <div class="clear"></div>
                </div><!--row-->
                <?php }?>
    
           </div><!--table-responsive-->
       </section><!--box-content-->
   <?php }else{ return false;} ?> 
   


