<?php

	function empathy_ocdi_import_files()
	{
		$theme_directory     = trailingslashit(get_template_directory());
		$theme_directory_url = trailingslashit(get_template_directory_uri());
		
		return array(
			array(
				'import_file_name'             => esc_html__('Demo Content', 'empathy'),
				'local_import_file'            => $theme_directory     . 'admin/demo-data/content.xml',
				'local_import_widget_file'     => $theme_directory     . 'admin/demo-data/widgets.wie',
				'local_import_customizer_file' => $theme_directory     . 'admin/demo-data/customizer.dat',
				'import_preview_image_url'     => $theme_directory_url . 'admin/demo-data/screenshot.jpg'
			)
		);
	}
	
	add_filter('pt-ocdi/import_files', 'empathy_ocdi_import_files');
	
	
	function empathy_ocdi_time_for_one_ajax_call()
	{
		return 10;
	}
	
	add_action('pt-ocdi/time_for_one_ajax_call', 'empathy_ocdi_time_for_one_ajax_call');


/* ============================================================================================================================================= */


	function empathy_after_import()
	{
		// Assign menus to their locations.
		
		$main_menu = get_term_by('name', 'Custom Menu', 'nav_menu');
		
		set_theme_mod(
			'nav_menu_locations',
			array(
				'pixelwars__theme_menu_location_1' => $main_menu->term_id,
			)
		);
		
		
		// Assign Homepage and Blog page.
		
		$homepage  = get_page_by_title('Home'); // Get homepage.
		$blog_page = get_page_by_title('blog'); // Get blog page.
		
		update_option('show_on_front', 'page');
		update_option('page_on_front', $homepage->ID); // Set homepage.
		update_option('page_for_posts', $blog_page->ID); // Set blog page.
	}
	
	add_action('pt-ocdi/after_import', 'empathy_after_import');


/* ============================================================================================================================================= */


	add_filter('pt-ocdi/disable_pt_branding', '__return_true');
	
	add_filter('pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false');

?>