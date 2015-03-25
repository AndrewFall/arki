<?php
$options = array();
$options[] =  array(
	'id'          => 'sh_post_meta',
	'types'       => array('post'),
	'title'       => __('Post Settings', SH_NAME),
	'priority'    => 'high',
	'template'    => 
			array(
					array(
						'type'      => 'group',
						'repeating' => false,
						'length'    => 1,
						'name'      => 'sh_post_options',
						'title'     => __('General Post Settings', SH_NAME),
						'fields'    => 
						array(

							array(
								'type' => 'radioimage',
								'name' => 'layout',
								'label' => __('Page Layout', SH_NAME),
								'description' => __('Choose the layout for blog pages', SH_NAME),
								'items' => array(
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
									array(
										'value' => 'full',
										'label' => __('Full Width', SH_NAME),
										'img' => get_template_directory_uri().'/includes/vafpress/public/img/1col.png',
									),
									
								),
							),
							
							array(
								'type' => 'select',
								'name' => 'sidebar',
								'label' => __('Sidebar', SH_NAME),
								'default' => '',
								'items' => sh_get_sidebars(true)	
							),
							array(
								'type' => 'textarea',
								'name' => 'video',
								'label' => __('Video Embed Code', SH_NAME),
								'default' => '',
								'description' => __('If post format is video then this embed code will be used in content', SH_NAME)
							),
							array(
								'type' => 'textarea',
								'name' => 'audio',
								'label' => __('Audio Embed Code', SH_NAME),
								'default' => '',
								'description' => __('If post format is AUDIO then this embed code will be used in content', SH_NAME)
							),
							
						),
					),
				),
);

/* Page options */
$options[] =  array(
	'id'          => 'sh_page_meta',
	'types'       => array('page'),
	'title'       => __('Page Settings', SH_NAME),
	'priority'    => 'high',
	'template'    => 
			array(
					array(
						'type' => 'radioimage',
						'name' => 'layout',
						'label' => __('Page Layout', SH_NAME),
						'description' => __('Choose the layout for pages', SH_NAME),
						'items' => array(
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
							array(
								'value' => 'full',
								'label' => __('Full Width', SH_NAME),
								'img' => get_template_directory_uri().'/includes/vafpress/public/img/1col.png',
							),
							
						),
					),
					array(
								'type' => 'select',
								'name' => 'page_sidebar',
								'label' => __('Sidebar', SH_NAME),
								'default' => '',
								'items' => sh_get_sidebars(true)	
							),
				),
);
//downloads
$options[] =  array(
	'id'          => 'sh_download_meta',
	'types'       => array('download'),
	'title'       => __('Download Settings', SH_NAME),
	'priority'    => 'high',
	'template'    => 
			array(
					array(
						'type' => 'textbox',
						'name' => 'subtitle',
						'label' => __('Sub Title', SH_NAME),
						'default' => '',
					),
					array(
						'type' => 'upload',
						'name' => 'featured_image',
						'label' => __('Featured Image', SH_NAME),
						'default' => '',
						'description' => __('Featured image for detail download page', SH_NAME),
					),
					array(
						'type' => 'textbox',
						'name' => 'demo_link',
						'label' => __('Demo Link', SH_NAME),
						'default' => '',
					),
					array(
						'type' => 'textbox',
						'name' => 'version',
						'label' => __('Current Version', SH_NAME),
						'default' => '1.0',
					),
					array(
						'type' => 'date',
						'name' => 'release_date',
						'label' => __('Release Date', SH_NAME),
						'default' => '',
						'description' => __('Please choose the item release date', SH_NAME)
					),
					array(
						'type' => 'date',
						'name' => 'update_date',
						'label' => __('Update Date', SH_NAME),
						'default' => '',
						'description' => __('Please choose the date when the item is updated', SH_NAME)
					),
					array(
						'type' => 'textbox',
						'name' => 'author_name',
						'label' => __('Author', SH_NAME),
						'default' => '',
						'description' => __('Enter item\' Author Name', SH_NAME)
					),
					array(
						'type' => 'textbox',
						'name' => 'requirements',
						'label' => __('Requirements', SH_NAME),
						'default' => '',
						'description' => __('Please enter the neccessory things required for this item', SH_NAME)
					),
					array(
						'type' => 'toggle',
						'name' => 'show_features',
						'label' => __('Show Item Features', SH_NAME),
						'default' => 1,
					),
					array(
						'type' => 'textbox',
						'name' => 'feature_title',
						'label' => __('Feature Label', SH_NAME),
						'default' => __('Item Features', SH_NAME),
						'dependency' => array(
							'field' => 'show_features',
							'function' => 'vp_dep_boolean',
						),
					),
					array(
						'type' => 'textbox',
						'name' => 'feature_subtitle',
						'label' => __('Feature Sub Label', SH_NAME),
						'default' => __('Lets see all item features & updates below', SH_NAME),
						'dependency' => array(
							'field' => 'show_features',
							'function' => 'vp_dep_boolean',
						),
					),
					array(
						'type'      => 'group',
						'repeating' => true,
						'sortable'  => true,
						'length'    => 1,
						'name'      => 'item_features',
						'title'     => __('Item Features', SH_NAME),
						'dependency' => array(
							'field' => 'show_features',
							'function' => 'vp_dep_boolean',
						),
						'fields'    => 
						array(

							array(
								'type' => 'textbox',
								'name' => 'feature',
								'label' => __('Features', SH_NAME),
								'default' => '',
							),
							array(
								'type' => 'fontawesome',
								'name' => 'icon',
								'label' => __('Icon', SH_NAME),
								'default' => '',
								'description' => __('Choose icon that best represent the item feature', SH_NAME)
							),
							array(
								'type' => 'textarea',
								'name' => 'desc',
								'label' => __('Feature Description', SH_NAME),
								'default' => '',
							),
							
						),
					),
				),
);

