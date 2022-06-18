<?php

/*
	If the current post is protected by a password and
	the visitor has not yet entered the password we will
	return early without loading the comments.
*/

	if ( post_password_required() )
	{
		return;
	}
?>


<?php
	if ( comments_open() || get_comments_number() )
	{
		?>
			<div id="comments" class="comments-area">
				<?php
					if ( have_comments() ) :
					
						?>
							<h3 class="comments-title">
								<?php
									printf( _n( '1 Comment %2$s', '%1$s Comments %2$s', get_comments_number(), 'empathy' ),
											number_format_i18n( get_comments_number() ), "" );
								?>
							</h3>
							
							
							<ol class="commentlist">
								<?php
									wp_list_comments( array(	'callback' => 'pixelwars__comments',
																'style'    => 'ol' ) );
								?>
							</ol>
							
							
							<?php
								// comment navigation
								if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
								
									?>
										<nav id="comment-nav-below" class="navigation" role="navigation">
											<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'empathy' ); ?></h1>
											
											<div class="nav-previous">
												<?php
													previous_comments_link( __( '&larr; Older Comments', 'empathy' ) );
												?>
											</div>
											
											<div class="nav-next">
												<?php
													next_comments_link( __( 'Newer Comments &rarr;', 'empathy' ) );
												?>
											</div>
										</nav>
									<?php
								
								endif;
							?>
							
							
							<?php
								if ( ! comments_open() && get_comments_number() ) :
									?>
										<p class="nocomments"><?php _e( 'Comments are closed.' , 'empathy' ); ?></p>
									<?php
								endif;
							?>
						<?php
					
					endif;
				?>
				
				
				<?php
					$comments_args = array( 'title_reply' => __( 'Leave a comment', 'empathy' ) );
					
					comment_form( $comments_args );
				?>
			</div>
		<?php
	}
?>