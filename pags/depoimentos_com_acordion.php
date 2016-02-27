<section class="interna">
    <div class="wrapfull">
        <div class="wrap30">
            <div class="conteudointerno">
                <h1>Depoimentos</h1>
                
                <?php
                
                $NewsHome      = mysql_query('SELECT * FROM depoimentos WHERE Ativo="S" ORDER BY Data DESC, Nome ASC') or die(ErroBanco(130));
                $pareimpar     = '1';
                while ($LNews  = mysql_fetch_array($NewsHome)){
                    $Dep_Nome2 = stripslashes($LNews['Nome']);
                    $Dep_Depo2 = stripslashes($LNews['Depoimento']);
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
                            <blockquote>
                                <p>'.$Dep_Depo2.'</p>
                                <footer>'.$Dep_Nome2.'</footer>
                              </blockquote>
                            </div>
                           
                        </div>'.$grid_separacao
                        ;
                    
                }
                
                
                ?>
                
                    <?php require_once 'news.php'; ?>
                
                
                
                    <?php require_once 'atendimento.php'; ?>
         
            </div>
        </div>
    </div>
<?php
    echo '<script type="text/javascript" src="'.$UrlAtual.'js/jquery.cbpQTRotator.min.js"></script>';
?>
</section>

<script>
$( function() {
        $( '#cbp-qtrotator' ).cbpQTRotator();
} );
</script>

<script type="text/javascript"> 
    $(function(){ 
        $('#acordionhome').accordion({ 
        autoheight:false 
        }); 
    }); 
    </script> 