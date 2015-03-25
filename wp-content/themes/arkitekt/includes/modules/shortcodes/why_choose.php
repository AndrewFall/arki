<?php global $wp_query;
ob_start(); ?>

<?php if( have_posts()):?>
<div class="whychoose">
<div class="wrapper">
	<h3 class="main-title"><?php echo $title;?></h3>
	<span class="main-subtitle"><?php echo $sub_title;?></span>
	<div class="dark">
		<div class="column3">
			<img src="<?php echo wp_get_attachment_url( $img, '260x281' ); ?>" alt="">
		</div>
		<div class="column9">
			
			<?php while( have_posts() ): the_post(); 
				$meta = get_post_meta( get_the_id(), 'sh_services_option', true );//printr($meta);
			?>
			
			<div class="whychose-box">
				<div class="w-icons clearfix">
					<i class="fa <?php echo sh_set($meta, 'fontawesome');?>"></i>
					<p>
						<?php the_title();?>
					</p>
				</div>
				<div class="w-descr">
					<p>
						<?php echo character_limiter( get_the_excerpt(), 70 ); ?>
						<?php //echo $this->excerpt(get_the_excerpt(), 70); ?>
					</p>
				</div>
				<div class="clear">
				</div>
			</div>
			
			<?php endwhile; ?>
		
		</div>
		<div class="clear">
		</div>
	</div>
</div>
<!-- End Wrapper -->
</div>

<?php endif; 

$output = ob_get_contents();
ob_end_clean(); ?>
