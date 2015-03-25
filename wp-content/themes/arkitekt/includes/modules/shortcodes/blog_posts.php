<?php global $wp_query;
ob_start(); ?>

<?php if( have_posts()):?>
			
				
							<?php get_template_part('content', 'blog'); ?>
							<div class="clear"></div><br />
							<?php _the_pagination(); ?>
						
				
			
<?php endif; 

$output = ob_get_contents();
ob_end_clean(); ?>
