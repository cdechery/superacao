<section class="interna">
    <div class="wrapfull">
        <div class="wrap30">
            <div class="conteudointerno">
                
                <?php
                echo '<div class="formcontatos">';
                echo '<h1 class="h1suporte">Suporte</h1>';
                echo '<h1 class="h1suporte2"><ico class="icotel"></ico><span class="atendimentoform" style="font-size:0.7em;">Atendimento: <span class="telsuporte">'.encode_email('(35) 3473 - 0225').'</span></span></h1>';
                echo '<div class="finaliza"></div>';
                echo '</div>';
                
                
                if(isset($_POST['enivarContato'])){
                if ($_POST["antispan"] == $_POST["numero"]  ){
                    
                    
                    $nome      = trim(retiraCaracteres($_POST['Nome']));
                    $email     = trim(retiraCaracteres($_POST['EMail']));
                    $Combo     = trim(retiraCaracteres($_POST['Combo']));
                    $msn       = trim(retiraCaracteres($_POST['Texto']));
                    
                    if ($nome != '' && $email != '' && $msn != '' ){
                        
                        if ($Combo == 'Suporte'){
                            $EMail_Config = 'suporte@fitnetworks.com.br';
                        }elseif($Combo == 'Vendas'){
                            $EMail_Config = 'comercial@fitnetworks.com.br';
                        }else{
                            $EMail_Config = 'adm@fitnetworks.com.br';
                        }

                    $enviarpara = $EMail_Config;
                    $assunto    = 'Suporte via site FIT Networks';
                    $msgenvio  = "Suporte FIT Networks.\n\n";
                    $msgenvio .= 'Nome: '.$nome.'';
                    $msgenvio .= "\n";
                    $msgenvio .= 'E-mail: '.$email.'';
                    $msgenvio .= "\n\n";
                    $msgenvio .= 'Departamento: '.$Combo.'';
                    $msgenvio .= "\n\n";
                    $msgenvio .= 'Mensagem: ';
                    $msgenvio .= "\n";
                    $msgenvio .= ''.$msn.'';
                    $msgenvio .= "\n\n";
                    
                    $msgenvioutf = utf8_encode(trim($msgenvio));

                    mail ("$enviarpara","$assunto","$msgenvioutf","From: $email");

                    echo "<script type=\"text/javascript\">";
                    echo "alert(\"Obrigado!! Sua mensagem foi enviada com sucesso.\");";
                    echo "</script>";
                    echo '<script>window.location="'.$UrlAtual.$pagina.'/";</script>';
                    
                    }else{
                        echo "<script type=\"text/javascript\">";
                        echo "alert(\"Os campos marcos com * são de preenchimeno obrigatório!\");";
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
                <div class="grids2 backazul" style="min-height:602px;">
                    <div class="gridnahome ">';
                        echo '<div class="formcontatos">';
                        
                        
                        $NewsHome2      = mysql_query('SELECT * FROM produtos WHERE Ativo="S"') or die(ErroBanco(130));
                        $count_Prod     = mysql_num_rows($NewsHome2);
                        if ($count_Prod != ''){
                            echo '<script src="'.$UrlAtual.'js/jquery.accordion.js"></script>';
                            echo '
                            <div id="acordionhome">
                            <div id="linkacordion">';
                            
                            while($LNews2  = mysql_fetch_array($NewsHome2)){
                                $Prod_Titulo2   = stripslashes($LNews2['Titulo']);
                                $Prod_ID2       = $LNews2['ID'];
                                $Prod_URL       = $LNews2['Nome_URL_Amigavel'];
                                echo '<a href="#" class="menuacordion">'.$Prod_Titulo2.'</a>';
                                echo '<div>';
                       

                                $FotoDestaque7  = mysql_query('SELECT * FROM proarquivos WHERE ID_Produtos="'.$Prod_ID2.'"') or die(ErroBanco(130));
                                $count_Dest7    = mysql_num_rows($FotoDestaque7);
                                if ($count_Dest7 != ''){
                                
                                    while ($LFotoDestaque7 = mysql_fetch_array($FotoDestaque7)){
                                        $FotoDestcada7  = $LFotoDestaque7['Produto'];
                                        $LegFoto7       = $LFotoDestaque7['Legenda'];
                                    
                                        if ($LegFoto7 == 'Manual' || $LegFoto7 == 'FAQ' || $LegFoto7 == 'Detalhamento técnico'){
                                            $icoArquivo = '<img style="vertical-align:middle;" src="'.$UrlAtual.'imgs/icone_pdf.png" /> ';
                                        }else{
                                            $icoArquivo = '<img style="vertical-align:middle;" src="'.$UrlAtual.'imgs/icone_software.png" /> ';
                                        }
                                        
                                        echo '<br />'.$icoArquivo.'<a class="arquivosdownload"  href="'.$UrlAtual.'admin/uploads/'.$FotoDestcada7.'" title="'.$LegFoto7.'" target="_blank">'.$LegFoto7.'</a>';
                                    
                                    }
                                    
                                
                            }
                                echo '<br /><br /><a class="arquivosdownload"  href="'.$UrlAtual.'produtos/'.$Prod_URL.'" title="'.$Prod_Titulo2.'">- Ver o produto</a>';
                                echo '</div>';
                                echo '<hr />';
                            }
                            echo '</div></div>';   
                        }   
                          
                        
                        
                       
                        echo '</div>';
                        
                        
                        
                echo '</div>';
                
                
                
                
                echo '</div><div class="grid-separacao"></div>';
         
                    echo '
                        <div class="grids2 fundobranco margintopacordion" style="min-height:602px;">
                            <div class="gridnahome">
                                <h3>Mande-nos sua dúvida</h3>
                                <div class="formcontatos">
                                <form method="post" action="'.$UrlAtual.'suporte/" onsubmit="return validate_form(this);"></p>
                                    <p><label>Nome: <span class="asterisco">*</span><input class="N1margin" type="text" autofocus name="Nome" id="Nome" value="" required title="Nome" /></label></p>
                                    <p><label>E-mail: <span class="asterisco">*</span><input  type="email" name="EMail" id="EMail" value="" required title="E-mail" /></label></p>
                                    
                                    <p><label for="Combo">Departamento:</label><select required id="Combo" name="Combo">';
                                    echo '<option value="Suporte"> Suporte </option>';
                                    echo '<option value="Vendas"> Vendas </option>';
                                    echo '<option value="Outros"> Outros </option>';
                                    echo '</select></p>
                                    
                                    <p><label>Mensagem: <span class="asterisco">*</span><textarea id="Texto" name="Texto" required maxlength="800" title="Mensagem"></textarea></label></p>
                                    <p class="numerosdoinput">
                                            <label for="antispan">Digite: <strong><span class="antspan3inicio">'.$tresnumeros.'</span><span class="antspan3final">'.$tresnumerosb.'</span></strong></label>
                                            <input  name="numero" id="numero" type="hidden" value="'.$seisnumeros.'" />
                                            <input class="antspan" type="text" maxlength="6" name="antispan" id="antispan" value="" required /></p>
                                    <p><input class="botaocontato" type="submit" name="enivarContato" value="Enviar" /></p>
                                </form>
                                </div>
                            </div>
                           
                        </div>'
                        ;
                    
                  require_once 'atendimento.php';
                ?>
                
            </div>
        </div>
    </div>
</section>

<script>
$(document).ready(function(){
   $("#antispan").mask("999999");
   $("#Telefone").mask("(99) 9999 - 9999");
});

$(function(){ 
        $('#acordionhome').accordion({ 
        autoheight:false,
        
        header: "a.menuacordion"
        }); 
        
        //capture the click on the a tag
   $("#acordionhome a.menuacordion a.arquivosdownload").click(function() {
      window.location = $(this).attr('href');
      return false;
   });
   
   
    });
</script>