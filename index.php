<!DOCTYPE html>
<?php
    $protocolo = (strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') === false) ? 'http' : 'https';
    $host      = $_SERVER['HTTP_HOST'];

    //$UrlAtual  = $protocolo.'://'.$host.'/superacao/';
     //$UrlAtual  = $protocolo.'://'.$host.'/www/sites/institutosuperacao/site-novo/';
    $UrlAtual  = $protocolo.'://'.$host.'/superacao/';

    $index      = "index.php";

    require_once('admin/includes/conexao.php');
    require_once('admin/includes/funcoes_public.php');

    $atual      = (isset($_GET['secao'])) ? $_GET['secao'] : 'home';

    $permissao  = array('home', 'doe', 'projetos', 'novidades', 'assembleia', 'abrangencia', 'quemsomos', 'contatos', 'erro' , 'pagseguro-ok', 'pagseguro-fail');
    $pasta      = 'pags';

    $isCampanhas = ( strstr($atual, "campanhas")!=FALSE );

    if(substr_count($atual, '/') > 0) {
            $atual  = explode('/', $atual);
            $pagina = (file_exists("{$pasta}/".$atual[0].'.php') && in_array($atual[0], $permissao)) ? $atual[0] : 'erro';
            $nivel1 = isset($atual[1]) && !empty($atual[1])  ? urlencode(retiraCaracteres($atual[1])) : '';
            $nivel2 = isset($atual[2]) && !empty($atual[2])  ? urlencode(retiraCaracteres($atual[2])) : '';
            $nivel3 = isset($atual[3]) && !empty($atual[3])  ? urlencode(retiraCaracteres($atual[3])) : '';
    }else{
            $pagina = (file_exists("{$pasta}/".$atual.'.php') && in_array($atual, $permissao)) ? $atual : 'erro';
            $nivel1 = '';
            $nivel2 = '';
            $nivel3 = '';
        }
         
        if ($atual[0] != '' OR $atual != 0) {
            $secao  = $atual[0];
    }else{
            $secao = $atual;
    }

    $Dados_Config           = mysql_query('SELECT * FROM config WHERE ID="1" AND Ativo="S"') or die(ErroBanco(130));
    $Lista_Config           = mysql_fetch_array($Dados_Config);
    $EMail_Config           = $Lista_Config['EMail'];
    $Telefone_Config        = $Lista_Config['Telefone'];
    $FotoSocial_Config      = $Lista_Config['Logotipo'];
    $Titulo_Site_Config     = $Lista_Config['Titulo_Site'];
    $Descricao_Site_Config  = $Lista_Config['Descricao_Site'];
    $KeyWords_Config        = $Lista_Config['KeyWords'];
    $URL_Config             = $Lista_Config['URL'];
    $FotoSocialSEO          = $UrlAtual.'admin/fotos/'.$FotoSocial_Config;
    $URLSEO = $UrlAtual;
    
    
    if($pagina != '' && $nivel1 != '' && $nivel2 != '' && $nivel3 != ''){
        $URLSEO                 = $UrlAtual.$pagina.'/'.$nivel1.'/'.$nivel2.'/'.$nivel3.'/';
    }
    if($pagina != '' && $nivel1 != '' && $nivel2 != '' && $nivel3 == ''){
        $URLSEO                 = $UrlAtual.$pagina.'/'.$nivel1.'/'.$nivel2.'/';
    }
    if($pagina != '' && $nivel1 != '' && $nivel2 == '' && $nivel3 == ''){
        $URLSEO                 = $UrlAtual.$pagina.'/'.$nivel1.'/';
    }
    
    if($pagina != '' && $nivel1 == '' && $nivel2 == '' && $nivel3 == ''){
        $URLSEO                 = $UrlAtual.$pagina.'/';
    }
    
    if($pagina == 'home' ){
        $URLSEO                 = $URL_Config;
    }
   
    
    
    $class0     = $pagina == ''                ? 'ativado_home' : '' ;
    $class1     = $pagina == 'home'            ? 'ativado_home' : '' ;
    $class2     = $pagina == 'quemsomos'       ? 'ativado' : '' ;
    $class3     = $pagina == 'projetos'        ? 'ativado' : '' ;
    $class4     = $pagina == 'doe'             ? 'ativado' : '' ;
    $class17    = $pagina == 'campanhas'        ? 'ativado' : '' ;
    $class7     = $pagina == 'contatos'        ? 'ativado' : '' ;
    $class8     = $pagina == 'novidades'       ? 'ativado' : '' ;
    $class9     = $pagina == 'quemsomos'       ? 'ativadodep' : '' ;
    $class10    = $pagina == 'abrangencia'     ? 'ativadodep' : '' ;
    $class11    = $pagina == 'assembleia'      ? 'ativadodep' : '' ;
    $class14    = $pagina == 'quemsomos'       ? 'ativado_quemsomos' : '' ;
    $class15    = $pagina == 'abrangencia'     ? 'ativado_quemsomos' : '' ;
    $class16    = $pagina == 'assembleia'      ? 'ativado_quemsomos' : '' ;

    if( $isCampanhas ) { $pagina = "campanhas"; }
    
    switch ($pagina){
        case 'home':
            $paginatitulo = '';
            $Descricao_Site_Config = $Descricao_Site_Config;
            $FotoSocialSEO         = $FotoSocialSEO;
        break;

        case 'quemsomos':
            $paginatitulo = 'Quem Somos | ';
            $Descricao_Site_Config = $Descricao_Site_Config;
            $FotoSocialSEO         = $FotoSocialSEO;
        break;

        case 'campanhas':
            $paginatitulo = 'Campanhas | ';
            $Descricao_Site_Config = $Descricao_Site_Config;
            $FotoSocialSEO         = $FotoSocialSEO;
        break;

        case 'abrangencia':
            $paginatitulo = 'Abrangência de Atuação | ';
            $Descricao_Site_Config = $Descricao_Site_Config;
            $FotoSocialSEO         = $FotoSocialSEO;
        break;

        case 'assembleia':
            $paginatitulo = 'Assembleia Geral | ';
            $Descricao_Site_Config = $Descricao_Site_Config;
            $FotoSocialSEO         = $FotoSocialSEO;
        break;

        case 'contatos':
            $paginatitulo = 'Contatos | ';
            $Descricao_Site_Config = $Descricao_Site_Config;
        $FotoSocialSEO          = $UrlAtual.'admin/fotos/'.$FotoSocial_Config;
        break;
    
     case 'erro':
                    $paginatitulo = 'Ops: essa página não existe | ';
         $Descricao_Site_Config = $Descricao_Site_Config;
            $FotoSocialSEO         = $FotoSocialSEO;
                break;
        
                case 'projetos':
                    
                    
                    if ($nivel1 != ''){
                        $tituloSeo             = mysql_query('SELECT Titulo,KeyWords,SEO,ID,Produto FROM produtos WHERE Ativo="S"  AND Nome_URL_Amigavel="'.$nivel1.'"') or die(ErroBanco(130));
                        $NomeParaTituloSeo     = mysql_fetch_array($tituloSeo);
                        $TituloSeoOk           = $NomeParaTituloSeo['Titulo'];
                        $DescricaoSeoOk        = $NomeParaTituloSeo['SEO'];
                        $IDprodFoto            = $NomeParaTituloSeo['ID'];
                        $KeyWords_Internas     = $NomeParaTituloSeo['KeyWords'];
                        $FotoSeoCompartilha    = $NomeParaTituloSeo['Produto'];
                        $paginatitulo          = $TituloSeoOk.' | ';
                        
                        if ($KeyWords_Internas == ''){
                            $KeyWords_Config = $KeyWords_Config;
                        }else{
                            $KeyWords_Config = $KeyWords_Internas;
                        }
                        
                        if ($FotoSeoCompartilha == ''){
                            $FotoSocialSEO = $FotoSocialSEO;
                        }else{
                            $FotoSocialSEO         = $UrlAtual.'admin/fotos/'.$FotoSeoCompartilha;
                        }
                        
                        if ($DescricaoSeoOk == ''){
                            $Descricao_Site_Config = $Descricao_Site_Config;
                        }else{
                            $Descricao_Site_Config = $DescricaoSeoOk;
                        }
                        
                        
                        
                    }else{
                        $paginatitulo          = 'Projetos | ';
                        $Descricao_Site_Config = $Descricao_Site_Config;
                        $FotoSocialSEO         = $FotoSocialSEO;
                    }
            break;
            
            case 'novidades':
                    
                    
                    if ($nivel1 != ''){
                        $tituloSeo             = mysql_query('SELECT Titulo,KeyWords,SEO,ID,Produto FROM novidades WHERE Ativo="S"  AND Nome_URL_Amigavel="'.$nivel1.'"') or die(ErroBanco(130));
                        $NomeParaTituloSeo     = mysql_fetch_array($tituloSeo);
                        $TituloSeoOk           = $NomeParaTituloSeo['Titulo'];
                        $DescricaoSeoOk        = $NomeParaTituloSeo['SEO'];
                        $IDprodFoto            = $NomeParaTituloSeo['ID'];
                        $KeyWords_Internas     = $NomeParaTituloSeo['KeyWords'];
                        $FotoSeoCompartilha    = $NomeParaTituloSeo['Produto'];
                        $paginatitulo          = $TituloSeoOk.' | ';
                        
                        if ($KeyWords_Internas == ''){
                            $KeyWords_Config = $KeyWords_Config;
                        }else{
                            $KeyWords_Config = $KeyWords_Internas;
                        }
                        
                        if ($FotoSeoCompartilha == ''){
                            $FotoSocialSEO = $FotoSocialSEO;
                        }else{
                            $FotoSocialSEO         = $UrlAtual.'admin/fotos/'.$FotoSeoCompartilha;
                        }
                        
                        if ($DescricaoSeoOk == ''){
                            $Descricao_Site_Config = $Descricao_Site_Config;
                        }else{
                            $Descricao_Site_Config = $DescricaoSeoOk;
                        }
                        
                        
                        
                    }else{
                        $paginatitulo          = 'Novidades | ';
                        $Descricao_Site_Config = $Descricao_Site_Config;
                        $FotoSocialSEO         = $FotoSocialSEO;
                    }
            break;
            
            
            case 'doe':
                    
                    
                    if ($nivel1 != ''){
                        $tituloSeo             = mysql_query('SELECT Titulo,KeyWords,SEO,ID,Produto FROM iniciativa WHERE Ativo="S"  AND Nome_URL_Amigavel="'.$nivel1.'"') or die(ErroBanco(130));
                        $NomeParaTituloSeo     = mysql_fetch_array($tituloSeo);
                        $TituloSeoOk           = $NomeParaTituloSeo['Titulo'];
                        $DescricaoSeoOk        = $NomeParaTituloSeo['SEO'];
                        $IDprodFoto            = $NomeParaTituloSeo['ID'];
                        $KeyWords_Internas     = $NomeParaTituloSeo['KeyWords'];
                        $FotoSeoCompartilha    = $NomeParaTituloSeo['Produto'];
                        $paginatitulo          = $TituloSeoOk.' | ';
                        $Descricao_Site_Config = $DescricaoSeoOk;
                        
                        if ($KeyWords_Internas == ''){
                            $KeyWords_Config = $KeyWords_Config;
                        }else{
                            $KeyWords_Config = $KeyWords_Internas;
                        }
                        
                        if ($FotoSeoCompartilha == ''){
                            $FotoSocialSEO = $FotoSocialSEO;
                        }else{
                            $FotoSocialSEO         = $UrlAtual.'admin/fotos/'.$FotoSeoCompartilha;
                        }
                        
                        if ($DescricaoSeoOk == ''){
                            $Descricao_Site_Config = $Descricao_Site_Config;
                        }else{
                            $Descricao_Site_Config = $DescricaoSeoOk;
                        }
                      
                        
                    }else{
                        $paginatitulo          = 'Seja um doador | ';
                        $Descricao_Site_Config = $Descricao_Site_Config;
                        $FotoSocialSEO         = $FotoSocialSEO;
                    }
            break;
           
            }

           
?>
<html class="no-js" lang="pt-br">
<head>
<meta charset="utf-8" />
<title><?php echo $paginatitulo; echo $Titulo_Site_Config; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
 
<meta name="description" content="<?php echo $Descricao_Site_Config; ?>" />
<meta name="keywords" content="<?php echo $KeyWords_Config; ?>" />

<link href="<?php echo $UrlAtual.'imgs/favicon.png'; ?>" rel="icon" sizes="64x64">
<!--Open Graph Protocol-->
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo $URLSEO; ?>" /> 
<meta property="og:site_name" content="<?php echo $Titulo_Site_Config; ?>" />
<meta property="og:title" content="<?php echo $paginatitulo; echo $Titulo_Site_Config; ?>" />
<meta property="og:description" content="<?php echo $Descricao_Site_Config; ?>" />
<meta property="og:image" content="<?php echo $FotoSocialSEO; ?>" />
<link rel="canonical" href="<?php echo $URLSEO; ?>" />

<?php
echo '<link rel="stylesheet" type="text/css" media="all" href="'.$UrlAtual.'estilos/estilos.css" />';
echo '<link rel="stylesheet" type="text/css" media="all" href="'.$UrlAtual.'estilos/responsive.css" />';

echo '<script type="text/javascript" src="'.$UrlAtual.'js/jquery-1.8.3.min.js"></script>';

if ($pagina == 'home' || $pagina == 'projetos' || $pagina == 'novidades' || $pagina == 'doe' || $pagina == 'campanhas'){
    echo '<link rel="stylesheet" type="text/css" media="all" href="'.$UrlAtual.'estilos/component.css" />';
    echo '<link rel="stylesheet" type="text/css" media="all" href="'.$UrlAtual.'estilos/slippry.css" />';
    echo '<script type="text/javascript" src="'.$UrlAtual.'js/slippry.min.js"></script>';
}

if ($pagina == 'campanhas') {
    echo '<script type="text/javascript" src="'.$UrlAtual.'js/efeito-campanha.js"></script>';
}

if ($pagina == 'contatos'){
    echo '<script type="text/javascript" src="'.$UrlAtual.'js/jquery.maskedinput-1.1.4.pack.js"></script>';
}
if ($pagina == 'projetos' || $pagina == 'novidades' || $pagina == 'doe' || $pagina == 'campanha'){
echo '<link href="'.$UrlAtual.'shadowbox/shadowbox.css" rel="stylesheet" type="text/css" />
      <script type="text/javascript" src="'.$UrlAtual.'shadowbox/shadowbox.js"></script>';
echo '<script type="text/javascript">
Shadowbox.init({
language: \'pt\',
player: [\'img\', \'html\', \'iframe\', \'qt\', \'wmp\', \'swf\', \'flv\']
});
</script>';
}
echo '<script type="text/javascript" src="'.$UrlAtual.'js/modernizr-sitesja.js"></script>';
?>

<!--[if lt IE 9]>
<style type="text/css">
    .menosIE8einferior { display: none; }
    .containerIE8 {display:block;
</style>   
<![endif]-->

</head>
<body>
<div id="toTop"></div>
<header> 
   
    <div class="wrap30">
        <div id="logotipo">
            <?php
                $phpself = basename($_SERVER['PHP_SELF']);
                if (($phpself == $index ) && !isset($_GET['secao']) OR ($pagina == 'home'))  {
                echo "<h1><img src=\"$UrlAtual/imgs/logotipo.png\" alt=\"$Titulo_Site_Config\" title=\"$Titulo_Site_Config\" /></h1>";
                }else {
                echo "<h1><a href=\"$UrlAtual\"><img src=\"$UrlAtual/imgs/logotipo.png\" alt=\"$Titulo_Site_Config\" title=\"$Titulo_Site_Config - Página inicial.\" /></a></h1>";
                }
            ?>
        </div>
        
        <nav>
            <span class="a-pull"><a href="#" id="pull"><img src="<?php echo $UrlAtual.'imgs/menu.png'; ?>" alt="Menu" /></a></span>
            <ul id="nav1">
                <?php
                echo '<li><a href="'.$UrlAtual.'" title="Página inicial" class="'.$class0.' '.$class1.' home"></a></li>';
                echo '<li class="a-produtos"><a href="#" title="O Instituto"  id="prodmenu2" class="'.$class2.' '.$class14.' '.$class15.' '.$class16.' quemsomos">O INSTITUTO</a>';
                echo '<ul  class="someProdutos menuquemsomos" style="display:none;"><li  class="submenu"><a href="'.$UrlAtual.'quemsomos/" class="'.$class9.'">Quem Somos</a></li><li  class="submenu"><a href="'.$UrlAtual.'abrangencia/" class="'.$class10.'">Abrangência de Atuação</a></li><li  class="submenu"><a href="'.$UrlAtual.'assembleia/" class="'.$class11.'">Assembleia Geral</a></li></ul></li>';
                echo '<li><a href="'.$UrlAtual.'novidades/" title="Novidades" class="'.$class8.'">NOVIDADES</a></li>';
                echo '<li><a href="'.$UrlAtual.'projetos/" title="Projetos" class="'.$class3.'">PROJETOS E AÇÕES</a></li>';
                echo '<li><a href="'.$UrlAtual.'doe/" title="Seja um Doador" class="'.$class4.'">SEJA UM DOADOR</a></li>';
                echo '<li><a href="'.$UrlAtual.'contatos/" title="Contato" class="'.$class7.'">CONTATOS</a></li>';
                echo '<li><a href="https://www.facebook.com/instituto.superacao.itanhandu" target="_blank" title="Visite nossa Fanpage" class=" icoface"></a></li>';
                ?>
            </ul>            
        </nav>
        <div class="finaliza"></div>
    </div> 
    
</header>
    
<?php
    if( $isCampanhas ) {
        $camp_url = $_REQUEST['secao'];
        $camp_url = explode("/", $camp_url);

        array_shift( $camp_url ); // remove o "/campanhas"
        if( $camp_url[0]=="pagseguro" ) {
            $ctrl="";
        } else {
            $ctrl = "campanha/";
        }

        $nova_url = $ctrl . implode("/", $camp_url);

        if( count($_REQUEST)>1 ) {
            array_shift( $_REQUEST );
            $nova_url .= "?".http_build_query( $_REQUEST );
        }

        $content = file_get_contents( 'http://'.$_SERVER['SERVER_NAME'].'/superacao/_cmp/'.$nova_url );

        echo $content;
    } else {
        require("{$pasta}/{$pagina}.php");
    }
?>
    
<footer>
    <div class="wrapfull fundoVerdeEscuro">
        <div class="wrap30">

            <div class="isa">
                <p><img src="<?php echo $UrlAtual.'imgs/logo_rodape.png'; ?>" alt="Instituto SuperAÇÃO" /></p>
            </div>

       
            <div class="footer">
                <div itemscope="itemscope" itemtype="http://schema.org/Organization">
                    <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                        <p><span itemprop="streetAddress">Rua Engenheiro Paulo Franco da Rosa, 163, Centro</span></p>
                        <p><span itemprop="addressLocality">Itanhandu</span> - <span itemprop="addressRegion">MG</span> | <span itemprop="postalCode">CEP: 37464-000</span></p>                  
                        <p>E-mail: <span itemprop="email"><?php echo ''.encode_email($EMail_Config).''; ?></span></p>
                        <p>facebook.com/instituto.superacao.itanhandu</p>
                        <p>Fone: <span itemprop="telephone"><?php echo ''.encode_email($Telefone_Config).''; ?></a></p>
                    </div>
                </div>
                
            </div>
            
            <div class="finaliza"></div>
            
        </div>
    </div> 
    
    <div class="wrapfull fundoVerdeEscuroPlus">
        <div class="wrap30">
            <div class="GridSitesja">
                <p class="sitesja" itemscope="itemscope" itemtype="http://schema.org/WebPage"><a itemprop="url" content="http://www.sitesja.com.br" href="http://www.sitesja.com.br" target="_blank" title="Sites Já: Desenvolvimento e Soluções web." class="sitesja"><img src="<?php echo $UrlAtual.'imgs/sitesja.png'; ?>" alt="Sites Já" itemprop="image" /></a><meta itemprop="name" content="Sites Já: Desenvolvimento e Soluções Web" /></p>
            </div>
        </div>
    </div>
</footer>
                
    <script>
$(function() {

    $('body').on('click', function (e) {
    if (!$('nav ul').is(e.target) 
       && $('nav ul').has(e.target).length === 0 
      ) {
       $('.menuquemsomos').hide();
      }
     });

var pull3 = $('#prodmenu2');
        menu3       = $('nav ul.menuquemsomos');
        menuHeight3 = menu3.height();
        
        $(pull3).on('click', function(e3) {
        e3.preventDefault();
        menu3.slideToggle();
        
        $(".menuprodutos").hide("");
    });


    var pull 		= $('#pull');
                menu 		= $('nav ul');
                menuHeight	= menu.height();

        $(pull).on('click', function(e) {
                e.preventDefault();
                menu.slideToggle();
                $(".menuquemsomos").hide("");
        });

        $(window).resize(function(){
        var w = $(window).width();
        if(w > 685 && menu.is(':hidden')) {
                menu.removeAttr('style');
        }
    });
});

</script>

<script type="text/javascript">
    
    var largura;
        largura = screen.width;
        if (largura <= '960') { 
            
          
        }else{
            $(function() {
                $(window).scroll(function() {
                if($(this).scrollTop() > 100) {
                    $('#toTop').fadeIn();
                } else {
                    $('#toTop').fadeOut();
                }
            });
                $('#toTop').click(function() {
                    $('body,html').animate({scrollTop:0},800);
                });
            });
        }
    

</script>

<?php
    if ($pagina == 'contato' || $pagina == 'suporte'){
    echo '
        <script>
            $(document).ready(function() {
            function add() {if($(this).val() == \'\'){$(this).val($(this).attr(\'placeholder\')).addClass(\'placeholder\');}}
            function remove() {if($(this).val() == $(this).attr(\'placeholder\')){$(this).val(\'\').removeClass(\'placeholder\');}}
            if (!(\'placeholder\' in $(\'<input>\')[0])) { // Create a dummy element for feature detection
                $(\'input[placeholder], textarea[placeholder]\').blur(add).focus(remove).each(add); // Select the elements that have a placeholder attribute
                $(\'form\').submit(function(){$(this).find(\'input[placeholder], textarea[placeholder]\').each(remove);}); // Remove the placeholder text before the form is submitted
            }
        });
        </script>
    ';
    }
?>
</body>
</html>
