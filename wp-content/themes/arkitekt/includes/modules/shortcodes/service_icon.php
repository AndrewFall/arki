<?php global $wp_query;
ob_start(); ?>

<?php if( have_posts()):?>
<div class="wrapper dark features mb20">
		<?php while( have_posts() ): the_post(); 
				$meta = get_post_meta( get_the_id(), 'sh_services_option', true );//printr($meta);
		?>
		<div class="column4">
			<div class="feature-box">
				<div class="feat-text">
					<h4><?php the_title();?></h4>
					<p>
						<?php echo character_limiter( get_the_excerpt(), 180 ); ?>
						<?php //echo $this->excerpt(get_the_excerpt(), 180); ?>
					</p>
				</div>
				<i class="fa <?php echo sh_set($meta, 'fontawesome');?>"></i>
			</div>
		</div>
        <?php endwhile; ?>
		
		
		<div class="clear">
		</div>
	</div>

<?php endif; 

$output = ob_get_contents();
ob_end_clean(); ?>
