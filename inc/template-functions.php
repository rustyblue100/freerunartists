<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package freerunartists-2019
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function freerunartists_2019_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'freerunartists_2019_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function freerunartists_2019_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'freerunartists_2019_pingback_header' );


/**
 * Truncate acf field text on character
 */ 
function project_excerpt() {
	global $post;


	if( have_rows('presentation') ):

		// loop through the rows of data
	while ( have_rows('presentation') ) : the_row();

	$text = get_sub_field( "description" );

	if ( '' != $text ) {
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>>', $text);
		$excerpt_length = 50;  // 50 words
		$excerpt_more = ' ...';
		$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	  }
	  return apply_filters('the_excerpt', $text);

	endwhile;

	else :

	// no rows found

	endif;	

  }

  project_excerpt(); 


  //Taxonomies in page
	function add_taxonomies_to_pages() {
	//register_taxonomy_for_object_type( 'post_tag', 'page' );
	register_taxonomy_for_object_type( 'category', 'page' );
	}
   add_action( 'init', 'add_taxonomies_to_pages' );
	if ( ! is_admin() ) {
	add_action( 'pre_get_posts', 'category_and_tag_archives' );
	
	}
   function category_and_tag_archives( $wp_query ) {
   $my_post_array = array('post','page');
	
	if ( $wp_query->get( 'category_name' ) || $wp_query->get( 'cat' ) )
	$wp_query->set( 'post_type', $my_post_array );
	
	if ( $wp_query->get( 'tag' ) )
	$wp_query->set( 'post_type', $my_post_array );
   }


// Remove first image from everywhere except page templates "free"
	function remove_first_image ($content) {
		if(is_single()){

		$content = preg_replace("/<img[^>]+\>/i", "", $content, 1);
		} return $content;
	}
add_filter('the_content', 'remove_first_image');

// Add custom class to navigation links
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
	return 'class="arrow arrow-next"';
}


// Deactivate default MediaElement.js styles by WordPress
function remove_mediaelement_styles() {
    
        wp_dequeue_style('wp-mediaelement');
        wp_deregister_style('wp-mediaelement');
    
}
add_image_size( 'medium-small', 300, 300 ); // Soft 
add_image_size( 'large-slider', 1920, 1920 ); // Soft 



/**
 * Excludes posts from "banner" category on the Posts page.
 *
 * @param object $query data.
 */
add_filter( 'pre_get_posts', 'fra_exclude_category_posts' );

function fra_exclude_category_posts( $query ) {

    if ( $query->is_main_query() && ! is_admin() && $query->is_home() ) {
        $query->set( 'cat', '-7' );
    }

}

//Back button
add_action( 'back_button', 'fra_back_button' );
function fra_back_button()
{
    if ( wp_get_referer() )
    {

			$arrow = '<span class="button-arrow"><svg width="99" height="9" xmlns="http://www.w3.org/2000/svg">
								<g class="read-more__arrow">
										<rect transform="rotate(-45 242.2599182128906,13.910741806030277) " id="svg_20" height="1" width="13.693198" y="13.41074" x="235.413316" stroke-width="1.5" stroke="null" fill="#000"></rect>
										<rect stroke="null" fill="#000" id="svg_23" height="1" width="246.222223" y="8.955282" x="0.774102" stroke-width="1.5"></rect>
										<rect transform="rotate(45 242.17370605468747,4.820742607116677) " id="svg_25" height="1" width="12.897712" y="4.320747" x="235.724852" stroke-width="1.5" stroke="null" fill="#000"></rect>
								</g>
							</svg>
							</span>
							';

        $back_text = __($arrow  .' back' );
        $button    = "\n<button id='my-back-button' class='btn button my-back-button' onclick='javascript:history.back()'>$back_text</button>";
        echo ( $button );
    }
}