<?php
    
    $id_apagar        = isset($_GET['id_apagar']) ? $_GET['id_apagar'] : '';
    $tabela           = isset($_GET['tabela'])    ? $_GET['tabela'] : '';
    $nomepag          = isset($_GET['acao'])      ? $_GET['acao'] : '';
    $tipo             = isset($_GET['tipo'])      ? $_GET['tipo'] : '';
    
    if ($tabela != '' && $tabela == "produtos" || $tabela != '' && $tabela == "iniciativa" ){
        
            $Query_foto0       = 'SELECT Produto FROM '.$tabela.' WHERE ID="'.$id_apagar.'"';
                $Selecionei0       = mysql_query($Query_foto0) or die(ErroBanco(105));
                while ($Linha_Usuarios0   = mysql_fetch_array($Selecionei0)){
                    $ArquivoSel0       = $Linha_Usuarios0['Produto'];

                    if ($ArquivoSel0 != '') {
                        if (file_exists("fotos/".$ArquivoSel0)) {
                            unlink("fotos/".$ArquivoSel0);
                        }
                    }

                }
            $tabelafotos    ='';
            $tabelaarquivos ='';
            if ($tabela == 'produtos'){
                $tabelafotos = 'profotos';
                $tabelaarquivos = 'proarquivos';
            }
            if ($tabela == 'iniciativa'){
                $tabelafotos    = 'inifotos';
                $tabelaarquivos = 'iniarquivos';
            }
           
            $Query_foto       = 'SELECT Produto FROM '.$tabelafotos.' WHERE ID_Produtos="'.$id_apagar.'"';
            $Selecionei       = mysql_query($Query_foto) or die(ErroBanco(105));
            while ($Linha_Usuarios   = mysql_fetch_array($Selecionei)){
                $ArquivoSel       = $Linha_Usuarios['Produto'];

                if ($ArquivoSel != '') {
                    if (file_exists("fotos/".$ArquivoSel)) {
                        unlink("fotos/".$ArquivoSel);
                    }
                }
                
                $sql_apagar = 'DELETE FROM '.$tabelafotos.' WHERE ID_Produtos="'.$id_apagar.'"';
                $rs_apaga   = mysql_query($sql_apagar) or die(ErroBanco(13));   
            }
            
            $Query_foto4       = 'SELECT Produto FROM '.$tabelaarquivos.' WHERE ID_Produtos="'.$id_apagar.'"';
            $Selecionei4       = mysql_query($Query_foto4) or die(ErroBanco(105));
            while ($Linha_Usuarios4   = mysql_fetch_array($Selecionei4)){
                $ArquivoSel4       = $Linha_Usuarios4['Produto'];

                if ($ArquivoSel4 != '') {
                    if (file_exists("fotos/".$ArquivoSel4)) {
                        unlink("fotos/".$ArquivoSel4);
                    }
                }
                
                $sql_apagar = 'DELETE FROM '.$tabelaarquivos.' WHERE ID_Produtos="'.$id_apagar.'"';
                $rs_apaga   = mysql_query($sql_apagar) or die(ErroBanco(13));   
            }
        
    }
    
    if ($tabela == "noticias" || $tabela == "depoimentos" || $tabela == "novidades" ){
           
            $Query_foto       = 'SELECT Produto FROM '.$tabela.' WHERE ID="'.$id_apagar.'"';
            $Selecionei       = mysql_query($Query_foto) or die(ErroBanco(105));
            while ($Linha_Usuarios   = mysql_fetch_array($Selecionei)){
                $ArquivoSel       = $Linha_Usuarios['Produto'];

                if ($ArquivoSel != '') {
                    if (file_exists("fotos/".$ArquivoSel)) {
                        unlink("fotos/".$ArquivoSel);
                    }
                }
            }
        
    }
    
    if ($tabela != '' && $tabela == "uploads" ){
        $Query_foto       = 'SELECT Arquivo FROM '.$tabela.' WHERE ID="'.$id_apagar.'"';
        $Selecionei       = mysql_query($Query_foto) or die(ErroBanco(105));
        $Linha_Usuarios   = mysql_fetch_array($Selecionei);
        $ArquivoSel       = $Linha_Usuarios['Arquivo'];

        if ($ArquivoSel != '') {
            if (file_exists("uploads/".$ArquivoSel)) {
                unlink("uploads/".$ArquivoSel);
            }
        }
    }
    
    if ($tabela == "profotos" ||  $tabela == "proarquivos" || $tabela == "inifotos" ||  $tabela == "iniarquivos" || $tabela == "novfotos" ||  $tabela == "novarquivos"){
        $Query_foto       = 'SELECT Produto,ID_Produtos FROM '.$tabela.' WHERE ID="'.$id_apagar.'"';
        $Selecionei       = mysql_query($Query_foto) or die(ErroBanco(105));
        $Linha_Usuarios   = mysql_fetch_array($Selecionei);
        $ArquivoSel       = $Linha_Usuarios['Produto'];
        $ID_Produtos_rt   = $Linha_Usuarios['ID_Produtos'];

        if ($ArquivoSel != '') {
            if (file_exists("fotos/".$ArquivoSel)) {
                unlink("fotos/".$ArquivoSel);
            }
        }
    }
    
    $sql_apagar = 'DELETE FROM '.$tabela.' WHERE ID="'.$id_apagar.'"';
    $rs_apaga   = mysql_query($sql_apagar) or die(ErroBanco(13));
    
    if ($tabela != '' && $tabela == "comentarios" && $tipo == 'home'){
        echo '<script>window.location="'.$_SERVER["PHP_SELF"].'";</script>';
    }elseif($tabela != '' && $tabela == "comentarios" && $tipo != 'home'){
        echo '<script>window.location="'.$_SERVER["PHP_SELF"].'?id='.$nomepag.'&subid='.$tipo.'";</script>';
    }elseif($tabela == "profotos" || $tabela == "proarquivos"){
        echo '<script>window.location="'.$_SERVER["PHP_SELF"].'?id='.$nomepag.'&acao=produtos&id_alt='.$ID_Produtos_rt.'";</script>';
    }elseif($tabela == "inifotos" || $tabela == "iniarquivos"){
        echo '<script>window.location="'.$_SERVER["PHP_SELF"].'?id='.$nomepag.'&acao=iniciativa&id_alt='.$ID_Produtos_rt.'";</script>';
    }elseif($tabela == "novfotos" || $tabela == "novarquivos"){
        echo '<script>window.location="'.$_SERVER["PHP_SELF"].'?id='.$nomepag.'&acao=novidades&id_alt='.$ID_Produtos_rt.'";</script>';
    }elseif($tabela != '' && ($tabela == "pintainhasmeses" ) ){
        echo '<script>window.location="'.$_SERVER["PHP_SELF"].'?id=cad_pintainhasmeses&acao=pintainhasanos&id_alt='.$tipo.'";</script>';
    }else{
        echo '<script>window.location="'.$_SERVER["PHP_SELF"].'?id='.$nomepag.'";</script>';
    }
    
    
?>
