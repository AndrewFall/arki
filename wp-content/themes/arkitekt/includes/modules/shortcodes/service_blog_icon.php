<?php global $wp_query;
//printr ($wp_query);
ob_start(); ?>
<?php if( have_posts()):?>

<div class="">
<ul class="filter clearfix">
	<?php while( have_posts() ): the_post(); 
		$meta = get_post_meta( get_the_id(), 'sh_services_option', true );//printr($meta);
	?>
  <li class="column6 inpad10">
	<!-- <i class="<?php // echo sh_set($meta, 'fontawesome');?>"></i> -->
	<h3><?php the_title();?></h3>
	<p>
		<?php echo the_content(); ?>
		<?php //echo $this->excerpt(get_the_excerpt(), 180); ?> 
	</p>
  </li>
		<?php endwhile; ?>
  
  <div class="clear"></div>
</ul>
</div>

<?php endif; 

$output = ob_get_contents();
ob_end_clean(); ?>
