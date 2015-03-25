<?php

/// Posts Tabber
class SH_Tabber extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'SH_Tabber', /* Name */__('Arkitekt Post Tabs ',SH_NAME), array( 'description' => __('Fetch the latest , Popular posts in tabber form', SH_NAME )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$number_of_latest_posts = $instance['number_of_latest_posts'];
		$number_of_popular_posts = $instance['number_of_popular_posts'];
		$number_of_comments = $instance['number_of_comments'];
		
		echo $before_widget;?>
		
		<div class="tabs-widget clearfix tabs-second">
		<ul class="tab-links clearfix">
			<li class="active"><a href="#popular-tab"><?php echo $instance['label1']; ?></a></li>
			<li><a href="#recent-tab"><?php echo $instance['label2']; ?></a></li>
			<li><a href="#comments-tab"><?php echo $instance['label3']; ?></a></li>
		</ul>
		
			<div id="popular-tab">
				<?php query_posts('orderby=comment_count&order=DESC&posts_per_page='.$number_of_popular_posts ) ; 
				$this->posts();
				wp_reset_query(); ?>
			</div>
			
			<div id="recent-tab">
				<?php query_posts('posts_per_page='.$number_of_latest_posts);
				$this->posts();
				wp_reset_query(); ?>
				
			  </div>
			  
		   <div id="comments-tab">
			<ul>
				<?php $comments = get_comments(array('number'=>$number_of_comments));

					foreach($comments as $key => $value):
						
						$postthumbnail = get_the_post_thumbnail(  $value->comment_post_ID, '44x44');

						echo '<li>';
						echo '<a href="'.get_permalink($value->comment_post_ID).'#comments">'.$postthumbnail.'</a>';
						echo '<p>'._sh_trim( sh_set( $value, 'comment_content' ), 7).'</p>';
						echo '</li>';
					endforeach;
				
				wp_reset_query(); ?>
			</ul>
			  </div>  
			  </div>
		<?php echo $after_widget;
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['number_of_latest_posts'] = $new_instance['number_of_latest_posts'];
		$instance['number_of_popular_posts'] = $new_instance['number_of_popular_posts'];
		$instance['number_of_comments'] = $new_instance['number_of_comments'];
		$instance['label1'] = $new_instance['label1'];
		$instance['label2'] = $new_instance['label2'];
		$instance['label3'] = $new_instance['label3'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$number_of_latest_posts = ( $instance ) ? esc_attr($instance['number_of_latest_posts']) : 4;
		$number_of_popular_posts = ( $instance ) ? esc_attr($instance['number_of_popular_posts']) : 4;
		$number_of_comments = ( $instance ) ? esc_attr($instance['number_of_comments']) : 4;
		$label1 = ( $instance ) ? esc_attr($instance['label1']) : __('Popular', SH_NAME);
		$label2 = ( $instance ) ? esc_attr($instance['label2']) : __('Recent', SH_NAME);
		$label3 = ( $instance ) ? esc_attr($instance['label3']) : __('Comments', SH_NAME);?>
			
        <p>
            <label for="<?php echo $this->get_field_id('label1'); ?>"><?php _e('Label for Popular Tab:', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('label1'); ?>" name="<?php echo $this->get_field_name('label1'); ?>" type="text" value="<?php echo esc_attr($label1); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number_of_popular_posts'); ?>"><?php _e('No. of Popular Posts:', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('number_of_popular_posts'); ?>" name="<?php echo $this->get_field_name('number_of_popular_posts'); ?>" type="text" value="<?php echo esc_attr( $number_of_popular_posts ); ?>" />		
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('label2'); ?>"><?php _e('Label for Recent Tab:', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('label2'); ?>" name="<?php echo $this->get_field_name('label2'); ?>" type="text" value="<?php echo esc_attr($label2); ?>" />
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('number_of_latest_posts'); ?>"><?php _e('No. of Latest Posts:', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('number_of_latest_posts'); ?>" name="<?php echo $this->get_field_name('number_of_latest_posts'); ?>" type="text" value="<?php echo esc_attr( $number_of_latest_posts ); ?>" />
        </p>
		
		<p>
            <label for="<?php echo $this->get_field_id('label3'); ?>"><?php _e('Label for Comments Tab:', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('label3'); ?>" name="<?php echo $this->get_field_name('label3'); ?>" type="text" value="<?php echo esc_attr( $label3 ); ?>" />
        </p>
		
		<p>
            <label for="<?php echo $this->get_field_id('number_of_comments'); ?>"><?php _e('No. of Latest Comments:', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('number_of_comments'); ?>" name="<?php echo $this->get_field_name('number_of_comments'); ?>" type="text" value="<?php echo esc_attr( $number_of_comments ); ?>" />
        </p>
        
		<?php 
	}
	
	function posts()
	{
		
		if( have_posts() ):?>
        
            <ul>
                
                <?php while( have_posts() ): the_post(); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('44x44');?></a>
						<p>Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. </p>
					</li>
                <?php endwhile; ?>
                
            </ul>
            
		<?php endif;
    }
}

/// Accordion Posts 
class SH_Accordion_Post extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'SH_Accordion_Post', /* Name */__('Arkitekt Accordion Posts ',SH_NAME), array( 'description' => __('Show the posts by Accordion', SH_NAME )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo $before_widget;
		echo $before_title.$title.$after_title; ?>
		
		<div class="blog-categ mb30">
			<div class="accordion">
				<div id="accordion-container">
		
					<?php 
					$query_string = 'posts_per_page='.$instance['number'];
					if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
					query_posts( $query_string ); 
				
					$this->posts();
					wp_reset_query(); ?>
				</div>
			</div>
		</div>
		
		<?php
		echo $after_widget;
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : __('Accordion Posts', SH_NAME);
		$number = ( $instance ) ? esc_attr($instance['number']) : 3;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title: ', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('No. of Posts:', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
        <p>
            <label for="<?php echo $this->get_field_id('cat'); ?>"><?php _e('Category', SH_NAME); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>true, 'selected'=>$cat, 'class'=>'widefat') ); ?>
        </p>
        
		<?php 
	}
	
	function posts()
	{
		
		if( have_posts() ):?>
        
                
                <?php while( have_posts() ): the_post(); ?>
                    <h2 class="accordion-header"><?php echo _sh_trim( get_the_title(), 5); ?></h2>
					<div class="accordion-content"> 
                  		<?php echo _sh_trim(get_the_excerpt(),100);?> 
               		</div>
				<?php endwhile; ?>
                

            
		<?php endif;
    }
}

