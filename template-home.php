<?php

/* Template Name: Home */

?>

<?php get_header(); ?>

	<!-- Slideshow -->

	<?php include (TEMPLATEPATH . '/-/inc/slideshow_homepage.php' ); ?>

	<!-- Main Content -->

	<section class="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="row">

			<div class="col primary">
	
				<?php the_content(); ?>
	
			</div>
	
			<div class="col sidebar">
	
				<div class="featured-project">

				<?php
				
					$args = array(
				
						'numberposts'=>1,
						'post_type'=>'projects',
						'orderby'=>'rand',
						'post_status'=>'publish',
						'meta_key' => 'featured_project',
						'meta_value' => 'yes'
				
					);
					
					$items = get_posts($args);
				
					foreach($items as $item): ?>
					
						<a href="<?php echo get_permalink($item->ID); ?>">
						
							<?php
							
								$imageName = 'featured_project_thumbnail';
								if( MultiPostThumbnails::has_post_thumbnail('projects', $imageName, $item->ID) ){
									$image_id = MultiPostThumbnails::get_post_thumbnail_id('projects',$imageName,$item->ID);
									$image_url = wp_get_attachment_url($image_id, 'full');
									
									// get attachment info
									$attachment 	= get_post($image_id);
									$alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
									
								}
								
							?>
						
							<img src="<?php echo $image_url; ?>" alt="<?php echo $alt; ?>" />
							
							<div><p><strong>View project <span>&rarr;</span></strong></p></div>
						
						</a>
						
					
				
					<?php endforeach; ?>
				
				</div>
			
			</div>

		</div>

		<?php endwhile; endif; ?>

	</section>

	<!-- Testimonials -->

	<?php include (TEMPLATEPATH . '/-/inc/testimonials.php' ); ?>


	<section class="capabilities">

		<div class="row">

			<div>
	
				<?php $content = get_page_by_title( 'PROCESS', 'OBJECT', 'content_blocks' ); ?>
			
				<h4><?php echo $content->post_title; ?></h4>

				<?php echo apply_filters( 'the_content', $content->post_content ); ?>
				
				<p><a href="<?php echo get_post_meta($content->ID, 'link', true); ?>"><?php echo get_post_meta($content->ID, 'link_text', true); ?></a></p>

			</div>

			<div>
	
				<?php $content = get_page_by_title( 'EXPERIENCE', 'OBJECT', 'content_blocks' ); ?>
			
				<h4><?php echo $content->post_title; ?></h4>

				<?php echo apply_filters( 'the_content', $content->post_content ); ?>
				
				<p><a href="<?php echo get_post_meta($content->ID, 'link', true); ?>"><?php echo get_post_meta($content->ID, 'link_text', true); ?></a></p>

			</div>

			<div>
	
				<?php $content = get_page_by_title( 'TECHNOLOGY', 'OBJECT', 'content_blocks' ); ?>
			
				<h4><?php echo $content->post_title; ?></h4>

				<?php echo apply_filters( 'the_content', $content->post_content ); ?>
				
				<p><a href="<?php echo get_post_meta($content->ID, 'link', true); ?>"><?php echo get_post_meta($content->ID, 'link_text', true); ?></a></p>

			</div>

		</div>

	</section>

<?php get_footer(); ?>