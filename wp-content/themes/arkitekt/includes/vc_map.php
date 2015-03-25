<?php
/* to view detail description about vc_map Array go to >> http://kb.wpbakery.com/index.php?title=Vc_map */

//Services
vc_map( array(
			"name" => __("Services", SH_NAME),
			"base" => "sh_services",
			"class" => "",
			"category" => __('arkitekt', SH_NAME),
			"icon" => 'faqs' ,
			"params" => array(				
				array(
				   "type" => "textfield",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Number", SH_NAME),
				   "param_name" => "num",
				   "description" => __("Enter the number of work to show", SH_NAME)
				),
				array(
				   "type" => "dropdown",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Order By", SH_NAME),
				   "param_name" => "orderby",
				   'value' => array_flip( array('date'=>__('Date', SH_NAME),'title'=>__('Title', SH_NAME) ,'name'=>__('Name', SH_NAME) ,'author'=>__('Author', SH_NAME),'comment_count' =>__('Comment Count', SH_NAME),'random' =>__('Random', SH_NAME) ) ),			
				   "description" => __("Enter the sorting order.", SH_NAME)
				),
				array(
				   "type" => "dropdown",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Sorting Order", SH_NAME),
				   "param_name" => "order",
				   'value' => array_flip( array('ASC'=>__('Ascending', SH_NAME),'DESC'=>__('Descending', SH_NAME) ) ),			
				   "description" => __("Enter the sorting order.", SH_NAME)
				),
				array(
				   "type" => "dropdown",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __( 'Category', SH_NAME ),
				   "param_name" => "cat",
				   "value" => array_flip( sh_get_categories( array( 'taxonomy' => 'service_category', 'hide_empty' => FALSE ) ) ),
				   "description" => __( 'Choose Category.', SH_NAME )
				),
				
			)
	    )
);

//Portfolio(Recent Work)
vc_map( array(
			"name" => __("Recent Work", SH_NAME),
			"base" => "sh_recent_work",
			"class" => "",
			"category" => __('arkitekt', SH_NAME),
			"icon" => 'faqs' ,
			"params" => array(
				array(
				   "type" => "textfield",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Title", SH_NAME),
				   "param_name" => "title",
				   "description" => __("Enter title for Portfolio section", SH_NAME)
				),
				array(
				   "type" => "textfield",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Subtitle", SH_NAME),
				   "param_name" => "sub_title",
				   "description" => __("Enter sub title for Portfolio section", SH_NAME)
				),
				array(
				   "type" => "textfield",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Number", SH_NAME),
				   "param_name" => "num",
				   "description" => __("Enter the number of work to show", SH_NAME)
				),
				array(
				   "type" => "dropdown",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Order By", SH_NAME),
				   "param_name" => "orderby",
				   'value' => array_flip( array('date'=>__('Date', SH_NAME),'title'=>__('Title', SH_NAME) ,'name'=>__('Name', SH_NAME) ,'author'=>__('Author', SH_NAME),'comment_count' =>__('Comment Count', SH_NAME),'random' =>__('Random', SH_NAME) ) ),			
				   "description" => __("Enter the sorting order.", SH_NAME)
				),
				array(
				   "type" => "dropdown",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Sorting Order", SH_NAME),
				   "param_name" => "order",
				   'value' => array_flip( array('ASC'=>__('Ascending', SH_NAME),'DESC'=>__('Descending', SH_NAME) ) ),			
				   "description" => __("Enter the sorting order.", SH_NAME)
				),
				array(
				   "type" => "dropdown",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __( 'Category', SH_NAME ),
				   "param_name" => "cat",
				   "value" => array_flip( sh_get_categories( array( 'taxonomy' => 'portfolio_category', 'hide_empty' => FALSE ) ) ),
				   "description" => __( 'Choose Category.', SH_NAME )
				),
			    
			)
	    )
);

