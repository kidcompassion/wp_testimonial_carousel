<?php 
  $args = array(
      'post_type'=>'testimonials',
      'posts_per_page'=> -1,
      'orderby' =>'rand'
  );

  $dl_testimonials = get_posts( $args ); ?>
  
    <main class="container">
        <section class="testimonial-carousel row">
            <?php foreach($dl_testimonials as $key=> $dl_testimonial):?>
                <article class="testimonial">
            
                    <div class="testimonial--excerpt">
                  
                        <?php //echo $dl_testimonial->post_excerpt;?>
                    </div>

                    
                    <a class="mt-4 btn btn-primary single-testimonial-btn" href="<?php echo get_permalink($dl_testimonial->ID);?>">Read Full Testimonial</a>
                    <a class="mt-4 btn btn-primary all-testimonials-btn" href="/testimonials/;?>">Read All Testimonials</a>
                </article>
            <?php endforeach;?>    
            <div class="carouselController chevron left col-1 col-md-2" id="prev"></div>
            <div class="carouselController chevron right col-1 col-md-2" id="next"></div>
        </section>
    </main>