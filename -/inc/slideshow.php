<section id="slideshow">

	<div class="row">

		<div class="slideshow container">

			<div class="flexslider project-slides">
		
				<ul class="slides">
				
					<?php
					
						for($i=1; $i < 11; $i++){
							$imageName = 'featured_image_'.$i;
							$imageNamePopup = 'featured_image_'.$i.'_popup';
							if( MultiPostThumbnails::has_post_thumbnail('projects', $imageName, $id) ){
								$image_id = MultiPostThumbnails::get_post_thumbnail_id('projects',$imageName,$id);
								$image_url = wp_get_attachment_url($image_id, 'full');
								
								// get attachment info
								$attachment = get_post($image_id);
								$alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
								$image_title = $attachment->post_title;
								$caption = $attachment->post_excerpt;
								$description = $attachment->post_content;
								     
								echo '<li>';

									echo '<img src="' . $image_url . '" title="' . $attachment->post_title . '" alt="' . $alt . '" />';
									
								echo '</li>';

							}
						}
						
					?>
		
				</ul>
		
			</div>

			<div class="captions-wrapper">

				<div class="col case-study">

					<p><a href="#" class="basic"><span>Request a case study</span></a></p>

				</div>
	
				<div class="col back-to">
				
					<p><a href="/projects"><span class="arrow">&larr;</span> <span>Back to Projects</span></a></p>

				</div>

			</div>

		</div>

	</div>

</section>