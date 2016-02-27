<?php
if( !isset($_SESSION["Usuario_Logado"]) || $_SESSION["Usuario_Logado"] != "Admin" ){header("location: login.php");exit;}


if(isset($_POST['submit'])){
    
    $NomedoArquivo = arquivos();
    cadastrar("uploads","");
    
    
        echo '<script type="text/javascript">';
        echo 'alert(\'Dados registrados com sucesso!\');';
        echo '</script>';
        echo '<script>window.location="'.$_SERVER["PHP_SELF"].'?id='.$acaodepag.'";</script>';
        
  
}
echo pagCad('Uploads','uploads');
?>


        
        <div class="conteudo">
            
            <?php            
            
            echo '<form method="post" action="index.php?id=cad_uploads&amp;acao=uploads" enctype="multipart/form-data">';
            
            echo '<p style="margin-bottom:0.2em;">Fotos não serão redimensioandas. Os arquivos devem ter no máximo 2MB.</p><span class="file-wrapper"><input type="file" required title="Procure o Arquivo" name="imgfile" id="imgfile" /><span class="button">Inserir Arquivo</span></span>';
            
            echo '<p><label for="Legenda">Legenda:</label><br /><input maxlength="150" type="text" value="" name="Legenda" id="Legenda" /></p>';
            
            
            echo '<p><label for="ativo">Liberar:</label><br />';
            echo Sn('S','ativo');
            echo '</p>';
            
            echo '<p class="botao_right"><input class="botao_login" type="submit" value=" Cadastrar " name="submit" /></p>';
            
            echo '</form>';
            ?>
            
        </div>