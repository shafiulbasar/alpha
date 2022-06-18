<?php
	get_header();
?>


	<div id="main" class="site-main">
		<div class="blog-regular page-layout">
			<div class="layout-fixed">
				<?php
					pixelwars__archive_title();
				?>
				
				
				<?php
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();
						
							?>
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<header class="entry-header">
										<h2 class="entry-title">
											<?php
												$pixelwars__hide_post_title = get_option( $post->ID . 'hide_post_title', false );
												
												if ( $pixelwars__hide_post_title )
												{
													$pixelwars__hide_post_title_out = 'style="display: none;"';
												}
												else
												{
													$pixelwars__hide_post_title_out = "";
												}
											?>
											
											<a <?php echo $pixelwars__hide_post_title_out; ?> href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h2>
										
										
										<div class="entry-meta">
											<span class="entry-date">
												<time class="entry-date" datetime="<?php echo get_the_date(); ?>"><?php echo get_the_date(); ?></time>
											</span>
											
											<span class="comment-link">
												<?php
													comments_popup_link( __( '0 Comment', 'empathy' ), __( '1 Comment', 'empathy' ), __( '% Comments', 'empathy' ), "", 'Comments Off' );
												?>
											</span>
											
											<?php
												if ( get_the_category() )
												{
													?>
														<span class="cat-links">
															<?php
																the_category( ' ' );
															?>
														</span>
													<?php
												}
											?>
											
											<?php
												edit_post_link( __( 'Edit', 'empathy' ), '<span class="edit-link">', '</span>' );
											?>
										</div> 
									</header>
									
									
									<?php
										if ( has_post_thumbnail() )
										{
											?>
												<div class="featured-image">
													<a href="<?php the_permalink(); ?>">
														<?php
															the_post_thumbnail( 'pixelwars__image_size_1' );
														?>
													</a>
												</div>
											<?php
										}
									?>
									
									
									<div class="entry-content">
										<?php
											pixelwars__content();
										?>
									</div>
								</article>
							<?php
						endwhile;
					
					elseif ( is_search() ) :
					
						?>
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<header class="entry-header">
									<h2 class="entry-title"><?php _e( 'Nothing Found', 'empathy' ); ?></h2>
								</header>
								
								<div class="entry-content">
									<p>
										<?php
											_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'empathy' );
										?>
									</p>
									
									<?php
										get_search_form();
									?>
								</div>
							</article>
						<?php
					
					else :
					
						?>
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-no-posts' ); ?>>
								<header class="entry-header">
									<h2 class="entry-title"><?php _e( 'Nothing Found', 'empathy' ); ?></h2>
								</header>
								
								<div class="entry-content">
									<p>
										<?php
											_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'empathy' );
										?>
									</p>
									
									<?php
										get_search_form();
									?>
								</div>
							</article>
						<?php
					
					endif;
				?>
				
				
				<?php
					pixelwars__pagination();
				?>
			</div>


<?php
	get_footer();
?>