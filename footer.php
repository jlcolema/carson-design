	</div>

		<div id="page-footer"></div>

	</div>

	<footer id="footer" role="contentinfo">

		<div class="inner-wrap">

			<div class="row">

				<div class="contact">
	
					<ul class="social">
						<li class="twitter"><a href="<?php echo tune_options('txt_twitter'); ?>" title="Follow us on Twitter" rel="external">Twitter</a></li>
						<li class="facebook"><a href="<?php echo tune_options('txt_facebook'); ?>" title="Like us on Facebook" rel="external">Facebook</a></li>
						<li class="linkedin"><a href="<?php echo tune_options('txt_linked_in'); ?>" title="Connect with us on LinkedIn" rel="external">LinkedIn</a></li>
					</ul>
		
					<div class="offices">
						
						<?php
						
							$args = array(
						
								'numberposts'	=>	-1,
								'post_type'		=>	'locations',
								'orderby'		=>	'menu_order',
								'order'			=>	'ASC',
								'post_status'	=>	'publish'
						
							);
							
							$items = get_posts($args);
						
						?>
		
						<?php foreach($items as $item): ?>
		
							<div>
			
								<h4><?php echo get_post_meta($item->ID, 'city', true); ?></h4>
								
								<p><?php echo get_post_meta($item->ID, 'phone', true); ?></p>
											
							</div>
							
						<?php endforeach; ?>
						
						<?php /*
	
						<div>
		
							<h4>Indianapolis</h4>
		
							<p>317.843.5979</p>
		
						</div>
		
						<div>
		
							<h4>San Antonio</h4>
		
							<p>317.843.5979</p>
		
						</div>
		
						<div>
		
							<h4>Austin</h4>
		
							<p>317.843.5979</p>
		
						</div>
						
						*/ ?>
		
					</div>

				</div>
	
				<p id="copyright"><?php echo str_replace("[[year]]", date("Y"), tune_options('txtarea_copyright')); ?></p>
	
			</div>

		</div>

	</footer>

	<?php wp_footer(); ?>

	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>

	<script src="<?php bloginfo('template_directory'); ?>/-/js/flexslider.js"></script>

	<script src="<?php bloginfo('template_directory'); ?>/-/js/simplemodal.js"></script>

	<script src="<?php bloginfo('template_directory'); ?>/-/js/isotope.js"></script>

	<script src="<?php bloginfo('template_directory'); ?>/-/js/functions.js"></script>

</body>

</html>