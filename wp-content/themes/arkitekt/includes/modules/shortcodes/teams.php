<?php global $wp_query;

wp_enqueue_script( array( 'jquery.bxslider.js' ) );

ob_start(); ?>
<?php if( have_posts()):?>
<?php if( $slider ):?>
<!-- Our Team -->
	<div class="our-team" style="background-image:url(<?php echo wp_get_attachment_url( $bg_img, 'full' ); ?>);">
		<h3 class="main-title"><?php echo $title;?></h3>
		<span class="main-subtitle"><?php echo $sub_title;?></span>
		<div class="slider3">
		
        <?php while( have_posts() ): the_post();
                 $meta = get_post_meta( get_the_id(), '_sh_team_meta', true );//printr($meta);?>

        
        			<div class="slide">
					<a href="#">
				<div class="team-mates">
					<?php the_post_thumbnail('258x222');?> 
				
					<div class="team-mask">
					</div>
				</div>
				</a>
				<div class="team-descr">
					<h3><?php the_title();?></h3>
					<h5><?php echo sh_set($meta, 'designation');?></h5>
				</div>
				<div class="additionalicons">
					<?php $social_icon = sh_set($meta, 'social_icon_group');
						foreach($social_icon as $key => $value):?>
							<a href="<?php echo sh_set( $value, 'social_url' ); ?>" title="<?php echo sh_set( $value, 'title' ); ?>"><i class="fa <?php echo sh_set( $value, 'social_icon' ); ?>"></i></a>
					<?php endforeach; ?>
				</div>
			</div>
			<!-- End Slide -->
             <?php endwhile; ?>
		</div>
		<!-- End Slider2 -->
	</div>
	<!-- Our Team Ends -->
<?php else:?>
<!-- Our Team -->
<div class="our-team-about wrapper mb30 style="background-image:url(<?php echo wp_get_attachment_url( $bg_img, 'full' ); ?>);"">
  <h3 class="main-title"><?php echo $title;?></h3>
  <span class="main-subtitle"><?php echo $sub_title;?></span>

	<div class="dark">
		<?php while( have_posts() ): the_post();
                 $meta = get_post_meta( get_the_id(), '_sh_team_meta', true );//printr($meta);?>

		<div class="column3 team-item">

			<a href="#"><div class="team-mates">
			  <?php the_post_thumbnail('258x222');?>
			</div></a>

			<div class="team-descr">
			  <h3><?php the_title();?></h3>
			  <h5><?php echo sh_set($meta, 'designation');?></h5>
			</div>
			<div class="additionalicons">
					<?php $social_icon = sh_set($meta, 'social_icon_group');
						foreach($social_icon as $key => $value):?>
							<a href="<?php echo sh_set( $value, 'social_url' ); ?>" title="<?php echo sh_set( $value, 'title' ); ?>"><i class="fa <?php echo sh_set( $value, 'social_icon' ); ?>"></i></a>
					<?php endforeach; ?>
				</div>
			
		</div>
		<!-- End Slide -->
		<?php endwhile; ?>
	<div class="clear"></div>
	
	</div>
	<!-- End Slider2 -->

</div>
<!-- Our Team Ends -->

<?php endif;?>	

<?php endif; 

$output = ob_get_contents();
ob_end_clean(); ?>
