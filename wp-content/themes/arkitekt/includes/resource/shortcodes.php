<?php

$options = array();

$options['team'][]	=		array(
									'type' => 'text',
									'id' => 'title',
									'title' => __('Title', SH_NAME),
									'class' => 'input-block-level',
								);

$options['team'][]	=		array(
									'type' => 'text',
									'id' => 'number',
									'title' => __('Number of Members', SH_NAME),
									'desc' => __('Enter the number of members to show', SH_NAME),
									'class' => 'input-small',
								);
$options['team'][]	=		array(
									'type' => 'select',
									'id' => 'orderby',
									'title' => __('Order By', SH_NAME),
									'options' => array('rand'=>'Random', 'title'=>'Title', 'date'=>'Date'),
									'desc' => __('Choose the Sorting ooption', SH_NAME),
									'class' => 'input-block-level',
								);
$options['team'][]	=		array(
									'type' => 'select',
									'id' => 'order',
									'title' => __('Order', SH_NAME),
									'options' => array('ASC'=>'Ascending', 'DESC'=>'Descending'),
									'desc' => __('Whether sort by Ascending or Descending', SH_NAME),
									'class' => 'input-block-level',
								);
$options['services'][]	=		array(
									'type' => 'text', 
									'id' => 'title',
									'title' => __('Title', SH_NAME),
									'desc' => __('Enter the heading of services listing', SH_NAME),
									'class' => 'input-block-level',
								);
$options['services'][]	=		array(
									'type' => 'text', 
									'id' => 'number',
									'title' => __('Number', SH_NAME),
									'desc' => __('Enter the number of services posts to show', SH_NAME),
									'class' => 'input-small',
								);
$options['services'][]	=		array(
									'type' => 'select', 
									'id' => 'orderby',
									'title' => __('Order By', SH_NAME),
									'class' => 'input-block-level',
									'options' => array('date'=>'Date', 'title'=>'Title', 'name'=>'Name', 'author'=>'Author', 'rand'=>'Random', 'comment_count'=>'Comments Count')		
								);
$options['services'][]	=		array(
									'type' => 'select',
									'id' => 'order',
									'title' => __('Order', SH_NAME),
									'class' => 'input-block-level',
									'options' => array('asc' => 'Accending', 'desc' => 'Descending')
								);
$options['services'][]	=	 	array(
									'type' => 'select',
									'id' => 'column',
									'title' => __('Column Per Row', SH_NAME),
									'class' => 'input-block-level',
									'options' => array('2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5')
								);


$options['faqs'][]	=		array(
									'type' => 'text', 
									'id' => 'title',
									'title' => __('Title', SH_NAME),
									'desc' => __('Enter the heading of faqs listing', SH_NAME),
									'class' => 'input-block-level',
								);
$options['faqs'][]	=		array(
									'type' => 'text', 
									'id' => 'number',
									'title' => __('Number', SH_NAME),
									'desc' => __('Enter the number of faqs posts to show', SH_NAME),
									'class' => 'input-small',
								);
$options['faqs'][]	=		array(
									'type' => 'select', 
									'id' => 'orderby',
									'title' => __('Order By', SH_NAME),
									'class' => 'input-block-level',
									'options' => array('date'=>'Date', 'title'=>'Title', 'name'=>'Name', 'author'=>'Author', 'rand'=>'Random', 'comment_count'=>'Comments Count')		
								);
$options['faqs'][]	=		array(
									'type' => 'select',
									'id' => 'order',
									'title' => __('Order', SH_NAME),
									'class' => 'input-block-level',
									'options' => array('asc' => 'Accending', 'desc' => 'Descending')
								);
$options['contact'][]	=		array(
									'type' => 'text',
									'id' => 'title',
									'title' => __('Heading', SH_NAME),
									'class' => 'input-block-level',
								);
$options['google_map'][]	=		array();

$options['blockquote'][]	=	array(
									'type' => 'textarea',
									'id' => 'content',
									'title' => __('Content', SH_NAME),
									'class' => 'input-block-level',
								);

