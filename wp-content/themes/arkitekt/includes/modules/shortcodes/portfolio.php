<?php global $wp_query;

wp_enqueue_script( array( 'jquery.isotope.min.js' ) );

$t = $GLOBALS['_sh_base'];
$paged = get_query_var('paged');

$data_filtration = '';
$data_posts = '';
?>


<?php if( have_posts() ):
	
		ob_start();?>
		
	<ul class="filter-container clearfix">
	
		<?php $count = 0; 
		$fliteration = array();?>
		<?php while( have_posts() ): the_post(); 
			$meta = get_post_meta( get_the_id(), '_sh_portfolio_meta', true );//printr($meta);
			$post_terms = get_the_terms( get_the_id(), 'portfolio_category'); //printr($post_terms);
			foreach( (array)$post_terms as $pos_term ) $fliteration[$pos_term->term_id] = $pos_term;
			$temp_category = get_the_term_list(get_the_id(), 'portfolio_category', '', ', ');
		?>
		
		<?php
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
			$url = $thumb['0'];
		?>

		<?php $post_terms = wp_get_post_terms( get_the_id(), 'portfolio_category'); 
		$term_slug = '';
		if( $post_terms ) foreach( $post_terms as $p_term ) $term_slug .= $p_term->slug.' ';?>
		
		<li class="<?php echo $term_slug; ?>">
			<div class="view view-sixth">
 			<?php the_post_thumbnail( '270x207' );?>
				 <div class="mask">
                 	  <a href="<?php echo $url;?>"  data-fancybox-group="group"><i class="fa fa-search"></i></a>
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
	
<?php $data_posts = ob_get_contents();
ob_end_clean();

endif; 
ob_start();
?>

<div class="portfolio port4">
  
  <div class="wrapper">
    <div class="filters demo1">      
		<div class="filter clearfix">
					<?php $terms = get_terms(array('portfolio_category')); ?>
            		<?php if( $terms ): ?>
					<ul>
						<li><a href="#" class="active" data-filter="*">Show All</a></li>
          				<?php foreach( $fliteration as $t ): ?>
                			<li><a href="#" data-filter=".<?php echo sh_set( $t, 'slug' ); ?>"><?php echo sh_set( $t, 'name'); ?></a></li>
						<?php endforeach; ?>
					</ul>
					<?php endif; ?>
		</div>
		<div class="clear"></div>	
				
		<div class="container clearfix">
			<?php echo $data_posts; ?>
		</div>
		
		<div class="clear"></div>
		
		<div class="pagenation clearfix">
			<?php _the_pagination(); ?>
		</div>
	
	</div>
  </div>
</div>
<?php $output = ob_get_contents();
ob_end_clean(); ?>
	 