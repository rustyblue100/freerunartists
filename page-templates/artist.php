<?php
/**
 * Template Name: Artist
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

<?php

    $image = get_field( "image" );
    $image_position = get_field( "image_position" );
    $title = get_field( "title" );
    $role = get_field( "role" );
    $description = get_field( "description" );
    $link = get_field( "link" );
    $audio_player = get_field( "audio_player" );

?> 

<div class="container">

    <div class="artist">

        <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large-slider' );?>

        <figure class="artist__picture" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat;background-position: <?php echo $image_position; ?>%"></figure>   
        <div class="artist__picture--overlay"></div>

        <header class="artist__header">
            <h1 class="artist__name"><?php the_title(); ?></h1>
            <h2 class="artist__role">
                <?php 

                    if($role){
                        echo $role; 
                    }
                    else{
                        echo '<div></div>';
                    }
                
                ?> 
            </h2>
        </header>

        <div class="artist__circles">
                    
            <div class="artist__overlay">&nbsp;</div>   

            <div class="artist__wrap">

                 <!-- External links-->
                 <nav>
                <?php if( have_rows('external_links') ):?>

                    <ul class="artist__external-links">

                        <?php
                        
                        while ( have_rows('external_links') ) : the_row();

                            $site = get_sub_field('site');
                            $url = get_sub_field('url');
                        ?>
                        <?php if( get_field('url') !== ''): ?>  
                        
                            <li class=""><?php printf( '<a href="%s" class="link" target="_blank" rel="noreferrer noopener">%s</a>',  $url ,  $site  ); ?></li>

                        <?php endif;
                    
                        endwhile;
                        
                        wp_reset_postdata();  
                        
                        ?>     

                        </ul> 
                    </nav>
                    <?php else: ?>
                    <ul class="artist__external-links" style="list-style:none">
                        <li class="">&nbsp;</li>                  
                        <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large-slider' );?>
                     </ul> 

                <?php endif; ?>  

                <main id="artist__text" class="artist__text">                 
                    <?php echo $description; ?>
                </main>

                <!-- Credits -->
                <nav class="credits">
                <?php if( get_field('pictures') || get_field('projects')): ?> 
                <span  class="credits__back" onclick="javascript:history.back()">
                    <svg  width="100" height="9" xmlns="http://www.w3.org/2000/svg" class="arrow-right">
                    <g class="arrow-svg">
                        <rect transform="rotate(-45 242.2599182128906,13.910741806030277) " id="svg_20" height="1" width="13.693198" y="13.41074" x="235.413316" stroke-width="1.5"  stroke="null"/>
                        <rect stroke="null" id="svg_23" height="1" width="246.222223" y="8.955282" x="0.774102" stroke-width="1.5" />
                        <rect transform="rotate(45 242.17370605468747,4.820742607116677) " id="svg_25" height="1" width="12.897712" y="4.320747" x="235.724852" stroke-width="1.5"  stroke="null"/>
                    </g>
                    </svg> 
                    <span class="credits__back--text">back</span>
                 </span>             
                <?php endif; ?> 
                    <!-- Audio btn -->
                    <?php if( get_field('audio') ): ?>  
                        <div class="credits__audio">
                            <button class="credits__btn credits__btn--audio modalBtn">Audio</button> 
                        </div>
                    <?php endif; ?> 
                    <!-- Credits btn -->
                    <?php if( get_field('projects') ): ?>
                        <div class="credits__projects">
                            <button class="credits__btn credits__btn--projects modalBtn">Credits</button> 
                        </div>
                    <?php endif; ?> 

                    <!-- Showreel btn -->                                   
                    <?php                                   
                        $titre = get_field( "titre_videos" );
                        if($titre === "Showreels"):
                        ?>   
                        <div class="credits__showreel">
                            <button class="credits__btn credits__btn--showreel modalBtn">  
                                Showreels  
                            </button> 
                        </div>                                                  
                        <?php elseif($titre === "Videos"):?>
                        <div class="credits__showreel">
                            <button class="credits__btn credits__btn--showreel modalBtn"> 
                                Videos
                            </button> 
                        </div> 
                        <?php else:?>                      
                    <?php endif;?>

                    <!-- Press btn --> 
                    <?php 
                                                    
                        //Get current category 
                        $terms = wp_get_post_terms( $post->ID, 'category',array('fields' => 'ids') );

                        $args = array(
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category',
                                    'field' => 'term_id',
                                    'terms' => $terms[0],
                                )
                            )
                        );

                        $query_press = new WP_Query( $args );

                            //Check if user has press posts
                            if ( $query_press->have_posts() ) :
                        ?>
                                <div class="credits__press">
                                    <button class="credits__btn credits__btn--press modalBtn">Press</button> 
                                </div>
                                <?php 
            
                            endif;

                            wp_reset_postdata();                       
                    ?>

                    <!-- Photos btn -->
                    <?php if( get_field('pictures') ): ?>
                        <div class="credits__photos">
                            <button class="credits__btn credits__btn--photos modalBtn">Pictures</button> 
                        </div>
                    <?php endif; ?>
                    <!-- Gallery btn -->  
                    <?php if( get_field('gallery') ): ?>
                        <div class="credits__gallery">
                            <button class="credits__btn credits__btn--gallery modalBtn">Gallery</button> 
                        </div>
                    <?php endif; ?>  
                            
                </nav>

            </div><!-- end. artists_wrap -->
            
    </div><!-- end .artist  -->   

</div><!-- end .container--> 
   
<!-- Modals--> 
<section class="modal">
    <h1 class="modal__title"><?php the_title(); ?></h1>
    <button class="close-modal">&#215;</button> 
          
    <!-- Audio modal-->
    <div class="modal__content modal__content--audio">        
        <?php echo the_field('audio') ?> 
    </div> 

    <!-- Projects modal-->
    <div class="modal__content modal__content--projects">
        <?php get_template_part( 'inc/projects', 'modal' ); ?> 

        <div class="arrow">
            <a href="#" class="arrow arrow--previous">
            <svg  width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" class="arrow-left">
                <g class="arrow-svg">
                    <rect transform="rotate(-45 242.2599182128906,13.910741806030277) " id="svg_20" height="1" width="13.693198" y="13.41074" x="235.413316" stroke-width="1.5"  stroke="null"/>
                    <rect stroke="null" id="svg_23" height="1" width="246.222223" y="8.955282" x="0.774102" stroke-width="1.5" />
                    <rect transform="rotate(45 242.17370605468747,4.820742607116677) " id="svg_25" height="1" width="12.897712" y="4.320747" x="235.724852" stroke-width="1.5"  stroke="null"/>
                </g>
            </svg>
            </a>
         
    <!-- Projects modal-->   <a href="#" class="arrow arrow--next">
            <svg  width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" class="arrow-right">
                <g class="arrow-svg">
                    <rect transform="rotate(-45 242.2599182128906,13.910741806030277) " id="svg_20" height="1" width="13.693198" y="13.41074" x="235.413316" stroke-width="1.5"  stroke="null"/>
                    <rect stroke="null" id="svg_23" height="1" width="246.222223" y="8.955282" x="0.774102" stroke-width="1.5" />
                    <rect transform="rotate(45 242.17370605468747,4.820742607116677) " id="svg_25" height="1" width="12.897712" y="4.320747" x="235.724852" stroke-width="1.5"  stroke="null"/>
                </g>
            </svg>
            </a>  
        </div> 

    </div>
    
    <!-- Showreel modal-->
    <div class="modal__content modal__content--showreel">
        <?php get_template_part( 'inc/showreel', 'modal' ); ?>
        <div class="arrow">
            <a href="#" class="arrow arrow-showreel-previous">
            <svg  width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" class="arrow-left">
                <g class="arrow-svg">
                    <rect transform="rotate(-45 242.2599182128906,13.910741806030277) " id="svg_20" height="1" width="13.693198" y="13.41074" x="235.413316" stroke-width="1.5"  stroke="null"/>
                    <rect stroke="null" id="svg_23" height="1" width="246.222223" y="8.955282" x="0.774102" stroke-width="1.5" />
                    <rect transform="rotate(45 242.17370605468747,4.820742607116677) " id="svg_25" height="1" width="12.897712" y="4.320747" x="235.724852" stroke-width="1.5"  stroke="null"/>
                </g>
            </svg>
            </a>
            <a href="#" class="arrow arrow-showreel-next">
            <svg  width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" class="arrow-right">
                <g class="arrow-svg">
                    <rect transform="rotate(-45 242.2599182128906,13.910741806030277) " id="svg_20" height="1" width="13.693198" y="13.41074" x="235.413316" stroke-width="1.5"  stroke="null"/>
                    <rect stroke="null" id="svg_23" height="1" width="246.222223" y="8.955282" x="0.774102" stroke-width="1.5" />
                    <rect transform="rotate(45 242.17370605468747,4.820742607116677) " id="svg_25" height="1" width="12.897712" y="4.320747" x="235.724852" stroke-width="1.5"  stroke="null"/>
                </g>
            </svg>
            </a>  
        </div> 
    </div>

    <!-- Press modal-->
    <div class="modal__content modal__content--press">
        <?php get_template_part( 'inc/press', 'modal' ); ?>
    </div>

    <!-- Photos modal-->
    <div class="modal__content modal__content--photos">        
        <?php get_template_part( 'inc/photos', 'modal' ); ?>

        <div class="arrow">
            <a href="#" class="arrow arrow-photos-previous">
            <svg  width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" class="arrow-left">
                <g class="arrow-svg">
                    <rect transform="rotate(-45 242.2599182128906,13.910741806030277) " id="svg_20" height="1" width="13.693198" y="13.41074" x="235.413316" stroke-width="1.5"  stroke="null"/>
                    <rect stroke="null" id="svg_23" height="1" width="246.222223" y="8.955282" x="0.774102" stroke-width="1.5" />
                    <rect transform="rotate(45 242.17370605468747,4.820742607116677) " id="svg_25" height="1" width="12.897712" y="4.320747" x="235.724852" stroke-width="1.5"  stroke="null"/>
                </g>
            </svg>
            </a>
            <a href="#" class="arrow arrow-photos-next">
            <svg  width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" class="arrow-right">
                <g class="arrow-svg">
                    <rect transform="rotate(-45 242.2599182128906,13.910741806030277) " id="svg_20" height="1" width="13.693198" y="13.41074" x="235.413316" stroke-width="1.5"  stroke="null"/>
                    <rect stroke="null" id="svg_23" height="1" width="246.222223" y="8.955282" x="0.774102" stroke-width="1.5" />
                    <rect transform="rotate(45 242.17370605468747,4.820742607116677) " id="svg_25" height="1" width="12.897712" y="4.320747" x="235.724852" stroke-width="1.5"  stroke="null"/>
                </g>
            </svg>
            </a>  
        </div> 
        
    </div>

    <!-- Gallery modal-->
    <div class="modal__content modal__content--gallery">      
        <?php get_template_part( 'inc/gallery', 'modal' ); ?>                
    </div>

</section><!-- end .modal-->   


        
<?php
get_footer();
