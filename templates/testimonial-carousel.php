<?php 
  $args = array(
      'post_type'=>'testimonials',
      'posts_per_page'=> -1,
      'orderby' =>'rand'
  );

  $dl_testimonials = get_posts( $args ); ?>
  
    <main class="container">
        <section class="testimonial-carousel">
            <?php foreach($dl_testimonials as $key=> $dl_testimonial):?>
                <article class="testimonial">
                    <?php echo $dl_testimonial->post_content;?>
                    <?php the_post_thumbnail('medium'); ?>
                </article>
            <?php endforeach;?>    
        </section>
        <div class="carouselController" id="prev">prev</div>
        <div class="carouselController" id="next">next</div>
    </main>