/** Portfolio Options */
$options[] =  array(
	'id'          => 'sh_portfolio_meta',
	'types'       => array('sh_portfolio'),
	'title'       => __('Portfolio Options', SH_NAME),
	'priority'    => 'high',
	'template'    => array(
		array(
			'type'      => 'group',
			'repeating' => false,
			'length'    => 1,
			'name'      => 'sh_portfolio_type',
			'title'     => __('Portfolio Type', SH_NAME),
			'fields'    => array(
				array(
					'type' => 'select',
					'name' => 'type',
					'label' => __('Type', SH_NAME),
					'default' => '',
					'items' => array(
						array('value' => 'image', 'label' => __('Image', SH_NAME ) ),
						array('value' => 'slider', 'label' => __('Slider', SH_NAME ) ),
						array('value' => 'video', 'label' => __('Video', SH_NAME ) ),
					),
					'description' => __('Choose the portfolio Type', SH_NAME)
				),
				array(
					'type' => 'textarea',
					'name' => 'video',
					'label' => __('Video Embed Code', SH_NAME),
					'description' => __('Enter the video embed code', SH_NAME),
					'dependency' => array(
						'field'    => 'type',
						'function' => 'sh_dep_pb_dropdown',
					),
				),
				
			),
		),
		array(
			'type'      => 'group',
			'repeating' => false,
			'length'    => 1,
			'name'      => 'sh_page_options',
			'title'     => __('Portfolio Information', SH_NAME),
			'fields'    => array(
				array(
					'type' => 'select',
					'name' => 'sidebar',
					'label' => __('Sidebar', SH_NAME),
					'default' => '',
					'items' => sh_get_sidebars(true)
				),
				array(
					'type' => 'select',
					'name' => 'position',
					'label' => __('Content Position', SH_NAME),
					'items' => array(
						array('value' => 'left', 'label' => __('Left', SH_NAME) ),
						array('value' => 'right', 'label' => __('Right', SH_NAME) ),
					),
					'default' => 'left',
				),
				array(
					'type' => 'date',
					'name' => 'date',
					'label' => __('Release Date', SH_NAME),
					'default' => '',
				),
				array(
					'type' => 'textbox',
					'name' => 'client_name',
					'label' => __('Client Name', SH_NAME),
					'default' => '',
				),
				array(
					'type' => 'textbox',
					'name' => 'demo_link',
					'label' => __('Client URL', SH_NAME),
					'default' => 'http://example.com',
				),
				array(
					'type' => 'textbox',
					'name' => 'author',
					'label' => __('Author', SH_NAME),
					'default' => 'Derek Andorson',
				),
				array(
					'type' => 'textbox',
					'name' => 'website',
					'label' => __('Webstie URL', SH_NAME),
					'default' => 'http://example.com',
				),
			),
		),
		array(
			'type'      => 'group',
			'repeating' => true,
			'sortable'  => true,
			'name'      => 'sh_skills',
			'title'     => __('Skills', SH_NAME),
			'fields'    => array(
				array(
					'type' => 'textbox',
					'name' => 'skill',
					'label' => __('Skill', SH_NAME),
					'default' => '',
				),
				array(
					'type' => 'textbox',
					'name' => 'link',
					'label' => __('URL', SH_NAME),
					'default' => 'http://example.com',
				),
			),
		),
	),
);


