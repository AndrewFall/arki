<?php

function _WSH()
{
	return $GLOBALS['_sh_base'];
}

/** A function to fetch the categories from wordpress */
function sh_get_categories($arg = false, $by_slug = false)
{
	global $wp_taxonomies;
	if( ! empty($arg['taxonomy']) && ! isset($wp_taxonomies[$arg['taxonomy']]))
	{
		register_taxonomy( $arg['taxonomy'], 'sh_'.$arg['taxonomy']);
	}
	
	$categories = get_categories($arg);
	$cats = array();
	
	foreach($categories as $category)
	{
		if( $by_slug ) $cats[$category->slug] = $category->name;
		else $cats[$category->term_id] = $category->name;
	}
	return $cats;
}

if( !function_exists( 'sh_slug' ) )
{
	function sh_slug( $string )
	{
		$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
		return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	}
}

function sh_font_awesome( $code = false )
{
	$pattern = '/\.(fa-(?:\w+(?:-)?)+):before\s+{\s*content:\s*"(.+)";\s+}/';
	$subject = @file_get_contents(get_template_directory().'/css/font-awesome.css');

	if( !$subject ) return array();
	
	preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER);

	$icons = array();

	foreach($matches as $match){
		$value = str_replace( 'icon-', '', $match[1] );
		$newcode = str_replace('fa-', '', $match[1]);
		
		if( $code ) $icons[$match[1]] = stripslashes($match[2]);
		else $icons[$newcode] = ucwords(str_replace('-', ' ', $newcode));//$match[2];
	}
	
	return $icons;
}


function sh_get_sidebars($multi = false)
{
	global $wp_registered_sidebars;

	$sidebars = !($wp_registered_sidebars) ? get_option('wp_registered_sidebars') : $wp_registered_sidebars;

	if( $multi ) $data[] = array('value'=>'', 'label' => 'No Sidebar');
	else $data = array('' => __('No Sidebar', SH_NAME));
	foreach( (array)$sidebars as $sidebar)
	{
		if( $multi ) $data[] = array( 'value'=> sh_set($sidebar, 'id'), 'label' => sh_set( $sidebar, 'name') );
		else $data[sh_set($sidebar, 'id')] = sh_set($sidebar, 'name');
	}

	return $data;
}

if ( ! function_exists('character_limiter'))
{
	function character_limiter($str, $n = 500, $end_char = '&#8230;', $allowed_tags = false)
	{
		if($allowed_tags) $str = strip_tags($str, $allowed_tags);
		if (strlen($str) < $n)	return $str;
		$str = preg_replace("/\s+/", ' ', str_replace(array("\r\n", "\r", "\n"), ' ', $str));

		if (strlen($str) <= $n) return $str;

		$out = "";
		foreach (explode(' ', trim($str)) as $val)
		{
			$out .= $val.' ';
			
			if (strlen($out) >= $n)
			{
				$out = trim($out);
				return ( strlen($out ) == strlen($str)) ? $out : $out.$end_char;
			}		
		}
	}
}


function sh_get_social_icons()
{
	$t = $GLOBALS['_sh_base'];
	$options = $t->option('social_icons');//printr($options);
	
	$output = '';
	
	if( sh_set( $options, 'social_icons' ) && is_array( sh_set( $options, 'social_icons' ) ) )
	{
		foreach( sh_set( $options, 'social_icons' ) as $social_icon ){
			if( isset( $social_icon['tocopy' ] ) ) continue;
			$output .= '<a title="" data-original-title="'.sh_set( $social_icon, 'title').'" data-placement="bottom" data-toggle="tooltip" href="'.sh_set( $social_icon, 'link').'"><i class="fa '.sh_set( $social_icon, 'icon').'"></i></a>'."\n";
		}
	}
	
	return $output;
}


function sh_get_posts_array( $post_type = 'post', $flip = false )
{
	global $wpdb;

	$res = $wpdb->get_results( "SELECT `ID`, `post_title` FROM `" .$wpdb->prefix. "posts` WHERE `post_type` = '$post_type' AND `post_status` = 'publish' ", ARRAY_A );
	
	$return = array();
	foreach( $res as $k => $r) {
		if( $flip ) {
			if( isset( $return[sh_set($r, 'post_title')] ) ) $return[sh_set($r, 'post_title').$k] = sh_set($r, 'ID');
			else $return[sh_set($r, 'post_title')] = sh_set( $r, 'ID' );
		}
		else $return[sh_set($r, 'ID')] = sh_set($r, 'post_title');
	}

	return $return;
}


