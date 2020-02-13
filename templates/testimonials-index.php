<?php 
/**
 *  Template: Testimonials Archive
 */

get_header();?>

	<main class="container">
		<section class="testimonials--archive">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article class="testimonial">
					<div class="testimonial--thumb">
						<?php if (has_post_thumbnail()):?>
							<?php the_post_thumbnail('testimonial-carousel-thumb');?>
						<?php endif;?>
					</div>
					<div class="testimonial--copy">
						<h1><?php the_title();?></h1>
						<p><?php the_excerpt();?></p>
					</div>
				</article>
			<?php endwhile; else : ?>
				<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>
		</section>
		<div>Pagination
			<ul>
				<li>1</li>
				<li>2</li>
				<li>3</li>
				<li>4</li>
			</ul>
		</div>
	</main>

 <?php get_footer();?>