<?php get_header(); ?>

<div class="head-banner clearfix mb30">
  <div class="wrapper">
	<h4><?php wp_title(''); ?></h4>
	<?php echo get_the_breadcrumb(); ?>
	<div class="clear"></div>
  </div>
</div>

<div class="main-content wrapper dark">
    <div class="row">
    	
        <div class="column12 post">
        	
            
            <div class="not-found">
                <h1><?php _e( 'Not Found', 'twentyfourteen' ); ?></h1>
                <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentyfourteen' ); ?></p>

				<?php echo get_search_form(); ?>
            	<div class="clear"></div>
			</div>
            
        </div>

	</div>
</div>
<div class="clear"></div>
<?php get_footer(); ?>