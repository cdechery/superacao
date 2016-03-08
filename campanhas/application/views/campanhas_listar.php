<div class="migalhadepao">
    <h1><i class="icon icon-folder-open"></i>Campanhas<span class="ico-niveis"><a href="<?php echo super_admin_url('novo')?>" title="Cadastrar"><i class="icon icon-file"></i>Novo</a></span></h1>
</div>
<style type="text/css">
.activ_desativ_btn {
    display: box;
}
</style>

<div class="conteudo">
    <div class="slideancora" id="voltaaqui">
        <i class="icon icon-search"></i><a href="#pesquisatopo" class="show_hide">Pesquisar</a><i class="icon icon-chevron-up"></i>
    </div>

    <div style="display: none;" class="slidingDiv" id="aqui">
        <i class="icon icon-search"></i><a href="#voltaaqui" class="show_hide">Pesquisar</a>

        <form style="margin-top:1em;" id="camp_pesq" method="post" action="<?php echo super_admin_url('buscar')?>">
            <p><label for="Titulo">Título/Descrição:</label><br><input id="pesq_texto" name="texto" type="text"></p>
            <p><label for="Situacao">Situação:</label>
                <select name="status" id="pesq_status">
                    <option value=""> Escolha uma situação </option>
                    <option value="A"> Ativa </option>
                    <option value="C"> Comprada </option>
                    <option value="I"> Inativa </option>
                </select>
            </p>

            <p class="botao_right"><input class="botao_login" value=" Pesquisar " name="pesquisar" type="submit"></p>
        </form>
        <hr />
    </div>


<!--         <p>Lista geral.</p>
 -->
        <table>
            <thead>
                <tr>
                  <th>Título</th>
                  <th>Comprador</th>
                  <th>Valor</th>
                  <th>Vigência</th>
                  <th>Opções</th>
                </tr>
            </thead>

            <tbody>
<?php
    if( $campanhas->num_rows() > 0 ) {
        foreach( $campanhas->result() as $row ) {
            $ativ = ($row->status == 'A')?'icon-star':'icon-star-empty';
?>
                <tr>
                    <td class="campanhas"><?php echo $row->titulo?></td>
                    <td class="campanhas">
<?php
            $nome_comprador = "-";
            $email_comprador = "";
            // $data_compra = "";
            if( $row->nome_comprador ) {
                $nome_comprador = "<a href='mailto: ".$row->email_comprador."'>".$row->nome_comprador."</a>";
                // $data_compra = "<br>".$row->data_compra;
                            }
                ?>                        <?php echo $nome_comprador ?>
                                    </td>
                                    <td class="campanhas"><?php echo $row->valor?></td>
                                    <td class="campanhas"><?php echo $row->ini_vigencia?> até <?php echo $row->fim_vigencia?></td>
                                    <td class="campanhas"><a class="icoenable activ_desativ_btn" href="#" data-cmpstatus="<?php echo $row->status?>" data-cmpid="<?php echo $row->id?>"><span title="Clique para mudar o status"><i class="icon <?php echo $ativ?>"></i></span></a>  <a href="<?php echo super_admin_url('modificar/'.$row->id)?>" title="Editar"><i class="icon icon-edit"></i></a></td>
                                </tr>
                <?php
                        } //while
                    } else {
                ?>
                                <tr>
                                    <td colspan="5" class="campanhas">Não há Campanhas para exibir</td>
                                </tr>
                <?php
                    } // if
                ?>
                            </tbody>
                        </table>   
                
                        <!--
                        <div class="paginacao">
                            <p class="npags">1/2</p>
                            <p>
                                <a href="#" class="desativado">
                                    <i class="icon icon-step-backward" style="filter: alpha(opacity=20); -moz-opacity: 0.2; opacity:0.2;"></i>
                                </a> 
                                <a href="#" class="desativado">
                                    <i class="icon icon-"backward" style="filter: alpha(opacity=20); -moz-opacity: 0.2; opacity:0.2;"></i>
                </a>  
                <span title="Página Atual" class="numerodesativado">1</span>  
                <a href="#" target="_self">2</a> 
                <a href="#" target="_self" title="Página Posterior"><i class="icon icon-forward"></i></a> 
                <a href="#" target="_self" title="Última Página"><i class="icon icon-step-forward"></i></a> 
            </p>
        </div>    
        -->
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