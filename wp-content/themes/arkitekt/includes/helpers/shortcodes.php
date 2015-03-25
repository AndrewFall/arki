<?php

class SH_Shortcodes
{
	protected $keys;
	protected $toggle_count = 0;
	
	function __construct()
	{
		$GLOBALS['sh_toggle_count'] = 0;
		add_action('init', array( $this, 'add' ) );
	}
	
	function add()
	{
		$options = array( 'services','recent_work','testimonials','team','recent_posts','fun_facts','fact','portfolio',
		'what_we_offer','services_blog','portfolio_full','why_choose','contact_info','get_in_touch','blog_posts', 'google_map'
		
		);

		$this->keys = $options;
		
		foreach( $this->keys as $k )
		{
			if( method_exists( $this, $k ) ) add_shortcode( 'sh_'.$k, array( $this, $k ) );
		}
	}
	
	/**
	 * This shortcodes is used on homepage 1 in html version .. it shows services with font awesome icons
	 * with a little descriptions in grid view.
	 */
	function services($atts, $contents = null)
	{
		extract( shortcode_atts( array(
			'num' => 4,
			'orderby' => 'date',
			'order' => 'ASC',
			'cat' => '',

		), $atts ) );
		
		$args = array('post_type' => 'sh_service', 'showposts'=>$num, 'orderby'=>$orderby, 'order'=>$order);
		if( $cat ) $args['tax_query'] = array(array('taxonomy' => 'service_category','field' => 'id','terms' => $cat));
		query_posts($args);
		
		include( get_template_directory().'/includes/modules/shortcodes/service_icon.php');
		
		wp_reset_query() ;
		return $output;
	}
	
	function recent_work($atts, $contents = null)
	{
		extract( shortcode_atts( array(
			'title' => __('Recent Works', SH_NAME),
			'sub_title' => __('some handpicked projects we have done',SH_NAME),		
			'num' => 10,
			'orderby' => 'date',
			'order' => 'ASC',
			'cat' => '',
			
		), $atts ) );
		
		$args = array('post_type' => 'sh_portfolio', 'showposts'=>$num, 'orderby'=>$orderby, 'order'=>$order);
		if( $cat ) $args['tax_query'] = array(array('taxonomy' => 'portfolio_category','field' => 'id','terms' => $cat));
		query_posts($args);
		
		include( get_template_directory().'/includes/modules/shortcodes/recent_work.php');
		
		wp_reset_query() ;
		return $output;
	}
	

	function testimonials($atts, $contents = null)
	{
		extract( shortcode_atts( array(
			'title' => __('testimonials', SH_NAME),
			'sub_title' => __('what clients say about our awesome company',SH_NAME),		
			'num' => 4,
			'orderby' => 'date',
			'order' => 'ASC',
			'cat' => '',
			
		), $atts ) );
		
		$args = array('post_type' => 'sh_testimonial', 'showposts'=>$num, 'orderby'=>$orderby, 'order'=>$order);
		if( $cat ) $args['tax_query'] = array(array('taxonomy' => 'testimonial_category','field' => 'id','terms' => $cat));
		query_posts($args);
		
		include( get_template_directory().'/includes/modules/shortcodes/testimonials.php');
		
		wp_reset_query() ;
		return $output;
	}
	
	function team($atts, $contents = null)
	{
		extract( shortcode_atts( array(
			'title' => __('team', SH_NAME),
			'sub_title' => __('what clients say about our awesome team',SH_NAME),		
			'num' => 4,
			'orderby' => 'date',
			'order' => 'ASC',
			'cat' => '',
			'bg_img' => '',
			'slider' => false,
			
		), $atts ) );
		
		$args = array('post_type' => 'sh_team', 'showposts'=>$num, 'orderby'=>$orderby, 'order'=>$order);
		if( $cat ) $args['tax_query'] = array(array('taxonomy' => 'team_category','field' => 'id','terms' => $cat));
		query_posts($args);
		
		include( get_template_directory().'/includes/modules/shortcodes/teams.php');
		
		wp_reset_query() ;
		return $output;
	}


	function recent_posts($atts, $contents = null)
	{
		extract( shortcode_atts( array(
			'title' => __('recent post title', SH_NAME),
			'sub_title' => __('recent post sub_title',SH_NAME),		
			'num' => 4,
			'orderby' => 'date',
			'order' => 'ASC',
			'cat' => '',
			
		), $atts ) );
		
		$args = array('post_type' => 'post', 'showposts'=>$num, 'orderby'=>$orderby, 'order'=>$order);
		if( $cat ) $args['tax_query'] = array(array('taxonomy' => 'category','field' => 'id','terms' => $cat));
		query_posts($args);
		
	    include( get_template_directory().'/includes/modules/shortcodes/recent_posts.php');
		
		wp_reset_query() ;
		return $output;

	}