//why choose
vc_map( array(
			"name" => __("why choose us", SH_NAME),
			"base" => "sh_why_choose",
			"class" => "",
			"category" => __('arkitekt', SH_NAME),
			"icon" => 'faqs' ,
			"params" => array(
				array(
				   "type" => "textfield",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Title", SH_NAME),
				   "param_name" => "title",
				   "description" => __("Enter title for why choose section", SH_NAME)
				),
				array(
				   "type" => "textfield",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Subtitle", SH_NAME),
				   "param_name" => "sub_title",
				   "description" => __("Enter sub title for why choose section", SH_NAME)
				),
				array(
				   "type" => "textfield",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Number", SH_NAME),
				   "param_name" => "num",
				   "description" => __("Enter the number of service to show", SH_NAME)
				),
				array(
				   "type" => "dropdown",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Order By", SH_NAME),
				   "param_name" => "orderby",
				   'value' => array_flip( array('date'=>__('Date', SH_NAME),'title'=>__('Title', SH_NAME) ,'name'=>__('Name', SH_NAME) ,'author'=>__('Author', SH_NAME),'comment_count' =>__('Comment Count', SH_NAME),'random' =>__('Random', SH_NAME) ) ),			
				   "description" => __("Enter the sorting order.", SH_NAME)
				),
				array(
				   "type" => "dropdown",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Sorting Order", SH_NAME),
				   "param_name" => "order",
				   'value' => array_flip( array('ASC'=>__('Ascending', SH_NAME),'DESC'=>__('Descending', SH_NAME) ) ),			
				   "description" => __("Enter the sorting order.", SH_NAME)
				),
				array(
				   "type" => "dropdown",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __( 'Category', SH_NAME ),
				   "param_name" => "cat",
				   "value" => array_flip( sh_get_categories( array( 'taxonomy' => 'service_category', 'hide_empty' => FALSE ) ) ),
				   "description" => __( 'Choose Category.', SH_NAME )
				),
				array(
				   "type" => "attach_image",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Image", SH_NAME),
				   "param_name" => "img",
				   "description" => __("Choose the section Image.", SH_NAME)
				),

			)
	    )
);


//testimonials
vc_map( array(
			"name" => __("Testimonials", SH_NAME),
			"base" => "sh_testimonials",
			"class" => "",
			"category" => __('arkitekt', SH_NAME),
			"icon" => 'faqs' ,
			"params" => array(
				array(
				   "type" => "textfield",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Title", SH_NAME),
				   "param_name" => "title",
				   "description" => __("Enter title for Testimonials section", SH_NAME)
				),
				array(
				   "type" => "textfield",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Subtitle", SH_NAME),
				   "param_name" => "sub_title",
				   "description" => __("Enter sub title for Testimonials section", SH_NAME)
				),
				array(
				   "type" => "textfield",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Number", SH_NAME),
				   "param_name" => "num",
				   "description" => __("Enter the number of work to show", SH_NAME)
				),
				array(
				   "type" => "dropdown",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Order By", SH_NAME),
				   "param_name" => "orderby",
				   'value' => array_flip( array('date'=>__('Date', SH_NAME),'title'=>__('Title', SH_NAME) ,'name'=>__('Name', SH_NAME) ,'author'=>__('Author', SH_NAME),'comment_count' =>__('Comment Count', SH_NAME),'random' =>__('Random', SH_NAME) ) ),			
				   "description" => __("Enter the sorting order.", SH_NAME)
				),
				array(
				   "type" => "dropdown",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Sorting Order", SH_NAME),
				   "param_name" => "order",
				   'value' => array_flip( array('ASC'=>__('Ascending', SH_NAME),'DESC'=>__('Descending', SH_NAME) ) ),			
				   "description" => __("Enter the sorting order.", SH_NAME)
				),
				array(
				   "type" => "dropdown",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __( 'Category', SH_NAME ),
				   "param_name" => "cat",
				   "value" => array_flip( sh_get_categories( array( 'taxonomy' => 'testimonial_category', 'hide_empty' => FALSE ) ) ),
				   "description" => __( 'Choose Category.', SH_NAME )
				),
			    
			)
	    )
);

