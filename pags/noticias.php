<section class="interna">
    
<?php
if ($nivel1 == ''){

echo '
<div class="wrapfull">
    <div class="wrap30">
        <div class="conteudointerno"> 
            <h1>Notícias</h1>
        </div> 
            <div class="resumos">
';  

            $NewsHome      = mysql_query('SELECT * FROM noticias WHERE Ativo="S" ORDER BY Data DESC, Titulo ASC LIMIT 4 ') or die(ErroBanco(130));
            $pareimpar     = '1';
            while ($LNews  = mysql_fetch_array($NewsHome)){
                $New_Titulo   = stripslashes($LNews['Titulo']);
                $New_URL      = $LNews['Nome_URL_Amigavel'];
                $New_Seo      = stripslashes($LNews['SEO']);
                $New_Data     = $LNews['Data'];
                $New_Data_F   = dataParaSite($New_Data);
                if ($pareimpar > '0' ){
                    $grid_separacao = '<div class="grid-separacao"></div>';
                    $pareimpar      = '0';
                }else{
                    $grid_separacao = '';
                    $pareimpar      = '1';
                }

                echo '
                    <div class="grids2 fundobranco">
                        <div class="gridnahome">
                            <h2>'.$New_Titulo.'</h2>
                            <p class="datanot">'.$New_Data_F.'</p>
                            <p>'.$New_Seo.'</p>
                        </div>
                        <p><a href="'.$UrlAtual.'noticias/'.$New_URL.'" title="'.$New_Titulo.'">saiba mais</a></p>
                    </div>'.$grid_separacao
                    ;

            }
         echo '   
        </div>
    </div>
</div>';    


}else{ /* INICIA a noticia setada */
    echo '
    <div class="wrapfull">
        <div class="wrap30">
            <div class="conteudointerno"> 
                <h1>Notícias</h1>
           
    ';  

                $NewsHome    = mysql_query('SELECT * FROM noticias WHERE Ativo="S" AND Nome_URL_Amigavel="'.$nivel1.'"') or die(ErroBanco(130));
                $ExiteNot    = mysql_num_rows($NewsHome);
            if ($ExiteNot != '0'){
                $LNews  = mysql_fetch_array($NewsHome);
                    $New_Titulo   = stripslashes($LNews['Titulo']);
                    $New_Texto    = $LNews['TextFull'];
                    $New_Data     = $LNews['Data'];
                    $New_Data_F   = dataParaSite($New_Data);
                    
                    echo '<div class="textoNoticia">';
                    echo '<h2>'.$New_Titulo.'</h2>';
                    echo '<p class="datanot">'.$New_Data_F.'</p>';
                    echo $New_Texto;
                    echo '</div>';

            }else{
                echo '<h2>Notícia inexistente!</h2>';
            }
            
             echo '   
            </div>
        </div>
    </div>';
}


if ($nivel1 == ''){
    $NewsHome2      = mysql_query('SELECT * FROM noticias WHERE Ativo="S" ORDER BY Data DESC, Titulo ASC LIMIT 4,999 ') or die(ErroBanco(130));
}else{
    $NewsHome2      = mysql_query('SELECT * FROM noticias WHERE Ativo="S" AND Nome_URL_Amigavel!="'.$nivel1.'" ORDER BY Data DESC, Titulo ASC ') or die(ErroBanco(130));
}
          

$ExisteValor    = mysql_num_rows($NewsHome2);
if ($ExisteValor != '0'){
echo '         
<div class="wrapfull backazul">
    <div class="wrapfull">
        <div class="wrap30">
            <div class="conteudointerno">
                <div class="aplicacoes">
                    <h2>Outras notícias</h2>';

                    $pareimpar2     = '1';
                    while ($LNews2  = mysql_fetch_array($NewsHome2)){
                        $New_Titulo2   = stripslashes($LNews2['Titulo']);
                        $New_URL2      = $LNews2['Nome_URL_Amigavel'];
                        $New_Data2     = $LNews2['Data'];
                        $New_Data_F2   = dataParaSite($New_Data2);
                        if ($pareimpar2 > '0' ){
                            $grid_separacao2 = '<div class="grid-separacao"></div>';
                            $pareimpar2      = '0';
                        }else{
                            $grid_separacao2 = '';
                            $pareimpar2      = '1';
                        }

                        echo '
                            <div class="grids2">

                                    <div class="newsnoticias">
                                        <p><a class="newsbot" href="'.$UrlAtual.'noticias/'.$New_URL2.'" title="'.$New_Titulo2.'">&bull; '.$New_Data_F2.' - '.$New_Titulo2.'</a></p>
                                   </div>

                            </div>'.$grid_separacao2
                            ;

                    }
echo '
                </div>
            </div>
        </div>
    </div>
</div>';
}



require_once 'atendimento.php';
?>
</section>