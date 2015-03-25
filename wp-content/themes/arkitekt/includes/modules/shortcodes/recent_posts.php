<?php global $wp_query;

wp_enqueue_script( array( 'jquery.bxslider.js' ) );

ob_start(); ?>
<?php if( have_posts()):?>

<!-- Recent Posts -->
	<div class="recent-posts">
		<h3 class="main-title"><?php echo $title;?></h3>
		<span class="main-subtitle"><?php echo $sub_title;?></span>
		<div class="slider4">
			
			<?php while( have_posts() ): the_post();?>
               
			<div class="slide">
				<div class="view view-first">
					<?php the_post_thumbnail('270x207');?> 
					<div class="mask">
						<div class="i-icons">
							<a href="<?php the_permalink();?>" class="re-details"><i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>
				<div class="repost-text">
					<a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>">
						<h4><?php the_title();?> </h4>
					</a>
					<p>
						<?php echo _sh_trim( get_the_excerpt(), 10 ); ?>
					</p>
				</div>
				<ul class="post-tags clearfix">
					<li><a href="<?php the_permalink();?>#comments"><i class="fa fa-comment"></i><?php comments_number('0', '1', '%' );?> comments</a></li>
					<li><a href="<?php the_permalink();?>"><i class="fa fa-calendar"></i><?php the_time( get_option( 'date_format' ) ); ?></a></li>
				</ul>
			</div>
             <?php endwhile; ?>
			<!-- End Slide -->
		</div>
		<!-- End Slider4 -->
	</div>
	<!-- End Recent Posts -->
	
<?php endif; 

$output = ob_get_contents();
ob_end_clean(); ?>
