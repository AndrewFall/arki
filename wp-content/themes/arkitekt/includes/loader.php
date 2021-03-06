<?php

include_once('base.php');
add_action( 'init', 'sh_theme_init');

function sh_get_rev_slider()
{
	global $wpdb;
	
	$table = $wpdb->get_results("SHOW TABLES LIKE '".$wpdb->prefix."revslider_sliders'", ARRAY_A);
	if( !$table ) return array();
	
	$res = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."revslider_sliders");

	$return = array();
	
	if( $res ){
		foreach( $res as $r )
		{
			$return[sh_set( $r, 'alias' )] = sh_set( $r, 'title' );
		}
	}
	return $return;
}

function sh_set( $var, $key, $def = '' )
{
	//if( !$var ) return false;

	if( is_object( $var ) && isset( $var->$key ) ) return $var->$key;
	elseif( is_array( $var ) && isset( $var[$key] ) ) return $var[$key];
	elseif( $def ) return $def;
	else return false;
}


function printr($data)
{
	echo '<pre>'; print_r($data);exit;
}


function _font_awesome( $index )
{
	$array = array_values($GLOBALS['_font_awesome']);
	if( $font = sh_set($array, $index )) return $font;
	else return false;
}


function _load_class($class, $directory = 'libraries', $global = true, $prefix = 'SH_')
{
	$obj = &$GLOBALS['_sh_base'];
	$obj = is_object( $obj ) ? $obj : new stdClass;

	$name = FALSE;

	// Is the request a class extension?  If so we load it too
	$path = SH_ROOT.'includes/'.$directory.'/'.$class.'.php';
	if( file_exists($path) )
	{
		$name = $prefix.ucwords( $class );

		if (class_exists($name) === FALSE)	require($path);
	}

	// Did we find the class?
	if ($name === FALSE) exit('Unable to locate the specified class: '.$class.'.php');

	if( $global ) $GLOBALS['_sh_base']->$class = new $name();
	else new $name();
}
include_once('library/form_helper.php');
include_once('library/functions.php');
include_once('library/widgets.php');
include_once('helpers/codebird.php');

_load_class( 'post_types', 'helpers', false );
_load_class( 'taxonomies', 'helpers', false );
_load_class( 'ajax', 'helpers', false );
_load_class( 'forms', 'helpers', false );
_load_class( 'validation', 'helpers', true );

_load_class( 'shortcodes', 'helpers', false );
_load_class( 'bootstrap_walker', 'helpers', false );

if( sh_set( $_GET, 'sh_shortcode_editor_action' ) ) {
	include_once('resource/shortcode_output.php');exit;
}

/**
 * Include Vafpress Framework
 */
require_once 'vafpress/bootstrap.php';

/**
 * Include Custom Data Sources
 */
require_once 'vafpress/admin/data_sources.php';

/**
 * Load options, metaboxes, and shortcode generator array templates.
 */
// metaboxes
$tmpl_mb1  = include get_template_directory() . '/includes/vafpress/admin/metabox/meta_boxes.php';
// * Create instances of Metaboxes
foreach( $tmpl_mb1 as $tmb )  new VP_Metabox($tmb);

// shortocode generators
$tmpl_sg1  = get_template_directory() . '/includes/vafpress/admin/shortcode_generator/shortcodes1.php';
$tmpl_sg2  = get_template_directory() . '/includes/vafpress/admin/shortcode_generator/shortcodes2.php';

if( is_admin() )
/** Plugin Activation */
require_once(get_template_directory().DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'thirdparty'.DIRECTORY_SEPARATOR.'tgm-plugin-activation'.DIRECTORY_SEPARATOR.'plugins.php');

function sh_theme_init()
{
	
	global $pagenow;

	if( is_admin() ) {
		
		
		if( sh_set( $_GET, 'page' ) == SH_NAME.'_options' ) 
		{
			if( sh_set( $_GET, 'option_export' ) ){
				include_once( 'helpers/backup_class.php' );
				$backup = new SH_Backup_class;
				$backup->export();
			}
			
			if( sh_set( $_GET, 'option_import' ) ){ 
				include_once( 'helpers/backup_class.php' );
				$backup = new SH_Backup_class;
				$backup->import();
			}
			
		}
	}	
	
	if( function_exists( 'vc_map' )) 
	include_once( 'vc_map.php' );
	
	// options
	$tmpl_opt  = get_template_directory() . '/includes/vafpress/admin/option/option.php';
	
	
	/**
	 * Create instance of Options
	 */
	$theme_options = new VP_Option(array(
		'is_dev_mode'           => false,                                  // dev mode, default to false
		'option_key'            => SH_NAME.'_theme_options',                      // options key in db, required
		'page_slug'             => SH_NAME.'_option',                      // options page slug, required
		'template'              => $tmpl_opt,                              // template file path or array, required
		'menu_page'             => 'themes.php',                           // parent menu slug or supply `array` (can contains 'icon_url' & 'position') for top level menu
		'use_auto_group_naming' => true,                                   // default to true
		'use_util_menu'         => true,                                   // default to true, shows utility menu
		'minimum_role'          => 'edit_theme_options',                   // default to 'edit_theme_options'
		'layout'                => 'fluid',                                // fluid or fixed, default to fixed
		'page_title'            => __( 'Theme Options', SH_NAME ), // page title
		'menu_label'            => __( 'Theme Options', SH_NAME ), // menu label
	));
	
		_WSH()->user_extra( array('facebook'=>__('Facebook', SH_NAME), 'twitter'=>__('Twitter', SH_NAME), 'dribbble'=>__('Dribble', SH_NAME), 'github'=>__('Github', SH_NAME),
	'flickr'=>__('Flickr', SH_NAME), 'google-plus'=>__('Google+', SH_NAME), 'youtube'=>__('Youtube', SH_NAME)) );
}


include_once( 'vp_new/loader.php' );


$sh_exlude_hooks = include_once( 'resource/remove_action.php' );

foreach( $sh_exlude_hooks as $k => $v )
{
	foreach( $v as $value )
	remove_action( $k, $value[0], $value[1] );
}