// contact us
class SH_ContactUs extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'SH_ContactUs', /* Name */__('Arkitekt Contact us',SH_NAME), array( 'description' => __('Contact us form', SH_NAME )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo $before_widget;
		?>
		 <div class="send-message">
			  <form id="contact" action="<?php echo admin_url('admin-ajax.php'); ?>?action=_sh_ajax_callback&subaction=sh_contact_form_submit" name="contactform"  method="post">
				<?php echo $before_title.$title.$after_title;?>
				<div class="text-fields">
				  <div class="float-input">
					<input name="contact_name" id="contact_name" type="text" placeholder="<?php _e("Name" , SH_NAME);?>">
				  </div>
				  <div class="float-input">
					<input name="contact_email" id="contact_email" type="text" placeholder="<?php _e("Email" , SH_NAME);?>">
				  </div>
				</div>
	
				<div class="submit-area">
				  <textarea name="contact_message" id="contact_message" placeholder="<?php _e("Message" , SH_NAME);?>"></textarea>
				  <input type="submit" id="submit" class="main-button" value="<?php _e("Send" , SH_NAME);?>">
				  <img class="loader" src="<?php echo get_template_directory_uri(); ?>/images/ajax-loader.gif" style="visibility:hidden">
				  <div id="msg" class="message"></div>
				</div>
			  </form>
			</div>
		
		<?php
		
		echo $after_widget;
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['email'] = $new_instance['email'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : __('Send us a Message', SH_NAME);
		$email = ( $instance ) ? esc_attr($instance['email']) : 'contact@yourdomain.com';?>
        
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email ID:', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo esc_attr( $email ); ?>" />
        </p>
        
                
		<?php 
	}
}

