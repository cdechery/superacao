<?php
######################################################
#  ERRO NO BANCO DE DADOS
function ErroBanco($a) {
   $a = '<span class="alert">Não foi possível realizar a consulta ao banco de dados.<br />'.mysql_error().'<br /> Erro na linha: '.$a.'</span>';
   return $a;
}
######################################################

function resumo($string,$chars) {
if (strlen($string) > $chars) {
while (substr($string,$chars,1) <> ' ' && ($chars < strlen($string))){
$chars++;
}
}
$CountString = strlen($string);
if ($chars < $CountString){
    $trespontinhos = '...';
}else{
    $trespontinhos = '';
}
return substr($string,0,$chars).$trespontinhos;
}

function dataformatada($Data){
    $DataFormatada = date("d/m/Y G:i",strtotime($Data));
    return $DataFormatada;
}


function dataAtual(){
    $DataFormatada = date("Y-m-d");
    return $DataFormatada;
}

function dataParaBase($Data){
    $explodirdata = explode("/", $Data);
    $diacorreto   = $explodirdata[0];
    $mescorreto   = $explodirdata[1];
    $anocorreto   = $explodirdata[2];
    $DataBanco    = $anocorreto.'-'.$mescorreto.'-'.$diacorreto;
    return $DataBanco;
}

function dataParaSite($Data){
    $explodirdata = explode("-", $Data);
    $diacorreto   = $explodirdata[2];
    $mescorreto   = $explodirdata[1];
    $anocorreto   = $explodirdata[0];
    $DataBanco    = $diacorreto.'/'.$mescorreto.'/'.$anocorreto;
    return $DataBanco;
}

function dataAno($Data){
    $explodirdata = explode("-", $Data);
    $DataBanco    = $explodirdata[0];
    return $DataBanco;
}

function Ativo($Ativo) {
        if($Ativo == 'S'){ 
            $iconeAtivo = '<span class="icoenable" title="Ativado"><i class="icon icon-star"></i></span>';
        }else{
            $iconeAtivo = '<span class="icodesable" title="Desativado"><i class="icon icon-star-empty"></i></span>';
        }
        return $iconeAtivo;
	
}

