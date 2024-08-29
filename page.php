<?php get_header(); ?>

	<?php include (TEMPLATEPATH . '/-/inc/banner.php' ); ?>

	<section>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<header>

			<h2><?php the_title(); ?></h2>

		</header>

		<div class="row">

			<div class="entry">

				<?php the_content(); ?>

			</div>

		</div>

		<?php endwhile; endif; ?>

	</section>

<?php get_footer(); ?>