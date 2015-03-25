<?php get_header(); ?>


<div class="head-banner clearfix mb30">
  <div class="wrapper">
	<h4><?php the_title();?></h4>
	<?php echo get_the_breadcrumb(); ?>
	<div class="clear"></div>
  </div>
</div>


<div class="portfolio port4">
  
  <div class="wrapper">
    <div class="filters demo1">      
		
		<div class="clear"></div>	
				
		<div class="container clearfix">
			
			<ul class="filter-container clearfix">
	
				
				<?php while( have_posts() ): the_post(); ?>
				
				<?php $thumb = wp_get_attachment_url( get_post_thumbnail_id(get_the_id()) );?>
		
				<li>
					<div class="view view-sixth">
					<?php the_post_thumbnail( '270x207' );?>
						 <div class="mask">
							  <a href="<?php echo $thumb;?>"  data-fancybox-group="group"><i class="fa fa-search"></i></a>
							  <a href="<?php the_permalink();?>"><i class="fa fa-file-o"></i></a>
						  </div>
						  <div class="desc">
							  <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
							  <span><?php echo get_the_term_list(get_the_id(), 'portfolio_category', '', ', '); ?></span>
						  </div>
					</div>
				</li>
				
				<?php endwhile; ?>
				
			</ul>
			
		</div>
		
		<div class="clear"></div>
		
		<div class="pagenation clearfix">
			<?php _the_pagination(); ?>
		</div>
	
	</div>
  </div>
</div>

<?php get_footer(); ?>