//team
vc_map( array(
			"name" => __("Team", SH_NAME),
			"base" => "sh_team",
			"class" => "",
			"category" => __('arkitekt', SH_NAME),
			"icon" => 'faqs' ,
			"params" => array(
				array(
				   "type" => "textfield",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Title", SH_NAME),
				   "param_name" => "title",
				   "description" => __("Enter title for Team section", SH_NAME)
				),
				array(
				   "type" => "textfield",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Subtitle", SH_NAME),
				   "param_name" => "sub_title",
				   "description" => __("Enter sub title for Team section", SH_NAME)
				),
				array(
				   "type" => "textfield",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Number", SH_NAME),
				   "param_name" => "num",
				   "description" => __("Enter the number of work to show", SH_NAME)
				),
				array(
				   "type" => "dropdown",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Order By", SH_NAME),
				   "param_name" => "orderby",
				   'value' => array_flip( array('date'=>__('Date', SH_NAME),'title'=>__('Title', SH_NAME) ,'name'=>__('Name', SH_NAME) ,'author'=>__('Author', SH_NAME),'comment_count' =>__('Comment Count', SH_NAME),'random' =>__('Random', SH_NAME) ) ),			
				   "description" => __("Enter the sorting order.", SH_NAME)
				),
				array(
				   "type" => "dropdown",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Sorting Order", SH_NAME),
				   "param_name" => "order",
				   'value' => array_flip( array('ASC'=>__('Ascending', SH_NAME),'DESC'=>__('Descending', SH_NAME) ) ),			
				   "description" => __("Enter the sorting order.", SH_NAME)
				),
				array(
				   "type" => "dropdown",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __( 'Category', SH_NAME ),
				   "param_name" => "cat",
				   "value" => array_flip( sh_get_categories( array( 'taxonomy' => 'team_category', 'hide_empty' => FALSE ) ) ),
				   "description" => __( 'Choose Category.', SH_NAME )
				),
				array(
				   "type" => "attach_image",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Image", SH_NAME),
				   "param_name" => "bg_img",
				   "description" => __("Choose the section background Image.", SH_NAME)
				),
				array(
				   "type" => "checkbox",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Show slider?", SH_NAME),
				   "param_name" => "slider",
				   'value' => array('Show slider' => true ),
				   "description" => __("Whether to show the slider or not", SH_NAME)
				),
				
			    
			)
	    )
);

//recent posts
vc_map( array(
			"name" => __("Recent post", SH_NAME),
			"base" => "sh_recent_posts",
			"class" => "",
			"category" => __('arkitekt', SH_NAME),
			"icon" => 'faqs' ,
			"params" => array(
				array(
				   "type" => "textfield",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Title", SH_NAME),
				   "param_name" => "title",
				   "description" => __("Enter title for recent posts section", SH_NAME)
				),
				array(
				   "type" => "textfield",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Subtitle", SH_NAME),
				   "param_name" => "sub_title",
				   "description" => __("Enter sub title for recent posts section", SH_NAME)
				),
				array(
				   "type" => "textfield",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Number", SH_NAME),
				   "param_name" => "num",
				   "description" => __("Enter the number of work to show", SH_NAME)
				),
				array(
				   "type" => "dropdown",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Order By", SH_NAME),
				   "param_name" => "orderby",
				   'value' => array_flip( array('date'=>__('Date', SH_NAME),'title'=>__('Title', SH_NAME) ,'name'=>__('Name', SH_NAME) ,'author'=>__('Author', SH_NAME),'comment_count' =>__('Comment Count', SH_NAME),'random' =>__('Random', SH_NAME) ) ),			
				   "description" => __("Enter the sorting order.", SH_NAME)
				),
				array(
				   "type" => "dropdown",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Sorting Order", SH_NAME),
				   "param_name" => "order",
				   'value' => array_flip( array('ASC'=>__('Ascending', SH_NAME),'DESC'=>__('Descending', SH_NAME) ) ),			
				   "description" => __("Enter the sorting order.", SH_NAME)
				),
				array(
				   "type" => "dropdown",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __( 'Category', SH_NAME ),
				   "param_name" => "cat",
				   "value" => array_flip( sh_get_categories( array( 'taxonomy' => 'category', 'hide_empty' => FALSE ) ) ),
				   "description" => __( 'Choose Category.', SH_NAME )
				),
				
			)
	    )
);

