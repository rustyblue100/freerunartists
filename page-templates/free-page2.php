<?php
/**
 * Template Name: Free Page 2
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 *  @package freerunartists-2019
 */

get_header();
?>

	<div id="primary" class="content-area">

		<main id="main" class="site-main">

		<div class="container">

		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="">', '</h1>' );
			else :
				the_title( '<h2 class=""><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<!-- back Button -->
		<div style="position:relative;top:-4rem"><?php do_action('back_button'); ?></div>

			<?php //freerunartists_2019_post_thumbnail(); ?>

				<div class="news-single__overlay">&nbsp;</div>   

					<div class="news-single__row">			

					<?php
						while ( have_posts() ) : the_post();
							the_content();
							// If comments are open or we have at least one comment, load up the comment template.
					/* 		if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif; */
						endwhile; // End of the loop.
						?>
                    </div>		

			</div><!-- end .container -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer(); 

