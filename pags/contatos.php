<section class="interna" >
    <div class="wrapfull ">
        <div class="wrap30">
            <div class="conteudointerno pagContatos">
                <h1 class="tit">ENTRE <span class="font-black">EM CONTATO</span></h1>
                <?php
                
                
                if(isset($_POST['enivarContato'])){
                if ($_POST["antispan"] == $_POST["numero"]  ){
                    
                    
                    $nome      = trim(retiraCaracteres($_POST['Nome']));
                    $email     = trim(retiraCaracteres($_POST['EMail']));
                    $tel       = trim(retiraCaracteres($_POST['Telefone']));
                    $Empresa   = trim(retiraCaracteres($_POST['Empresa']));
                    $msn       = trim(retiraCaracteres($_POST['Texto']));
                    
                    if ($nome != '' && $email != '' && $msn != '' ){

                    $enviarpara = $EMail_Config;
                    $assunto    = $Empresa;
                    $msgenvio  = "Contato Instituto SuperAÇÃO.\n\n";
                    $msgenvio .= 'Nome: '.$nome.'';
                    $msgenvio .= "\n";
                    $msgenvio .= 'E-mail: '.$email.'';
                    $msgenvio .= "\n\n";
                    $msgenvio .= 'Tel: '.$tel.'';
                    $msgenvio .= "\n\n";
                    $msgenvio .= 'Mensagem: ';
                    $msgenvio .= "\n";
                    $msgenvio .= ''.$msn.'';
                    $msgenvio .= "\n\n";
                    
                    $msgenvioutf = utf8_encode(trim($msgenvio));
                    $msgenvioutf = trim($msgenvio);

                    mail ("$enviarpara","$Empresa","$msgenvioutf","From: $email");

                    echo "<script type=\"text/javascript\">";
                    echo "alert(\"Obrigado!! Sua mensagem foi enviada com sucesso.\");";
                    echo "</script>";
                    echo '<script>window.location="'.$UrlAtual.$pagina.'/";</script>';
                    
                    }else{
                        echo "<script type=\"text/javascript\">";
                        echo "alert(\"Os campos Nome, E-mail e Mensagem são de preenchimeno obrigatório!\");";
                        echo "</script>";
                        echo '<script>window.location="'.$UrlAtual.$pagina.'/";</script>';
                    }
                }else{
                    echo "<script type=\"text/javascript\">";
                    echo "alert(\"Sua mensagem não foi enviada! Números não conferem!\");";
                    echo "</script>";
                    echo '<script>window.location="'.$UrlAtual.$pagina.'/";</script>';
                    }
                }
                
                $antispan = mt_rand();
                $seisnumeros = substr($antispan, 0, 6);
                $tresnumeros = substr($seisnumeros, 0, 3);
                $tresnumerosb = substr($seisnumeros, 3, 6);
                

        
                
               
         
                    echo '
                        <div class="formulario fundobranco">
                            <div class="gridnahome">
                               
                                <div class="formcontatos">
                                <form method="post" action="'.$UrlAtual.'contatos/" onsubmit="return validate_form(this);">
                                    <fieldset class="primeiroField"><label>NOME<input class="N1margin" type="text" autofocus name="Nome" id="Nome" value="" required title="Nome" /></label>
                                    <label>EMAIL<input  type="email" name="EMail" id="EMail" value="" required title="E-mail" /></label></fieldset>

                                    <fieldset><label>TELEFONE<input class="N1margin"  type="tel" name="Telefone" id="Telefone" value="" title="Telefone" /></label>
                                    <label>ASSUNTO<input class="N1margin"  type="text" name="Empresa" id="Empresa" value="" title="Empresa" /></label></fieldset>
                                    
                                    <fieldset class="inteiro"><label>MENSAGEM<textarea id="Texto" name="Texto" required maxlength="800" title="Mensagem"></textarea></label></fieldset>
                                    <fieldset class="primeiroField">
                                            <label for="antispan">DIGITE: <strong><span class="antspan3inicio">'.$tresnumeros.'</span><span class="antspan3final">'.$tresnumerosb.'</span></strong>
                                            <input name="numero" id="numero" type="hidden" value="'.$seisnumeros.'" />
                                            <input class="antspan" type="text" maxlength="6" name="antispan" id="antispan" value="" required /></label></fieldset>
                                            <fieldset class="enviar"><label><input class="botaocontato" type="submit" name="enivarContato" value="Enviar" /></label></fieldset>
                                </form>
                                </div>
                            </div>
                           
                        </div><div class="finaliza"></div>'
                            
                        ;
                ?>
                
            </div>
        </div>
    </div>
    <!--
    <div class="wrapfull fundoVerdePreto">
        <div class="wrap30">
            <h2 class="tit">ABRANGÊNCIA <span class="font-black">DE ATUAÇÃO</span></h2>
            <img src="<?php echo $UrlAtual.'imgs/mapa.jpg'; ?>" alt="�rea de Atuação" />
        </div>
    </div>
--><br /><br />
</section>

<script>
$(document).ready(function(){
   $("#antispan").mask("999999");
   $("#Telefone").mask("?(99) 999999999");
});


function validate_required(field,alerttxt) {
  with (field) {
    if (value==null||value=="")
      {alert(alerttxt);return false;}
    else {return true}
  }
}

function validate_required2(field,alerttxt) {
  with (field) {
    if (value!="<?php echo $seisnumeros; ?>")
      {alert(alerttxt);return false;}
    else {return true}
  }
}

function validate_form(thisform) {
  with (thisform) {

     if (validate_required(antispan,"Obrigatóriio digitar os números corretamente!")==false)
     {antispan.focus();return false;}

     if (validate_required2(antispan,"Obrigatóriio digitar os números corretamente!")==false)
     {antispan.focus();return false;}


  }
}
</script>