/*---------------------------------portfolio------------------------------------ */

//Portfolio
vc_map( array(
			"name" => __("Portfolio", SH_NAME),
			"base" => "sh_portfolio",
			"class" => "",
			"category" => __('arkitekt', SH_NAME),
			"icon" => 'faqs' ,
			"params" => array(
				array(
				   "type" => "textfield",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Number", SH_NAME),
				   "param_name" => "num",
				   "description" => __("Enter the number of portfolio to show", SH_NAME)
				),
				array(
				   "type" => "dropdown",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Order By", SH_NAME),
				   "param_name" => "orderby",
				   'value' => array_flip( array('date'=>__('Date', SH_NAME),'title'=>__('Title', SH_NAME) ,'name'=>__('Name', SH_NAME) ,'author'=>__('Author', SH_NAME),'comment_count' =>__('Comment Count', SH_NAME),'random' =>__('Random', SH_NAME) ) ),			
				   "description" => __("Enter the sorting order.", SH_NAME)
				),
				array(
				   "type" => "dropdown",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Sorting Order", SH_NAME),
				   "param_name" => "order",
				   'value' => array_flip( array('ASC'=>__('Ascending', SH_NAME),'DESC'=>__('Descending', SH_NAME) ) ),			
				   "description" => __("Enter the sorting order.", SH_NAME)
				),
				
			)
	    )
);

//Portfolio full
vc_map( array(
			"name" => __("Portfolio full", SH_NAME),
			"base" => "sh_portfolio_full",
			"class" => "",
			"category" => __('arkitekt', SH_NAME),
			"icon" => 'faqs' ,
			"params" => array(
				array(
				   "type" => "textfield",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Number", SH_NAME),
				   "param_name" => "num",
				   "description" => __("Enter the number of portfolio to show", SH_NAME)
				),
				array(
				   "type" => "dropdown",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Order By", SH_NAME),
				   "param_name" => "orderby",
				   'value' => array_flip( array('date'=>__('Date', SH_NAME),'title'=>__('Title', SH_NAME) ,'name'=>__('Name', SH_NAME) ,'author'=>__('Author', SH_NAME),'comment_count' =>__('Comment Count', SH_NAME),'random' =>__('Random', SH_NAME) ) ),			
				   "description" => __("Enter the sorting order.", SH_NAME)
				),
				array(
				   "type" => "dropdown",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Sorting Order", SH_NAME),
				   "param_name" => "order",
				   'value' => array_flip( array('ASC'=>__('Ascending', SH_NAME),'DESC'=>__('Descending', SH_NAME) ) ),			
				   "description" => __("Enter the sorting order.", SH_NAME)
				),
				
			)
	    )
);


//What we offer
vc_map( array(
			"name" => __("What we offer", SH_NAME),
			"base" => "sh_what_we_offer",
			"class" => "",
			"category" => __('arkitekt', SH_NAME),
			"icon" => 'faqs' ,
			"params" => array(
			
					array(
				   "type" => "textfield",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Title", SH_NAME),
				   "param_name" => "title",
				   "description" => __("Enter title for Services section", SH_NAME)
				),
				array(
				   "type" => "textfield",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Subtitle", SH_NAME),
				   "param_name" => "sub_title",
				   "description" => __("Enter sub title for services section", SH_NAME)
				),
				
				array(
				   "type" => "textarea",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Text", SH_NAME),
				   "param_name" => "text",
				   "description" => __("Enter Text For Services Blog section", SH_NAME)
				),
							
			)
	    )
);

