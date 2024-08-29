<?php get_header(); ?>

	<section id="banner">
	
		<div class="row">
	
			<div class="banner">

				<div class="banner-inner">

					<div class="message">

						<div class="message-wrap">

							<p><span><?php _e('Oops... Page Not Found','carson'); ?></span></p>

						</div>

					</div>

					<div class="photo">

						<img src="/wp-content/uploads/2013/02/image01.jpg">

					</div>

				</div>

			</div>
	
		</div>
	
	</section>

	<section class="main">	

		<div class="row">

			<div class="col primary">

				<h3 class="section-header">Contact</h3>

				<div class="form">

					<?php gravity_form(1, $display_title=false, $display_description=false, $display_inactive=false, $field_values=null, $ajax=false, $tabindex=1); ?>

				</div>

			</div>

			<div class="col sidebar">

				<h3 class="section-header">Locations</h3>
				
				<?php
				
					$args = array(
				
						'numberposts'=>-1,
						'post_type'=>'locations',
						'orderby'=>'menu_order',
						'order'=>'ASC',
						'post_status'=>'publish'
				
					);
					
					$items = get_posts($args);
				
				?>

				<?php foreach($items as $item): ?>

					<div class="location">
	
						<div class="fn n org"><?php echo get_the_title($item->ID); ?></div>
	
						<div class="adr">
	
							<div class="street-address"><?php echo get_post_meta($item->ID, 'address_1', true); ?></div>
							<div class="street-address"><?php echo get_post_meta($item->ID, 'address_2', true); ?></div>
	
							<span class="locality"><?php echo get_post_meta($item->ID, 'city', true); ?></span>,
							<span class="region"><?php echo get_post_meta($item->ID, 'state', true); ?></span>,
							<span class="postal-code"><?php echo get_post_meta($item->ID, 'zip', true); ?></span>
	
						</div>
	
						<div class="tel"><?php echo get_post_meta($item->ID, 'phone', true); ?></div>
	
						<a class="url" href="<?php echo get_post_meta($item->ID, 'google_maps_link', true); ?>" rel="external">Directions <span>&rarr;</span></a>
	
					</div>
					
				<?php endforeach; ?>

			</div>

		</div>

	</section>

<?php get_footer(); ?>