/// Recent Posts 
class SH_Recent_Post extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'SH_Recent_Post', /* Name */__('Arkitekt Recent Posts ',SH_NAME), array( 'description' => __('Show the recent posts with images', SH_NAME )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo $before_widget;
		
		echo '<div class="contact">';
		
		echo $before_title.$title.$after_title; 
		
		$query_string = 'posts_per_page='.$instance['number'];
		if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
		query_posts( $query_string ); 
		
		$this->posts();
		wp_reset_query(); 
		echo '</div>';
		echo $after_widget;
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : __('Recent Posts', SH_NAME);
		$number = ( $instance ) ? esc_attr($instance['number']) : 4;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title: ', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('No. of Posts:', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
        <p>
            <label for="<?php echo $this->get_field_id('cat'); ?>"><?php _e('Category', SH_NAME); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>true, 'selected'=>$cat, 'class'=>'widefat') ); ?>
        </p>
        
		<?php 
	}
	
	function posts()
	{
		
		if( have_posts() ):?>
        
            <ul>
                
                <?php while( have_posts() ): the_post(); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<i class="fa fa-arrow-circle-right"></i>
							<?php the_title(); ?>
                        </a>
                    </li>
                <?php endwhile; ?>
                
            </ul>
            
		<?php endif;
    }
}

// contact info
class SH_ContactInfo extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'SH_ContactInfo', /* Name */__('Arkitekt Contact Info',SH_NAME), array( 'description' => __('Give the Contact Info', SH_NAME )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo $before_widget;
		echo $before_title.$title.$after_title;
		?>
       	<p class="f-phone">
			<i class="fa fa-phone"></i><span><?php echo $instance['phone']; ?></span>
		</p>
		<a href="mailto:<?php echo $instance['email']; ?>" class="f-mail"><i class="fa fa-envelope"></i><span><?php echo $instance['email']; ?></span></a>
	    
		<?php
		
		echo $after_widget;
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['phone'] = $new_instance['phone'];
		$instance['email'] = $new_instance['email'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : __('Contact info', SH_NAME);
		$phone = ($instance) ? esc_attr($instance['phone']) : '9930 1234 5679';
		$email = ( $instance ) ? esc_attr($instance['email']) : 'contact@yourdomain.com';?>
        
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('phone'); ?>"><?php _e('Phone#:', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo esc_attr( $phone ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email ID:', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo esc_attr( $email ); ?>" />
        </p>
        
                
		<?php 
	}
}

// twitter
class SH_Twitter extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'SH_Twitter', /* Name */__('Arkitekt Tweets',SH_NAME), array( 'description' => __('Gryvh the latest tweets from twitter', SH_NAME )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo $before_widget;
		echo $before_title.$title.$after_title;
		
		$twitter_id = ($instance) ? esc_attr($instance['twitter_id']) : 'wordpress';
		$number = ( $instance ) ? esc_attr($instance['number']) : '';
		?>
       	<?php FW_Twitter(array('Template'=>'p','screen_name'=>$twitter_id, 'count'=>$number, 'selector'=>'.tweets-shortcode'));?>
		<div class="tweets-shortcode"></div>
	    
		<?php
		
		echo $after_widget;
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['twitter_id'] = $new_instance['twitter_id'];
		$instance['number'] = $new_instance['number'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : __('Recent Tweets', SH_NAME);
		$twitter_id = ($instance) ? esc_attr($instance['twitter_id']) : 'wordpress';
		$number = ( $instance ) ? esc_attr($instance['number']) : '';?>
        
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('twitter_id'); ?>"><?php _e('Twitter ID:', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('twitter_id'); ?>" name="<?php echo $this->get_field_name('twitter_id'); ?>" type="text" value="<?php echo esc_attr( $twitter_id ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of Tweets:', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        
                
		<?php 
	}
}

