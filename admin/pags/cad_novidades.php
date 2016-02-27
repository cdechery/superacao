<?php
if( !isset($_SESSION["Usuario_Logado"]) || $_SESSION["Usuario_Logado"] != "Admin" ){header("location: login.php");exit;}


if(isset($_POST['submit'])){
    
    //$nimg          = fotosocial("produtos","480","Cad","");
    $nimg = arquivosimg("","","","miniatura");
    $editor1format = $_POST["editor1"];
    cadastrar("novidades","novidades");
    
    
        echo '<script type="text/javascript">';
        echo 'alert(\'Dados registrados com sucesso!\');';
        echo '</script>';
        echo '<script>window.location="'.$_SERVER["PHP_SELF"].'?id='.$acaodepag.'";</script>';
        
  
}
echo pagCad('Novidades','novidades');
?>


        
        <div class="conteudo">
            
            <?php            
            
            echo '<form method="post" action="index.php?id=cad_novidades&amp;acao=novidades" enctype="multipart/form-data">';
            
            echo '<p><label for="Titulo">Título:</label><br /><input required maxlength="165" type="text" value="" name="Titulo" id="Titulo" /></p>';
            echo '<p><label for="SEO">Resumo de compartilhamento:</label><br />
            <textarea id="SEO" maxlength="165" name="SEO"></textarea><br /><span id="charsLeft"></span> caracteres restantes.<br />Resumo usado para exibição em mecanismos de busca e redes sociais.</p>';
            
            echo '<p><label for="Resumo">Descrição do projeto:</label> (use &lt;br /&gt; para pular linha) e (&lt;strong&gt;texto&lt;/strong&gt; para dar negrito num texto).<br />
            <textarea id="Resumo" maxlength="500" name="Resumo"></textarea><span id="charsLeft2"></span> caracteres restantes.<br />Resumo para o site.</p>';
            
           
            
            echo '<p><label for="editor1">Texto:</label><br /><textarea class="ckeditor" name="editor1" id="editor1" title="Texto Completo" ></textarea><br />
                  Base para url de um vídeo do youtube (iframe): http://www.youtube.com/embed/<br />
                  Basta pegar a última parte da url dos vídeos: http://www.youtube.com/watch?v=<strong><em>nytWLoKfdjM</em></strong><br />
                  Ficando assim: http://www.youtube.com/embed/nytWLoKfdjM<br />
                  Não é necessário colocar largura e altura, o sistema faz isso sozinho mantendo o padrão responsive.</p>';
            
            echo '<hr /><p style="margin-bottom:0.2em;">Foto principal. <span style="color:red">Largura obrigatória: 800px e largura 418px.</span> <br />Essa foto é usada na home e quando é compartilhado o projeto nas redes sociais.</p><span class="file-wrapper"><input type="file" title="Procure a foto" name="imgfile" id="imgfile" /><span class="button">Foto 800x418</span></span>';
            echo '<input type="hidden" name="delfoto" id="delfoto" value="1" /><hr />';
            
            echo '<p><label for="KeyWords">Palavras chaves:</label> (use vírgulas para separar as palavras).<br />
            <input maxlength="90" type="text" value="" name="KeyWords" id="KeyWords" /><span id="charsLeft3"></span> caracteres restantes.</p>';
            
            echo '<p><label for="ativo">Liberar:</label><br />';
            echo Sn('S','ativo');
            echo '</p>';
            
            echo '<p class="botao_right"><input class="botao_login" type="submit" value=" Cadastrar " name="submit" /></p>';
            
            echo '</form>';
            ?>
            
        </div>

<script type="text/javascript" src="editor/ckeditor.js" charset="utf-8"></script>        
<script>
$('#SEO').limit('165','#charsLeft');
$('#Resumo').limit('500','#charsLeft2');
$('#KeyWords').limit('90','#charsLeft3');
</script>