<?php

class SH_Ajax
{
	
	function __construct()
	{
		add_action( 'wp_ajax__sh_ajax_callback', array( $this, 'ajax_handler' ) );
		add_action( 'wp_ajax_nopriv__sh_ajax_callback', array( $this, 'ajax_handler' ) );
	}
	
	function ajax_handler()
	{
		$method = sh_set( $_REQUEST, 'subaction' );
		if( method_exists( $this, $method ) ) $this->$method();
		
		exit;
	}
	
	function tweets()
	{
		$cb = new Codebird;
		$method = sh_set( $_POST, 'method' );
		
		$theme_options = _WSH()->option();
		
		$api = sh_set($theme_options, 'api');
		$api_secret = sh_set($theme_options, 'api_secret');
		$token = sh_set($theme_options, 'token');
		$token_secret = sh_set($theme_options, 'token_secret');

		$cb->setConsumerKey($api, $api_secret);

		$cb->setToken($token, $token_secret);
		
		$reply = (array) $cb->statuses_userTimeline(array('count'=>sh_set( $_POST, 'count' ), 'screen_name'=>sh_set($_POST, 'screen_name')));

		if( isset( $reply['httpstatus'] ) ) unset( $reply['httpstatus'] );
		foreach( $reply as $k => $v ){
			//if( $k == 'httpstatus' ) continue;
			$text = preg_replace('@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<a href="$1" target="_blank">$1</a>', sh_set( $v, 'text'));
			echo '<li><span class="content">'.$text.'</span></li>';
		}
	}
	
	
	function sh_contact_form_submit()
	{

		if( !count( $_POST ) ) return;
	
		_load_class( 'validation', 'helpers', true );
		$t = $GLOBALS['_sh_base'];//printr($t);
		$settings = $t->option();
	
		/** set validation rules for contact form */
		$t->validation->set_rules('contact_name','<strong>'.__('Name', SH_NAME).'</strong>', 'required|min_length[4]|max_lenth[30]');
		
		$t->validation->set_rules('contact_email','<strong>'.__('Email', SH_NAME).'</strong>', 'required|valid_email');
		
		$t->validation->set_rules('contact_website','<strong>'.__('Website', SH_NAME).'</strong>', 'numeric');
		
		$t->validation->set_rules('contact_message','<strong>'.__('Message', SH_NAME).'</strong>', 'required|min_length[5]');
		if( sh_set($settings, 'contact_captcha_status'))
		{
			if( sh_set( $_POST, 'contact_captcha') !== sh_set( $_SESSION, 'captcha'))
			{
					$t->validation->_error_array['captcha'] = __('Invalid captcha entered, please try again.', SH_NAME);
			}
	
		}
				
		$messages = '';
		
		if($t->validation->run() !== FALSE && empty($t->validation->_error_array))
		{
			$name = $t->validation->post('content_name');
			$email = $t->validation->post('contact_email');
	
			$message = $t->validation->post('contact_message');
	
			$contact_to = get_option('admin_email');
	
			$headers = 'From: '.$name.' <'.$email.'>' . "\r\n";
			wp_mail($contact_to, __('Contact Us Message', SH_NAME), $message, $headers);
	
			$message = sh_set($settings, 'success_message') ? $settings['success_message'] : sprintf( __('Thank you <strong>%s</strong> for using our Contact form! Your email was successfully sent and we will be in touch with you soon.',SH_NAME), $name);
	
			//$messages = '<div class="alert alert-success">'.__('SUCCESS! ', SH_NAME).$message.'</div>';
			echo "<fieldset class=\"alert alert-success\">";
			echo "<div id='success_page'>";
			echo "<h1>Email Sent Successfully.</h1>";
			echo "<p>Thank you <strong>$name</strong>, your message has been submitted to us.</p>";
			echo "</div>";
			echo "</fieldset>";
			exit;
		
		}else
		{
	
			 if( is_array( $t->validation->_error_array ) )
			 {

				 foreach( $t->validation->_error_array as $msg )
				 {
					 $messages .= '<div class="alert alert-danger"><p>'.__('Error! ', SH_NAME).$msg.'</p></div>';
				 }
			}
	
		}
	
		echo $messages;exit;
		
	}
	
	function download_rating()
	{
		$ip = $_SERVER['REMOTE ADDR'];
		extract( $_POST );
		
		$meta = get_post_meta( $post_id, '_download_rating', true );
		
		if( !sh_set( $meta, $ip ) )
		{
			$meta[$ip] = $value;
			
			update_post_meta( $post_id, '_download_rating', $meta );
			
			echo 'success';exit;
		}
		
		exit( 'failed' );
	}
	
	function wishlist()
	{
		global $current_user;
      	get_currentuserinfo();
			
		if( is_user_logged_in() ){
			
			$meta = (array)get_user_meta( $current_user->ID, '_os_product_wishlist', true );
			$data_id = sh_set( $_POST, 'data_id' );
			if( $meta && is_array( $meta ) ){
				if( in_array( $data_id, $meta ) ){
					exit(json_encode(array('code'=>'exists', 'msg'=>__('You have already added this product to wish list', SH_NAME ) ) ) );
				}
				$newmeta = array_merge( array( sh_set( $_POST, 'data_id' ) ), $meta );
				update_user_meta( $current_user->ID, '_os_product_wishlist', array_unique($newmeta) );
				exit(json_encode(array('code'=>'success', 'msg'=>__('Product successfully added to wishlist', SH_NAME ) ) ) );
			}else{
				//update_user_meta( $current_user->ID, '_os_product_wishlist', array( sh_set( $_POST, 'data_id' ) ) );
				exit(json_encode(array('code'=>'fail', 'msg'=>__('There is an error edding wishlist', SH_NAME ) ) ) );
			}
		}
		else exit(json_encode(array('code'=>'fail', 'msg'=>__('Please login first to add the product to your wishlist', SH_NAME ) ) ) );
	}
	
	function wishlist_del()
	{
		global $current_user;
      	get_currentuserinfo();
			
		if( is_user_logged_in() ){
			
			$meta = get_user_meta( $current_user->ID, '_os_product_wishlist', true );
			$data_id = sh_set( $_POST, 'data_id' );
			//echo array_search( $data_id, $meta );exit;
			if( $meta && is_array( $meta ) ){
				$searched = array_search( $data_id, $meta );
				if( isset($meta[$searched]) ){
					unset( $meta[$searched] );
					update_user_meta( $current_user->ID, '_os_product_wishlist', array_unique($meta) );
					exit(json_encode(array('code'=>'del', 'msg'=>__('Product is successfully deleted from wishlist', SH_NAME ) ) ) );
				}else exit(json_encode(array('code'=>'fail', 'msg'=>__('Unable to find this product into wishlist', SH_NAME ) ) ) );
			}else{
				update_user_meta( $current_user->ID, '_os_product_wishlist', array( sh_set( $_POST, 'data_id' ) ) );
				exit(json_encode(array('code'=>'fail', 'msg'=>__('Unable to retrieve your wishlist', SH_NAME ) ) ) );
			}
		}
		else exit(json_encode(array('code'=>'fail', 'msg'=>__('Please login first to add/delete product in your wishlist', SH_NAME ) ) ) );
	}
	
}