<?php
if( !isset($_SESSION["Usuario_Logado"]) || $_SESSION["Usuario_Logado"] != "Admin" ){header("location: login.php");exit;}
?>
<div class="migalhadepao"><h1><i class="icon icon-home"></i><span class="antes">Home</span></h1></div>
        
        <div class="conteudo">
            <h3>Significado dos botões no sistema</h3>
            <table>
                <tr><td><a class="icoenable" href="#" title="Registro Ativado"><i class="icon icon-star"></i></a> = Significa que o registro está ativado (irá aparecer no site ou está apto a ser usado).</td></tr>
                <tr><td><a href="#" title="Registro Desativado"><i class="icon icon-star-empty"></i></a> = Significa que o registro está desativado (não irá aparecer no site).</td></tr>
                <tr><td><a class="icoenable" href="#" title="Registro Principal ou de Destaque"><i class="icon icon-ok-sign"></i></a> = Significa que o registro é o principal ou de Destaque (pode ser usado em redes sociais).</td></tr>
                <tr><td><a href="#" title="Registro Principal ou de Destaque"><i class="icon icon-ok-circle"></i></a> = Significa que o registro não é o principal nem está destacado (não será usado para redes sociais).</td></tr>
                <tr><td><a href="#" title="Visualizar arquivo"><i class="icon icon-eye-open"></i></a> = Visualizar um arquivo cadastrado.</td></tr>
                <tr><td><a href="#" title="Editar Registro"><i class="icon icon-edit"></i></a> = Editar um registro.</td></tr>
                <tr><td><a href="#" title="Cadastrar Fotos"><i class="icon icon-picture"></i></a> = Cadastrar fotos (vincular fotos a um registro).</td></tr>
                <tr><td><a href="#" title="Cadastrar Arquivos"><i class="icon icon-circle-arrow-down"></i></a> = Cadastrar arquivos (vincular arquivos a um registro).</td></tr>
                <tr><td><a href="#" title="Apagar Registro"><i class="icon icon-trash"></i></a> = Apagar um registro (apaga o registro e tudo o que tenha vínculo a ele).</td></tr>
            </table>
            
        </div> 