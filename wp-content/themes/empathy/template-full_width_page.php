<?php
/*
Template Name: Full width
*/

	$portfolio_page_slug = get_option('portfolio_page_slug', "");

	$page_all_info = get_post(get_the_ID());
	$slug = $page_all_info->post_name;
	
	if ($slug == $portfolio_page_slug)
	{
		wp_redirect(home_url() . '/#/' . $slug);
	}
	
	get_header();
?>

<div id="main" class="site-main">
	<div class="page-single page-layout">
		<div class="layout-full">
			<?php
				while (have_posts()) : the_post();
					?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<header class="entry-header">
								<h1 class="entry-title"><?php the_title(); ?></h1>
							</header>
							<div class="entry-content">
								<?php
									pixelwars__content();
								?>
							</div>
						</article>
					<?php
				endwhile;
			?>
		</div>
		<div class="layout-fixed">
			<?php
				comments_template("", true);
			?>
		</div>

<?php
	get_footer();
?>