<?php 

//Get current category 
$terms = wp_get_post_terms( $post->ID, 'category',array('fields' => 'ids') );

$args = array(

    'posts_per_page' => -1, 
    'orderby' => 'post_date',
    'order' => 'DESC',
    'tax_query' => array(
        array(
            'taxonomy' => 'category',
            'field' => 'term_id',
            'terms' => $terms[0],
        )
    )
);

$query_press = new WP_Query( $args );

    while ( $query_press->have_posts() ) : $query_press->the_post();
?>
  
    <figure class=""> 
        
        <figcaption>
            <p><?php the_content();?></p>
        </figcaption>
    </figure>;						
    
    <?php 

    endwhile;

    wp_reset_postdata();  

?>