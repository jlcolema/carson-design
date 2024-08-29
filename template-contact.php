<?php

/* Template Name: Contact */

?>

<?php get_header(); ?>

	<!-- Banner -->

	<?php include (TEMPLATEPATH . '/-/inc/banner.php' ); ?>

	<!-- Main Content -->

	<section class="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="row">

			<div class="col primary">

				<h3 class="section-header"><?php the_title(); ?></h3>

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
				
				<?php /*

				<div class="location">

					<div class="fn n org">Southwest &ndash; Austin</div>

					<div class="adr">

						<div class="street-address">9229 Delegates Row</div>
						<div class="street-address">Suite 250</div>

						<span class="locality">Indianapolis</span>,
						<span class="region">IN</span>,
						<span class="postal-code">46240</span>

					</div>

					<div class="tel">317.843.5979</div>

					<a class="url" href="http://www.google.com" rel="external">Directions <span>&rarr;</span></a>

				</div>

				<div class="location">

					<div class="fn n org">Southwest &ndash; San Antonio</div>

					<div class="adr">

						<div class="street-address">9229 Delegates Row</div>
						<div class="street-address">Suite 250</div>

						<span class="locality">Indianapolis</span>,
						<span class="region">IN</span>,
						<span class="postal-code">46240</span>

					</div>

					<div class="tel">317.843.5979</div>

					<a class="url" href="http://www.google.com" rel="external">Directions <span>&rarr;</span></a>

				</div>
				
				*/ ?>

			</div>

		</div>

		<?php endwhile; endif; ?>

	</section>

<?php get_footer(); ?>