




<?php

/* Template Name: Office */

?>

<?php get_header(); ?>

	<!-- Main Content -->

	<section class="team">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<header>

			<h2>Meet the <?php echo ucwords( $wp_query->query_vars["office"] ) ?> Team</h2>

			<p><a href="/team"><span class="arrow">&larr;</span> <span>Back to team</span></a></p>

		</header>

		<div class="row">

			<?php

				global $post;
 
				$args = array(
				 
				'post_type'=>'team',
				'showposts'=>'-1',
				'orderby'=>'menu_order',
				'order'=>'ASC',
				'tax_query'=> array( array(
					'taxonomy' => 'office',
					'field' => 'slug',
					'terms' => $wp_query->query_vars["office"],
					'operator' => 'IN',
					), ),
				);
				$items = get_posts( $args );
								
			
			?>

			<div class="individuals">

				<ul>

					<?php
	
						foreach($items as $item):
						
							$image_url = wp_get_attachment_image_src( get_post_meta($item->ID, 'team_member_tn', true), 'full');
							$image_url = $image_url[0];
							
							if ( strlen($image_url) == 0 ) {
							
								$image_url = '/wp-content/themes/carson/-/media/not-pictured-tn.jpg';
							}

							echo '<li>';
							
								echo '<a href="' . get_post_permalink($item->ID) . '">';
		
									echo '<img src="' . $image_url . '" alt="' . $item->post_title . '" />';
						
									echo '<div><p><strong>' . $item->post_title . '</strong></p></div>';
											
								echo '</a>';

							echo '</li>';

						endforeach;
	
					?>

				</ul>

			</div>

		</div>

		<?php endwhile; endif; ?>

	</section>

<?php get_footer(); ?>