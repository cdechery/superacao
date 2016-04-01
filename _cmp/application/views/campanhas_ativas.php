<section class="interna">
<?php
    if( ! $campanhas->result()  ) {
?>
    <h3>Não há Campanhas ativas nesse momento</h3>
<?php
        return;
    }
?>
<div class="wrapfull  ">
<div class="wrap30 ">
<div class="finaliza"></div>


<div class="resumos back_news">

<div class="SJ-row">
    <h1 class="left-center tit">Campanhas</h1>
    <hr class="internos" />
<?php
    foreach( $campanhas->result() as $cmp ) {
?>
    <div class="SJ-grid3 SJ-grid3-50 SJ-MT-30">
        <div class="SJ-grid4-Destaque SJ-grid3-Destaque">
            <a href="#" title=""><img src="<?php echo img_url($cmp->foto, 'P')?>"/></a>
            <h2><a href="#" class="" title=""><?php echo $cmp->titulo?></a></h2>
            <p><?php echo $cmp->texto_curto?><br><b>R$ <?php echo str_replace(".", ",", $cmp->valor)?></b></p>
             <p><a href="<?php echo main_url('visualizar/'.$cmp->id)?>" title="" class="btn-azul">Comprar</a></p>
        </div>
    </div>
<?php  
    } //foreach
?>
</div>
</div>
</div>
</div>
</section>