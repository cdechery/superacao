<?php
session_start();

$index = "index.php";
$id        = isset($_GET['id'])          ? $_GET['id']   : '';
$campanhas        = isset($_GET['campanhas'])          ? $_GET['campanhas']   : '';
$subid     = isset($_GET['subid'])       ? $_GET['subid']   : '';
$acaodepag = isset($_GET['acao'])        ? $_GET['acao'] : '';
$root ="/superacao/";

$campanhas_tokens = array('50us1gz6b53d9ywAIphzmkE8ra3xj4kP',
    '5v61bMjknZ698fq9a8M7GtJq6RnEuMFM',
    'avCBn00UFU014EV80JzJGkvvqUO44Kga');
$token_idx = rand(0, 2);
$cmp_token = $campanhas_tokens[$token_idx];

if( !isset($_SESSION["Usuario_Logado"]) || $_SESSION["Usuario_Logado"] != "Admin" ){
header("location: login.php?id=".$id."&campanhas=".$campanhas);exit;
}

require_once('includes/funcoes.php');
require_once('includes/conexao.php');

$TituloSite    = mysql_query('SELECT Titulo_Site,EMail,URL FROM config WHERE ID="1"') or die(ErroBanco(59));
$L_TituloSite  = mysql_fetch_array($TituloSite);
$Title         = $L_TituloSite['Titulo_Site'];
$EMailUsado    = $L_TituloSite['EMail'];
$URLUsada      = $L_TituloSite['URL'];
?>
<!DOCTYPE html>
<html class="no-js" lang="pt-br">
<head>
<meta charset="utf-8" />
<title><?php echo $Title; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="author" content="Diogo Ordine" />
<link href="imgs/favicon.png" rel="icon" sizes="64x64">
<link href="estilos/estilos.css" rel="stylesheet" media="screen">
<link href="estilos/responsive.css" rel="stylesheet" media="screen">

<link href="estilos/print.css" rel="stylesheet" media="print">
<script src="js/jquery172.js"></script>
<script src="js/jquery.maskedinput-1.1.4.pack.js"></script>
<script src="js/limitar_textarea.js"></script>
<script src="js/modernizr-sitesja.js"></script>
</head>
<body id="pesquisatopo">
<div class="full">
    <header class="linha-top">
        <h1><?php echo $Title; ?></h1>
        
    </header>
    
        <?php
        $class1          = $id        == ''                                       ? 'ativado' : '' ;
        $class11         = $acaodepag == 'home'                                   ? 'ativado' : '' ;
        $classaa         = $id        == 'home'                                   ? 'ativado' : '' ;
        $class6          = $id        == 'configuracoes'                          ? 'ativado' : '' ;
        $clasnot         = $id        == 'iniciativa'                             ? 'ativado' : '' ;
        $clasnot2        = $acaodepag == 'iniciativa'                             ? 'ativado' : '' ;
        $clasdepo        = $id        == 'depoimentos'                            ? 'ativado' : '' ;
        $clasdepo2       = $acaodepag == 'depoimentos'                            ? 'ativado' : '' ;
        $clasuploads     = $id        == 'uploads'                                ? 'ativado' : '' ;
        $clasuploads2    = $acaodepag == 'uploads'                                ? 'ativado' : '' ;
        $clasprodutos    = $id        == 'produtos'                               ? 'ativado' : '' ;
        $clasprodutos2   = $acaodepag == 'produtos'                               ? 'ativado' : '' ;
        $clasnovidade    = $id        == 'novidades'                              ? 'ativado' : '' ;
        $clasnovidade2   = $acaodepag == 'novidades'                              ? 'ativado' : '' ;
        
        ?>
    <nav>
        <span class="a-pull"><a href="#" id="pull"><i class="icon icon-th-list"></i> Menu</a></span>
        <ul>
            <li><a href="index.php" title="Home" class="<?php echo $class1; echo $class11; echo $classaa; ?>"><i class="icon icon-home"></i>Home</a></li>
            <li><a href="index.php?id=configuracoes" title="Configurações" class="<?php echo $class6; ?>"><i class="icon icon-wrench"></i>Configurações</a></li>
            <li><a href="index.php?id=novidades" title="Novidades" class="<?php echo $clasnovidade; echo $clasnovidade2; ?>"><i class="icon icon-list-alt"></i>Novidades</a></li>
            <li><a href="index.php?id=produtos" title="Projetos e Ações" class="<?php echo $clasprodutos; echo $clasprodutos2; ?>"><i class="icon icon-list-alt"></i>Projetos e Ações</a></li>
            <li><a href="index.php?id=iniciativa" title="Iniciativa" class="<?php echo $clasnot; echo $clasnot2; ?>"><i class="icon icon-list-alt"></i>Iniciativa</a></li>
            <li><a href="index.php?campanhas=listar?admin_token=<?php echo $cmp_token?>" title="Campanha" class="<?php echo $clasnot; echo $clasnot2; ?>"><i class="icon icon-list-alt"></i>Campanha</a></li>
            
            <li><a href="index.php?id=uploads" title="Uploads" class="<?php echo $clasuploads; echo $clasuploads2; ?>"><i class="icon icon-circle-arrow-up"></i>Uploads</a></li> 
            
            
            
            <li><a href="logout.php" title="Sair"><i class="icon icon-off"></i>Sair</a></li>
            
        </ul>
        <div class="sem-lateral"></div>
    </nav>
    
    
    
    <section class="principal">
        <?php
                if (!isset($_GET['id']) && !isset($_GET['campanhas']) ) { include 'pags/home.php'; }
                
                    if  (isset($_GET['id'])) {
                        if (file_exists("pags/$id.php")) {
                        include "pags/$id.php"; }
                    } else if (isset($_GET['campanhas'])) {
                        include 'http://'.$_SERVER['SERVER_NAME'].$root.'_cmp/campanha/'.urldecode($_GET['campanhas']);
                    }
        ?>
    </section>
    
    
    
</div>
    <script>
		$(function() {
			var pull 		= $('#pull');
				menu 		= $('nav ul');
				menuHeight	= menu.height();

			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});

			$(window).resize(function(){
        		var w = $(window).width();
        		if(w > 768 && menu.is(':hidden')) {
        			menu.removeAttr('style');
        		}
    		});
		});
	</script>
</body>
</html>