function get_the_breadcrumb()
{
	global $wp_query;
	$queried_object = get_queried_object();
	
	$breadcrumb = '';
	$delimiter = '';
	$before = '<li>';
	$after = '</li>';

	if ( ! is_home())
	{
		$breadcrumb .= '<li><a href="'.home_url().'">'.__('Accueil', SH_NAME).'</a></li>';
		
		/** If category or single post */
		if(is_category())
		{
			$cat_obj = $wp_query->get_queried_object();
			$this_category = get_category( $cat_obj->term_id );
	
			if ( $this_category->parent != 0 ) {
				$parent_category = get_category( $this_category->parent );
				$breadcrumb .= $before . get_category_parents($parent_category, TRUE, $delimiter ) . $after;
			}
			
			$breadcrumb .=  single_cat_title('', FALSE);
		}
		elseif(is_tax())
		{
			$breadcrumb .= $queried_object->name;
		}
		elseif(is_page()) /** If WP pages */
		{
			global $post;
			if($post->post_parent)
			{
                $anc = get_post_ancestors($post->ID);
                foreach($anc as $ancestor)
				{
                    $breadcrumb .= $before . '<a href="'.get_permalink($ancestor).'">'.get_the_title($ancestor).'</a>' . $after;
                }
				$breadcrumb .= get_the_title($post->ID);
				
            }else $breadcrumb .= get_the_title();
		}
		elseif (is_singular())
		{
			if($category = wp_get_object_terms(get_the_ID(), array('category', 'portfolio_category')))
			{
				if( !is_wp_error($category) )
				{
					$breadcrumb .= '<li><a href="'.get_term_link(sh_set($category, '0')).'">'.sh_set( sh_set($category, '0'), 'name').'</a></li>';
					$breadcrumb .= get_the_title();
				}
			}else{
				$breadcrumb .= get_the_title();
			}
		}
		elseif(is_tag()) $breadcrumb .= single_tag_title('', FALSE); /**If tag template*/
		elseif(is_day()) $breadcrumb .= __('Archive for ', SH_NAME).get_the_time('F jS, Y'); /** If daily Archives */
		elseif(is_month()) $breadcrumb .= __('Archive for ', SH_NAME).get_the_time('F, Y'); /** If montly Archives */
		elseif(is_year()) $breadcrumb .= __('Archive for ', SH_NAME).get_the_time('Y'); /** If year Archives */
		elseif(is_author()) $breadcrumb .= __('Archive for ', SH_NAME).get_the_author(); /** If author Archives */
		elseif(is_search()) $breadcrumb .= __('Search Results for ', SH_NAME).get_search_query(); /** if search template */
		elseif(is_404()) $breadcrumb .= __('404 - Not Found', SH_NAME); /** if search template */
		elseif ( is_post_type_archive('product') ) 
		{
			
			$shop_page_id = woocommerce_get_page_id( 'shop' );
			if( get_option('page_on_front') !== $shop_page_id  )
			{
				$shop_page    = get_post( $shop_page_id );
				
				$_name = woocommerce_get_page_id( 'shop' ) ? get_the_title( woocommerce_get_page_id( 'shop' ) ) : '';
		
				if ( ! $_name ) {
					$product_post_type = get_post_type_object( 'product' );
					$_name = $product_post_type->labels->singular_name;
				}
		
				if ( is_search() ) {
		
					$breadcrumb .= $before . '<a href="' . get_post_type_archive_link('product') . '">' . $_name . '</a>' . $delimiter . __( 'Search results for &ldquo;', 'woocommerce' ) . get_search_query() . '&rdquo;' . $after;
		
				} elseif ( is_paged() ) {
		
					$breadcrumb .= $before . '<a href="' . get_post_type_archive_link('product') . '">' . $_name . '</a>' . $after;
		
				} else {
		
					$breadcrumb .= $before . $_name . $after;
		
				}
			}
	
		}
		else $breadcrumb .= get_the_title(); /** Default value */
	}

	return '<ul class="breadcrumb">'.$breadcrumb.'</ul>';
}



