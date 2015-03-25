<?php get_header(); ?>
<?php 
$theme_options = _WSH()->option();
$sidebar = sh_set( $theme_options, 'search_sidebar', 'default-sidebar' );
$layout = sh_set( $theme_options, 'search_sidebar_layout', 'right' );
$class = ( $layout == 'full' ) ? 'column12' : 'column9';
?>


<div class="head-banner clearfix mb30">
  <div class="wrapper">
	<h4><?php printf( __( 'Search Results for: %s', SH_NAME ), get_search_query() ); ?></h4>
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

				<?php if (have_posts()) : ?>
				<div class="home-blog column9">
							<?php get_template_part('content', 'blog'); ?>
							<div class="clear"></div><br />
							<?php _the_pagination(); ?>
						
				</div>
				
				<?php else : ?>
	
					<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', SH_NAME ); ?></p>
					<aside>
					<?php get_search_form(); ?>
					</aside>
				
				<?php endif; ?>
				
				<?php if( $sidebar && $layout == 'right' ): ?>
					<aside class="column3">
                    	<?php dynamic_sidebar( $sidebar ); ?>
                	</aside>
            	<?php endif; ?>

<div class="clear"></div>
</div>


<?php get_footer(); ?>