<section id="banner">

	<div class="row">

		<div class="banner">

			<div class="banner-inner">

				<div class="message">

					<div class="message-wrap">

						<p><span>
							<?php 
								$banner_text = get_post_meta($post->ID, 'banner_text', true);
								if ($banner_text == '') { 
									$banner_text = 'Interior design is our trade. Collaboration is our passion.';
								} 
								echo $banner_text;
							?>
						</span></p>

					</div>

				</div>

				<div class="photo">

					<?php 
						$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
						$image_url = $image_url[0];

						if ( strlen($image_url) == 0 ) {
						
							$image_url = '/wp-content/uploads/2012/12/example-slide.jpg';
						}
					?>
					<img src="<?php echo $image_url; ?>" alt="" />

				</div>

			</div>

		</div>

	</div>

</section>