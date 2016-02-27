<?php
if( !isset($_SESSION["Usuario_Logado"]) || $_SESSION["Usuario_Logado"] != "Admin" ){header("location: login.php");exit;}
  
  if(isset($_POST['submit'])){
    $id_alt = isset($_GET['id_alt']) ? $_GET['id_alt'] : '';
    
    $nimg = arquivosimg("SDupload","produtos",$id_alt,"miniatura");
    $editor1format = $_POST["editor1"];
    update("produtos","produtos",$id_alt);
    
    
         
        echo '<script type="text/javascript">';
        echo 'alert(\'Dados registrados com sucesso!\');';
        echo '</script>';
        echo '<script>window.location="'.$_SERVER["PHP_SELF"].'?id='.$acaodepag.'";</script>';
       
    
}
pagEdicao('Projetos e Ações','produtos','Editar');
?>


        <div class="conteudo">
            
            <?php
            $id_alt                = isset($_GET['id_alt']) ? $_GET['id_alt'] : '';
            $EditArt               = mysql_query('SELECT * FROM produtos WHERE ID="'.$id_alt.'"') or die(ErroBanco(59));
            $Linhas_EditArt        = mysql_fetch_array($EditArt);
            $Resumo                = stripslashes($Linhas_EditArt['Resumo']);
            $Titulo                = stripslashes($Linhas_EditArt['Titulo']);
            $KeyWords              = stripslashes($Linhas_EditArt['KeyWords']);
            $SEO                   = stripslashes($Linhas_EditArt['SEO']);
            $Resumo                = stripslashes($Linhas_EditArt['Resumo']);
            $Ativo                 = $Linhas_EditArt['Ativo'];
            $FotoSocial            = $Linhas_EditArt['Produto'];
            $TextFull              = $Linhas_EditArt['TextFull'];
            $PDF                   = $Linhas_EditArt['PDF'];
            
            
            echo '<form method="post" action="index.php?id=edit_produtos&amp;acao='.$acaodepag.'&amp;id_alt='.$id_alt.'" enctype="multipart/form-data">';
            
            echo '<p><label for="Titulo">Título:</label><br /><input required maxlength="165" type="text" value="'.$Titulo.'" name="Titulo" id="Titulo" /></p>';
                                  
            echo '<p><label for="SEO">Resumo de compartilhamento:</label><br />
            <textarea id="SEO" maxlength="165" name="SEO">'.$SEO.'</textarea><br /><span id="charsLeft"></span> caracteres restantes.<br />Resumo usado para exibição em mecanismos de busca e redes sociais.</p>';
            
            echo '<p><label for="Resumo">Descrição do projeto:</label> (use &lt;br /&gt; para pular linha) e (&lt;strong&gt;texto&lt;/strong&gt; para dar negrito num texto).<br />
            <textarea id="Resumo" maxlength="500" name="Resumo">'.$Resumo.'</textarea><span id="charsLeft2"></span> caracteres restantes.<br />Resumo para o site.</p>';
           
            echo '<p><label for="editor1">Texto:</label><br /><textarea class="ckeditor" name="editor1" id="editor1" title="Texto Completo do Evento" >'.$TextFull.'</textarea><br />
                  Base para url de um vídeo do youtube (iframe): http://www.youtube.com/embed/<br />
                  Basta pegar a última parte da url dos vídeos: http://www.youtube.com/watch?v=<strong><em>nytWLoKfdjM</em></strong><br />
                  Ficando assim: http://www.youtube.com/embed/nytWLoKfdjM<br />
                  Não é necessário colocar largura e altura, o sistema faz isso sozinho mantendo o padrão responsive.</p>';
            
            if ($FotoSocial != '') {
                    echo '<hr />';
                    echo '<p><img src="fotos/'.$FotoSocial.'" title="Foto" alt="Foto Atual" /><br /><input type="checkbox" name="delfoto" id="delfoto" style="width:15px;" value="1" /> <label for="delfoto">Deletar foto</label> (se for trocar a foto não é necessário marcar esse ítem)</p>';
                    echo '<p>Foto principal. <span style="color:red">Largura obrigatória: 800px e largura 418px.</span> <br />Essa foto é usada na home e quando é compartilhado o projeto nas redes sociais.</p>';
                    echo '<h3 style="margin-bottom:0.2em;">Alterar foto.</h3><span class="file-wrapper"><input type="file" title="Procure a foto" name="imgfile" id="imgfile" /><span class="button">Foto 800x418</span></span>';
                    echo '<hr />';
                }else{
                    echo '<hr />';
                    echo '<p>Foto principal. <span style="color:red">Largura obrigatória: 800px e largura 418px.</span> <br />Essa foto é usada na home e quando é compartilhado o projeto nas redes sociais.</p>';
                    echo '<h3 style="margin-bottom:0.2em;">Cadastrar foto.</h3><span class="file-wrapper"><input type="file" title="Procure a foto" name="imgfile" id="imgfile" /><span class="button">Foto 800x418</span></span>';
                    echo '<input type="hidden" name="delfoto" id="delfoto" value="1" />';
                    echo '<hr />';
                }
                
            echo '<p><label for="KeyWords">Palavras chaves:</label> (use vírgulas para separar as palavras).<br />
            <input maxlength="90" type="text" value="'.$KeyWords.'" name="KeyWords" id="KeyWords" /><span id="charsLeft3"></span> caracteres restantes.</p>';
            
            echo '<p><label for="ativo">Liberar:</label><br />';
            echo Sn($Ativo,'ativo');
            echo '</p>';
            
            echo '<p class="botao_right"><input class="botao_login" type="submit" value=" Atualizar " name="submit" /></p>';
            
            echo '</form>';
            ?>
        </div>
<script type="text/javascript" src="editor/ckeditor.js" charset="utf-8"></script>
<script>
$('#SEO').limit('165','#charsLeft');
$('#Resumo').limit('500','#charsLeft2');
$('#KeyWords').limit('90','#charsLeft3');
</script>
