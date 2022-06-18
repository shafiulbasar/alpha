<?php

function pixelwars__enqueue_login()
{
	wp_enqueue_script('jquery');
}

add_action('login_enqueue_scripts', 'pixelwars__enqueue_login');


/* ============================================================================================================================================= */


function pixelwars__enqueue_admin()
{
	wp_enqueue_style('pixelwars-admin', get_template_directory_uri() . '/admin/admin.css');
	wp_enqueue_style('thickbox');


	wp_enqueue_script('thickbox');

	if (isset($_GET['page'])) {
		if ($_GET['page'] != 'codestyling-localization/codestyling-localization.php') {
			wp_enqueue_script('media-upload');
		}
	}
}

add_action('admin_enqueue_scripts', 'pixelwars__enqueue_admin');


/* ============================================================================================================================================= */


function pixelwars__enqueue()
{
	$theme_directory = get_template_directory_uri();
	global $subset;
	$extra_char_set = false;
	$subset = '&subset=';

	if (get_option('char_set_latin', false)) {
		$subset .= 'latin,';
		$extra_char_set = true;
	}
	if (get_option('char_set_latin_ext', false)) {
		$subset .= 'latin-ext,';
		$extra_char_set = true;
	}
	if (get_option('char_set_cyrillic', false)) {
		$subset .= 'cyrillic,';
		$extra_char_set = true;
	}
	if (get_option('char_set_cyrillic_ext', false)) {
		$subset .= 'cyrillic-ext,';
		$extra_char_set = true;
	}
	if (get_option('char_set_greek', false)) {
		$subset .= 'greek,';
		$extra_char_set = true;
	}
	if (get_option('char_set_greek_ext', false)) {
		$subset .= 'greek-ext,';
		$extra_char_set = true;
	}
	if (get_option('char_set_vietnamese', false)) {
		$subset .= 'vietnamese,';
		$extra_char_set = true;
	}
	if ($extra_char_set == false) {
		$subset = "";
	} else {
		$subset = substr($subset, 0, -1);
	}

	wp_enqueue_style('montserrat', '//fonts.googleapis.com/css?family=Montserrat:400,700' . $subset, null, null);
	wp_enqueue_style('roboto', '//fonts.googleapis.com/css?family=Roboto:400,400italic,700,700italic' . $subset, null, null);
	wp_enqueue_style('bootstrap', $theme_directory . '/css/bootstrap.min.css', null, null);
	wp_enqueue_style('pe-icon-7-stroke', $theme_directory . '/css/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css', null, null);
	wp_enqueue_style('fontello', $theme_directory . '/css/fonts/fontello/css/fontello.css', null, null);
	wp_enqueue_style('nprogress', $theme_directory . '/js/nprogress/nprogress.css', null, null);
	wp_enqueue_style('magnific-popup', $theme_directory . '/js/jquery.magnific-popup/magnific-popup.css', null, null);
	wp_enqueue_style('uniform', $theme_directory . '/js/jquery.uniform/uniform.default.css', null, null);
	wp_enqueue_style('animations', $theme_directory . '/css/animations.css', null, null);
	wp_enqueue_style('empathy-main', $theme_directory . '/css/main.css', null, null);
	wp_enqueue_style('empathy-768', $theme_directory . '/css/768.css', null, null);
	wp_enqueue_style('empathy-wp-fix', $theme_directory . '/css/wp-fix.css', null, null);
	wp_enqueue_style('empathy-style', get_stylesheet_uri(), null, null);


	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	wp_enqueue_script('jquery');
	wp_enqueue_script('modernizr', $theme_directory . '/js/modernizr.min.js', null, null);
	wp_enqueue_script('address', $theme_directory . '/js/jquery.address.js', null, null, true);
	wp_enqueue_script('nprogress', $theme_directory . '/js/nprogress/nprogress.js', null, null, true);
	wp_enqueue_script('fastclick', $theme_directory . '/js/fastclick.js', null, null, true);
	wp_enqueue_script('typist', $theme_directory . '/js/typist.js', null, null, true);
	wp_enqueue_script('imagesloaded', $theme_directory . '/js/imagesloaded.pkgd.min.js', null, null, true);
	wp_enqueue_script('isotope', $theme_directory . '/js/jquery.isotope.min.js', null, null, true);
	wp_enqueue_script('fitvids', $theme_directory . '/js/jquery.fitvids.js', null, null, true);
	wp_enqueue_script('validate', $theme_directory . '/js/jquery.validate.min.js', null, null, true);
	wp_enqueue_script('uniform', $theme_directory . '/js/jquery.uniform/jquery.uniform.min.js', null, null, true);
	wp_enqueue_script('magnific-popup', $theme_directory . '/js/jquery.magnific-popup/jquery.magnific-popup.min.js', null, null, true);
	wp_enqueue_script('socialstream', $theme_directory . '/js/socialstream.jquery.js', null, null, true);
	wp_enqueue_script('empathy-jarallax', $theme_directory . '/js/jarallax.min.js', null, null, true);
	wp_enqueue_script('empathy-jarallax-video', $theme_directory . '/js/jarallax-video.min.js', null, null, true);
	wp_enqueue_script('empathy-main', $theme_directory . '/js/main.js', null, null, true);
	wp_enqueue_script('empathy-wp-fix', $theme_directory . '/js/wp-fix.js', null, null, true);

	if (is_customize_preview()) {
		wp_enqueue_script('empathy-wp-fix-2', $theme_directory . '/js/wp-fix-2.js', null, null, true);
	}
}


/* ============================================================================================================================================= */


function empathy_after_setup_theme()
{
	load_theme_textdomain('empathy', get_template_directory() . '/languages');
	register_nav_menus(array('pixelwars__theme_menu_location_1' => esc_html__('Classic Navigation Menu', 'empathy')));

	add_theme_support('title-tag');
	add_theme_support('automatic-feed-links');
	add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
	add_theme_support('post-formats', array('image', 'gallery', 'audio', 'video', 'quote', 'link', 'chat', 'status', 'aside'));
	add_theme_support('post-thumbnails', array('post', 'portfolio', 'page'));

	add_action('wp_enqueue_scripts', 'pixelwars__enqueue');

	remove_theme_support('widgets-block-editor');
}

add_action('after_setup_theme', 'empathy_after_setup_theme');


/* ============================================================================================================================================= */


if (!isset($content_width)) {
	$content_width = 440;
}


add_image_size('pixelwars__image_size_1', 1000); // blog-page, post-page
add_image_size('pixelwars__image_size_2', 500); // blog-wiget, portfolio-widget
add_image_size('pixelwars__image_size_3', 1920); // page-widget-bg
add_image_size('pixelwars__image_size_4', 500, 333, true); // related-posts


/* ============================================================================================================================================= */


function pixelwars__theme_excerpt_more($more)
{
	return '... <p class="more"><a class="more-link" href="' . get_permalink(get_the_ID()) . '">' . __('Read More', 'empathy') . '</a></p>';
}

add_filter('excerpt_more', 'pixelwars__theme_excerpt_more');


/* ============================================================================================================================================= */


function pixelwars_theme_new_post_column_add($columns)
{
	return array_merge($columns, array('pixelwars_post_feat_img' => __('Featured Image', 'empathy')));
}

add_filter('manage_posts_columns', 'pixelwars_theme_new_post_column_add');


function pixelwars_theme_new_post_column_show($column, $post_id)
{
	if ($column == 'pixelwars_post_feat_img') {
		if (has_post_thumbnail()) {
			the_post_thumbnail('thumbnail');
		}
	}
}

add_action('manage_posts_custom_column', 'pixelwars_theme_new_post_column_show', 10, 2);


/* ============================================================================================================================================= */


function pixelwars__wp_page_menu2($args = array())
{
	$defaults = array(
		'sort_column' => 'menu_order, post_title',
		'menu_class'  => 'menu',
		'echo'        => true,
		'link_before' => "",
		'link_after'  => ""
	);

	$args = wp_parse_args($args, $defaults);
	$args = apply_filters('wp_page_menu_args', $args);

	$menu = "";

	$list_args = $args;

	// Show Home in the menu
	if (!empty($args['show_home'])) {
		if (true === $args['show_home'] || '1' === $args['show_home'] || 1 === $args['show_home']) {
			$text = __('Home', 'empathy');
		} else {
			$text = $args['show_home'];
		}


		$class = "";

		if (is_front_page() && !is_paged()) {
			$class = 'class="current_page_item"';
		}

		$menu .= '<li ' . $class . '><a href="' . home_url('/') . '" title="' . esc_attr($text) . '">' . $args['link_before'] . $text . $args['link_after'] . '</a></li>';

		// If the front page is a page, add it to the exclude list
		if (get_option('show_on_front') == 'page') {
			if (!empty($list_args['exclude'])) {
				$list_args['exclude'] .= ',';
			} else {
				$list_args['exclude'] = '';
			}

			$list_args['exclude'] .= get_option('page_on_front');
		}
	}

	$list_args['echo'] = false;
	$list_args['title_li'] = "";
	$menu .= str_replace(array("\r", "\n", "\t"), "", wp_list_pages($list_args));

	if ($menu) {
		$menu = '<ul class="menu-default">' . $menu . '</ul>';
	}

	$menu = $menu . "\n";
	$menu = apply_filters('wp_page_menu', $menu, $args);

	if ($args['echo']) {
		echo $menu;
	} else {
		return $menu;
	}
}


/* ============================================================================================================================================= */


/*
		Template for comments and pingbacks.
		
		To override this walker in a child theme without modifying the comments template
		simply create your own pixelwars__comments(), and that function will be used instead.
		
		Used as a callback by wp_list_comments() for displaying the comments.
	*/


function pixelwars__comments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;


	switch ($comment->comment_type):

		case 'pingback':


		case 'trackback':

			// Display trackbacks differently than normal comments.
?>
			<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
				<p>
					<?php
					_e('Pingback:', 'empathy'); ?> <?php comment_author_link(); ?> <?php edit_comment_link(__('(Edit)', 'empathy'), '<span class="edit-link">', '</span>');
																									?>
				</p>
			<?php

			break;


		default:

			global $post;

			?>
			<li id="li-comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
				<article id="comment-<?php comment_ID(); ?>" class="comment">
					<header class="comment-meta comment-author vcard">
						<?php
						echo get_avatar($comment, 132);

						printf(
							'<cite class="fn">%1$s %2$s</cite>',

							get_comment_author_link(),

							// If current post author is also comment author, make it known visually.
							($comment->user_id === $post->post_author) ? '<span></span>' : ""
						);
						?>

						<span class="comment-date"><?php echo get_comment_date() . ' ' . __('at', 'empathy') . ' ' . get_comment_time(); ?></span>
					</header>


					<section class="comment-content comment">
						<?php
						if ('0' == $comment->comment_approved) {
						?>
							<p class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'empathy'); ?></p>
						<?php
						}
						?>

						<?php
						comment_text();
						?>

						<?php
						edit_comment_link(__('Edit', 'empathy'), '<p class="comment-edit-link">', '</p>');
						?>
					</section>


					<div class="reply">
						<?php
						comment_reply_link(array_merge($args, array(
							'reply_text' => __('Reply', 'empathy'),
							'after'      => "",
							'depth'      => $depth,
							'max_depth'  => $args['max_depth']
						)));
						?>
					</div>
				</article>
		<?php

			break;

	endswitch;
}


/* ============================================================================================================================================= */


