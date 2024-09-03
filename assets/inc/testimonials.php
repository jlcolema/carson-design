<section class="testimonials">

	<div class="row">

		<div class="testimonials-container">

			<?php
			
				$args = array(
			
					'numberposts'=>-1,
					'post_type'=>'testimonials',
					'orderby'=>'rand',
					'post_status'=>'publish'
			
				);
				
				$items = get_posts($args);
			
			?>

			<div class="slides">

				<?php

					foreach($items as $item):
						
						echo '<blockquote>';

							echo '<div>';

								echo '<p><span>' . $item->post_content . '</span></p>';
								
								echo '<footer>';
								
									echo '<cite>';
									
										echo '<strong>' . $item->post_title . '</strong>';
										
										echo '<span class="src">' . get_post_meta($item->ID, 'title', true) . ', ' . get_post_meta($item->ID, 'company', true) . '</span>';
										
									echo '</cite>';

								echo '</footer>';

							echo '</div>';
									
						echo '</blockquote>';

					endforeach;

				?>

			</div>

		</div>

	</div>

</section>
