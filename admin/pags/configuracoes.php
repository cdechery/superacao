<?php
if( !isset($_SESSION["Usuario_Logado"]) || $_SESSION["Usuario_Logado"] != "Admin" ){header("location: login.php");exit;}


if(isset($_POST['submit'])){
    
    $nimg = arquivosimg("SDupload","config","1","miniatura");
    
    update("config","","1");
    
        echo '<script type="text/javascript">';
        echo 'alert(\'Dados registrados com sucesso!\');';
        echo '</script>';
        echo '<script>window.location="'.$_SERVER["PHP_SELF"].'?id='.$id.'";</script>';

        unset($_FILES);
        unset($_POST);
}

?>

<div class="migalhadepao"><h1><i class="icon icon-wrench"></i><span class="antes">Configurações</span></h1></div>
      
        <div class="conteudo">
            
            
            <?php
            $Config         = mysql_query('SELECT * FROM config WHERE ID="1"') or die(ErroBanco(59));
            $Linhas_Config  = mysql_fetch_array($Config);
            $L_Config       = stripslashes($Linhas_Config['Login']);
            $S_Config       = stripslashes($Linhas_Config['Senha']);
            $E_Config       = stripslashes($Linhas_Config['EMail']);
            $Tel_Config     = stripslashes($Linhas_Config['Telefone']);
            $T_Config       = stripslashes($Linhas_Config['Titulo_Site']);
            $KeyWords       = stripslashes($Linhas_Config['KeyWords']);
            $D_Config       = stripslashes($Linhas_Config['Descricao_Site']);
            $URL_Config     = stripslashes($Linhas_Config['URL']);
            $Ativo          = $Linhas_Config['Ativo'];
            $FS_Config      = $Linhas_Config['Logotipo'];
            
            
            echo '<form method="post" action="index.php?id=configuracoes" enctype="multipart/form-data">';
            
                if ($FS_Config != '') {
                    echo '<p><img src="fotos/'.$FS_Config.'" title="Foto Atual" alt="Foto Atual" /><br /><input type="checkbox" name="delfoto" id="delfoto" style="width:15px;" value="1" /> <label for="delfoto">Deletar foto</label> (se for trocar a foto não é necessário marcar esse ítem)</p>';
                    echo '<hr />';
                    echo '<h3 style="margin-bottom:0.2em;">Alterar Logotipo para Redes Sociais.</h3><span class="file-wrapper"><input type="file" title="Procure a foto" name="imgfile" id="imgfile" /><span class="button">Foto 600x314</span></span>';
                    echo '<hr />';
                }else{
                    echo '<h3 style="margin-bottom:0.2em;">Cadastrar Logotipo para Redes Sociais.</h3><span class="file-wrapper"><input type="file" title="Procure a foto" name="imgfile" id="imgfile" /><span class="button">Foto 600x314</span></span>';
                    echo '<input type="hidden" name="delfoto" id="delfoto" value="1" />';
                }
                
            echo '<p><label for="Titulo_Site">Título do Site:</label><br /><input required maxlength="60" type="text" value="'.$T_Config.'" name="Titulo_Site" id="Titulo_Site" /></p>';
            echo '<p><label for="URL">URL:</label><br /><input required type="url" class="urlval" value="'.$URL_Config.'" name="URL" id="URL" /></p>';
            echo '<p><label for="Login">Login:</label><br /><input required type="email" value="'.$L_Config.'" name="Login" id="Login" /></p>';
            echo '<p><label for="Senha">Senha:</label><br /><input required maxlength="10" type="password" value="" name="Senha" id="Senha" /></p>';
            echo '<p><label for="EMail">E-mail:</label><br /><input required type="email" value="'.$E_Config.'" name="EMail" id="EMail" /></p>';
            echo '<p><label for="Telefone">Fone:</label><br /><input required type="text" maxlength="13" value="'.$Tel_Config.'" name="Telefone" id="Telefone" /></p>';
            echo '<p><label for="Descricao_Site">Descrição do Site:</label><br />
            <textarea required id="Descricao_Site" name="Descricao_Site">'.$D_Config.'</textarea><br /><span id="charsLeft"></span> caracteres restantes.<br />Descrição para Redes Sociais e SEO.</p>';
            
            echo '<p><label for="KeyWords">Palavras chaves:</label> (use vírgulas para separar as palavras).<br />
            <input maxlength="90" type="text" value="'.$KeyWords.'" name="KeyWords" id="KeyWords" /><span id="charsLeft3"></span> caracteres restantes.</p>';
            
            
            /* se necess�rio usar liberar o usu�rio basta descomentar, enquanto isso usar um ativo S com type=hydden
            echo '<p><label for="ativo">Liberar:</label><br />';
            echo Sn($Ativo,'ativo');
            echo '</p>';
            */
            echo '<input type="hidden" name="ativo" id="ativo" value="S" />';
            echo '<p class="botao_right"><input class="botao_login" type="submit" value=" Atualizar " name="submit" /></p>';
            
            echo '</form>';
            ?>

        </div>

<script>
$(document).ready(function(){
   $.mask.definitions['a'] = "[^\"^\'^/]";
   $("#Titulo_Site").mask("?aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",{placeholder:"",completed:function(){alert("Limite de caracteres Atingido. ");}});
   $("#URL").mask("http://www.?aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",{placeholder:"",completed:function(){alert("Limite de caracteres Atingido. ");}});
   $("#Login").mask("?aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",{placeholder:"",completed:function(){alert("Limite de caracteres Atingido. ");}});
   $("#Senha").mask("?aaaaaaaaaa",{placeholder:"",completed:function(){alert("Limite de caracteres Atingido ");}});

$('#Descricao_Site').limit('165','#charsLeft');
$('#KeyWords').limit('90','#charsLeft3');
});
</script>