<?php

/* Template Name: Process */

?>

<?php get_header(); ?>

	<!-- Banner -->

	<?php include (TEMPLATEPATH . '/-/inc/banner.php' ); ?>

	<!-- Main Content -->

	<section class="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="row">

			<div class="col primary">

				<?php the_content(); ?>

			</div>

			<div class="col sidebar">

				<?php include(TEMPLATEPATH . '/-/inc/cta.php' ) ?>
			
			</div>

		</div>

		<div class="row">

			<?php
			
				$args = array(
			
					'numberposts'=>-1,
					'post_type'=>'processes',
					'orderby'=>'menu_order',
					'order'=>'ASC',
					'post_status'=>'publish'
			
				);
				
				$items = get_posts($args);
			
			?>

			<div class="processes">

				<?php

					foreach($items as $item):
						
						echo '<div>';

							echo '<img src="' . wp_get_attachment_url( get_post_thumbnail_id($item->ID) ) . '" alt="' . $item->post_title .'" />';
				
							echo '<h4>' . $item->post_title . '</h4>';
					
							echo '<p>' . $item->post_content . '</p>';
									
						echo '</div>';
						
					endforeach;

				?>

			</div>
		
		</div>

		<?php endwhile; endif; ?>

	</section>

<?php get_footer(); ?>