<!-- Slick HTML init -->
<div class="artist__slick-carousel">
<?php
    $pictures = get_field( "pictures" );
?>
  
    <?php if( $pictures ): ?>
 
        <?php foreach( $pictures as $picture ): ?>
            <div class="artist__slick-carousel--container">
                <img src="<?php echo $picture['sizes']['large']; ?>" alt="" class="artist__slick-carousel__image">
            </div>
        <?php endforeach; ?>
    
    <?php endif; ?>		       
  						
</div>	