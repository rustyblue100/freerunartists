<?php
/**
 * Template Name: News
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package freerunartists-2019
 */

get_header();
?>

	<div id="primary" class="content-area">

		<main id="main" class="site-main">

		<div class="container">
			<div class="news">

				<h1 class="news__title"><?php single_post_title(); ?></h1>

				<div class="news__overlay">&nbsp;</div>   

					<div class="news__row">

						<?php while ( have_posts() ) : the_post(); ?>

						<?php global $post; ?>
						<?php the_title(); ?>
							
						<?php get_template_part( 'loop-templates/content', 'news' ); ?>

						<?php endwhile; // end of the loop. ?>	

					</div>

				</div><!-- end .news -->

			</div><!-- end .container -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer(); 

