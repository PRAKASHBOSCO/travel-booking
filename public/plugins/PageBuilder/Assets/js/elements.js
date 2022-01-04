(function($){
    'use strict';

    $(document).ready(function(){
        $( document ).on( "builder/gmz_search_form", function( ) {
            if($('[data-plugin="slick"]').length) {
                ibookingHeroSlider();
            }
        });
    });
})(jQuery);