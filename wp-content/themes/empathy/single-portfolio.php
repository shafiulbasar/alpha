<?php
	get_header();
?>

		<div id="main" class="site-main">
			<div class="portfolio-single page-layout">
				<div class="layout-medium">
					<?php
						while (have_posts()) : the_post();
							?>
								<article id="post-<?php the_ID(); ?>" <?php post_class('hentry'); ?>>
									<header class="entry-header">
										<?php
											pixelwars__single_navigation();
										?>
										<h1 class="entry-title"><?php the_title(); ?></h1>
									</header>
									
									<div class="entry-content">
										<?php
											$pf_type = get_option(get_the_ID() . 'pf_type', 'Standard');
											
											if ($pf_type == 'Lightbox Audio')
											{
												$pf_direct_url = stripcslashes(get_option(get_the_ID() . 'pf_direct_url'));
												?>
													<iframe src="<?php echo esc_url($pf_direct_url); ?>" width="100%" height="450" frameborder="no" scrolling="no"></iframe>
												<?php
												
												if (has_excerpt())
												{
													the_excerpt();
												}
											}
											elseif ($pf_type == 'Lightbox Video')
											{
												$pf_direct_url = stripcslashes(get_option(get_the_ID() . 'pf_direct_url'));
												?>
													<iframe src="<?php echo esc_url($pf_direct_url); ?>" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
												<?php
												
												if (has_excerpt())
												{
													the_excerpt();
												}
											}
											elseif ($pf_type == 'Direct URL')
											{
												$pf_direct_url = stripcslashes(get_option(get_the_ID() . 'pf_direct_url'));
												
												if ($pf_direct_url != "")
												{
													$new_tab = get_option(get_the_ID() . 'pf_link_new_tab', true);
													?>
														<p>
															<a class="button primary" <?php if ($new_tab != false) { echo 'target="_blank"'; } ?> href="<?php echo esc_url($pf_direct_url); ?>"><?php echo __('Launch Project', 'empathy'); ?></a>
														</p>
													<?php
												}
												
												if (has_excerpt())
												{
													the_excerpt();
												}
												
												if (has_post_thumbnail())
												{
													?>
														<p>
															<?php
																the_post_thumbnail('full');
															?>
														</p>
													<?php
												}
											}
										?>
										
										<?php
											pixelwars__content();
										?>
										
										<?php
											pixelwars__single_navigation( $portfolio_nav = 'bottom' );
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
			</div>
		</div>
	</div>
	
	<?php
		wp_footer();
	?>
</body>
</html>