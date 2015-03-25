 <?php $theme_options = _WSH()->option(); ?>

<?php $info_box = sh_set( $theme_options, 'info_box' );
if( $info_box ):
?>
<div class="info-box">
	<a class="info-toggle" href="#"><i class="fa fa-info-circle"></i></a>
	<div class="info-content">
		<ul>
			<?php $info_items = sh_set( sh_set( $theme_options, 'info_items' ), 'info_items' );
				foreach($info_items as $key => $value):?>
					<?php if (sh_set($value,'tocopy')) 
					
			 		continue; ?> 
					<li><i class="fa <?php echo sh_set( $value, 'info_box_icon' ); ?>"></i><?php echo sh_set( $value, 'info_text' ); ?></li>
				<?php endforeach; ?>
		</ul>
	</div>
</div>
<?php endif;?>
<footer>

<?php if(sh_set( $theme_options, 'footer_widget_area' )):?>

<div class="inner-footer">
  <div class="wrapper clearfix">
	<div class="dark">
		
		<div class="column3 message-form">
			<?php dynamic_sidebar('footer-sidebar-1'); ?>
		</div>
		
		<div class="column3 contact">
			<?php dynamic_sidebar('footer-sidebar-2'); ?>
		</div>
		
		<div class="column3 third-row">
			<?php dynamic_sidebar('footer-sidebar-3'); ?>
		</div>
		
		<div class="column3 flickr">
			<?php dynamic_sidebar('footer-sidebar-4'); ?>
		</div>
		

	</div>
	<!-- End Dark -->
  </div>
</div>
<!-- End Inner Footer -->
<?php endif;?>
<div class="last-div clearfix">
  <div class="wrapper">
	<div class="copyright">
	  <?php echo sh_set( $theme_options, 'copyright_text'); ?>
	</div>

	<div id="back-to-top">
	  <a href="#top"><?php _e('Back to Top', SH_NAME); ?></a>
	</div>

	<div class="f-socials">
		
			<?php $socializing = sh_set( sh_set( $theme_options, 'social_icons' ), 'social_icons' );?>
			
			
			<?php if( $socializing ) foreach( $socializing as $social ): ?>
			<?php if (sh_set($social,'tocopy') || !sh_set($social,'icon') ) continue; ?> 
			<a target="_blank" href="<?php echo sh_set( $social, 'link' ); ?>" title="<?php echo sh_set( $social, 'title' ); ?>"><i class="fa <?php echo sh_set( $social, 'icon' ); ?>"></i></a>
			<?php endforeach; ?>
	</div>
	
  </div>
</div>
<!-- End Last Div -->

</footer>
<!--end footer-->

</div>
<!-- /pageWrapper -->
<?php wp_footer(); ?>

  
</body>

</html>
