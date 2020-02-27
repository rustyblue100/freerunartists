<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package freerunartists-2019
 */

get_header();
?>

	<div id="primary" class="content-area">

		<main id="main" class="site-main">

		<div class="container">
			<div class="news">

				<h1 class="news__title">
				<?php 
					$tax = $wp_query->get_queried_object();
					echo ''. $tax->name . '\'s';
				?>
				Press
				</h1>	

				<div class="news__overlay">&nbsp;</div>   

					<!-- back Button -->
					<div style="margin-top:2rem"><?php do_action('back_button'); ?></div>

					<div class="news__row">

						<?php while ( have_posts() ) : the_post(); 

						 get_template_part( 'loop-templates/content', 'cat' ); 

                         endwhile; // end of the loop. 
                        
                       ?>

                    </div>
                    
                    <?php the_posts_navigation();?>	

				</div><!-- end .news -->

			</div><!-- end .container -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer(); 
