
<div class="slick-carousel">
    <?php

        $args = array(
            'post_type' => array('post', 'credits'),
            'posts_per_page' => -1, 
            'orderby' => 'post_date',
            'order' => 'DESC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => 15,
                )
            ) 
        );


        $query_carousel = new WP_Query( $args );

        
        while ( $query_carousel->have_posts() ) : $query_carousel->the_post();

        if ( has_post_thumbnail($post->ID) ) {
            ?>

            <figure class="slick-carousel__container"> 

                <?php 
                //Check if category banner and give the appropriate url
                    $parentcat = get_category_by_slug('spotlight');
                    foreach((get_the_category()) as $childcat):
                        if ($childcat->cat_ID === 17){
                            $the_url = get_field('page'); 
                        } elseif($childcat->cat_ID !== 17) {
                            $the_url = get_permalink(); 
                        }                  
                    endforeach;
                ?>
                
                <?php printf( '<a href="%s" class="slick-carousel__image">%s</a>', esc_url( $the_url ), get_the_post_thumbnail($post->ID,'medium-small', array('class' => 'slick-carousel__image')) );?>
                
                <figcaption>

                    <?php printf( '<a href="%s" class="slick-carousel__link">%s</a>', esc_url( $the_url ), esc_html( get_the_title() ) );?>
                    <?php //'<p class="slick-carousel__link">'.the_excerpt().'</p>'; ?>

                </figcaption>
            
            </figure>						
        
        <?php 


    
        } else{
           echo '<h3>'.the_title().'</h3>';
           echo '<p>'.wp_trim_excerpt().'</p>';
        }
    endwhile;

    wp_reset_postdata();  


    ?>
                            