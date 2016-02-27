<?php
if( !isset($_SESSION["Usuario_Logado"]) || $_SESSION["Usuario_Logado"] != "Admin" ){header("location: login.php");exit;}
echo pagLista('Iniciativa','iniciativa');
?>

        
        <div class="conteudo">
            
            
            <?php
            echo '<div class="slideancora" id="voltaaqui"><i class="icon icon-search"></i><a href="#pesquisatopo" class="show_hide">Pesquisar</a><i class="icon icon-chevron-up"></i></div>';
            echo '<div class="slidingDiv" id="aqui">';
            
            echo '<i class="icon icon-search"></i><a href="#voltaaqui" class="show_hide">Pesquisar</a><i class="icon icon-chevron-down"></i> Os campos estão em ordem de preferência, somente um campo é pesquisado por vez!';
            echo '<form style="margin-top:1em;" method="post" action="index.php?id=produtos&amp;pesquisa">';
                            
            echo '<p><label for="Data">Data:</label><br /><input type="text" value="" name="Data" id="Data" /></p>';
            echo '<p><label for="Titulo">Título:</label><br /><input type="text" value="" name="Titulo" id="Titulo" /></p>';
            
            echo '<p class="botao_right"><input class="botao_login" type="submit" value=" Pesquisar " name="pesquisar" /></p>';
            
            echo '</form>';
            echo '<hr />';
            echo '</div>';
            
            
                  
            if (!isset($_GET['pesquisa'])) {
                if(!empty($_GET['paginacao'])) {
                    $pagina  = $_GET['paginacao']; //variavel pagina!
                    $PGAtual = $pagina;
                }else{
                    $pagina  = '1';
                    $PGAtual = $pagina;
                }

                $TotalPorPG = '20';

                $pagina_teste = $PGAtual*$TotalPorPG;
                
                if($pagina_teste == $TotalPorPG) {
                    $pagina_teste = '0';
                }else{
                    $pagina_teste = $pagina_teste-$TotalPorPG;
                }

                listas("iniciativa","","paginar","","iniciativa");

                paginacao($PGAtual,$TotalPorPG,"iniciativa","Data DESC","",$id,"iniciativa" );
                
            
            }else{
                  listas("iniciativa","","","","iniciativa"); 
            }
            
            ?>
            
        </div>

<script>
$(document).ready(function(){
   $("#Data").mask("99/99/9999");
});

$(document).ready(function(){
 
        $(".slidingDiv").hide();
        $(".show_hide").show();
        
 
    $('.show_hide').click(function(){
    $(".slidingDiv").slideToggle();
    $(".slideancora").slideToggle();
    });
 
});
</script>