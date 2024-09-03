<?php

	// get slideshow information

	$args = array(

		'numberposts'=>-1,
		'post_type'=>'homepage_slideshow',
		'orderby'=>'menu_order',
		'order'=>'ASC',
		'post_status'=>'publish'

	);
	
	$items = get_posts($args);
?>


				

<section id="slideshow">

	<div class="row">

		<div class="slideshow container">

			<div class="flexslider">
		
				<ul class="slides">
					
					<?php
					
						foreach($items as $item):
						
							$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($item->ID), 'full');
							$image_url = $image_url[0];
						
							echo '<li><a href="' . get_permalink(get_post_meta($item->ID, 'linked_project', true)) . '"><img src="' . $image_url . '" alt="' . $item->post_title . '" /></a></li>';
							
						endforeach;
					
					?>
		
				</ul>
		
			</div>

		</div>

	</div>

</section>