function AtivoBanner($AtivoBanner,$id,$ID_C,$tabela) {
    
        if (isset($_GET['updatebpsn'])){
            $updateBP = $_GET['updatebpsn'];
            $idc_banner = $_GET['idc'];
            if ($updateBP == 'S'){
                $Query_UpdateSBP  = mysql_query('UPDATE '.$tabela.' SET
                Ativo = "S"
                WHERE ID="'.$idc_banner.'"') or die(ErroBanco(23));
            }else{
                $Query_UpdateSBP  = mysql_query('UPDATE '.$tabela.' SET
                Ativo = "N"
                WHERE ID="'.$idc_banner.'"') or die(ErroBanco(23));  
            }
            echo '<script type="text/javascript">';
            echo 'alert(\'Alterado com sucesso!\');';
            echo '</script>';
            echo '<script>window.location="'.$_SERVER["PHP_SELF"].'?id='.$id.'";</script>';
        }
    
        if($AtivoBanner == 'S'){
           
                $iconeAtivo = '<a class="icoenable" href="'.$_SERVER['PHP_SELF'].'?id='.$id.'&amp;updatebpsn=N&amp;idc='.$ID_C.'"><span  title="Ativado"><i class="icon icon-star"></i></span></a>';
            
        }else{
           
                $iconeAtivo = '<a href="'.$_SERVER['PHP_SELF'].'?id='.$id.'&amp;updatebpsn=S&amp;idc='.$ID_C.'"><span title="Ativar?"><i class="icon icon-star-empty"></i></span></a>';
            
        }
        return $iconeAtivo;
	
}

function Principal($Pricipal,$idProduto,$ID_C,$tabela) {
    
        if (isset($_GET['updatebp'])){
            $id_alt     = $_GET['id_alt'];
            $manterN   = mysql_query('SELECT Destaque FROM '.$tabela.' WHERE Destaque="S" ');
            while ($linha_Sbp      = mysql_fetch_array($manterN)){
           
                    $Query_UpdateNBP = mysql_query('UPDATE '.$tabela.' SET
                    Destaque        = "N"
                    WHERE Destaque="S" AND ID_Produtos="'.$id_alt.'"') or die(ErroBanco(23));

            }
            $idc_banner = $_GET['idc'];
            
            $Query_UpdateSBP  = mysql_query('UPDATE '.$tabela.' SET
            Destaque = "S"
            WHERE ID="'.$idc_banner.'"') or die(ErroBanco(23));
            
            echo '<script type="text/javascript">';
            echo 'alert(\'Alterado com sucesso!\');';
            echo '</script>';
            echo '<script>window.location="'.$_SERVER["PHP_SELF"].'?id=profotos&acao=produtos&id_alt='.$id_alt.'";</script>';
        }
    
        if($Pricipal == 'S'){ 
            $iconeAtivo = '<span class="icoenable" title="Foto Principal"><i class="icon icon-ok-sign"></i></span>';
        }else{
            $iconeAtivo = '<a href="'.$_SERVER['PHP_SELF'].'?id=profotos&amp;acao=produtos&amp;updatebp=ativo&amp;idc='.$ID_C.'&amp;id_alt='.$idProduto.'"><span title="Ativar foto como Principal?"><i class="icon icon-ok-circle"></i></span></a>';
        }
        return $iconeAtivo;
	
}

function apagarAquivos($ID,$tabela,$NomePag,$Tipo) {
    echo '<script type="text/javascript">
            function MM_del() { //v3.0
                    var i, args=MM_del.arguments; document.MM_returnValue = false;
            for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location=\'"+args[i+1]+"\'");
            }
            function apagar'.$ID.'(){
                    var agree=confirm("Deseja excluir este Ã­tem?");
                    if (agree)
           MM_del(\'parent\',\''.$_SERVER["PHP_SELF"].'?id=apagarregistro&tabela='.$tabela.'&acao='.$NomePag.'&tipo='.$Tipo.'&id_apagar='.$ID.'\');
            }
           </script>';
    echo '<a href="#" onClick="apagar'.$ID.'()" title="Deletar"><i class="icon icon-trash"></i></a></td>';
}

function retiraCaracteresResumos($string){
    //está permitindo aspas duplas! = ,"\"",
    $caracteres = array ("'","\\","UNION","<",">","`","^","~");
    $string = str_replace($caracteres,"",$string); // retirando caracteres
    return $string;
}

function pagCadGrupo($Titulo,$NomePag,$NomeGrupo){
    echo '<div class="migalhadepao">';
    echo '<h1><i class="icon icon-folder-open"></i><span class="antes">'.$NomeGrupo.'</span> <i class="icon icon-chevron-right"></i> <span class="antes"><a href="index.php?id='.$NomePag.'" title="Lista">'.$Titulo.'</a></span> <i class="icon icon-chevron-right"></i> Cadastrar</h1>';
    echo '</div>';
}

function pagCad($titulo,$nomepag){
    echo '<div class="migalhadepao">';
    
        echo '<h1><i class="icon icon-folder-open"></i><span class="antes"><a href="index.php?id='.$nomepag.'" title="Lista">'.$titulo.'</a></span> <i class="icon icon-chevron-right"></i> Cadastrar</h1>';
    
    echo '</div>';
}

function pagListaGrupo($Titulo,$NomePag,$NomeGrupo){
    echo '<div class="migalhadepao">';
    if ($NomePag == 'comentarios'){
        echo '<h1><i class="icon icon-folder-open"></i><span class="antes">'.$NomeGrupo.'</span> <i class="icon icon-chevron-right"></i> '.$Titulo.'</h1>';
    }else{
        echo '<h1><i class="icon icon-folder-open"></i><span class="antes">'.$NomeGrupo.'</span> <i class="icon icon-chevron-right"></i> '.$Titulo.'<span class="ico-niveis"><a href="index.php?id=cad_'.$NomePag.'&amp;acao='.$NomePag.'" title="Cadastrar"><i class="icon icon-file"></i>Novo</a></span></h1>';
    }
    
    echo '</div>';
}

function pagLista($titulo,$nomepag){
    echo '<div class="migalhadepao">';
   
        echo '<h1><i class="icon icon-folder-open"></i>'.$titulo.'<span class="ico-niveis"><a href="index.php?id=cad_'.$nomepag.'&amp;acao='.$nomepag.'" title="Cadastrar"><i class="icon icon-file"></i>Novo</a></span></h1>';
    
    
    echo '</div>';
}

function pagEdicao($Titulo,$NomePag,$SubTitulo){
    echo '<div class="migalhadepao">';
    echo '<h1><i class="icon icon-folder-open"></i><span class="antes"><a href="index.php?id='.$NomePag.'" title="Lista">'.$Titulo.'</a></span> <i class="icon icon-chevron-right"></i> '.$SubTitulo.' <span class="ico-niveis"><a href="index.php?id=cad_'.$NomePag.'&amp;acao='.$NomePag.'" title="Cadastrar"><i class="icon icon-file"></i>Novo</a></span></h1>';
    echo '</div>';
}

/* INICIO Da PÁGINAÇÃO */

function paginacao($PGAtual,$TotalPorPG,$tabela,$ordem,$AtivadoSN,$id,$Tipo) {
	$pagina_anterior      = $PGAtual - 1;
	$pagina_posterior     = $PGAtual + 1;
	$pagina_teste         = $PGAtual*$TotalPorPG;
        
        if($AtivadoSN == 'S'){
            $AtivadoSN = 'WHERE Ativo="S" ';
        }elseif ($AtivadoSN == 'N') {
            $AtivadoSN = 'WHERE Ativo="N" ';
        }else{
            $AtivadoSN = '';
        }
        
        if ($ordem != ''){
            $ordem = 'ORDER BY '.$ordem;
        }else{
            $ordem = '';
        }
        
        if ($Tipo != ''){
            $SoTipo    = 'AND Tipo="'.$Tipo.'"';
        }else{
            
            $SoTipo    = '';
        }
        
        $query_total_registro = mysql_query('SELECT * FROM '.$tabela.'  ');
        $query_total_nreg     = mysql_num_rows($query_total_registro);
        
        $query_teste          = mysql_query("SELECT * FROM ".$tabela." ".$AtivadoSN."  ".$ordem." LIMIT ".$pagina_teste.",".$TotalPorPG);
	$numero_teste         = mysql_num_rows($query_teste);

	//----------------------------------------------------------------------
	if ($query_total_nreg>0){
		$variavel_numeros = "";
		$query_total_nreg/=$TotalPorPG;
		$query_total_nreg = ceil($query_total_nreg);
		$paginaref = $PGAtual;
		for($rr=3;$rr>0;$rr--){
			if (($paginaref-$rr)>0){
				$variavel_numeros.=' <a href="'.$_SERVER['PHP_SELF'].'?id='.$id.'&amp;paginacao='.($PGAtual-$rr).'" target="_self">'.
				($PGAtual-$rr).'</a> ';
			}
		}
		if ($query_total_nreg>1) {$variavel_numeros.=' <span title="Página Atual" class="numerodesativado">'.$PGAtual.'</span> ';}
		for($rr=1;$rr<4;$rr++){
			if (($paginaref+$rr)<=$query_total_nreg){
				$variavel_numeros.=' <a href="'.$_SERVER['PHP_SELF'].'?id='.$id.'&amp;paginacao='.($PGAtual+$rr).'" target="_self">'.
				($PGAtual+$rr).'</a> ';
			}
		}
	}
	//----------------------------------------------------------------------
	if ($pagina_anterior>0){
		$setaanterior   = '<a href="'.$_SERVER['PHP_SELF'].'?id='.$id.'&amp;paginacao='.$pagina_anterior.'" target="_self" title="Página Anterior"><i class="icon icon-backward"></i></a> ';
                $PrimeiraPagina = '<a href="'.$_SERVER['PHP_SELF'].'?id='.$id.'&amp;paginacao=1" target="_self" title="Primeira Página"><i class="icon icon-step-backward"></i></a> ';
    }else{
		$setaanterior   = '<a href="#" class="desativado"><i class="icon icon-backward" style="filter: alpha(opacity=20); -moz-opacity: 0.2; opacity:0.2;"></i></a> ';
                $PrimeiraPagina = '<a href="#" class="desativado"><i class="icon icon-step-backward" style="filter: alpha(opacity=20); -moz-opacity: 0.2; opacity:0.2;"></i></a> ';
	}
	if ($numero_teste>0){
		$setaposterior = '<a href="'.$_SERVER['PHP_SELF'].'?id='.$id.'&amp;paginacao='.$pagina_posterior.'" target="_self" title="Página Posterior"><i class="icon icon-forward"></i></a> ';
                $UltimaPagina  = '<a href="'.$_SERVER['PHP_SELF'].'?id='.$id.'&amp;paginacao='.$query_total_nreg.'" target="_self" title="Última Página"><i class="icon icon-step-forward"></i></a> ';
	}else{
		$setaposterior = '<a href="#" class="desativado"><i class="icon icon-forward" style="filter: alpha(opacity=20); -moz-opacity: 0.2; opacity:0.2;"></i></a> ';
                $UltimaPagina  = '<a href="#" class="desativado"><i class="icon icon-step-forward" style="filter: alpha(opacity=20); -moz-opacity: 0.2; opacity:0.2;"></i></a> ';
	}
	//----------------------------------------------------------------------
	
        if ($query_total_nreg>1){
            print ('<div class="paginacao">');
            print ('<p class="npags">'.$PGAtual.'/'.$query_total_nreg.'</p>');
            print ('<p>');
            print ($PrimeiraPagina . $setaanterior . $variavel_numeros . $setaposterior . $UltimaPagina);
            print ('</p>');
            print ('</div>');
        }
}
/* FINAL DA PÁGINAÇÃO */

function listas($tabela,$AtivoSN,$paginar,$id_alt,$Tipo){
    global $id,$pagina_teste,$TotalPorPG;
    
    if($tabela == 'noticias'){
        $nomedatabela = 'notÃ­cias';
    }elseif($tabela == 'profotos' || $tabela == 'inifotos'){
        $nomedatabela = 'fotos';
    
    }elseif($tabela == 'proarquivos' || $tabela == 'iniarquivos'){
        $nomedatabela = 'arquivos';
    }else{
        $nomedatabela = $tabela;
    }
    
    
    
    switch ($tabela){
        
       
       case 'depoimentos':
            
                $campoOrderBY = 'Data DESC';
                $camposTH = '<tr>
                              <th>Data</th>
                              <th>Nome</th>';
                
                $camposTH .= '
                              <th>Depoimento</th>
                              <th>OpÃ§Ãµes</th></tr>';
            
            break;
        
        case 'noticias':
        case 'produtos':
        case 'iniciativa':
            
                $campoOrderBY = 'Data DESC, Titulo ASC';
                $camposTH = '<tr>
                              <th>Data</th>
                              <th>TÃ­tulo</th>
                              <th>OpÃ§Ãµes</th></tr>';
            
            break;
        
        case 'profotos':
        case 'inifotos':
                              $campoOrderBY = 'ID ASC';
                              $camposTH = '<tr>
                                            <th>Foto</th>
                                            <th>OpÃ§Ãµes</th>
                                         </tr>';
        break;
        
        case 'proarquivos':
        case 'iniarquivos':
                              $campoOrderBY = 'ID ASC';
                              $camposTH = '<tr>
                                            <th>Arquivo</th>
                                            <th>OpÃ§Ãµes</th>
                                         </tr>';
            break;
        
       
        case 'uploads':     $campoOrderBY = 'Data DESC';
                            $camposTH = '<tr>
                                            <th>Data</th>
                                            <th>URL</th>
                                            <th>Legenda</th>
                                            <th>OpÃ§Ãµes</th>
                                         </tr>';
            break;
        
    }
    
    if ($AtivoSN == "N") {
        $Ativando     = 'WHERE Ativo="'.$AtivoSN.'"';
        $setacao      = '&amp;acao=home';
        $acaoapagar   = '&acao=home';
        $blockCad     = 'bloqueados';
    }else{
        $Ativando     = '';
        $setacao      = '&amp;acao='.$tabela.'';
        $acaoapagar   = '&acao='.$tabela.'';
        $blockCad     = 'cadastradas(os)';
    }
    
    if ($tabela == "noticias" || $tabela == 'iniciativa'){
        $NomeClassTh = 'class="produtos"';
    }else{
        $NomeClassTh = 'class="'.$tabela.'"';
    }
    
    if ($tabela == 'profotos' || $tabela == 'proarquivos' || $tabela == 'inifotos' || $tabela == 'iniarquivos') {
        $whereusado = 'WHERE ID_Produtos="'.$id_alt.'"';
    }else{
        $whereusado = '';
    }
    
    if($paginar == 'paginar'){
        $limitar = 'LIMIT '.$pagina_teste.',';
    }else{
        $limitar = '';
        $TotalPorPG = '';
    }
    
    
    
    if (isset($_GET['pesquisa'])){
    if (isset($_POST['pesquisar'])){
        switch ($tabela){
            
            case 'noticias':
            case 'produtos':
            case 'iniciativa':
                if ($_POST['Data'] != '' OR $_POST['Titulo'] != ''){
                if ($_POST['Data'] != ''){
                    $datapesq     = explode("/",$_POST['Data']);
                    $DataPesquisa = $datapesq[2].'-'.$datapesq[1].'-'.$datapesq[0];
                    $Linhas_C = mysql_query('SELECT * FROM '.$tabela.' WHERE Data="'.$DataPesquisa.'" ORDER BY Data DESC ');
                }
                
                if($_POST['Data'] == '' && $_POST['Titulo'] != ''){
                    $str = mb_strtoupper($_POST['Titulo'], 'UTF-8');
                    if ($tabela == 'noticias'){
                        $TituloTratado = addslashes($_POST['Titulo']);
                    }else{
                        $TituloTratado = addslashes($str);
                    }
                    
                    $Linhas_C    = mysql_query('SELECT * FROM '.$tabela.' WHERE Titulo LIKE "%'.$TituloTratado.'%" ORDER BY Titulo ASC ');
                }
                }else{
                    echo '<script>window.location="'.$_SERVER["PHP_SELF"].'?id='.$tabela.'";</script>';
                }
            
            break;
            
            case 'depoimentos':
               if ($_POST['Data'] != '' OR $_POST['Descricao'] != ''){
                if ($_POST['Data'] != ''){
                    $datapesq     = explode("/",$_POST['Data']);
                    $DataPesquisa = $datapesq[2].'-'.$datapesq[1].'-'.$datapesq[0];
                    $Linhas_C = mysql_query('SELECT * FROM '.$tabela.' WHERE Data="'.$DataPesquisa.'" ORDER BY Data DESC ');
                }
                
                if($_POST['Data'] == '' && $_POST['Descricao'] != ''){
                        $str = mb_strtoupper($_POST['Descricao'], 'UTF-8');
                        $TituloTratado = addslashes($_POST['Descricao']);
                        $Linhas_C    = mysql_query('SELECT * FROM '.$tabela.' WHERE Depoimento LIKE "%'.$TituloTratado.'%" ORDER BY Nome ASC ');
                }
                
                }else{
                    echo '<script>window.location="'.$_SERVER["PHP_SELF"].'?id='.$tabela.'";</script>';
                }
            
            break;
            
            case 'uploads':
                if ($_POST['Data'] != '' OR $_POST['Legenda'] != ''){
                    if($_POST['Data'] != ''){
                        $Linhas_C = mysql_query("SELECT * FROM $tabela WHERE DATE(Data)=STR_TO_DATE('".$_POST['Data']."','%d/%m/%Y') ORDER BY Data DESC ");
                    }
                    if($_POST['Legenda'] != '' && $_POST['Data'] == ''){
                        $str = mb_strtoupper($_POST['Legenda'], 'UTF-8');
                        $TituloTratado = addslashes($_POST['Legenda']);
                        $Linhas_C    = mysql_query('SELECT * FROM '.$tabela.' WHERE Legenda LIKE "%'.$TituloTratado.'%" ORDER BY Legenda ASC ');
                    }
                }else{
                    echo '<script>window.location="'.$_SERVER["PHP_SELF"].'?id='.$tabela.'";</script>';
                }
                
            break;

            
        }
    }    
    }else{
                                        
            $Linhas_C    = mysql_query('SELECT * FROM '.$tabela.' '.$whereusado.' '.$Ativando.' ORDER BY '.$campoOrderBY.' '.$limitar.' '.$TotalPorPG);
         
        
    }
    
    $count_C     = mysql_num_rows($Linhas_C);
    
   
        if ($count_C == '') {
            $completaVazio = '';
            if (isset($_POST['pesquisar'])){
                $completaVazio = ' com esta pesquisa';
            }
            echo '<p>NÃ£o hÃ¡ '.$nomedatabela.' '.$blockCad.''.$completaVazio.'.</p>';
        }else{
            
                if ($id == ''){
                    echo '<p>Lista dos '.$nomedatabela.' que ainda estÃ£o '.$blockCad.'.</p>';
                }else{
                    echo '<p>Lista geral.</p>';
                    
                }
        
        echo '<table>';
        echo '<thead>';
        echo $camposTH;
        echo '</thead><tbody>';
        
            while ($linhasdo_C  = mysql_fetch_array($Linhas_C)){
                
                echo '<tr>';
                switch ($tabela){
                    case 'noticias':
                    case 'produtos':
                    case 'iniciativa':
                        
                        
                            $ID_C           = $linhasdo_C['ID'];
                            $Data           = $linhasdo_C['Data'];
                            $AtivoBanner    = $linhasdo_C['Ativo'];
                            $Titulo         = stripslashes($linhasdo_C['Titulo']);
                            
                            $Data_C         = dataParaSite($Data);
                            $iconeAtivo  = AtivoBanner($AtivoBanner,$id,$ID_C,$tabela);
                            
                            echo '<td '.$NomeClassTh.'>'.$Data_C.'</td>';
                            
                                
                                $AcaoLimit =  resumo($Titulo, 40);
                                echo '<td '.$NomeClassTh.'>'.$AcaoLimit.'</td>';
                                
                                if ($tabela == 'produtos'){
                                    $cad_fotos    = '<a href="index.php?id=profotos&amp;id_alt='.$ID_C.''.$setacao.'" title="Cadastrar Fotos"><i class="icon icon-picture"></i></a>';
                                    /*$cad_arquivos = '<a href="index.php?id=proarquivos&amp;id_alt='.$ID_C.''.$setacao.'" title="Cadastrar Arquivos"><i class="icon icon-circle-arrow-down"></i></a>';*/
                                }elseif($tabela == 'iniciativa'){
                                    $cad_fotos    = '<a href="index.php?id=inifotos&amp;id_alt='.$ID_C.''.$setacao.'" title="Cadastrar Fotos"><i class="icon icon-picture"></i></a>';
                                    
                                }else{
                                    $cad_fotos = '';
                                    /*$cad_arquivos = '';*/
                                }
                            
                            
                        
                        echo '<td '.$NomeClassTh.'>'.$iconeAtivo.' '.$cad_fotos.'  <a href="index.php?id=edit_'.$Tipo.'&amp;id_alt='.$ID_C.''.$setacao.'" title="Editar"><i class="icon icon-edit"></i></a>';
                        apagarAquivos($ID_C,$tabela,$Tipo,$Tipo);

                                        
                        break;
                        
                        case 'depoimentos':
                            
                            $ID_C           = $linhasdo_C['ID'];
                            $Data           = $linhasdo_C['Data'];
                            $AtivoBanner    = $linhasdo_C['Ativo'];
                            $Nome           = $linhasdo_C['Nome'];
                            $Depoimento     = stripslashes($linhasdo_C['Depoimento']);
                            
                            $DataComentario = dataParaSite($Data);
                            
                            echo '<td '.$NomeClassTh.'>'.$DataComentario.'</td>';
                            echo '<td '.$NomeClassTh.'>'.$Nome.'</td>';
                            $AcaoLimit =  resumo($Depoimento, 44);
                            echo '<td '.$NomeClassTh.'>'.$AcaoLimit.'</td>';
                            

                            $iconeAtivo  = AtivoBanner($AtivoBanner,$id,$ID_C,$tabela);
                            
                            echo '<td '.$NomeClassTh.'>'.$iconeAtivo.' <a href="index.php?id=edit_'.$tabela.'&amp;id_alt='.$ID_C.''.$setacao.'" title="Editar"><i class="icon icon-edit"></i></a>';
                            apagarAquivos($ID_C,$tabela,"depoimentos",$Tipo);
                           
                        
                        
                        
                        break;
                                        
                                        
                       
                        
                         case 'uploads':
                                        $ID_C           = $linhasdo_C['ID'];
                                        $Data           = $linhasdo_C['Data'];
                                        $Legenda        = stripslashes($linhasdo_C['Legenda']);
                                        $Arquivo        = $linhasdo_C['Arquivo'];
                                        $AtivoBanner    = $linhasdo_C['Ativo'];
                                        $AtivoDesativo  = AtivoBanner($AtivoBanner,$id,$ID_C,$tabela);
                                        
                                        
                                        $dataEdicaoform = dataformatada($Data);
                                        
                                        
                                        $ConfigSite     = mysql_query('SELECT URL FROM config WHERE ID="1" ');
                                        $UrlSite        = mysql_fetch_array($ConfigSite);
                                        $UrlCompleta    = $UrlSite['URL'];
                                        
                                        echo '<td '.$NomeClassTh.'>'.$dataEdicaoform.'</td>';
                                       
                                        echo '<td '.$NomeClassTh.'>'.$UrlCompleta.'/admin/'.$tabela.'/'.$Arquivo.'</td>';
                                       
                                        
                                        echo '<td '.$NomeClassTh.'>'.$Legenda.'</td>';
                                        echo '<td '.$NomeClassTh.'>'.$AtivoDesativo.' <a href="'.$UrlCompleta.'/admin/'.$tabela.'/'.$Arquivo.'" target="_blank" title="Visualizar Arquivo"><i class="icon icon-eye-open"></i></a>';
                                        apagarAquivos($ID_C,$tabela,$tabela,"");   
                                        
                        break;
                    
                        case 'profotos':
                        case 'proarquivos':
                        case 'inifotos':
                        case 'iniarquivos':
                                            $ID_C           = $linhasdo_C['ID'];
                                            $idProdutos     = $linhasdo_C['ID_Produtos'];
                                            $Produto        = $linhasdo_C['Produto'];
                                            $Destaque       = $linhasdo_C['Destaque'];
                                            $Legenda        = stripslashes($linhasdo_C['Legenda']);
                                            if ($tabela == 'profotos' || $tabela == 'inifotos'){
                                                /*$PrincipalAD    = Principal($Destaque,$idProdutos,$ID_C,$tabela);*/
                                                $fixamarca      = '<img src="fixamarca/thumb.php?url='.$Produto.'&amp;publico=N" title="'.$Produto.' | '.$Legenda.'" alt="'.$Produto.'" />';
                                            }else{
                                                $PrincipalAD = '';
                                                $fixamarca   = $Legenda;
                                            }
                                            echo '<td '.$NomeClassTh.'>'.$fixamarca.'</td>';
                                            echo '<td '.$NomeClassTh.'>';
                                            /*echo $PrincipalAD;*/
                                            apagarAquivos($ID_C,$tabela,$tabela,""); 
                            break;
                    
                    
                }
                
                echo '</tr>';
                
                
            }
            
        echo '</tbody></table>';
        }
       
}

function fotosocial($tabela,$Largura,$SocialDestaque,$IDTable){
    if ($SocialDestaque == "SDupload"){
        $QueryFoto   = 'SELECT * FROM '.$tabela.' WHERE ID="'.$IDTable.'" ';
        $LinhaFoto   = mysql_query($QueryFoto) or die(ErroDB(105));
        $Linha_Foto  = mysql_fetch_array($LinhaFoto);
        if ($tabela == 'config'){
            $FotoSocial  = $Linha_Foto['Logotipo'];
        }else{
            $FotoSocial  = $Linha_Foto['Produto'];
        }
        
        if ($Largura == '220' || $Largura == '480' || $Largura == '120' || $Largura == '100' || $Largura == '300') {
            $deletarFoto = isset($_POST['delfoto']) == '1' ? $_POST['delfoto'] : '0';
            if($deletarFoto == '1' ) { @unlink ('fotos/'.$FotoSocial); $FotoSocial = ''; }
            
        }
        
        if ($Largura == '640') {
            $deletarFoto = isset($_POST['delfoto2']) == '1' ? $_POST['delfoto2'] : '0';
            if($deletarFoto == '1' ) { @unlink ('fotos/'.$FotoSocial); $FotoSocial = ''; }
        }
    }
    
    if ($Largura == '480' OR $Largura == '120' OR $Largura == '100' OR $Largura == '220' OR $Largura == '300') {
        $imgfile1ou2 = 'imgfile'; 
    }
    if ($Largura == '640') {
        $imgfile1ou2 = 'imgfile2';
    }

        if ($_FILES[$imgfile1ou2]['name'] != '') {
        if (($_FILES[$imgfile1ou2]['type'] == "image/gif") ||
	    ($_FILES[$imgfile1ou2]['type'] == "image/jpeg") ||
		($_FILES[$imgfile1ou2]['type'] == "image/pjpeg") ||
		($_FILES[$imgfile1ou2]['type'] == "image/png") ||
		($_FILES[$imgfile1ou2]['type'] == "image/x-png")) {
		if ($_FILES[$imgfile1ou2]['size'] > 99999999999999999 ) {
		echo '<script type="text/javascript">';
          echo 'alert(\'Não é possível enviar, as fotos devem ser no máximo até 2 MB!\');';
      echo '</script>';
		} else {
                    if ($SocialDestaque == "SDupload"){
                        $QueryFoto   = 'SELECT * FROM '.$tabela.' WHERE ID="'.$IDTable.'" ';
                        $LinhaFoto   = mysql_query($QueryFoto) or die(ErroDB(105));
                        $Linha_Foto  = mysql_fetch_array($LinhaFoto);
                        if ($tabela == 'config'){
                            $FotoSocial  = $Linha_Foto['Logotipo'];
                        }else{
                            $FotoSocial  = $Linha_Foto['Produto'];
                        }
                        
                        
                            if ($Largura == '480' || $Largura == '300' || $Largura == '800' || $Largura == '100' || $Largura == '120') {
                                @unlink ('fotos/'.$FotoSocial);
                            }
                            if ($Largura == '640') {
                                @unlink ('fotos/'.$FotoDestaque);
                            }
        
                    }
              
        $ext          = substr($_FILES[$imgfile1ou2]['name'], -5);
        $exten        = explode(".",$ext);
        if ($Largura == '480' OR $Largura == '120' OR $Largura == '100' OR $Largura == '220' OR $Largura == '300') {
            $NomeDaImagem = time().".".$exten[1];
        }
        if ($Largura == '640') {
            $NomeDaImagem = "d".time().".".$exten[1];
        }
        
            if (($_FILES[$imgfile1ou2]['type'] == "image/jpeg") || ($_FILES[$imgfile1ou2]['type'] == "image/pjpeg")) {
                $pic = imagecreatefromjpeg($_FILES[$imgfile1ou2]['tmp_name']);
            }
            if ($_FILES[$imgfile1ou2]['type'] == "image/gif") {
                $pic = imagecreatefromgif($_FILES[$imgfile1ou2]['tmp_name']);
            }
            if (($_FILES[$imgfile1ou2]['type'] == "image/png") || ($_FILES[$imgfile1ou2]['type'] == "image/x-png")) {
                $pic = imagecreatefrompng($_FILES[$imgfile1ou2]['tmp_name']);
            }

        
            $diretorio = "fotos/";
        
        
        @ mkdir($diretorio, 0777);

        // pegar a largura da imagem
        $img_largura = imagesx($pic);

        // pegar a altura da imagem
        $img_altura = imagesy($pic);

        // declara os tamanhos

        $x = $Largura;
        
        if ($Largura == '480'){
            if($img_altura == '480' && $img_largura == '480'){
                $y = '480';
            }else{
                $y = $x * $img_altura / $img_largura;
            }
        }
        
        if ($Largura == '300'){
            if($img_altura == '300' && $img_largura == '300'){
                $y = '300';
            }else{
                $y = $x * $img_altura / $img_largura;
            }
        }
        
        if ($Largura == '120'){
            if($img_altura == '120' && $img_largura == '70'){
                $y = '70';
            }else{
                $y = $x * $img_altura / $img_largura;
            }
        }
        
        if ($Largura == '100'){
            if($img_altura == '100' && $img_largura == '100'){
                $y = '100';
            }else{
                $y = $x * $img_altura / $img_largura;
            }
        }
        // Agora sim a gente pode criar a imagem

        // definir o tamanho da nova imagem

        $nova = imagecreatetruecolor($x,$y);

        // agora é só copiar a imagem original para dentro da nova imagem

        imagecopyresampled($nova,$pic,0,0,0,0,$x,$y,$img_largura,$img_altura);

        // salve o arquivo

       
            Imagejpeg($nova,'fotos/'.$NomeDaImagem,'80');
        
        

        // Pronto, fim. Libera a memória usada

		}
                    } else {
                        echo '<script type="text/javascript">';
                        echo 'alert(\'Não foi cadastrada uma imagem: Formato inválido, utilize apenas: JPG, GIF e PNG!\');';
                        echo '</script>';
                    }
                    
        }else {
            if ($SocialDestaque == "SDupload"){
                if ($Largura == '220' || $Largura == '480' || $Largura == '120' || $Largura == '100' || $Largura == '800' || $Largura == '300') {
                    $NomeDaImagem = $FotoSocial;
                }
            }else{
                $NomeDaImagem = '';
            }
        }
        
        return $NomeDaImagem;
    
}

function arquivos(){
    $ext           = substr($_FILES['imgfile']['name'], -5);
    $exten         = explode(".",$ext);
    $NomedoArquivo = time().".".$exten[1];
    $target_path = 'uploads/';
    
    $target_path = $target_path.basename($NomedoArquivo);
	if ($_FILES['imgfile']['size'] > 99999999999999999999) {
            echo '<script type="text/javascript">';
            echo 'alert(\'Não é possível enviar, os arquivos devem ser no máximo até 2MB!\');';
            echo '</script>';
	}else{
            
            if(!move_uploaded_file($_FILES['imgfile']['tmp_name'], $target_path)) {
                echo '<script type="text/javascript">';
                echo 'alert(\'Não foi possível enviar o arquivo, tente novamente!\');';
                echo '</script>';
            }else{
                return $NomedoArquivo;
            }

        }
}

function arquivosimg($SocialDestaque,$tabela,$id_alt,$pasta){
    
    if ($pasta == 'miniatura'){
        $gravarem = 'fotos';
    }else{
        $gravarem = 'uploads';
    }
    
    if ($SocialDestaque == "SDupload"){
        $QueryFoto   = 'SELECT * FROM '.$tabela.' WHERE ID="'.$id_alt.'" ';
        $LinhaFoto   = mysql_query($QueryFoto) or die(ErroDB(105));
        $Linha_Foto  = mysql_fetch_array($LinhaFoto);
        if ($tabela == 'config'){
            $FotoSocial  = $Linha_Foto['Logotipo'];
        }else{
            $FotoSocial  = $Linha_Foto['Produto'];
        }
        
        $deletarFoto = isset($_POST['delfoto']) == '1' ? $_POST['delfoto'] : '0';
        if($deletarFoto == '1' ) { @unlink (''.$gravarem.'/'.$FotoSocial); $FotoSocial = ''; }
        
        $NomedoArquivo = $FotoSocial;
       
    }else{
        $NomedoArquivo = '';
    }
    
    if ($_FILES['imgfile']['name'] != '') {
        if (($_FILES['imgfile']['type'] == "image/gif") ||
            ($_FILES['imgfile']['type'] == "image/jpeg") ||
            ($_FILES['imgfile']['type'] == "image/pjpeg") ||
            ($_FILES['imgfile']['type'] == "image/png") ||
            ($_FILES['imgfile']['type'] == "image/x-png")) {
            
            if ($SocialDestaque == "SDupload"){
                $QueryFoto   = 'SELECT * FROM '.$tabela.' WHERE ID="'.$id_alt.'" ';
                $LinhaFoto   = mysql_query($QueryFoto) or die(ErroDB(105));
                $Linha_Foto  = mysql_fetch_array($LinhaFoto);
                
                if ($tabela == 'config'){
                $FotoSocial  = $Linha_Foto['Logotipo'];
                }else{
                    $FotoSocial  = $Linha_Foto['Produto'];
                }
                
                @unlink (''.$gravarem.'/'.$FotoSocial);
            }
            
            $ext           = substr($_FILES['imgfile']['name'], -5);
            $exten         = explode(".",$ext);
            $NomedoArquivo = time().".".$exten[1];
            $target_path = ''.$gravarem.'/';
            $target_path = $target_path.basename($NomedoArquivo);
            if ($_FILES['imgfile']['size'] > 99999999999999999999) {
                echo '<script type="text/javascript">';
                echo 'alert(\'Não é possível enviar, os arquivos devem ser no máximo até 2MB!\');';
                echo '</script>';
            }else{
                if(!move_uploaded_file($_FILES['imgfile']['tmp_name'], $target_path)) {
                    echo '<script type="text/javascript">';
                    echo 'alert(\'Não foi possível enviar o arquivo, tente novamente!\');';
                    echo '</script>';
                }else{
                    return $NomedoArquivo;
                }
            }
        }
    }
     return $NomedoArquivo;
}




function rteSafe($strText) {
//returns safe code for preloading in the RTE
$tmpString = $strText;
//convert all types of single quotes
$tmpString = str_replace(chr(145), chr(39), $tmpString);
$tmpString = str_replace(chr(146), chr(39), $tmpString);
$tmpString = str_replace('"', '\"', $tmpString);

//convert all types of double quotes
$tmpString = str_replace(chr(147), chr(34), $tmpString);
$tmpString = str_replace(chr(148), chr(34), $tmpString);
//replace carriage returns & line feeds
$tmpString = str_replace(chr(10), " ", $tmpString);
$tmpString = str_replace(chr(13), " ", $tmpString);
return $tmpString;
}

function update($tabela,$Tipo,$valorID) {
    global $ResumoTratado,$ObsTratado,$url_cliente,$nimg,$nimgDestaque,$editor1format,$Titulo_Slug,$Data_Atualizada,$ID_Cidade_C,$URLAmigavel_Cidade_C,$ID_Segmento_C,$URLAmigavel_CSegmento_C,$ID_Tipo_C,$URLAmigavel_CTipo_C;
    
    switch ($tabela){
        
        case 'noticias':
        case 'produtos':
        case 'iniciativa':
            
                $Data_Atualizada  = date("Y-m-d");
                $ResumoTratado    = addslashes($_POST['Resumo']);
                $SEOTratado       = addslashes($_POST['SEO']);
                $TituloTratado    = addslashes(retiraCaracteresResumos($_POST['Titulo']));
                $Titulo_Slug      = sanitize_title_with_dashes($_POST['Titulo']);
                $KeyWordsTratado  = addslashes(retiraCaracteresResumos($_POST['KeyWords']));
                
                if($tabela == 'iniciativa'){
                    $TotalTratado      = addslashes(retiraCaracteresResumos($_POST['Total']));
                    $FaltaTratado      = addslashes(retiraCaracteresResumos($_POST['Falta']));
                    $BotaoTratado      = $_POST['Botao'];
                    $DepositoTratado   = addslashes($_POST['Deposito']);
                    $arrayCampos = 'Deposito = "'.$DepositoTratado.'",Botao = "'.$BotaoTratado.'",Total = "'.$TotalTratado.'",Falta = "'.$FaltaTratado.'",KeyWords = "'.$KeyWordsTratado.'",Produto = "'.$nimg.'",Data = "'.$Data_Atualizada.'", Titulo = "'.$TituloTratado.'",Nome_URL_Amigavel = "'.$Titulo_Slug.'", Resumo = "'.$ResumoTratado.'", SEO = "'.$SEOTratado.'",TextFull = "'.$editor1format.'", Ativo = "'.$_POST["ativo"].'"';
                
                }else{
                
                $arrayCampos = 'KeyWords = "'.$KeyWordsTratado.'",Produto = "'.$nimg.'",Data = "'.$Data_Atualizada.'", Titulo = "'.$TituloTratado.'",Nome_URL_Amigavel = "'.$Titulo_Slug.'", Resumo = "'.$ResumoTratado.'", SEO = "'.$SEOTratado.'",TextFull = "'.$editor1format.'", Ativo = "'.$_POST["ativo"].'"';
                }
        break;
    
    
        case 'depoimentos':
            $Depoimento = addslashes(retiraCaracteresResumos($_POST['Depoimento']));
            $Nome       = addslashes(retiraCaracteresResumos($_POST['Nome']));
            $Cargo      = addslashes(retiraCaracteresResumos($_POST['Cargo']));
            $arrayCampos = 'Produto = "'.$nimg.'",Nome = "'.$Nome.'", Cargo = "'.$Cargo.'", Ativo = "'.$_POST["ativo"].'", Depoimento = "'.$Depoimento.'" ';
        break;
    
      
    
        case 'config':
            $Titulo_Site     = addslashes(retiraCaracteresResumos($_POST['Titulo_Site']));
            $Descricao_Site  = addslashes(retiraCaracteresResumos($_POST['Descricao_Site']));
            $Login           = addslashes(retiraCaracteresResumos($_POST['Login']));
            $EMail           = addslashes(retiraCaracteresResumos($_POST['EMail']));
            $TeleFone1       = addslashes(retiraCaracteresResumos($_POST['Telefone']));
            $KeyWords        = addslashes(retiraCaracteresResumos($_POST['KeyWords']));
            $arrayCampos = 'Telefone = "'.$TeleFone1.'",KeyWords = "'.$KeyWords.'",Logotipo = "'.$nimg.'", Titulo_Site = "'.$Titulo_Site.'", Descricao_Site = "'.$Descricao_Site.'", Login = "'.$Login.'", Senha = "'.md5("D#sj".addslashes($_POST["Senha"])."!*9x").'", URL = "'.addslashes($_POST["URL"]).'", EMail = "'.$EMail.'", Ativo = "'.$_POST['ativo'].'"';
        break;
    
    }
    
    $Update = mysql_query('UPDATE '.$tabela.' SET
    '.$arrayCampos.'
    WHERE ID="'.$valorID.'"') or die(ErroBanco(23));
}

function cadastrar($tabela,$Tipo) {
    global $url_cliente,$nimg,$nimgDestaque,$editor1format,$Titulo_Slug,$NomedoArquivo,$Data_Atualizada,$ID_Cidade_C,$URLAmigavel_Cidade_C,$ID_Segmento_C,$URLAmigavel_CSegmento_C,$ID_Tipo_C,$URLAmigavel_CTipo_C;
    
    switch ($tabela){
        case 'noticias':
        case 'produtos':
        case 'iniciativa':
                $Data_Atualizada  = date("Y-m-d");
                $ResumoTratado    = addslashes($_POST['Resumo']);
                $SEOTratado       = addslashes($_POST['SEO']);
                $TituloTratado    = addslashes(retiraCaracteresResumos($_POST['Titulo']));
                $KeyWordsTratado  = addslashes(retiraCaracteresResumos($_POST['KeyWords']));
                $Titulo_Slug      = sanitize_title_with_dashes($_POST['Titulo']);
                
                if ($tabela == 'iniciativa'){
                    $TotalTratado    = addslashes(retiraCaracteresResumos($_POST['Total']));
                    $FaltaTratado    = addslashes(retiraCaracteresResumos($_POST['Falta']));
                    $BotaoTratado    = $_POST['Botao'];
                    $DepositoTratado = addslashes($_POST['Deposito']);
                    
                    $arrayCampos  = 'Deposito,Botao,Total,Falta,Produto,Data,Titulo,Nome_URL_Amigavel,Resumo,SEO,TextFull,Ativo,KeyWords';
                    $arrayValores = '"'.$DepositoTratado.'","'.$BotaoTratado.'","'.$TotalTratado.'","'.$FaltaTratado.'","'.$nimg.'","'.$Data_Atualizada.'","'.$TituloTratado.'","'.$Titulo_Slug.'","'.$ResumoTratado.'","'.$SEOTratado.'","'.$editor1format.'","'.$_POST["ativo"].'","'.$KeyWordsTratado.'"';
                
                }else{
                    
                $arrayCampos  = 'Produto,Data,Titulo,Nome_URL_Amigavel,Resumo,SEO,TextFull,Ativo,KeyWords';
                $arrayValores = '"'.$nimg.'","'.$Data_Atualizada.'","'.$TituloTratado.'","'.$Titulo_Slug.'","'.$ResumoTratado.'","'.$SEOTratado.'","'.$editor1format.'","'.$_POST["ativo"].'","'.$KeyWordsTratado.'"';
                
                }
                
        break;
    
        case 'profotos':
        case 'proarquivos':
        case 'inifotos':
        case 'iniarquivos':
            $arrayCampos  = 'ID_Produtos,Produto,Legenda';
            $arrayValores = '"'.$ID_Cidade_C.'","'.$NomedoArquivo.'","'.addslashes($_POST["Legenda"]).'"';
        break;
    
        case 'depoimentos':
                $Data_Atualizada  = date("Y-m-d");
                $Descricao        = addslashes($_POST['Depoimento']);
                $Nome             = addslashes(retiraCaracteresResumos($_POST['Nome']));
                $Cargo            = addslashes(retiraCaracteresResumos($_POST['Cargo']));
                $arrayCampos  = 'Produto,Data,Nome,Cargo,Depoimento,Ativo';
                $arrayValores = '"'.$nimg.'","'.$Data_Atualizada.'","'.$Nome.'","'.$Cargo.'","'.$Descricao.'","'.$_POST["ativo"].'"';
            
        break;
        
        case 'uploads':
            $Legenda      = addslashes(retiraCaracteresResumos($_POST['Legenda']));
            $arrayCampos  = 'Legenda,Arquivo,Ativo';
            $arrayValores = '"'.$Legenda.'","'.$NomedoArquivo.'","'.$_POST["ativo"].'"';
        break;
    
    }
    
    $CadastrarCat  = 'INSERT INTO '.$tabela.' 
    ('.$arrayCampos.') VALUES 
    ('.$arrayValores.')';
    $Result_Requisicao = mysql_query($CadastrarCat) or die ('Erro no banco linha 836');
    
}

function geraPesquisaLimpa($s) {
	$i = array("á","à","â","ã","ä","Á","À","Â","Ã","Ä","é","è","ê","ë","É","È","Ê","Ë","í","ì","î","ï","Í","Ì","Î","Ï","ó","ò","ô","õ","ö","Ó","Ò","Ô","Õ","Ö","ú","ù","û","ü","Ú","Ù","Û","Ü","ç","Ç","ñ","Ñ","'","\"");
	$o = array("&aacute;","&agrave;","&acirc;","&atilde;","&auml;","&Aacute;","&Agrave;","&Acirc;","&Atilde;","&Auml;","&eacute;","&egrave;","&ecirc;","&euml;","&Eacute;","&Egrave;","&Ecirc;","&Euml;","&iacute;","&igrave;","&icirc;","&iuml;","&Iacute;","&Igrave;","&Icirc;","&Iuml;","&oacute;","&ograve;","&ocirc;","&otilde;","&ouml;","&Oacute;","&Ograve;","&Ocirc;","&Otilde;","&Ouml;","&uacute;","&ugrave;","&ucirc;","&uuml;","&Uacute;","&Ugrave;","&Ucirc;","&Uuml;","&ccedil;","&Ccedil;","&ntilde;","&Ntilde;","","");
	$s = stripslashes($s);
	$s = str_replace($i,$o,$s);
	return $s;
}

function Sn($Key,$NomeCampo) {
	$MostraSn = '<select name="'.$NomeCampo.'" id="'.$NomeCampo.'">';
		switch ($Key) {
			case 'S':
				$MostraSn .= '<option value="S" selected>Sim</option>';
				$MostraSn .= '<option value="N">NÃ£o</option>';
			break;

			case 'N':
				$MostraSn .= '<option value="S">Sim</option>';
				$MostraSn .= '<option value="N" selected>NÃ£o</option>';
			break;

			case '':
                                $MostraSn .= '<option value="S">Sim</option>';
				$MostraSn .= '<option value="N" selected>NÃ£o</option>';
			break;
		}
	$MostraSn .= '</select>';
	return $MostraSn;
}



/* INICIO DA FUNÇÃO DE APAGAR DIRETORIO E ARQUIVOS */

function apagar($dir){
    if(is_dir($dir)) // verifica se realmente é uma pasta
    {
        if($handle = opendir($dir))
        {
            while(false !== ($file = readdir($handle))) // varre cada um dos arquivos da pasta
            {
                if(($file == ".") or ($file == ".."))
                {
                    continue;
                }
                if(is_dir($file)) // verifica se o arquivo atual é uma pasta
                {
                    // caso seja uma pasta, faz a chamada para a funcao novamente
                    apagar($file);
                } else
                {
                    // caso seja um arquivo, exclui ele

                    unlink($dir."/".$file);
                }
            }
        } else
        {
            print("nao foi possivel abrir o arquivo.");
            return false;
        }

        // fecha a pasta aberta
        closedir($handle);

        // apaga a pasta, que agora esta vazia
        @rmdir($dir);
    } else
    {
        print("diretorio informado invalido");
        return false;
    }
}

/* FINAL DA FUNÇÃO DE APAGAR DIRETORIO E ARQUIVOS */



/*Aqui vem quatro Funções para gerar SLUGS [URL Amigáveis] */

function remove_accents($string) {
        if ( !preg_match('/[\x80-\xff]/', $string) )
                return $string;
 
        if (seems_utf8($string)) {
                $chars = array(
                // Decompositions for Latin-1 Supplement
                chr(195).chr(128) => 'A', chr(195).chr(129) => 'A',
                chr(195).chr(130) => 'A', chr(195).chr(131) => 'A',
                chr(195).chr(132) => 'A', chr(195).chr(133) => 'A',
                chr(195).chr(135) => 'C', chr(195).chr(136) => 'E',
                chr(195).chr(137) => 'E', chr(195).chr(138) => 'E',
                chr(195).chr(139) => 'E', chr(195).chr(140) => 'I',
                chr(195).chr(141) => 'I', chr(195).chr(142) => 'I',
                chr(195).chr(143) => 'I', chr(195).chr(145) => 'N',
                chr(195).chr(146) => 'O', chr(195).chr(147) => 'O',
                chr(195).chr(148) => 'O', chr(195).chr(149) => 'O',
                chr(195).chr(150) => 'O', chr(195).chr(153) => 'U',
                chr(195).chr(154) => 'U', chr(195).chr(155) => 'U',
                chr(195).chr(156) => 'U', chr(195).chr(157) => 'Y',
                chr(195).chr(159) => 's', chr(195).chr(160) => 'a',
                chr(195).chr(161) => 'a', chr(195).chr(162) => 'a',
                chr(195).chr(163) => 'a', chr(195).chr(164) => 'a',
                chr(195).chr(165) => 'a', chr(195).chr(167) => 'c',
                chr(195).chr(168) => 'e', chr(195).chr(169) => 'e',
                chr(195).chr(170) => 'e', chr(195).chr(171) => 'e',
                chr(195).chr(172) => 'i', chr(195).chr(173) => 'i',
                chr(195).chr(174) => 'i', chr(195).chr(175) => 'i',
                chr(195).chr(177) => 'n', chr(195).chr(178) => 'o',
                chr(195).chr(179) => 'o', chr(195).chr(180) => 'o',
                chr(195).chr(181) => 'o', chr(195).chr(182) => 'o',
                chr(195).chr(182) => 'o', chr(195).chr(185) => 'u',
                chr(195).chr(186) => 'u', chr(195).chr(187) => 'u',
                chr(195).chr(188) => 'u', chr(195).chr(189) => 'y',
                chr(195).chr(191) => 'y',
                // Decompositions for Latin Extended-A
                chr(196).chr(128) => 'A', chr(196).chr(129) => 'a',
                chr(196).chr(130) => 'A', chr(196).chr(131) => 'a',
                chr(196).chr(132) => 'A', chr(196).chr(133) => 'a',
                chr(196).chr(134) => 'C', chr(196).chr(135) => 'c',
                chr(196).chr(136) => 'C', chr(196).chr(137) => 'c',
                chr(196).chr(138) => 'C', chr(196).chr(139) => 'c',
                chr(196).chr(140) => 'C', chr(196).chr(141) => 'c',
                chr(196).chr(142) => 'D', chr(196).chr(143) => 'd',
                chr(196).chr(144) => 'D', chr(196).chr(145) => 'd',
                chr(196).chr(146) => 'E', chr(196).chr(147) => 'e',
                chr(196).chr(148) => 'E', chr(196).chr(149) => 'e',
                chr(196).chr(150) => 'E', chr(196).chr(151) => 'e',
                chr(196).chr(152) => 'E', chr(196).chr(153) => 'e',
                chr(196).chr(154) => 'E', chr(196).chr(155) => 'e',
                chr(196).chr(156) => 'G', chr(196).chr(157) => 'g',
                chr(196).chr(158) => 'G', chr(196).chr(159) => 'g',
                chr(196).chr(160) => 'G', chr(196).chr(161) => 'g',
                chr(196).chr(162) => 'G', chr(196).chr(163) => 'g',
                chr(196).chr(164) => 'H', chr(196).chr(165) => 'h',
                chr(196).chr(166) => 'H', chr(196).chr(167) => 'h',
                chr(196).chr(168) => 'I', chr(196).chr(169) => 'i',
                chr(196).chr(170) => 'I', chr(196).chr(171) => 'i',
                chr(196).chr(172) => 'I', chr(196).chr(173) => 'i',
                chr(196).chr(174) => 'I', chr(196).chr(175) => 'i',
                chr(196).chr(176) => 'I', chr(196).chr(177) => 'i',
                chr(196).chr(178) => 'IJ',chr(196).chr(179) => 'ij',
                chr(196).chr(180) => 'J', chr(196).chr(181) => 'j',
                chr(196).chr(182) => 'K', chr(196).chr(183) => 'k',
                chr(196).chr(184) => 'k', chr(196).chr(185) => 'L',
                chr(196).chr(186) => 'l', chr(196).chr(187) => 'L',
                chr(196).chr(188) => 'l', chr(196).chr(189) => 'L',
                chr(196).chr(190) => 'l', chr(196).chr(191) => 'L',
                chr(197).chr(128) => 'l', chr(197).chr(129) => 'L',
                chr(197).chr(130) => 'l', chr(197).chr(131) => 'N',
                chr(197).chr(132) => 'n', chr(197).chr(133) => 'N',
                chr(197).chr(134) => 'n', chr(197).chr(135) => 'N',
                chr(197).chr(136) => 'n', chr(197).chr(137) => 'N',
                chr(197).chr(138) => 'n', chr(197).chr(139) => 'N',
                chr(197).chr(140) => 'O', chr(197).chr(141) => 'o',
                chr(197).chr(142) => 'O', chr(197).chr(143) => 'o',
                chr(197).chr(144) => 'O', chr(197).chr(145) => 'o',
                chr(197).chr(146) => 'OE',chr(197).chr(147) => 'oe',
                chr(197).chr(148) => 'R',chr(197).chr(149) => 'r',
                chr(197).chr(150) => 'R',chr(197).chr(151) => 'r',
                chr(197).chr(152) => 'R',chr(197).chr(153) => 'r',
                chr(197).chr(154) => 'S',chr(197).chr(155) => 's',
                chr(197).chr(156) => 'S',chr(197).chr(157) => 's',
                chr(197).chr(158) => 'S',chr(197).chr(159) => 's',
                chr(197).chr(160) => 'S', chr(197).chr(161) => 's',
                chr(197).chr(162) => 'T', chr(197).chr(163) => 't',
                chr(197).chr(164) => 'T', chr(197).chr(165) => 't',
                chr(197).chr(166) => 'T', chr(197).chr(167) => 't',
                chr(197).chr(168) => 'U', chr(197).chr(169) => 'u',
                chr(197).chr(170) => 'U', chr(197).chr(171) => 'u',
                chr(197).chr(172) => 'U', chr(197).chr(173) => 'u',
                chr(197).chr(174) => 'U', chr(197).chr(175) => 'u',
                chr(197).chr(176) => 'U', chr(197).chr(177) => 'u',
                chr(197).chr(178) => 'U', chr(197).chr(179) => 'u',
                chr(197).chr(180) => 'W', chr(197).chr(181) => 'w',
                chr(197).chr(182) => 'Y', chr(197).chr(183) => 'y',
                chr(197).chr(184) => 'Y', chr(197).chr(185) => 'Z',
                chr(197).chr(186) => 'z', chr(197).chr(187) => 'Z',
                chr(197).chr(188) => 'z', chr(197).chr(189) => 'Z',
                chr(197).chr(190) => 'z', chr(197).chr(191) => 's',
                // Euro Sign
                chr(226).chr(130).chr(172) => 'E',
                // GBP (Pound) Sign
                chr(194).chr(163) => '');
 
                $string = strtr($string, $chars);
        } else {
                // Assume ISO-8859-1 if not UTF-8
                $chars['in'] = chr(128).chr(131).chr(138).chr(142).chr(154).chr(158)
                        .chr(159).chr(162).chr(165).chr(181).chr(192).chr(193).chr(194)
                        .chr(195).chr(196).chr(197).chr(199).chr(200).chr(201).chr(202)
                        .chr(203).chr(204).chr(205).chr(206).chr(207).chr(209).chr(210)
                        .chr(211).chr(212).chr(213).chr(214).chr(216).chr(217).chr(218)
                        .chr(219).chr(220).chr(221).chr(224).chr(225).chr(226).chr(227)
                        .chr(228).chr(229).chr(231).chr(232).chr(233).chr(234).chr(235)
                        .chr(236).chr(237).chr(238).chr(239).chr(241).chr(242).chr(243)
                        .chr(244).chr(245).chr(246).chr(248).chr(249).chr(250).chr(251)
                        .chr(252).chr(253).chr(255);
 
                $chars['out'] = "EfSZszYcYuAAAAAACEEEEIIIINOOOOOOUUUUYaaaaaaceeeeiiiinoooooouuuuyy";
 
                $string = strtr($string, $chars['in'], $chars['out']);
                $double_chars['in'] = array(chr(140), chr(156), chr(198), chr(208), chr(222), chr(223), chr(230), chr(240), chr(254));
                $double_chars['out'] = array('OE', 'oe', 'AE', 'DH', 'TH', 'ss', 'ae', 'dh', 'th');
                $string = str_replace($double_chars['in'], $double_chars['out'], $string);
        }
 
        return $string;
}

function seems_utf8($str) {
        $length = strlen($str);
        for ($i=0; $i < $length; $i++) {
                $c = ord($str[$i]);
                if ($c < 0x80) $n = 0; # 0bbbbbbb
                elseif (($c & 0xE0) == 0xC0) $n=1; # 110bbbbb
                elseif (($c & 0xF0) == 0xE0) $n=2; # 1110bbbb
                elseif (($c & 0xF8) == 0xF0) $n=3; # 11110bbb
                elseif (($c & 0xFC) == 0xF8) $n=4; # 111110bb
                elseif (($c & 0xFE) == 0xFC) $n=5; # 1111110b
                else return false; # Does not match any model
                for ($j=0; $j<$n; $j++) { # n bytes matching 10bbbbbb follow ?
                        if ((++$i == $length) || ((ord($str[$i]) & 0xC0) != 0x80))
                                return false;
                }
        }
        return true;
}

function utf8_uri_encode( $utf8_string, $length = 0 ) {
        $unicode = '';
        $values = array();
        $num_octets = 1;
        $unicode_length = 0;
 
        $string_length = strlen( $utf8_string );
        for ($i = 0; $i < $string_length; $i++ ) {
 
                $value = ord( $utf8_string[ $i ] );
 
                if ( $value < 128 ) {
                        if ( $length && ( $unicode_length >= $length ) )
                                break;
                        $unicode .= chr($value);
                        $unicode_length++;
                } else {
                        if ( count( $values ) == 0 ) $num_octets = ( $value < 224 ) ? 2 : 3;
 
                        $values[] = $value;
 
                        if ( $length && ( $unicode_length + ($num_octets * 3) ) > $length )
                                break;
                        if ( count( $values ) == $num_octets ) {
                                if ($num_octets == 3) {
                                        $unicode .= '%' . dechex($values[0]) . '%' . dechex($values[1]) . '%' . dechex($values[2]);
                                        $unicode_length += 9;
                                } else {
                                        $unicode .= '%' . dechex($values[0]) . '%' . dechex($values[1]);
                                        $unicode_length += 6;
                                }
 
                                $values = array();
                                $num_octets = 1;
                        }
                }
        }
 
        return $unicode;
}

function sanitize_title_with_dashes($title) {
        $title = strip_tags($title);
        // Preserve escaped octets.
        $title = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '---$1---', $title);
        // Remove percent signs that are not part of an octet.
        $title = str_replace('%', '', $title);
        // Restore octets.
        $title = preg_replace('|---([a-fA-F0-9][a-fA-F0-9])---|', '%$1', $title);
 
        $title = remove_accents($title);
        if (seems_utf8($title)) {
                if (function_exists('mb_strtolower')) {
                        $title = mb_strtolower($title, 'UTF-8');
                }
                $title = utf8_uri_encode($title, 200);
        }
 
        $title = strtolower($title);
        $title = preg_replace('/&.+?;/', '', $title); // kill entities
        $title = str_replace('.', '-', $title);
        $title = preg_replace('/[^%a-z0-9 _-]/', '', $title);
        $title = preg_replace('/\s+/', '-', $title);
        $title = preg_replace('|-+|', '-', $title);
        $title = trim($title, '-');
 
        return $title;
}

function encode_email($e)
{
    $email_len = strlen($e);
    for ($i = 0; $i < $email_len; $i++) { $output .= '&#'.ord($e[$i]).';'; }
    return $output;
}
?>