$options['ulist'][]	=		  array(
									'type' => 'select',
									'id' => 'first',
									'title' => __('First?', SH_NAME),
									'options'=> array('false'=>__('False', SH_NAME), 'true'=>__('True', SH_NAME)),
									'class' => 'input-block-level',
								);
$options['ulist'][]	=		  array(
									'type' => 'select',
									'id' => 'last',
									'title' => __('Last?', SH_NAME),
									'options'=> array('false'=>__('False', SH_NAME), 'true'=>__('True', SH_NAME)),
									'class' => 'input-block-level',
								);
$options['ulist'][]	=		   array(
									'type' => 'select',
									'id' => 'type',
									'title' => __('Type', SH_NAME),
									'options'=> array('check'=>__('Check', SH_NAME), 'arrow'=>__('Arrow', SH_NAME), 'arrow2'=>__('Arrow 2', SH_NAME), 'arrow3'=>__('Arrow 3', SH_NAME)
												, 'arrow4'=>__('Arrow 4', SH_NAME), 'star'=>__('Star', SH_NAME), 'plus'=>__('Plus', SH_NAME)),		
									'class' => 'input-block-level',
								);
$options['ulist'][]	=		   array(
									'type' => 'textarea',
									'id' => 'content',
									'title' => __('Content', SH_NAME),
									'class' => 'input-block-level',
								);


$options['toggle'][]	=		array(
									'type' => 'text',
									'id' => 'title',
									'title' => __('Title', SH_NAME),
									'class' => 'input-block-level',
								);
$options['toggle'][]	=		  array(
									'type' => 'select',
									'id' => 'first',
									'title' => __('First?', SH_NAME),
									'options'=> array('false'=>__('False', SH_NAME), 'true'=>__('True', SH_NAME)),
									'class' => 'input-block-level',
								);
$options['toggle'][]	=		  array(
									'type' => 'select',
									'id' => 'last',
									'title' => __('Last?', SH_NAME),
									'options'=> array('false'=>__('False', SH_NAME), 'true'=>__('True', SH_NAME)),
									'class' => 'input-block-level',
								);
$options['toggle'][]	=		array(
									'type' => 'textarea',
									'id' => 'content',
									'title' => __('Content', SH_NAME),
									'class' => 'input-block-level',
								);

$options['slider'][]	=		array(
									'type' => 'text',
									'id' => 'title',
									'title' => __('Title', SH_NAME),
									'class' => 'input-block-level',
								);
$options['slider'][]	=		array(
									'type' => 'text',
									'id' => 'image',
									'title' => __('Image URL', SH_NAME),
									'class' => 'input-block-level',
								);
$options['slider'][]	=		  array(
									'type' => 'select',
									'id' => 'first',
									'title' => __('First?', SH_NAME),
									'options'=> array('false'=>__('False', SH_NAME), 'true'=>__('True', SH_NAME)),
									'class' => 'input-block-level',
								);
$options['slider'][]	=		  array(
									'type' => 'select',
									'id' => 'last',
									'title' => __('Last?', SH_NAME),
									'options'=> array('false'=>__('False', SH_NAME), 'true'=>__('True', SH_NAME)),
									'class' => 'input-block-level',
								);
$options['slider'][]	=		array(
									'type' => 'textarea',
									'id' => 'content',
									'title' => __('Content', SH_NAME),
									'class' => 'input-block-level',
								);

$options['button'][]	=		array(
									'type' => 'text',
									'id' => 'title',
									'title' => __('Title', SH_NAME),
									'class' => 'input-block-level',
								);
$options['button'][]	=		array(
									'type' => 'select',
									'id' => 'style',
									'title' => __('Button Style', SH_NAME),
									'options' => array(''=>'None', 'info'=>'Info', 'danger'=>'Red Alert', 'inverse'=>'Black Inverse', 'primary'=>'Blue Primary',
												'genera'=>'General', 'success' => 'Success', 'warning'=>'Warning'),
									'class' => 'input-block-level',
								);
$options['button'][]	=		array(
									'type' => 'select',
									'id' => 'type',
									'title' => __('Button Type', SH_NAME),
									'options' => array('button'=>'Button', 'submit'=>'Submit'),
									'class' => 'input-block-level',
								);
