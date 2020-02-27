<?php
/**
 *
 * 
 * @package freerunartists-2019
 */

get_header();
?>

	<div id="primary" class="content-area">

		<main id="main" class="site-main">

		<div class="container">
			<div class="news">

			
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'freerunartists-2019' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
		
				<div class="news__overlay">&nbsp;</div>   

					<div class="news__row">

					<?php if ( have_posts() ) : ?>

						<?php while ( have_posts() ) : the_post(); 

						 get_template_part( 'loop-templates/content', 'news' ); 

						 endwhile; // end of the loop. 
						 
						 else :

							get_template_part( 'template-parts/content', 'none' );
				
						endif;
                        
                       ?>

                    </div>
                    
                    <?php the_posts_navigation();?>	

				</div><!-- end .news -->

			</div><!-- end .container -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer(); 

