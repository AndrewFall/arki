<?php /* Template Name: Visual Composer */
get_header(); ?>

<?php 
   if(basename($_SERVER['REQUEST_URI']) != 'arkitekt'):?>	
		<div class="head-banner clearfix mb30">
		  <div class="wrapper">
			<h4><?php the_title();?></h4>
			<?php echo get_the_breadcrumb(); ?>
			<div class="clear"></div>
		  </div>
		</div>
<?php endif; ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		
				<?php the_content(); ?>

	<?php endwhile; endif; ?>
	
		
<?php get_footer(); ?>
