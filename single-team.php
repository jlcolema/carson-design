<?php

/* Template Name: Individual */

?>

<?php get_header(); ?>

	<!-- Main Content -->

	<section class="individual">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<header>

			<h2><?php the_title(); ?></h2>

			<p><a href="/team"><span class="arrow">&larr;</span> <span>Back to team</span></a></p>

		</header>

		<div class="row">

			<div class="col">

				<?php if (has_post_thumbnail()) { ?>

					<?php the_post_thumbnail(); ?>

				<?php } else { ?>

					<img src="<?php bloginfo('template_directory'); ?>/-/media/not-pictured.jpg" alt="Photo coming soon." />

				<?php } ?>

			</div>

			<div class="col">

				<h2>Learn More About <?php the_title(); ?></h2>

				<?php the_content(); ?>

			</div>

		</div>

		<?php /* <div class="row">
		
			<div>
			
				<ul>
					<li><a href="<?php print_custom_field('linkedin_url'); ?>">Connect with <?php the_title(); ?> on LinkedIn</a></li>
					<li><a href="<?php print_custom_field('facebook_url'); ?>">Connect with <?php the_title(); ?> on Facebook</a></li>
					<li><a href="<?php print_custom_field('twitter_url'); ?>">Connect with <?php the_title(); ?> on Twitter</a></li>
				</ul>
			
			</div>
		
		</div> */ ?>

		<?php endwhile; endif; ?>

	</section>

<?php get_footer(); ?>