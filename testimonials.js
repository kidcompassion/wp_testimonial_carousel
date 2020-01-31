
jQuery( document ).ready(function( $ ) {

    firstCarousel=()=>{
        $('.testimonial-carousel article:first-child').addClass('active');
    }

    lastCarousel=()=>{
        $('.testimonial-carousel article:last-of-type').addClass('active');
    }

    clickNext=()=>{
            $('.testimonial-carousel .moveRight').removeClass('moveRight');
            var prev = $('.testimonial-carousel .active');
            var next = $('.testimonial-carousel article.active').next('article');
            if(next.length ===1){
                prev.removeClass('active').addClass('moveRight');
                next.addClass('active');
            } else {
                $('.testimonial-carousel .active').removeClass('active').addClass('moveRight');
                firstCarousel();
            }

    }

    clickPrev=()=>{
            $('.testimonial-carousel .moveLeft').removeClass('moveLeft');
            var next = $('.testimonial-carousel .active');
            var prev = $('.testimonial-carousel article.active').prev('article');
            if(prev.length ===1){
                next.removeClass('active').addClass('moveLeft');
                prev.addClass('active');
            } else {
                $('.testimonial-carousel .active').removeClass('active');
                lastCarousel();
            }
    }

    firstCarousel();

    $('.testimonial-carousel .carouselController.next').click(function(){
        
        clickNext();
    });

    $('.testimonial-carousel .carouselController.prev').click(function(){
        clickPrev();
    });

});





