<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package freerunartists-2019
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">

		<?php echo get_the_post_thumbnail( $post->ID, 'large-slider' ); ?>

		<?php
            $description =  get_field('description');
            $audio =  get_field('audio');
        ?>
       <div class="description-credits"><?php echo $description; ?></div>
       <div><?php echo $audio; ?></div>

       

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //freerunartists_2019_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
