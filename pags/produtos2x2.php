<section class="interna">
    
    <div class="wrapfull">
        <div class="wrap30">
            <div class="conteudointerno">
                <h1>Produtos</h1>
                
                    <?php

        

if ($nivel1 != ''){
    $NewsHome2      = mysql_query('SELECT * FROM produtos WHERE Ativo="S" AND Nome_URL_Amigavel="'.$nivel1.'"') or die(ErroBanco(130));

    $LNews2  = mysql_fetch_array($NewsHome2);
    $Prod_Titulo2   = stripslashes($LNews2['Titulo']);
    $Prod_Resumo2   = stripslashes($LNews2['Resumo']);
    $Prod_PDF       = $LNews2['PDF'];
    $Prod_TextFull  = $LNews2['TextFull'];
    $Prod_ID2       = $LNews2['ID'];
    

    $FotoDestaque3  = mysql_query('SELECT * FROM profotos WHERE ID_Produtos="'.$Prod_ID2.'" AND Destaque="S"') or die(ErroBanco(130));
    $LFotoDestaque3 = mysql_fetch_array($FotoDestaque3);
        $FotoDestcada3  = $LFotoDestaque3['Produto'];
        $LegFoto3       = $LFotoDestaque3['Legenda'];
    
    echo '
        <div class="grids2 fundobranco">
            <div class="gridnahome">

            
            <p style="text-align:center;"><a class="fotoshadownbox"  href="'.$UrlAtual.'admin/uploads/'.$FotoDestcada3.'" title="'.$LegFoto3.'" rel="shadowbox[vocation]"><img src="'.$UrlAtual.'admin/fixamarca/thumb.php?url='.$FotoDestcada3.'&amp;publico=P" title="'.$LegFoto3.'" /></a></p>';

        $FotoDestaque2  = mysql_query('SELECT * FROM profotos WHERE ID_Produtos="'.$Prod_ID2.'" AND Destaque!="S"') or die(ErroBanco(130));
        $count_Dest2    = mysql_num_rows($FotoDestaque2);
        if ($count_Dest2 != ''){
            echo '<p>';
            while ($LFotoDestaque2 = mysql_fetch_array($FotoDestaque2)){
                $FotoDestcada2  = $LFotoDestaque2['Produto'];
                $LegFoto2       = $LFotoDestaque2['Legenda'];
                echo '<a class="fotoshadownbox"  href="'.$UrlAtual.'admin/uploads/'.$FotoDestcada2.'" title="'.$LegFoto2.'" rel="shadowbox[vocation]"><img src="'.$UrlAtual.'admin/fixamarca/thumb.php?url='.$FotoDestcada2.'&amp;publico=M" title="'.$LegFoto2.'" /></a> ';
            }
            echo '</p>';
        }
        
        $FotoDestaque7  = mysql_query('SELECT * FROM proarquivos WHERE ID_Produtos="'.$Prod_ID2.'"') or die(ErroBanco(130));
        $count_Dest7    = mysql_num_rows($FotoDestaque7);
        if ($count_Dest7 != ''){
            echo '<p style="margin-top:1em;">';
            $pareimpar7 = '1';
            while ($LFotoDestaque7 = mysql_fetch_array($FotoDestaque7)){
                $FotoDestcada7  = $LFotoDestaque7['Produto'];
                $LegFoto7       = $LFotoDestaque7['Legenda'];
                if ($pareimpar7 == '1' ){
                    $grid_separacao = '';
                    $pareimpar7      = '0';
                }else{
                    $grid_separacao = ' <span>&nbsp;&nbsp;&nbsp;</span> ';
                    $pareimpar7      = '0';
                }
                if ($LegFoto7 == 'Manual' || $LegFoto7 == 'FAQ'){
                    $icoArquivo = '<img style="vertical-align:middle;" src="'.$UrlAtual.'imgs/icone_pdf.png" /> ';
                }else{
                    $icoArquivo = '<img style="vertical-align:middle;" src="'.$UrlAtual.'imgs/icone_software.png" /> ';
                }
                echo ''.$grid_separacao.''.$icoArquivo.'<a class="fotoshadownbox"  href="'.$UrlAtual.'admin/uploads/'.$FotoDestcada7.'" title="'.$LegFoto7.'" target="_blank">'.$LegFoto7.'</a>';
            }
            echo '</p>';
        }
        
        echo '
            </div>
        </div><div class="grid-separacao"></div>';
        
        
        echo '
        <div class="grids2">
            <div class="gridnahome">

            
            <h1>'.$Prod_Titulo2.'</h1>';
            echo '<p>'.$Prod_Resumo2.'</p>';
            echo '<p>&nbsp;</p>';
            
            //echo '<p><img style="vertical-align:middle;" src="'.$UrlAtual.'imgs/icone_pdf.png" /><a class="linkpdf" style="vertical-align:middle;"  href="'.$UrlAtual.'downloads/'.$Prod_PDF.'" target="_blank" title="Datasheet abrirá em outra janela"> baixar datasheet</a></p>';
       
        echo '
            </div>
        </div>';
        if ($Prod_TextFull != ""){
        
        echo '<h2>Descrição do produto</h2>';
        
        echo '<div class="descricaoproduto">';
        echo '<h3>'.$Prod_Titulo2.'</h3>';
        echo $Prod_TextFull;
        echo '</div>';
        }
        echo '<p>&nbsp;</p>';
}
             ?>
            </div>
        </div>
    </div>
    
        
        
