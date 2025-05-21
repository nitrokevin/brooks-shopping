<?php if (function_exists('acf_add_local_field_group')) {
include 'colors.php';
$color_array =  array(
	'#fefefe' => 'white',
	$primary_color => 'primary',
	$secondary_color => 'secondary',
	$light_gray => 'light-gray',
	$medium_gray => 'medium-gray',
	$dark_gray => 'dark-gray',
	$theme_color_1 => 'theme-color-1',
	$theme_color_2 => 'theme-color-2',
	$theme_color_3 => 'theme-color-3',
	$theme_color_4 => 'theme-color-4',
	'transparent' => 'transparent',
);

//Page Options
acf_add_local_field_group(array(
	'key' => 'group_5c756aae12c9d',
	'title' => 'Page Options',
	'fields' => array(
		
		array(
			'key' => 'field_slider_true_false',
			'label' => 'Header Slider',
			'name' => 'slider',
			'type' => 'true_false',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
	
		
		
		array(
			'key' => 'field_62540c6661c0f',
			'label' => 'Featured Slider',
			'name' => 'repeater_featured_slider',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(	
				array(
					'field' => 'field_5c812c928y139c1',
					'operator' => '==',
					'value' => '1',
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 1,
			'max' => 0,
			'layout' => 'block',
			'button_label' => 'Add slide',
			'sub_fields' => array(
				array(
					'key' => 'field_media_type',
					'label' => 'Media type',
					'name' => 'media_type',
					'type' => 'radio',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						1 => 'Image',
						2 => 'Video',
	
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'default_value' => 1,
					'layout' => 'horizontal',
					'return_format' => 'value',
					'save_other_choice' => 0,
				),
				
				array(
					'key' => 'field_slider_image',
					'label' => 'Slider image',
					'name' => 'slider_image',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(	
						array(
							'field' => 'field_media_type',
							'operator' => '==',
							'value' => '1',
						),
					),
					'wrapper' => array(
						'width' => '100',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'thumbnail',
					'library' => 'all',
				),
				array(
					'key' => 'field_slider_video_teaser',
					'label' => 'Slider video Teaser',
					'name' => 'slider_video_teaser',
					'type' => 'file',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(	
						array(
							'field' => 'field_media_type',
							'operator' => '==',
							'value' => '2',
						),
					),
					'wrapper' => array(
						'width' => '100',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'url',
					'library' => 'all',
					'min_size' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => 'field_slider_video_full',
					'label' => 'Slider video full',
					'name' => 'slider_video_full',
					'type' => 'file',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(	
						array(
							'field' => 'field_media_type',
							'operator' => '==',
							'value' => '2',
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'url',
					'library' => 'all',
					'min_size' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => 'field_slider_content',
					'label' => 'Slider Content',
					'name' => 'slider_content',
					'type' => 'wysiwyg',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'tabs' => 'visual',
					'toolbar' => 'full',
					'media_upload' => 1,
					'delay' => 0,
				),
			)
		),

			array(
			'key' => 'field_footer_image',
			'label' => 'Footer Image',
			'name' => 'footer_background_image',
			'type' => 'image',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'return_format' => 'array',
            'preview_size' => 'thumbnail',
            'library' => 'all',

		),
	
	
		
	),
	'location' => array(	
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => false,
));


//Post Options
acf_add_local_field_group(array(
	'key' => 'group_5c756aajksalhd',
	'title' => 'Post Options',
	'fields' => array(
		array(
			'key' => 'field_6kjdsjuyfhsoych',
			'label' => 'Link',
			'name' => 'link',
			'type' => 'page_link',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '100',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
	),
	'location' => array(	
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => false,
));

//Stores 
acf_add_local_field_group(array(
    'key' => 'group_stores',
    'title' => 'Store Details',
    'fields' => array(
		array(
            'key' => 'field_store_logo',
            'label' => 'Store logo',
            'name' => 'store_logo',
            'type' => 'image',
            'instructions' => 'Use svg logo',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '50',
                'class' => '',
                'id' => '',
            ),
            'return_format' => 'id',
            'preview_size' => 'thumbnail',
            'library' => 'all',
            'mime_types' => '',
        ),
		array(
            'key' => 'field_store_logo_white',
            'label' => 'Store logo (white)',
            'name' => 'store_logo_white',
            'type' => 'image',
            'instructions' => 'Use white svg logo only',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '50',
                'class' => '',
                'id' => '',
            ),
            'return_format' => 'id',
            'preview_size' => 'thumbnail',
            'library' => 'all',
            'mime_types' => 'svg',
        ),
        
        
        array(
            'key' => 'field_store_phone',
            'label' => 'Store Phone',
            'name' => 'store_phone',
            'type' => 'text',
            'min' => 0,
			   'wrapper' => array(
                'width' => '60',
                'class' => '',
                'id' => '',
            ),
            'layout' => 'block',
        ),
		  array(
			'key' => 'field_store_website',
			'label' => 'Store Website',
			'name' => 'store_website',
			'type' => 'url',
			'required' => 0,
			'return_format' => 'array',
			'conditional_logic' => 0,
			 'wrapper' => array(
                'width' => '60',
                'class' => '',
                'id' => '',
            ),
		),
		  array(
			'key' => 'field_store_instagram',
			'label' => 'Store Instagram',
			'name' => 'store_instagram',
			'type' => 'url',
			'required' => 0,
			'return_format' => 'array',
			'conditional_logic' => 0,
			 'wrapper' => array(
                'width' => '60',
                'class' => '',
                'id' => '',
            ),
		),
		  array(
			'key' => 'field_store_facebook',
			'label' => 'Store Facebook',
			'name' => 'store_facebook',
			'type' => 'url',
			'required' => 0,
			'return_format' => 'array',
			'conditional_logic' => 0,
			 'wrapper' => array(
                'width' => '60',
                'class' => '',
                'id' => '',
            ),
		),
		  array(
			'key' => 'field_store_x',
			'label' => 'Store X',
			'name' => 'store_x',
			'type' => 'url',
			'required' => 0,
			'return_format' => 'array',
			'conditional_logic' => 0,
			 'wrapper' => array(
                'width' => '60',
                'class' => '',
                'id' => '',
            ),
		),
		 array(
            'key' => 'field_store_opening',
            'label' => 'Opening Hours',
            'name' => 'store_opening',
            'type' => 'textarea',
            'min' => 0,
			   'wrapper' => array(
                'width' => '60',
                'class' => '',
                'id' => '',
            ),
            'layout' => 'block',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'stores',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'seamless',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
));



//Events
	acf_add_local_field_group(array(
		'key' => 'group_5d5458hgik9f20hg8269',
		'title' => 'Event Details',
		'fields' => array(
				
							array(
						'key' => 'field_524enbgcftgkb2arf746',
						'label' => 'Date',
						'name' => 'event_date',
						'type' => 'date_picker',
						'required' => 1,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '50',
							'class' => '',
							'id' => '',
						),
						'display_format' => 'd M',
						'return_format' => 'Y-m-d',
					
					),
						array(
						'key' => 'field_524enuhyugeskb2arf746',
						'label' => 'End Date',
						'name' => 'event_end_date',
						'type' => 'date_picker',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '50',
							'class' => '',
							'id' => '',
						),
						'display_format' => 'd M',
						'return_format' => 'Y-m-d',
					
					),
						
							array(
						'key' => 'field_524enbjhgcftgkb2arf746',
						'label' => 'Start time',
						'name' => 'start_time',
						'type' => 'time_picker',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '50',
							'class' => '',
							'id' => '',
						),
					
					),
							array(
						'key' => 'field_524enbgcftgbkkhjuhhgjvggkb2arf746',
						'label' => 'End time',
						'name' => 'end_time',
						'type' => 'time_picker',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '50',
							'class' => '',
							'id' => '',
						),
					
					),
					array(
						'key' => 'field_524eegjarf746',
						'label' => 'Location',
						'name' => 'location',
						'type' => 'text',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
									'width' => '50',
									'class' => '',
									'id' => '',
								),
					
					),
				
					
						array(
						'key' => 'field_524ehghb2arf746',
						'label' => 'Address',
						'name' => 'address',
						'type' => 'textarea',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '50',
							'class' => '',
							'id' => '',
						),
					
					),

							array(
						'key' => 'field_524ehghjegjarf746',
						'label' => 'Event Website',
						'name' => 'event_website',
						'type' => 'url',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
									'width' => '50',
									'class' => '',
									'id' => '',
								),
					
					),
					
					
			
					array(
						'key' => 'field_5c34erueh09djd86',
						'label' => 'Event Cost',
						'name' => 'event_cost',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '50',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'delay' => 0,
					),
					
			
		),
		'location' => array(
			array(
					array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'events',
			),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));


//Taxonomy
acf_add_local_field_group(array(
		'key' => 'group_612hfue8b653e98a1',
		
		'fields' => array(

			array(
				'key' => 'field_5c34bkdft9b32af86',
				'label' => 'Category Icon',
				'name' => 'category_icon',
				'type' => 'image',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				  'return_format' => 'array',
                'preview_size' => 'featured-medium',
                'library' => 'all',
				
			),

			),
		'location' => array(
			array(
				array(
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => 'store_category',
				),
			),

		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));

	acf_add_local_field_group(array(
		'key' => 'group_612hfue8b653edjhjs98a1',
		
		'fields' => array(

			array(
				'key' => 'field_5c34dhwkbkdft9b32af86',
				'label' => 'Category Image',
				'name' => 'category_image',
				'type' => 'image',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				  'return_format' => 'array',
                'preview_size' => 'featured-medium',
                'library' => 'all',
				
			),

			),
		'location' => array(
			array(
				array(
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => 'store_category',
				),
			),

		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));

//FAQ OPTIONS PAGE
acf_add_local_field_group(array(
	'key' => 'group_5d54589f208266',
	'title' => 'Options Page',
	'fields' => array(
		array(
			'key' => 'field_5c3j4ede232af66',
			'label' => 'Accordion',
			'name' => 'repeater_accordion',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'block',
			'button_label' => 'Add Section',
			'sub_fields' => array(
		array(
			'key' => 'field_5d49ad43a131e16',
			'label' => 'Section heading',
			'name' => 'section_heading',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		
		array(
			'key' => 'field_5c34ede232af66',
			'label' => 'Accordion Content',
			'name' => 'repeater_content_accordion',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'block',
			'button_label' => 'Add Accordion',
			'sub_fields' => array(
				array(
					'key' => 'field_5c34ee0032af76',
					'label' => 'Header',
					'name' => 'header',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '100',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),

				array(
					'key' => 'field_614b0df41e61b6',
					'label' => 'Categories',
					'name' => 'categories',
					'type' => 'taxonomy',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'taxonomy' => 'category',
					'field_type' => 'checkbox',
					'add_term' => 0,
					'save_terms' => 0,
					'load_terms' => 0,
					'return_format' => 'object',
					'multiple' => 0,
					'allow_null' => 0,
				),
				array(
					'key' => 'field_5c34ee0932af86',
					'label' => 'Content',
					'name' => 'content',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 1,
					'delay' => 0,
				),
			),
		),
	),
),
),

	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'faqs',
			),
		),
	),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
));

} //END ACF 






if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' 	=> 'FAQs',
		'menu_title'	=> 'FAQs',
		'menu_slug' 	=> 'faqs',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}


add_action('admin_head', 'gutenberg_sidebar');

function gutenberg_sidebar() {
  echo 
  '<style>
    .edit-post-sidebar {width: 400px;}
  </style>';
}
add_action('acf/input/admin_head', 'my_acf_admin_head5');
function my_acf_admin_head5()
{

	?>
<style type="text/css">
	.acf-editor-wrap iframe {
		min-height: 100px;
		height: 150px !important;
	}

	ul.acf-swatch-list.acf-hl>li {
		margin-right: .1rem;

	}

	ul.acf-swatch-list label {
		font-size: 0;
	}

	ul.acf-swatch-list .swatch-toggle {
		border-radius: 50%;
		border: 1px solid #aaaaaa;
	}
</style>
<?php

}