/** Team meta*/
$options[] =  array(
	'id'          => '_sh_team_meta',
	'types'       => array('sh_team'),
	'title'       => __('Team Settings', SH_NAME),
	'priority'    => 'high',
	'template'    => array(
			   array(
					'type' => 'textbox',
					'name' => 'designation',
					'label' => __('Designation', SH_NAME),
					'description' => __('Enter the designation of the member', SH_NAME),
					'default' => '',
				),
			   array(
					'type'      => 'group',
					'repeating' => true,
					'sortable'  => true,
					'length'    => 1,
					'name'      => 'social_icon_group',
					'title'     => __('Social icons', SH_NAME),
					
					'fields'    => 
					array(

						array(
							'type' => 'textbox',
							'name' => 'title',
							'label' => __('Title', SH_NAME),
							'default' => '',
						),
						array(
							'type' => 'textbox',
							'name' => 'social_url',
							'label' => __('URL', SH_NAME),
							'default' => '',
						),
						array(
								'type' => 'select',
								'name' => 'social_icon',
								'label' => __('Social icon', SH_NAME),
								'description' => __('Choose the social icon from the list', SH_NAME),
								'default' => '',
								'items' => array(
									'data' => array(
												array(
           												'source' => 'function',
           												'value' => 'vp_get_social_medias',
         											   ),
         											),
        										 ),
						),
						
					),
				),
				
				
	),
);



/** Testimonial Options*/
$options[] =  array(
	'id'          => 'sh_testimonial_options',
	'types'       => array('sh_testimonial'),
	'title'       => __('Testimonials Options', SH_NAME),
	'priority'    => 'high',
	'template'    => array(
				array(
					'type' => 'textbox',
					'name' => 'author',
					'label' => __('Author', SH_NAME),
					'default' => 'John Baba g',
				),
				
				array(
					'type' => 'textbox',
					'name' => 'designation',
					'label' => __('Designation', SH_NAME),
					'default' => '',
				),
				array(
					'type' => 'textbox',
					'name' => 'company',
					'label' => __('Company', SH_NAME),
					'default' => 'Artex',
				),
				
	),
);

/** Partner Options Options*/
$options[] =  array(
	'id'          => 'sh_partner_meta',
	'types'       => array('sh_partner'),
	'title'       => __('Partner Options', SH_NAME),
	'priority'    => 'high',
	'template'    => array(
						
			array(
				'type' => 'textbox',
				'name' => 'link',
				'label' => __('Partner URL', SH_NAME),
				'default' => '',
			),
	),
);

$options[] =  array(
	'id'          => 'sh_services_option',
	'types'       => array( 'sh_service' ),
	'title'       => __('Service Settings', SH_NAME),
	'priority'    => 'high',
	'template'    => 

			array(
				
				array(
					'type' => 'fontawesome',
					'name' => 'fontawesome',
					'label' => __('Service Icon', SH_NAME),
					'default' => '',
				),
				
				
	),
);

 
 return $options;
 
 
 
 
 
 
 
 