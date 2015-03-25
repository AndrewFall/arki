<?php get_header(); 


if( $wp_query->is_posts_page )
{
	
	$quereid_object = get_queried_object();

	$meta = get_post_meta($quereid_object->ID, 'sh_page_meta', true); 
	$sidebar = sh_set( $meta, 'page_sidebar', 'default-sidebar' );
	$layout = sh_set($meta, 'layout', 'right');

}else {

	$theme_options = _WSH()->option(); 
	$sidebar = sh_set( $theme_options, 'blog_sidebar', 'default-sidebar');
	$layout = sh_set($theme_options, 'blog_layout', 'right');

}

?>

<div class="head-banner clearfix mb30">
  <div class="wrapper">
	<h4><?php _e( 'Blog Archives', SH_NAME ); ?></h4>
	
	<div class="clear"></div>
  </div>
</div>

<div class="main-content wrapper dark">
				
	<?php $class = ( $layout == 'full' ) ? 'column12' : 'column9';
		if( $sidebar && $layout == 'left' ): ?>
			<aside class="column3">
				<?php dynamic_sidebar( $sidebar ); ?>
			</div>
	<?php endif; ?>

	<div class="home-blog column9">

		<?php get_template_part('content', 'blog'); ?>
		<div class="clear"></div><br />
		<?php _the_pagination(); ?>
			
	</div>
	
	<?php if( $sidebar && $layout == 'right' ): ?>
		<aside class="column3">
			<?php dynamic_sidebar( $sidebar ); ?>
		</div>
	<?php endif; ?>

	<div class="clear"></div>
</div>

<?php get_footer(); ?>
