<?php


class SH_Base
{
	protected $_cache_group = '';
	protected $_cache = '';
	
	function __construct()
	{
		$this->_cache_group = '_sh_cache_group';
		
		$this->_cache = get_transient($this->_cache_group);
	}
	
	/**
	 * enqueue styles/js for theme page
	 *
	 * @since NHP_Options 1.0
	*/
	function _fields_enqueue($settings = array(), $data){
		
			$element = array();
			if($settings){
				
				foreach( $settings as $fieldk => $field){
					//print_r($field);exit;
					$element[] = $this->_generate_html($fieldk, $field, $data);
					
				}//foreach
			
			}//if fields
			
	
			return $element;
		
	}//function
	
	function _generate_html($name, $field, $settings)
	{
		
		$return = array();
		
		$value = (sh_set( $settings, $name ) ) ? sh_set($settings, $name ) : sh_set( $field, 'std');
		$attributes = $this->__set_attrib(sh_set($field, 'attributes'));
		
		switch( sh_set( $field, 'type' ) )
		{
			case 'select':
				$return['field'] = form_dropdown( $name, sh_set($field, 'options'), $value, $attributes );
			break;
			case 'date':
				$return['field'] = form_input( $name, $value, $attributes );
				$return['field'] .= '<script type="text/javascript">jQuery(document).ready(function($){$(\'input[name="'.$name.'"]\').datepicker();});</script>';   
			break;
		}
		
		$return['title'] = sh_set($field, 'title');
		
		return $return;
	}
	
	
	function __set_attrib( $attr = array() )
	{
		$res = ' ';
		foreach( $attr as $k => $v )
		{
			$res .= $k.'="'.$v.'" ';
		}
		
		return $res;
	}
	
	function option( $key = '' )
	{
		$theme_options = get_option( SH_NAME.'_theme_options' );
		
		if( $key ) return sh_set( $theme_options, $key );
		
		return $theme_options;
	}
	
	function page_template( $tpl )
	{
		$page = get_pages(array('meta_key' => '_wp_page_template','meta_value' => $tpl));
		if($page) return current( (array)$page);
		else return false;
	}
	
	function user_extra( $extras = array() )
	{
		$this->extras = $extras;
		
		add_filter('user_contactmethods', array( $this, 'newuserfilter' ) );

		
	}

	function newuserfilter($old)
	{
		$array = $this->extras;
		
		$new = array_merge($array, $old);
		return $new;
	}

}

$GLOBALS['_sh_base'] = new SH_Base;







