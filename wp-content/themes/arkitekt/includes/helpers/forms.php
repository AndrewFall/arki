<?php

class SH_Forms
{
	
	function __construct()
	{
		add_shortcode( 'sh_form', array( $this, 'form' ) );
	}
	
	function form( $atts, $content = null )
	{
		extract( shortcode_atts( array(
			'id' => '',
		), $atts ) );
		
		if( !$id ) return;
		
		
		$this->loops = array('select', 'checkbox', 'radio');
		$this->labels = array('select'=>'dropdown', 'checkbox'=>'check', 'radio'=>'radio');
		
		$this->build( $id );
		
	}
	
	private function build( $id )
	{
		$meta = get_post_meta( $id, 'sh_form_settings', true );
		$fields = get_post_meta( $id, 'sh_forms_option', true );
		
		if( !$fields ) return;
		
		$this->fields = sh_set( $fields, 'field' );
		
		do_action( 'sh_form_before_form' );
		
		echo form_open( sh_set( $meta, 'form_action' ), 'method="'.sh_set( $meta, 'form_method', 'post' ).'"' );
		
		foreach( $this->fields as $i => $field )
		{
			//if( $field['type'] != 'select' ) continue;
			
			$this->type = $this->type( sh_set( $field, 'type' ) );
			
			$this->build_field( $field );
		}
		
		echo form_close();
		
		do_action( 'sh_form_after_form' );

	}
	
	function build_field( $field, $label = true, $settings = array() )
	{
		
		//$default = array('name', 'type','settings','class','default','placeholder','id'=>'');
		
		$fiel = $this->parse_field( $field );
		extract( $fiel );
		
		if( $label )
		{
			do_action( 'sh_form_before_label', $field );
			
			echo form_label( $placeholder, $name );
			
			do_action ( 'sh_form_after_label', $field );
		}
		
		$settings['attrs']['class'] = $class;
		
		$default = sh_set( $settings, $name ) ? sh_set( $settings, $name ) : $default;
		
		switch($this->type)
		{
			case "input":
				$html['element'] = form_input(array_merge(array('name'=>$name, 'type' => $type, 'value'=>'','id'=>$id), (array) $settings['attrs']));
			break;
						
			case "dropdown":
				$settings['attrs'] = _parse_form_attributes('', array_merge((array) $settings['attrs'], array('id'=>$name)));
				$html['element'] = form_dropdown($name, $options , _WSH()->validation->set_value($name, $default), $settings['attrs']);
			break;
			
			case "multiselect":
				$size = (count($settings['value']) < 10) ? count($settings['value']) * 20 : 220;
				$settings['attrs'] = array_to_string(array_merge((array) $settings['attrs'], array('id'=>$field, 'style'=>"height:".$size."px;")));
				$html['element'] = form_multiselect($field.'[]', $settings['value'], _WSH()->validation->set_value($field, $default_value), $settings['attrs'] );
			break;
			
			case "textarea":
				$settingsvalue = empty($user_settings[$name]) ? $settings['value'] : $user_settings[$name];
				$html['element'] = form_textarea(array_merge(array('name'=>$name,'value'=>_WSH()->validation->set_value($field, $settingsvalue),'id'=>$name), (array) $settings['attrs']));
			break;
			
			
			case "switch" : 
				$html['element'] = '';
				
				$checked = (sh_set($user_settings, $field) == 'on') ? 'checked="checked"' : '';
				$html['element'] = '<span class="form_style switch"><input type="checkbox" name="'.$field.'" '.$checked.'></span>';

				
			break;
			case 'file':
				$html['element'] = '<span class="file_upload">';
				$html['element'] .= form_input(array_merge(array('name'=>$field,'value'=>$default_value,'id'=>$field), (array) $settings['attrs'])).
									'<input type="file" onchange="this.form.'.$field.'.value = this.value" class="fileUpload" name="'.$field.'_file" id="fileUpload">
									<em>'.__('UPLOAD', THEME_NAME).'</em>';
				$html['element'] .= '</span>';
				$html['preview'] = '';
				if(sh_set($user_settings, $field)) $html['preview'] = sh_set($user_settings, $field);
			break;
			
			case "checkbox":
			case "radio":
				$html['element'] = '<div class="clearfix">';
				foreach($settings['value'] as $key=>$val):
					$html['element'] .= form_radio($field, $key, ($default_value == $key) ? true : '',$settings['attrs']).'<label class="'.$settings['type'].' cont-lable" for="'.$field.'"> '.$val.'</label>'.				
									'';
				endforeach;
			$html['element'] .= '</div>';
			break;
			
			case "colorbox":
				$html['element'] = form_input(array_merge(array('name'=>$field,'value'=>$default_value,'id'=>$field, 'class'=>'nuke-color-field'), (array) $settings['attrs']));
			break;
			
			case "timepicker":
				$html['element'] = form_input(array_merge(array('name'=>$field,'value'=>$default_value,'id'=>$field), (array) $settings['attrs']));
			break;
			
			case "hidden":
				$html['label'] = '';
				$html['element'] = form_input(array_merge(array('type'=>'hidden','name'=>$field,'value'=>$default_value,'id'=>$field), sh_set($settings, 'attrs')));
			break;	
					
		}
		
		do_action( 'sh_form_before_field', $fiel );
		
		echo $html['element'];
		
		do_action( 'sh_form_after_field', $fiel );
	}
	
	/**
	 * return the array to generate form field
	 *
	 */
	private function parse_field( $field )
	{
		$default = array('name', 'type','settings','class','default','placeholder','id');
		
		$new = array();
		
		foreach( $default as $d )
		{
			$new[$d] = sh_set( $field, $d );
		}
		
		$new = $this->options( $new, $field );
		
		return $new;
	}
	
	/**
	 * return options array for select, checkbox and radio button
	 *
	 */
	private function options( $new = array(), $field )
	{
		$type = $new['type'];
		$loop = sh_set( $field, $type.'_value');
		
		if( in_array( $type, $this->loops ) ){
			
			$label = sh_set( $this->labels, $type );
			
			foreach( $loop as $l ){
				$new['options'][sh_set($l, $label.'_value')] = sh_set($l, $label.'_label');
			}
		}
		
		return $new;
	}
	
	private function type( $type )
	{
		$array = array(
		
			'text' => 'input',
			'email' => 'input',
			'url'	  => 'input',
			'select'   => 'dropdown'
		);
		
		return sh_set( $array, $type, $type );
	}
}
