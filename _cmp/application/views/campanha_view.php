<section class="interna">
    <div class="wrapfull  ">
        <div class="wrap30 ">
            <div class="finaliza"></div>


            <div class="resumos back_news">

                <div class="SJ-row">
                    <div class="SJ-grid70">
                        <h1 class="left-center tit SJ-MT-40">Campanha</h1>
                        
                        
                        <div class="SJ-dest-grid">
                            
                            <img class="SJ-img-dest-grid" src="<?php echo img_url($data['foto'])?>" />

                            <h2 class="SJ-tit-dest-grid"><?php echo $data['titulo']?></h2>
                            <div class="SJ-dados-dest-grid">
                                <p class="SJ-valor-dest-grid">R$ <?php echo str_replace( ".", ",", $data['valor'])?></p>
                                <p class="SJ-data-dest-grid">De <?php echo $data['ini_vigencia']?> até <?php echo $data['fim_vigencia']?></p>
									<?php echo $data['pagseguro_form']?>
                            </div>
                            
                        </div>
                        <div class="conteudointerno SJ-PB-60">
                            <!-- Christian, basta colocar o texto completo (vindo do editor) dentro dessa div = conteudointerno -->
                            <p class="jusity-center"><?php echo $data['texto_longo']?></p>


                        </div>
                    </div>
                </div>

            </div> 
        </div>


        <!-- Aqui vem a faixa verde mostrando o botão do pagseguro novamente, acredito que seja interessante colocar essa faixa somente se o campo de texto completo (o que tem o editor de texto) tenha algum conteúdo, caso contrário não mostra. -->
        <div class="SJ-paralax-pagseguro">
            <div class="SJ-grid70">
                <p class="SJ-valor-dest-grid">R$ <?php echo str_replace( ".", ",", $data['valor'])?></p>
                <p class="SJ-data-dest-grid">De <?php echo $data['ini_vigencia']?> até <?php echo $data['fim_vigencia']?></p>
                <p class="SJ-pagseguro-dest-grid">
					<?php echo $data['pagseguro_form']?>
                </p>
            </div>
        </div>


        <div class="SJ-back-campanhas">
            <a href="../ativas" class="SJ-botao-back">Ver todas as Campanhas</a>
        </div>


    </div>
