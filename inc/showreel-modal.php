<!-- Slick HTML init -->
<div class="artist__slick-showreel">
    <?php
        if( have_rows('showreel') ):

            // loop through the rows of data
        while ( have_rows('showreel') ) : the_row();

        $title = get_sub_field( "title" );
        $movie = get_sub_field( "embeb_video" );
    ?>
        <div class="artist__slick-showreel--container">
            <?php echo $movie;?>
            <h3><?php echo $title;?></h3>
        </div>							
    <?php
    endwhile;
    
    wp_reset_postdata();  

    endif;

    ?>
</div>

