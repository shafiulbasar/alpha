<?php
	if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
	{
		header('X-UA-Compatible: IE=edge,chrome=1');
	}
	
	if (is_page_template('template-homepage.php'))
	{
		$pixelwars__page_layout = 'one-page-layout';
	}
	else
	{
		$pixelwars__page_layout = 'single-page-layout';
	}
	
	$pixelwars__classic_layout             = get_option('classic_layout', 'false');
	$pixelwars__mobile_only_classic_layout = get_option('mobile_only_classic_layout', 'false');
	$pixelwars__setting_animation_1        = get_theme_mod('pixelwars__setting_animation_1', false);
	$pixelwars__setting_animation_2        = get_theme_mod('pixelwars__setting_animation_2', '16');
	$pixelwars__setting_animation_3        = get_theme_mod('pixelwars__setting_animation_3', '15');
?>
<!doctype html>

<html <?php language_attributes(); ?> class="no-js <?php echo esc_attr( $pixelwars__page_layout ); ?>" data-classic-layout="<?php echo esc_attr( $pixelwars__classic_layout ); ?>" data-mobile-classic-layout="<?php echo esc_attr( $pixelwars__mobile_only_classic_layout ); ?>" data-prev-animation="<?php echo esc_attr( $pixelwars__setting_animation_2 ); ?>" data-next-animation="<?php echo esc_attr( $pixelwars__setting_animation_3 ); ?>" data-random-animation="<?php echo ( $pixelwars__setting_animation_1 ) ? 'true' : 'false'; ?>">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	
	<?php
		$pixelwars__mobile_zoom = get_option('mobile_zoom', 'No');
		
		if ($pixelwars__mobile_zoom == 'Yes')
		{
			?>

<meta name="viewport" content="width=device-width, initial-scale=1">

			<?php
		}
		else
		{
			?>

<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">

			<?php
		}
	?>
	
	<?php
		wp_head();
	?>
</head>

