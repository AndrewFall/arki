<?php

define('SH_NAME', 'wp_arkitekt');
define('SH_VERSION', '1.0');
define('SH_ROOT', get_template_directory().'/');
define('SH_URL', get_template_directory_uri().'/');

include( 'includes/loader.php' );

class SH_Enqueue
{
	var $opt;
	
	function __construct()
	{
		$this->opt = get_option(SH_NAME);
		add_action( 'wp_enqueue_scripts', array( $this, 'sh_enqueue_scripts' ) );
		add_action( 'wp_head', array( $this, 'sh_wp_head' ) );
		add_action( 'wp_footer', array( $this, 'sh_wp_footer' ) );
	
	}

	function sh_enqueue_scripts()
	{

		$protocol = is_ssl() ? 'https' : 'http';

		$styles = array('google_fonts' => $protocol.'://fonts.googleapis.com/css?family=Roboto:400,300,100,500,400italic,300italic,100italic,500italic,700,700italic,900,900italic',
				'google_fonts_2' => $protocol.'://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800','dr-framework' => 'css/dr-framework.css', 'font-awesome'=>'css/font-awesome.css', 'fullwidth'=>'css/fullwidth.css',
				'jquery.bxslider'=>'css/jquery.bxslider.css', 'jquery.fancybox-1.3.4'=>'css/jquery.fancybox-1.3.4.css', 'jquery-ui'=>'css/jquery-ui.css', 'revslider'=>'css/revslider.css', 'style'=>'style.css');

		foreach( $styles as $name => $style )
		{
			if(strstr($style, 'http')) wp_register_style( $name, $style);
			else wp_register_style( $name, SH_URL.$style, '', SH_VERSION);
			
			wp_enqueue_style($name);
		}		
				
		$scripts = array('accordion.js'=>'accordion.js','jquery.imagesloaded.min.js'=>'jquery.imagesloaded.min.js','jquery.isotope.min.js'=>'jquery.isotope.min.js','script.js'=>'script.js','jquery.fancybox-1.3.4.pack.js'=>'jquery.fancybox-1.3.4.pack.js','jquery.superfish.js'=>'jquery.superfish.js','jquery.flexslider.js'=>'jquery.flexslider.js','jquery.bxslider.js'=>'jquery.bxslider.js','twitter.js'=>'twitter.js','jquery.themepunch.plugins.min.js'=>'jquery.themepunch.plugins.min.js','jquery.themepunch.revolution.js'=>'jquery.themepunch.revolution.js','fullwidthbanner.js'=>'fullwidthbanner.js','jquery.carouFredSel-6.2.1-packed.js'=>'jquery.carouFredSel-6.2.1-packed.js','jquery.mousewheel.min.js'=>'jquery.mousewheel.min.js','jquery.touchSwipe.min.js'=>'jquery.touchSwipe.min.js','jflickrfeed.min.js'=>'jflickrfeed.min.js');

		foreach( $scripts as $name => $js )
		{
			wp_register_script( $name, SH_URL.'js/'.$js, '', SH_VERSION, true);
			
		}

		wp_enqueue_script( array('jquery', 'accordion.js', 'jquery.imagesloaded.min.js', 'jquery.isotope.min.js',
						'jquery.fancybox-1.3.4.pack.js', 'jquery.superfish.js', 'jquery.flexslider.js', 'jquery.bxslider.js',
						'twitter_old.js', 'fullwidthbanner.js','jquery.carouFredSel-6.2.1-packed.js','jquery.mousewheel.min.js',
						'jquery.touchSwipe.min.js','jflickrfeed.min.js', 'script.js') );
		
		if( is_singular() ) wp_enqueue_script( array('comment-reply') );
	
	}
	
	function sh_wp_head()
	{
		$opt = _WSH()->option();
		echo '<script type="text/javascript"> if( ajaxurl === undefined ) var ajaxurl = "'.admin_url('admin-ajax.php').'";</script>';?>
		<style type="text/css">
			<?php
			if( sh_set( $opt, 'body_custom_font') )
			echo sh_get_font_settings( array( 'body_font_size' => 'font-size', 'body_font_family' => 'font-family', 'body_font_style' => 'font-style', 'body_font_color' => 'color', 'body_line_height' => 'line-height' ), 'body, p {', '}' );
			
			if( sh_set( $opt, 'use_custom_font' ) ){
			echo sh_get_font_settings( array( 'h1_font_size' => 'font-size', 'h1_font_family' => 'font-family', 'h1_font_style' => 'font-style', 'h1_font_color' => 'color', 'h1_line_height' => 'line-height' ), 'h1 {', '}' );
			echo sh_get_font_settings( array( 'h2_font_size' => 'font-size', 'h2_font_family' => 'font-family', 'h2_font_style' => 'font-style', 'h2_font_color' => 'color', 'h2_line_height' => 'line-height' ), 'h2 {', '}' );
			echo sh_get_font_settings( array( 'h3_font_size' => 'font-size', 'h3_font_family' => 'font-family', 'h3_font_style' => 'font-style', 'h3_font_color' => 'color', 'h3_line_height' => 'line-height' ), 'h3 {', '}' );
			echo sh_get_font_settings( array( 'h4_font_size' => 'font-size', 'h4_font_family' => 'font-family', 'h4_font_style' => 'font-style', 'h4_font_color' => 'color', 'h4_line_height' => 'line-height' ), 'h4 {', '}' );
			echo sh_get_font_settings( array( 'h5_font_size' => 'font-size', 'h5_font_family' => 'font-family', 'h5_font_style' => 'font-style', 'h5_font_color' => 'color', 'h5_line_height' => 'line-height' ), 'h5 {', '}' );
			echo sh_get_font_settings( array( 'h6_font_size' => 'font-size', 'h6_font_family' => 'font-family', 'h6_font_style' => 'font-style', 'h6_font_color' => 'color', 'h6_line_height' => 'line-height' ), 'h6 {', '}' );
			}
			
			echo sh_set( $opt, 'header_css' );
			?>
		</style>
		
		<?php if( sh_set( $opt, 'header_js' ) ): ?>
			<script type="text/javascript">
				<?php echo sh_set( $opt, 'header_js' );?>
			</script>
		<?php endif;?>
		<?php 
	}
	