function pixelwars_theme_custom_box_show_post_title_visibility($post)
{
		?>
		<div class="admin-inside-box">
			<?php
			wp_nonce_field('pixelwars_theme_custom_box_show_post_title_visibility', 'pixelwars_theme_custom_box_nonce_post_title_visibility');
			?>


			<p>
				<?php
				$hide_post_title = get_option($post->ID . 'hide_post_title', false);

				if ($hide_post_title) {
					$hide_post_title_out = 'checked="checked"';
				} else {
					$hide_post_title_out = "";
				}
				?>

				<label for="hide_post_title"><input type="checkbox" id="hide_post_title" name="hide_post_title" <?php echo $hide_post_title_out; ?>> Hide title</label>
			</p>
		</div>
		<?php
	}


	function pixelwars_theme_custom_box_add_post_title_visibility()
	{
		add_meta_box('pixelwars_theme_custom_box_post_title_visibility_post', __('Title Visibility', 'empathy'), 'pixelwars_theme_custom_box_show_post_title_visibility', 'post', 'side', 'high');
	}

	add_action('add_meta_boxes', 'pixelwars_theme_custom_box_add_post_title_visibility');


	function pixelwars_theme_custom_box_save_post_title_visibility($post_id)
	{
		if (!isset($_POST['pixelwars_theme_custom_box_nonce_post_title_visibility'])) {
			return $post_id;
		}


		$nonce = $_POST['pixelwars_theme_custom_box_nonce_post_title_visibility'];

		if (!wp_verify_nonce($nonce, 'pixelwars_theme_custom_box_show_post_title_visibility')) {
			return $post_id;
		}


		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return $post_id;
		}


		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) {
				return $post_id;
			}
		} else {
			if (!current_user_can('edit_post', $post_id)) {
				return $post_id;
			}
		}


		update_option($post_id . 'hide_post_title', $_POST['hide_post_title']);
	}

	add_action('save_post', 'pixelwars_theme_custom_box_save_post_title_visibility');


	/* ============================================================================================================================================= */


	if (function_exists('register_sidebar')) {
		register_sidebar(array(
			'name'          => __('Footer 1', 'empathy'),
			'id'            => 'pixelwars__sidebar_4',
			'description'   => __('Add widgets.', 'empathy'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		));


		register_sidebar(array(
			'name'          => __('Footer 2', 'empathy'),
			'id'            => 'pixelwars__sidebar_5',
			'description'   => __('Add widgets.', 'empathy'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		));


		register_sidebar(array(
			'name'          => __('Footer 3', 'empathy'),
			'id'            => 'pixelwars__sidebar_6',
			'description'   => __('Add widgets.', 'empathy'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		));


		register_sidebar(array(
			'name'          => __('Footer Social Icons', 'empathy'),
			'id'            => 'pixelwars__sidebar_2',
			'description'   => 'Add social media shortcodes with the "Custom HTML" widget.',
			'before_widget' => "",
			'after_widget'  => "",
			'before_title'  => '<span style="display: none;">',
			'after_title'   => '</span>'
		));


		register_sidebar(array(
			'name'          => __('Footer Copyright Text', 'empathy'),
			'id'            => 'pixelwars__sidebar_3',
			'description'   => __('Add "Text" widget.', 'empathy'),
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<span style="display: none;">',
			'after_title'   => '</span>'
		));


		register_sidebar(array(
			'name'          => __('Empathy Template Pages', 'empathy'),
			'id'            => 'pixelwars__sidebar_1',
			'description'   => __('Add only Empathy [PAGE] widgets.', 'empathy'),
			'before_widget' => "",
			'after_widget'  => "",
			'before_title'  => '<span style="display: none;">',
			'after_title'   => '</span>'
		));
	}


	/* ============================================================================================================================================= */


	class pixelwars__Widget__Custom_Page extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct(
				'pixelwars__widget__custom_page',
				__('(Empathy) [PAGE] Custom', 'empathy'),
				array(
					'description' => __('About, resume, contact etc.', 'empathy')
				)
			);
		}


		public function form($instance)
		{
			if (isset($instance['title'])) {
				$title            = $instance['title'];
			} else {
				$title            = "";
			}
			if (isset($instance['custom_page_slug'])) {
				$custom_page_slug = $instance['custom_page_slug'];
			} else {
				$custom_page_slug = "";
			}
			if (isset($instance['icon'])) {
				$icon             = $instance['icon'];
			} else {
				$icon             = "";
			}

		?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php echo __('Title', 'empathy'); ?></label>

				<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>">

				<small style="color: #666666;"><?php echo __('For menu item.', 'empathy'); ?></small>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('icon'); ?>"><?php echo __('Icon', 'empathy'); ?></label>

				<input type="text" class="widefat" id="<?php echo $this->get_field_id('icon'); ?>" name="<?php echo $this->get_field_name('icon'); ?>" value="<?php echo esc_attr($icon); ?>" placeholder="pe-7s-home">

				<small style="color: #666666;"><?php echo __('For menu icon and page icon.', 'empathy'); ?> <?php echo __('Use icon name.', 'empathy'); ?> <a target="_blank" href="https://themes-pixeden.com/font-demos/7-stroke/"><?php echo __('Available icons', 'empathy'); ?></a>.</small>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('custom_page_slug'); ?>"><?php echo __('Select Page', 'empathy'); ?></label>

				<select class="widefat" id="<?php echo $this->get_field_id('custom_page_slug'); ?>" name="<?php echo $this->get_field_name('custom_page_slug'); ?>">
					<option></option>

					<?php
					$pages = get_pages();

					foreach ($pages as $page) {
						if ($custom_page_slug == $page->post_name) {
							$option = '<option selected="selected" value="' . esc_attr($page->post_name) . '">' . $page->post_title . '</option>';
							echo $option;
						} else {
							$option = '<option value="' . esc_attr($page->post_name) . '">' . $page->post_title . '</option>';
							echo $option;
						}
					}
					?>
				</select>

				<small style="color: #666666;"><?php echo __('Select a page for this widget.', 'empathy'); ?></small>
			</p>
			<?php
		}


		public function update($new_instance, $old_instance)
		{
			$instance                     = array();
			$instance['title']            = strip_tags($new_instance['title']);
			$instance['custom_page_slug'] = strip_tags($new_instance['custom_page_slug']);
			$instance['icon']             = strip_tags($new_instance['icon']);
			return $instance;
		}


		public function widget($args, $instance)
		{
			extract($args);
			$title            = apply_filters('widget_title',            $instance['title']);
			$custom_page_slug = apply_filters('widget_custom_page_slug', $instance['custom_page_slug']);
			$icon             = apply_filters('widget_icon',             $instance['icon']);

			echo $before_widget;

			if (!empty($title)) {
				// echo $before_title . $title . $after_title;
			}

			if (!empty($custom_page_slug)) {
				$args_custom_page = 'pagename=' . $custom_page_slug;
				$loop_custom_page = new WP_Query($args_custom_page);

				if ($loop_custom_page->have_posts()) :
					while ($loop_custom_page->have_posts()) : $loop_custom_page->the_post();

						$attachment_id  = get_post_thumbnail_id(get_the_ID());
						$attachment_url = wp_get_attachment_url($attachment_id);

			?>
						<section id="<?php echo esc_attr($custom_page_slug); ?>" class="pt-page page-layout <?php if (has_post_thumbnail()) {
																												echo 'has-bg-img';
																											} ?>" <?php if (has_post_thumbnail()) {
																																											echo 'style="background-image: url(' . esc_url($attachment_url) . ');"';
																																										} ?>>
							<div class="content">
								<div class="layout-medium">
									<h1 class="page-title">
										<?php
										if (!empty($icon)) {
										?>
											<i class="<?php echo esc_attr($icon); ?>"></i>
										<?php
										}

										$page = get_page_by_path($custom_page_slug);

										if ($page) {
											echo get_the_title($page);
										}

										if (!empty($title)) {
										?>
											<input type="hidden" name="menu-item-title" value="<?php echo esc_attr($title); ?>">
										<?php
										} else {
										?>
											<input type="hidden" name="menu-item-title" value="<?php the_title_attribute(array('post' => $page)); ?>">
										<?php
										}
										?>
									</h1> <!-- .page-title -->
									<?php
									the_content();
									?>
								</div> <!-- .layout-medium -->
							</div> <!-- .content -->
						</section> <!-- .pt-page .page-layout -->
			<?php
					endwhile;
				endif;
				wp_reset_postdata();
			}

			echo $after_widget;
		}
	}

	add_action('widgets_init', function () {
		register_widget('pixelwars__Widget__Custom_Page');
	});


	/* ============================================================================================================================================= */


	class pixelwars__Widget__Home extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct(
				'pixelwars__widget__home',
				__('(Empathy) [PAGE] Home', 'empathy'),
				array('description' => __('Intro page.', 'empathy'))
			);
		}

		public function form($instance)
		{
			if (isset($instance['title'])) {
				$title            = $instance['title'];
			} else {
				$title            = "";
			}
			if (isset($instance['custom_page_slug'])) {
				$custom_page_slug = $instance['custom_page_slug'];
			} else {
				$custom_page_slug = "";
			}
			if (isset($instance['icon'])) {
				$icon             = $instance['icon'];
			} else {
				$icon             = "";
			}
			if (isset($instance['background_video'])) {
				$background_video = $instance['background_video'];
			} else {
				$background_video = "";
			}

			?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php echo __('Title', 'empathy'); ?></label>

				<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>">

				<small style="color: #666666;"><?php echo __('For menu item.', 'empathy'); ?></small>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('icon'); ?>"><?php echo __('Icon', 'empathy'); ?></label>

				<input type="text" class="widefat" id="<?php echo $this->get_field_id('icon'); ?>" name="<?php echo $this->get_field_name('icon'); ?>" value="<?php echo esc_attr($icon); ?>" placeholder="pe-7s-home">

				<small style="color: #666666;"><?php echo __('For menu icon and page icon.', 'empathy'); ?> <?php echo __('Use icon name.', 'empathy'); ?> <a target="_blank" href="https://themes-pixeden.com/font-demos/7-stroke/"><?php echo __('Available icons', 'empathy'); ?></a>.</small>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('custom_page_slug'); ?>"><?php echo __('Select Page', 'empathy'); ?></label>

				<select class="widefat" id="<?php echo $this->get_field_id('custom_page_slug'); ?>" name="<?php echo $this->get_field_name('custom_page_slug'); ?>">
					<option></option>

					<?php
					$pages = get_pages();

					foreach ($pages as $page) {
						if ($custom_page_slug == $page->post_name) {
							$option = '<option selected="selected" value="' . esc_attr($page->post_name) . '">' . $page->post_title . '</option>';
							echo $option;
						} else {
							$option = '<option value="' . esc_attr($page->post_name) . '">' . $page->post_title . '</option>';
							echo $option;
						}
					}
					?>
				</select>

				<small style="color: #666666;"><?php echo __('Select a page for this widget. Set featured image to selected page for background image.', 'empathy'); ?></small>
			</p>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id('background_video')); ?>"><?php esc_html_e('Background Video URL (YouTube/Vimeo)', 'empathy'); ?></label>

				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('background_video')); ?>" name="<?php echo esc_attr($this->get_field_name('background_video')); ?>" value="<?php echo esc_url($background_video); ?>" placeholder="http://">

				<small style="color: #666666;"><?php esc_html_e('Use video url from browser address bar.', 'empathy'); ?></small>
			</p>
			<?php
		}

		public function update($new_instance, $old_instance)
		{
			$instance = array();
			$instance['title']            = strip_tags($new_instance['title']);
			$instance['custom_page_slug'] = strip_tags($new_instance['custom_page_slug']);
			$instance['icon']             = strip_tags($new_instance['icon']);
			$instance['background_video'] = strip_tags($new_instance['background_video']);
			return $instance;
		}

		public function widget($args, $instance)
		{
			extract($args);
			$title            = apply_filters('widget_title',            $instance['title']);
			$custom_page_slug = apply_filters('widget_custom_page_slug', $instance['custom_page_slug']);
			$icon             = apply_filters('widget_icon',             $instance['icon']);
			$background_video = apply_filters('widget_background_video', $instance['background_video']);

			echo $before_widget;

			if (!empty($title)) {
				// echo $before_title . $title . $after_title;
			}

			$args_custom_page = 'pagename=' . $custom_page_slug;
			$loop_custom_page = new WP_Query($args_custom_page);

			if ($loop_custom_page->have_posts()) :
				while ($loop_custom_page->have_posts()) : $loop_custom_page->the_post();
			?>
					<?php
					$background_video       = trim($background_video);
					$background_media       = "";
					$background_media_class = "";

					if (isset($_GET['bg_video'])) {
						if ($_GET['bg_video'] == 'yes') {
							if (!empty($background_video)) {
								if (has_post_thumbnail()) {
									$attachment_id          = get_post_thumbnail_id(get_the_ID());
									$background_media       = 'style="background-image: url(' . wp_get_attachment_url($attachment_id) . ');"' . ' ' . 'data-parallax-video="' . esc_url($background_video) . '"';
									$background_media_class = 'has-bg-img';
								} else {
									$background_media       = 'data-parallax-video="' . esc_url($background_video) . '"';
									$background_media_class = 'has-bg-img';
								}
							}
						} elseif (has_post_thumbnail()) {
							$attachment_id          = get_post_thumbnail_id(get_the_ID());
							$background_media       = 'style="background-image: url(' . wp_get_attachment_url($attachment_id) . ');"';
							$background_media_class = 'has-bg-img';
						}
					} else {
						if (!empty($background_video)) {
							if (has_post_thumbnail()) {
								$attachment_id          = get_post_thumbnail_id(get_the_ID());
								$background_media       = 'style="background-image: url(' . wp_get_attachment_url($attachment_id) . ');"' . ' ' . 'data-parallax-video="' . esc_url($background_video) . '"';
								$background_media_class = 'has-bg-img';
							} else {
								$background_media       = 'data-parallax-video="' . esc_url($background_video) . '"';
								$background_media_class = 'has-bg-img';
							}
						} elseif (has_post_thumbnail()) {
							$attachment_id          = get_post_thumbnail_id(get_the_ID());
							$background_media       = 'style="background-image: url(' . wp_get_attachment_url($attachment_id) . ');"';
							$background_media_class = 'has-bg-img';
						}
					}
					?>
					<section id="<?php echo esc_attr($custom_page_slug); ?>" class="pt-page page-layout home-section <?php echo esc_attr($background_media_class); ?>" <?php echo $background_media; ?>>
						<div class="content">
							<div class="layout-medium">
								<h1 class="page-title" style="display: none;">
									<?php
									if (!empty($icon)) {
									?>
										<i class="<?php echo esc_attr($icon); ?>"></i>
									<?php
									}
									?>
									<?php
									$page = get_page_by_path($custom_page_slug);

									if ($page) {
										echo get_the_title($page);
									}

									if (!empty($title)) {
									?>
										<input type="hidden" name="menu-item-title" value="<?php echo esc_attr($title); ?>">
									<?php
									} else {
									?>
										<input type="hidden" name="menu-item-title" value="<?php the_title_attribute(array('post' => $page)); ?>">
									<?php
									}
									?>
								</h1> <!-- .page-title -->
								<?php
								the_content();
								?>
							</div> <!-- .layout-medium -->
						</div> <!-- .content -->
					</section> <!-- .pt-page .page-layout .home-section -->
			<?php
				endwhile;
			endif;
			wp_reset_postdata();

			echo $after_widget;
		}
	}

	add_action('widgets_init', function () {
		register_widget('pixelwars__Widget__Home');
	});


	/* ============================================================================================================================================= */


	class pixelwars__Widget__Blog extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct(
				'pixelwars__widget__blog',
				__('(Empathy) [PAGE] Blog', 'empathy'),
				array(
					'description' => __('Latest blog posts.', 'empathy')
				)
			);
		}


		public function form($instance)
		{
			if (isset($instance['title'])) {
				$title                = $instance['title'];
			} else {
				$title                = "";
			}
			if (isset($instance['blog_page_slug'])) {
				$blog_page_slug       = $instance['blog_page_slug'];
			} else {
				$blog_page_slug       = "";
			}
			if (isset($instance['blog_item_width'])) {
				$blog_item_width      = $instance['blog_item_width'];
			} else {
				$blog_item_width      = '340';
			}
			if (isset($instance['blog_number_of_posts'])) {
				$blog_number_of_posts = $instance['blog_number_of_posts'];
			} else {
				$blog_number_of_posts = '9';
			}
			if (isset($instance['blog_editor_content'])) {
				$blog_editor_content  = $instance['blog_editor_content'];
			} else {
				$blog_editor_content  = false;
			}
			if (isset($instance['blog_top_content'])) {
				$blog_top_content     = $instance['blog_top_content'];
			} else {
				$blog_top_content     = false;
			}
			if (isset($instance['layout'])) {
				$layout               = $instance['layout'];
			} else {
				$layout               = 'masonry';
			}
			if (isset($instance['icon'])) {
				$icon                 = $instance['icon'];
			} else {
				$icon                 = "";
			}

			?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php echo __('Title', 'empathy'); ?></label>

				<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>">

				<small style="color: #666666;"><?php echo __('For menu item.', 'empathy'); ?></small>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('icon'); ?>"><?php echo __('Icon', 'empathy'); ?></label>

				<input type="text" class="widefat" id="<?php echo $this->get_field_id('icon'); ?>" name="<?php echo $this->get_field_name('icon'); ?>" value="<?php echo esc_attr($icon); ?>" placeholder="pe-7s-home">

				<small style="color: #666666;"><?php echo __('For menu icon and page icon.', 'empathy'); ?> <?php echo __('Use icon name.', 'empathy'); ?> <a target="_blank" href="https://themes-pixeden.com/font-demos/7-stroke/"><?php echo __('Available icons', 'empathy'); ?></a>.</small>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('blog_page_slug'); ?>"><?php echo __('Select Page', 'empathy'); ?></label>

				<select class="widefat" id="<?php echo $this->get_field_id('blog_page_slug'); ?>" name="<?php echo $this->get_field_name('blog_page_slug'); ?>">
					<option></option>

					<?php
					$pages = get_pages();

					foreach ($pages as $page) {
						if ($blog_page_slug == $page->post_name) {
							$option = '<option selected="selected" value="' . esc_attr($page->post_name) . '">' . $page->post_title . '</option>';
							echo $option;
						} else {
							$option = '<option value="' . esc_attr($page->post_name) . '">' . $page->post_title . '</option>';
							echo $option;
						}
					}
					?>
				</select>

				<small style="color: #666666;"><?php echo __('Select a page for this widget.', 'empathy'); ?></small>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('layout'); ?>"><?php echo __('Layout', 'empathy'); ?></label>

				<select class="widefat" id="<?php echo $this->get_field_id('layout'); ?>" name="<?php echo $this->get_field_name('layout'); ?>">
					<option <?php if ($layout == 'masonry') {
								echo 'selected="selected"';
							} ?> value="masonry"><?php echo __('Masonry', 'empathy'); ?></option>
					<option <?php if ($layout == 'fitRows') {
								echo 'selected="selected"';
							} ?> value="fitRows"><?php echo __('FitRows', 'empathy'); ?></option>
				</select>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('blog_item_width'); ?>"><?php echo __('Item Width (px)', 'empathy'); ?></label>

				<input type="number" min="100" max="500" step="10" class="widefat" id="<?php echo $this->get_field_id('blog_item_width'); ?>" name="<?php echo $this->get_field_name('blog_item_width'); ?>" value="<?php echo esc_attr($blog_item_width); ?>">

				<small style="color: #666666;"><?php echo __('Default: 340', 'empathy'); ?></small>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('blog_number_of_posts'); ?>"><?php echo __('Show Items', 'empathy'); ?></label>

				<input type="number" min="1" max="50" step="1" class="widefat" id="<?php echo $this->get_field_id('blog_number_of_posts'); ?>" name="<?php echo $this->get_field_name('blog_number_of_posts'); ?>" value="<?php echo esc_attr($blog_number_of_posts); ?>">

				<small style="color: #666666;"><?php echo __('Default: 9', 'empathy'); ?></small>
			</p>
			<?php
		}


		public function update($new_instance, $old_instance)
		{
			$instance = array();
			$instance['title']                = strip_tags($new_instance['title']);
			$instance['blog_page_slug']       = strip_tags($new_instance['blog_page_slug']);

			update_option('blog_page_slug', strip_tags($new_instance['blog_page_slug']));

			$instance['blog_item_width']      = strip_tags($new_instance['blog_item_width']);
			$instance['blog_number_of_posts'] = strip_tags($new_instance['blog_number_of_posts']);
			$instance['layout']               = strip_tags($new_instance['layout']);
			$instance['icon']                 = strip_tags($new_instance['icon']);
			return $instance;
		}


		public function widget($args, $instance)
		{
			extract($args);
			$title                = apply_filters('widget_title',                $instance['title']);
			$icon                 = apply_filters('widget_icon',                 $instance['icon']);
			$blog_page_slug       = apply_filters('widget_blog_page_slug',       $instance['blog_page_slug']);
			$layout               = apply_filters('widget_layout',               $instance['layout']);
			$blog_item_width      = apply_filters('widget_blog_item_width',      $instance['blog_item_width']);
			$blog_number_of_posts = apply_filters('widget_blog_number_of_posts', $instance['blog_number_of_posts']);

			echo $before_widget;

			if (!empty($title)) {
				// echo $before_title . $title . $after_title;
			}

			$posts_page_id   = get_option('page_for_posts');
			$posts_page_slug = get_post_field('post_name', $posts_page_id);

			if ($blog_page_slug != $posts_page_slug) {
				$args_blog_page_content = 'pagename=' . $blog_page_slug;
				$loop_blog_page_content = new WP_Query($args_blog_page_content);

				if ($loop_blog_page_content->have_posts()) :
					while ($loop_blog_page_content->have_posts()) : $loop_blog_page_content->the_post();

						$bg_img_class = "";
						$bg_img_html  = "";

						if (has_post_thumbnail()) {
							$bg_img_class = 'has-bg-img';

							$attachment_id  = get_post_thumbnail_id(get_the_ID());
							$attachment_url = wp_get_attachment_url($attachment_id);

							$bg_img_html = 'style="background-image: url( ' . esc_url($attachment_url) . ' );"';
						}

			?>
						<section id="<?php echo esc_attr($blog_page_slug); ?>" class="pt-page page-layout <?php echo esc_attr($bg_img_class); ?>" <?php echo $bg_img_html; ?>>
							<div class="content">
								<div class="layout-medium">
									<h1 class="page-title">
										<?php
										if (!empty($icon)) {
										?>
											<i class="<?php echo esc_attr($icon); ?>"></i>
										<?php
										}

										$page = get_page_by_path($blog_page_slug);

										if ($page) {
											echo get_the_title($page);
										}

										if (!empty($title)) {
										?>
											<input type="hidden" name="menu-item-title" value="<?php echo esc_attr($title); ?>">
										<?php
										} else {
										?>
											<input type="hidden" name="menu-item-title" value="<?php the_title_attribute(array('post' => $page)); ?>">
										<?php
										}
										?>
									</h1> <!-- .page-title -->

									<?php
									$blog_page_content = get_the_content();
									$blog_page_content = trim($blog_page_content);

									if (!empty($blog_page_content)) {
									?>
										<div class="entry-content">
											<?php
											the_content();
											?>
										</div> <!-- .entry-content -->
							<?php
									}

								endwhile;
							endif;
							wp_reset_postdata();
						} else {
							?>
							<section id="<?php echo esc_attr($blog_page_slug); ?>" class="pt-page page-layout">
								<div class="content">
									<div class="layout-medium">
										<h1 class="page-title">
											<?php
											if (!empty($icon)) {
											?>
												<i class="<?php echo esc_attr($icon); ?>"></i>
											<?php
											}

											$page = get_page_by_path($blog_page_slug);

											if ($page) {
												echo get_the_title($page);
											}

											if (!empty($title)) {
											?>
												<input type="hidden" name="menu-item-title" value="<?php echo esc_attr($title); ?>">
											<?php
											} else {
											?>
												<input type="hidden" name="menu-item-title" value="<?php the_title_attribute(array('post' => $page)); ?>">
											<?php
											}
											?>
										</h1> <!-- .page-title -->
									<?php
								}

									?>


									<div class="latest-posts media-grid masonry" data-layout="<?php echo esc_attr($layout); ?>" data-item-width="<?php echo esc_attr($blog_item_width); ?>">
										<?php
										$args_post = array(
											'post_type'      => 'post',
											'posts_per_page' => $blog_number_of_posts
										);

										$loop_post = new WP_Query($args_post);

										if ($loop_post->have_posts()) :
											while ($loop_post->have_posts()) : $loop_post->the_post();
										?>
												<article id="post-<?php the_ID(); ?>" <?php post_class('media-cell'); ?>>
													<?php
													if (has_post_thumbnail()) {
													?>
														<div class="media-box">
															<?php
															the_post_thumbnail('pixelwars__image_size_2');
															?>

															<div class="mask"></div>

															<a href="<?php the_permalink(); ?>"></a>
														</div> <!-- .media-box -->
													<?php
													}
													?>

													<header class="media-cell-desc">
														<span class="date" title="<?php echo get_the_date('Y'); ?>">
															<span class="day"><?php echo get_the_date('d'); ?></span>

															<?php echo get_the_date('M'); ?>
														</span>
														<h3>
															<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
														</h3>
													</header> <!-- .media-cell-desc -->
												</article> <!-- .media-cell -->
										<?php
											endwhile;
										endif;
										wp_reset_postdata();
										?>
									</div> <!-- .latest-posts .media-grid .masonry -->

									<?php
									empathy_blog_page_link();
									?>
									</div> <!-- .layout-medium -->
								</div> <!-- .content -->
							</section> <!-- .pt-page .page-layout -->
						<?php

						echo $after_widget;
					}
				}

				add_action('widgets_init', function () {
					register_widget('pixelwars__Widget__Blog');
				});


				/* ============================================================================================================================================= */


				class pixelwars__Widget__Portfolio extends WP_Widget
				{
					public function __construct()
					{
						parent::__construct(
							'pixelwars__widget__portfolio',
							__('(Empathy) [PAGE] Portfolio', 'empathy'),
							array(
								'description' => __('Portfolio items.', 'empathy')
							)
						);
					}


					public function form($instance)
					{
						if (isset($instance['title'])) {
							$title               = $instance['title'];
						} else {
							$title               = "";
						}
						if (isset($instance['portfolio_page_slug'])) {
							$portfolio_page_slug = $instance['portfolio_page_slug'];
						} else {
							$portfolio_page_slug = "";
						}
						if (isset($instance['layout'])) {
							$layout              = $instance['layout'];
						} else {
							$layout              = 'masonry';
						}
						if (isset($instance['item_width'])) {
							$item_width          = $instance['item_width'];
						} else {
							$item_width          = '340';
						}
						if (isset($instance['icon'])) {
							$icon                = $instance['icon'];
						} else {
							$icon                = "";
						}

						?>
							<p>
								<label for="<?php echo $this->get_field_id('title'); ?>"><?php echo __('Title', 'empathy'); ?></label>

								<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>">

								<small style="color: #666666;"><?php echo __('For menu item.', 'empathy'); ?></small>
							</p>

							<p>
								<label for="<?php echo $this->get_field_id('icon'); ?>"><?php echo __('Icon', 'empathy'); ?></label>

								<input type="text" class="widefat" id="<?php echo $this->get_field_id('icon'); ?>" name="<?php echo $this->get_field_name('icon'); ?>" value="<?php echo esc_attr($icon); ?>" placeholder="pe-7s-home">

								<small style="color: #666666;"><?php echo __('For menu icon and page icon.', 'empathy'); ?> <?php echo __('Use icon name.', 'empathy'); ?> <a target="_blank" href="https://themes-pixeden.com/font-demos/7-stroke/"><?php echo __('Available icons', 'empathy'); ?></a>.</small>
							</p>

							<p>
								<label for="<?php echo $this->get_field_id('portfolio_page_slug'); ?>"><?php echo __('Select Page', 'empathy'); ?></label>

								<select class="widefat" id="<?php echo $this->get_field_id('portfolio_page_slug'); ?>" name="<?php echo $this->get_field_name('portfolio_page_slug'); ?>">
									<option></option>

									<?php
									$pages = get_pages();

									foreach ($pages as $page) {
										if ($portfolio_page_slug == $page->post_name) {
											$option = '<option selected="selected" value="' . esc_attr($page->post_name) . '">' . $page->post_title . '</option>';
											echo $option;
										} else {
											$option = '<option value="' . esc_attr($page->post_name) . '">' . $page->post_title . '</option>';
											echo $option;
										}
									}
									?>
								</select>

								<small style="color: #666666;"><?php echo __('Select a page for this widget.', 'empathy'); ?></small>
							</p>

							<p>
								<label for="<?php echo $this->get_field_id('layout'); ?>"><?php echo __('Layout', 'empathy'); ?></label>

								<select class="widefat" id="<?php echo $this->get_field_id('layout'); ?>" name="<?php echo $this->get_field_name('layout'); ?>">
									<option <?php if ($layout == 'masonry') {
												echo 'selected="selected"';
											} ?> value="masonry"><?php echo __('Masonry', 'empathy'); ?></option>
									<option <?php if ($layout == 'fitRows') {
												echo 'selected="selected"';
											} ?> value="fitRows"><?php echo __('FitRows', 'empathy'); ?></option>
								</select>
							</p>

							<p>
								<label for="<?php echo $this->get_field_id('item_width'); ?>"><?php echo __('Item Width (px)', 'empathy'); ?></label>

								<input type="number" min="100" max="500" step="10" class="widefat" id="<?php echo $this->get_field_id('item_width'); ?>" name="<?php echo $this->get_field_name('item_width'); ?>" value="<?php echo esc_attr($item_width); ?>">

								<small style="color: #666666;"><?php echo __('Default: 340', 'empathy'); ?></small>
							</p>
							<?php
						}


						public function update($new_instance, $old_instance)
						{
							$instance = array();
							$instance['title']               = strip_tags($new_instance['title']);
							$instance['portfolio_page_slug'] = strip_tags($new_instance['portfolio_page_slug']);

							update_option('portfolio_page_slug', strip_tags($new_instance['portfolio_page_slug']));

							$instance['layout']              = strip_tags($new_instance['layout']);
							$instance['item_width']          = strip_tags($new_instance['item_width']);
							$instance['icon']                = strip_tags($new_instance['icon']);
							return $instance;
						}


						public function widget($args, $instance)
						{
							extract($args);
							$title               = apply_filters('widget_title',               $instance['title']);
							$portfolio_page_slug = apply_filters('widget_portfolio_page_slug', $instance['portfolio_page_slug']);
							$portfolio_page_id   = "";
							$layout              = apply_filters('widget_layout',              $instance['layout']);
							$item_width          = apply_filters('widget_item_width',          $instance['item_width']);
							$icon                = apply_filters('widget_icon',                $instance['icon']);

							echo $before_widget;

							if (!empty($title)) {
								// echo $before_title . $title . $after_title;
							}

							if (!empty($portfolio_page_slug)) {
								$args_pf_content = 'pagename=' . $portfolio_page_slug;
								$loop_pf_content = new WP_Query($args_pf_content);

								if ($loop_pf_content->have_posts()) :
									while ($loop_pf_content->have_posts()) : $loop_pf_content->the_post();

										$portfolio_page_id = get_the_ID();

										$attachment_id = get_post_thumbnail_id(get_the_ID());

							?>
										<section id="<?php echo esc_attr($portfolio_page_slug); ?>" class="pt-page page-layout portfolio <?php if (has_post_thumbnail()) {
																																				echo 'has-bg-img' . '"' . ' style="background-image: url( ' . wp_get_attachment_url($attachment_id) . ' );"';
																																			} else {
																																				echo '"';
																																			} ?>>
									<div class=" content">
											<div class="layout-medium">
												<h1 class="page-title">
													<?php
													if (!empty($icon)) {
													?>
														<i class="<?php echo esc_attr($icon); ?>"></i>
													<?php
													}
													?>
													<?php
													$page = get_page_by_path($portfolio_page_slug);

													if ($page) {
														echo get_the_title($page);
													}

													if (!empty($title)) {
													?>
														<input type="hidden" name="menu-item-title" value="<?php echo esc_attr($title); ?>">
													<?php
													} else {
													?>
														<input type="hidden" name="menu-item-title" value="<?php the_title_attribute(array('post' => $page)); ?>">
													<?php
													}
													?>
												</h1> <!-- .page-title -->

												<?php
												$portfolio_page_content = get_the_content();
												$portfolio_page_content = trim($portfolio_page_content);

												if (!empty($portfolio_page_content)) {
												?>
													<div class="entry-content">
														<?php
														the_content();
														?>
													</div>
										<?php
												}

											endwhile;
										endif;
										wp_reset_postdata();
									} else {
										?>
										<section id="<?php echo esc_attr($portfolio_page_slug); ?>" class="pt-page page-layout portfolio">
											<div class="content">
												<div class="layout-medium">
													<h1 class="page-title">
														<?php
														if (!empty($icon)) {
														?>
															<i class="<?php echo esc_attr($icon); ?>"></i>
														<?php
														}
														?>
														<?php
														$page = get_page_by_path($portfolio_page_slug);

														if ($page) {
															echo get_the_title($page);
														}

														if (!empty($title)) {
														?>
															<input type="hidden" name="menu-item-title" value="<?php echo esc_attr($title); ?>">
														<?php
														} else {
														?>
															<input type="hidden" name="menu-item-title" value="<?php the_title_attribute(array('post' => $page)); ?>">
														<?php
														}
														?>
													</h1> <!-- .page-title -->
												<?php
											}

												?>

												<?php
												if (!post_password_required($portfolio_page_id)) {
												?>
													<ul id="filters" class="filters">
														<?php
														$pf_terms = get_categories('type=portfolio&taxonomy=portfolio-category');

														if (count($pf_terms) >= 2) {
														?>
															<li class="current"><a href="#" data-filter="*"><?php _e('All', 'empathy'); ?></a></li>
														<?php
														}

														foreach ($pf_terms as $pf_term) {
														?>
															<li><a href="#" data-filter=".<?php echo esc_attr($pf_term->slug); ?>"><?php echo esc_attr($pf_term->name); ?></a></li>
														<?php
														}
														?>
													</ul>

													<div class="portfolio-items media-grid masonry" data-layout="<?php echo esc_attr($layout); ?>" data-item-width="<?php echo esc_attr($item_width); ?>">
														<?php
														$args_portfolio = array(
															'post_type'      => 'portfolio',
															'posts_per_page' => -1
														);

														$loop_portfolio = new WP_Query($args_portfolio);

														if ($loop_portfolio->have_posts()) :

															while ($loop_portfolio->have_posts()) : $loop_portfolio->the_post();

																$pf_type = get_option(get_the_ID() . 'pf_type', 'Standard');
																$pf_type_icon = "";

																if ($pf_type == 'Lightbox Gallery') {
																	$pf_type_icon = 'image';
																} elseif ($pf_type == 'Lightbox Audio') {
																	$pf_type_icon = 'audio';
																} elseif ($pf_type == 'Lightbox Video') {
																	$pf_type_icon = 'video';
																} elseif ($pf_type == 'Direct URL') {
																	$pf_type_icon = 'url';
																}

																$terms = get_the_terms(get_the_ID(), 'portfolio-category');
																$on_draught = "";

																if ($terms && !is_wp_error($terms)) {
																	$draught_links = array();

																	foreach ($terms as $term) {
																		$draught_links[] = $term->slug;
																	}

																	$on_draught = join(' ', $draught_links);
																}

														?>
																<div id="post-<?php the_ID(); ?>" <?php post_class('media-cell hentry' . ' ' . $on_draught . ' ' . $pf_type_icon); ?>>
																	<?php
																	if (has_post_thumbnail()) {
																	?>
																		<div class="media-box">
																			<?php
																			the_post_thumbnail('pixelwars__image_size_2');
																			?>

																			<div class="mask"></div>

																			<?php
																			if ($pf_type == 'Lightbox Gallery') {
																				the_content();
																			} elseif ($pf_type == 'Lightbox Audio') {
																				$pf_direct_url = stripcslashes(get_option(get_the_ID() . 'pf_direct_url'));

																			?>
																				<a class="lightbox mfp-iframe" href="<?php echo esc_url($pf_direct_url); ?>" title="<?php the_title_attribute(); ?>"></a>
																			<?php
																			} elseif ($pf_type == 'Lightbox Video') {
																				$pf_direct_url = stripcslashes(get_option(get_the_ID() . 'pf_direct_url'));

																			?>
																				<a class="lightbox mfp-iframe" href="<?php echo esc_url($pf_direct_url); ?>" title="<?php the_title_attribute(); ?>"></a>
																			<?php
																			} elseif ($pf_type == 'Direct URL') {
																				$pf_direct_url = stripcslashes(get_option(get_the_ID() . 'pf_direct_url'));
																				$new_tab = get_option(get_the_ID() . 'pf_link_new_tab', true);

																			?>
																				<a <?php if ($new_tab != false) {
																						echo 'target="_blank"';
																					} ?> href="<?php echo esc_url($pf_direct_url); ?>"></a>
																				<?php
																			} else {
																				$pixelwars__ajax = get_option('pixelwars__ajax', 'Yes');

																				if ($pixelwars__ajax != 'No') {
																				?>
																					<a class="ajax" href="<?php the_permalink(); ?>"></a>
																				<?php
																				} else {
																				?>
																					<a href="<?php the_permalink(); ?>"></a>
																			<?php
																				}
																			}
																			?>
																		</div>
																	<?php
																	}
																	?>

																	<div class="media-cell-desc">
																		<h3><?php the_title(); ?></h3>

																		<?php
																		if (has_excerpt()) {
																		?>
																			<p class="category">
																				<?php
																				echo get_the_excerpt();
																				?>
																			</p>
																		<?php
																		}
																		?>
																	</div>
																</div>
														<?php

															endwhile;
														endif;
														wp_reset_postdata();
														?>
													</div>
												<?php
												}
												?>
												</div>
											</div>
										</section>
									<?php

									echo $after_widget;
								}
							}

							add_action('widgets_init', function () {
								register_widget('pixelwars__Widget__Portfolio');
							});


							/* ============================================================================================================================================= */


							class pixelwars_Flickr_Widget extends WP_Widget
							{
								public function __construct()
								{
									parent::__construct(
										'pixelwars_flickr_widget',
										__('(Empathy) Flickr', 'empathy'),
										array('description' => __('Flickr widget.', 'empathy'))
									);
								}


								public function form($instance)
								{
									if (isset($instance['title'])) {
										$title = $instance['title'];
									} else {
										$title = "";
									}


									if (isset($instance['user'])) {
										$user = $instance['user'];
									} else {
										$user = "";
									}

									if (isset($instance['number_of_items'])) {
										$number_of_items = $instance['number_of_items'];
									} else {
										$number_of_items = '8';
									}


									?>
										<p>
											<label for="<?php echo $this->get_field_id('title'); ?>"><?php echo __('Title', 'empathy'); ?></label>

											<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>">
										</p>


										<p>
											<label for="<?php echo $this->get_field_id('user'); ?>"><?php echo __('User', 'empathy'); ?></label>

											<input type="text" class="widefat" id="<?php echo $this->get_field_id('user'); ?>" name="<?php echo $this->get_field_name('user'); ?>" value="<?php echo esc_attr($user); ?>">
										</p>


										<p>
											<label for="<?php echo $this->get_field_id('number_of_items'); ?>"><?php echo __('Number of items to show:', 'empathy'); ?></label>

											<input type="number" min="1" max="50" step="1" id="<?php echo $this->get_field_id('number_of_items'); ?>" name="<?php echo $this->get_field_name('number_of_items'); ?>" size="3" value="<?php echo esc_attr($number_of_items); ?>">
										</p>
									<?php
								}


								public function update($new_instance, $old_instance)
								{
									$instance = array();


									$instance['title'] = strip_tags($new_instance['title']);


									$instance['user'] = strip_tags($new_instance['user']);

									$instance['number_of_items'] = strip_tags($new_instance['number_of_items']);


									return $instance;
								}


								public function widget($args, $instance)
								{
									extract($args);


									$title = apply_filters('widget_title', $instance['title']);


									$user = apply_filters('widget_user', $instance['user']);

									$number_of_items = apply_filters('widget_number_of_items', $instance['number_of_items']);


									echo $before_widget;


									if (!empty($title)) {
										echo $before_title . $title . $after_title;
									}


									?>
										<div class="flickr-badges flickr-badges-s">
											<script src="http://www.flickr.com/badge_code_v2.gne?size=s&amp;count=<?php echo esc_attr($number_of_items); ?>&amp;display=random&amp;layout=x&amp;source=user&amp;user=<?php echo esc_attr($user); ?>"></script>
										</div>
									<?php

									echo $after_widget;
								}
							}

							add_action('widgets_init', function () {
								register_widget('pixelwars_Flickr_Widget');
							});


							/* ============================================================================================================================================= */


							class pixelwars_Social_Feed_Widget extends WP_Widget
							{
								public function __construct()
								{
									parent::__construct(
										'pixelwars_social_feed_widget',
										__('(Empathy) Social Feed', 'empathy'),
										array('description' => __('Social feed widget.', 'empathy'))
									);
								}

								public function form($instance)
								{
									if (isset($instance['title'])) {
										$title = $instance['title'];
									} else {
										$title = "";
									}
									if (isset($instance['network'])) {
										$network = $instance['network'];
									} else {
										$network = "";
									}
									if (isset($instance['user'])) {
										$user = $instance['user'];
									} else {
										$user = "";
									}
									if (isset($instance['number_of_items'])) {
										$number_of_items = $instance['number_of_items'];
									} else {
										$number_of_items = '8';
									}

									?>
										<p>
											<label for="<?php echo $this->get_field_id('title'); ?>"><?php echo __('Title', 'empathy'); ?></label>

											<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>">
										</p>
										<p>
											<label for="<?php echo $this->get_field_id('network'); ?>"><?php echo __('Network', 'empathy'); ?></label>

											<select class="widefat" id="<?php echo $this->get_field_id('network'); ?>" name="<?php echo $this->get_field_name('network'); ?>">
												<option></option>
												<option <?php if ($network == 'pinterest') {
															echo 'selected="selected"';
														} ?> value="pinterest">Pinterest</option>
												<option <?php if ($network == 'picasa') {
															echo 'selected="selected"';
														} ?> value="picasa">Picasa</option>
											</select>
										</p>
										<p>
											<label for="<?php echo $this->get_field_id('user'); ?>"><?php echo __('User', 'empathy'); ?></label>

											<input type="text" class="widefat" id="<?php echo $this->get_field_id('user'); ?>" name="<?php echo $this->get_field_name('user'); ?>" value="<?php echo esc_attr($user); ?>">
										</p>
										<p>
											<label for="<?php echo $this->get_field_id('number_of_items'); ?>"><?php echo __('Number of items to show', 'empathy'); ?></label>

											<input type="number" min="1" max="50" step="1" id="<?php echo $this->get_field_id('number_of_items'); ?>" name="<?php echo $this->get_field_name('number_of_items'); ?>" value="<?php echo esc_attr($number_of_items); ?>">
										</p>
									<?php
								}

								public function update($new_instance, $old_instance)
								{
									$instance = array();
									$instance['title'] = strip_tags($new_instance['title']);
									$instance['network'] = strip_tags($new_instance['network']);
									$instance['user'] = strip_tags($new_instance['user']);
									$instance['number_of_items'] = strip_tags($new_instance['number_of_items']);
									return $instance;
								}

								public function widget($args, $instance)
								{
									extract($args);
									$title = apply_filters('widget_title', $instance['title']);
									$network = apply_filters('widget_network', $instance['network']);
									$user = apply_filters('widget_user', $instance['user']);
									$number_of_items = apply_filters('widget_number_of_items', $instance['number_of_items']);

									echo $before_widget;

									if (!empty($title)) {
										echo $before_title . $title . $after_title;
									}

									?>
										<div class="social-feed" data-social-network="<?php echo esc_attr($network); ?>" data-username="<?php echo esc_attr($user); ?>" data-limit="<?php echo esc_attr($number_of_items); ?>"></div>
										<?php

										echo $after_widget;
									}
								}

								add_action('widgets_init', function () {
									register_widget('pixelwars_Social_Feed_Widget');
								});


								/* ============================================================================================================================================= */
								/* ============================================================================================================================================= */


								// https://github.com/franz-josef-kaiser/Easy-Pagination-Deamon
								// https://github.com/marke123/Easy-Pagination-Deamon


								if (!class_exists('WP')) {
									header('Status: 403 Forbidden');
									header('HTTP/1.1 403 Forbidden');
									exit;
								}


								/**
								 * TEMPLATE TAG
								 * 
								 * A wrapper/template tag for the pagination builder inside the class.
								 * Write a call for this function with a "range" 
								 * inside your template to display the pagination.
								 * 
								 * @param integer $range
								 */

								function oxo_pagination($args)
								{
									return new oxoPagination($args);
								}


								if (!class_exists('oxoPagination')) {
									class oxoPagination
									{
										/**
										 * Plugin root path
										 * @var unknown_type
										 */
										protected $path;

										/**
										 * Plugin version
										 * @var integer
										 */
										protected $version;

										/**
										 * Default arguments
										 * @var array
										 */
										protected $defaults = array(
											'classes'			=> "", 'range'			=> 5, 'wrapper'			=> 'li' // element in which we wrap the link 
											, 'highlight'		=> 'current' // class for the current page
											, 'before'			=> "", 'after'			=> "", 'link_before'		=> "", 'link_after'		=> "", 'next_or_number'	=> 'number', 'nextpagelink'		=> 'Next', 'previouspagelink'	=> 'Prev', 'pagelink'			=> '%'
											# only for attachment img pagination/navigation
											, 'attachment_size'	=> 'thumbnail', 'show_attachment'	=> true
										);

										/**
										 * Input arguments
										 * @var array
										 */
										protected $args;

										/**
										 * Constant for the texdomain (i18n)
										 */
										const LANG = 'empathy';


										public function __construct($args)
										{
											// Set root path variable
											$this->path = $this->get_root_path();

											// Set version
											# $this->version = get_plugin_data();

											# >>>> defaults & arguments

											// apply the "wp_list_pages_args" wordpress native filter also to the custom "page_links" function.
											$this->defaults = apply_filters('wp_link_pages_args', $this->defaults);

											// merge defaults with input arguments
											$this->args = wp_parse_args($args, $this->defaults);

											# <<<< defaults & arguments

											// Help placing the template tag at the right position (inside/outside loop).
											$this->help();

											// Css
											$this->register_styles();
											// Load stylesheet into the 'wp_head()' hook of your theme.
											add_action('wp_head', array(&$this, 'print_styles'));

											// RENDER
											$this->render($this->args);
										}


										/**
										 * Plugin root
										 */
										function get_root_path()
										{
											$path = trailingslashit(WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), "", plugin_basename(__FILE__)));
											$path = apply_filters('config_pagination_url', $path);

											return $this->path = $path;
										}


										/**
										 * Return plugin comment data
										 * 
										 * @since 0.1.3.3
										 * 
										 * @param $value string | default = 'Version' (Other input values: Name, PluginURI, Version, Description, Author, AuthorURI, TextDomain, DomainPath, Network, Title)
										 * 
										 * @return string
										 */
										private function get_plugin_data($value = 'Version')
										{
											$plugin_data = get_plugin_data(__FILE__);

											return $plugin_data[$value];
										}

										/**
										 * Register styles
										 */
										function register_styles()
										{
											if (!is_admin()) {
												// Search for a stylesheet
												$name = '/pagination.css';

												if (file_exists(get_stylesheet_directory() . $name)) {
													$file = get_stylesheet_directory() . $name;
												} elseif (file_exists(get_template_directory() . $name)) {
													$file = get_template_directory() . $name;
												} elseif (file_exists($this->path . $name)) {
													$file = $this->path . $name;
												} else {
													return;
												}

												// try to avoid caching stylesheets if they changed
												$version = filemtime($file);

												// If no change was found, use the plugins version number
												if (!$version)
													$version = $this->version;

												wp_register_style('pagination', $file, false, $version, 'screen');
											}
										}

										/**
										 * Print styles
										 */
										function print_styles()
										{
											if (!is_admin()) {
												wp_enqueue_style('pagination');
											}
										}

										/**
										 * Help with placing the template tag right
										 */
										function help()
										{
											/*
				if ( is_single() && ! in_the_loop() )
				{
					$output = sprintf( __( 'You should place the %1$s template tag inside the loop on singular templates.', self::LANG ), __CLASS__ );
				}
				else

				_doing_it_wrong( 'Class: '.__CLASS__.' function: '.__FUNCTION__, 'error message' );
				*/
											if (!is_single() && in_the_loop()) {
												// $output = sprintf( __( 'You shall not place the %1$s template tag inside the loop on list/archives/search/etc templates.', self::LANG ), __CLASS__ );

												$output = sprintf(__('You shall not place the %1$s template tag inside the loop on list/archives/search/etc templates.', 'empathy'), __CLASS__);
											}

											if (!isset($output))
												return;

											// error
											$message = new WP_Error(
												__CLASS__,
												$output
											);

											// render
											if (is_wp_error($message)) {
										?>
												<div id="oxo-error-<?php echo esc_attr($message->get_error_code()); ?>" class="error oxo-error prepend-top clear">
													<strong>
														<?php echo $message->get_error_message(); ?>
													</strong>
												</div>
											<?php
											}
										}


										/**
										 * Replacement for the native wp_link_page() function
										 * 
										 * @author original version: Thomas Scholz (toscho.de)
										 * @link http://wordpress.stackexchange.com/questions/14406/how-to-style-current-page-number-wp-link-pages/14460#14460
										 * 
										 * @param (mixed) array $args
										 */
										public function page_links($args)
										{
											global $page, $numpages, $multipage, $more, $pagenow;

											$args = wp_parse_args($args, $this->defaults);
											extract($args, EXTR_SKIP);

											if (!$multipage)
												return;

											# ============================================== #

											# >>>> css classes wrapper
											$start_classes = isset($classes) ? ' class="' : '';
											$end_classes = isset($classes) ? '"' : '';
											# <<<< css classes wrapper

											$output  = $before;

											switch ($next_or_number) {
												case 'next':

													if ($more) {
														# >>>> [prev]
														$i = $page - 1;
														if ($i && $more) {
															# >>>> <li class="custom-class">
															$output .= '<' . $wrapper . $start_classes . $classes . $end_classes . '>';
															$output .= _wp_link_page($i) . $link_before . $previouspagelink . $link_after . '</a>';
															$output .= '</' . $wrapper . '>';
															# <<<< </li>
														}
														# <<<< [prev]

														# >>>> [next]
														$i = $page + 1;
														if ($i <= $numpages && $more) {
															# >>>> <li class="custom-class">
															$output .= '<' . $wrapper . $start_classes . $classes . $end_classes . '>';
															$output .= _wp_link_page($i) . $link_before . $nextpagelink . $link_after . '</a>';
															$output .= '</' . $wrapper . '>';
															# <<<< </li>
														}
														# <<<< [next]
													}

													break;

												case 'number':

													for ($i = 1; $i < ($numpages + 1); $i++) {
														$classes = isset($this->args['classes']) ? $this->args['classes'] : '';

														if ($page === $i && isset($this->args['highlight']))
															$classes .= ' ' . $this->args['highlight'];

														# >>>> <li class="current custom-class">
														$output .= '<' . $wrapper . $start_classes . $classes . $end_classes . '>';

														# >>>> [1] [2] [3] [4]
														$j = str_replace('%', $i, $pagelink);

														if ($page !== $i || (!$more && $page == true)) {
															$output .= _wp_link_page($i) . $link_before . $j . $link_after . '</a>';
														}

														// the current page must not have a link to itself
														else {
															$output .= $link_before . '<span>' . $j . '</span>' . $link_after;
														}
														# <<<< [next]/[prev] | [1] [2] [3] [4]

														$output .= '</' . $wrapper . '>';
														# <<<< </li>
													}

													break;

												default:

													// in case you can imagine some funky way to paginate
													do_action('hook_pagination_next_or_number', $page_links, $classes);
													break;
											}

											$output .= $after;

											return $output;
										}


										/**
										 * Navigation for image attachments
										 * 
										 * @param unknown_type $args
										 */
										public function attachment_links($args)
										{
											global $post, $page;

											$args = wp_parse_args($args, $this->defaults);
											extract($args, EXTR_SKIP);

											# ============================================== #

											$attachments = array_values(get_children(array(
												'post_parent'		=> $post->post_parent, 'post_status'		=> 'inherit', 'post_type'		=> 'attachment', 'post_mime_type'	=> 'image', 'order'			=> 'ASC', 'orderby'			=> 'menu_order ID'
											)));

											// setup the keys for our links
											foreach ($attachments as $key => $attachment) {
												if ($attachment->ID == $post->ID)
													break;
											}

											# ============================================== #
											# @todo implement rel="next/prev" for links

											# >>>> css classes wrapper
											$start_classes = isset($classes) ? ' class="' : '';
											$classes = isset($classes) ? ' ' . $classes : '';
											$end_classes = isset($classes) ? '"' : '';
											# <<<< css classes wrapper

											$output  = $before;
											# >>>> [prev]
											if (isset($attachments[$key - 1])) {
												$prev_href = get_attachment_link($attachments[$key - 1]->ID);

												$prev_title = str_replace("_", " ", $attachments[$key - 1]->post_title);
												$prev_title = str_replace("-", " ", $prev_title);

												if ($show_attachment === true) {
													if ((is_int($attachment_size) && $attachment_size != 0) || (is_string($attachment_size) && $attachment_size != 'none') || $attachment_size != false)
														$prev_img = wp_get_attachment_image($attachments[$key - 1]->ID, $attachment_size, false);
												}

												# >>>> <li class="custom-class">
												$output .= '<' . $wrapper . $start_classes . $classes . $end_classes . '>';
												$output .= $link_before . '<a href="' . $prev_href . '" title="' . esc_attr($prev_title) . '" rel="attachment prev">' . $prev_img . $previouspagelink . '</a>' . $link_after;
												$output .= '</' . $wrapper . '>';
												# <<<< </li>
											}
											# <<<< [prev]

											# >>>> [next]
											if (isset($attachments[$key + 1])) {
												$next_href = get_attachment_link($attachments[$key + 1]->ID);

												$next_title = str_replace("_", " ", $attachments[$key + 1]->post_title);
												$next_title = str_replace("-", " ", $next_title);

												if ($show_attachment === true) {
													if ((is_int($attachment_size) && $attachment_size != 0) || (is_string($attachment_size) && $attachment_size != 'none') || $attachment_size != false)
														$next_img = wp_get_attachment_image($attachments[$key + 1]->ID, $attachment_size, false);
												}

												# >>>> <li class="custom-class">
												$output .= '<' . $wrapper . $start_classes . $classes . $end_classes . '>';
												$output .= $link_before . '<a href="' . $next_href . '" title="' . esc_attr($next_title) . '" rel="attachment prev">' . $next_img . $nextpagelink . '</a>' . $link_after;
												$output .= '</' . $wrapper . '>';
												# <<<< </li>
											}
											# <<<< [next]
											$output .= $after;

											#echo '<pre>';print_r($k);echo '</pre>';
											return $output;
										}


										/**
										 * Wordpress pagination for archives/search/etc.
										 * 
										 * Semantically correct pagination inside an unordered list
										 * 
										 * Displays: [First] [<<] [1] [2] [3] [4] [>>] [Last]
										 *	+ First/Last only appears if not on first/last page
										 *	+ Shows next/previous links [<<]/[>>]
										 * 
										 * Accepts a range attribute (default = 5) to adjust the number
										 * of direct page links that link to the pages above/below the current one.
										 * 
										 * @param (integer) $range
										 */
										function render($args = array('classes', 'range'))
										{
											// $paged - number of the current page
											global $wp_query, $paged, $numpages;

											extract($args, EXTR_SKIP);

											# ============================================== #

											// How much pages do we have?
											$max_page = (int) $wp_query->max_num_pages;

											// We need the pagination only if there is more than 1 page
											if ($max_page > (int) 1)
												$paged = !$wp_query->query_vars['paged'] ? (int) 1 : $wp_query->query_vars['paged'];

											$classes = isset($classes) ? ' ' . $classes : '';
											?>

											<ul class="pagination">

												<?php
												// *******************************************************
												// To the first / previous page
												// On the first page, don't put the first / prev page link
												// *******************************************************
												if ($paged !== (int) 1 && $paged !== (int) 0 && !is_page()) {
												?>
													<li class="pagination-first <?php echo esc_attr($classes); ?>">
														<?php
														$first_post_link = get_pagenum_link(1);
														?>
														<a href=<?php echo esc_url($first_post_link); ?> rel="first">
															<?php _e('First', 'empathy'); ?>
														</a>
													</li>

													<li class="pagination-prev <?php echo esc_attr($classes); ?>">
														<?php
														# let's use the native fn instead of the previous_/next_posts_link() alias
														# get_adjacent_post( $in_same_cat = false, $excluded_categories = '', $previous = true )

														// Get the previous post object
														$in_same_cat	= is_category() || is_tag() || is_tax() ? true : false;
														$prev_post_obj	= get_adjacent_post($in_same_cat);
														// Get the previous posts ID
														$prev_post_ID	= isset($prev_post_obj->ID) ? $prev_post_obj->ID : '';

														// Set title & link for the previous post
														if (is_single()) {
															if (isset($prev_post_obj)) {
																$prev_post_link		= get_permalink($prev_post_ID);
																$prev_post_title	= '&laquo;';
																// $prev_post_title	= __( 'Prev', self::LANG ) . ': ' . mb_substr( $prev_post_obj->post_title, 0, 6 );
															}
														} else {
															$prev_post_link		= home_url() . '/page/' . ($paged - 1) . '/';

															$prev_post_title	= '&laquo;';
														}
														?>
														<!-- Render Link to the previous post -->
														<a href="<?php echo esc_url($prev_post_link); ?>" rel="prev">
															<?php echo $prev_post_title; ?>
														</a>
														<?php # previous_posts_link(' &laquo; '); // 
														?>
													</li>
													<?php
												}

												// Render, as long as there are more posts found, than we display per page
												if (!$wp_query->query_vars['posts_per_page'] < $wp_query->found_posts) {

													// *******************************************************
													// We need the sliding effect only if there are more pages than is the sliding range
													// *******************************************************
													if ($max_page > $range) {
														// When closer to the beginning
														if ($paged < $range) {
															for ($i = 1; $i <= ($range + 1); $i++) {
																$current = '';
																// Apply the css class "current" if it's the current post
																if ($paged === (int) $i) {
																	$current = ' current';
																	# echo _wp_link_page( $i ).'</a>';
																}
													?>
																<li class="pagination-num<?php echo esc_attr($classes . $current); ?>">
																	<!-- Render page number Link -->
																	<a href="<?php echo get_pagenum_link($i); ?>">
																		<?php echo $i; ?>
																	</a>
																</li>
															<?php
															}
														}
														// When closer to the end
														elseif ($paged >= ($max_page - ceil($range / 2))) {
															for ($i = $max_page - $range; $i <= $max_page; $i++) {
																$current = '';
																// Apply the css class "current" if it's the current post
																$current = ($paged === (int) $i) ? ' current' : '';

															?>
																<li class="pagination-num<?php echo esc_attr($classes . $current); ?>">
																	<!-- Render page number Link -->
																	<a href="<?php echo get_pagenum_link($i); ?>">
																		<?php echo $i; ?>
																	</a>
																</li>
															<?php
															}
														}
														// Somewhere in the middle
														elseif ($paged >= $range && $paged < ($max_page - ceil($range / 2))) {
															for ($i = ($paged - ceil($range / 2)); $i <= ($paged + ceil($range / 2)); $i++) {
																$current = '';
																// Apply the css class "current" if it's the current post
																$current = ($paged === (int) $i) ? ' current' : '';

															?>
																<li class="pagination-num<?php echo esc_attr($classes . $current); ?>">
																	<!-- Render page number Link -->
																	<a href="<?php echo get_pagenum_link($i); ?>">
																		<?php echo $i; ?>
																	</a>
																</li>
															<?php
															}
														}
													}
													// Less pages than the range, no sliding effect needed
													else {
														for ($i = 1; $i <= $max_page; $i++) {
															$current = '';
															// Apply the css class "current" if it's the current post
															$current = ($paged === (int) $i) ? ' current' : '';

															?>
															<li class="pagination-num<?php echo esc_attr($classes . $current); ?>">
																<!-- Render page number Link -->
																<a href="<?php echo get_pagenum_link($i); ?>">
																	<?php echo $i; ?>
																</a>
															</li>
													<?php
														}
													} // endif;
												} // endif; there are more posts found, than we display per page 


												// *******************************************************
												// to the last / next page of a paged post
												// This only get's used on posts/pages that use the <!--nextpage--> quicktag
												// *******************************************************
												if (is_singular()) {
													$echo = false;

													if (wp_attachment_is_image() === true) {
														echo $this->attachment_links($this->args);
													} elseif ($numpages > 1) {
														echo $this->page_links($this->args);
													}
												}


												// *******************************************************
												// to the last / next page
												// On the last page: don't show the link to the last/next page
												// *******************************************************
												if ($paged !== (int) 0 && $paged !== (int) $max_page && $max_page !== (int) 0 && !is_page()) {
													?>
													<li class="pagination-next<?php echo esc_attr($classes); ?>">
														<?php
														# let's use the native fn instead of the previous_/next_posts_link() alias
														# get_adjacent_post( $in_same_cat = false, $excluded_categories = '', $previous = true )

														// Get the next post object
														$in_same_cat	= is_category() || is_tag() || is_tax() ? true : false;
														$next_post_obj	= get_adjacent_post($in_same_cat, '', false);
														// Get the next posts ID
														$next_post_ID	= isset($next_post_obj->ID) ? $next_post_obj->ID : '';

														// Set title & link for the next post
														if (is_single()) {
															if (isset($next_post_obj)) {
																# $next_post_link = get_next_posts_link();
																# $next_post_paged_link = get_next_posts_page_link();
																$next_post_link		= get_permalink($next_post_ID);
																$next_post_title	= '&raquo;';
																// $next_post_title	= __( 'Next', self::LANG ) . mb_substr( $next_post_obj->post_title, 0, 6 );
															}
														} else {
															$next_post_link		= home_url() . '/page/' . ($paged + 1) . '/';

															$next_post_title	= '&raquo;';
														}


														if (isset($next_post_obj)) {
														?>
															<!-- Render Link to the next post -->
															<a href="<?php echo esc_url($next_post_link); ?>" rel="next">
																<?php echo $next_post_title; ?>
															</a>
														<?php
														} else {
															next_posts_link(' &raquo; ');
														}
														?>
													</li>

													<li class="pagination-last<?php echo esc_attr($classes); ?>">
														<?php
														$last_post_link = get_pagenum_link($max_page);
														?>
														<!-- Render Link to the last post -->
														<a href="<?php echo esc_url($last_post_link); ?>" rel="last">
															<?php _e('Last', 'empathy'); ?>
														</a>
													</li>
												<?php
												}
												// endif;
												?>
											</ul>
										<?php
										}
									}
								}


								/* ============================================================================================================================================= */
								/* ============================================================================================================================================= */


								/*
		This function returns an ID based on the provided chat author name. It keeps these IDs in a global 
		array and makes sure we have a unique set of IDs.  The purpose of this function is to provide an "ID"
		that will be used in an HTML class for individual chat rows so they can be styled. So, speaker "John" 
		will always have the same class each time he speaks. And, speaker "Mary" will have a different class 
		from "John" but will have the same class each time she speaks.
		
		@author David Chandra
		@link http://www.turtlepod.org
		@author Justin Tadlock
		@link http://justintadlock.com
		@copyright Copyright (c) 2012
		@license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
		@link http://justintadlock.com/archives/2012/08/21/post-formats-chat
		
		@global array $_post_format_chat_ids An array of IDs for the chat rows based on the author.
		@param string $chat_author Author of the current chat row.
		@return int The ID for the chat row based on the author.
	*/


								function pixelwars__format_chat_row_id($chat_author)
								{
									global $_post_format_chat_ids;


									/* Let's sanitize the chat author to avoid craziness and differences like "John" and "john". */
									$chat_author = strtolower(strip_tags($chat_author));


									/* Add the chat author to the array. */
									$_post_format_chat_ids[] = $chat_author;


									/* Make sure the array only holds unique values. */
									$_post_format_chat_ids = array_unique($_post_format_chat_ids);


									/* Return the array key for the chat author and add "1" to avoid an ID of "0". */
									return absint(array_search($chat_author, $_post_format_chat_ids)) + 1;
								}


								/*
		This function filters the post content when viewing a post with the "chat" post format.  It formats the 
		content with structured HTML markup to make it easy for theme developers to style chat posts. The 
		advantage of this solution is that it allows for more than two speakers (like most solutions). You can 
		have 100s of speakers in your chat post, each with their own, unique classes for styling.
		
		@author David Chandra
		@link http://www.turtlepod.org
		@author Justin Tadlock
		@link http://justintadlock.com
		@copyright Copyright (c) 2012
		@license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
		@link http://justintadlock.com/archives/2012/08/21/post-formats-chat
		
		@global array $_post_format_chat_ids An array of IDs for the chat rows based on the author.
		@param string $content The content of the post.
		@return string $chat_output The formatted content of the post.
	*/


								function pixelwars__format_chat_content($content)
								{
									global $_post_format_chat_ids;


									/* If this is not a 'chat' post, return the content. */
									if (!has_post_format('chat')) {
										return $content;
									}


									/* Set the global variable of speaker IDs to a new, empty array for this chat. */
									$_post_format_chat_ids = array();


									/* Allow the separator (separator for speaker/text) to be filtered. */
									$separator = apply_filters('my_post_format_chat_separator', ':');


									/* Open the chat transcript div and give it a unique ID based on the post ID. */
									$chat_output = "\n\t\t\t" . '<div id="chat-transcript-' . esc_attr(get_the_ID()) . '" class="chat-transcript">';


									/* Split the content to get individual chat rows. */
									$chat_rows = preg_split("/(\r?\n)+|(<br\s*\/?>\s*)+/", $content);


									/* Loop through each row and format the output. */
									foreach ($chat_rows as $chat_row) {
										/* If a speaker is found, create a new chat row with speaker and text. */
										if (strpos($chat_row, $separator)) {
											/* Split the chat row into author/text. */
											$chat_row_split = explode($separator, trim($chat_row), 2);


											/* Get the chat author and strip tags. */
											$chat_author = strip_tags(trim($chat_row_split[0]));


											/* Get the chat text. */
											$chat_text = trim($chat_row_split[1]);


											/* Get the chat row ID (based on chat author) to give a specific class to each row for styling. */
											$speaker_id = pixelwars__format_chat_row_id($chat_author);


											/* Open the chat row. */
											$chat_output .= "\n\t\t\t\t" . '<div class="chat-row ' . sanitize_html_class("chat-speaker-{$speaker_id}") . '">';


											/* Add the chat row author. */
											$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-author ' . sanitize_html_class(strtolower("chat-author-{$chat_author}")) . ' vcard"><cite class="fn">' . apply_filters('my_post_format_chat_author', $chat_author, $speaker_id) . '</cite>' . $separator . '</div>';


											/* Add the chat row text. */
											$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-text"><p>' . str_replace(array("\r", "\n", "\t"), '', apply_filters('my_post_format_chat_text', $chat_text, $chat_author, $speaker_id)) . '</p></div>';


											/* Close the chat row. */
											$chat_output .= "\n\t\t\t\t" . '</div><!-- .chat-row -->';
										}
										/*
				If no author is found, assume this is a separate paragraph of text that belongs to the
				previous speaker and label it as such, but let's still create a new row.
			*/ else {
											/* Make sure we have text. */
											if (!empty($chat_row)) {
												/* Open the chat row. */
												$chat_output .= "\n\t\t\t\t" . '<div class="chat-row ' . sanitize_html_class("chat-speaker-{$speaker_id}") . '">';


												/* Don't add a chat row author.  The label for the previous row should suffice. */


												/* Add the chat row text. */
												$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-text"><p>' . str_replace(array("\r", "\n", "\t"), '', apply_filters('my_post_format_chat_text', $chat_row, $chat_author, $speaker_id)) . '</p></div>';


												/* Close the chat row. */
												$chat_output .= "\n\t\t\t</div><!-- .chat-row -->";
											}
										}
									}


									/* Close the chat transcript div. */
									$chat_output .= "\n\t\t\t</div><!-- .chat-transcript -->\n";


									/* Return the chat content and apply filters for developers. */
									return apply_filters('pixelwars__post_format_chat_content', $chat_output);
								}


								/* Filter the content of chat posts. */
								add_filter('the_content', 'pixelwars__format_chat_content');


								/* ============================================================================================================================================= */


								add_filter('the_excerpt', 'do_shortcode');
								add_filter('widget_text', 'do_shortcode');


								/* ============================================================================================================================================= */


								function alert($atts, $content = "")
								{
									extract(shortcode_atts(array('type' => ""), $atts));


									$alert = '<div class="alert ' . $type . '">' . do_shortcode($content) . '</div>';


									return $alert;
								}

								add_shortcode('alert', 'alert');


								/* ============================================================================================================================================= */


								function social_icon($atts, $content = "")
								{
									extract(shortcode_atts(array(
										'first_icon' => "",
										'last_icon' => "",
										'type' => "",
										'url' => ""
									), $atts));


									if ($first_icon == 'yes') {
										$first_icon = '<ul class="social">';
									}


									if ($last_icon == 'yes') {
										$last_icon = '</ul>';
									}


									$social_icon = $first_icon;
									$social_icon .= '<li>';
									$social_icon .= '<a target="_blank" class="' . $type . '" href="' . $url . '"></a>';
									$social_icon .= '</li>';
									$social_icon .= $last_icon;


									return $social_icon;
								}

								add_shortcode('social_icon', 'social_icon');


								/* ============================================================================================================================================= */


								function toggle($atts, $content = "")
								{
									extract(shortcode_atts(array(
										'first_toggle' => "",
										'last_toggle' => "",
										'title' => "",
										'active' => ""
									), $atts));


									if ($first_toggle == 'yes') {
										$first_toggle = '<div class="toggle-group">';
									}


									if ($last_toggle == 'yes') {
										$last_toggle = '</div>';
									}


									if ($active == 'yes') {
										$active = ' class="active"';
									}


									$toggle = $first_toggle;
									$toggle .= '<div class="toggle">';
									$toggle .= '<h4' . $active . '>' . $title . '</h4>';
									$toggle .= '<div class="toggle-content">';
									$toggle .= do_shortcode($content);
									$toggle .= '</div>';
									$toggle .= '</div>';
									$toggle .= $last_toggle;


									return $toggle;
								}

								add_shortcode('toggle', 'toggle');


								/* ============================================================================================================================================= */


								function accordion($atts, $content = "")
								{
									extract(shortcode_atts(array(
										'first_accordion' => "",
										'last_accordion' => "",
										'title' => "",
										'active' => ""
									), $atts));


									if ($first_accordion == 'yes') {
										$first_accordion = '<div class="toggle-group accordion">';
									}


									if ($last_accordion == 'yes') {
										$last_accordion = '</div>';
									}


									if ($active == 'yes') {
										$active = ' class="active"';
									}


									$accordion = $first_accordion;
									$accordion .= '<div class="toggle">';
									$accordion .= '<h4' . $active . '>' . $title . '</h4>';
									$accordion .= '<div class="toggle-content">';
									$accordion .= do_shortcode($content);
									$accordion .= '</div>';
									$accordion .= '</div>';
									$accordion .= $last_accordion;


									return $accordion;
								}

								add_shortcode('accordion', 'accordion');


								/* ============================================================================================================================================= */


								function tabs_wrap($atts, $content = "")
								{
									extract(shortcode_atts(array(
										'titles' => "",
										'active' => ""
									), $atts));


									$titles_with_commas = $titles;
									$titles_with_markup = "";

									if ($titles_with_commas != "") {
										$titles_array = preg_split("/[\s]*[,][\s]*/", $titles_with_commas);

										foreach ($titles_array as $title_name) {
											if ($active == $title_name) {
												$titles_with_markup .= '<li><a class="active">' . $title_name . '</a></li>';
											} else {
												$titles_with_markup .= '<li><a>' . $title_name . '</a></li>';
											}
										}
									}


									$tabs_wrap = '<div class="tabs">';
									$tabs_wrap .= '<ul class="tab-titles">';
									$tabs_wrap .= $titles_with_markup;
									$tabs_wrap .= '</ul>';
									$tabs_wrap .= '<div class="tab-content">';
									$tabs_wrap .= do_shortcode($content);
									$tabs_wrap .= '</div>';
									$tabs_wrap .= '</div>';


									return $tabs_wrap;
								}

								add_shortcode('tabs_wrap', 'tabs_wrap');


								/* ============================================================================================================================================= */


								function tab_pane($atts, $content = "")
								{
									$tab_pane = '<div>';
									$tab_pane .= do_shortcode($content);
									$tab_pane .= '</div>';


									return $tab_pane;
								}

								add_shortcode('tab_pane', 'tab_pane');


								/* ============================================================================================================================================= */


								function icon($atts, $content = "")
								{
									extract(shortcode_atts(array('name' => ""), $atts));


									$icon = '<i class="' . $name . '"></i>';


									return $icon;
								}

								add_shortcode('icon', 'icon');


								/* ============================================================================================================================================= */


								function button($atts, $content = "")
								{
									extract(shortcode_atts(array(
										'text'    => "",
										'new_tab' => "",
										'size'    => "",
										'icon'    => "",
										'url'     => ""
									), $atts));


									if ($new_tab == 'yes') {
										$new_tab = ' target="_blank"';
									}


									if ($icon != "") {
										$icon = '<i class="' . $icon . '"></i>';
									}


									$button = '<a' . $new_tab . ' class="button ' . $size . '" href="' . $url . '">' . $icon . $text . '</a>';


									return $button;
								}

								add_shortcode('button', 'button');


								/* ============================================================================================================================================= */


								function row($atts, $content = "")
								{
									$row = '<div class="row">' . do_shortcode($content) . '</div>';


									return $row;
								}

								add_shortcode('row', 'row');


								/* ============================================================================================================================================= */


								function column($atts, $content = "")
								{
									extract(shortcode_atts(array(
										'width'    => "",
										'width_xs' => "",
										'width_md' => "",
										'width_lg' => ""
									), $atts));


									if ($width != "") {
										$width = 'col-sm-' . $width;
									}


									if ($width_xs != "") {
										$width_xs = ' col-xs-' . $width_xs;
									}


									if ($width_md != "") {
										$width_md = ' col-md-' . $width_md;
									}


									if ($width_lg != "") {
										$width_lg = ' col-lg-' . $width_lg;
									}


									$column = '<div class="' . $width . $width_xs . $width_md . $width_lg . '">' . do_shortcode($content) . '</div>';


									return $column;
								}

								add_shortcode('column', 'column');


								/* ============================================================================================================================================= */

								function quote($atts, $content = "")
								{
									extract(shortcode_atts(array('name' => ""), $atts));


									$quote = '<blockquote>';
									$quote .= do_shortcode($content);
									$quote .= '<cite>' . $name . '</cite>';
									$quote .= '</blockquote>';


									return $quote;
								}

								add_shortcode('quote', 'quote');


								/* ============================================================================================================================================= */


								function progress_bar($atts, $content = "")
								{
									extract(shortcode_atts(array(
										'text'    => "",
										'percent' => ""
									), $atts));


									$progress_bar = '<div class="skill-unit"><h4>' . $text . '</h4><div class="bar" data-percent="' . $percent . '"><div class="progress"></div></div></div>';


									return $progress_bar;
								}

								add_shortcode('progress_bar', 'progress_bar');


								/* ============================================================================================================================================= */


								function testimonial($atts, $content = "")
								{
									$testimonial = '<div class="testo">' . do_shortcode($content) . '</div>';


									return $testimonial;
								}

								add_shortcode('testimonial', 'testimonial');


								/* ============================================================================================================================================= */


								function event($atts, $content = "")
								{
									$event = '<div class="event">' . do_shortcode($content) . '</div>';


									return $event;
								}

								add_shortcode('event', 'event');


								/* ============================================================================================================================================= */


								function service($atts, $content = "")
								{
									$service = '<div class="service">' . do_shortcode($content) . '</div>';


									return $service;
								}

								add_shortcode('service', 'service');


								/* ============================================================================================================================================= */


								function process($atts, $content = "")
								{
									$process = '<div class="process">' . do_shortcode($content) . '</div>';


									return $process;
								}

								add_shortcode('process', 'process');


								/* ============================================================================================================================================= */


								function fun_fact($atts, $content = "")
								{
									$fun_fact = '<div class="fun-fact">' . do_shortcode($content) . '</div>';


									return $fun_fact;
								}

								add_shortcode('fun_fact', 'fun_fact');


								/* ============================================================================================================================================= */


								function client($atts, $content = "")
								{
									$client = '<div class="client">' . do_shortcode($content) . '</div>';


									return $client;
								}

								add_shortcode('client', 'client');


								/* ============================================================================================================================================= */


								function section_title($atts, $content = "")
								{
									extract(shortcode_atts(array(
										'align' => 'center',
										'text'  => ""
									), $atts));


									$section_title = '<div class="section-title ' . $align . '"><h2><i>' . $text . '</i></h2></div>';


									return $section_title;
								}

								add_shortcode('section_title', 'section_title');


								/* ============================================================================================================================================= */


								function map($atts, $content = "")
								{
									extract(shortcode_atts(array(
										'latitude'  => "",
										'longitude' => "",
										'zoom'      => "",
										'image'     => ""
									), $atts));

									$output = '<div class="map">';

									$google_map_api_key = get_option('google_map_api_key', "");

									if ($google_map_api_key != "") {
										$output .= '<p style="padding: 0px; margin: 0px;"><script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=' . esc_attr($google_map_api_key) . '"></script></p>';
									} else {
										$output .= '<p style="padding: 0px; margin: 0px;"><script type="text/javascript" src="//maps.googleapis.com/maps/api/js"></script></p>';
									}

									$output .= '<div id="map-canvas" class="map-canvas" data-latitude="' . $latitude . '" data-longitude="' . $longitude . '" data-zoom="' . $zoom . '" data-marker-image="' . $image . '"></div>';

									$output .= '</div>';

									return $output;
								}

								add_shortcode('map', 'map');


								/* ============================================================================================================================================= */


								function contact_form($atts, $content = "")
								{
									extract(shortcode_atts(array(
										'to'      => "",
										'subject' => ""
									), $atts));

									if ($to != "") {
										update_option('contact_form_to', $to);
									} else {
										$admin_email = get_bloginfo('admin_email');
										update_option('contact_form_to', $admin_email);
									}

									// Get the site domain and get rid of www.
									$site_url = strtolower($_SERVER['SERVER_NAME']);

									if (substr($site_url, 0, 4) == 'www.') {
										$site_url = substr($site_url, 4);
									}

									$sender_domain = 'server@' . $site_url;

									$output = '<div class="contact-form">';
									$output .= '<form id="contact-form" method="post" action="' . get_template_directory_uri() . '/send-mail.php">';
									$output .= '<p><label for="name">' . __('NAME', 'empathy') . '</label><input type="text" id="name" name="name" class="required"></p>';
									$output .= '<p><label for="email">' . __('EMAIL', 'empathy') . '</label><input type="text" id="email" name="email" class="required email"></p>';
									$output .= '<p class="antispam"><label for="url">' . __('Leave this empty', 'empathy') . '</label><input type="text" id="url" name="url"></p>';
									$output .= '<p><label for="message">' . __('MESSAGE', 'empathy') . '</label><textarea id="message" name="message" class="required"></textarea></p>';
									$output .= '<p style="padding: 0px; margin: 0px;"><input type="hidden" id="sender_domain" name="sender_domain" value="' . $sender_domain . '"></p>';
									$output .= '<p style="padding: 0px; margin: 0px;"><input type="hidden" id="subject" name="subject" value="' . $subject . '"></p>';
									$output .= '<p><input type="submit" class="submit button primary" value="' . __('SEND', 'empathy') . '"></p>';
									$output .= '</form>';
									$output .= '</div>';

									return $output;
								}

								add_shortcode('contact_form', 'contact_form');


								/* ============================================================================================================================================= */


								function rotate_words($atts, $content = "")
								{
									extract(shortcode_atts(array('titles' => ""), $atts));


									$items_with_commas = $titles;

									$items_in_array = preg_split("/[\s]*[,][\s]*/", $items_with_commas);

									$item_first = $items_in_array[0];

									$items_in_array[0] = "";

									$items_with_commas = "";

									foreach ($items_in_array as $item) {
										$items_with_commas .= $item . ',';
									}

									$items_with_commas = substr($items_with_commas, 1); // remove first char

									$items_with_commas = substr($items_with_commas, 0, -1); // remove last char


									$output = '<strong id="typist-element" data-typist="' . $items_with_commas . '">' . $item_first . '</strong>';


									return $output;
								}

								add_shortcode('rotate_words', 'rotate_words');


								/* ============================================================================================================================================= */


								function mini_text($atts, $content = "")
								{
									$output = '<div class="mini-text">' . do_shortcode($content) . '</div>';


									return $output;
								}

								add_shortcode('mini_text', 'mini_text');


								/* ============================================================================================================================================= */


								// Actual processing of the shortcode happens here
								function pixelwars__run_shortcode($content)
								{
									global $shortcode_tags;

									// Backup current registered shortcodes and clear them all out
									$orig_shortcode_tags = $shortcode_tags;
									remove_all_shortcodes();

									add_shortcode('alert', 'alert');
									add_shortcode('social_icon', 'social_icon');
									add_shortcode('toggle', 'toggle');
									add_shortcode('accordion', 'accordion');
									add_shortcode('tabs_wrap', 'tabs_wrap');
									add_shortcode('tab_pane', 'tab_pane');
									add_shortcode('icon', 'icon');
									add_shortcode('button', 'button');
									add_shortcode('row', 'row');
									add_shortcode('column', 'column');
									add_shortcode('quote', 'quote');
									add_shortcode('progress_bar', 'progress_bar');
									add_shortcode('testimonial', 'testimonial');
									add_shortcode('event', 'event');
									add_shortcode('service', 'service');
									add_shortcode('process', 'process');
									add_shortcode('fun_fact', 'fun_fact');
									add_shortcode('client', 'client');
									add_shortcode('section_title', 'section_title');
									add_shortcode('map', 'map');
									add_shortcode('contact_form', 'contact_form');
									add_shortcode('rotate_words', 'rotate_words');
									add_shortcode('mini_text', 'mini_text');

									// Do the shortcode ( only the one above is registered )
									$content = do_shortcode($content);

									// Put the original shortcodes back
									$shortcode_tags = $orig_shortcode_tags;

									return $content;
								}

								add_filter('the_content', 'pixelwars__run_shortcode', 7);


								/* ============================================================================================================================================= */


								function pixelwars__page_portfolio_gallery($atts)
								{
									extract(shortcode_atts(array(
										'ids'  => "",
										'size' => 'thumbnail'
									), $atts));


									$output = "";
									$items_with_commas = $ids;


									if ($items_with_commas != "") {
										global $wpdb;
										$items_in_array = preg_split("/[\s]*[,][\s]*/", $items_with_commas);

										foreach ($items_in_array as $item) {
											$image = wp_get_attachment_image_src($item, $size);
											$image_caption = $wpdb->get_var($wpdb->prepare("SELECT post_excerpt FROM $wpdb->posts WHERE ID = %s", $item));

											$output .= '<a class="lightbox" title="' . $image_caption . '" href="' . $image[0] . '"></a>';
										}
									}


									return $output;
								}


								function pixelwars__post_gallery($output = "", $atts = null, $content = false, $tag = false)
								{
									$new_output = $output;


									$pf_type = get_option(get_the_ID() . 'pf_type', 'Standard');


									if ($pf_type == 'Lightbox Gallery') {
										if (is_page_template('template-homepage.php')) {
											$new_output = pixelwars__page_portfolio_gallery($atts);
										}
									}


									return $new_output;
								}

								add_filter('post_gallery', 'pixelwars__post_gallery', 10, 4);


								/* ============================================================================================================================================= */


								function pixelwars__tinyplugin_register($plugin_array)
								{
									$url = get_template_directory_uri() . '/admin/shortcode-generator.js';

									$plugin_array['tinyplugin'] = $url;

									return $plugin_array;
								}


								function pixelwars__tinyplugin_add_button($buttons)
								{
									array_push($buttons, 'separator', 'tinyplugin');

									return $buttons;
								}


								add_filter('mce_external_plugins', 'pixelwars__tinyplugin_register');

								add_filter('mce_buttons', 'pixelwars__tinyplugin_add_button', 0);


								/* ============================================================================================================================================= */


								function pixelwars__archive_title()
								{
									if (is_category()) {
										?>
										<header class="entry-header">
											<div class="section-title center">
												<h2><i><?php echo __('Category', 'empathy'); ?></i></h2>
											</div>

											<h1 class="entry-title"><?php single_cat_title(); ?></h1>
										</header>
									<?php
									} elseif (is_tag()) {
									?>
										<header class="entry-header">
											<div class="section-title center">
												<h2><i><?php echo __('Posts Tagged', 'empathy'); ?></i></h2>
											</div>

											<h1 class="entry-title"><?php single_tag_title(); ?></h1>
										</header>
									<?php
									} elseif (is_author()) {
									?>
										<header class="entry-header">
											<div class="section-title center">
												<h2><i><?php echo __('Posts By', 'empathy'); ?></i></h2>
											</div>

											<h1 class="entry-title"><?php the_author(); ?></h1>
										</header>
									<?php
									} elseif (is_search()) {
									?>
										<header class="entry-header">
											<div class="section-title center">
												<h2><i><?php echo __('Searched For', 'empathy'); ?></i></h2>
											</div>

											<h1 class="entry-title"><?php the_search_query(); ?></h1>
										</header>
									<?php
									} elseif (is_date()) {
									?>
										<header class="entry-header">
											<div class="section-title center">
												<h2><i><?php echo __('Date Archives', 'empathy'); ?></i></h2>
											</div>

											<h1 class="entry-title">
												<?php
												if (is_day()) {
													printf(get_the_date());
												} elseif (is_month()) {
													printf(get_the_date(_x('F Y', 'monthly archives date format', 'empathy')));
												} elseif (is_year()) {
													printf(get_the_date(_x('Y', 'yearly archives date format', 'empathy')));
												} else {
													_e('Archives', 'empathy');
												}
												?>
											</h1>
										</header>
									<?php
									} elseif (is_post_type_archive()) {
									?>
										<header class="entry-header">
											<div class="section-title center">
												<h2><i><?php echo __('Archives', 'empathy'); ?></i></h2>
											</div>

											<h1 class="entry-title"><?php post_type_archive_title(); ?></h1>
										</header>
									<?php
									} elseif (is_archive()) {
									?>
										<header class="entry-header">
											<div class="section-title center">
												<h2><i><?php echo __('Archives', 'empathy'); ?></i></h2>
											</div>

											<h1 class="entry-title"><?php single_term_title(); ?></h1>
										</header>
										<?php
									} else {
										if (!is_front_page()) {
										?>
											<header class="entry-header">
												<h1 class="entry-title"><?php single_post_title(); ?></h1>
											</header>
										<?php
										}
									}
								}


								/* ============================================================================================================================================= */


								function pixelwars__content()
								{
									if (is_home() || is_archive() || is_search()) {
										if (has_excerpt()) {
											the_excerpt();

											echo '<p class="more"><a class="more-link" href="' . get_permalink(get_the_ID()) . '">' . __('Read More', 'empathy') . '</a></p>';
										} else {
											$theme_excerpt = get_option('theme_excerpt', 'No');

											if ($theme_excerpt == 'Yes') {
												the_excerpt();
											} elseif ($theme_excerpt == 'standard') {
												$format = get_post_format();

												if ($format == false) {
													the_excerpt();
												} else {
													the_content(__('Read More', 'empathy'));
												}
											} else {
												the_content(__('Read More', 'empathy'));
											}
										}
									} else {
										the_content();
									}


									wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', 'empathy'), 'after' => '</div>'));
								}


								/* ============================================================================================================================================= */


								function pixelwars__related_posts()
								{
									$pixelwars__related_posts = get_option('pixelwars__related_posts', 'Yes');

									if (($pixelwars__related_posts != 'No') && (!is_attachment())) {
										$categories = get_the_category();

										$category_ids = "";

										if ($categories) {
											foreach ($categories as $category) {
												$category_ids .= $category->cat_ID . ',';
											}

											$category_ids = trim($category_ids, ',');
										}


										$exclude_ids = array(get_the_ID());

										$args = array(
											'post_type'      => 'post',
											'cat'            => $category_ids,
											'post__not_in'   => $exclude_ids,
											'posts_per_page' => 3
										);

										$query = new WP_Query($args);


										if ($query->have_posts()) {
										?>
											<div class="related-posts">
												<div class="section-title center">
													<h2>
														<i><?php echo __('You May Also Like', 'empathy'); ?></i>
													</h2>
												</div>


												<div class="latest-posts media-grid">
													<?php
													while ($query->have_posts()) {
														$query->the_post();

													?>
														<article class="media-cell">
															<?php
															if (has_post_thumbnail()) {
															?>
																<div class="media-box">
																	<?php
																	the_post_thumbnail('pixelwars__image_size_4');
																	?>

																	<div class="mask"></div>

																	<a href="<?php the_permalink(); ?>"></a>
																</div>
															<?php
															}
															?>

															<header class="media-cell-desc">
																<h3>
																	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
																</h3>
															</header>
														</article>
													<?php
													}
													?>
												</div>
											</div>
										<?php
										}

										wp_reset_postdata();
									}
								}


								/* ============================================================================================================================================= */


								function pixelwars__pagination()
								{
									$pagination = get_option('pagination', 'No');

									if ($pagination == 'Yes') {
										?>
										<nav class="post-pagination">
											<?php
											oxo_pagination(array());
											?>
										</nav>
									<?php
									} else {
									?>
										<nav class="navigation" role="navigation">
											<div class="nav-previous">
												<?php
												next_posts_link(__('<span class="meta-nav">&#8592;</span> Older Posts', 'empathy'));
												?>
											</div>

											<div class="nav-next">
												<?php
												previous_posts_link(__('Newer Posts <span class="meta-nav">&#8594;</span>', 'empathy'));
												?>
											</div>
										</nav>
									<?php
									}
								}


								/* ============================================================================================================================================= */


								function pixelwars__single_navigation($portfolio_nav = "")
								{
									if (wp_attachment_is_image()) {
									?>
										<nav class="row nav-single">
											<div class="col-sm-6 nav-previous">
												<h5>
													<?php
													previous_image_link(false, '<span class="meta-nav">&#8592;</span>' . __('PREVIOUS IMAGE', 'empathy'));
													?>
												</h5>
											</div>

											<div class="col-sm-6 nav-next">
												<h5>
													<?php
													next_image_link(false, __('NEXT IMAGE', 'empathy') . '<span class="meta-nav">&#8594;</span>');
													?>
												</h5>
											</div>
										</nav>
									<?php
									} elseif (is_singular('portfolio')) {
									?>
										<div class="portfolio-nav <?php echo esc_attr($portfolio_nav); ?>">
											<?php
											next_post_link('<span class="left-arrow">%link</span>', "");
											?>

											<?php
											$portfolio_page_slug = get_option('portfolio_page_slug', "");

											if ($portfolio_page_slug != "") {
												$portfolio_page_url = get_home_url() . '/#/' . $portfolio_page_slug;

											?>
												<a class="back" href="<?php echo esc_url($portfolio_page_url); ?>"></a>
											<?php
											}
											?>

											<?php
											previous_post_link('<span class="right-arrow">%link</span>', "");
											?>
										</div>
									<?php
									} else {
									?>
										<nav class="row nav-single">
											<div class="col-sm-6 nav-previous">
												<?php
												previous_post_link('<h6>' . __('PREVIOUS POST', 'empathy') . '</h6><h5>%link</h5>', '<span class="meta-nav">&#8592;</span> %title');
												?>
											</div>

											<div class="col-sm-6 nav-next">
												<?php
												next_post_link('<h6>' . __('NEXT POST', 'empathy') . '</h6><h5>%link</h5>', '%title <span class="meta-nav">&#8594;</span>');
												?>
											</div>
										</nav>
										<?php
									}
								}


								/* ============================================================================================================================================= */


								if (!function_exists('empathy_site_title')) {
									function empathy_site_title($mobile_title = "")
									{
										$site_title = get_bloginfo('name');

										if (!empty($site_title)) {
										?>
											<h1 class="site-title <?php echo esc_attr($mobile_title); ?>">
												<?php
												echo esc_html($site_title);
												?>
											</h1>
										<?php
										}
									}
								}


								/* ============================================================================================================================================= */


								function pixelwars__wp_head__customize_css()
								{
									global $pixelwars_subset;


									$extra_font_styles = get_option('extra_font_styles', 'No');

									if ($extra_font_styles == 'Yes') {
										$font_styles = ':300,400,600,700,800,900,300italic,400italic,600italic,700italic,800italic,900italic';
									} else {
										$font_styles = ':400,700,400italic,700italic';
									}


									/* ==================================================================================================== */


									$pixelwars__setting_font_1 = get_theme_mod('pixelwars__setting_font_1', "");

									if ($pixelwars__setting_font_1 != "") {
										?>

										<!-- Text Logo Font -->
										<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=<?php echo str_replace(' ', '+', $pixelwars__setting_font_1) . $font_styles . $pixelwars_subset; ?>">

										<style type="text/css">
											.site-title {
												font-family: "<?php echo $pixelwars__setting_font_1; ?>";
											}
										</style>
									<?php
									}


									$pixelwars__setting_font_2 = get_theme_mod('pixelwars__setting_font_2', "");

									if ($pixelwars__setting_font_2 != "") {
									?>

										<!-- Menu Font -->
										<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=<?php echo str_replace(' ', '+', $pixelwars__setting_font_2) . $font_styles . $pixelwars_subset; ?>">

										<style type="text/css">
											.nav-menu {
												font-family: "<?php echo $pixelwars__setting_font_2; ?>";
											}
										</style>
									<?php
									}


									$pixelwars__setting_font_3 = get_theme_mod('pixelwars__setting_font_3', "");

									if ($pixelwars__setting_font_3 != "") {
									?>

										<!-- Heading Font -->
										<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=<?php echo str_replace(' ', '+', $pixelwars__setting_font_3) . $font_styles . $pixelwars_subset; ?>">

										<style type="text/css">
											h1,
											h2,
											h3,
											h4,
											h5,
											h6,
											.filters,
											th,
											dt,
											.button,
											input[type=submit],
											button,
											label,
											.tab-titles {
												font-family: "<?php echo $pixelwars__setting_font_3; ?>";
											}
										</style>
									<?php
									}


									$pixelwars__setting_font_4 = get_theme_mod('pixelwars__setting_font_4', "");

									if ($pixelwars__setting_font_4 != "") {
									?>

										<!-- Body Font -->
										<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=<?php echo str_replace(' ', '+', $pixelwars__setting_font_4) . $font_styles . $pixelwars_subset; ?>">

										<style type="text/css">
											body,
											input,
											textarea,
											select {
												font-family: "<?php echo $pixelwars__setting_font_4; ?>";
											}
										</style>
									<?php
									}


									/* ==================================================================================================== */


									$pixelwars__setting_color_1 = get_theme_mod('pixelwars__setting_color_1', "");

									if ($pixelwars__setting_color_1 != "") {
									?>

										<!-- Text Logo Color -->
										<style type="text/css">
											.site-title {
												color: <?php echo $pixelwars__setting_color_1; ?>;
											}
										</style>
									<?php
									}


									$pixelwars__setting_color_2 = get_theme_mod('pixelwars__setting_color_2', "");

									if ($pixelwars__setting_color_2 != "") {
									?>

										<!-- Text Logo Background Color -->
										<style type="text/css">
											@media screen and (min-width: 768px) {
												.site-title {
													background: <?php echo $pixelwars__setting_color_2; ?>;
												}
											}
										</style>
									<?php
									}


									$pixelwars__setting_color_3 = get_theme_mod('pixelwars__setting_color_3', "");

									if ($pixelwars__setting_color_3 != "") {
									?>

										<!-- Menu Background Color -->
										<style type="text/css">
											.header,
											.header-wrap {
												background: <?php echo $pixelwars__setting_color_3; ?>;
											}
										</style>
									<?php
									}


									$pixelwars__setting_color_4 = get_theme_mod('pixelwars__setting_color_4', "");

									if ($pixelwars__setting_color_4 != "") {
									?>

										<!-- Link Color -->
										<style type="text/css">
											a {
												color: <?php echo $pixelwars__setting_color_4; ?>;
											}
										</style>
									<?php
									}


									$pixelwars__setting_color_5 = get_theme_mod('pixelwars__setting_color_5', "");

									if ($pixelwars__setting_color_5 != "") {
									?>

										<!-- Link Hover Color -->
										<style type="text/css">
											a:hover {
												color: <?php echo $pixelwars__setting_color_5; ?>;
											}
										</style>
									<?php
									}


									$pixelwars__setting_color_6 = get_theme_mod('pixelwars__setting_color_6', "");

									if ($pixelwars__setting_color_6 != "") {
									?>

										<!-- Primary Color -->
										<style type="text/css">
											input[type=submit]:hover,
											input[type=button]:hover,
											button:hover,
											a.button:hover,
											.event h3,
											.event h2+p i,
											.event h2+p img,
											#search-submit,
											.entry-meta .cat-links a,
											.pagination a:hover,
											.navigation a:hover,
											a.more-link:hover,
											.section-title h2 i,
											.event:nth-of-type(2):after {
												background-color: <?php echo $pixelwars__setting_color_6; ?>;
											}

											.bypostauthor>article {
												border-color: <?php echo $pixelwars__setting_color_6; ?>;
											}

											.event h3:before {
												border-color: <?php echo $pixelwars__setting_color_6; ?>;
											}
										</style>

										<!-- Ribbon Shadow Color -->
										<script>
											function ColorLuminance(hex, lum) {
												// validate hex string
												hex = String(hex).replace(/[^0-9a-f]/gi, '');

												if (hex.length < 6) {
													hex = hex[0] + hex[0] + hex[1] + hex[1] + hex[2] + hex[2];
												}

												lum = lum || 0;

												// convert to decimal and change luminosity
												var rgb = "#",
													c, i;

												for (i = 0; i < 3; i++) {
													c = parseInt(hex.substr(i * 2, 2), 16);
													c = Math.round(Math.min(Math.max(0, c + (c * lum)), 255)).toString(16);
													rgb += ("00" + c).substr(c.length);
												}

												return rgb;
											}

											jQuery(document).ready(function($) {
												color = ColorLuminance('<?php echo $pixelwars__setting_color_6; ?>', -0.15);

												var styleCss = '<style type="text/css">' +

													'.section-title h2:after, .section-title h2:before { background-color: ' + color + '; }' +

													'</style>';

												$('body').append(styleCss);
											});
										</script>
									<?php
									}


									$pixelwars__setting_color_progress_bar = get_theme_mod('pixelwars__setting_color_progress_bar', "");

									if ($pixelwars__setting_color_progress_bar != "") {
									?>

										<!-- Link Hover Color -->
										<style type="text/css">
											#nprogress .bar {
												background-color: <?php echo $pixelwars__setting_color_progress_bar; ?>;
											}

											#nprogress .spinner-icon {
												border-top-color: <?php echo $pixelwars__setting_color_progress_bar; ?>;
												border-left-color: <?php echo $pixelwars__setting_color_progress_bar; ?>;
											}
										</style>
									<?php
									}


									/* ==================================================================================================== */


									$pixelwars__setting_color_7 = get_theme_mod('pixelwars__setting_color_7', "");

									if ($pixelwars__setting_color_7 != "") {
									?>

										<!-- 1. Page Background Color -->
										<style type="text/css">
											.one-page-layout .site-main>section:nth-of-type(1) {
												background-color: <?php echo $pixelwars__setting_color_7; ?>;
											}
										</style>
									<?php
									}


									$pixelwars__setting_color_7b = get_theme_mod('pixelwars__setting_color_7b', true);

									if ($pixelwars__setting_color_7b) {
									?>

										<!-- 1. Page Light Text -->
										<script>
											jQuery(document).ready(function($) {
												$('.one-page-layout .site-main > section:nth-of-type(1)').toggleClass('light-text');
											});
										</script>
									<?php
									}


									$pixelwars__setting_color_8 = get_theme_mod('pixelwars__setting_color_8', "");

									if ($pixelwars__setting_color_8 != "") {
									?>

										<!-- 2. Page Background Color -->
										<style type="text/css">
											.one-page-layout .site-main>section:nth-of-type(2) {
												background-color: <?php echo $pixelwars__setting_color_8; ?>;
											}
										</style>
									<?php
									}


									$pixelwars__setting_color_8b = get_theme_mod('pixelwars__setting_color_8b', false);

									if ($pixelwars__setting_color_8b) {
									?>

										<!-- 2. Page Light Text -->
										<script>
											jQuery(document).ready(function($) {
												$('.one-page-layout .site-main > section:nth-of-type(2)').toggleClass('light-text');
											});
										</script>
									<?php
									}


									$pixelwars__setting_color_9 = get_theme_mod('pixelwars__setting_color_9', "");

									if ($pixelwars__setting_color_9 != "") {
									?>

										<!-- 3. Page Background Color -->
										<style type="text/css">
											.one-page-layout .site-main>section:nth-of-type(3) {
												background-color: <?php echo $pixelwars__setting_color_9; ?>;
											}
										</style>
									<?php
									}


									$pixelwars__setting_color_9b = get_theme_mod('pixelwars__setting_color_9b', false);

									if ($pixelwars__setting_color_9b) {
									?>

										<!-- 3. Page Light Text -->
										<script>
											jQuery(document).ready(function($) {
												$('.one-page-layout .site-main > section:nth-of-type(3)').toggleClass('light-text');
											});
										</script>
									<?php
									}


									$pixelwars__setting_color_10 = get_theme_mod('pixelwars__setting_color_10', "");

									if ($pixelwars__setting_color_10 != "") {
									?>

										<!-- 4. Page Background Color -->
										<style type="text/css">
											.one-page-layout .site-main>section:nth-of-type(4) {
												background-color: <?php echo $pixelwars__setting_color_10; ?>;
											}
										</style>
									<?php
									}


									$pixelwars__setting_color_10b = get_theme_mod('pixelwars__setting_color_10b', false);

									if ($pixelwars__setting_color_10b) {
									?>

										<!-- 4. Page Light Text -->
										<script>
											jQuery(document).ready(function($) {
												$('.one-page-layout .site-main > section:nth-of-type(4)').toggleClass('light-text');
											});
										</script>
									<?php
									}


									$pixelwars__setting_color_11 = get_theme_mod('pixelwars__setting_color_11', "");

									if ($pixelwars__setting_color_11 != "") {
									?>

										<!-- 5. Page Background Color -->
										<style type="text/css">
											.one-page-layout .site-main>section:nth-of-type(5) {
												background-color: <?php echo $pixelwars__setting_color_11; ?>;
											}
										</style>
									<?php
									}


									$pixelwars__setting_color_11b = get_theme_mod('pixelwars__setting_color_11b', false);

									if ($pixelwars__setting_color_11b) {
									?>

										<!-- 5. Page Light Text -->
										<script>
											jQuery(document).ready(function($) {
												$('.one-page-layout .site-main > section:nth-of-type(5)').toggleClass('light-text');
											});
										</script>
									<?php
									}


									$pixelwars__setting_color_12 = get_theme_mod('pixelwars__setting_color_12', "");

									if ($pixelwars__setting_color_12 != "") {
									?>

										<!-- 6. Page Background Color -->
										<style type="text/css">
											.one-page-layout .site-main>section:nth-of-type(6) {
												background-color: <?php echo $pixelwars__setting_color_12; ?>;
											}
										</style>
									<?php
									}


									$pixelwars__setting_color_12b = get_theme_mod('pixelwars__setting_color_12b', true);

									if ($pixelwars__setting_color_12b) {
									?>

										<!-- 6. Page Light Text -->
										<script>
											jQuery(document).ready(function($) {
												$('.one-page-layout .site-main > section:nth-of-type(6)').toggleClass('light-text');
											});
										</script>
									<?php
									}


									/* ==================================================================================================== */


									$pixelwars__setting_custom_css = get_theme_mod('pixelwars__setting_custom_css', "");

									if ($pixelwars__setting_custom_css != "") {
									?>

										<!-- Custom CSS -->
										<style type="text/css">
											<?php echo $pixelwars__setting_custom_css; ?>
										</style>
									<?php
									}
								}

								add_action('wp_head', 'pixelwars__wp_head__customize_css');


								function pixelwars__customize_preview_js()
								{
									wp_enqueue_script('pixelwars__theme_customizer', get_template_directory_uri() . '/js/wp-theme-customizer.js', null, null, true);
								}

								add_action('customize_preview_init', 'pixelwars__customize_preview_js');


								/* ============================================================================================================================================= */


								require_once get_template_directory() . '/class-tgm-plugin-activation.php';

								function empathy_plugins()
								{
									$config = array(
										'id'           => 'empathy_tgmpa',
										'default_path' => "",
										'menu'         => 'empathy-install-plugins',
										'parent_slug'  => 'themes.php',
										'capability'   => 'edit_theme_options',
										'has_notices'  => true,
										'dismissable'  => true,
										'dismiss_msg'  => esc_html__('Install Plugins', 'empathy'),
										'is_automatic' => true,
										'message'      => "",
										'strings'      => array('nag_type' => 'updated')
									);

									$plugins = array(
										array(
											'name'               => esc_html__('Pixelwars Portfolio', 'empathy'),
											'slug'               => 'pixelwars-portfolio',
											'source'             => get_template_directory() . '/plugins/pixelwars-portfolio.zip',
											'version'            => '1.0',
											'required'           => false,
											'force_activation'   => false,
											'force_deactivation' => true,
											'external_url'       => "",
											'is_callable'        => ""
										),
										array(
											'name'     => esc_html__('One Click Demo Import', 'empathy'),
											'slug'     => 'one-click-demo-import',
											'required' => false
										),
										array(
											'name'     => esc_html__('Regenerate Thumbnails', 'empathy'),
											'slug'     => 'regenerate-thumbnails',
											'required' => false
										),
										array(
											'name'     => esc_html__('Loco Translate', 'empathy'),
											'slug'     => 'loco-translate',
											'required' => false
										),
										array(
											'name'     => esc_html__('Instagram Feed Gallery', 'empathy'),
											'slug'     => 'insta-gallery',
											'required' => false
										)
									);

									tgmpa($plugins, $config);
								}

								add_action('tgmpa_register', 'empathy_plugins');


								/* ============================================================================================================================================= */


								function pixelwars__wp_head()
								{
									?>

									<!--[if lt IE 9]>
				<script src="<?php echo get_template_directory_uri(); ?>/js/ie.js"></script>
			<![endif]-->

								<?php
								}

								add_action('wp_head', 'pixelwars__wp_head');


								/* ============================================================================================================================================= */


								if (is_admin()) {
									include_once(get_template_directory() . '/admin/theme-options.php');
								}

								include_once(get_template_directory() . '/admin/blog-page-link.php');
								include_once(get_template_directory() . '/admin/customizer.php');
								include_once(get_template_directory() . '/admin/demo-import.php');

								?>