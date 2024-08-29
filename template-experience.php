<?php

/* Template Name: Experience */

?>

<?php get_header(); ?>

	<!-- Banner -->

	<?php include (TEMPLATEPATH . '/-/inc/banner.php' ); ?>

	<!-- Main Content -->

	<section class="clients">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<header>
		
			<h2 class="section-header">Clients</h2>
		
		</header>

		<div class="row">

			<div class="client-list">

				<ul>

					<?php
					
						$args = array(
					
							'numberposts'=>-1,
							'post_type'=>'clients',
							'orderby'=>'menu_order',
							'order'=>'ASC',
							'post_status'=>'publish'
					
						);
						
						$items = get_posts($args);
					
					?>

					<?php
	
						foreach($items as $item):
						
							// get the ID of the featured image for this post
							$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($item->ID) );
							
							// the result from above will be an array.  we just need the first element.
							$image_url = $image_url[0];
							
							// if there is a project for this client, grab it.
							// it's possible that there's more than one project but we'll just limit the results to 1.						
							$args = array(
						
								'numberposts'=>1,
								'post_type'=>'projects',
								'orderby'=>'menu_order',
								'order'=>'ASC',
								'post_status'=>'publish',
								'meta_key' => 'client',
								'meta_value' => $item->ID,
						
							);
							
							$projects = get_posts($args);
							
							foreach($projects as $project):
							
								// get the permalink for the project
								$project_permalink = get_post_permalink($project->ID);
							
							endforeach;
								
							// if no project for this client was found, create a null link for it.
							if ( strlen($project_permalink) == 0 ) {
							
								$project_permalink = '';
							
							}
							
							echo '<li><div>';
							
								if ( strlen($project_permalink) > 0) { 
								
									echo '<a href="' . $project_permalink . '">';
									
								}
		
									echo '<img src="' . $image_url . '" alt="' . $item->post_title . '" />';
	
									echo '<p>Client <span>&rarr;</span></p>';
											
								
								if ( strlen($project_permalink) > 0) { 
								
									echo '</a>';
								
								}
								
								$project_permalink = '';

							echo '</div></li>';

						endforeach;
	
					?>
					<?php /*

					<li>

						<div>

							<a href="#">
	
								<img src="<?php bloginfo('template_directory'); ?>/-/media/example-client-tn.png" alt="Client" />
	
								<p>Client <span>&rarr;</span></p>
	
							</a>

						</div>

					</li>

					<li>

						<div>

							<img src="<?php bloginfo('template_directory'); ?>/-/media/example-client-tn.png" alt="Client" />
	
							<p>Client <span>&rarr;</span></p>

						</div>

					</li>

					<li>

						<div>

							<a href="#">
	
								<img src="<?php bloginfo('template_directory'); ?>/-/media/example-client-tn.png" alt="Client" />
	
								<p>Client <span>&rarr;</span></p>
	
							</a>

						</div>

					</li>

					<li>

						<div>

							<img src="<?php bloginfo('template_directory'); ?>/-/media/example-client-tn.png" alt="Client" />
	
							<p>Client <span>&rarr;</span></p>

						</div>

					</li>

					<li>

						<div>

							<img src="<?php bloginfo('template_directory'); ?>/-/media/example-client-tn.png" alt="Client" />
	
							<p>Client <span>&rarr;</span></p>

						</div>

					</li>

					<li>

						<div>

							<a href="#">
	
								<img src="<?php bloginfo('template_directory'); ?>/-/media/example-client-tn.png" alt="Client" />
	
								<p>Client <span>&rarr;</span></p>
	
							</a>

						</div>

					</li>

					<li>

						<div>

							<img src="<?php bloginfo('template_directory'); ?>/-/media/example-client-tn.png" alt="Client" />
	
							<p>Client <span>&rarr;</span></p>

						</div>

					</li>

					<li>

						<div>

							<img src="<?php bloginfo('template_directory'); ?>/-/media/example-client-tn.png" alt="Client" />

							<p>Client <span>&rarr;</span></p>

						</div>

					</li>

					<li>

						<div>

							<a href="#">
	
								<img src="<?php bloginfo('template_directory'); ?>/-/media/example-client-tn.png" alt="Client" />
	
								<p>Client <span>&rarr;</span></p>
	
							</a>

						</div>

					</li>

					<li>

						<div>

							<img src="<?php bloginfo('template_directory'); ?>/-/media/example-client-tn.png" alt="Client" />
	
							<p>Client <span>&rarr;</span></p>

						</div>

					</li>

					<li>

						<div>

							<a href="#">
	
								<img src="<?php bloginfo('template_directory'); ?>/-/media/example-client-tn.png" alt="Client" />
	
								<p>Client <span>&rarr;</span></p>
	
							</a>

						</div>

					</li>

					<li>

						<div>

							<img src="<?php bloginfo('template_directory'); ?>/-/media/example-client-tn.png" alt="Client" />

							<p>Client <span>&rarr;</span></p>

						</div>

					</li>

					<li>

						<div>

							<a href="#">
	
								<img src="<?php bloginfo('template_directory'); ?>/-/media/example-client-tn.png" alt="Client" />
	
								<p>Client <span>&rarr;</span></p>
	
							</a>

						</div>

					</li>

					<li>

						<div>

							<img src="<?php bloginfo('template_directory'); ?>/-/media/example-client-tn.png" alt="Client" />

							<p>Client <span>&rarr;</span></p>

						</div>

					</li>

					<li>

						<div>

							<a href="#">
	
								<img src="<?php bloginfo('template_directory'); ?>/-/media/example-client-tn.png" alt="Client" />
	
								<p>Client <span>&rarr;</span></p>
	
							</a>

						</div>

					</li>

					<li>

						<div>

							<img src="<?php bloginfo('template_directory'); ?>/-/media/example-client-tn.png" alt="Client" />

							<p>Client <span>&rarr;</span></p>

						</div>

					</li>

					<li>

						<div>

							<a href="#">
	
								<img src="<?php bloginfo('template_directory'); ?>/-/media/example-client-tn.png" alt="Client" />
	
								<p>Client <span>&rarr;</span></p>
	
							</a>

						</div>

					</li>

					<li>

						<div>

							<img src="<?php bloginfo('template_directory'); ?>/-/media/example-client-tn.png" alt="Client" />

							<p>Client <span>&rarr;</span></p>

						</div>

					</li>

					<li>

						<div>

							<a href="#">
	
								<img src="<?php bloginfo('template_directory'); ?>/-/media/example-client-tn.png" alt="Client" />
	
								<p>Client <span>&rarr;</span></p>
	
							</a>

						</div>

					</li>

					<li>

						<div>

							<img src="<?php bloginfo('template_directory'); ?>/-/media/example-client-tn.png" alt="Client" />

							<p>Client <span>&rarr;</span></p>

						</div>

					</li>

					<li>

						<div>

							<img src="<?php bloginfo('template_directory'); ?>/-/media/example-client-tn.png" alt="Client" />

							<p>Client <span>&rarr;</span></p>

						</div>

					</li>
					*/ ?>

				</ul>

			</div>

		</div>

		<?php endwhile; endif; ?>

	</section>

<?php get_footer(); ?>