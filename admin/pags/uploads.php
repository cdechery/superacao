<?php
if( !isset($_SESSION["Usuario_Logado"]) || $_SESSION["Usuario_Logado"] != "Admin" ){header("location: login.php");exit;}
echo pagLista('Uploads','uploads');
?>

        
        <div class="conteudo">
            
            
            <?php
            echo '<div class="slideancora" id="voltaaqui"><i class="icon icon-search"></i><a href="#pesquisatopo" class="show_hide">Pesquisar</a><i class="icon icon-chevron-up"></i></div>';
            echo '<div class="slidingDiv" id="aqui">';
            
            echo '<i class="icon icon-search"></i><a href="#voltaaqui" class="show_hide">Pesquisar</a><i class="icon icon-chevron-down"></i> Os campos estão em ordem de preferência, somente um campo é pesquisado por vez!';
            echo '<form style="margin-top:1em;" method="post" action="index.php?id=uploads&amp;pesquisa">';
                            
            echo '<p><label for="Data">Data:</label><br /><input type="text" value="" name="Data" id="Data" /></p>';
            echo '<p><label for="Legenda">Legenda:</label><br /><input maxlength="60" type="text" value="" name="Legenda" id="Legenda" /></p>';
            
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

                listas("uploads","","paginar","","");

                paginacao($PGAtual,$TotalPorPG,"uploads","Data DESC","",$id,"" );
                
            
            }else{
                  listas("uploads","","","",""); 
            }
            
            ?>
            
        </div>

<script>
$(document).ready(function(){
   $.mask.definitions['a'] = "[^\"^\']";
   $("#Legenda").mask("?aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",{placeholder:"",completed:function(){alert("Limite de caracteres Atingido: "+this.val());}});
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