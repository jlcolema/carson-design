<?php

/* Template Name: About */

?>

<?php get_header(); ?>

	<!-- Banner -->

	<?php include (TEMPLATEPATH . '/-/inc/banner.php' ); ?>

	<!-- Main Content -->

	<section class="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="row">

			<div>
			
				<?php $content = get_page_by_title( 'Our Philosophy', 'OBJECT', 'page' ); ?>
			
				<h3 class="section-header"><?php echo $content->post_title; ?></h3>

				<?php echo apply_filters( 'the_content', $content->post_content ); ?>
				
			</div>

			<div>
			
				<?php $content = get_page_by_title( 'Our History', 'OBJECT', 'page' ); ?>
			
				<h3 class="section-header"><?php echo $content->post_title; ?></h3>

				<?php echo apply_filters( 'the_content', $content->post_content ); ?>
				
			</div>

			<div>
			
				<?php $content = get_page_by_title( 'Our Vision', 'OBJECT', 'page' ); ?>
			
				<h3 class="section-header"><?php echo $content->post_title; ?></h3>

				<?php echo apply_filters( 'the_content', $content->post_content ); ?>
				
			</div>

		</div>

		<?php endwhile; endif; ?>

	</section>

<?php get_footer(); ?>