//Service blog
vc_map( array(
			"name" => __("Services Blog", SH_NAME),
			"base" => "sh_services_blog",
			"class" => "",
			"category" => __('arkitekt', SH_NAME),
			"icon" => 'faqs' ,
			"params" => array(
				array(
				   "type" => "textfield",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Number", SH_NAME),
				   "param_name" => "num",
				   "description" => __("Enter the number of work to show", SH_NAME)
				),
				array(
				   "type" => "dropdown",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Order By", SH_NAME),
				   "param_name" => "orderby",
				   'value' => array_flip( array('date'=>__('Date', SH_NAME),'title'=>__('Title', SH_NAME) ,'name'=>__('Name', SH_NAME) ,'author'=>__('Author', SH_NAME),'comment_count' =>__('Comment Count', SH_NAME),'random' =>__('Random', SH_NAME) ) ),			
				   "description" => __("Enter the sorting order.", SH_NAME)
				),
				array(
				   "type" => "dropdown",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Sorting Order", SH_NAME),
				   "param_name" => "order",
				   'value' => array_flip( array('ASC'=>__('Ascending', SH_NAME),'DESC'=>__('Descending', SH_NAME) ) ),			
				   "description" => __("Enter the sorting order.", SH_NAME)
				),
				array(
				   "type" => "dropdown",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __( 'Category', SH_NAME ),
				   "param_name" => "cat",
				   "value" => array_flip( sh_get_categories( array( 'taxonomy' => 'service_category', 'hide_empty' => FALSE ) ) ),
				   "description" => __( 'Choose Category.', SH_NAME )
				),
			)
	    )
);

//Contact info
vc_map( array(
			"name" => __("Contact Info", SH_NAME),
			"base" => "sh_contact_info",
			"class" => "",
			"category" => __('arkitekt', SH_NAME),
			"icon" => 'faqs' ,
			"params" => array(
			
				array(
				   "type" => "textfield",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Title", SH_NAME),
				   "param_name" => "title",
				   "description" => __("Enter title for contact info", SH_NAME)
				),
				array(
				   "type" => "textfield",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Subtitle", SH_NAME),
				   "param_name" => "sub_title",
				   "description" => __("Enter sub title for contact info", SH_NAME)
				),
				array(
				   "type" => "textarea",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Text", SH_NAME),
				   "param_name" => "text",
				   "description" => __("Enter Text For contact info", SH_NAME)
				),
				array(
				   "type" => "textfield",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Address", SH_NAME),
				   "param_name" => "address",
				   "description" => __("Enter address to contact", SH_NAME)
				),
				array(
				   "type" => "textfield",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Phone", SH_NAME),
				   "param_name" => "phone",
				   "description" => __("Enter phone to contact", SH_NAME)
				),
				array(
				   "type" => "textfield",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Email", SH_NAME),
				   "param_name" => "email",
				   "description" => __("Enter email to contact", SH_NAME)
				),


							
			)
	    )
);


//Contact form
vc_map( array(
			"name" => __("Contact Form", SH_NAME),
			"base" => "sh_get_in_touch",
			"class" => "",
			"category" => __('arkitekt', SH_NAME),
			"icon" => 'faqs' ,
			"params" => array(
			
					array(
				   "type" => "textfield",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Title", SH_NAME),
				   "param_name" => "title",
				   "description" => __("Enter title for contact form", SH_NAME)
				),
				array(
				   "type" => "textfield",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Subtitle", SH_NAME),
				   "param_name" => "sub_title",
				   "description" => __("Enter sub title for contact form", SH_NAME)
				),
				
				array(
				   "type" => "textfield",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Email", SH_NAME),
				   "param_name" => "email",
				   "description" => __("Enter email to contact", SH_NAME)
				),
							
			)
	    )
);



