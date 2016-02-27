<?php
if ($pagina =='doe'){
echo '<section class="interna">';
}
?>
    <div class="wrapfull  ">
        <div class="wrap30 ">
            <div class="finaliza"></div>
            
                    <?php
        

if ($nivel1 != '' && $nivel2 == '' && $pagina == 'doe'){
    
    echo '<div class="resumos">';
    
                    $NewsNotTitData   = mysql_query('SELECT * FROM iniciativa WHERE Ativo="S" AND Nome_URL_Amigavel="'.$nivel1.'"') or die(ErroBanco(130));
                    $AllNotTitData    = mysql_fetch_array($NewsNotTitData);
                    $TituloNew        = $AllNotTitData['Titulo'];
                    $DataNew          = $AllNotTitData['Data'];
                    $dataNewNot       = dataformatada($DataNew);
                    
                    echo '<h1 class="tit">'.$TituloNew.'</h1>';
                    echo '<p class="dataNew">Publicado: '.$dataNewNot.'</p>';
                    echo '<hr class="internos" />';
                    echo '<div class=""finaliza"></div>';
                    
                
    $NewsHome2        = mysql_query('SELECT * FROM iniciativa WHERE Ativo="S" AND Nome_URL_Amigavel="'.$nivel1.'"') or die(ErroBanco(130));

    $LNews2           = mysql_fetch_array($NewsHome2);
    $Prod_Titulo2     = stripslashes($LNews2['Titulo']);
    $Prod_ID2         = $LNews2['ID'];
    $FotoPrinSoci     = $LNews2['Produto'];
    $BotaoTopPagSeg   = $LNews2['Botao'];
    $TotalIniciativa  = $LNews2['Total'];
    $FaltaIniciativa  = $LNews2['Falta'];
    $DeposiIniciativa = $LNews2['Deposito'];
    
    $destacarfotos   = mysql_query('SELECT * FROM inifotos WHERE ID_Produtos="'.$Prod_ID2.'"') or die(ErroBanco(150));
            $CountFotosM     = mysql_num_rows($destacarfotos);  
            if ($BotaoTopPagSeg == '' && $DeposiIniciativa == '' && $FotoPrinSoci == '' && $CountFotosM == 0){ 
            }else{
            echo '<div class="galeriafull">';
            if ($BotaoTopPagSeg != ''){
            echo '<div class="pagseguro">';
            echo $BotaoTopPagSeg;
            echo '<h3>Total arrecadado: <strong>'.$TotalIniciativa.'</strong></h3>';
            echo '<h3>Total a arrecadar: <strong>'.$FaltaIniciativa.'</strong></h3>';
            echo '</div>';
            }
             if ($FotoPrinSoci != "" || $CountFotosM != 0 ){
            echo '<div class="galeriadefotos">';
            echo '<div>';
            echo '<ul id="desliazamentoz">';
                if ($FotoPrinSoci != ''){
                    echo '<li><a title="'.$Prod_Titulo2.'" href="'.$UrlAtual.'admin/fotos/'.$FotoPrinSoci.'" rel="shadowbox[vocation]"><img src="'.$UrlAtual.'admin/fixamarca/thumb.php?url='.$FotoPrinSoci.'&amp;publico=P" /></a></li>';
                }
                
                if ($FotoPrinSoci == '' && $CountFotosM == 0){
                    echo '<li><img src="'.$UrlAtual.'imgs/foto_indisponivel.jpg" /></li>';
                }
               
                
               if ($CountFotosM != 0){
                while($AllFotos  = mysql_fetch_array($destacarfotos)) {
                    $FotoH       = $AllFotos['Produto'];
                    $LegendaH    = $AllFotos['Legenda'];
                    
                    
                    echo '<li><a title="'.$LegendaH.'" href="'.$UrlAtual.'admin/fotos/'.$FotoH.'" rel="shadowbox[vocation]"><img src="'.$UrlAtual.'admin/fixamarca/thumb.php?url='.$FotoH.'&amp;publico=P" /></a></li>';
                }
               }
            echo '</ul>';
            echo '</div>';
            echo '</div>';
             
           
                    echo '<p>clique para ampliar</p>';
             }
             if ($DeposiIniciativa != ''){
            echo '<div class="pagseguro" style="margin-top:1em;">';
            echo '<h2>Conta para deposito bancário</h2>';
            echo '<h3>'.$DeposiIniciativa.'</h3>';
            echo '</div>';
             }
        echo '</div>';
        
            
            
            if ($FotoPrinSoci != "" || $CountFotosM != 0 ){
            echo '
            <script>
                $(function() {
                        var desliazamentoz = $("#desliazamentoz").slippry({
                                controls: false,
                                transition: \'fade\',
                                useCSS: true,
                                speed: 1500,
                                pause: 4000,
                                auto: true,
                                preload: \'visible\',
                                controls: false,
                                pager: false

                        });

                });
            </script>';
            }
            }    
                    $NewsNot      = mysql_query('SELECT * FROM iniciativa WHERE Ativo="S" AND Nome_URL_Amigavel="'.$nivel1.'"') or die(ErroBanco(130));
                    $AllNot       = mysql_fetch_array($NewsNot);
                    $TextFullNew  = $AllNot['TextFull'];
                    $Botao        = stripslashes($AllNot['Botao']);
                    
                    echo '<div class="conteudointerno">';
                    echo $TextFullNew;
                    echo '</div>';
                
            
            
            echo '<div class="finaliza"></div>';
            echo '<div style="margin-bottom:4.5em;"></div>';
            echo '<div class="vertodos"><p><a title="Ver todas as iniciativas" href="'.$UrlAtual.'doe/">Voltar</a></p></div>';
            
            
}else{
    
     echo '<div class="resumos back_news">
                
                <h1 class="tit">SEJA <span class="font-black">UM DOADOR</span></h1>
                <hr class="internos" />';
    
           
            $PGAtual = !empty($nivel2) ? $nivel2 : "1";
            
            $TotalPorPG = '8';
            
            $pagina_teste = $PGAtual*$TotalPorPG;
            if($pagina_teste == $TotalPorPG) {
                $pagina_teste = '0';
            }else{
                $pagina_teste = $pagina_teste-$TotalPorPG;
            }
            
            $limitar = 'LIMIT '.$pagina_teste.',';

           
                
                $NewsHome      = mysql_query('SELECT * FROM iniciativa WHERE Ativo="S" ORDER BY Data DESC, Titulo ASC '.$limitar.' '.$TotalPorPG) or die(ErroBanco(130));
                $pareimpar     = '1';
                while ($LNews  = mysql_fetch_array($NewsHome)){
                    $New_Titulo   = stripslashes($LNews['Titulo']);
                    $New_URL      = $LNews['Nome_URL_Amigavel'];
                    $New_Seo      = stripslashes($LNews['SEO']);
                    $FotoPrinSoc  = $LNews['Produto'];
                    $IDPaginacao  = $LNews['ID'];
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
                                echo '<a href="'.$UrlAtual.'doe/'.$New_URL.'">Saiba mais e Colabore</a>
                            </div>
                            <div class="grid2Texto">
                                <h3>'.$New_Titulo.'</h3>
                            </div>
                        </div>'.$grid_separacao
                        ;
                    
                }
                
                echo '<div class="finaliza"></div>';
                
            
            
                
                paginacao($PGAtual,$TotalPorPG,"iniciativa","Data DESC","S",$UrlAtual,$pagina);
                
                }
                
                
              
                
                ?>
               
            
                
            </div>
        </div>
    </div>
    
        
    <?php
if ($pagina =='doe'){
echo '</section>';
}
?>            
