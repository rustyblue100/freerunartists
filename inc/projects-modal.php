<!-- Slick HTML init -->
<div class="artist__slick-carousel-projects">
    <?php

        $categories = get_the_category();
        $category_id = $categories[0]->cat_ID;

        $credits = new WP_Query( array(
            'post_type' => 'credits',
            'posts_per_page'         => -1,
            'tax_query' => array(
                array (
                    'taxonomy' => 'category',
                    'field' => 'id',
                    'terms' => $category_id,
                )
            ),
        ) );;

        if( $credits->have_posts() ):

            // loop through the posts of data
        while ( $credits->have_posts() ) : $credits->the_post();

        $image_id = get_field('_thumbnail_id');
        $image_size = 'large-slider';
        $image_array = wp_get_attachment_image_src($image_id, $image_size);
        $image_url = $image_array[0];

        $description = get_field( "description" );
        $audio = get_field( "audio" );
        $work = get_field( "work_image" );
    ?>
        <div class="artist__slick-carousel-projects--container">

            <div class="projects">

             <div class="projects__image" style="background-image:url('<?php echo $image_url;?>');"></div>                    
                    
                <div class="projects__container">

                    <div class="projects__left">
                    
                        <h2 class="projects__title"><?php the_title();?></h2>

                        <?php if( $audio ): ?>
                            <div class="projects__audio"><?php echo $audio;?></div>
                        <?php endif; ?> 

                    </div>

                    <div class="projects__right">
                        <div class="projects__text"><?php echo $description;?></div>          
                    </div>        
                        
                </div>
 
            </div>
   
        </div>	

    <?php
    endwhile;
    
    wp_reset_postdata();  

    endif;

    ?>
</div>