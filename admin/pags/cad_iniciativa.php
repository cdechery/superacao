<?php
if( !isset($_SESSION["Usuario_Logado"]) || $_SESSION["Usuario_Logado"] != "Admin" ){header("location: login.php");exit;}


if(isset($_POST['submit'])){
    
    //$nimg          = fotosocial("produtos","480","Cad","");
    $nimg = arquivosimg("","","","miniatura");
    $editor1format = $_POST["editor1"];
    cadastrar("iniciativa","iniciativa");
    
    
        echo '<script type="text/javascript">';
        echo 'alert(\'Dados registrados com sucesso!\');';
        echo '</script>';
        echo '<script>window.location="'.$_SERVER["PHP_SELF"].'?id='.$acaodepag.'";</script>';
        
  
}
echo pagCad('Iniciativa','iniciativa');
?>


        
        <div class="conteudo">
            
            <?php            
            
            echo '<form method="post" action="index.php?id=cad_iniciativa&amp;acao=iniciativa" enctype="multipart/form-data">';
            
            echo '<p><label for="Titulo">Título:</label><br /><input required maxlength="165" type="text" value="" name="Titulo" id="Titulo" /></p>';
            echo '<p><label for="Total">Total arrecadado:</label><br /><input type="text" value="" name="Total" id="Total" /></p>';
            echo '<p><label for="Falta">Total a arrecadar:</label><br /><input type="text" value="" name="Falta" id="Falta" /></p>';
            
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
            
             echo '<p><label for="Botao">botão Doação:</label><br />
                Exemplo:<br />
                &lt;h2&gt;Doe a partir de R$ 15,00&lt;/h2&gt;<br />
                &lt;form action="https://pagseguro.uol.com.br/checkout/v2/cart.html?action=add" method="post"&gt;<br />
                &lt;input type="hidden" name="itemCode" value="71869B31F1F13AEEE4517F9C47598704" /&gt;<br />
                &lt;input type="image" src="" name="submit" alt="" /&gt;<br />
                &lt;/form&gt;<br />
                Note que no INPUT:<br />
                <span style="color:red">&lt;input type="image" src="" name="submit" alt="" /&gt;</span><br />
                O SRC e o ALT estão vazios, essa linha deverá sempre ser colada dessa forma para que funcione corretamente a formatação.<br />
            <textarea id="Botao" maxlength="1000" name="Botao"></textarea><br /><span id="charsLeft4"></span> caracteres restantes.<br />Código fonte do botão do pagSeguro.</p>';
            
             echo '<p><label for="Deposito">Conta para Deposito:</label><br />
                 Use <span style="color:red">&lt;br /&gt;</span> para pular linha. Descreva todos os dados necessários para efetuar um deposito.<br />
            <textarea id="Deposito" maxlength="1000" name="Deposito"></textarea><br /><span id="charsLeft5"></span> caracteres restantes.</p>';
            
            
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
$('#Botao').limit('1000','#charsLeft4');
$('#Deposito').limit('1000','#charsLeft5');
</script>