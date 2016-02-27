<script type="text/javascript">
$(document).ready(function(){
	function getCssAtributes(arrCoords){ // x1,y1,x2,y2
		var left = arrCoords[0]+"px";
		var top = arrCoords[1]+"px";
		var width = (arrCoords[2] - arrCoords[0])+"px";
		var height = (arrCoords[3] - arrCoords[1])+"px";
		return ({ "left" : left, "top" : top, "width" : width, "height" : height, display: "block" });
	}
	$("area").mouseover(function(){
		$("map div").hide();
		var arrCoords = $(this).attr("coords").split(",");
		var cssAtributes = getCssAtributes(arrCoords);
		var id = $(this).attr("id");
		$("div#"+id).css(cssAtributes).mouseleave(function(){
			$(this).hide();
		});
	});
	
});
</script>



<section class="interna">
    <div id="dropbox" style="display:none">
        <div class="boxarea">
                <img src="{src-img}" width="200">
        </div>
    </div>
    
    <div class="wrapfull">
        <div class="wrap30">
            <div class="conteudointerno">
                <h1>Aplicações</h1>
            </div>
        </div>
    </div>  
 
    <div class="wrapfull">
        <div class="wrap30">
            <div class="imagemaplicacoes">
                <div class="aplicacoesMap">
                    <img src="<?php echo $UrlAtual.'imgs/aplicacoes.png' ?>"  border="0" usemap="#Map" alt="" />
                    <map name="Map" id="Map">
                        <area id="area1" shape="rect" coords="185,197,327,323" title="OLT FNL 5000" href="<?php echo $UrlAtual.'produtos/olt-fnl-5000/'; ?>" />
                            <div id="area1" class="boxarea">
                                <a href="<?php echo $UrlAtual.'produtos/olt-fnl-5000/';?>">
                                   
                                <table class="tabelaAplicacoes" style="">
                                    <tr>
                                        <td>
                                                <img src="<?php echo $UrlAtual.'admin/fotos/1399467246.png'; ?>" />
                                        </td>
                                        <td align="left">
                                        <h4>Comporta até 16 portas PON, todas com gerenciamento SNMP por software gráfico.</h4><br/>
                                            <ul style="padding-left:10px">
                                                <li>Comprimento de onda: Rx 1490nm/ Tx 1310nm</li>
                                                <li>Potência óptica: -1dBm ~ 4dbm</li>
                                                <li>Sensibilidade de recepção: Min: -25dBm</li>
                                                <li>Capacidade: 2 PON, 128 ONU’s</li>
                                                <li>Capacidade do Rack: Suporte para mais 7 módulos</li>
                                                <li>...</li>
                                                <u>Clique e veja mais detalhes.</u>
                                            </ul>
                                        </td>
                                    </tr>
                                </table>
                                </a>
                            </div>
                        <area id="area2" shape="rect" coords="37,337,166,442" title="PAC SWITCH POE" href="<?php echo $UrlAtual.'produtos/pacpon-onu-poe-e-pac-switch-poe/' ?>" />
                            <div id="area2" class="boxarea">
                                <a href="<?php echo $UrlAtual.'produtos/pacpon-onu-poe-e-pac-switch-poe/';?>">
                                <table class="tabelaAplicacoes">
                                    <tr>
                                        <td>
                                                <img src="<?php echo $UrlAtual.'admin/fotos/pacswitch_aplicacoes.png'; ?>" />
                                        </td>
                                        <td align="left">
                                        <h4>PACSWITCH POE</h4><br/>
                                            <ul style="padding-left:10px">
                                                    <li>Suporte a VLAN: Sim</li>
                                                    <li>Proteção contra surtos: Sim</li>
                                                    <li>Gerenciamento: Navegador Windows Explorer ou Mozilla</li>
                                                    <li>Alimentação: POE reverso 48V com controle de energia em todas as portas</li>
                                                    <li>Controle de MAC: Sim</li>
                                                    <li>...</li>
                                                    <u>Clique e veja mais detalhes.</u>
                                            </ul>
                                        </td>
                                    </tr>
                                </table>
                                </a>
                            </div>
                        <area id="area3" shape="rect" coords="215,412,267,462" title="PACPON ONU POE" href="<?php echo $UrlAtual.'produtos/pacpon-onu-poe-e-pac-switch-poe/' ?>" />
                            <div id="area3" class="boxarea">
                                <a href="<?php echo $UrlAtual.'produtos/pacpon-onu-poe-e-pac-switch-poe/';?>">
                                <table class="tabelaAplicacoes">
                                    <tr>
                                        <td>
                                                <img src="<?php echo $UrlAtual.'admin/fotos/1399467157.png'; ?>" />
                                        </td>
                                        <td align="left">
                                        <h4>PACPON ONU POE</h4><br/>
                                            <ul style="padding-left:10px">
                                                    <li>Comprimento de onda: Rx 1490nm/ Tx 1310nm</li>
                                                    <li>Potência óptica: -1dBm ~ 4dbm</li>
                                                    <li>Sensibilidade de recepção: Min: -25dBm</li>
                                                    <li>Máxima distância de recepção: 20Km</li>
                                                    <li>Tabela de MAC: 64 Bits</li>
                                                    <li>...</li>
                                                    <u>Clique e veja mais detalhes.</u>
                                            </ul>
                                        </td>
                                    </tr>
                                </table>
                                </a>
                            </div>
                        <area id="area4" shape="rect" coords="233,538,390,670" title="PACPON ONU POE" href="<?php echo $UrlAtual.'produtos/pacpon-onu-poe-e-pac-switch-poe/' ?>" />
                            <div id="area4" class="boxarea">
                                <a href="<?php echo $UrlAtual.'produtos/pacpon-onu-poe-e-pac-switch-poe/';?>">
                                <table class="tabelaAplicacoes">
                                    <tr>
                                        <td>
                                                <img src="<?php echo $UrlAtual.'admin/fotos/1399467157.png'; ?>" />
                                        </td>
                                        <td align="left">
                                        <h4>PACPON ONU POE</h4><br/>
                                            <ul style="padding-left:10px">
                                                    <li>Comprimento de onda: Rx 1490nm/ Tx 1310nm</li>
                                                    <li>Potência óptica: -1dBm ~ 4dbm</li>
                                                    <li>Sensibilidade de recepção: Min: -25dBm</li>
                                                    <li>Máxima distância de recepção: 20Km</li>
                                                    <li>Tabela de MAC: 64 Bits</li>
                                                    <li>...</li>
                                                    <u>Clique e veja mais detalhes.</u>
                                            </ul>
                                        </td>
                                    </tr>
                                </table>
                                </a>
                            </div>
                        <area id="area5" shape="rect" coords="0,525,59,564" title="FONTE POE FNPS 48" href="<?php echo $UrlAtual.'produtos/fonte-poe-fnps-48/' ?>" />
                            <div id="area5" class="boxarea">
                                <a href="<?php echo $UrlAtual.'produtos/fonte-poe-fnps-48/';?>">
                                <table class="tabelaAplicacoes" style="">
                                    <tr>
                                        <td>
                                                <img src="<?php echo $UrlAtual.'admin/fotos/1399466731.png'; ?>" />
                                        </td>
                                        <td align="left">
                                        <h4>FONTE POE FNPS 48</h4><br/>
                                            <ul style="padding-left:10px">
                                                    <li>Voltagem Output: 48 VDC</li>
                                                    <li>Corrente Output: 0.4A</li>
                                                    <li>Voltagem Input: 90 ~ 260 VAC</li>
                                                    <li>Freqüência Input: 47 ~ 63 Hz</li>
                                                    <li>Corrente Input: 0.3A @120VAC; 0.2A @230VAC</li>
                                                    <li>...</li>
                                                    <u>Clique e veja mais detalhes.</u>
                                            </ul>
                                        </td>
                                    </tr>
                                </table>
                                </a>
                            </div>
                        <area id="area6" shape="rect" coords="246,488,525,517" title="FONTE POE FNPS 48" href="<?php echo $UrlAtual.'produtos/fonte-poe-fnps-48/' ?>" />
                            <div id="area6" class="boxarea">
                                <a href="<?php echo $UrlAtual.'produtos/fonte-poe-fnps-48/';?>">
                                <table class="tabelaAplicacoes" style="">
                                    <tr>
                                        <td>
                                                <img src="<?php echo $UrlAtual.'admin/fotos/1399466731.png'; ?>" />
                                        </td>
                                        <td align="left">
                                        <h4>FONTE POE FNPS 48</h4><br/>
                                            <ul style="padding-left:10px">
                                                    <li>Voltagem Output: 48 VDC</li>
                                                    <li>Corrente Output: 0.4A</li>
                                                    <li>Voltagem Input: 90 ~ 260 VAC</li>
                                                    <li>Freqüência Input: 47 ~ 63 Hz</li>
                                                    <li>Corrente Input: 0.3A @120VAC; 0.2A @230VAC</li>
                                                    <li>...</li>
                                                    <u>Clique e veja mais detalhes.</u>
                                            </ul>
                                        </td>
                                    </tr>
                                </table>
                                </a>
                            </div>
                        <area id="area7" shape="rect" coords="967,429,1026,482" title="FONTE POE FNPS 48" href="<?php echo $UrlAtual.'produtos/fonte-poe-fnps-48/' ?>" />
                            <div id="area7" class="boxarea">
                                <a href="<?php echo $UrlAtual.'produtos/fonte-poe-fnps-48/';?>">
                                <table class="tabelaAplicacoes" style="margin-left:-400px;">
                                    <tr>
                                        <td>
                                                <img src="<?php echo $UrlAtual.'admin/fotos/1399466731.png'; ?>" />
                                        </td>
                                        <td align="left">
                                        <h4>FONTE POE FNPS 48</h4><br/>
                                            <ul style="padding-left:10px">
                                                    <li>Voltagem Output: 48 VDC</li>
                                                    <li>Corrente Output: 0.4A</li>
                                                    <li>Voltagem Input: 90 ~ 260 VAC</li>
                                                    <li>Freqüência Input: 47 ~ 63 Hz</li>
                                                    <li>Corrente Input: 0.3A @120VAC; 0.2A @230VAC</li>
                                                    <li>...</li>
                                                    <u>Clique e veja mais detalhes.</u>
                                            </ul>
                                        </td>
                                    </tr>
                                </table>
                                </a>
                            </div>
                        <area id="area8" shape="rect" coords="856,282,906,334" title="PACPON ONU POE" href="<?php echo $UrlAtual.'produtos/pacpon-onu-poe-e-pac-switch-poe/' ?>" />
                            <div id="area8" class="boxarea">
                                <a href="<?php echo $UrlAtual.'produtos/pacpon-onu-poe-e-pac-switch-poe/';?>">
                                <table class="tabelaAplicacoes" style="margin-left:-300px;">
                                    <tr>
                                        <td>
                                                <img src="<?php echo $UrlAtual.'admin/fotos/1399467157.png'; ?>" />
                                        </td>
                                        <td align="left">
                                        <h4>PACPON ONU POE</h4><br/>
                                            <ul style="padding-left:10px">
                                                    <li>Comprimento de onda: Rx 1490nm/ Tx 1310nm</li>
                                                    <li>Potência óptica: -1dBm ~ 4dbm</li>
                                                    <li>Sensibilidade de recepção: Min: -25dBm</li>
                                                    <li>Máxima distância de recepção: 20Km</li>
                                                    <li>Tabela de MAC: 64 Bits</li>
                                                    <li>...</li>
                                                    <u>Clique e veja mais detalhes.</u>
                                            </ul>
                                        </td>
                                    </tr>
                                </table>
                                </a>
                            </div>
                        <!--
                        <area id="area9" shape="rect" coords="690,86,1009,211" title="PACPON ONU POE" href="<?php echo $UrlAtual.'produtos/pacpon-onu-poe-e-pac-switch-poe/' ?>" />
                            <div id="area9" class="boxarea">
                                <a href="<?php echo $UrlAtual.'produtos/pacpon-onu-poe-e-pac-switch-poe/';?>">
                                <table class="tabelaAplicacoes" style="margin-left:-150px;">
                                    <tr>
                                        <td>
                                                <img src="<?php echo $UrlAtual.'admin/fotos/1399467157.png'; ?>" />
                                        </td>
                                        <td align="left">
                                        <h4>PACPON ONU POE</h4><br/>
                                            <ul style="padding-left:10px">
                                                    <li>Comprimento de onda: Rx 1490nm/ Tx 1310nm</li>
                                                    <li>Potência óptica: -1dBm ~ 4dbm</li>
                                                    <li>Sensibilidade de recepção: Min: -25dBm</li>
                                                    <li>Máxima distância de recepção: 20Km</li>
                                                    <li>Tabela de MAC: 64 Bits</li>
                                                    <li>...</li>
                                                    <u>Clique e veja mais detalhes.</u>
                                            </ul>
                                        </td>
                                    </tr>
                                </table>
                                </a>
                            </div>
                        -->
                        <!--
                        <area shape="rect" coords="474,275,655,390" title="SPLITTER" href="<?php echo $UrlAtual.'produtos/' ?>" />
                        -->
                        <area id="area10" shape="rect" coords="507,528,698,673" title="FONTE POE FNPS 48" href="<?php echo $UrlAtual.'produtos/fonte-poe-fnps-48/' ?>" />
                            <div id="area10" class="boxarea">
                                <a href="<?php echo $UrlAtual.'produtos/fonte-poe-fnps-48/';?>">
                                <table class="tabelaAplicacoes"  >
                                    <tr>
                                        <td>
                                                <img src="<?php echo $UrlAtual.'admin/fotos/1399466731.png'; ?>" />
                                        </td>
                                        <td align="left">
                                        <h4>FONTE POE FNPS 48</h4><br/>
                                            <ul style="padding-left:10px">
                                                    <li>Voltagem Output: 48 VDC</li>
                                                    <li>Corrente Output: 0.4A</li>
                                                    <li>Voltagem Input: 90 ~ 260 VAC</li>
                                                    <li>Freqüência Input: 47 ~ 63 Hz</li>
                                                    <li>Corrente Input: 0.3A @120VAC; 0.2A @230VAC</li>
                                                    <li>...</li>
                                                    <u>Clique e veja mais detalhes.</u>
                                            </ul>
                                        </td>
                                    </tr>
                                </table>
                                </a>
                            </div>
                    </map>
                </div>
                
                <div class="mapaResponsive">
                    <img src="<?php echo $UrlAtual.'imgs/aplicacoes.png' ?>" />
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="wrapfull">
        <div class="wrap30">
            <div class="conteudointerno">
                <div class="setairvideo"></div>
                        <div class="textoNoticia">
                   
                        <p style="text-align: center;"><iframe  longdesc="GEPON ONU POE FIT Networks" name="Fit Networks" src="http://www.youtube.com/embed/gUBa94R-GuY" title="GEPON ONU POE FIT Networks" align="middle" frameborder="0"  scrolling="no"></iframe></p>
                  
                   
                        </div>
                
                
                
                
                <hr />
                <h2>Perguntas frequentes</h2>
                <div class="grids2 backazul margintopacordion" style="width:100%; clear:both; margin:0;">
                    
                    <div class="gridnahome">
                        <script src="<?php echo $UrlAtual.'js/jquery.accordion.js'; ?>"></script>
                        
                        <div id="acordionhome">
                            <div id="linkacordion"> 
                                <a href="#">Como funciona o PACPON?</a>
                                    <div> 
                                    <p>O PACPON é uma ONU GEPON oito portas que deve ser instalada no poste em via pública e atende a oito assinantes que energizam o equipamento utilizando o sistema padrão internacional de POE.</p> 
                                    </div> 
                                <hr />
                                <a href="#">O que é instalado dentro do ambiente do assinante?</a>
                                    <div> 
                                    <p>Uma fonte POE 48Volts, 0,4Amperes.</p> 
                                    </div> 
                                <hr />
                                <a href="#">Essa fonte tem que ser da FIT Networks?</a>
                                    <div> 
                                    <p>Não, mas precisa ser 48V, padrão internacional POE.</p> 
                                    </div>
                                <hr />
                                <a href="#">Qual é a distância máxima do cabo entre o PACPON e o assinante?</a>
                                    <div> 
                                        <p>100 metros, de acordo norma internacional o POE precisa ser 48V para não haver queda de tensão significativa que prejudique o funcionamento do aparelho.</p>
                                    </div>
                                <hr />
                                <a href="#">Todos os assinantes precisam utilizar fonte POE?</a>
                                    <div> 
                                    <p>Sim, o assinante que não utilizar fonte POE tem seu sinal bloqueado.</p> 
                                    </div>
                                <hr />
                                <a href="#">Como o PACPON recebe a fibra óptica?</a>
                                    <div> 
                                    <p>No poste, o PACPON tem uma bandeja para acomodar a fibra óptica, o conector utilizado deve ser o SC/UPC.</p> 
                                    </div>
                                <hr />
                                <a href="#">Com quais OLT o PACPON pode trabalhar?</a>
                                    <div> 
                                    <p>Qualquer uma GEPON, alguns fornecedores podem colocar limites na OLT e impedir que outras marcas de ONU sejam conectadas. As marcas de OLT que clientes da FIT Networks já utilizam com o PACPON são: FIT Networks, Furukawa, Cianet, Overtek e Fiber Home.</p> 
                                    </div>
                                <hr />
                                <a href="#">Qual a velocidade que o PACPON trabalha?</a>
                                    <div> 
                                    <p>São oito portas Fast Ethernet e uma porta de Uplink 1,25Gbps, sendo então possível a transmissão de até 800Mbps em full duplex.</p> 
                                    </div>
                                <hr />
                                <a href="#">A instalação do PACPON no poste é simples?</a>
                                    <div> 
                                    <p>Sim, a fixação no poste é feita utilizando apenas uma abraçadeira de aço. O seu gabinete suporta acomodação de fibra, de algumas fusões e de um splitter.</p> 
                                    </div>
                                <hr />
                                <a href="#">O PACPON pode ser expandido?</a>
                                    <div> 
                                    <p>Sim, a FIT Networks possui também um switch oito portas com as mesmas características do PACPON que pode ser instalado no mesmo gabinete junto com o PACPON ou separado do PACPON e instalado em outro poste.</p> 
                                    </div>
                                <hr />
                                <a href="#">Quantos switches poderiam ser cascateados?</a>
                                    <div> 
                                    <p>Até três switches.</p> 
                                    </div>
                                <hr />
                                <a href="#">Existem proteções contra descargas elétricas?</a>
                                    <div> 
                                    <p>Sim, tanto no PACPON quanto no Switch existem proteções individuais por porta de 6000 Volts, porém para que essa proteção funcione é necessário que o equipamento seja aterrado.</p> 
                                    </div>
                                <hr />
                                <a href="#">Existe comunicação entre as portas dos assinantes?</a>
                                    <div> 
                                    <p>O provedor de acesso à  internet é livre para fazer as configurações de VLAN da forma que lhe convier, sendo possível impedir ou permitir essa comunicação.</p> 
                                    </div>
                                <hr />
                                <a href="#">Existe proteção anti-looping?</a>
                                    <div> 
                                    <p>Sim, tanto o PACPON quanto o Switch são equipados com a função loop-detection.</p> 
                                    </div>
                                <hr />
                            </div>
                        </div>
                    </div>
                </div>
                
                    <?php require_once 'atendimento.php'; ?>
                
            </div>
        </div>
    </div>
</section>

<script type="text/javascript"> 
    $(function(){ 
        $('#acordionhome').accordion({ 
        autoheight:false 
        }); 
    }); 
</script> 