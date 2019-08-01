
jQuery( document ).ready(function( $ ) {

    firstCarousel=()=>{
        $('article:first-child').addClass('active');
    }

    lastCarousel=()=>{
        $('article:last-of-type').addClass('active');
    }

    clickNext=()=>{
            var prev = $('.active');
            var next = $('article.active').next('article');
            if(next.length ===1){
                prev.removeClass('active');
                next.addClass('active');
            } else {
                $('.active').removeClass('active');
                firstCarousel();
            }
            console.log(next);
            
    }

    clickPrev=()=>{
        console.log($('article:last-child'));
            var next = $('.active');
            var prev = $('article.active').prev('article');
            if(prev.length ===1){
                next.removeClass('active');
                prev.addClass('active');
            } else {
                $('.active').removeClass('active');
                lastCarousel();
            }
    }

    firstCarousel();

    $('#next').click(function(){
        clickNext();
    });

    $('#prev').click(function(){
        clickPrev();
    });

});