<body <?php body_class(); ?>>

	<div id="page" class="hfeed site">
		<header id="masthead" class="header" role="banner">
		
			<a class="menu-toggle toggle-link"></a>
			
			<?php
				empathy_site_title('mobile-title');
			?>
			
			<div class="header-wrap">
				<?php
					$pixelwars__logo_image = get_option('logo_image', "");
					
					if ($pixelwars__logo_image != "")
					{
						?>
							<img alt="<?php bloginfo('name'); ?>" src="<?php echo esc_url($pixelwars__logo_image); ?>">
						<?php
					}
				?>
				
				<?php
					empathy_site_title();
				?>
				
				<?php
					$pixelwars__classic_navigation_menu = get_option('classic_navigation_menu', 'No');
					
					if (is_page_template('template-homepage.php'))
					{
						?>
							<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
								<div class="nav-menu">
									<ul class="menu-auto">
										
									</ul>
									
									<script>
										jQuery(document).ready(function($)
										{
											var menu_html = "";
											
											$('#main').find('section').each(function()
											{
												var id        = $(this).attr('id');
												var icon      = $(this).find('.page-title  i').attr('class');
												var title     = $(this).find('.page-title input').val();
												var menu_item = '<li><a href="#/' + id + '"><i class="' + icon + '"></i>' + title + '</a></li>';
												
												menu_html += menu_item;
												$('.menu-auto').html(menu_html);
											});
										});
									</script>
								</div>
							</nav>
						<?php
					}
					elseif ($pixelwars__classic_navigation_menu == 'Yes')
					{
						?>
							<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
								<div class="nav-menu">
									<?php
										wp_nav_menu(array('theme_location' => 'pixelwars__theme_menu_location_1',
														  'menu'           => 'pixelwars__theme_menu_location_1',
														  'menu_id'        => "",
														  'menu_class'     => 'menu-custom',
														  'container'      => false,
														  'depth'          => 0,
														  'fallback_cb'    => 'pixelwars__wp_page_menu2'));
									?>
								</div>
							</nav>
						<?php
					}
					elseif (is_home())
					{
						if (get_option('show_on_front') == 'posts')
						{
							?>
								<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
									<div class="nav-menu">
										<ul>
											<li>
												<a class="search-toggle"><i class="pe-7s-search"></i><?php esc_html_e('Search', 'empathy'); ?></a>
											</li>
										</ul>
									</div>
								</nav>
							<?php
						}
						else
						{
							?>
								<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
									<div class="nav-menu">
										<ul>
											<li>
												<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="pe-7s-home"></i><?php esc_html_e('Home', 'empathy'); ?></a>
											</li>
											<li>
												<a class="search-toggle"><i class="pe-7s-search"></i><?php esc_html_e('Search', 'empathy'); ?></a>
											</li>
										</ul>
									</div>
								</nav>
							<?php
						}
					}
					elseif (is_front_page())
					{
						?>
							<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
								<div class="nav-menu">
									<ul>
										<li>
											<a class="search-toggle"><i class="pe-7s-search"></i><?php esc_html_e('Search', 'empathy'); ?></a>
										</li>
									</ul>
								</div>
							</nav>
						<?php
					}
					elseif (is_singular('portfolio'))
					{
						$pixelwars__portfolio_page_slug = get_option('portfolio_page_slug', 'portfolio');
						
						?>
							<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
								<div class="nav-menu">
									<ul>
										<li>
											<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="pe-7s-home"></i><?php esc_html_e('Home', 'empathy'); ?></a>
										</li>
										<li>
											<a href="<?php echo esc_url( get_home_url() . '/#/' . $pixelwars__portfolio_page_slug ); ?>"><i class="pe-7s-back"></i><?php esc_html_e('Back To Portfolio', 'empathy'); ?></a>
										</li>
										<li>
											<a class="search-toggle"><i class="pe-7s-search"></i><?php esc_html_e('Search', 'empathy'); ?></a>
										</li>
									</ul>
								</div>
							</nav>
						<?php
					}
					elseif (is_singular('post') || is_archive() || is_search())
					{
						if (get_option('show_on_front') == 'posts')
						{
							?>
								<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
									<div class="nav-menu">
										<ul>
											<li>
												<a href="<?php echo esc_url(home_url('/')); ?>"><i class="pe-7s-home"></i><?php esc_html_e('Home', 'empathy'); ?></a>
											</li>
											<li>
												<a class="search-toggle"><i class="pe-7s-search"></i><?php esc_html_e('Search', 'empathy'); ?></a>
											</li>
										</ul>
									</div>
								</nav>
							<?php
						}
						else
						{
							?>
								<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
									<div class="nav-menu">
										<ul>
											<li>
												<a href="<?php echo esc_url(home_url('/')); ?>"><i class="pe-7s-home"></i><?php esc_html_e('Home', 'empathy'); ?></a>
											</li>
											<?php
												$back_to_blog_link_behaviour = get_option('pixelwars__back_to_blog_link_behaviour', 'to_regular_blog');
												
												if ($back_to_blog_link_behaviour == 'to_grid_blog')
												{
													$blog_page_slug = get_option('blog_page_slug', "");
													
													if ($blog_page_slug != "")
													{
														$blog_page_url = get_home_url() . '/#/' . $blog_page_slug;
														
														?>
															<li>
																<a href="<?php echo esc_url($blog_page_url); ?>"><i class="pe-7s-back"></i><?php esc_html_e('Back To Blog', 'empathy'); ?></a>
															</li>
														<?php
													}
												}
												else
												{
													$blog_page_id = get_option('page_for_posts');
													
													if ($blog_page_id)
													{
														$blog_page_url = get_page_link($blog_page_id);
														
														?>
															<li>
																<a href="<?php echo esc_url($blog_page_url); ?>"><i class="pe-7s-back"></i><?php esc_html_e('Back To Blog', 'empathy'); ?></a>
															</li>
														<?php
													}
												}
											?>
											<li>
												<a class="search-toggle"><i class="pe-7s-search"></i><?php esc_html_e('Search', 'empathy'); ?></a>
											</li>
										</ul>
									</div>
								</nav>
							<?php
						}
					}
					else
					{
						?>
							<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
								<div class="nav-menu">
									<ul>
										<li>
											<a href="<?php echo esc_url(home_url('/')); ?>"><i class="pe-7s-home"></i><?php esc_html_e('Home', 'empathy'); ?></a>
										</li>
										<li>
											<a class="search-toggle"><i class="pe-7s-search"></i><?php esc_html_e('Search', 'empathy'); ?></a>
										</li>
									</ul>
								</div>
							</nav>
						<?php
					}
				?>
				
				<div class="header-search">
					<form role="search" id="search-form" method="get" action="<?php echo esc_url(home_url('/')); ?>">
						<input type="text" id="search" name="s" required="required" placeholder="<?php esc_attr_e('enter word', 'empathy'); ?>">
						<input type="submit" id="search-submit" title="<?php esc_attr_e('Search', 'empathy'); ?>" value="&#8594;">
					</form>
				</div>
				
				<?php
					if (is_active_sidebar('pixelwars__sidebar_2') || is_active_sidebar('pixelwars__sidebar_3'))
					{
						?>
							<div class="header-bottom">
								<?php
									dynamic_sidebar('pixelwars__sidebar_2');
								?>
								
								<?php
									if (is_active_sidebar('pixelwars__sidebar_3'))
									{
										?>
											<div class="copy-text">
												<?php
													dynamic_sidebar('pixelwars__sidebar_3');
												?>
											</div>
										<?php
									}
								?>
							</div>
						<?php
					}
				?>
			</div>
		</header>