<?php

        

        echo '<div class="wrapfull backazul">';
        echo '<div class="wrap30 topprodutos" >';
        
        if ($nivel1 != ''){
            $subtitulo     = '<div class="conteudointerno"><h2>Outros produtos</h2></div>';
            $NewsHome      = mysql_query('SELECT * FROM produtos WHERE Ativo="S" AND Nome_URL_Amigavel!="'.$nivel1.'"') or die(ErroBanco(130));
        }else{
            $subtitulo     = '';
            $NewsHome      = mysql_query('SELECT * FROM produtos WHERE Ativo="S"') or die(ErroBanco(130));
        }
        
        echo $subtitulo;
        
            $pareimpar     = '1';
            while ($LNews  = mysql_fetch_array($NewsHome)){
                $Prod_Titulo   = stripslashes($LNews['Titulo']);
                $Prod_ID       = stripslashes($LNews['ID']);
                $Prod_URL      = $LNews['Nome_URL_Amigavel'];
                if ($pareimpar > '0' ){
                    $grid_separacao = '<div class="grid-separacao"></div>';
                    $pareimpar      = '0';
                }else{
                    $grid_separacao = '';
                    $pareimpar      = '1';
                }

                $FotoDestaque  = mysql_query('SELECT * FROM profotos WHERE ID_Produtos="'.$Prod_ID.'" AND Destaque="S"') or die(ErroBanco(130));
                $LFotoDestaque = mysql_fetch_array($FotoDestaque);
                $FotoDestcada  = $LFotoDestaque['Produto'];
                $LegFoto       = $LFotoDestaque['Legenda'];

                echo '
                    <div class="grids2 fundobranco">
                        <div class="gridnahome">

                        <h2>'.$Prod_Titulo.'</h2>
                        <p style="text-align:center;"><a href="'.$UrlAtual.'produtos/'.$Prod_URL.'/" class="fotoshadownbox" ><img src="'.$UrlAtual.'admin/fixamarca/thumb.php?url='.$FotoDestcada.'&amp;publico=S" title="'.$LegFoto.'" /></a></p>


                        </div>
                       <p><a href="'.$UrlAtual.'produtos/'.$Prod_URL.'/" title="'.$Prod_Titulo.'">ver detalhes</a></p>
                    </div>'.$grid_separacao
                    ;

            }
                    echo '
                    <div class="grids2 fundobranco">
                        <div class="gridnahome">

                        <h2>Aplicações dos Produtos</h2>
                        <p style="text-align:center;"><img src="'.$UrlAtual.'imgs/aplicacoes_mini.png" title="Aplicações dos Produtos" /></p>


                        </div>
                       <p><a href="'.$UrlAtual.'aplicacoes/" title="Aplicações dos Produtos">conheça</a></p>
                    </div>
                    ';


    echo '</div>';
    echo '</div>';

    require_once 'atendimento.php';
             ?>
</section>