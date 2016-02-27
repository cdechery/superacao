<div class="migalhadepao">
    <h1><i class="icon icon-folder-open"></i>Campanhas<span class="ico-niveis"><a href="#" title="Cadastrar"><i class="icon icon-file"></i>Novo</a></span></h1>
</div>

<div class="conteudo">
    <div class="slideancora" id="voltaaqui">
        <i class="icon icon-search"></i><a href="#pesquisatopo" class="show_hide">Pesquisar</a><i class="icon icon-chevron-up"></i>
    </div>

    <div style="display: none;" class="slidingDiv" id="aqui">
        <i class="icon icon-search"></i><a href="#voltaaqui" class="show_hide">Pesquisar</a><i class="icon icon-chevron-down"></i> Os campos estão em ordem de preferência, somente um campo é pesquisado por vez!

        <form style="margin-top:1em;" method="post" action="#">
            <p><label for="Data">Data:</label><br><input value="" name="Data" id="Data" type="text"></p>
            <p><label for="Titulo">Título/Descrição:</label><br><input value="" name="Titulo" id="Titulo" type="text"></p>
            <p><label for="Situacao">Situação:</label>
                <select id="Situacao" name="Situacao">
                    <option value=""> Escolha uma situação </option>
                    <option value="ativo"> Ativo </option>
                    <option value="comprado"> Comprado </option>
                    <option value="inativo"> Inativo </option>
                </select>
            </p>

            <p class="botao_right"><input class="botao_login" value=" Pesquisar " name="pesquisar" type="submit"></p>
        </form>
        <hr />
    </div>


        <p>Lista geral.</p>

        <table>
            <thead>
                <tr>
                  <th>Título</th>
                  <th>Situação</th>
                  <th>Valor</th>
                  <th>Vigência</th>
                  <th>Opções</th>
                </tr>
            </thead>

            <tbody>
<?php
    if( $campanhas ) {
        foreach( $campanhas->result() as $row ) {
?>
                <tr>
                    <td class="campanhas"><?php echo $row->titulo?></td>
                    <td class="campanhas"><?php echo $row->status?></td>
                    <td class="campanhas"><?php echo $row->valor?></td>
                    <td class="campanhas"><?php echo $row->fim_vigencia?></td>
                    <td class="campanhas"><a class="icoenable" href="#"><span title="Ativado"><i class="icon icon-star"></i></span></a>  <a href="#" title="Editar"><i class="icon icon-edit"></i></a> <a href="#" title="Deletar"><i class="icon icon-trash"></i></a></td>
                </tr>
<?php
        } //while
    } else {
?>
                <tr>
                    <td colspan="4" class="campanhas">Não há Campanhas para exibir/td>
                </tr>
<?php
    } // if
?>
            </tbody>
        </table>   


        <div class="paginacao">
            <p class="npags">1/2</p>
            <p>
                <a href="#" class="desativado">
                    <i class="icon icon-step-backward" style="filter: alpha(opacity=20); -moz-opacity: 0.2; opacity:0.2;"></i>
                </a> 
                <a href="#" class="desativado">
                    <i class="icon icon-backward" style="filter: alpha(opacity=20); -moz-opacity: 0.2; opacity:0.2;"></i>
                </a>  
                <span title="Página Atual" class="numerodesativado">1</span>  
                <a href="#" target="_self">2</a> 
                <a href="#" target="_self" title="Página Posterior"><i class="icon icon-forward"></i></a> 
                <a href="#" target="_self" title="Última Página"><i class="icon icon-step-forward"></i></a> 
            </p>
        </div>    
</div>

<script>
$(document).ready(function(){
   $("#Data").mask("99/99/9999");
});

$(document).ready(function(){
 
        $(".slidingDiv").hide();
        $(".show_hide").show();
        
 
    $('.show_hide').click(function(){
    $(".slidingDiv").slideToggle();
    $(".slideancora").slideToggle();
    });
 
});
</script>