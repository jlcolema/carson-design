				<div class="cta">
								
					<?php $cta = get_page_by_title( 'CTA', 'OBJECT', 'content_blocks' ); ?>
				
					<h3><?php echo get_post_meta($cta->ID, 'headline', true); ?></h3>
					
					<h4><?php echo get_post_meta($cta->ID, 'subhead', true); ?></h4>
				
					<?php echo wpautop($cta->post_content); ?>
						
					<p><a href="<?php echo get_post_meta($cta->ID, 'link', true); ?>"><?php echo get_post_meta($cta->ID, 'link_text', true); ?></a></p>
				
				</div>