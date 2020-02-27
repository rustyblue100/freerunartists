<?php
/**
 * Template Name: Free Page
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<div class="container">

    <div class="free">

        <div class="free__header">
            <h1 class="free__name"><?php the_title(); ?></h1>        
        </div>

        <div class="free__circles">
                    
            <div class="free__overlay">&nbsp;</div>   

            <div class="free__wrap">

                 <!-- External links-->
                <?php if( have_rows('external_links') ):?>

                    <ul class="free__external-links">


                    </ul> 

                    <?php else: ?>
                    <ul class="free__external-links" style="list-style:none">
                        <li class="">&nbsp;</li>                  
                    </ul> 

                <?php endif; ?>  

                <main id="free__text" class="free__text">                 
                    <?php the_content(); ?>
                </main>

            <!-- back Button -->
			<div style="margin-top:2rem"><?php do_action('back_button'); ?></div>

            </div><!-- end. frees_wrap -->


            
            <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>

            <div class="free__picture" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat;background-position: <?php echo $image_position; ?>   !important;"></div>   

    </div><!-- end .free  -->   

</div><!-- end .container--> 
   
        
<?php
get_footer();
