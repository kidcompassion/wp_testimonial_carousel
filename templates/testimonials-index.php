<?php get_header();?>

	<main class="container">
		<section class="testimonial-carousel">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article class="testimonial">
					<div class="left--column">
						<div class="testimonial--text-border">
							<div class="testimonial--text-content">
								<p><?php the_content();?></p>
								<span class="attribution--name"><?php echo get_post_meta( get_the_ID(), 'x_attr_name', true );?>
</span>
								<span class="attribution--title"><?php echo get_post_meta( get_the_ID(), 'x_attr_title', true );?>
							</div>
						</div>
					</div>
					<div class="right--column">
						<div class="testimonial--thumb">
							<?php if (has_post_thumbnail()):?>
								<?php the_post_thumbnail('testimonial-carousel-thumb');?>
							<?php endif;?>
						</div>
						<div class="controllerContainer">
							<div class="carouselController prev"><i class="fa fa-chevron-left"></i></div>
							<div class="carouselController next"><i class="fa fa-chevron-right"></i></div>
						</div>
					</div>
					<?php //the_content();?>
					<?php //the_post_thumbnail('medium'); ?>
				</article>

			<?php endwhile; else : ?>
				<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>

		</section>
		
	</main>

 <?php get_footer();?>