<?php
    $titulo = $valor = $texto_curto = "";
    $texto_longo = $ini_vigencia = $fim_vigencia = "";
    $status = ""; $foto = ""; $id = "";

    if( !empty($data) && $data['action']=='atualizar' ) {
        extract($data);
    }
?>
 <div class="migalhadepao">
    <h1><i class="icon icon-folder-open"></i><span class="antes"><a href="<?php echo super_admin_url('listar')?>" title="Lista">Campanhas</a></span> <i class="icon icon-chevron-right"></i> Cadastrar</h1>
</div>


<div class="conteudo">
    <form method="post" id="campanha_<?php echo $data['action']?>" action="<?php echo cmp_base_url( $data['action'] )?>" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value="<?php echo $id?>">
        <p><label for="Titulo">Título:</label><br /><input required maxlength="100" value="<?php echo $titulo?>" id="titulo" name="titulo" type="text" /></p>
        <p><label for="valor">Valor:</label><br /><input value="<?php echo $valor?>" name="valor" type="text" id="valor" maxlength="10" /></p>
        <p><label for="Resumo">Descrição curta:</label> (use &lt;br /&gt; para pular linha) e (&lt;strong&gt;texto&lt;/strong&gt; para dar negrito num texto).<br />
            <textarea id="Resumo" maxlength="200" name="texto_curto"><?php echo $texto_curto?></textarea><span id="charsLeft2">200</span> caracteres restantes.<br>Resumo para o site.</p>
        <p><label for="ini_vigencia">Vigência:</label><br />De: <input value="<?php echo $ini_vigencia?>" name="ini_vigencia" id="ini_vigencia" type="text" /></p>
        <p><label for="fim_vigencia">Até:</label><br /><input value="<?php echo $fim_vigencia?>" name="fim_vigencia" id="fim_vigencia" type="text" /></p>
        <p><label for="editor1">Descrição completa:</label><br /><textarea id="texto_longo" style="visibility: hidden; display: none;" class="ckeditor" maxlength="2000" name="texto_longo" title="Texto Completo"><?php echo $texto_longo?></textarea></p><hr />
        <p style="margin-bottom:0.2em;">Foto principal. <span style="color:red">Largura obrigatória: 800px e largura 418px.</span> <br />Essa foto é usada na home e quando é compartilhado o projeto nas redes sociais.</p><span class="file-wrapper"><input title="Procure a foto" name="foto" id="foto" type="file"/><span class="button">Foto 800x418</span></span><input name="delfoto" id="delfoto" value="1" type="hidden" /><hr />
<!--         <p><label for="KeyWords">Palavras chaves:</label> (use vírgulas para separar as palavras).<br />
            <input maxlength="90" value="" name="KeyWords" id="KeyWords" type="text"><span id="charsLeft3">90</span> caracteres restantes.
        </p>

 -->
<?php
    $curr_status = $status;
    $statuses = $params['status_campanhas'];

    if( $data['action']=='inserir' ) {
        $desc_status = "Por padrão toda nova Campanha é <b>Inativa</b>.";
    } else {
        $desc_status = $statuses[ $status ];
        if( $curr_status == 'C' ) {
            $desc_status .= " em ".$data['data_compra']." por ".$data['nome_comprador']." (".$data['email_comprador'].")";
        }
   }
?>

        <p><label for="situacao">Situação:</label> <?php echo $desc_status?>
        </p>
<!--         <p><label for="SEO">Resumo de compartilhamento:</label><br />
            <textarea id="SEO" maxlength="165" name="SEO"></textarea><br /><span id="charsLeft">165</span> caracteres restantes.<br />Resumo usado para exibição em mecanismos de busca e redes sociais.</p>
 -->    
        <p class="botao_right"><input class="botao_login" value=" <?php echo strtoupper($data['action'])?> " name="submit" type="submit" /></p>
    </form>            
</div>

<script type="text/javascript" src="../admin/editor/ckeditor.js" charset="utf-8"></script>
<script type="text/javascript">
$("#ini_vigencia").datepicker({
    dateFormat: 'dd/mm/yy',
    showOtherMonths: true,
    selectOtherMonths: true,
    changeMonth: true,
    changeYear: true,
    /*showButtonPanel:true,
    /*showOn: "button",
    buttonImage: "calendario.png",
    buttonImageOnly: true,*/
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
});

$("#fim_vigencia").datepicker({
    dateFormat: 'dd/mm/yy',
    showOtherMonths: true,
    selectOtherMonths: true,
    changeMonth: true,
    changeYear: true,
    /*showButtonPanel:true,
    /*showOn: "button",
    buttonImage: "calendario.png",
    buttonImageOnly: true,*/
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
});

// $('#valor').mask("000.00");
$("#ini_vigencia").mask("99/99/9999");
$("#fim_vigencia").mask("99/99/9999");
$('#Resumo').limit('200','#charsLeft2');

$('#valor').priceFormat({
    prefix: '',
    centsSeparator: '.',
    thousandsSeparator: ''
});
</script>