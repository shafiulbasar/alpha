<?php
	get_header();
?>


<div id="main" class="site-main">
	<div class="blog-single page-layout">
		<div class="layout-fixed">
			<?php
				if ( have_posts() ) :
					while ( have_posts() ) : the_post();
					
						?>
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<header class="entry-header">
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
									
									<h1 class="entry-title" <?php echo $pixelwars__hide_post_title_out; ?>><?php the_title(); ?></h1>
									
									
									<div class="entry-meta">
										<span class="entry-date">
											<time class="entry-date" datetime="<?php echo get_the_date(); ?>"><?php echo get_the_date(); ?></time>
										</span>
										
										<span class="comment-link">
											<?php
												comments_popup_link( __( '0 Comment', 'empathy' ), __( '1 Comment', 'empathy' ), __( '% Comments', 'empathy' ), "", __( 'Comments Off', 'empathy' ) );
											?>
										</span>
										
										<span class="cat-links">
											<?php
												the_category( ' ' );
											?>
										</span>
										
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
												<?php
													the_post_thumbnail( 'pixelwars__image_size_1' );
												?>
											</div>
										<?php
									}
								?>
								
								
								<div class="entry-content">
									<?php
										pixelwars__content();
									?>
									
									
									<?php
										if ( get_the_tags() != "" )
										{
											?>
												<footer class="entry-meta tags">
													<?php
														the_tags( "", ' ', "" );
													?>
												</footer>
											<?php
										}
									?>
								</div>
								
								
								<?php
									pixelwars__related_posts();
								?>
							</article>
							
							
							<?php
								pixelwars__single_navigation();
							?>
							
							
							<?php
								comments_template( "", true );
							?>
						<?php
					
					endwhile;
				endif;
			?>
		</div>


<?php
	get_footer();
?>