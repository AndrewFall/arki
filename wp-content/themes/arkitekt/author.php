<?php get_header(); ?>
<?php 
$theme_options = _WSH()->option();
$sidebar = sh_set( $theme_options, 'author_sidebar' );
$layout = sh_set( $theme_options, 'author_sidebar_layout' );
?>

<div class="head-banner clearfix mb30">
  <div class="wrapper">
	<h4><?php printf( __('Author Archive for %s', SH_NAME), sh_set( get_queried_object()->data, 'display_name') ); ?></h4>
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
							<?php get_template_part('content', 'blog'); ?>
							<div class="clear"></div><br />
							<?php _the_pagination(); ?>
						
				</div>
				
				<?php if( $sidebar && $layout == 'right' ): ?>
					<aside class="column3">
                    	<?php dynamic_sidebar( $sidebar ); ?>
                	</aside>
            	<?php endif; ?>

<div class="clear"></div>
</div>

<?php get_footer(); ?>