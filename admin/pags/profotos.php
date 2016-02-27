<?php  
if( !isset($_SESSION["Usuario_Logado"]) || $_SESSION["Usuario_Logado"] != "Admin" ){header("location: login.php");exit;}

  if(isset($_POST['submit'])){
    $ID_Cidade_C = isset($_GET['id_alt']) ? $_GET['id_alt'] : '';
     $NomedoArquivo = arquivosimg("","profotos","","miniatura");
     cadastrar("profotos","");
    
        echo '<script type="text/javascript">';
        echo 'alert(\'Dados registrados com sucesso!\');';
        echo '</script>';
        echo '<script>window.location="'.$_SERVER["PHP_SELF"].'?id=profotos&acao=produtos&id_alt='.$ID_Cidade_C.'";</script>';
        unset($_FILES);
        unset($_POST);
    
}
pagEdicao('Projetos e Ações','produtos','Cadastrar fotos de projetos');
?>


       
        <div class="conteudo">
            
            <?php            
            $pegaID = isset($_GET['id_alt']) && $_GET['id_alt'] != '' ? $_GET['id_alt'] : '';
            
            echo '<form method="post" action="index.php?id=profotos&amp;acao=produtos&amp;id_alt='.$pegaID.'" enctype="multipart/form-data">';
            
            /*echo '<p>Após cadastrar uma ou mais imagens defina qual será a imagem de destaque a ser compartilhada nas redes sociais!</p>';*/
            echo '<hr /><p style="margin-bottom:0.2em;">Selecione a foto. Tamanho sugerido: 800 x 418px. <span style="color:red">Essa imagem não terá redimensionamento!</span></p><span class="file-wrapper"><input required type="file" title="Procure a foto" name="imgfile" id="imgfile" /><span class="button">Selecione a Foto aqui!</span></span>';
            echo '<input type="hidden" name="delfoto" id="delfoto" value="1" /><hr />';   
            
            echo '<p><label for="Legenda">Legenda:</label><br /><input required maxlength="165" type="text" value="" name="Legenda" id="Legenda" /></p>';
            
            echo '<p class="botao_right"><input class="botao_login" type="submit" value=" Cadastrar " name="submit" /></p>';
            
            echo '</form>';
            echo '<hr />';
                  listas("profotos","","",$pegaID,"profotos");
            ?>
            
        </div>
