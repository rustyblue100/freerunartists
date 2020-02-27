<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package freerunartists-2019
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
					<?php
					freerunartists_2019_posted_on();
					//freerunartists_2019_posted_by();
					?>
				</div><!-- .entry-meta -->

			<?php endif; ?>
		</header><!-- .entry-header -->

			<!-- back Button -->
			<?php do_action('back_button'); ?>
			
			<div class="news-single">

			<?php //freerunartists_2019_post_thumbnail(); ?>

				<div class="news-single__overlay">&nbsp;</div>   

					<div class="news-single__row">			

					<?php
						while ( have_posts() ) :

							the_post();
							get_template_part( 'template-parts/content', 'news');
							previous_post_link( '<span class="prev-post">Previous News: %link</span>', '%title',$in_same_term = false, $excluded_terms = '17', $taxonomy = 'category'  );
							// If comments are open or we have at least one comment, load up the comment template.
					/* 		if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif; */
						endwhile; // End of the loop.
						?>
						
                    </div>

				</div><!-- end .news-single -->

			</div><!-- end .container -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer(); 