// contact us
class SH_NewsLetter extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'SH_NewsLetter', /* Name */__('Arkitekt News Letter',SH_NAME), array( 'description' => __('News Letter', SH_NAME )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo $before_widget;
		?>
		
		 <div class="singup">
		 	
			<?php echo $before_title.$title.$after_title;?>
			
			<p><?php echo $instance['text']; ?></p>
			
			<form target="popupwindow" method="post" id="newsletter_subscribe" name="newsletter_form" action="http://feedburner.google.com/fb/a/mailverify">
				<input type="text" name="nl-email" id="nl-email" value="" placeholder="<?php _e("your.address@email.com" , SH_NAME);?>"/>
				<input type="hidden" id="uri" name="uri" value="<?php echo esc_attr( $instance['ID'] ); ?>">
				<input type="hidden" value="en_US" name="loc">
				<input type="submit" name="submit" id="nl-submit" value="<?php _e("Submit" , SH_NAME);?>"/>
			</form>
		
		 </div>
		
		<?php
		
		echo $after_widget;
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['text'] = $new_instance['text'];
		$instance['ID'] = $new_instance['ID'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : __('NEWSLETTER SIGNUP', SH_NAME);
		$text = ( $instance ) ? esc_attr($instance['text']) : 'This is Photoshop s version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. ';
		$ID = ($instance) ? esc_attr($instance['ID']) : 'mixsms';
		?>
        
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text:', SH_NAME); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
        </p>
		<p>
            <label for="<?php echo $this->get_field_id('ID'); ?>"><?php _e('Feedburner ID:', SH_NAME); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('ID'); ?>" name="<?php echo $this->get_field_name('ID'); ?>" type="text" value="<?php echo esc_attr( $ID ); ?>" />
        </p>
        
                
		<?php 
	}
}

// Flicker Gallery
class SH_Flickr extends WP_Widget
{
	function __construct()
	{
		parent::__construct( /* Base ID */'SH_Flickr', /* Name */__('Arkitekt Flickr Feed',SH_NAME), array( 'description' => __('Fetch the latest feed from Flickr', SH_NAME )) );
	}
	
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		wp_enqueue_script( array( 'jflickrfeed.min.js' ) );
		
		$flickr_id = $instance['flickr_id'];
		$number = $instance['number'];
		
		echo $before_widget;

		echo $before_title.$title.$after_title;
		
		
		$limit = ( $number ) ? $number : 8;?>
            <div class="flickr-image">
               <ul class="flickr flickr-images">
			   <script type="text/javascript">
					jQuery(document).ready(function($) {
						$('.flickr-images').jflickrfeed({
							limit: <?php echo $limit;?> ,
							qstrings: {id: '<?php echo $flickr_id ?>'},
							itemTemplate: '<li class="column4"><a href="{{link}}" title="{{title}}"><img src="{{image_s}}" alt="{{title}}" /></a></li>'
						});
					});
               </script>
               </ul>
            </div><?php
			
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);

		$instance['flickr_id'] = $new_instance['flickr_id'];
		$instance['number'] = $new_instance['number'];
		
		return $instance;
	}
	
	function form($instance)
	{
		wp_enqueue_script('flickrjs');
		$title = ($instance) ? esc_attr($instance['title']) : __('Flicker', SH_NAME);
		$flickr_id = ($instance) ? esc_attr($instance['flickr_id']) : '';
		$number = ( $instance ) ? esc_attr($instance['number']) : 8;?>
		  
        <p>
            <label for="<?php echo $this->get_field_id('title');?>"><?php _e('Title:', SH_NAME);?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo $title;?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('flickr_id');?>"><?php _e('Flickr ID:', SH_NAME);?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('flickr_id');?>" name="<?php echo $this->get_field_name('flickr_id');?>" type="text" value="<?php echo $flickr_id;?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number');?>"><?php _e('Number of Images:', SH_NAME);?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('number');?>" name="<?php echo $this->get_field_name('number');?>" type="text" value="<?php echo $number;?>" />
        </p>
        <?php 
	}
}



