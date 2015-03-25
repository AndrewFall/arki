<?php global $wp_query;

wp_enqueue_script( array( 'jquery.bxslider.js' ) );

ob_start(); ?>
<?php if( have_posts()):?>

<!--Testimonials Start-->
	<div class="testimonials clearfix">
		<div class="wrapper">
			<h3 class="main-title"><?php echo $title;?></h3>
			<span class="main-subtitle"><?php echo $sub_title;?></span>
			<ul class="bxslider">
				
				
				<?php while( have_posts() ): the_post();
                 $meta = get_post_meta( get_the_id(), 'sh_testimonial_options', true );//printr($meta);?>

				<li>
                <?php the_post_thumbnail('thumbnail');?> 
				<!--<img src="images/user-thumb.png" alt="">-->
				<p>
					<?php the_excerpt(); ?>
				</p>
				<div class="test-border">
				</div>
				<span><?php echo sh_set($meta, 'author');?>, <?php echo sh_set($meta, 'designation');?> at <strong><?php echo sh_set($meta, 'company');?></strong></span>
				</li>
                                    <?php endwhile; ?>  
			</ul>
		</div>
		<!--Wrapper End-->
	</div>
	<!--Testimonials End-->
<?php endif; 

$output = ob_get_contents();
ob_end_clean(); ?>
