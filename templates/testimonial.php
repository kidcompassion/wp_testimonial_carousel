<?php get_header();?>

	<main class="container">
	 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	 	<article class="testimonial">
		 	<?php the_content();?>
      		<?php the_post_thumbnail('medium'); ?>
	 	</article>

	 <?php endwhile; else : ?>
	 	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
	 <?php endif; ?>
	</main>

 <?php get_footer();?>