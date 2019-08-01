<?php get_header();?>

	<main class="container">
		<section class="testimonial-carousel">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article class="testimonial">
					<?php the_content();?>
					<?php the_post_thumbnail('medium'); ?>
				</article>

			<?php endwhile; else : ?>
				<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>
			<div class="carouselController" id="prev">prev</div>
			<div class="carouselController" id="next">next</div>
		</section>
	</main>

 <?php get_footer();?>