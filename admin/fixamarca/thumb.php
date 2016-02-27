<?php
// include da classe m2brimagem
include('m2brimagem.class.php');

$arquivo = $_GET['url'];
$publico = $_GET['publico'];


if ($publico != '' && $publico == 'S'){
    $largura = 130;
    $altura  = 130;
}elseif($publico == 'P'){
    $largura = 480;
    $altura  = 250;
}elseif($publico == "M"){
    $largura = 60;
    $altura  = 60;
}elseif($publico == "Z"){
    $largura = 480;
    $altura  = 250;
}else{
    $largura = 80;
    $altura  = 80;
}

$filename = "../fotos/$arquivo";

// instancia objeto m2brimagem
$oImg = new m2brimagem( $filename );
// valida arquivo/imagem
$valida = $oImg->valida();
// redimensiona com saída no browser
if ( $valida == 'OK' ) {
    //$oImg->redimensiona($largura,$altura,'redimensiona');
    //$oImg->redimensiona($largura,$altura,'Crop');
    $oImg->redimensiona($largura,$altura,'fill');
    //$oImg->marcaFixa('marca.png',$tipo);
	$oImg->grava();
	// mensagem de erro
} else {
	die($valida);
}

exit;

?>
