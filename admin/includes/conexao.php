<?php
  $server = "localhost";
  $user   = "wwwinsti_superac";
  $passwd = "inst/*super!@";
  $banco  = "wwwinsti_superacao";
  
  

$conexao = mysql_connect($server,$user,$passwd) or die (ErroBanco(9));
mysql_select_db($banco, $conexao) or die (ErroBanco(11)); 
?>
