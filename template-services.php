<?php

/* Template Name: Services */

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

				<?php the_content(); ?>

			</div>

			<div class="col sidebar">
			
				<h4 class="section-header">Comprehensive Services</h4>
				
				<?php wp_nav_menu( array( 'menu' => 'Services', 'container' => '',  'container_class' => '',  'container_id' => '', 'before' => '', 'after' => '', 'menu_class' => 'subnav' ) ); ?>
			
			</div>

		</div>

		<?php endwhile; endif; ?>

	</section>

<?php get_footer(); ?>