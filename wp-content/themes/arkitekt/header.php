<!doctype html>

<html <?php language_attributes(); ?>>
	<head> 
		<?php $theme_options = _WSH()->option(); ?>
		
		<meta charset="utf-8">
		<title>
		<?php if(is_home() || is_front_page()) {
		echo get_bloginfo('name').' - '.get_bloginfo('description');
		}
		else{
		wp_title('');
		echo ' - '.get_bloginfo('name'); 
		}?>
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<?php echo ( sh_set( $theme_options, 'favicon' ) ) ? '<link rel="icon" type="image/png" href="'.sh_set( $options, 'favicon' ).'">': '';?>    
		
		  
		<?php wp_head(); ?>
	
	</head>
<?php $boxed = sh_set( $theme_options, 'boxed_version' );
	$boxed = sh_set( $_GET, 'boxed' ) ? true : $boxed; 
	  $dark = sh_set( $theme_options, 'dark_version' );
	  $dark = sh_set( $_GET, 'dark' ) ? true : $dark; 
 ?>


<?php $body_class = '';
$container_class = ( $boxed ) ? ' wrapper' : '';
$body_class .= ( $boxed ) ? ' boxed' : '';
$body_class .= ($dark ) ? ' dark-version' : ''; ?>

<body <?php body_class( $body_class ); ?>>
	
	<div id="container" class="<?php echo $container_class; ?>">

	<header>
	<div class="sub-header clearfix">
		<div class="wrapper">
			<ul>
            
            	<?php if( $policy_page = sh_set( $theme_options, 'policy_page' ) ): ?>
                    <li>
       	<i class="fa fa-caret-square-o-right"></i><a href="<?php echo get_permalink( $policy_page ); ?>">terms & conditions</a>
                    </li>
                <?php endif; ?>
                
               	<?php if( $aboutus_page = sh_set( $theme_options, 'aboutus_page' ) ): ?>
            
				<li>
			<i class="fa fa-caret-square-o-right"></i><a href="<?php echo get_permalink( $aboutus_page ); ?>">about us</a>
            	</li>
                <?php endif; ?>
				
                 <?php if( $login_page = sh_set( $theme_options, 'login_page' ) ): ?>

                <li>
				<i class="fa fa-caret-square-o-right"></i><a href="<?php echo get_permalink( $login_page ); ?>">login</a>
				</li>
                <?php endif; ?>
                
				<?php if( $contactus_page = sh_set( $theme_options, 'contactus_page' ) ): ?>
				<li>
				<i class="fa fa-caret-square-o-right"></i><a href="<?php echo get_permalink( $contactus_page ); ?>">contact us</a>
				</li>
                <?php endif; ?>
			</ul>
			<div class="socials">
            
     			<?php $socializing = sh_set( sh_set( $theme_options, 'social_icons' ), 'social_icons' );?>
				
                <?php if( $socializing ) foreach( $socializing as $social ): ?>
                <?php if (sh_set($social,'tocopy') || !sh_set( $social, 'icon' ) ) continue ?> 
                <a target="_blank" href="<?php echo sh_set( $social, 'link' ); ?>" title="<?php echo sh_set( $social, 'title' ); ?>"><i class="fa <?php echo sh_set( $social, 'icon' ); ?>"></i></a>
              	<?php endforeach; ?>
			</div>
		</div>
	</div>
	<div class="upper-header wrapper">
		<div class="logo">   
                    


                         <?php
							  
							  if( sh_set( $theme_options, 'logo_type' ) == 'text' )
							  {
								  $LogoStyle = sh_get_font_settings( array( 'logo_font_size' => 'font-size', 'logo_font_face' => 'font-family', 'logo_font_style' => 'font-style', 'logo_color' => 'color' ), ' style="', '"' );
								  $Logo = $theme_options['section_custom_logo_text'];
							  }
							  else
							  {
								  $LogoStyle = '';
								  $LogoImageStyle = ( sh_set( $theme_options, 'logo_width' ) || sh_set( $theme_options, 'logo_height' ) ) ? ' style="': '';
								  $LogoImageStyle .= ( sh_set( $theme_options, 'logo_width' ) ) ? ' width:'.sh_set( $theme_options, 'logo_width' ).'px;': '';
								  $LogoImageStyle .= ( sh_set( $theme_options, 'logo_height' ) ) ? ' height:'.sh_set( $theme_options, 'logo_height' ).'px;': '';
								  $LogoImageStyle .= ( sh_set( $theme_options, 'logo_width' ) || sh_set( $theme_options, 'logo_height' ) ) ? '"': '';
								  $Logo = '<img src="'.$theme_options['logo_image'].'" alt=""'.$LogoImageStyle.' />';
							  }
							  ?>
							  
							  <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"<?php echo $LogoStyle;?>><?php echo $Logo;?></a>


		</div>
		<!-- Navigation -->

		<div id="nav">
		   <?php 
		   //for parent & submenu 
		   
		   wp_nav_menu( array( 'theme_location' => 'main_menu' ,
							   'fallback_cb' => false ,
							   'container' => false,
							   'menu_class'=>'sf-menu clearfix sf-js-enabled sf-shadow',
							   'menu_id'=>'navlist',
							   'walker' => new SH_Bootstrap_walker()
							   )); ?>
				
				<!-- Navigation -->
        </div>
		<div class="clear"></div>
		
	</div>
	</header>
	<!--end header-->