$options['button'][]	=		array(
									'type' => 'text',
									'id' => 'id',
									'title' => __('Button id', SH_NAME),
									'class' => 'input-small',
								);
$options['button_large'][]	=		array(
											'type' => 'text',
											'id' => 'title',
											'title' => __('Title', SH_NAME),
											'class' => 'input-block-level',
										);
$options['button_large'][]	=		array(
											'type' => 'select',
											'id' => 'style',
											'title' => __('Button Style', SH_NAME),
											'options' => array(''=>'None', 'info'=>'Info', 'danger'=>'Red Alert', 'inverse'=>'Black Inverse', 'primary'=>'Blue Primary',
														'genera'=>'General', 'success' => 'Success', 'warning'=>'Warning'),
											'class' => 'input-block-level',
										);
$options['button_large'][]	=		array(
											'type' => 'select',
											'id' => 'type',
											'title' => __('Button Type', SH_NAME),
											'options' => array('button'=>'Button', 'submit'=>'Submit'),
											'class' => 'input-block-level',
										);
$options['button_large'][]	=		array(
											'type' => 'text',
											'id' => 'id',
											'title' => __('Button id', SH_NAME),
											'class' => 'input-small',
										);

$options['font_awesome'][]	=		  array(
											'type' => 'select',
											'id' => 'type',
											'title' => __('Icon Type', SH_NAME),
											'options' => sh_set( $GLOBALS, '_font_awesome' ),
											'class' => 'input-block-level',
										);
$options['about'][]	=		  array(
											'type' => 'text',
											'id' => 'title',
											'title' => __('Title', SH_NAME),
											'class' => 'input-block-level',
										);
$options['about'][]	=		  array(
											'type' => 'textarea',
											'id' => 'text',
											'title' => __('Text', SH_NAME),
											'class' => 'input-block-level',
										);
$options['about'][]	=		  array(
											'type' => 'text',
											'id' => 'link',
											'title' => __('Link', SH_NAME),
											'class' => 'input-block-level',
										);
$options['Recent_Blog_Posts'][]	=		  array(
											'type' => 'text',
											'id' => 'title',
											'title' => __('Title', SH_NAME),
											'class' => 'input-block-level',
										);
$options['Recent_Blog_Posts'][]	=		  array(
											'type' => 'text',
											'id' => 'num',
											'title' => __('Number', SH_NAME),
											'class' => 'input-block-level',
										);
$options['Recent_Blog_Posts'][]	=		  array(
											'type' => 'select',
											'id' => 'cat',
											'title' => __('Category', SH_NAME),
											'class' => 'input-block-level',
											'options' => sh_get_categories()
										);
$options['Recent_Blog_Posts'][]	=		  array(
											'type' => 'select',
											'id' => 'sort',
											'title' => __('Sort By', SH_NAME),
											'class' => 'input-block-level',
											'options' => array('date'=>'Date', 'title'=>'Title', 'name'=>'Name', 'author'=>'Author', 'rand'=>'Random', 'comment_count'=>'Comments Count')
										);
$options['Services_sideBox'][]	=		  array(
											'type' => 'text',
											'id' => 'num',
											'title' => __('Number', SH_NAME),
											'class' => 'input-block-level',
										);
$options['Services_sideBox'][]	=		  array(
											'type' => 'select',
											'id' => 'cat',
											'title' => __('Category', SH_NAME),
											'class' => 'input-block-level',
											'options' => sh_get_categories()
										);
$options['Services_sideBox'][]	=		  array(
											'type' => 'select',
											'id' => 'sort',
											'title' => __('Sort By', SH_NAME),
											'class' => 'input-block-level',
											'options' => array('date'=>'Date', 'title'=>'Title', 'name'=>'Name', 'author'=>'Author', 'rand'=>'Random', 'comment_count'=>'Comments Count')
										);
$options['Welcome_Box'][]	=		  array(
											'type' => 'text',
											'id' => 'title',
											'title' => __('Title', SH_NAME),
											'class' => 'input-block-level',
										);
