
<nav id="site-navigation" class="main-navigation">

	<div class="container">

		<div class="row big-menu">
			<div class="col-left">

                <?php
                wp_nav_menu( array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu',
                ) );
				?>

				<div class="search">
					<div class="search__btn">
					<svg  class="loupe" width="30" height="30" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M15.853 16.56c-1.683 1.517-3.911 2.44-6.353 2.44-5.243 0-9.5-4.257-9.5-9.5s4.257-9.5 9.5-9.5 9.5 4.257 9.5 9.5c0 2.442-.923 4.67-2.44 6.353l7.44 7.44-.707.707-7.44-7.44zm-6.353-15.56c4.691 0 8.5 3.809 8.5 8.5s-3.809 8.5-8.5 8.5-8.5-3.809-8.5-8.5 3.809-8.5 8.5-8.5z"/></svg></div>

					<div class="search__form">
						<?php get_template_part( 'inc/custom', 'search' ); ?> 
					</div>
					
				</div>

				<div class="follow-us">
					<a href="https://twitter.com/freerunartists?lang=en" target="_blank"><svg class="follow-us__twitter" width="24" height="24" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-.139 9.237c.209 4.617-3.234 9.765-9.33 9.765-1.854 0-3.579-.543-5.032-1.475 1.742.205 3.48-.278 4.86-1.359-1.437-.027-2.649-.976-3.066-2.28.515.098 1.021.069 1.482-.056-1.579-.317-2.668-1.739-2.633-3.26.442.246.949.394 1.486.411-1.461-.977-1.875-2.907-1.016-4.383 1.619 1.986 4.038 3.293 6.766 3.43-.479-2.053 1.08-4.03 3.199-4.03.943 0 1.797.398 2.395 1.037.748-.147 1.451-.42 2.086-.796-.246.767-.766 1.41-1.443 1.816.664-.08 1.297-.256 1.885-.517-.439.656-.996 1.234-1.639 1.697z"/></svg></a>
					<!-- <p class="follow-us__text">Follow us</p> -->
				</div>

				<footer  class="menu-footer">					
						<?php
						wp_nav_menu( array(
							'menu_class'      => 'privacy-menu',
							'theme_location' => 'menu-2',
							'menu_id'        => 'secondary-menu',
						) );
						?>			
					<!-- <div class="">© 2019 Free Run Artists. All Rights Reserved.</div> -->
				</footer>
				
			</div><!-- #end .col-left -->

			<div class="col-right">

                <div class="news-menu">

					<h2 class="news-menu__header-news">News <span class="news-menu__header-news--all"><a href="/news/"> See all the news</a><span></h2>
					
                    <?php

					$args = array(
						'numberposts' => 1,
						'offset' => 0,
						'category' => 0,
						'orderby' => 'post_date',
						'order' => 'DESC',
						'include' => '',
						'exclude' => '',
						'category__not_in' => 7,
						'meta_key' => '',
						'meta_value' =>'',
						'post_type' => 'post',
						'post_status' => 'draft, publish, future, pending, private',
						'suppress_filters' => true
					);

                    $recent_posts = wp_get_recent_posts($args);

                    foreach( $recent_posts as $recent ){
                    if ( has_post_thumbnail( $recent["ID"]) ) {
						printf( '<a href="%s" class="news-menu__image">%s</a>', esc_url( get_permalink($recent["ID"]) ), get_the_post_thumbnail($recent["ID"],'large', array('class' => 'slick-carousel__image')) );
                    }

                    echo '<h3><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" class="news-menu__title-post">' .   $recent["post_title"].'</a> </h3>';

                    }											
					?>					
					
					<div class="spotlight">
					<h2 class="spotlight__header-spotlight">Spotlight</h2>	
					<div class="arrow">
						<a href="#" class="arrow arrow-show-previous">
							<svg  width="124" height="9" xmlns="http://www.w3.org/2000/svg" class="arrow-left">
								<g class="arrow-svg">
									<rect transform="rotate(-45 242.2599182128906,13.910741806030277) " id="svg_20" height="1" width="13.693198" y="13.41074" x="235.413316" stroke-width="1.5"  stroke="null"/>
									<rect stroke="null" id="svg_23" height="1" width="246.222223" y="8.955282" x="0.774102" stroke-width="1.5" />
									<rect transform="rotate(45 242.17370605468747,4.820742607116677) " id="svg_25" height="1" width="12.897712" y="4.320747" x="235.724852" stroke-width="1.5"  stroke="null"/>
								</g>
							</svg>
							</a>
							<a href="#" class="arrow arrow-show-next">
							<svg  width="124" height="9" xmlns="http://www.w3.org/2000/svg" class="arrow-right">
								<g class="arrow-svg">
									<rect transform="rotate(-45 242.2599182128906,13.910741806030277) " id="svg_20" height="1" width="13.693198" y="13.41074" x="235.413316" stroke-width="1.5"  stroke="null"/>
									<rect stroke="null" id="svg_23" height="1" width="246.222223" y="8.955282" x="0.774102" stroke-width="1.5" />
									<rect transform="rotate(45 242.17370605468747,4.820742607116677) " id="svg_25" height="1" width="12.897712" y="4.320747" x="235.724852" stroke-width="1.5"  stroke="null"/>
								</g>
							</svg>
						</a>  
						</div> 
					</div> 
						<?php get_template_part( 'inc/carousel', 'menu' ); ?>                       	
					</div>
										
				</div>

			</div><!-- #end .col-right -->	
					  
	</div><!-- #end .container -->

</nav><!-- end #site-navigation -->