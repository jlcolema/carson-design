<?php

/* Template Name: Projects */

?>

<?php get_header(); ?>

	<!-- Main Content -->

	<section>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="row">
		
			<div class="filter">

				<h2>Sort By:</h2>

				<div class="dropdown">

					<div class="inner-dropdown markets">

						<span>All Markets</span>
	
						<ul class="option-set" data-option-key="filter">
							<li><a href="#" data-option-value="*" class="selected">All Markets</a></li>
							<?php
								$terms = get_terms('market', 'orderby=slug&hide_empty=0');
								foreach($terms as $term):
									echo '<li><a href="#" data-option-value=".' . $term->slug . '">' . $term->name . '</a></li>';
								endforeach;
								
							?>
						</ul>
				
					</div>
				
				</div>

				<div class="dropdown">

					<div class="inner-dropdown services">

						<span>All Services</span>
					
						<ul class="option-set" data-option-key="filter">
							<li><a href="#" data-option-value="*" class="selected">All Services</a></li>
							<?php
								$terms = get_terms('service', 'orderby=slug&hide_empty=0');
								foreach($terms as $term):
									echo '<li><a href="#" data-option-value=".' . $term->slug . '">' . $term->name . '</a></li>';
								endforeach;
								
							?>
						</ul>
					
					</div>
					
				</div>

			</div>
		
		</div>

		<div class="row projects-wrapper">

			<div class="no-results-to-display">

				<p>No Results.</p>
				
			</div>

			<div id="container" class="projects">

				<?php
				
					// get slideshow information
				
					$args = array(
				
						'numberposts'=>-1,
						'post_type'=>'projects',
						'orderby'=>'menu_order',
						'order'=>'ASC',
						'post_status'=>'publish'
				
					);
					
					$items = get_posts($args);
				?>

				<?php
				
					foreach($items as $item):
							
						$imageName = 'featured_project_thumbnail';
						if( MultiPostThumbnails::has_post_thumbnail('projects', $imageName, $item->ID) ){
							$image_id = MultiPostThumbnails::get_post_thumbnail_id('projects',$imageName,$item->ID);
							$image_url = wp_get_attachment_url($image_id, 'full');
							
							// get attachment info
							$attachment 	= get_post($image_id);
							$alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
							
						} else {
							$image_url = '/wp-content/themes/carson/-/media/example-project-tn.jpg';
						}
						
						// get market terms
						$terms_markets = wp_get_post_terms( $item->ID, 'market' );
						
						// get service terms
						$terms_services = wp_get_post_terms( $item->ID, 'service' );
						
						$terms = '';
						
						// assemble market classes
						foreach($terms_markets as $terms_market):
						
							$terms .= ' ' . $terms_market->slug;
							
						endforeach;
						
						// assemble service classes
						foreach($terms_services as $terms_service):
						
							$terms .= ' ' . $terms_service->slug;
						
						endforeach;
							
						echo '<div class="project' . $terms . '">';

							echo '<a href="' . get_permalink($item->ID) . '">';
							
							

								echo '<div>';
						
									echo '<img src="' . $image_url . '" alt="' . $item->post_title . '" />';
									
									echo '<p><strong>View project</span>&rarr;</span></strong></p>';

								echo '</div>';

								echo '<h4>' . $item->post_title . '</h4>';
								
								echo '<h5>' . get_post_meta($item->ID, 'city', true) . ', ' . get_post_meta($item->ID, 'state', true) . '</h5>';

							echo '</a>';
						
						echo '</div>';
						
					endforeach;
				
				?>

				<?php /* <div class="project corporate developer education workplace-planning">

					<a href="/projects/project">

						<div>
				
							<img src="<?php bloginfo('template_directory'); ?>/-/media/example-project-tn.jpg" alt="Project" />

							<p><strong>View project <span>&rarr;</span></strong></p>
				
						</div>
				
						<h4>Headline</h4>
					
						<h5>Subheadline</h5>

					</a>

				</div> */ ?>

			</div>
		
		</div>

		<?php endwhile; endif; ?>

	</section>

<?php get_footer(); ?>