//Contact form
vc_map( array(
			"name" => __("Google Map", SH_NAME),
			"base" => "sh_google_map",
			"class" => "",
			"category" => __('arkitekt', SH_NAME),
			"icon" => 'faqs' ,
			"params" => array(
			
					array(
				   "type" => "textfield",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Latitude", SH_NAME),
				   "param_name" => "lat",
				   "description" => __("Enter latitude", SH_NAME),
				   'value' => '40.712785',
				),
				array(
				   "type" => "textfield",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Longitude", SH_NAME),
				   "param_name" => "lang",
				   "description" => __("Enter the longitude", SH_NAME),
				   'value' => '-73.962708'
				),
							
			)
	    )
);


//blog posts
vc_map( array(
			"name" => __("Blog", SH_NAME),
			"base" => "sh_blog_posts",
			"class" => "",
			"category" => __('arkitekt', SH_NAME),
			"icon" => 'faqs' ,
			"params" => array(				
				array(
				   "type" => "textfield",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Number", SH_NAME),
				   "param_name" => "num",
				   "description" => __("Enter the number of posts to show", SH_NAME)
				),
				array(
				   "type" => "dropdown",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Order By", SH_NAME),
				   "param_name" => "orderby",
				   'value' => array_flip( array('date'=>__('Date', SH_NAME),'title'=>__('Title', SH_NAME) ,'name'=>__('Name', SH_NAME) ,'author'=>__('Author', SH_NAME),'comment_count' =>__('Comment Count', SH_NAME),'random' =>__('Random', SH_NAME) ) ),			
				   "description" => __("Enter the sorting order.", SH_NAME)
				),
				array(
				   "type" => "dropdown",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __("Sorting Order", SH_NAME),
				   "param_name" => "order",
				   'value' => array_flip( array('ASC'=>__('Ascending', SH_NAME),'DESC'=>__('Descending', SH_NAME) ) ),			
				   "description" => __("Enter the sorting order.", SH_NAME)
				),
				array(
				   "type" => "dropdown",
				   "holder" => "div",
				   "class" => "",
				   "heading" => __( 'Category', SH_NAME ),
				   "param_name" => "cat",
				   "value" => array_flip( sh_get_categories( array( 'taxonomy' => 'category', 'hide_empty' => FALSE ) ) ),
				   "description" => __( 'Choose Category.', SH_NAME )
				),
				
			)
	    )
);




















/** fun facts with icons */
//Register "container" content element. It will hold all your inner (child) content elements