	function sh_wp_footer()
	{
		$analytics = sh_set( _WSH()->option(), 'footer_analytics');
		
		echo $analytics;
		
		$theme_options = _WSH()->option();
		
		if( sh_set( $theme_options, 'footer_js' ) ): ?>
			<script type="text/javascript">
                <?php echo sh_set( $theme_options, 'footer_js' );?>
            </script>
        <?php endif;
	}
}

new SH_Enqueue;

//End of Enqeue Items
//****************************************************************************************************************************

add_action( 'after_setup_theme', 'sh_after_setup');
//****************************************************************************************************************************
function sh_after_setup()
{
	global $wp_version, $pagenow;

	load_theme_textdomain(SH_NAME, get_template_directory() . '/languages');
	

	//ADD THUMBNAIL SUPPORT
	add_editor_style('css/style.css');
	
	add_theme_support('post-thumbnails');
	add_theme_support('menus'); //Add menu support
	add_theme_support('automatic-feed-links'); //Enables post and comment RSS feed links to head.
	add_theme_support('widgets'); //Add widgets and sidebar support
		
	
	/** Register wp_nav_menus */
	if(function_exists('register_nav_menu'))
	{
		register_nav_menus(
			array(
				/** Register Main Menu location header */
				'main_menu' => __('Main Menu', SH_NAME),
				'footer_menu' => __('Footer Menu', SH_NAME),
			)
		);
	}
	
	if ( ! isset( $content_width ) ) $content_width = 960;
	

	add_image_size( '384x295', 384, 295, true );
	add_image_size( '270x207', 270, 207, true );
	add_image_size( '260x281', 260, 281, true );
	add_image_size( '258x222', 258, 222, true );
	add_image_size( '270x211', 270, 211, true );
	add_image_size( '44x44', 44, 44, true );
	add_image_size( '870x510', 870, 510, true );

}

//*****************************************************************************************************************************

function sh_widget_init()
{
	global $wp_registered_sidebars;

	register_widget('SH_Tabber');
	register_widget('SH_Accordion_Post');
	register_widget('SH_ContactUs');
	register_widget('SH_Recent_Post');
	register_widget('SH_ContactInfo');
	register_widget('SH_Twitter');
	register_widget('SH_NewsLetter');
	register_widget('SH_Flickr');
	
	register_sidebar( array(
		'name' => 'Default Sidebar',
		'id' => 'default-sidebar',
		'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => 'Footer Sidebar Column one',
		'id' => 'footer-sidebar-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	) ); 
	
	register_sidebar( array(
		'name' => 'Footer Sidebar Column two',
		'id' => 'footer-sidebar-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	) ); 
	
	register_sidebar( array(
		'name' => 'Footer Sidebar Column three',
		'id' => 'footer-sidebar-3',
		'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	) ); 
	
	register_sidebar( array(
		'name' => 'Footer Sidebar Column four',
		'id' => 'footer-sidebar-4',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	) ); 
	
	register_sidebar( array(
		'name' => 'Blog Sidebar',
		'id' => 'blog',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '<div class="clear"></div></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => 'Product Sidebar',
		'id' => 'product_sidebar',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '<div class="clear"></div></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	
	$sidebars = sh_set( sh_set( _WSH()->option(), 'sidebar_creator' ), 'sidebar_creator' );
	
	foreach( (array)$sidebars as $sidebar)
	{
	if( !sh_set($sidebar, 'sidebar') || isset( $sidebar['tocopy'] ) ) continue;
	
	register_sidebar( array(
		'name' => sh_set($sidebar, 'sidebar'),
		'id' => bistro_slug( sh_set($sidebar, 'sidebar') ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4>',
		'after_title' => '</h4>',
		) );  
	}
	update_option( 'wp_registered_sidebars', $wp_registered_sidebars);

}

add_action( 'widgets_init', 'sh_widget_init' );


