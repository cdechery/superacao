<section class="interna slidehome">  
    
    <?php require_once 'slide.php'; ?>
    
   
    <div class="wrapfull back_news">
        <div class="wrap30">
            <div class="resumos">
                <h1 class="tit">FIQUE <span class="font-black">POR DENTRO</span></h1>
                <hr class="internos" />
                
                <?php
                
                $NewsHome2      = mysql_query('SELECT * FROM novidades WHERE Ativo="S" ORDER BY Data DESC, Titulo ASC LIMIT 6 ') or die(ErroBanco(130));
                $pareimpar2     = '1';
                echo '<div class="ultimasNovidades">';
                while ($LNews2  = mysql_fetch_array($NewsHome2)){
                    $New_Titulo2   = stripslashes($LNews2['Titulo']);
                    $New_URL2      = $LNews2['Nome_URL_Amigavel'];
                    $New_Data2     = $LNews2['Data'];
                    $New_Data_F2   = dataParaSite($New_Data2);
                    if ($pareimpar2 > '0' ){
                        $grid_separacao2 = 'comfundo';
                        $pareimpar2       = '0';
                    }else{
                        $grid_separacao2 = 'semfundo';
                        $pareimpar2       = '1';
                    }                                      
                        echo '<p class="'.$grid_separacao2.'"><a  href="'.$UrlAtual.'novidades/'.$New_URL2.'"><span class="dataNovis">'.$New_Data_F2.' -</span> '.$New_Titulo2.'</a></p>';                                            
                }
                echo '</div>';
                
                echo '<h1 class="tit">PROJETOS <span class="font-black">E AÇÕES</span></h1>
                <hr class="internos" />';
                
                $NewsHome      = mysql_query('SELECT * FROM produtos WHERE Ativo="S" ORDER BY Data DESC, Titulo ASC LIMIT 8 ') or die(ErroBanco(130));
                $pareimpar     = '1';
                while ($LNews  = mysql_fetch_array($NewsHome)){
                    $New_Titulo   = stripslashes($LNews['Titulo']);
                    $New_URL      = $LNews['Nome_URL_Amigavel'];
                    $New_Seo      = stripslashes($LNews['SEO']);
                    $FotoPrinSoc  = $LNews['Produto'];
                    $New_Data     = $LNews['Data'];
                    $New_Data_F   = dataParaSite($New_Data);
                    if ($pareimpar > '0' ){
                        $grid_separacao = '<div class="sep_grid2"></div>';
                        $pareimpar      = '0';
                    }else{
                        $grid_separacao = '';
                        $pareimpar      = '1';
                    }
                    
                    echo '
                        <div class="grid2">
                            <div class="grid2Foto">';
                             if ($FotoPrinSoc != ''){
                    echo '
                                <img src="'.$UrlAtual.'admin/fixamarca/thumb.php?url='.$FotoPrinSoc.'&amp;publico=P" />';
                                    }else{
                        echo '<img src="'.$UrlAtual.'imgs/back_grid3.png" />';
                    } 
                               echo ' <a href="'.$UrlAtual.'projetos/'.$New_URL.'">Saiba mais</a>
                            </div>
                            <div class="grid2Texto">
                                <h3>'.$New_Titulo.'</h3>
                            </div>
                        </div>'.$grid_separacao
                        ;
                    
                }
                
                ?>
               
            
            
                <div class="finaliza"></div>
                
                
                <div class="vertodos"><p><a href="<?php echo $UrlAtual.'projetos'; ?>">Ver todos</a></p></div>
              
                
            </div>
        </div>
    </div>
    
    <section class="fundoVerde">
        <div class="wrap30">
        
                <div class="grid3">
                    <h3>MISSÃO</h3>
                    <p>Promover interação com o meio ambiente de forma equilibrada, através de ações e projetos ambientais, culturais e sociais que contribuam para o bem estar da população.</p>
                </div>
                
                
                <div class="sep_grid3"></div>
                
                
                <div class="grid3 margin_grid3">
                    <h3>VISÃO</h3>
                    <p>Ser referência em ação ambiental, social e cultural no município de Itanhandu e região.</p>
                </div>
                
                
                <div class="sep_grid3"></div>
                
                
                <div class="grid3">
                    <h3>VALORES</h3>
                    <p>Profissionalismo, ética, solidariedade, participação com ação, transversalidade, horizontalidade e valorização do trabalho em grupo.</p>
                </div>
                
              
                
    </div>
            
    </section>

</section>