function sh_register_user( $data )
{
	//printr($data);
	$user_name = sh_set( $data, 'user_login' );
	$user_email = sh_set( $data, 'user_email' );
	$user_pass = sh_set( $data, 'user_password' );
	$policy = sh_set( $data, 'policy_agreed');
	
	$user_id = username_exists( $user_name );
	$message = '<div class="alert-error" style="margin-bottom:10px;padding:10px"><h5>'.__('You must agreed the policy', SH_NAME).'</h5></div>';;
	if( !$policy ) $message = '';
	if ( !$user_id && email_exists($user_email) == false ) {

		if( $policy ){

			$random_password = ( $user_pass ) ? $user_pass : wp_generate_password( $length=12, $include_standard_special_chars=false );
			$user_id = wp_create_user( $user_name, $random_password, $user_email );
			if ( is_wp_error($user_id) && is_array( $user_id->get_error_messages() ) ) 
			{
				foreach($user_id->get_error_messages() as $message)	$message .= '<div class="alert-error" style="margin-bottom:10px;padding:10px"><h5>'.$message.'</h5></div>';
			}
			else $message = '<div class="alert-success" style="margin-bottom:10px;padding:10px"><h5>'.__('Registration Successful - An email is sent', SH_NAME).'</h5></div>';
		}
		
	} else {
		$message .= '<div class="alert-error" style="margin-bottom:10px;padding:10px"><h5>'.__('Username or email already exists.  Password inherited.', SH_NAME).'</h5></div>';
	}

	return $message;
}




function sh_comments_list($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment; ?>
    
    <li>
    
    <div class="comment-box" id="comment-<?php echo comment_ID(); ?>">
        <?php echo get_avatar( $comment, 80 ); ?>
        
        <div class="comment-content" >
        	<h6 class="">
            	<?php echo get_comment_author_link(); ?>
				<span>
					  / <?php echo get_comment_date(); ?>
                </span>
				
            </h6>
			<span class="comment-reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>            
            <div class="comments_text">
			<?php comment_text(); /** print our comment text */ ?> 
			</div>
		</div>  
	</div>

	<?php
	//endif;
}



/**
 * returns the formatted form of the comments
 *
 * @param	array	$args		an array of arguments to be filtered
 * @param	int		$post_id	if form is called within the loop then post_id is optional
 *
 * @return	string	Return the comment form
 */
