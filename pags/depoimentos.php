<section class="interna">
    
        
<?php
echo '<div class="wrapfull"><div class="wrap30"><div class="conteudointerno"><h1>Depoimentos</h1>';

                $NewsHome      = mysql_query('SELECT * FROM depoimentos WHERE Ativo="S" ORDER BY Data DESC, Nome ASC') or die(ErroBanco(130));
                $pareimpar     = '1';
                while ($LNews  = mysql_fetch_array($NewsHome)){
                    $Dep_Nome2 = stripslashes($LNews['Nome']);
                    $Cargo     = stripslashes($LNews['Cargo']);
                    $Dep_Depo2 = stripslashes($LNews['Depoimento']);
                    $FotoDepo  = stripslashes($LNews['Produto']);
                    if ($pareimpar > '0' ){
                        $grid_separacao = '<div class="grid-separacao"></div>';
                        $pareimpar      = '0';
                    }else{
                        $grid_separacao = '';
                        $pareimpar      = '1';
                    }
                    if ($FotoDepo != ''){
                        $exibirFoto = '<span class="fotodepo"><img src="'.$UrlAtual.'admin/fotos/'.$FotoDepo.'" alt="'.$Dep_Nome2.'" title="'.$Dep_Nome2.'" /></span>';
                    }else{
                        $exibirFoto = '';
                    }
                    echo '
                        <div class="grids2 fundobranco">
                            <div class="gridnahome">
                            <div class="alturaminimadepo">
                            <blockquote>
                                <p>'.$Dep_Depo2.'</p>
                                    <div>
                                    '.$exibirFoto.'
                                <span class="depoalign">'.$Dep_Nome2.' <span class="cargo">'.$Cargo.'</span></span>
                                    </div>
                              </blockquote>
                            </div>
                            </div>
                           
                        </div>'.$grid_separacao
                        ;
                    
                }
                
                
                
echo '</div></div></div>';


echo '<div class="wrapfull"><div class="wrap30"><div class="conteudointerno">';
            require_once 'news.php';
            require_once 'atendimento.php';
echo '</div></div></div>';
?>
                
            
        
    
</section>