<?php
session_start();

$id    = isset($_REQUEST['id'])  ? $_REQUEST['id'] : '';
$campanhas    = isset($_REQUEST['campanhas'])  ? $_REQUEST['campanhas'] : '';

$index = 'login.php';
$erro  = '';

function ErroBanco($a) {
   $a = '<span class="alert">Não foi possível realizar a consulta ao banco de dados.<br />'.mysql_error().'<br /> Erro na linha: '.$a.'</span>';
   return $a;
}
require_once('includes/conexao.php');

define("CMS_TKN",1);

$TituloSite    = mysql_query('SELECT Titulo_Site FROM config WHERE ID="1"') or die(ErroBanco(59));
$L_TituloSite  = mysql_fetch_array($TituloSite);
$Title         = $L_TituloSite['Titulo_Site'];

if (isset($_POST['submit'])) {

$usuario = addslashes(trim($_POST['usrlog']));

$senhaCad     = trim($_POST['usrpwd']);
$senhaTratada = md5("D#sj".$senhaCad."!*9x");

$Query_Validando  = 'SELECT * FROM config WHERE Ativo="S" AND Login="'.$usuario.'" AND Senha="'.$senhaTratada.'"';
$Result_Validando = mysql_query($Query_Validando);
$Number_Validando = mysql_num_rows($Result_Validando);

if($Number_Validando == 1){
        $dados  = mysql_fetch_array($Result_Validando);
        $id_dousuario = $dados['ID'];

        $_SESSION['login_usuario']  = $dados['Login'];
        $_SESSION['id_globalusuario']  = $dados['ID'];
        $_SESSION['ativo_usuario']  = $dados['Ativo'];

        $_SESSION['Usuario_Logado']   = "Admin";
        
       

        $Acesso = date("Y-m-d H:i:s");

   
  	      if ( empty($id) && empty($campanhas) ) {

              echo '<meta http-equiv=\'refresh\' content=\'0;URL=index.php\'>';
              $erro = '<p class="erro acerto">Aguarde...</p>';
          
               }else {
                  if( !empty($id) ) {
                   echo '<meta http-equiv=\'refresh\' content=\'0;URL=index.php?id='.$id.'\'>';
                   $erro = '<p class="erro acerto">Aguarde...</p>';
                 } else {
                   echo '<meta http-equiv=\'refresh\' content=\'0;URL=index.php?campanhas='.$campanhas.'\'>';
                   $erro = '<p class="erro acerto">Aguarde...</p>';
                 }
               }

    
}else{
   // usu?rio n?o existe -> mostra mensagem de erro
   $erro = '<p class="erro">Dados incorretos!</p>';
   
}

}

?>

<!DOCTYPE html>
<html class="no-js" lang="pt-br">
<head>
<meta charset="utf-8" />
<title><?php echo $Title; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="author" content="Diogo Ordine" />
<link href="imgs/favicon.png" rel="icon" sizes="64x64">
<link href="estilos/estilos.css" rel="stylesheet" media="screen">
<link href="estilos/responsive.css" rel="stylesheet" media="screen">
<link href="estilos/print.css" rel="stylesheet" media="print">
<script src="js/jquery-1.2.6.min.js"></script>
<script src="js/jquery.maskedinput-1.1.4.pack.js"></script>
<script src="js/modernizr-sitesja.js"></script>
</head>
<body style="background:#CEDADB;">
    <?php echo $erro; ?>
    <div class="loginadmin">
        <h1 title="<?php echo $Title; ?>"><?php echo $Title; ?></h1>
        <hr />
            <form action="login.php" method="post" enctype="application/x-www-form-urlencoded">
                <p><label for="usrlog">Login:</label><br />
                  <input type="hidden" name="id" value="<?php echo $id?>">
                  <input type="hidden" name="campanhas" value="<?php echo $campanhas?>">
                <input required placeholder="Entre com seu Login" class="usrlog" tabindex="1" title="Entre com seu login" type="text" id="usrlog" name="usrlog" value="" /></p>
		<script language="JavaScript" type="text/javascript">if(document.getElementById) document.getElementById('usrlog').focus();</script>
		
                <p><label for="usrpwd">Senha:</label><br />
                <input required placeholder="Entre com sua Senha" tabindex="2" class="senha" title="Entre com sua senha" type="password" id="usrpwd" name="usrpwd" value="" />
    	
		<p class="botao_right"><input tabindex="3" class="botao_login" type="submit" value=" Entrar " name="submit" /></p>
            </form>   
    </div>
    
<script>
$(document).ready(function(){
   $.mask.definitions['a'] = "[^\"^\']";
   $("#usrlog").mask("?aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",{placeholder:"",completed:function(){alert("Limite de caracteres Atingido: "+this.val());}});
   $("#usrpwd").mask("?aaaaaaaaaa",{placeholder:"",completed:function(){alert("Limite de caracteres Atingido. ");}});


});
</script>


</body>
</html>