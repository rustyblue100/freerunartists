<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?></a>

		<?php
		the_title(
			sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h2>'
		);
		
		?>
	<em><?php  freerunartists_2019_posted_on(); ?></em>
	</header><!-- .entry-header -->


	<div class="entry-content">

		<?php 	
				if(get_the_excerpt() !==''){

					the_excerpt(); 
				} else {
					echo'<div style="height:2.7rem;"></div>';
				}		
		?>

		<div class="read-more">
			<a href="<?php the_permalink(); ?>" class="">
				<span class="read-more__text">read more</span>
					<svg  width="124" height="9" xmlns="http://www.w3.org/2000/svg">
						<g class="read-more__arrow">
								<rect transform="rotate(-45 242.2599182128906,13.910741806030277) " id="svg_20" height="1" width="13.693198" y="13.41074" x="235.413316" stroke-width="1.5"  stroke="null" fill="#000" />
								<rect stroke="null" fill="#000"  id="svg_23" height="1" width="246.222223" y="8.955282" x="0.774102" stroke-width="1.5" />
								<rect transform="rotate(45 242.17370605468747,4.820742607116677) " id="svg_25" height="1" width="12.897712" y="4.320747" x="235.724852" stroke-width="1.5"  stroke="null" fill="#000" />
						</g>
					</svg>  				
			</a> 
		</div>
 
	</div><!-- .entry-content -->

	<footer class="entry-footer">

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
