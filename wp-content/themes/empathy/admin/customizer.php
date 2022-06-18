<?php

	function empathy_customize_register($wp_customize)
	{
		$wp_customize->add_section(
			'pixelwars__section_fonts',
			array(
				'title'    => esc_html__('Fonts', 'empathy'),
				'priority' => 30
			)
		);
		
		
		$wp_customize->add_section(
			'pixelwars__section_colors',
			array(
				'title'    => esc_html__('Colors', 'empathy'),
				'priority' => 31
			)
		);
		
		
		$wp_customize->add_section(
			'pixelwars__section_colors_2',
			array(
				'title'       => esc_html__('Empathy Page Colors', 'empathy'),
				'description' => esc_html__('Select background color for pages in the Empathy page template.', 'empathy'),
				'priority'    => 32
			)
		);
		
		
		$wp_customize->add_section(
			'pixelwars__section_animation',
			array(
				'title'       => esc_html__('Empathy Page Animations', 'empathy'),
				'description' => esc_html__('Select page transition effects for pages in the Empathy page template.', 'empathy'),
				'priority'    => 33
			)
		);
		
		
		$wp_customize->add_section(
			'pixelwars__section_custom_css',
			array(
				'title'       => esc_html__('Custom CSS', 'empathy'),
				'description' => esc_html__('Quickly add custom css.', 'empathy'),
				'priority'    => 200
			)
		);
		
		
		/* ==================================================================================================== */
		
		
		include_once(get_template_directory() . '/admin/fonts.php');
		
		
		$wp_customize->add_setting( 'pixelwars__setting_font_1', array( 'default'   => "",
																		'sanitize_callback' => 'empathy_sanitize',
																		'transport' => 'refresh' ) );
		
		$wp_customize->add_control( 'pixelwars__control_font_1', array( 'label'    => 'Text Logo Font',
																		'section'  => 'pixelwars__section_fonts',
																		'settings' => 'pixelwars__setting_font_1',
																		'type'     => 'select',
																		'choices'  => $pixelwars__fonts ) );
		
		
		$wp_customize->add_setting( 'pixelwars__setting_font_2', array( 'default'   => "",
																		'sanitize_callback' => 'empathy_sanitize',
																		'transport' => 'refresh' ) );
		
		$wp_customize->add_control( 'pixelwars__control_font_2', array(	'label'    => 'Menu Font',
																		'section'  => 'pixelwars__section_fonts',
																		'settings' => 'pixelwars__setting_font_2',
																		'type'     => 'select',
																		'choices'  => $pixelwars__fonts ) );
		
		
		$wp_customize->add_setting( 'pixelwars__setting_font_3', array( 'default'   => "",
																		'sanitize_callback' => 'empathy_sanitize',
																		'transport' => 'refresh' ) );
		
		$wp_customize->add_control( 'pixelwars__control_font_3', array(	'label'    => 'Heading Font',
																		'section'  => 'pixelwars__section_fonts',
																		'settings' => 'pixelwars__setting_font_3',
																		'type'     => 'select',
																		'choices'  => $pixelwars__fonts ) );
		
		
		$wp_customize->add_setting( 'pixelwars__setting_font_4', array( 'default'   => "",
																		'sanitize_callback' => 'empathy_sanitize',
																		'transport' => 'refresh' ) );
		
		$wp_customize->add_control( 'pixelwars__control_font_4', array(	'label'    => 'Body Font',
																		'section'  => 'pixelwars__section_fonts',
																		'settings' => 'pixelwars__setting_font_4',
																		'type'     => 'select',
																		'choices'  => $pixelwars__fonts ) );
		
		
		/* ==================================================================================================== */
		
		
		$wp_customize->add_setting( 'pixelwars__setting_color_1', array(    'default'   => '#ffffff',
																			'sanitize_callback' => 'sanitize_hex_color',
																			'transport' => 'refresh' ) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pixelwars__control_color_1', array(	'label'    => esc_html__( 'Text Logo Color', 'empathy' ),
																														'section'  => 'pixelwars__section_colors',
																														'settings' => 'pixelwars__setting_color_1' ) ) );
		
		
		$wp_customize->add_setting( 'pixelwars__setting_color_2', array(    'default'   => '#2ba163',
																			'sanitize_callback' => 'sanitize_hex_color',
																			'transport' => 'refresh' ) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pixelwars__control_color_2', array( 'label'    => esc_html__( 'Text Logo Background Color', 'empathy' ),
																														'section'  => 'pixelwars__section_colors',
																														'settings' => 'pixelwars__setting_color_2' ) ) );
		
		
		$wp_customize->add_setting( 'pixelwars__setting_color_3', array(    'default'   => '#1c262b',
																			'sanitize_callback' => 'sanitize_hex_color',
																			'transport' => 'refresh' ) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pixelwars__control_color_3', array( 'label'    => esc_html__( 'Menu Background Color', 'empathy' ),
																														'section'  => 'pixelwars__section_colors',
																														'settings' => 'pixelwars__setting_color_3' ) ) );
		
		
		$wp_customize->add_setting( 'pixelwars__setting_color_4', array(    'default'   => '#009966',
																			'sanitize_callback' => 'sanitize_hex_color',
																			'transport' => 'refresh' ) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pixelwars__control_color_4', array( 'label'    => esc_html__( 'Link Color', 'empathy' ),
																														'section'  => 'pixelwars__section_colors',
																														'settings' => 'pixelwars__setting_color_4' ) ) );
		
		
		$wp_customize->add_setting( 'pixelwars__setting_color_5', array(    'default'   => '#8acb82',
																			'sanitize_callback' => 'sanitize_hex_color',
																			'transport' => 'refresh' ) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pixelwars__control_color_5', array( 'label'    => esc_html__( 'Link Hover Color', 'empathy' ),
																														'section'  => 'pixelwars__section_colors',
																														'settings' => 'pixelwars__setting_color_5' ) ) );
		
		
		$wp_customize->add_setting( 'pixelwars__setting_color_6', array(    'default'   => '#8acb82',
																			'sanitize_callback' => 'sanitize_hex_color',
																			'transport' => 'refresh' ) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pixelwars__control_color_6', array( 'label'    => esc_html__( 'Primary Color', 'empathy' ),
																														'section'  => 'pixelwars__section_colors',
																														'settings' => 'pixelwars__setting_color_6' ) ) );
		
		
		$wp_customize->add_setting('pixelwars__setting_color_progress_bar',
								   array('default'   => '#fffC00',
										 'sanitize_callback' => 'sanitize_hex_color',
										 'transport' => 'postMessage'));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
																  'pixelwars__control_color_progress_bar',
																  array('label'    => esc_html__('Loading Bar Color', 'empathy'),
																		'section'  => 'pixelwars__section_colors',
																		'settings' => 'pixelwars__setting_color_progress_bar')));
		
		
		/* ==================================================================================================== */
		
		
		$wp_customize->add_setting( 'pixelwars__setting_color_7', array(    'default'   => '#2e2f2d',
																			'sanitize_callback' => 'sanitize_hex_color',
																			'transport' => 'refresh' ) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pixelwars__control_color_7', array( 'label'    => esc_html__( '1. Page Background Color', 'empathy' ),
																														'section'  => 'pixelwars__section_colors_2',
																														'settings' => 'pixelwars__setting_color_7' ) ) );
		
		
		$wp_customize->add_setting( 'pixelwars__setting_color_7b', array(   'default'   => 1,
																			'sanitize_callback' => 'empathy_sanitize',
																			'transport' => 'refresh' ) );
		
		$wp_customize->add_control( 'pixelwars__control_color_7b', array(   'label'    => '1. Page Light Text',
																			'section'  => 'pixelwars__section_colors_2',
																			'settings' => 'pixelwars__setting_color_7b',
																			'type'     => 'checkbox' ) );
		
		
		$wp_customize->add_setting( 'pixelwars__setting_color_8', array(    'default'   => '#ecf0f0',
																			'sanitize_callback' => 'sanitize_hex_color',
																			'transport' => 'refresh' ) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pixelwars__control_color_8', array( 'label'    => esc_html__( '2. Page Background Color', 'empathy' ),
																														'section'  => 'pixelwars__section_colors_2',
																														'settings' => 'pixelwars__setting_color_8' ) ) );
		
		
		$wp_customize->add_setting( 'pixelwars__setting_color_8b', array(   'default'   => 0,
																			'sanitize_callback' => 'empathy_sanitize',
																			'transport' => 'refresh' ) );
		
		$wp_customize->add_control( 'pixelwars__control_color_8b', array(   'label'    => '2. Page Light Text',
																			'section'  => 'pixelwars__section_colors_2',
																			'settings' => 'pixelwars__setting_color_8b',
																			'type'     => 'checkbox' ) );
		
		
		$wp_customize->add_setting( 'pixelwars__setting_color_9', array(    'default'   => '#ebf0df',
																			'sanitize_callback' => 'sanitize_hex_color',
																			'transport' => 'refresh' ) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pixelwars__control_color_9', array( 'label'    => esc_html__( '3. Page Background Color', 'empathy' ),
																														'section'  => 'pixelwars__section_colors_2',
																														'settings' => 'pixelwars__setting_color_9' ) ) );
		
		
		$wp_customize->add_setting( 'pixelwars__setting_color_9b', array(   'default'   => 0,
																			'sanitize_callback' => 'empathy_sanitize',
																			'transport' => 'refresh' ) );
		
		$wp_customize->add_control( 'pixelwars__control_color_9b', array(   'label'    => '3. Page Light Text',
																			'section'  => 'pixelwars__section_colors_2',
																			'settings' => 'pixelwars__setting_color_9b',
																			'type'     => 'checkbox' ) );
		
		
		$wp_customize->add_setting( 'pixelwars__setting_color_10', array(   'default'   => '#60d7a9',
																			'sanitize_callback' => 'sanitize_hex_color',
																			'transport' => 'refresh' ) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pixelwars__control_color_10', array(    'label'    => esc_html__( '4. Page Background Color', 'empathy' ),
																															'section'  => 'pixelwars__section_colors_2',
																															'settings' => 'pixelwars__setting_color_10' ) ) );
		
		
		$wp_customize->add_setting( 'pixelwars__setting_color_10b', array(  'default'   => 0,
																			'sanitize_callback' => 'empathy_sanitize',
																			'transport' => 'refresh' ) );
		
		$wp_customize->add_control( 'pixelwars__control_color_10b', array(  'label'    => '4. Page Light Text',
																			'section'  => 'pixelwars__section_colors_2',
																			'settings' => 'pixelwars__setting_color_10b',
																			'type'     => 'checkbox' ) );
		
		
		$wp_customize->add_setting( 'pixelwars__setting_color_11', array(   'default'   => '#e5dcc5',
																			'sanitize_callback' => 'sanitize_hex_color',
																			'transport' => 'refresh' ) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pixelwars__control_color_11', array(    'label'    => esc_html__( '5. Page Background Color', 'empathy' ),
																															'section'  => 'pixelwars__section_colors_2',
																															'settings' => 'pixelwars__setting_color_11' ) ) );
		
		
		$wp_customize->add_setting( 'pixelwars__setting_color_11b', array(  'default'   => 0,
																			'sanitize_callback' => 'empathy_sanitize',
																			'transport' => 'refresh' ) );
		
		$wp_customize->add_control( 'pixelwars__control_color_11b', array(  'label'    => '5. Page Light Text',
																			'section'  => 'pixelwars__section_colors_2',
																			'settings' => 'pixelwars__setting_color_11b',
																			'type'     => 'checkbox' ) );
		
		
		$wp_customize->add_setting( 'pixelwars__setting_color_12', array(   'default'   => '#d6e2e0',
																			'sanitize_callback' => 'sanitize_hex_color',
																			'transport' => 'refresh' ) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pixelwars__control_color_12', array(    'label'    => esc_html__( '6. Page Background Color', 'empathy' ),
																															'section'  => 'pixelwars__section_colors_2',
																															'settings' => 'pixelwars__setting_color_12' ) ) );
		
		
		$wp_customize->add_setting( 'pixelwars__setting_color_12b', array(  'default'   => 1,
																			'sanitize_callback' => 'empathy_sanitize',
																			'transport' => 'refresh' ) );
		
		$wp_customize->add_control( 'pixelwars__control_color_12b', array(  'label'    => '6. Page Light Text',
																			'section'  => 'pixelwars__section_colors_2',
																			'settings' => 'pixelwars__setting_color_12b',
																			'type'     => 'checkbox' ) );
		
		
		/* ==================================================================================================== */
		
		
		$wp_customize->add_setting( 'pixelwars__setting_animation_1', array(    'default'   => 0,
																				'sanitize_callback' => 'empathy_sanitize',
																				'transport' => 'refresh' ) );
		
		$wp_customize->add_control( 'pixelwars__control_animation_1', array(    'label'    => 'Random animation',
																				'section'  => 'pixelwars__section_animation',
																				'settings' => 'pixelwars__setting_animation_1',
																				'type'     => 'checkbox' ) );
		
		
		$pixelwars__animations = array( '1'  => 'Move to left/ from right',
										'2'  => 'Move to right/ from left',
										'3'  => 'Move to top/ from bottom',
										'4'  => 'Move to bottom/ from top',
										'5'  => 'Fade / from right',
										'6'  => 'Fade / from left',
										'7'  => 'Fade / from bottom',
										'8'  => 'Fade / from top',
										'9'  => 'Fade left / Fade right',
										'10' => 'Fade right / Fade left',
										'11' => 'Fade top / Fade bottom',
										'12' => 'Fade bottom / Fade top',
										'13' => 'Different easing / from right',
										'14' => 'Different easing / from left',
										'15' => 'Different easing / from bottom',
										'16' => 'Different easing / from top',
										'17' => 'Scale down / from right',
										'18' => 'Scale down / from left',
										'19' => 'Scale down / from bottom',
										'20' => 'Scale down / from top',
										'21' => 'Scale down / scale down',
										'22' => 'Scale up / scale up',
										'23' => 'Move to left / scale up',
										'24' => 'Move to right / scale up',
										'25' => 'Move to top / scale up',
										'26' => 'Move to bottom / scale up',
										'27' => 'Scale down / scale up',
										'28' => 'Glue left / from right',
										'29' => 'Glue right / from left',
										'30' => 'Glue bottom / from top',
										'31' => 'Glue top / from bottom',
										'32' => 'Flip right',
										'33' => 'Flip left',
										'34' => 'Flip top',
										'35' => 'Flip bottom',
										'36' => 'Fall',
										'37' => 'Newspaper',
										'38' => 'Push left / from right',
										'39' => 'Push right / from left',
										'40' => 'Push top / from bottom',
										'41' => 'Push bottom / from top',
										'42' => 'Push left / pull right',
										'43' => 'Push right / pull left',
										'44' => 'Push top / pull bottom',
										'45' => 'Push bottom / pull top',
										'46' => 'Fold left / from right',
										'47' => 'Fold right / from left',
										'48' => 'Fold top / from bottom',
										'49' => 'Fold bottom / from top',
										'50' => 'Move to right / unfold left',
										'51' => 'Move to left / unfold right',
										'52' => 'Move to bottom / unfold top',
										'53' => 'Move to top / unfold bottom',
										'54' => 'Room to left',
										'55' => 'Room to right',
										'56' => 'Room to top',
										'57' => 'Room to bottom',
										'58' => 'Cube to left',
										'59' => 'Cube to right',
										'60' => 'Cube to top',
										'61' => 'Cube to bottom',
										'62' => 'Carousel to left',
										'63' => 'Carousel to right',
										'64' => 'Carousel to top',
										'65' => 'Carousel to bottom',
										'66' => 'Sides',
										'67' => 'Slide' );
		
		
		$wp_customize->add_setting( 'pixelwars__setting_animation_3', array(    'default'   => '15',
																				'sanitize_callback' => 'empathy_sanitize',
																				'transport' => 'refresh' ) );
		
		$wp_customize->add_control( 'pixelwars__control_animation_3', array(	'label'    => 'Next Animation',
																				'section'  => 'pixelwars__section_animation',
																				'settings' => 'pixelwars__setting_animation_3',
																				'type'     => 'select',
																				'choices'  => $pixelwars__animations ) );
		
		
		$wp_customize->add_setting( 'pixelwars__setting_animation_2', array(    'default'   => '16',
																				'sanitize_callback' => 'empathy_sanitize',
																				'transport' => 'refresh' ) );
		
		$wp_customize->add_control( 'pixelwars__control_animation_2', array(	'label'    => 'Previous Animation',
																				'section'  => 'pixelwars__section_animation',
																				'settings' => 'pixelwars__setting_animation_2',
																				'type'     => 'select',
																				'choices'  => $pixelwars__animations ) );
		
		
		/* ==================================================================================================== */
		
		
		$wp_customize->add_setting( 'pixelwars__setting_custom_css', array( 'default'    => "",
																			'sanitize_callback' => 'empathy_sanitize',
																			'capability' => 'edit_theme_options' ) );
		
		$wp_customize->add_control( 'pixelwars__control_custom_css', array( 'label'    => esc_html__( 'Custom CSS', 'empathy' ),
																			'section'  => 'pixelwars__section_custom_css',
																			'settings' => 'pixelwars__setting_custom_css',
																			'type'     => 'textarea' ) );
		
		
		/* ==================================================================================================== */
		
		
		$wp_customize->get_setting('blogname')->transport = 'postMessage';
		$wp_customize->get_setting('blogdescription')->transport = 'postMessage';
		
		$wp_customize->get_setting('pixelwars__setting_font_1')->transport = 'postMessage';
		$wp_customize->get_setting('pixelwars__setting_font_2')->transport = 'postMessage';
		$wp_customize->get_setting('pixelwars__setting_font_3')->transport = 'postMessage';
		$wp_customize->get_setting('pixelwars__setting_font_4')->transport = 'postMessage';
		
		$wp_customize->get_setting('pixelwars__setting_color_1')->transport = 'postMessage';
		$wp_customize->get_setting('pixelwars__setting_color_2')->transport = 'postMessage';
		$wp_customize->get_setting('pixelwars__setting_color_3')->transport = 'postMessage';
		$wp_customize->get_setting('pixelwars__setting_color_4')->transport = 'postMessage';
		$wp_customize->get_setting('pixelwars__setting_color_5')->transport = 'postMessage';
		$wp_customize->get_setting('pixelwars__setting_color_6')->transport = 'postMessage';
		
		$wp_customize->get_setting('pixelwars__setting_color_7')->transport = 'postMessage';
		$wp_customize->get_setting('pixelwars__setting_color_7b')->transport = 'postMessage';
		$wp_customize->get_setting('pixelwars__setting_color_8')->transport = 'postMessage';
		$wp_customize->get_setting('pixelwars__setting_color_8b')->transport = 'postMessage';
		$wp_customize->get_setting('pixelwars__setting_color_9')->transport = 'postMessage';
		$wp_customize->get_setting('pixelwars__setting_color_9b')->transport = 'postMessage';
		$wp_customize->get_setting('pixelwars__setting_color_10')->transport = 'postMessage';
		$wp_customize->get_setting('pixelwars__setting_color_10b')->transport = 'postMessage';
		$wp_customize->get_setting('pixelwars__setting_color_11')->transport = 'postMessage';
		$wp_customize->get_setting('pixelwars__setting_color_11b')->transport = 'postMessage';
		$wp_customize->get_setting('pixelwars__setting_color_12')->transport = 'postMessage';
		$wp_customize->get_setting('pixelwars__setting_color_12b')->transport = 'postMessage';
		
		$wp_customize->get_setting('pixelwars__setting_animation_1')->transport = 'postMessage';
		$wp_customize->get_setting('pixelwars__setting_animation_2')->transport = 'postMessage';
		$wp_customize->get_setting('pixelwars__setting_animation_3')->transport = 'postMessage';
		
		$wp_customize->get_setting('pixelwars__setting_custom_css')->transport = 'postMessage';
	}
	
	add_action('customize_register', 'empathy_customize_register');
	
	
	function empathy_sanitize($value)
	{
		return $value;
	}

?>