vc_map( array(
    "name" => __("Fun Facts kamran", SH_NAME),
    "base" => "sh_fun_facts",
    "as_parent" => array('only' => 'sh_fact'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "show_settings_on_create" => false,
	'icon' => 'fa-smile-o',
	'description' => __('show fun facts', SH_NAME),
    "params" => array(
        // add params same as with any other content element
        array(
            "type" => "textfield",
            "heading" => __("Title", SH_NAME),
            "param_name" => "title",
            "description" => __("Enter the title for fun facts area", SH_NAME)
        ),
		array(
            "type" => "textfield",
            "heading" => __("Description", SH_NAME),
            "param_name" => "desc",
            "description" => __("Enter the description for fun facts area", SH_NAME)
        ),
    ),
    "js_view" => 'VcColumnView'
) );



vc_map( array(
    "name" => __("Fact", SH_NAME),
    "base" => "sh_fact",
    "content_element" => true,
    "as_child" => array('only' => 'sh_fun_facts'), // Use only|except attributes to limit parent (separate multiple values with comma)
	'icon'	=> 'fa-smile-o',
    "params" => array(
        // add params same as with any other content element
        array(
            "type" => "textfield",
            "heading" => __("Title", SH_NAME),
            "param_name" => "title",
            "description" => __("Enter the title for fact", SH_NAME)
        ),
		array(
            "type" => "textfield",
            "heading" => __("Value", SH_NAME),
            "param_name" => "value",
            "description" => __("Enter the value for the fact", SH_NAME)
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Icons", SH_NAME),
            "param_name" => "icon",
			'value' => array_flip(sh_font_awesome()),
            "description" => __("Choose the icon for fun fact", SH_NAME)
        ),
		
    )
) );

class WPBakeryShortCode_Sh_Fun_Facts extends WPBakeryShortCodesContainer {
}
class WPBakeryShortCode_Sh_Fact extends WPBakeryShortCode {
}

/*
*/
/** Social profile with icons */
//Register "container" content element. It will hold all your inner (child) content elements




function sh_custom_css_classes_for_vc_row_and_vc_column($class_string, $tag) {
//echo $class_string." | ".$tag."<br />";
	if($tag=='vc_row' || $tag=='vc_row_inner') {
		$class_string = str_replace('vc_row-fluid', 'row', $class_string);
	}
	if($tag=='vc_column' || $tag=='vc_column_inner') {
		$class_string = str_replace('vc_span1', 'column1', $class_string);
		$class_string = str_replace('vc_span2', 'column2', $class_string);
		$class_string = str_replace('vc_span3', 'column3', $class_string);
		$class_string = str_replace('vc_span4', 'column4', $class_string);
		$class_string = str_replace('vc_span5', 'column5', $class_string);
		$class_string = str_replace('vc_span6', 'column6', $class_string);
		$class_string = str_replace('vc_span7', 'column7', $class_string);
		$class_string = str_replace('vc_span8', 'column8', $class_string);
		$class_string = str_replace('vc_span9', 'column9', $class_string);
		$class_string = str_replace('vc_span10', 'column10', $class_string);
		$class_string = str_replace('vc_span11', 'column11', $class_string);
		$class_string = str_replace('vc_span12', 'column12', $class_string);
	}
	return $class_string;
}
// Filter to Replace default css class for vc_row shortcode and vc_column
//add_filter('vc_shortcodes_css_class', 'sh_custom_css_classes_for_vc_row_and_vc_column', 10, 2);







function vc_theme_vc_row($atts, $content = null) {
	
   extract(shortcode_atts(array(
		'el_class'        => '',
		'bg_image'        => '',
		'bg_color'        => '',
		'bg_image_repeat' => '',
		'font_color'      => '',
		'padding'         => '',
		'margin_bottom'   => '',
		'container'		  => '',
	), $atts));
	
	$atts['base'] = '';
	wp_enqueue_style( 'js_composer_front' );
	wp_enqueue_script( 'wpb_composer_front_js' );
	wp_enqueue_style('js_composer_custom_css');
	$vc_row = new WPBakeryShortCode_VC_Row($atts);
	$el_class = $vc_row->getExtraClass($el_class);
	$output = '';
	$css_class =  $el_class;//apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_row '.get_row_css_class().$el_class, $vc_row->settings['base']);
	
	$style = $vc_row->buildStyle($bg_image, $bg_color, $bg_image_repeat, $font_color, $padding, $margin_bottom);

   if( $container == 'true' ) return '<section class="'.$css_class.'"  '.$style.'><div class="wrapper dark">'.wpb_js_remove_wpautop($content).'</div></section><div class="clear"></div>';
   else return '<section '.$style.'><div class="ro'.$css_class.'">'.wpb_js_remove_wpautop($content).'</div></section>';
   
}

function vc_theme_vc_column($atts, $content = null) {
	
   extract( shortcode_atts( array( 'width'=> '1/1', 'el_class'=>'' ), $atts ) );
   
   $width = wpb_translateColumnWidthToSpan($width);

   $width = ( $width !== 'vc_span12' ) ? str_replace('vc_span', 'column', $width) : '';
   $el_class = ($el_class) ? ' '.$el_class : '';

   return '<div class="'.$width.$el_class.'">'.do_shortcode($content).'</div>';
}

$param = array(
  "type" => "dropdown",
  "holder" => "div",
  "class" => "",
  "heading" => __("Container", SH_NAME),
  "param_name" => "container",
  "value" => array('True'=>'true', 'False'=>'false'),
  "description" => __("Choose whether you want to add a container before row or not.", SH_NAME)
);

vc_add_param('vc_row', $param);



