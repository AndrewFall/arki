<?php get_header(); ?>
<?php 
$meta = get_post_meta( get_the_id(), 'sh_post_meta', true ); //printr($meta);
$settings = sh_set( sh_set( $meta, 'sh_post_options' ) , 0 );
$sidebar = sh_set( $settings, 'sidebar', 'default-sidebar' );
$layout = sh_set( $settings, 'layout', 'right' );
?>


<div class="head-banner clearfix mb30">
  <div class="wrapper">
	<h4><?php the_title();?></h4>
	<?php echo get_the_breadcrumb(); ?>
	<div class="clear"></div>
  </div>
</div>

<div class="main-content wrapper dark">
				
	<?php $class = ( $layout == 'full' ) ? 'column12' : 'column9';
		if( $sidebar && $layout == 'left' ): ?>
			<aside class="column3">
				<?php dynamic_sidebar( $sidebar ); ?>
			</aside>
	<?php endif; ?>

	<div class="home-blog column9">
		<div class="dark mb30">
			<?php while( have_posts() ): the_post(); ?>
				
				<div id="post-<?php the_ID(); ?>" <?php post_class('single-post-wrapper'); ?>>
					
					<div class="post-detail"> 
									
						<?php the_post_thumbnail('870x510');?> 
						
						<h2><?php the_title(); ?></h2>
									
						<div class="blog-content">
							<?php the_content(); ?>
							<div class="clearfix"></div>
							<?php wp_link_pages(array('before'=>'<div class="paginate-links">'.__('Pages: ', SH_NAME), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
						</div>
						
						
						<ul class="post-tags clearfix">
							<li><a href="#comments" title="<?php printf( __('Discussion on %s', SH_NAME), get_the_title() ); ?>"><i class="fa fa-comment"></i><?php comments_number(); ?></a></li>
							<li><a href="javascript:void(0);"><i class="fa fa-calendar"></i><?php the_date(); ?></a></li>
						</ul>
					
					</div>
					<!-- End column4 -->
				</div>								  
			
			<?php endwhile; ?>
			
			<?php comments_template(); ?>
							  
		</div>
		
	</div>
			
	<?php if( $sidebar && $layout == 'right' ): ?>
		<aside class="column3">
			<?php dynamic_sidebar( $sidebar ); ?>
		</aside>
	<?php endif; ?>

	<div class="clear"></div>
</div>

<?php get_footer(); ?>