function sh_comment_form( $args = array(), $post_id = null, $review = false )
{
	if ( null === $post_id )
		$post_id = get_the_ID();
	else
		$id = $post_id;

	$commenter = wp_get_current_commenter();
	$user = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';

	$args = wp_parse_args( $args );
	if ( ! isset( $args['format'] ) )
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';

	$req      = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$html5    = 'html5' === $args['format'];
	$fields   =  array(
		'author' => '<input id="author" placeholder="'. __( 'Name', SH_NAME ).'" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /><span><i class="fa fa-user"></i></span>',
		'email'  => '<input id="email" placeholder="'. __( 'Email', SH_NAME ).'" class="form-control" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /><span><i class="fa fa-envelope-o"></i></span>',
		'url'    => '<input id="url" placeholder="'. __( 'URL', SH_NAME ).'" class="form-control" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /><span><i class="fa fa-link"></i></span>',
	);

	$required_text = sprintf( ' ' . __('Required fields are marked %s', SH_NAME), '<span class="required">*</span>' );

	/**
	 * Filter the default comment form fields.
	 *
	 * @since 3.0.0
	 *
	 * @param array $fields The default comment fields.
	 */
	$fields = apply_filters( 'comment_form_default_fields', $fields );
	$defaults = array(
		'fields'               => $fields,
		'comment_field'        => '<textarea id="comment" placeholder="'. __( 'Comment', SH_NAME ).'" class="form-control" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
		'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', SH_NAME ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', SH_NAME ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published.', SH_NAME ) . ( $req ? $required_text : '' ) . '</p>',
		'comment_notes_after'  => '<p class="form-allowed-tags">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', SH_NAME ), ' <code>' . allowed_tags() . '</code>' ) . '</p>',
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'title_reply'          => __( 'Leave a Reply', SH_NAME ),
		'title_reply_to'       => __( 'Leave a Reply to %s', SH_NAME ),
		'cancel_reply_link'    => __( 'Cancel reply', SH_NAME ),
		'label_submit'         => __( 'Post Comment', SH_NAME ),
		'format'               => 'xhtml',
	);

	/**
	 * Filter the comment form default arguments.
	 *
	 * Use 'comment_form_default_fields' to filter the comment fields.
	 *
	 * @since 3.0.0
	 *
	 * @param array $defaults The default comment form arguments.
	 */
	$args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );

	?>
		<?php if ( comments_open( $post_id ) ) : ?>
			<?php
			/**
			 * Fires before the comment form.
			 *
			 * @since 3.0.0
			 */
			do_action( 'comment_form_before' );
			?>
			<div id="respond" class="comment-respond">
				<h1 id="reply-title" class="title"><?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?> <small><?php cancel_comment_reply_link( $args['cancel_reply_link'] ); ?></small></h1>
				<?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
					<?php echo $args['must_log_in']; ?>
					<?php
					/**
					 * Fires after the HTML-formatted 'must log in after' message in the comment form.
					 *
					 * @since 3.0.0
					 */
					do_action( 'comment_form_must_log_in_after' );
					?>
				<?php else : ?>
					<form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>" class="comment-form"<?php echo $html5 ? ' novalidate' : ''; ?>>
						<?php
						/**
						 * Fires at the top of the comment form, inside the <form> tag.
						 *
						 * @since 3.0.0
						 */
						do_action( 'comment_form_top' );
						?>
						<?php if ( is_user_logged_in() ) : ?>
							<?php
							/**
							 * Filter the 'logged in' message for the comment form for display.
							 *
							 * @since 3.0.0
							 *
							 * @param string $args['logged_in_as'] The logged-in-as HTML-formatted message.
							 * @param array  $commenter            An array containing the comment author's username, email, and URL.
							 * @param string $user_identity        If the commenter is a registered user, the display name, blank otherwise.
							 */
							echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity );
							?>
							<?php
							/**
							 * Fires after the is_user_logged_in() check in the comment form.
							 *
							 * @since 3.0.0
							 *
							 * @param array  $commenter     An array containing the comment author's username, email, and URL.
							 * @param string $user_identity If the commenter is a registered user, the display name, blank otherwise.
							 */
							do_action( 'comment_form_logged_in_after', $commenter, $user_identity );
							?>
						<?php else : ?>
							<?php echo $args['comment_notes_before']; ?>
							<div class="text-fields1">
							<?php
							/**
							 * Fires before the comment fields in the comment form.
							 *
							 * @since 3.0.0
							 */
							do_action( 'comment_form_before_fields' );
							foreach ( (array) $args['fields'] as $name => $field ) {
								/**
								 * Filter a comment form field for display.
								 *
								 * The dynamic portion of the filter hook, $name, refers to the name
								 * of the comment form field. Such as 'author', 'email', or 'url'.
								 *
								 * @since 3.0.0
								 *
								 * @param string $field The HTML-formatted output of the comment form field.
								 */
								 echo '<div class="float-input1">';
								echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";
								echo '</div>';
							}
							/**
							 * Fires after the comment fields in the comment form.
							 *
							 * @since 3.0.0
							 */
							do_action( 'comment_form_after_fields' );
							?>
							</div>
						<?php endif; ?>
						
						<div class="<?php echo is_user_logged_in() ? 'column12 no-margin' : 'submit-area1'; ?>">
						<?php
						/**
						 * Filter the content of the comment textarea field for display.
						 *
						 * @since 3.0.0
						 *
						 * @param string $args['comment_field'] The content of the comment textarea field.
						 */
						echo apply_filters( 'comment_form_field_comment', $args['comment_field'] );
						?>
						
						<?php echo $args['comment_notes_after']; ?>
						
						<p class="form-submit">
							<input name="submit" type="submit" class="main-button" id="<?php echo esc_attr( $args['id_submit'] ); ?>" value="<?php echo esc_attr( $args['label_submit'] ); ?>" />
							<?php comment_id_fields( $post_id ); ?>
						</p>
						</div>
						<?php
						/**
						 * Fires at the bottom of the comment form, inside the closing </form> tag.
						 *
						 * @since 1.5.2
						 *
						 * @param int $post_id The post ID.
						 */
						do_action( 'comment_form', $post_id );
						?>
					</form>
				<?php endif; ?>
			</div><!-- #respond -->
			<?php
			/**
			 * Fires after the comment form.
			 *
			 * @since 3.0.0
			 */
			do_action( 'comment_form_after' );
		else :
			/**
			 * Fires after the comment form if comments are closed.
			 *
			 * @since 3.0.0
			 */
			do_action( 'comment_form_comments_closed' );
		endif;
}


