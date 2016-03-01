<div class="migalhadepao">
    <h1><i class="icon icon-folder-open"></i><span class="antes"><a href="index.php?id=campanhas" title="Lista">Campanhas</a></span> <i class="icon icon-chevron-right"></i> Editar <span class="ico-niveis"><a href="index.php?id=cad_campanhas&amp;acao=campanhas" title="Cadastrar"><i class="icon icon-file"></i>Novo</a></span></h1>
</div>


<div class="conteudo">
            
    <form method="post" action="#" enctype="multipart/form-data">

        <p><label for="Titulo">Título:</label><br /><input required="" maxlength="165" value="Primeira Campanha" name="Titulo" id="Titulo" type="text"></p>
        <p><label for="Valor">Valor:</label><br /><input value="R$ 700,00" name="Valor" id="Valor" type="text"></p>
        <p><label for="Vigencia">Vigência:</label><br /><input value="12/03 - 01/12" name="Vigencia" id="Vigencia" type="text"></p>
        <p><label for="SEO">Resumo de compartilhamento:</label><br />
            <textarea id="SEO" maxlength="165" name="SEO">Texto para ser compartilhado nas redes sociais</textarea><br /><span id="charsLeft">165</span> caracteres restantes.<br />Resumo usado para exibição em mecanismos de busca e redes sociais.</p>
        <p><label for="Resumo">Descrição do projeto:</label> (use &lt;br /&gt; para pular linha) e (&lt;strong&gt;texto&lt;/strong&gt; para dar negrito num texto).<br />
            <textarea id="Resumo" maxlength="500" name="Resumo">Resumo para lista de campanhas no site</textarea><span id="charsLeft2">500</span> caracteres restantes.<br>Resumo para o site.</p>
        <p><label for="editor1">Texto:</label><br /><textarea style="visibility: hidden; display: none;" class="ckeditor" name="editor1" id="editor1" title="Texto Completo">Texto completo aqui.</textarea></p><hr />
        <p style="margin-bottom:0.2em;">Foto principal. <span style="color:red">Largura obrigatória: 800px e largura 418px.</span> <br />Essa foto é usada na home e quando é compartilhado o projeto nas redes sociais.</p><span class="file-wrapper"><input title="Procure a foto" name="imgfile" id="imgfile" type="file"><span class="button">Foto 800x418</span></span><input name="delfoto" id="delfoto" value="1" type="hidden"><hr />

        <p><label for="Botao">botão Doação:</label><br />
            Exemplo:<br />
            &lt;h2&gt;Doe a partir de R$ 15,00&lt;/h2&gt;<br />
            &lt;form action="https://pagseguro.uol.com.br/checkout/v2/cart.html?action=add" method="post"&gt;<br />
            &lt;input type="hidden" name="itemCode" value="71869B31F1F13AEEE4517F9C47598704" /&gt;<br />
            &lt;input type="image" src="" name="submit" alt="" /&gt;<br />
            &lt;/form&gt;<br />
            Note que no INPUT:<br />
            <span style="color:red">&lt;input type="image" src="" name="submit" alt="" /&gt;</span><br />
            O SRC e o ALT estão vazios, essa linha deverá sempre ser colada dessa forma para que funcione corretamente a formatação.<br />
            <textarea id="Botao" maxlength="1000" name="Botao"></textarea><br /><span id="charsLeft4">1000</span> caracteres restantes.<br />Código fonte do botão do pagSeguro.</p>

        <p><label for="Deposito">Conta para Deposito:</label><br />
         Use <span style="color:red">&lt;br /&gt;</span> para pular linha. Descreva todos os dados necessários para efetuar um deposito.<br />
            <textarea id="Deposito" maxlength="1000" name="Deposito"></textarea><br /><span id="charsLeft5">1000</span> caracteres restantes.</p>

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