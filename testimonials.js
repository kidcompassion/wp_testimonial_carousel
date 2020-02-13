
jQuery( document ).ready(function( $ ) {

    firstCarousel=()=>{
        $('.testimonial--carousel article:first-child').addClass('x_active');
    }

    lastCarousel=()=>{
        $('.testimonial--carousel article:last-of-type').addClass('x_active');
    }

    clickNext=()=>{
            $('.testimonial--carousel .moveRight').removeClass('moveRight');
            var prev = $('.testimonial--carousel .x_active');
            var next = $('.testimonial--carousel article.x_active').next('article');
            if(next.length ===1){
                prev.removeClass('x_active').addClass('moveRight');
                next.addClass('x_active');
            } else {
                $('.testimonial--carousel .active').removeClass('x_active').addClass('moveRight');
                firstCarousel();
            }

    }

    clickPrev=()=>{
            $('.testimonial--carousel .moveLeft').removeClass('moveLeft');
            var next = $('.testimonial--carousel .x_active');
            var prev = $('.testimonial--carousel article.x_active').prev('article');
            if(prev.length ===1){
                next.removeClass('x_active').addClass('moveLeft');
                prev.addClass('x_active');
            } else {
                $('.testimonial--carousel .x_active').removeClass('active');
                lastCarousel();
            }
    }

    firstCarousel();

    $('.testimonial--carousel .carouselController.next').click(function(){
        console.log('next');
        
        clickNext();
    });

    $('.testimonial--carousel .carouselController.prev').click(function(){
        console.log('prev');
        clickPrev();
    });

});





