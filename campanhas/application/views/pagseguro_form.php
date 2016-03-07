<!-- INICIO FORM PagSeguro -->  
<form method="post" target="pagseguro"  
action="https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html">  
          
        <!-- Campos obrigatórios -->  
        <input name="receiverEmail" type="hidden" value="<?php echo $ps_data['pagseguro_email']?>">  
        <input name="currency" type="hidden" value="BRL">  
  
        <!-- Itens do pagamento (ao menos um item é obrigatório) -->  
        <input name="itemId1" type="hidden" value="<?php echo $ps_data['id']?>">  
        <input name="itemDescription1" type="hidden" value="<?php echo $ps_data['titulo']?>">  
        <input name="itemAmount1" type="hidden" value="<?php echo $ps_data['valor']?>">  
        <input name="itemQuantity1" type="hidden" value="1">  
  
        <!-- Código de referência do pagamento no seu sistema (opcional) -->  
        <!-- <input name="reference" type="hidden" value="REF12346">   -->
  
        <!-- submit do form (obrigatório) -->  
        <input alt="Pague com PagSeguro" name="submit"  type="image"  
src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/pagamentos/120x53-pagar.gif"/>  
          
</form>  
<!-- FIM FORM PagSeguro -->  

<!--
https://ws.sandbox.pagseguro.uol.com.br/v3/transactions/B3B9BF20-C5A9-4B96-81D8-55872564E54E?email=instituto.superacao@gmail.com&token=72DCD89CDF314AB88EFA8299565DEF74
-->