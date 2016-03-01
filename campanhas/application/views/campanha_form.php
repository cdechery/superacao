<div class="migalhadepao">
    <h1><i class="icon icon-folder-open"></i><span class="antes"><a href="index.php?id=campanhas" title="Lista">Campanhas</a></span> <i class="icon icon-chevron-right"></i> Cadastrar</h1>
</div>

<div class="conteudo">
            
    <form method="post" action="#" enctype="multipart/form-data">

        <p><label for="Titulo">Título:</label><br /><input required="" maxlength="165" value="" name="Titulo" id="Titulo" type="text"></p>
        <p><label for="Valor">Valor:</label><br /><input value="" name="Valor" id="Valor" type="text"></p>
        <p><label for="Vigencia">Vigência:</label><br /><input value="" name="Vigencia" id="Vigencia" type="text"></p>
        <p><label for="Resumo">Descrição curta:</label> (use &lt;br /&gt; para pular linha) e (&lt;strong&gt;texto&lt;/strong&gt; para dar negrito num texto).<br />
            <textarea id="Resumo" maxlength="500" name="Resumo"></textarea><span id="charsLeft2">500</span> caracteres restantes.<br>Resumo para o site.</p>
        <p><label for="editor1">Descrição completa:</label><br /><textarea style="visibility: hidden; display: none;" class="ckeditor" name="editor1" id="editor1" title="Texto Completo"></textarea></p><hr />
        <p style="margin-bottom:0.2em;">Foto principal. <span style="color:red">Largura obrigatória: 800px e largura 418px.</span> <br />Essa foto é usada na home e quando é compartilhado o projeto nas redes sociais.</p><span class="file-wrapper"><input title="Procure a foto" name="imgfile" id="imgfile" type="file"><span class="button">Foto 800x418</span></span><input name="delfoto" id="delfoto" value="1" type="hidden"><hr />


        <p><label for="KeyWords">Palavras chaves:</label> (use vírgulas para separar as palavras).<br />
            <input maxlength="90" value="" name="KeyWords" id="KeyWords" type="text"><span id="charsLeft3">90</span> caracteres restantes.
        </p>

        <p><label for="situacao">Situação:</label><br />
            <select name="situacao" id="situacao">
                <option value="Ativo" selected="">Ativo</option>
                <option value="Comprado">Comprado</option>
                <option value="Inativo">Inativo</option>
            </select>
        </p>

        <p><label for="SEO">Resumo de compartilhamento:</label><br />
            <textarea id="SEO" maxlength="165" name="SEO"></textarea><br /><span id="charsLeft">165</span> caracteres restantes.<br />Resumo usado para exibição em mecanismos de busca e redes sociais.</p>

        <p><label for="ativo">Liberar:</label><br />
            <select name="ativo" id="ativo">
                <option value="S" selected="">Sim</option>
                <option value="N">Não</option>
            </select>
        </p>
        <p class="botao_right"><input class="botao_login" value=" Cadastrar " name="submit" type="submit"></p>
    </form>            
</div>

<script type="text/javascript" src="editor/ckeditor.js" charset="utf-8"></script>
<script>
$('#SEO').limit('165','#charsLeft');
$('#Resumo').limit('500','#charsLeft2');
$('#KeyWords').limit('90','#charsLeft3');
$('#Botao').limit('1000','#charsLeft4');
$('#Deposito').limit('1000','#charsLeft5');
</script>