function sh_team_listing( $query )
{

	while( $query->have_posts() ): $query->the_post(); ?>
        <div class="span3">
            <div class="team-member vcard"> 
            	<?php if( has_post_thumbnail() ) the_post_thumbnail(array(500, 300), array('class'=>'photo') ); ?>
                
                <h4 class="fn"><?php the_title(); ?></h4>
                <ul class="social-links">
                	<?php $settings = get_post_meta( get_the_ID(), '_bistro_bistro_team_settings', true); ?>
                    <?php if( sh_set( $settings, 'twitter') ): ?>
                    	<li><a href="<?php echo sh_set( $settings, 'twitter'); ?>" class="url"><i class="icon-fixed-width icon-twitter"></i><span class="visuallyhidden">Twitter</span></a></li>
                    <?php endif; ?>
                    <?php if( sh_set( $settings, 'facebook') ): ?>
                    	<li><a href="<?php echo sh_set( $settings, 'facebook'); ?>" class="url"><i class="icon-fixed-width icon-facebook"></i><span class="visuallyhidden">Facebook</span></a></li>
                    <?php endif; ?>
                    <?php if( sh_set( $settings, 'google_plus') ): ?>
                    	<li><a href="<?php echo sh_set( $settings, 'google_plus'); ?>" class="url"><i class="icon-fixed-width icon-google-plus"></i><span class="visuallyhidden">Google Plus</span></a></li>
                    <?php endif; ?>
                </ul>

                <?php if( sh_set( $settings, 'designation') ): ?>
                	<span class="title">Founder</span>
                <?php endif; ?>
                <?php echo character_limiter( get_the_excerpt(), 150 ); ?>
            </div>
        </div>
        <!-- .span3 -->
    <?php endwhile;
}



function sh_contact_form_submit()
{
	if( !count( $_POST ) ) return;
	
	
	_load_class( 'validation', 'helpers', true );
	$t = &$GLOBALS['_sh_base'];//printr($t);
	$settings = get_option('wp_bistro');

	/** set validation rules for contact form */
	$t->validation->set_rules('contact_name','<strong>'.__('Namcontact_messagee', SH_NAME).'</strong>', 'required|min_length[4]|max_lenth[30]');
	$t->validation->set_rules('contact_email','<strong>'.__('Email', SH_NAME).'</strong>', 'required|valid_email');
	$t->validation->set_rules('contact_message','<strong>'.__('Message', SH_NAME).'</strong>', 'required|min_length[5]');
	if( sh_set($settings, 'captcha_status') == 'on')
	{
		if( sh_set( $_POST, 'contact_captcha') !== sh_set( $_SESSION, 'captcha'))
		{
			$t->validation->_error_array['captcha'] = __('Invalid captcha entered, please try again.', SH_NAME);
		}
	}
	
	$messages = '';
	
	if($t->validation->run() !== FALSE && empty($t->validation->_error_array))
	{
		
		$name = $t->validation->post('contact_name');
		$email = $t->validation->post('contact_email');
		$website = $t->validation->post('contact_website');
		$message = $t->validation->post('contact_message');
		$message.= "URL:".$website;
		$contact_to = get_option('admin_email');
		
		$headers = 'From: '.$name.' <'.$email.'>' . "\r\n";
		wp_mail($contact_to, __('Contact Us Message', SH_NAME), $message, $headers);
		
		$message = sh_set($settings, 'success_message') ? $settings['success_message'] : sprintf( __('Thank you <strong>%s</strong> for using our contact form! Your email was successfully sent and we will be in touch with you soon.',SH_NAME), $name);

		$messages = '<div class="alert alert-success">
						<p class="title">'.__('SUCCESS! ', SH_NAME).$message.'</p>
					</div>';
							
	}else
	{
		 if( is_array( $t->validation->_error_array ) )
		 {
			 foreach( $t->validation->_error_array as $msg )
			 {
				 $messages .= '<div class="alert alert-error">
									<p class="title">'.__('Error! ', SH_NAME).$msg.'</p>
								</div>';
			 }
		 }
	}
	
	return $messages;
}