	function fun_facts( $atts, $contents = null )
	{
		extract( shortcode_atts( array(
			'title' => __('Some Fun Facts', SH_NAME),
			'desc' => '',	
		), $atts ) );
		
		$output = '
    			<div class="fun-facts mb30">
		 			<h3 class="main-title">'.$title.'</h3>
      				<span class="main-subtitle">'.$desc.'</span>
					<div class="our-services">
        				<div class="wrapper">
          					<div class="dark">'.
								do_shortcode( $contents ).
								'<div class="clear"></div>
							</div>
        				</div>
      				</div>
				</div>';
		
		return $output;		
	}	
	
	
	function fact( $atts, $contents = null )
	{
		extract( shortcode_atts( array(
			'title' => __('Fact', SH_NAME),
			'value' => '',	
			'icon' => '',
		), $atts ) );
		
		
		$output='
            <div class="column3">
              <div class="service-item">
                <i class="fa fa-'.$icon.'"></i>
                <h3>'.$value.'</h3>
                <span>'.$title.'</span>
              </div>
            </div>
					';
		
		return $output;
	}
	
/*--------------portfolio---------------*/
	
	function portfolio($atts, $contents = null)
	{
		extract( shortcode_atts( array(
			'num' => 20,
			'orderby' => 'date',
			'order' => 'ASC',
			
		
		), $atts ) );
		
		$paged = get_query_var('paged');
		$args = array('post_type' => 'sh_portfolio', 'showposts'=>$num, 'orderby'=>$orderby, 'order'=>$order, 'paged'=>$paged);
		if( $cat ) $args['tax_query'] = array(array('taxonomy' => 'portfolio_category','field' => 'id','terms' => $cat));
		query_posts($args);
		
		include( get_template_directory().'/includes/modules/shortcodes/portfolio.php');
		
		wp_reset_query() ;
		return $output;
	}
	
/*--------------portfolio full---------------*/
	
	function portfolio_full($atts, $contents = null)
	{
		extract( shortcode_atts( array(
			'num' => 20,
			'orderby' => 'date',
			'order' => 'ASC',
			
		
		), $atts ) );
		
		$paged = get_query_var('paged');
		$args = array('post_type' => 'sh_portfolio', 'showposts'=>$num, 'orderby'=>$orderby, 'order'=>$order, 'paged'=>$paged);
		if( $cat ) $args['tax_query'] = array(array('taxonomy' => 'portfolio_category','field' => 'id','terms' => $cat));
		query_posts($args);
		
		include( get_template_directory().'/includes/modules/shortcodes/portfolio_full.php');
		
		wp_reset_query() ;
		return $output;
	}
	
//*********************************************************************************


	function what_we_offer($atts, $contents = null)
	{
		extract( shortcode_atts( array(
			'title' => __('Title', SH_NAME),
			'sub_title' => __('SubTitle',SH_NAME),
			'text' => __('Text',SH_NAME),		
			
		), $atts ) );
		
		include( get_template_directory().'/includes/modules/shortcodes/what_we_offer.php');
		
		wp_reset_query() ;
		return $output;
	}
	
	function services_blog($atts, $contents = null)
	{
		extract( shortcode_atts( array(
			'num' => 4,
			'orderby' => 'date',
			'order' => 'ASC',
			'cat' => '',

		), $atts ) );
		
		$args = array('post_type' => 'sh_service', 'showposts'=>$num, 'orderby'=>$orderby, 'order'=>$order);
		if( $cat ) $args['tax_query'] = array(array('taxonomy' => 'service_category','field' => 'id','terms' => $cat));
		query_posts($args);
		
		include( get_template_directory().'/includes/modules/shortcodes/service_blog_icon.php');
		
		wp_reset_query() ;
		return $output;
	}
	
	function why_choose($atts, $contents = null)
	{
		extract( shortcode_atts( array(
			'title' => __('Why Choose Metrical Theme ?', SH_NAME),
			'sub_title' => __('some reasons why you should choose Metrical for your next project',SH_NAME),		
			'num' => 3,
			'orderby' => 'date',
			'order' => 'ASC',
			'cat' => '',
			'img' => '',
			
		
		), $atts ) );
		
		$paged = get_query_var('paged');
		$args = array('post_type' => 'sh_service', 'showposts'=>$num, 'orderby'=>$orderby, 'order'=>$order, 'paged'=>$paged);
		if( $cat ) $args['tax_query'] = array(array('taxonomy' => 'service_category','field' => 'id','terms' => $cat));
		query_posts($args);
		
		include( get_template_directory().'/includes/modules/shortcodes/why_choose.php');
		
		wp_reset_query() ;
		return $output;
	}
	
