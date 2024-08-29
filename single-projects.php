<?php

/* Template Name: Project */

?>

<?php get_header(); ?>

	<!-- Main Content -->

	<section class="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="row first">

			<div class="col primary">

				<hgroup class="section-header">
				
					<h3><?php the_title(); ?></h3>
				
					<h4>
					
						<div class="icon"><img src="/wp-content/themes/carson/-/media/states/<?php echo strtolower(get_custom_field('state')); ?>.png" alt="<?php print_custom_field('state'); ?>" /></div>
					
						<span class="city"><?php print_custom_field('city'); ?></span><span class="state">, <?php print_custom_field('state'); ?></span>
						
					</h4>
					
				</hgroup>

				<div class="brief">

					<div class="overview">

						<div class="inner">
	
							<?php the_content(); ?>

						</div>

					</div>
	
					<div class="details">

						<div class="inner">
	
							<h5>Project Details</h5>

							<?php print_custom_field('project_details:formatted_list', array('<li>[+value+]</li>','<ul>[+content+]</ul>') ); ?>
		
						</div>
					
					</div>

				</div>

			</div>

		</div>

		<!-- Slideshow -->

		<?php include (TEMPLATEPATH . '/-/inc/slideshow.php' ); ?>

		<?php endwhile; endif; ?>

		<!-- Form -->

		<div id="basic-modal-content">

			<?php gravity_form(2, $display_title=true, $display_description=false, $display_inactive=false, $field_values=null, $ajax=false, $tabindex=1); ?>

		</div>

	</section>

<?php get_footer(); ?>