<?php 

/**
 * Theme Options Panel.
 *
 * @package inx-game
 */

$default = inx_game_get_default_theme_options();
global $wp_customize;



// Add Theme Options Panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
		'title'      => esc_html__( 'Theme Options', 'inx-game' ),
		'priority'   => 2,
		'capability' => 'edit_theme_options',
	)
);


// Styling Options.*/

$wp_customize->add_section( 'styling_section_settings',
	array(
		'title'      => esc_html__( 'Styling Options', 'inx-game' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);


// Primary Color.
$wp_customize->add_setting( 'primary_color',
	array(
	'default'           => $default['primary_color'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'primary_color',
	array(
	'label'    	   => esc_html__( 'Primary Color Scheme:', 'inx-game' ),
	'section'  	   => 'styling_section_settings',
	'description'  => esc_html__( 'The theme comes with unlimited color schemes for your theme\'s styling. upgrade pro for color options & features', 'inx-game' ),
	'type'     => 'color',
	'priority' => 120,
	)
);

$wp_customize->add_setting( '__secondary_color',
	array(
	'default'           => $default['__secondary_color'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( '__secondary_color',
	array(
	'label'    	   => esc_html__( 'Secondary Color Scheme:', 'inx-game' ),
	'section'  	   => 'styling_section_settings',
	'description'  => esc_html__( 'The theme comes with unlimited color schemes for your theme\'s styling. upgrade pro for color options & features', 'inx-game' ),
	'type'     => 'color',
	'priority' => 120,
	)
);

	
/*Posts management section start */
$wp_customize->add_section( 'theme_option_section_settings',
	array(
		'title'      => esc_html__( 'Blog Management', 'inx-game' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

		/*Posts Layout*/
		$wp_customize->add_setting( 'blog_layout',
			array(
				'default'           => $default['blog_layout'],
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'inx_game_sanitize_select',
			)
		);
		$wp_customize->add_control( 'blog_layout',
			array(
				'label'    => esc_html__( 'Blog Layout Options', 'inx-game' ),
				'description' => esc_html__( 'Choose between different layout options to be used as default', 'inx-game' ),
				'section'  => 'theme_option_section_settings',
				'choices'   => array(
					'sidebar-content'  => esc_html__( 'Primary Sidebar - Content', 'inx-game' ),
					'content-sidebar' => esc_html__( 'Content - Primary Sidebar', 'inx-game' ),
					'no-sidebar'    => esc_html__( 'No Sidebar', 'inx-game' ),
					),
				'type'     => 'select',
				
			)
		);
		
		
		$wp_customize->add_setting( 'single_post_layout',
			array(
				'default'           => $default['single_post_layout'],
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'inx_game_sanitize_select',
			)
		);
		$wp_customize->add_control( 'single_post_layout',
			array(
				'label'    => esc_html__( 'Blog Layout Options', 'inx-game' ),
				'description' => esc_html__( 'Choose between different layout options to be used as default', 'inx-game' ),
				'section'  => 'theme_option_section_settings',
				'choices'   => array(
					'sidebar-content'  => esc_html__( 'Primary Sidebar - Content', 'inx-game' ),
					'content-sidebar' => esc_html__( 'Content - Primary Sidebar', 'inx-game' ),
					'no-sidebar'    => esc_html__( 'No Sidebar', 'inx-game' ),
					),
				'type'     => 'select',
				
			)
		);
		
		
		/*Blog Loop Content*/
		$wp_customize->add_setting( 'blog_loop_content_type',
			array(
				'default'           => $default['blog_loop_content_type'],
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'inx_game_sanitize_select',
			)
		);
		$wp_customize->add_control( 'blog_loop_content_type',
			array(
				'label'    => esc_html__( 'Archive Content Type', 'inx-game' ),
				'description' => esc_html__( 'Choose Archive, Blog Page Content type as default', 'inx-game' ),
				'section'  => 'theme_option_section_settings',
				'choices'               => array(
					'excerpt' => __( 'Excerpt', 'inx-game' ),
					'content' => __( 'Content', 'inx-game' ),
					),
				'type'     => 'select',
				
			)
		);
		
		/*Social Profile*/
		$wp_customize->add_setting( 'read_more_text',
			array(
				'default'           => $default['read_more_text'],
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control( 'read_more_text',
			array(
				'label'    => esc_html__( 'Read more text', 'inx-game' ),
				'description' => esc_html__( 'Leave empty to hide', 'inx-game' ),
				'section'  => 'theme_option_section_settings',
				'type'     => 'text',
				
			)
		);
		
		
		$wp_customize->add_setting( 'blog_meta_hide',
			array(
				'default'           => $default['blog_meta_hide'],
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'inx_game_sanitize_checkbox',
			)
		);
		$wp_customize->add_control( 'blog_meta_hide',
			array(
				'label'    => esc_html__( 'Hide Blog Archive Meta Info ?', 'inx-game' ),
				'section'  => 'theme_option_section_settings',
				'type'     => 'checkbox',
				
			)
		);
		
		$wp_customize->add_setting( 'signle_meta_hide',
			array(
				'default'           => $default['signle_meta_hide'],
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'inx_game_sanitize_checkbox',
			)
		);
		$wp_customize->add_control( 'signle_meta_hide',
			array(
				'label'    => esc_html__( 'Hide Single post Meta Info ?', 'inx-game' ),
				'section'  => 'theme_option_section_settings',
				'type'     => 'checkbox',
				
			)
		);
		
/*Posts management section start */
$wp_customize->add_section( 'page_option_section_settings',
	array(
		'title'      => esc_html__( 'Page Management', 'inx-game' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

	
		/*Home Page Layout*/
		$wp_customize->add_setting( 'page_layout',
			array(
				'default'           => $default['blog_layout'],
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'inx_game_sanitize_select',
			)
		);
		$wp_customize->add_control( 'page_layout',
			array(
				'label'    => esc_html__( 'Page Layout Options', 'inx-game' ),
				'section'  => 'page_option_section_settings',
				'description' => esc_html__( 'Choose between different layout options to be used as default', 'inx-game' ),
				'choices'   => array(
					'sidebar-content'  => esc_html__( 'Primary Sidebar - Content', 'inx-game' ),
					'content-sidebar' => esc_html__( 'Content - Primary Sidebar', 'inx-game' ),
					'no-sidebar'    => esc_html__( 'No Sidebar', 'inx-game' ),
					),
				'type'     => 'select',
				'priority' => 170,
			)
		);


		// Footer Section.
		$wp_customize->add_section( 'footer_section',
			array(
			'title'      => esc_html__( 'Copyright', 'inx-game' ),
			'priority'   => 130,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
			)
		);
		
		// Setting copyright_text.
		$wp_customize->add_setting( 'copyright_text',
			array(
			'default'           => $default['copyright_text'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control( 'copyright_text',
			array(
			'label'    => esc_html__( 'Footer Copyright Text', 'inx-game' ),
			'section'  => 'footer_section',
			'type'     => 'textarea',
			'priority' => 120,
			)
		);
		


/*Social Profile */
$wp_customize->add_section( 'social_profile_sec',
	array(
		'title'      => esc_html__( 'Social Profile', 'inx-game' ),
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

		/*Social Profile*/
		$wp_customize->add_setting( '__fb_pro_link',
			array(
				'default'           => $default['__fb_pro_link'],
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control( '__fb_pro_link',
			array(
				'label'    => esc_html__( 'Facebook', 'inx-game' ),
				'description' => esc_html__( 'Leave empty to hide', 'inx-game' ),
				'section'  => 'social_profile_sec',
				'type'     => 'text',
				
			)
		);	
		
		
		
		$wp_customize->add_setting( '__tw_pro_link',
			array(
				'default'           => $default['__tw_pro_link'],
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control( '__tw_pro_link',
			array(
				'label'    => esc_html__( 'Twitter', 'inx-game' ),
				'description' => esc_html__( 'Leave empty to hide', 'inx-game' ),
				'section'  => 'social_profile_sec',
				'type'     => 'text',
				
			)
		);
		
		
		$wp_customize->add_setting( '__you_pro_link',
			array(
				'default'           => $default['__you_pro_link'],
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control( '__you_pro_link',
			array(
				'label'    => esc_html__( 'Youtube', 'inx-game' ),
				'description' => esc_html__( 'Leave empty to hide', 'inx-game' ),
				'section'  => 'social_profile_sec',
				'type'     => 'text',
				
			)
		);					
		
		
		
	


		