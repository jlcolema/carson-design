<?php

/* Template Name: Team */

?>

<?php get_header(); ?>

	<!-- Main Content -->

	<section class="team">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<header>

			<h2>Our Team</h2>

		</header>
		
		<?php the_content(); ?>
		
		<?php /*

		<div class="row">

			<div class="office">
				
				<img src="/wp-content/uploads/2012/12/jack-carson.jpg" alt="Jack Carson" />
				
				<h3>Jack Carson, President, Texas</h3>
				
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla risus lectus, mollis sed volutpat vitae, posuere eget orci. Nullam posuere metus vitae dolor sodales ac adipiscing ligula tempor. felis. In pretium mattis velit nec sodales.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla risus lectus, mollis sed volutpat vitae, posuere eget orci. Nullam posuere metus vitae dolor sodales ac adipiscing ligula tempor. felis. In pretium mattis velit nec sodales.</p>
				
				<p class="more"><a href="/office/texas">Meet the Texas Team</a></p>
				
			</div>
			
			<div class="office">
				
				<img src="/wp-content/uploads/2012/12/jack-carson.jpg" alt="Julie Berry" />
				
				<h3>Julie Berry, President, Indiana</h3>
				
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla risus lectus, mollis sed volutpat vitae, posuere eget orci. Nullam posuere metus vitae dolor sodales ac adipiscing ligula tempor. felis. In pretium mattis velit nec sodales.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla risus lectus, mollis sed volutpat vitae, posuere eget orci. Nullam posuere metus vitae dolor sodales ac adipiscing ligula tempor. felis. In pretium mattis velit nec sodales.</p>
				
				<p class="more"><a href="/office/indiana">Meet the Indiana Team</a></p>
				
			</div>
		
		</div>

		<!-- <div class="row">

			<?php
			
				$args = array(
			
					'numberposts'=>-1,
					'post_type'=>'team',
					'orderby'=>'menu_order',
					'post_status'=>'publish'
			
				);
				
				$items = get_posts($args);
			
			?>

			<div class="individuals">

				<ul>

					<?php
	
						foreach($items as $item):
						
							$image_url = wp_get_attachment_image_src( get_post_meta($item->ID, 'team_member_tn', true), 'full');
							$image_url = $image_url[0];

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

		</div> -->
		*/ ?>

		<?php endwhile; endif; ?>

	</section>

<?php get_footer(); ?>