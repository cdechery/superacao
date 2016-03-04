<?php
    $titulo = $valor = $texto_curto = "";
    $texto_longo = $ini_vigencia = $fim_vigencia = "";
    $status = ""; $foto = ""; $id = "";

    if( !empty($data) && $data['action']=='atualizar' ) {
        extract($data);
    }
?>
<script type="text/javascript" src="../admin/editor/ckeditor.js" charset="utf-8"></script>
<div class="migalhadepao">
    <h1><i class="icon icon-folder-open"></i><span class="antes"><a href="<?php echo super_admin_url('listar')?>" title="Lista">Campanhas</a></span> <i class="icon icon-chevron-right"></i> Cadastrar</h1>
</div>

<div class="conteudo">
            
    <form method="post" id="campanha_<?php echo $data['action']?>" action="<?php echo cmp_base_url( $data['action'] )?>" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id?>">
        <p><label for="Titulo">Título:</label><br /><input required maxlength="100" value="<?php echo $titulo?>" id="titulo" name="titulo" type="text"></p>
        <p><label for="Valor">Valor:</label><br /><input value="<?php echo $valor?>" name="valor" type="text" id="valor" maxlength="10"></p>
        <p><label for="Resumo">Descrição curta:</label> (use &lt;br /&gt; para pular linha) e (&lt;strong&gt;texto&lt;/strong&gt; para dar negrito num texto).<br />
            <textarea id="Resumo" maxlength="200" name="texto_curto"><?php echo $texto_curto?></textarea><span id="charsLeft2">500</span> caracteres restantes.<br>Resumo para o site.</p>
        <p><label for="Vigencia">Vigência:</label><br />De: <input value="<?php echo $ini_vigencia?>" name="ini_vigencia" id="ini_vigencia" type="text"> Até: <input value="<?php echo $fim_vigencia?>" name="fim_vigencia" id="fim_vigencia" type="text"></p>
        <p><label for="editor1">Descrição completa:</label><br /><textarea id="texto_longo" style="visibility: hidden; display: none;" class="ckeditor" maxlength="2000" name="texto_longo" title="Texto Completo"><?php echo $texto_longo?></textarea></p><hr />
        <p style="margin-bottom:0.2em;">Foto principal. <span style="color:red">Largura obrigatória: 800px e largura 418px.</span> <br />Essa foto é usada na home e quando é compartilhado o projeto nas redes sociais.</p><span class="file-wrapper"><input title="Procure a foto" name="foto" id="imgfile" type="file"><span class="button">Foto 800x418</span></span><input name="delfoto" id="delfoto" value="1" type="hidden"><hr />


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
    }
?>
        <p><label for="situacao">Situação:</label> <?php echo $desc_status?>
        </p>

<!--         <p><label for="SEO">Resumo de compartilhamento:</label><br />
            <textarea id="SEO" maxlength="165" name="SEO"></textarea><br /><span id="charsLeft">165</span> caracteres restantes.<br />Resumo usado para exibição em mecanismos de busca e redes sociais.</p>

 -->    </p>
        <p class="botao_right"><input class="botao_login" value=" <?php echo strtoupper($data['action'])?> " name="submit" type="submit"></p>
    </form>            
</div>

<script>
$(document).ready( function() {
    $('#titulo').limit('100','#charsLeft');
    $('#texto_curto').limit('200','#charsLeft2');
    $('#texto_longo').limit('2000','#charsLeft3');
    $('#ini_vigencia').limit('10');
    $('#fim_vigencia').limit('10');
    $('#valor').mask('9999.99');
    $('#ini_vigencia').mask('99/99/9999');
    $('#fim_vigencia').mask('99/99/9999');
});
</script>