function sh_blog_excerpt_more( $more ) {
	return '';
}
add_filter('excerpt_more', 'sh_blog_excerpt_more');



function _the_pagination($args = array(), $echo = 1)
{
	
	global $wp_query;
	
	$default =  array('base' => str_replace( 99999, '%#%', esc_url( get_pagenum_link( 99999 ) ) ), 'format' => '?paged=%#%', 'current' => max( 1, get_query_var('paged') ),
						'total' => $wp_query->max_num_pages, 'next_text' => '&raquo;', 'prev_text' => '&laquo;', 'type'=>'list');
						
	$args = wp_parse_args($args, $default);			
	
	$pagination = '<div class="text-center pagination">'.paginate_links($args).'</div>';
	
	if(paginate_links(array_merge(array('type'=>'array'),$args)))
	{
		if($echo) echo $pagination;
		return $pagination;
	}
}

function sh_get_post_format_output($settings = array())
{
	global $post;
	
	if( ! $settings ) return;
	
	$format = get_post_format();
	
	$output = '';
	
	switch( $format )
	{
		case 'standard':
		case 'image':
			$output = get_the_post_thumbnail(get_the_id(), '1750x1143');
		break;
		case 'gallery':
			
			$attachments = get_posts( 'post_type=attachment&post_parent='.get_the_id() );
			if( $attachments ){
				$output = '<div id="myCarousel" class="carousel slide">
                           		<div class="carousel-inner">';
				foreach( $attachments as $k=>$att ){
					$active = ( $k == 0 ) ? ' active' : '';
					$output .= '
                        <div class="item'.$active.'">
                          '.wp_get_attachment_image( $att->ID, 'full').'
                        </div>';
				}
				$output .= '</div>
					<a class="left carousel-control" href="#myCarousel" data-slide="prev">
						<span class="icon-prev"></span>
					</a>
					<a class="right carousel-control" href="#myCarousel" data-slide="next">
						<span class="icon-next"></span>  
					</a>
				</div>';
			}
		break;
		case 'video':
			$output = '<div class="js-video [vimeo, widescreen]">'.sh_set( $settings, 'video').'</div>';
		break;
		case 'audio':
			$output = '<div class="js-video [vimeo, widescreen]">'.sh_set( $settings, 'audio').'</div>';
		break;
		case 'quoted':
		case 'link':
			
		break;
		default:
			$output = get_the_post_thumbnail(get_the_id(), '1750x1143');
		break;
	}
	
	return $output;
}

function sh_theme_color_scheme()
{
	$dir = get_template_directory();
	include_once($dir.'/includes/thirdparty/lessc.inc.php');
	$styles = _WSH()->option('color_scheme');
	$transient = get_transient( '_sh_color_scheme' );

	$update = ( $styles != $transient ) ? true : false;

	if( !$update ) return;

	set_transient( '_sh_color_scheme', $styles, DAY_IN_SECONDS );
	
	$less = new lessc;

	$less->setVariables(array(
	  "sh_color" => $styles,
	));
	
	// create a new cache object, and compile
	$cache = $less->cachedCompile($dir."/css/color.less");

	file_put_contents($dir.'/css/colors.css', $cache["compiled"]);
	
}


function sh_get_font_settings( $FontSettings = array(), $StyleBefore = '', $StyleAfter = '' )
{
	$i = 1;
	$settings = _WSH()->option();
	$Style = '';
	foreach( $FontSettings as $k => $v )
	{
		if( $i == 1 || $i == 5 )
		{
			$Style .= ( sh_set( $settings, $k )  ) ? $v.':'.sh_set( $settings, $k ).'px;': '';
		}
		else
		{
			$Style .= ( sh_set( $settings, $k  )  ) ? $v.':'.sh_set( $settings, $k ).';': '';
		}
		$i++;
	}
	return ( !empty( $Style ) ) ? $StyleBefore.$Style.$StyleAfter: '';
}

