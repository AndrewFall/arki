<?php

return array(
	'title' => __('Arkitekt Theme Options', SH_NAME),
	'logo' => get_template_directory_uri().'/images/logo.png',
	'menus' => array(
		array(
			'title' => __('General Settings', SH_NAME),
			'name' => 'general_settings',
			'icon' => 'font-awesome:icon-cogs',
			'menus' => array(
				array(
					'title' => __('General Settings', SH_NAME),
					'name' => 'general_settings',
					'icon' => 'font-awesome:icon-cogs',
					'controls' => array(
												
						array(
							'type' => 'toggle',
							'name' => 'boxed_version',
							'label' => __('Boxed Version for Whole Website', SH_NAME),
							'description' => __('Enable or disable boxed version for all pages', SH_NAME),
							'default' => '',
						),
						array(
							'type' => 'toggle',
							'name' => 'dark_version',
							'label' => __('Dark Version for Whole Website', SH_NAME),
							'description' => __('Enable or disable darked version for all pages', SH_NAME),
							'default' => '',
						),
						array(
							 'type' => 'section',
							 'title' => __('Twitter Settings', SH_NAME),
							 'name' => 'twitter_settings',
							 'description' => __('This section contain the information about twitter api settings', SH_NAME),
							 'fields' => array(
							  		array(
							   			'type' => 'textbox',
							   			'name' => 'api',
							   			'label' => __('API Key', SH_NAME),
							   			'description' => __('Enter the twitter API key, You can get the api at http://developer.twitter.com', SH_NAME),
							   			'default' => '',
							  			),
							  		array(
							   			'type' => 'textbox',
							   			'name' => 'api_secret',
							   			'label' => __('API Secret', SH_NAME),
							   			'description' => __('Enter the API secret', SH_NAME),
							   			'default' => '',
							  			),
							  		array(
							   			'type' => 'textbox',
							   			'name' => 'token',
							   			'label' => __('Token', SH_NAME),
							   			'description' => __('Enter the twitter api token', SH_NAME),
							   			'default' => '',
							  			),
							  		array(
							   			'type' => 'textbox',
							   			'name' => 'token_secret',
							   			'label' => __('Token Secret', SH_NAME),
							   			'description' => __('Enter the API token secret', SH_NAME),
							   			'default' => '',
							  ),
							  
							 ),
							),
						
					),
				
				),
				
				/** Submenu for heading settings */
				array(
					'title' => __('Header Settings', SH_NAME),
					'name' => 'header_settings',
					'icon' => 'font-awesome:icon-strikethrough',
					'controls' => array(
						array(
							'type' => 'section',
							'repeating' => true,
							'sortable'  => true,
							'title' => __('Top bar settings', SH_NAME),
							'name' => 'top_bar',
							'description' => __('This section is used for top bar menues', SH_NAME),
							'fields' => array(
								array(
									'type' => 'select',
									'name' => 'policy_page',
									'label' => __('Policy Page', SH_NAME),
									'description' => __('choose policy page to show in header area, left it if you don\'t want to show poclicy link in header', SH_NAME),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'vp_get_pages',
												),
											),
										)
									),
								array(
									'type' => 'select',
									'name' => 'aboutus_page',
									'label' => __('About Us', SH_NAME),
									'description' => __('choose About us page to show in header area, left it if you don\'t want to show About us link in header', SH_NAME),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'vp_get_pages',
											),
										),
									)
								),
								array(
									'type' => 'select',
									'name' => 'login_page',
									'label' => __('login', SH_NAME),
									'description' => __('choose login page to show in header area, left it if you don\'t want to show login link in header', SH_NAME),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'vp_get_pages',
											),
										),
									)
								),
								array(
									'type' => 'select',
									'name' => 'contactus_page',
									'label' => __('contact us', SH_NAME),
									'description' => __('choose login page to show in header area, left it if you don\'t want to show login link in header', SH_NAME),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'vp_get_pages',
											),
										),
									)
								),
								
							),
						),
						
						
						array(
							'type' => 'select',
							'name' => 'logo_type',
							'label' => __('Logo Type', SH_NAME),
							'description' => __('Choose logo type', SH_NAME),
							'items' => array( array('value'=>'text', 'label'=>'Logo With Text'), array('value'=>'image', 'label'=>'Logo With Image'), ),
							'default' => 'logo'
						),
						
						array(
							'type' => 'section',
							'title' => __('Logo with Image', SH_NAME),
							'name' => 'logo_with_image',
							'dependency' => array(
								'field' => 'logo_type',
								'function' => 'vp_dep_is_logo',
							),
							'fields' => array(
								array(
									'type' => 'upload',
									'name' => 'logo_image',
									'label' => __('Logo Image', SH_NAME),
									'description' => __('Inser the logo image', SH_NAME),
									'default' => get_template_directory_uri().'/images/logo.png'
								),
								array(
									'type' => 'slider',
									'name' => 'logo_width',
									'label' => __('Logo Width', SH_NAME),
									'description' => __('choose the logo width', SH_NAME),
									'default' => '196',
									'mix' => 20,
									'max' => 400
								),
								array(
									'type' => 'slider',
									'name' => 'logo_height',
									'label' => __('Logo Height', SH_NAME),
									'description' => __('choose the logo height', SH_NAME),
									'default' => '43',
									'mix' => 20,
									'max' => 400
								),
								
							),
						),
						array(
							'type' => 'section',
							'title' => __('Custom Logo Text', SH_NAME),
							'name' => 'section_custom_logo_text',
							'dependency' => array(
								'field' => 'logo_type',
								'function' => 'vp_dep_is_text',
							),
							'fields' => array(
								array(
									'type' => 'textbox',
									'name' => 'logo_heading',
									'label' => __('Logo Heading', SH_NAME),
									'description' => __('Enter the website heading instead of logo', SH_NAME),
									'default' => 'Aplus'
								),
								array(
									'type' => 'slider',
									'name' => 'logo_font_size',
									'label' => __('Logo Font Size', SH_NAME),
									'description' => __('Choose the logo font size', SH_NAME),
									'default' => 40,
									'min' => 12,
									'max' => 45
								),
								array(
									'type' => 'select',
									'name' => 'logo_font_face',
									'label' => __('Logo Font Face', SH_NAME),
									'description' => __('Select Font', SH_NAME),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'vp_get_gwf_family',
											),
										),
									),
								),
								array(
									'type' => 'radiobutton',
									'name' => 'logo_font_style',
									'label' => __('Logo Font Style', SH_NAME),
									'description' => __('Select Font Style', SH_NAME),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'logo_font_face',
												'value' => 'vp_get_gwf_style',
											),
										),
									),
									'default' => array(
										'{{first}}',
									),
								),
								array(
									'type' => 'color',
									'name' => 'logo_color',
									'label' => __('Logo Color', SH_NAME),
									'description' => __('Choose the default color for logo.', SH_NAME),
									'default' => '#98ed28',
								),
								array(
									'type' => 'textbox',
									'name' => 'slogan_heading',
									'label' => __('Slogan Heading', SH_NAME),
									'description' => __('Enter the slogan', SH_NAME),
									'default' => 'Multipurpose Wordpress theme'
								),
								array(
									'type' => 'slider',
									'name' => 'slogan_font_size',
									'label' => __('Slogan Font Size', SH_NAME),
									'description' => __('Choose the slogan font size', SH_NAME),
									'default' => 40,
									'min' => 12,
									'max' => 45
								),
								array(
									'type' => 'select',
									'name' => 'slogan_font_face',
									'label' => __('Slogan Font Face', SH_NAME),
									'description' => __('Select Font', SH_NAME),
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value' => 'vp_get_gwf_family',
											),
										),
									),
								),
								array(
									'type' => 'radiobutton',
									'name' => 'slogan_font_style',
									'label' => __('Slogan Font Style', SH_NAME),
									'description' => __('Select Font Style', SH_NAME),
									'items' => array(
										'data' => array(
											array(
												'source' => 'binding',
												'field' => 'slogan_font_face',
												'value' => 'vp_get_gwf_style',
											),
										),
									),
									'default' => array(
										'{{first}}',
									),
								),
								array(
									'type' => 'color',
									'name' => 'slogan_color',
									'label' => __('Slogan Color', SH_NAME),
									'description' => __('Choose the default color for slogan.', SH_NAME),
									'default' => '#98ed28',
								),
							),
						),
						array(
							'type' => 'codeeditor',
							'name' => 'header_css',
							'label' => __('Header CSS', SH_NAME),
							'description' => __('Write your custom css to include in header.', SH_NAME),
							'theme' => 'github',
							'mode' => 'css',
						),
						array(
							'type' => 'codeeditor',
							'name' => 'header_js',
							'label' => __('Header JS', SH_NAME),
							'description' => __('Write your custom js to include in header.', SH_NAME),
							'theme' => 'twilight',
							'mode' => 'javascript',
						),
					),
				
				),
				
				/** Submenu for footer area */
				array(
					'title' => __('Footer Settings', SH_NAME),
					'name' => 'footer_settings',
					'icon' => 'font-awesome:icon-gear',
					'controls' => array(
						
						array(
							'type' => 'toggle',
							'name' => 'info_box',
							'label' => __('Info Box', SH_NAME),
							'description' => __('enable or disable info-box', SH_NAME),
							'default' => '',
						),
						array(
								'type' => 'builder',
								'repeating' => true,
								'sortable'  => true,
								'label' => __('Info Items', SH_NAME),
								'name' => 'info_items',
								'description' => __('This section is used for info items', SH_NAME),
								'fields' => array(
									array(
										'type' => 'fontawesome',
										'name' => 'info_box_icon',
										'label' => __('Choos info icon', SH_NAME),
										'description' => __('Choose an icon from the font icons list', SH_NAME),
										'default' => '',
									),
									array(
										'type' => 'textbox',
										'name' => 'info_text',
										'label' => __('Info Text', SH_NAME),
										
										'default' => '',
									),
									
								),
						),
						array(
							'type' => 'toggle',
							'name' => 'footer_widget_area',
							'label' => __('Widget Area', SH_NAME),
							'description' => __('Show or hide widget area in footer', SH_NAME),
							'default'	=> 0
						),
						array(
							'type' => 'textarea',
							'name' => 'copyright_text',
							'label' => __('Footer Copyright Text', SH_NAME),
							'description' => __('Enter the copyright text to show in footer area', SH_NAME),
						),
						
						array(
							'type' => 'codeeditor',
							'name' => 'footer_js',
							'label' => __('Footer JS', SH_NAME),
							'description' => __('Write your custom js to include in footer.', SH_NAME),
							'theme' => 'twilight',
							'mode' => 'javascript',
						),
					)
				), //End of submenu
				
				/** Contact Settings */
				array(
					'title' => __('Sidebar Creator', SH_NAME),
					'name' => 'sidebar-creator',
					'icon' => 'font-awesome:icon-columns',
					'controls' => array(
						array(
							'type' => 'builder',
							'repeating' => true,
							'sortable'  => true,
							'label' => __('Dynamic Sidebar', SH_NAME),
							'name' => 'dynamic_sidebar',
							'description' => __('This section is used for theme color settings', SH_NAME),
							'fields' => array(
								array(
									'type' => 'textbox',
									'name' => 'sidebar_name',
									'label' => __('Sidebar Name', SH_NAME),
									'description' => __('Choose the default color scheme for the theme.<br>', SH_NAME),
									'default' => __('Dynamic Sidebar', SH_NAME),
								),
								
							),
						),
					)
				),
			),
			
		),
		
		/** Sidebar Settings*/
		array(
				'title' => __('Sidebar Settings', SH_NAME),
				'name' => 'sidebar_settings',
				'icon' => 'font-awesome:icon-gear',
				'controls' => array(
						
						array(
							'type' => 'section',
							'repeating' => true,
							'sortable'  => true,
							'title' => __('Category Sidebar Settings', SH_NAME),
							'name' => 'sidebar_setting_section2',
							'description' => __('This section contains category sidebar settings', SH_NAME),
							'fields' => array(
								array(
								'type' => 'radioimage',
								'name' => 'category_sidebar_layout',
								'label' => __('Category Sidebar', SH_NAME),
								'description' => '',
								'items' => array(
											 array(
												'value' => 'full',
												'label' => __('Full Width', SH_NAME),
												'img' => get_template_directory_uri().'/includes/vafpress/public/img/1col.png',
												),
	
											 array(
												'value' => 'left',
												'label' => __('Left Sidebar', SH_NAME),
												'img' => get_template_directory_uri().'/includes/vafpress/public/img/2cl.png',
												),
											 array(
												'value' => 'right',
												'label' => __('Right Sidebar', SH_NAME),
												'img' => get_template_directory_uri().'/includes/vafpress/public/img/2cr.png',
												),
			 
											),
										),
										array(
											'type' => 'select',
											'name' => 'category_sidebar',
											'label' => __('Sidebar', SH_NAME),
											'description' => __('Choose an sidebar for this', SH_NAME),
											'default' => '',
											'items' => sh_get_sidebars(true)	
										),

							),
						),
						array(
							'type' => 'section',
							'repeating' => true,
							'sortable'  => true,
							'title' => __('Archive Sidebar Settings', SH_NAME),
							'name' => 'sidebar_setting_section3',
							'description' => __('This section contains Archive Sidebar settings', SH_NAME),
							'fields' => array(
								array(
								'type' => 'radioimage',
								'name' => 'archive_sidebar_layout',
								'label' => __('Archive Sidebar', SH_NAME),
								'description' => '',
								'items' => array(
											 array(
												'value' => 'full',
												'label' => __('Full Width', SH_NAME),
												'img' => get_template_directory_uri().'/includes/vafpress/public/img/1col.png',
												),
	
											 array(
												'value' => 'left',
												'label' => __('Left Sidebar', SH_NAME),
												'img' => get_template_directory_uri().'/includes/vafpress/public/img/2cl.png',
												),
											 array(
												'value' => 'right',
												'label' => __('Right Sidebar', SH_NAME),
												'img' => get_template_directory_uri().'/includes/vafpress/public/img/2cr.png',
												),
			 
											),
										),
										array(
											'type' => 'select',
											'name' => 'archive_sidebar',
											'label' => __('Sidebar', SH_NAME),
											'description' => __('Choose an sidebar for this', SH_NAME),
											'default' => '',
											'items' => sh_get_sidebars(true)	
										),

							),
						),
						array(
							'type' => 'section',
							'repeating' => true,
							'sortable'  => true,
							'title' => __('Author Sidebar Settings', SH_NAME),
							'name' => 'sidebar_setting_section4',
							'description' => __('This section contains Author Sidebar settings', SH_NAME),
							'fields' => array(
								array(
								'type' => 'radioimage',
								'name' => 'author_sidebar_layout',
								'label' => __('Author Sidebar', SH_NAME),
								'description' => '',
								'items' => array(
											 array(
												'value' => 'full',
												'label' => __('Full Width', SH_NAME),
												'img' => get_template_directory_uri().'/includes/vafpress/public/img/1col.png',
												),
	
											 array(
												'value' => 'left',
												'label' => __('Left Sidebar', SH_NAME),
												'img' => get_template_directory_uri().'/includes/vafpress/public/img/2cl.png',
												),
											 array(
												'value' => 'right',
												'label' => __('Right Sidebar', SH_NAME),
												'img' => get_template_directory_uri().'/includes/vafpress/public/img/2cr.png',
												),
			 
											),
										),
										array(
											'type' => 'select',
											'name' => 'author_sidebar',
											'label' => __('Sidebar', SH_NAME),
											'description' => __('Choose an sidebar for this', SH_NAME),
											'default' => '',
											'items' => sh_get_sidebars(true)	
										),

							),
						),
						array(
							'type' => 'section',
							'repeating' => true,
							'sortable'  => true,
							'title' => __('Search Sidebar Settings', SH_NAME),
							'name' => 'sidebar_setting_section5',
							'description' => __('This section contains Search Sidebar settings', SH_NAME),
							'fields' => array(
								array(
								'type' => 'radioimage',
								'name' => 'search_sidebar_layout',
								'label' => __('Search Sidebar', SH_NAME),
								'description' => '',
								'items' => array(
											 array(
												'value' => 'full',
												'label' => __('Full Width', SH_NAME),
												'img' => get_template_directory_uri().'/includes/vafpress/public/img/1col.png',
												),
	
											 array(
												'value' => 'left',
												'label' => __('Left Sidebar', SH_NAME),
												'img' => get_template_directory_uri().'/includes/vafpress/public/img/2cl.png',
												),
											 array(
												'value' => 'right',
												'label' => __('Right Sidebar', SH_NAME),
												'img' => get_template_directory_uri().'/includes/vafpress/public/img/2cr.png',
												),
			 
											),
										),
										array(
											'type' => 'select',
											'name' => 'search_sidebar',
											'label' => __('Sidebar', SH_NAME),
											'description' => __('Choose an sidebar for this', SH_NAME),
											'default' => '',
											'items' => sh_get_sidebars(true)	
										),

							),
						),
						array(
							'type' => 'section',
							'repeating' => true,
							'sortable'  => true,
							'title' => __('Tag Sidebar Settings', SH_NAME),
							'name' => 'sidebar_setting_section6',
							'description' => __('This section contains Tag Sidebar settings', SH_NAME),
							'fields' => array(
								array(
								'type' => 'radioimage',
								'name' => 'tag_sidebar_layout',
								'label' => __('Tag Sidebar', SH_NAME),
								'description' => '',
								'items' => array(
											 array(
												'value' => 'full',
												'label' => __('Full Width', SH_NAME),
												'img' => get_template_directory_uri().'/includes/vafpress/public/img/1col.png',
												),
	
											 array(
												'value' => 'left',
												'label' => __('Left Sidebar', SH_NAME),
												'img' => get_template_directory_uri().'/includes/vafpress/public/img/2cl.png',
												),
											 array(
												'value' => 'right',
												'label' => __('Right Sidebar', SH_NAME),
												'img' => get_template_directory_uri().'/includes/vafpress/public/img/2cr.png',
												),
			 
											),
										),
										array(
											'type' => 'select',
											'name' => 'tag_sidebar',
											'label' => __('Sidebar', SH_NAME),
											'description' => __('Choose an sidebar for this', SH_NAME),
											'default' => '',
											'items' => sh_get_sidebars(true)	
										),

							),
						),
												array(
							'type' => 'section',
							'repeating' => true,
							'sortable'  => true,
							'title' => __('Single post page sidebar', SH_NAME),
							'name' => 'sidebar_setting_section7',
							'description' => __('This section contains Single post page Sidebar settings', SH_NAME),
							'fields' => array(
								array(
								'type' => 'radioimage',
								'name' => 'single_post_sidebar_layout',
								'label' => __('Product Category Sidebar', SH_NAME),
								'description' => '',
								'items' => array(
											 array(
												'value' => 'full',
												'label' => __('Full Width', SH_NAME),
												'img' => get_template_directory_uri().'/includes/vafpress/public/img/1col.png',
												),
	
											 array(
												'value' => 'left',
												'label' => __('Left Sidebar', SH_NAME),
												'img' => get_template_directory_uri().'/includes/vafpress/public/img/2cl.png',
												),
											 array(
												'value' => 'right',
												'label' => __('Right Sidebar', SH_NAME),
												'img' => get_template_directory_uri().'/includes/vafpress/public/img/2cr.png',
												),
			 
											),
										),
										array(
											'type' => 'select',
											'name' => 'single_post_sidebar',
											'label' => __('Sidebar', SH_NAME),
											'description' => __('Choose an sidebar for this', SH_NAME),
											'default' => '',
											'items' => sh_get_sidebars(true)	
										),

							),
						),
						array(
							'type' => 'section',
							'repeating' => true,
							'sortable'  => true,
							'title' => __('Product Category Sidebar Settings', SH_NAME),
							'name' => 'sidebar_setting_section8',
							'description' => __('This section contains Product Category Sidebar settings', SH_NAME),
							'fields' => array(
								array(
								'type' => 'radioimage',
								'name' => 'product_category_sidebar_layout',
								'label' => __('Product Category Sidebar', SH_NAME),
								'description' => '',
								'items' => array(
											 array(
												'value' => 'full',
												'label' => __('Full Width', SH_NAME),
												'img' => get_template_directory_uri().'/includes/vafpress/public/img/1col.png',
												),
	
											 array(
												'value' => 'left',
												'label' => __('Left Sidebar', SH_NAME),
												'img' => get_template_directory_uri().'/includes/vafpress/public/img/2cl.png',
												),
											 array(
												'value' => 'right',
												'label' => __('Right Sidebar', SH_NAME),
												'img' => get_template_directory_uri().'/includes/vafpress/public/img/2cr.png',
												),
			 
											),
										),
										array(
											'type' => 'select',
											'name' => 'product_category_sidebar',
											'label' => __('Sidebar', SH_NAME),
											'description' => __('Choose an sidebar for this', SH_NAME),
											'default' => '',
											'items' => sh_get_sidebars(true)	
										),

							),
						),
				)
			),
			
			
		/** Contact Settings */
		array(
				'title' => __('Contact Settings', SH_NAME),
				'name' => 'contact_settings',
				'icon' => 'font-awesome:icon-envelope',
				'controls' => array(
					array(
						'type'      => 'toggle',
						'name'      => 'contact_captcha_status',
						'label'     => __('Captcha Status', SH_NAME),
						'description' => '',
						'default'	=> '',
					),
					array(
						'type'      => 'textarea',
						'name'      => 'google_map',
						'label'     => __('Google Map Code', SH_NAME),
						'description' => '',
						'default'	=> '',
					),
				)
			),
			
		/** Social Network Settings */
		array(
				'title' => __('Socializing Settings', SH_NAME),
				'name' => 'socializing_settings',
				'icon' => 'font-awesome:icon-share-sign',
				'controls' => array(
					
					array(
						'type' => 'builder',
						'repeating' => true,
						'sortable'  => true,
						'label' => __('Social Icons', SH_NAME),
						'name' => 'social_icons',
						'description' => __('This section is used for theme color settings', SH_NAME),
						'fields' => array(
							array(
								'type' => 'select',
								'name' => 'icon',
								'label' => __('Social Icon', SH_NAME),
								
								'default' => 'facebook',
								'items' => array(
									'data' => array(
										array(
											'source' => 'function',
											'value' => 'vp_get_social_medias',
										),
									),
								),
							),
							array(
								'type' => 'textbox',
								'name' => 'title',
								'label' => __('Title', SH_NAME),
								
								'default' => '',
							),
							array(
								'type' => 'textbox',
								'name' => 'link',
								'label' => __('URL', SH_NAME),
								
								'default' => '',

							),
							
						),
					),
					
					
				)
			),
		
		
		/** Font settings */	
		array(
				'title' => __('Font Settings', SH_NAME),
				'name' => 'font_settings',
				'icon' => 'font-awesome:icon-font',
				'menus' => array(
					
					/** heading font settings */
					array(
						'title' => __('Heading Font', SH_NAME),
						'name' => 'heading_font_settings',
						'icon' => 'font-awesome:icon-text-height',
						
						'controls' => array(
							
							array(
								'type' => 'toggle',
								'name' => 'use_custom_font',
								'label' => __('Use Custom Font', SH_NAME),
								'description' => __('Use custom font or not', SH_NAME),
							),
							array(
								'type'  => 'section',
								'title' => __('H1 Settings', SH_NAME),
								'name'  => 'h1_settings',
								'description' => __('heading 1 font settings', SH_NAME),
								'dependency' => array(
									'field' => 'use_custom_font',
									'function' => 'vp_dep_boolean',
								),
								'fields' => array(
									array(
										'type' => 'slider',
										'label' => __('Font Size', SH_NAME),
										'name' => 'h1_font_size',
										'description' => __('Choose the font size for h1', SH_NAME),
										'default'=>'38.5',
										'min' => 12,
										'max' => 50
									),
									array(
										'type' => 'select',
										'label' => __('Font Family', SH_NAME),
										'name' => 'h1_font_family',
										'description' => __('Select the font family to use for h1', SH_NAME),
										'items' => array(
											'data' => array(
												array(
													'source' => 'function',
													'value' => 'vp_get_gwf_family',
												),
											),
										),
										
									),
									array(
										'type' => 'radiobutton',
										'name' => 'h1_font_style',
										'label' => __('Font Style', SH_NAME),
										'description' => __('Select Font Style', SH_NAME),
										'items' => array(
											'data' => array(
												array(
													'source' => 'binding',
													'field' => 'h1_font_family',
													'value' => 'vp_get_gwf_style',
												),
											),
										),
										'default' => array(
											'{{first}}',
										),
									),
									array(
										'type' => 'radiobutton',
										'name' => 'h1_font_weight',
										'label' => __('Font Weight', SH_NAME),
										'description' => __('Select Font Weight', SH_NAME),
										'items' => array(
											'data' => array(
												array(
													'source' => 'binding',
													'field' => 'h1_font_family',
													'value' => 'vp_get_gwf_weight',
												),
											),
										),
									),
									array(
										'type' => 'color',
										'name' => 'h1_font_color',
										'label' => __('Font Color', SH_NAME),
										'description' => __('Choose the font color for heading h1', SH_NAME),
										'default' => '#98ed28',
									),
								),
							),
							array(
								'type'  => 'section',
								'title' => __('H2 Settings', SH_NAME),
								'name'  => 'h2_settings',
								'description' => __('heading h2 font settings', SH_NAME),
								'dependency' => array(
									'field' => 'use_custom_font',
									'function' => 'vp_dep_boolean',
								),
								'fields' => array(
									array(
										'type' => 'slider',
										'label' => __('Font Size', SH_NAME),
										'name' => 'h2_font_size',
										'description' => __('Choose the font size for h2', SH_NAME),
										'default'=>'34.5',
										'min' => 12,
										'max' => 50
									),
									array(
										'type' => 'select',
										'label' => __('Font Family', SH_NAME),
										'name' => 'h2_font_family',
										'description' => __('Select the font family to use for h2', SH_NAME),
										'items' => array(
											'data' => array(
												array(
													'source' => 'function',
													'value' => 'vp_get_gwf_family',
												),
											),
										),
										
									),
									array(
										'type' => 'radiobutton',
										'name' => 'h2_font_style',
										'label' => __('Font Style', SH_NAME),
										'description' => __('Select Font Style', SH_NAME),
										'items' => array(
											'data' => array(
												array(
													'source' => 'binding',
													'field' => 'h2_font_family',
													'value' => 'vp_get_gwf_style',
												),
											),
										),
										'default' => array(
											'{{first}}',
										),
									),
									array(
										'type' => 'radiobutton',
										'name' => 'h2_font_weight',
										'label' => __('Font Weight', SH_NAME),
										'description' => __('Select Font Weight', SH_NAME),
										'items' => array(
											'data' => array(
												array(
													'source' => 'binding',
													'field' => 'h2_font_family',
													'value' => 'vp_get_gwf_weight',
												),
											),
										),
									),
									array(
										'type' => 'color',
										'name' => 'h2_font_color',
										'label' => __('Font Color', SH_NAME),
										'description' => __('Choose the font color for heading h1', SH_NAME),
										'default' => '#98ed28',
									),
								),
							),
							array(
								'type'  => 'section',
								'title' => __('H3 Settings', SH_NAME),
								'name'  => 'h3_settings',
								'description' => __('heading h3 font settings', SH_NAME),
								'dependency' => array(
									'field' => 'use_custom_font',
									'function' => 'vp_dep_boolean',
								),
								'fields' => array(
									array(
										'type' => 'slider',
										'label' => __('Font Size', SH_NAME),
										'name' => 'h3_font_size',
										'description' => __('Choose the font size for h3', SH_NAME),
										'default'=>'30.5',
										'min' => 12,
										'max' => 50
									),
									array(
										'type' => 'select',
										'label' => __('Font Family', SH_NAME),
										'name' => 'h3_font_family',
										'description' => __('Select the font family to use for h3', SH_NAME),
										'items' => array(
											'data' => array(
												array(
													'source' => 'function',
													'value' => 'vp_get_gwf_family',
												),
											),
										),
										
									),
									array(
										'type' => 'radiobutton',
										'name' => 'h3_font_style',
										'label' => __('Font Style', SH_NAME),
										'description' => __('Select Font Style', SH_NAME),
										'items' => array(
											'data' => array(
												array(
													'source' => 'binding',
													'field' => 'h3_font_family',
													'value' => 'vp_get_gwf_style',
												),
											),
										),
										'default' => array(
											'{{first}}',
										),
									),
									array(
										'type' => 'radiobutton',
										'name' => 'h3_font_weight',
										'label' => __('Font Weight', SH_NAME),
										'description' => __('Select Font Weight', SH_NAME),
										'items' => array(
											'data' => array(
												array(
													'source' => 'binding',
													'field' => 'h3_font_family',
													'value' => 'vp_get_gwf_weight',
												),
											),
										),
									),
									array(
										'type' => 'color',
										'name' => 'h3_font_color',
										'label' => __('Font Color', SH_NAME),
										'description' => __('Choose the font color for heading h3', SH_NAME),
										'default' => '#98ed28',
									),
								),
							),
						)
					),
					
					/** body font settings */
					array(
						'title' => __('Body Font', SH_NAME),
						'name' => 'body_font_settings',
						'icon' => 'font-awesome:icon-text-width',
						'controls' => array(
							array(
								'type' => 'toggle',
								'name' => 'body_custom_font',
								'label' => __('Use Custom Font', SH_NAME),
								'description' => __('Use custom font or not', SH_NAME),
							),
							array(
								'type'  => 'section',
								'title' => __('Body Font Settings', SH_NAME),
								'name'  => 'body_font_settings',
								'description' => __('body font settings', SH_NAME),
								'dependency' => array(
									'field' => 'body_custom_font',
									'function' => 'vp_dep_boolean',
								),
								'fields' => array(
									array(
										'type' => 'slider',
										'label' => __('Font Size', SH_NAME),
										'name' => 'body_font_size',
										'description' => __('Choose the font size for body area', SH_NAME),
										'default'=>'14',
										'min' => 12,
										'max' => 50
									),
									array(
										'type' => 'select',
										'label' => __('Font Family', SH_NAME),
										'name' => 'body_font_family',
										'description' => __('Select the font family to use for body', SH_NAME),
										'items' => array(
											'data' => array(
												array(
													'source' => 'function',
													'value' => 'vp_get_gwf_family',
												),
											),
										),
										
									),
									array(
										'type' => 'radiobutton',
										'name' => 'body_font_style',
										'label' => __('Font Style', SH_NAME),
										'description' => __('Select Font Style', SH_NAME),
										'items' => array(
											'data' => array(
												array(
													'source' => 'binding',
													'field' => 'body_font_family',
													'value' => 'vp_get_gwf_style',
												),
											),
										),
										'default' => array(
											'{{first}}',
										),
									),
									array(
										'type' => 'radiobutton',
										'name' => 'body_font_weight',
										'label' => __('Font Weight', SH_NAME),
										'description' => __('Select Font Weight', SH_NAME),
										'items' => array(
											'data' => array(
												array(
													'source' => 'binding',
													'field' => 'body_font_family',
													'value' => 'vp_get_gwf_weight',
												),
											),
										),
									),
									array(
										'type' => 'color',
										'name' => 'body_font_color',
										'label' => __('Font Color', SH_NAME),
										'description' => __('Choose the font color for heading body', SH_NAME),
										'default' => '#98ed28',
									),
								),
							),
						)
					)
					
					
					
					
					
				)
		),
		
		/** Blog Listing Settings */
		array(
				'title' => __('Blog Settings', SH_NAME),
				'name' => 'blog_page_settings',
				'icon' => 'font-awesome:icon-rss',
				'controls' => array(
					
					array(
						'type' => 'radioimage',
						'name' => 'blog_layout',
						'label' => __('Blog Listing Layout', SH_NAME),
						'description' => __('Choose the layout for blog pages', SH_NAME),
						'items' => array(
							array(
								'value' => 'left',
								'label' => __('Blog with Left Sidebar', SH_NAME),
								'img' => get_template_directory_uri().'/includes/vafpress/public/img/2cl.png',
							),
							array(
								'value' => 'right',
								'label' => __('Blog with Right Sidebar', SH_NAME),
								'img' => get_template_directory_uri().'/includes/vafpress/public/img/2cr.png',
							),
							array(
								'value' => 'full',
								'label' => __('Full Width', SH_NAME),
								'img' => get_template_directory_uri().'/includes/vafpress/public/img/1col.png',
							),
							
						),
					),
					array(
						'type' => 'select',
						'name' => 'blog_sidebar',
						'label' => __('Sidebar', SH_NAME),
						
						'items' => sh_get_sidebars(true),
						
					),
				)
		),
	)
);



/**
 *EOF
 */