	function contact_info($atts, $contents = null)
	{
		extract( shortcode_atts( array(
			'title' => __('Contact Info', SH_NAME),
			'sub_title' => __('our email, phone and street address',SH_NAME),
			'text' => '',
			'address' => __('lorem ipsum street', SH_NAME),
			'phone' => __('+399 (500) 321 9548', SH_NAME),
			'email' => __('info@domain.com', SH_NAME),		
		
		), $atts ) );
		
		$output = '
					<div class="contact-info contact-content">
						<h3 class="main-title">'.$title.'</h3>
						<span class="main-subtitle">'.$sub_title.'</span>
						<p>'.$text.'</p>
						<div class="post-meta">
							<div class="post-home">
								<i class="fa fa-home"></i>
									'.$address.'
							</div>
							<div class="post-phone">
								<i class="fa fa-phone"></i>
									'.$phone.'
							</div>
							<div class="post-mail">
								<a href="mailto:'.sanitize_email($email).'"><i class="fa fa-envelope"></i>
									'.$email.'
								</a>
							</div>
						</div>
					</div>';

		wp_reset_query() ;
		return $output;
	}
	
	function get_in_touch($atts, $contents = null)
	{
		extract( shortcode_atts( array(
			'title' => __('Get in touch', SH_NAME),
			'sub_title' => __('send us a message',SH_NAME),
			'email' => '',		
		
		), $atts ) );
		
		$output = '
						<div class="contact-box contact-content">
						  <form id="contact-form" name="contactform"  method="post" action="'. admin_url('admin-ajax.php?action=_sh_ajax_callback&subaction=sh_contact_form_submit').'">
							<h3 class="main-title">'.$title.'</h3>
							<span class="main-subtitle">'.$sub_title.'</span>
								<div id="message2"></div>
							  <div class="dark">
								<div class="text-fields column4">
								  <div class="float-input">
								  	<input name="contact_name" id="contact_name" type="text" placeholder="'.__("Nom" , SH_NAME).'">
									<span><i class="fa fa-user"></i></span>
								  </div>
								  <div class="float-input">
									<input name="contact_email" id="contact_email" type="text" placeholder="'.__("Email", SH_NAME).'">
									<span><i class="fa fa-envelope-o"></i></span>
								  </div>
								  <div class="float-input">
									<input name="contact_website" id="contact_website" type="text" placeholder="'.__("website", SH_NAME).'">
									<span><i class="fa fa-link"></i></span>
								  </div>
								</div>
				
								<div class="submit-area column8">
								  
								  <textarea name="contact_message" id="contact_message" placeholder="'.__("Message", SH_NAME).'"></textarea>
								  <input type="submit" id="submit_contact" class="main-button" value="'.__("Envoyer", SH_NAME).'">
								</div>
							  </div>
						  </form>
						</div>
						<div class="clear"></div>';

		wp_reset_query() ;
		return $output;
	}
	
	
	function google_map( $atts, $contents = null )
	{
		
		extract( shortcode_atts( array(
			'lat' => '40.712785',
			'lang' => '-73.962708',

		), $atts ) );
		
		ob_start();
		include( get_template_directory().'/includes/modules/shortcodes/google_map.php');
		
		return ob_get_clean();
		
	}
	
	function blog_posts($atts, $contents = null)
	{
		extract( shortcode_atts( array(
			'num' => 12,
			'orderby' => 'date',
			'order' => 'ASC',
			'cat' => '',
			
		), $atts ) );
		
		$paged = get_query_var('paged');
		$args = array('post_type' => 'post', 'showposts'=>$num, 'orderby'=>$orderby, 'order'=>$order, 'paged'=>$paged);
		if( $cat ) $args['tax_query'] = array(array('taxonomy' => 'category','field' => 'id','terms' => $cat));
		query_posts($args);
		
		include( get_template_directory().'/includes/modules/shortcodes/blog_posts.php');
		
		wp_reset_query() ;
		return $output;
	}
	


	
	function excerpt( $str, $len = 35 )
	{
		return substr(strip_tags( $str ), 0, $len ).' [..]';
	}

	
}


