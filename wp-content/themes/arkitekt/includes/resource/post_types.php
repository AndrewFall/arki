<?php

$options = array();

$options['sh_service'] = array(
								'labels' => array(__('Service', SH_NAME), __('Services', SH_NAME)),
								'slug' => 'service',
								'label_args' => array('menu_name' => __('Services', SH_NAME)),
								'supports' => array( 'title', 'editor', 'thumbnail'),
								'label' => __('Services', SH_NAME),
								'args'=>array('menu_icon'=>'dashicons-slides')
							);
$options['sh_portfolio'] = array(
								'labels' => array(__('Portfolio', SH_NAME), __('Portfolios', SH_NAME)),
								'slug' => 'portfolio',
								'label_args' => array('menu_name' => __('Portfolio', SH_NAME)),
								'supports' => array( 'title', 'editor', 'thumbnail'),
								'label' => __('Portfolios', SH_NAME),
								'args'=>array('menu_icon'=>'dashicons-portfolio')
							);

$options['sh_testimonial'] = array(
								'labels' => array(__('Testimonial', SH_NAME), __('Testimonials', SH_NAME)),
								'slug' => 'testimonial',
								'label_args' => array('menu_name' => __('Testimonials', SH_NAME)),
								'supports' => array( 'title', 'editor', 'thumbnail'),
								'label' => __('Testimonials', SH_NAME),
								'args'=>array('menu_icon'=>'dashicons-feedback')
							);

$options['sh_team'] = array(
								'labels' => array(__('Member', SH_NAME), __('Members', SH_NAME)),
								'slug' => 'member',
								'label_args' => array('menu_name' => __('Teams', SH_NAME)),
								'supports' => array( 'title', 'editor', 'thumbnail'),
								'label' => __('Members', SH_NAME),
								'args'=>array('menu_icon'=>'dashicons-groups')
							);



