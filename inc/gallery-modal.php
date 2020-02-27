<div class="masonry">
    <div class="grid-sizer">
        <?php

            $images = get_field( "art_gallery" );
            $size = 'full'; // (thumbnail, medium, large, full or custom size)

        ?>

            <?php if( $images ): ?>
                <ul>
                    <?php foreach( $images as $image ): ?>
                        <li class="masonry-item">
                            <a href="<?php echo $image['url']; ?>" target="_blank">
                                <?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>			          
    </div>
</div>