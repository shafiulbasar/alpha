<?php
/*
Template Name: Empathy Homepage
*/

$portfolio_page_slug = get_option( 'portfolio_page_slug', "" );

$page_all_info = get_post( get_the_ID() );
$slug = $page_all_info->post_name;

if ( $slug == $portfolio_page_slug )
{
	wp_redirect( home_url() . '/#/' . $slug );
}

get_header();
?>

	<div id="main" class="site-main">
		<?php
			dynamic_sidebar( 'pixelwars__sidebar_1' );
		?>
	</div>
</div>

<!-- PORTFOLIO SINGLE AJAX CONTENT CONTAINER -->
<div class="p-overlay"></div>
<div class="p-overlay"></div>

<!-- ALERT: used for contact form mail delivery alert -->
<div class="site-alert animated"></div>

	<?php
		wp_footer();
	?>
	
	<?php
		if (isset($_GET['bg_video']))
		{
			?>
				<script>
					jQuery(document).ready(function($)
					{
						if (window.location.href.indexOf('?') > -1)
						{
							history.pushState('', document.title, window.location.pathname);
						}
					});
				</script>
			<?php
		}
	?>
</body>
</html>