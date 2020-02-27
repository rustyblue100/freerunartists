<?php
/**
 * Template Name: homepage
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package freerunartists-2019
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>


<main id="fullpage">

    <div class="container">

        <section class="section">

            <div class="row intro">

                <div class="circle">
                    <div class="circle__image">&nbsp;</div>               
                        <div class="circle__text">
                        <?php bloginfo('description'); ?>
                        </div>
                </div> 

                <div class="bird">
                    <img src="/wp-content/themes/freerunartists-2019/images/Chicotop__empty.jpg" class="bird__image">                 
                    <div class="bird__container">
                        <div class="bird__container--left">                       
                            <div class="bird__eye--left"></div>                
                        </div>
                        <div class="bird__container--right">             
                            <div class="bird__eye--right"></div>             
                        </div>
                    </div>
                </div> 
            </div>

            <div class="down-arrow">
                <div id="arrowAnim">
                    <div class="arrowSliding">
                        <div class="arrow-flash"></div>
                    </div>
                    <div class="arrowSliding delay1">
                        <div class="arrow-flash"></div>
                    </div>
                    <div class="arrowSliding delay2">
                        <div class="arrow-flash"></div>
                    </div>
                    <div class="arrowSliding delay3">
                        <div class="arrow-flash"></div>
                    </div>
                </div>
            </div>

        </section>


        <!-- Start News -->
        <section class="section normal-scroll">
            <h1 class="news-home__title">News <span class="news-home__title--all"><a href="/news/"> See all the news</a><span></h1>
                
            <div class="news-home">

                <?php
                    $args = array( 'numberposts' => '3', 'category__not_in' => 7 );
                    $recent_posts = wp_get_recent_posts( $args );

                    $ID = 0;
                    foreach( $recent_posts as $recent ){                              
                ?>

                <div <?php 

                $ID++;
                
                post_class("news-home__wrap news-home__wrap--$ID",  $recent["ID"] ); ?> id="post-<?php echo $recent["ID"]; ?>" >
                                                                                                
                    <figure class="news-home__image">
                        <a href="<?php echo get_permalink($recent["ID"]); ?>" class="">
                            <?php echo get_the_post_thumbnail( $recent["ID"], 'large', array('class' => 'news-home__photo' ));?> 
                        </a>
                        <div class="news-home__overlay"></div>  
                    </figure>
                    

                    <?php echo '<a class="news-home__permalink" href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a>';?> 
                    <div class="news-home__date"><em>Posted on <?php echo date( 'F j, Y', strtotime( $recent['post_date'] ) ); ?></em></div>
                    <p class="news-home__text" >
                        <?php   $content= $recent["post_content"];

                        $excerpt = wp_trim_words( $content, $num_words = 15, $more = null ); 
                        echo $excerpt;                                  
                        ?>  
                  
                    <div class="news-home__read-more">
                        <a href="<?php echo get_permalink($recent["ID"]); ?>" class="">
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
                    
                    </p>
                    
                </div>
                <?php
                }
                wp_reset_query();
                ?>                      
                    
            </div>

        </section>

            <!-- End News -->

        <!-- ACF get field value from artist's page info -->
        <?php 

            $query_artists_args = array(
                'post_type' => 'page',
                'posts_per_page' => -1,
                'meta_key'		 => 'order',
                'orderby'		 => 'meta_value',
                'order'          => 'ASC',
            );

            $query_artists = new WP_Query($query_artists_args);

            if( $query_artists->have_posts() ) :

                while( $query_artists->have_posts() ) : $query_artists->the_post();

                if( get_field( "front_page" ) ==='Yes'){

                    //$image = get_field( "_thumbnail_id" );
                    $title = get_the_title();

                    $image = get_field('_thumbnail_id');
                    $size = 'large'; // (thumbnail, medium, large, full or custom size)
                    
                    $role = get_field( "role" );
                    $description = get_field( "font_page_text" );
                    $link = get_field( "link" );


                    if(get_field( "direction" ) === "Right") {
                        $direction = "right-image"; 
                    } else {
                        $direction = ""; 
                    }  
            ?>
            <section class="section normal-scroll">
                <div class="row">
                    <div class="header-page <?php echo  $direction; ?>">
                        <figure class="header-page__image <?php echo  $direction; ?>">
                            <a href="<?php the_permalink(); ?>" class="">
                                <?php echo wp_get_attachment_image( $image, $size,"",["class" => "header-page__photo $direction"]);?>
                            </a>
                            <div class="header-page__overlay <?php echo  $direction; ?>"></div>
                        </figure>
                        <div class="header-page__wrap <?php echo  $direction; ?>">
                            <a href="<?php the_permalink(); ?>" class="">
                                <h1 class="header-page__title <?php echo  $direction; ?>"><?php echo $title;?></h1>
                            </a>
                            <h2 class="header-page__role <?php echo  $direction; ?>"><?php echo $role;?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="description">
                        <div class="description__text">
                            <?php echo $description;?>                                                    
                        </div>
                        <div class="read-more">
                            <a href="<?php the_permalink(); ?>" class="">
                                <div class="read-more__text">
                                <span>read more</span> 
                                    <svg  width="199" height="15" xmlns="http://www.w3.org/2000/svg">
                                        <g class="read-more__arrow">
                                            <rect transform="rotate(-45 242.2599182128906,13.910741806030277) " id="svg_20" height="1" width="13.693198" y="13.41074" x="235.413316" stroke-width="1.5"  stroke="null" fill="#000" />
                                            <rect stroke="null" fill="#000"  id="svg_23" height="1" width="246.222223" y="8.955282" x="0.774102" stroke-width="1.5" />
                                            <rect transform="rotate(45 242.17370605468747,4.820742607116677) " id="svg_25" height="1" width="12.897712" y="4.320747" x="235.724852" stroke-width="1.5"  stroke="null" fill="#000" />
                                        </g>
                                    </svg>  
                                </div>				
                            </a> 
                        </div>  
                    </div>
                </div>
            </section>
        <?php

         }

        endwhile;

        wp_reset_postdata();  
        

        else :

        // no rows found

        endif;

        ?>

    </div><!-- end #container -->

</main><!-- end #fullpage -->


<?php
get_footer();
