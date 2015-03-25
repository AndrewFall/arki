<?php global $wp_query;
//printr ($wp_query);
$paged = get_query_var('paged');

wp_enqueue_script( array( 'jquery.isotope.min.js' ) );

ob_start(); ?>
<?php if( have_posts()):?>

<div class="portfolio port-full">
	<div class="filters demo1">
		<div class="clear"></div>
		<div class="container clearfix">
			<ul class="filter-container clearfix">
				<?php while( have_posts() ): the_post(); ?>
				
					<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
					$url = $thumb['0']; ?>
					
					<li class="class1">
						
						<div class="view view-sixth">
							<?php the_post_thumbnail( '384x295' );?>
							<div class="mask"> <a href="<?php echo $url;?>"  data-fancybox-group="group"><i class="fa fa-search"></i></a> <a href="<?php the_permalink();?>"><i class="fa fa-file-o"></i></a> </div>
						</div>
						
						<div class="desc">
							<h4><a href="<?php the_permalink();?>">
								<?php the_title();?>
								</a></h4>
							<span><?php echo get_the_term_list(get_the_id(), 'portfolio_category', '', ', '); ?></span> 
						</div>
					</li>
					
				<?php endwhile; ?>
			</ul>
			<div class="clear"></div>
		</div>
		<!-- End isotope Filters -->
		
		<div class="clear"></div>
	</div>
</div>
<!-- End Portfilio -->

<?php endif; 

$output = ob_get_contents();
ob_end_clean(); ?>
