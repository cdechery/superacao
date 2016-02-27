<div class="wrapfull">
    <ul id="sliderProdutos">
        
        <?php
        echo '<li><a href="'.$UrlAtual.'quemsomos/"><img src="'.$UrlAtual.'imgs/seja_um_doador.jpg" alt=""></a></li>';
        ?>
    </ul>
    </div>

<script>
    $(function() {
            var sliderProdutos = $("#sliderProdutos").slippry({
                    transition: 'horizontal',
                    useCSS: true,
                    speed: 1500,
                    pause: 6000,
                    auto: true,
                    preload: 'visible'
            });
    });
</script>