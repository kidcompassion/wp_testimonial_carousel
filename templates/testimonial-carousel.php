<?php 
/**
 * Template: Carousel
 */
  $args = array(
      'post_type'=>'testimonials',
      'posts_per_page'=> -1,
      'orderby' =>'rand'
  );

  $x_testimonials = get_posts( $args ); ?>
  
    <main class="container">
        <section class="testimonial--carousel row">
            <?php foreach($x_testimonials as $key=> $x_testimonial):?>

                <article class="testimonial">
                    <figure class="testimonial--image">
                        <img src="https://via.placeholder.com/150"/>
                    </figure>

                    <div class="testimonial--excerpt">
                        <?php echo $x_testimonial->post_excerpt;?>
                    </div>

                    <div class="testimonial--attribution">
                        <span class="attribution--name">Name</span>
                        <span class="attribution--title">Title</span>
                    </div>

                    <div class="testimonial--links">
                        <a class="btn single-testimonial-btn" href="<?php echo get_permalink($x_testimonial->ID);?>">Read Full Testimonial</a>
                        <a class="btn all-testimonials-btn" href="/testimonials">Read All Testimonials</a>
                    </div>
                </article>
            <?php endforeach;?> 
            <div class="controllerContainer">   
                <div class="carouselController chevron left col-1 col-md-2 prev">&#x27F5;</div>
                <div class="carouselController chevron right col-1 col-md-2 next">&#x27F6;</div>
            </div>
        </section>
    </main>