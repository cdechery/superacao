jQuery(function($) {

					$(".SJ-grid4-Destaque").mouseover(function(){
                        $(".SJ-grid4-Destaque").each(function(){
                            $(this).css("opacity","0.3");
                        });
                        $(this).css("opacity","1");
                    }).mouseleave(function(){
                        $(".SJ-grid4-Destaque").each(function(){
                            $(this).css("opacity","1");
                        });
                    });





   $('body').on('click', function (e) {
    if (!$('nav ul').is(e.target) 
       && $('nav ul').has(e.target).length === 0 
      ) {
       $('.menuquemsomos').hide();
      }
     });


});