$options['Welcome_Box'][]	=		  array(
											'type' => 'text',
											'id' => 'image',
											'title' => __('Upload Image', SH_NAME),
											'class' => 'input-block-level',
										);

$options['Welcome_Box'][]	=		  array(
											'type' => 'textarea',
											'id' => 'text',
											'title' => __('Welcome Text', SH_NAME),
											'class' => 'input-block-level',
										);
$options['Welcome_Box'][]	=		  array(
											'type' => 'text',
											'id' => 'fb',
											'title' => __('Facebook Link', SH_NAME),
											'class' => 'input-block-level',
										);
$options['Welcome_Box'][]	=		  array(
											'type' => 'text',
											'id' => 'twitter',
											'title' => __('Twitter Link', SH_NAME),
											'class' => 'input-block-level',
										);

$options['Welcome_Box'][]	=		  array(
											'type' => 'text',
											'id' => 'gplus',
											'title' => __('Gplus Link', SH_NAME),
											'class' => 'input-block-level',
										);
$options['Welcome_Box'][]	=		  array(
											'type' => 'text',
											'id' => 'github',
											'title' => __('GitHub Link', SH_NAME),
											'class' => 'input-block-level',
										);
$options['Welcome_Box'][]	=		  array(
											'type' => 'text',
											'id' => 'link',
											'title' => __('Read More Link', SH_NAME),
											'class' => 'input-block-level',
										);
$options['portfolio'][]	=		  array(
											'type' => 'text',
											'id' => 'title',
											'title' => __('Title', SH_NAME),
											'class' => 'input-block-level',
										);
$options['portfolio'][]	=		  array(
											'type' => 'text',
											'id' => 'link',
											'title' => __('Link', SH_NAME),
											'class' => 'input-block-level',
										);
$options['portfolio'][]	=		  array(
											'type' => 'select',
											'id' => 'cat',
											'title' => __('Category', SH_NAME),
											'class' => 'input-block-level',
											'options' => sh_get_categories()
										);
$options['portfolio'][]	=		  array(
											'type' => 'select',
											'id' => 'sort',
											'title' => __('Sort By :', SH_NAME),
											'class' => 'input-block-level',
											'options' => array('date'=>'Date', 'title'=>'Title', 'name'=>'Name', 'author'=>'Author', 'rand'=>'Random', 'comment_count'=>'Comments Count')
										);
$options['portfolio'][]	=		  array(
											'type' => 'text',
											'id' => 'number',
											'title' => __('Number', SH_NAME),
											'class' => 'input-block-level',
										);
$options['Get_Qoute'][]	=		  array(
											'type' => 'text',
											'id' => 'title',
											'title' => __('Title', SH_NAME),
											'class' => 'input-block-level',
										);
$options['Get_Qoute'][]	=		  array(
											'type' => 'textarea',
											'id' => 'text',
											'title' => __('Text', SH_NAME),
											'class' => 'input-block-level',
										);										
$options['Get_Qoute_2'][]	=		  array(
											'type' => 'text',
											'id' => 'title',
											'title' => __('Title', SH_NAME),
											'class' => 'input-block-level',
										);
$options['Get_Qoute_2'][]	=		  array(
											'type' => 'textarea',
											'id' => 'text',
											'title' => __('Text', SH_NAME),
											'class' => 'input-block-level',
										);
$options['portfolio_single_slide'][]	=		  array(
											'type' => 'select',
											'id' => 'cat',
											'title' => __('Category', SH_NAME),
											'class' => 'input-block-level',
											'options' => sh_get_categories()
										);
$options['portfolio_single_slide'][]	=		  array(
											'type' => 'select',
											'id' => 'sort',
											'title' => __('Sort By :', SH_NAME),
											'class' => 'input-block-level',
											'options' => array('date'=>'Date', 'title'=>'Title', 'name'=>'Name', 'author'=>'Author', 'rand'=>'Random', 'comment_count'=>'Comments Count')
										);
$options['portfolio_single_slide'][]	=		  array(
											'type' => 'text',
											'id' => 'number',
											'title' => __('Number', SH_NAME),
											'class' => 'input-block-level',
										);
										
										