function sh_posts_by_year() 
{
	  $years = array();
	
	  $posts = get_posts(array(
		'numberposts' => -1,
		'orderby' => 'post_date',
		'order' => 'ASC',
		'post_type' => 'post',
		'post_status' => 'publish'
	  ));

	  foreach($posts as $post) {
		$years[date('Y', strtotime($post->post_date))][] = $post;
	  }
	
	  krsort($years);
	
	  return $years;
}


function sh_register_dynamic_sidebar()
{
	$theme_options = get_option( SH_NAME.'_theme_options');
	$sidebars = sh_set( sh_set( $theme_options, 'dynamic_sidebar' ), 'dynamic_sidebar' );

	if( $sidebars && is_array( $sidebars ) )
	{
		foreach( $sidebars as $sidebar ){
			
			if( isset( $sidebar['tocopy'] ) ) continue;
			
			register_sidebar( array(
				'name' => $sidebar['sidebar_name'],
				'id' => sh_slug( $sidebar['sidebar_name'] ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => "</div>",
				'before_title' => '<h4 class="title"><span>',
				'after_title' => '</span></h4>',
			) );
		}
	}
}

function get_gravatar_url( $email ) {

    $hash = md5( strtolower( trim ( $email ) ) );
    return 'http://gravatar.com/avatar/' . $hash;
}


function _sh_star_rating( $dis = false )
{
	$ip = $_SERVER['REMOTE_ADDR'];
	
	$meta = get_post_meta( get_the_id(), '_download_rating', true );
	
	$count = count( $meta ) ? count( $meta ) : 1;
	
	$titles = array( __('Poor', SH_NAME), __('Satisfactory', SH_NAME), __('Good', SH_NAME), __('Better', SH_NAME), __('Awesome', SH_NAME) );
	
	$evg = array_sum((array)$meta) / $count;
	
	if( $dis )
	{
		foreach( array_reverse( range( 0, 4 ) ) as $rang )
		{
			$checked = ( ( $rang + 1 ) <= round( $evg ) ) ? 'fa-star' : 'fa-star-o';
			echo '<i class="fa '.$checked.'" title="'.$titles[$rang].'" data-post-id="'.get_the_ID().'"/></i>'."\n";
		}
	}
	else
	{
		$disabled = isset( $meta[$ip] ) ? ' disabled="disabled"' : '';
		echo '<div class="clearfix center">'."\n";
		foreach( range( 0, 4 ) as $rang )
		{
			$checked = ( ( $rang + 1 ) == round( $evg ) ) ? ' checked="checked"' : '';
			echo '<input class="download-star" type="radio" name="download-2-rating-1"'.$disabled.$checked.' value="'.( $rang + 1 ).'" title="'.$titles[$rang].'" data-post-id="'.get_the_ID().'"/>'."\n";
		}
		echo '</div>'."\n";
		printf(__('Average Rating %s', SH_NAME), $evg );
	}
}


function _sh_trim( $text, $len )
{

	$text = strip_shortcodes( $text );
	
	$text = apply_filters( 'the_content', $text );
	$text = str_replace(']]>', ']]&gt;', $text);
	
	$excerpt_length = apply_filters( 'excerpt_length', $len );
	
	$excerpt_more = apply_filters( 'excerpt_more', ' ' . '[&hellip;]' );
	
	$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	
	return $text;
 
}

function FW_Twitter($args = array())
{
    $selector = sh_set($args, 'selector');
    $temp = sh_set($args, 'template', 'blockquote');
    $count = sh_set($args, 'count', 3);
    $screen = sh_set($args, 'screen_name', 'Wordpress');

    $options = array('template' => $temp, 'count' => $count, 'screen_name' => $screen);
	
    ?>


    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('<?php echo $selector; ?>').sh_tweets(<?php echo json_encode($options); ?>);
        });
    </script>


<?php
}
?>
