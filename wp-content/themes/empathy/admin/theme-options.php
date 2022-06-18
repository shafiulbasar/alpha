<?php

	function pixelwars__create_tabs( $current = 'general' )
	{
		$tabs = array(  'general'   => 'General',
						'style'     => 'Style',
						'layout'    => 'Layout',
						'blog'      => 'Blog' );
		?>
			<h1>Theme Options</h1>
			
			<h2 class="nav-tab-wrapper">
				<?php
					foreach ( $tabs as $tab => $name )
					{
						$class = ( $tab == $current ) ? ' nav-tab-active' : "";
						
						echo "<a class='nav-tab$class' href='?page=theme-options&tab=$tab'>$name</a>";
					}
				?>
			</h2>
		<?php
	}


/* ============================================================================================================================================ */


	function pixelwars__theme_options_page()
	{
		global $pagenow;
		
		
		?>
			<div class="wrap wrap2">
				<div class="status">
					<img alt="..." src="<?php echo get_template_directory_uri(); ?>/admin/ajax-loader.gif">
					
					<strong></strong>
				</div>
				
				
				<script>
					jQuery(document).ready(function($)
					{
					
					// -------------------------------------------------------------------------
					
						var uploadID = '',
							uploadImg = '';
						
						
						jQuery( '.upload-button' ).click(function()
						{
							uploadID = jQuery(this).prev( 'input' );
							uploadImg = jQuery(this).next( 'img' );
							formfield = jQuery( '.upload' ).attr( 'name' );
							tb_show( "", 'media-upload.php?post_id=0&amp;type=image&amp;TB_iframe=true' );
							return false;
						});
						
						
						window.send_to_editor = function( html )
						{
							imgurl = jQuery( 'img', html ).attr( 'src' );
							uploadID.val( imgurl );
							uploadImg.attr('src', imgurl);
							tb_remove();
						}
					
					
					// -------------------------------------------------------------------------
					
					
						$( ".alert-success p" ).click(function()
						{
							$(this).fadeOut( "slow", function()
							{
								$( ".alert-success" ).slideUp( "slow" );
							});
						});
					
					
					// -------------------------------------------------------------------------
					
					
						$( '.color' ).change( function()
						{
							var myColor = $( this ).val();
							
							$( this ).prev( 'div' ).find( 'div' ).css( 'backgroundColor', '#' + myColor );
						});
						
						
						$( '.color' ).keypress( function()
						{
							var myColor = $( this ).val();
							
							$( this ).prev( 'div' ).find( 'div' ).css( 'backgroundColor', '#' + myColor );
						});
					
					
					// -------------------------------------------------------------------------
					
					
						$( 'form.ajax-form' ).submit(function()
						{
							$.ajax(
							{
								data: $( this ).serialize(),
								type: "POST",
								beforeSend: function()
								{
									$( '.status' ).removeClass( 'status-done' );
									$( '.status img' ).show();
									$( '.status strong' ).html( 'Saving...' );
									$( '.status' ).fadeIn();
								},
								success: function(data)
								{
									$( '.status img' ).hide();
									$( '.status' ).addClass( 'status-done' );
									$( '.status strong' ).html( 'Done.' );
									$( '.status' ).delay( 1000 ).fadeOut();
								}
							});
							
							return false;
						});
					
					
					// -------------------------------------------------------------------------
					
					});
				</script>
				
				
				<?php
					
					if ( isset( $_GET['tab'] ) )
					{
						pixelwars__create_tabs( $_GET['tab'] );
					}	
					else
					{
						pixelwars__create_tabs( 'general' );
					}
					
				?>
				
				
				<div id="poststuff">
					<?php
					
						// theme options page
						if ( $pagenow == 'themes.php' && $_GET['page'] == 'theme-options' )
						{
							// tab from url
							if ( isset( $_GET['tab'] ) )
							{
								$tab = $_GET['tab'];
							}
							else
							{
								$tab = 'general'; 
							}
							
							
							switch ( $tab )
							{
								case 'general' :
									
									if ( esc_attr( @$_GET['saved'] ) == 'true' )
									{
										echo '<div class="alert-success" title="Click to close"><p><strong>Saved.</strong></p></div>';
									}
									
									?>
										<div class="postbox">
											<div class="inside">
												<form method="post" class="ajax-form" action="<?php admin_url( 'themes.php?page=theme-options' ); ?>">
													<?php
														wp_nonce_field( "settings-page" );
													?>
													
													<table>
														<tr>
															<td class="option-left">
																<h4>Image Logo</h4>
																
																<?php
																	$logo_image = get_option( 'logo_image' );
																?>
																
																<input type="text" id="logo_image" name="logo_image" class="upload code2" value="<?php echo esc_url( $logo_image ); ?>">
																
																<input type="button" class="button upload-button" style="margin-top: 10px;" value="Browse">
																
																<img style="margin-top: 10px; max-height: 50px;" align="right" alt="" src="<?php echo esc_url( $logo_image ); ?>">
															</td>
															
															<td class="option-right">
																Upload a logo or specify an image address of your online logo.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Google Map API Key</h4>
																<?php
																	$google_map_api_key = get_option('google_map_api_key', "");
																?>
																<input type="text" name="google_map_api_key" value="<?php echo esc_attr($google_map_api_key); ?>">
															</td>
															<td class="option-right">
																Get an API key <a target="_blank" href="https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key">here</a>.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<input type="submit" name="submit" class="button button-primary button-large" value="Save Changes">
																
																<input type="hidden" name="settings-submit" value="Y">
															</td>
															
															<td class="option-right">
																
															</td>
														</tr>
													</table>
												</form>
											</div>
										</div>
									<?php
								break;
								
								
								case 'style' :
									
									if ( esc_attr( @$_GET['saved'] ) == 'true' )
									{
										echo '<div class="alert-success" title="Click to close"><p><strong>Saved.</strong></p></div>';
									}
									
									?>
										<div class="postbox">
											<div class="inside">
												<form class="ajax-form" method="post" action="<?php admin_url( 'themes.php?page=theme-options' ); ?>">
													<?php
														wp_nonce_field( "settings-page" );
													?>
													
													
													<table>
														<tr>
															<td class="option-left">
																<h4>Fonts and Colors</h4>
																
																<?php
																	echo '<a href="' . admin_url( 'customize.php' ) . '">Customize</a>';
																?>
															</td>
															
															<td class="option-right">
																Select from theme customizer.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Character Sets</h4>
																
																<label><input type="checkbox" id="char_set_latin" name="char_set_latin" <?php if ( get_option( 'char_set_latin', true ) ) { echo 'checked="checked"'; } ?>> Latin</label>
																
																<br>
																
																<label><input type="checkbox" id="char_set_latin_ext" name="char_set_latin_ext" <?php if ( get_option( 'char_set_latin_ext' ) ) { echo 'checked="checked"'; } ?>> Latin Extended</label>
																
																<br>
																
																<label><input type="checkbox" id="char_set_cyrillic" name="char_set_cyrillic" <?php if ( get_option( 'char_set_cyrillic' ) ) { echo 'checked="checked"'; } ?>> Cyrillic</label>
																
																<br>
																
																<label><input type="checkbox" id="char_set_cyrillic_ext" name="char_set_cyrillic_ext" <?php if ( get_option( 'char_set_cyrillic_ext' ) ) { echo 'checked="checked"'; } ?>> Cyrillic Extended</label>
																
																<br>
																
																<label><input type="checkbox" id="char_set_greek" name="char_set_greek" <?php if ( get_option( 'char_set_greek' ) ) { echo 'checked="checked"'; } ?>> Greek</label>
																
																<br>
																
																<label><input type="checkbox" id="char_set_greek_ext" name="char_set_greek_ext" <?php if ( get_option( 'char_set_greek_ext' ) ) { echo 'checked="checked"'; } ?>> Greek Extended</label>
																
																<br>
																
																<label><input type="checkbox" id="char_set_vietnamese" name="char_set_vietnamese" <?php if ( get_option( 'char_set_vietnamese' ) ) { echo 'checked="checked"'; } ?>> Vietnamese</label>
															</td>
															
															<td class="option-right">
																Select any of them to include to the Google Fonts if the selected fonts have ones of them in their family.
																<br>
																<br>
																To see the supported character sets visit Google Fonts online.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Font Styles</h4>
																
																<?php
																	$extra_font_styles = get_option( 'extra_font_styles', 'No' );
																?>
																<select id="extra_font_styles" name="extra_font_styles" style="width: 100%;">
																	<option <?php if ( $extra_font_styles == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	
																	<option <?php if ( $extra_font_styles == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															
															<td class="option-right">
																Bold and italic styles.
															</td>
														</tr>
														
														
														<tr>
															<td class="option-left">
																<h4>Classic Navigation Menu</h4>
																<?php
																	$classic_navigation_menu = get_option( 'classic_navigation_menu', 'No' );
																?>
																<select name="classic_navigation_menu">
																	<option <?php if ( $classic_navigation_menu == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																	<option <?php if ( $classic_navigation_menu == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																</select>
															</td>
															<td class="option-right">
																Enable/disable.
															</td>
														</tr>
														
														
														<tr>
															<td class="option-left">
																<h4>Mobile Zoom</h4>
																
																<?php
																	$mobile_zoom = get_option( 'mobile_zoom', 'No' );
																?>
																<select id="mobile_zoom" name="mobile_zoom" style="width: 100%;">
																	<option <?php if ( $mobile_zoom == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	
																	<option <?php if ( $mobile_zoom == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															
															<td class="option-right">
																Enable/disable.
															</td>
														</tr>
														
														
														<tr>
															<td class="option-left">
																<input type="submit" name="submit" class="button button-primary button-large" value="Save Changes">
																
																<input type="hidden" name="settings-submit" value="Y">
															</td>
															
															<td class="option-right">
																
															</td>
														</tr>
													</table>
												</form>
											</div>
											<!-- end .inside -->
										</div>
										<!-- end .postbox -->
									<?php
								
								break;
								
								
								case 'layout' :
								
									if ( esc_attr( @$_GET['saved'] ) == 'true' )
									{
										echo '<div class="alert-success" title="Click to close"><p><strong>Saved.</strong></p></div>';
									}
									
									?>
										<div class="postbox">
											<div class="inside">
												<form method="post" action="<?php admin_url( 'themes.php?page=theme-options' ); ?>" class="ajax-form">
													<?php
														wp_nonce_field( "settings-page" );
													?>
													
													
													<table>
														<tr>
															<td class="option-left">
																<h4>Classic Layout</h4>
																
																<?php
																	$classic_layout = get_option( 'classic_layout', 'false' );
																?>
																
																<select id="classic_layout" name="classic_layout">
																	<option <?php if ( $classic_layout == 'true' ) { echo 'selected="selected"'; } ?> value="true">Yes</option>
																	
																	<option <?php if ( $classic_layout == 'false' ) { echo 'selected="selected"'; } ?> value="false">No</option>
																</select>
															</td>
															
															<td class="option-right">
																Enable classic layout always.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Mobile-Only Classic Layout</h4>
																<?php
																	$mobile_only_classic_layout = get_option('mobile_only_classic_layout', 'false');
																?>
																<select id="mobile_only_classic_layout" name="mobile_only_classic_layout">
																	<option <?php if ($mobile_only_classic_layout == 'false') { echo 'selected="selected"'; } ?> value="false">No</option>
																	<option <?php if ($mobile_only_classic_layout == 'true') { echo 'selected="selected"'; } ?> value="true">Yes</option>
																</select>
															</td>
															<td class="option-right">
																Enable classic layout for mobile devices.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Ajax</h4>
																
																<?php
																	$pixelwars__ajax = get_option( 'pixelwars__ajax', 'Yes' );
																?>
																
																<select id="pixelwars__ajax" name="pixelwars__ajax">
																	<option>Yes</option>
																	
																	<option <?php if ( $pixelwars__ajax == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															
															<td class="option-right">
																Ajax functionality for portfolio items.
															</td>
														</tr>
														
														
														<tr>
															<td class="option-left">
																<input type="submit" name="submit" class="button button-primary button-large" value="Save Changes">
																
																<input type="hidden" name="settings-submit" value="Y">
															</td>
															
															<td class="option-right">
																
															</td>
														</tr>
													</table>
												</form>
											</div>
										</div>
									<?php
								
								break;
								
								
								case 'blog' :
									
									if ( esc_attr( @$_GET['saved'] ) == 'true' )
									{
										echo '<div class="alert-success" title="Click to close"><p><strong>Saved.</strong></p></div>';
									}
									
									?>
										<div class="postbox">
											<div class="inside">
												<form class="ajax-form" method="post" action="<?php admin_url( 'themes.php?page=theme-options' ); ?>">
													<?php
														wp_nonce_field( 'settings-page' );
													?>
													
													
													<table>
														<tr>
															<td class="option-left">
																<h4>Excerpt</h4>
																
																<?php
																	$theme_excerpt = get_option( 'theme_excerpt', 'No' );
																?>
																
																<select id="theme_excerpt" name="theme_excerpt">
																	<option <?php if ( $theme_excerpt == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																	
																	<option <?php if ( $theme_excerpt == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	
																	<option <?php if ( $theme_excerpt == 'standard' ) { echo 'selected="selected"'; } ?> value="standard">Only for standard format</option>
																</select>
															</td>
															
															<td class="option-right">
																Enable/disable.
															</td>
														</tr>
														
														
														<tr>
															<td class="option-left">
																<h4>Related Posts</h4>
																
																<?php
																	$pixelwars__related_posts = get_option( 'pixelwars__related_posts', 'Yes' );
																?>
																
																<select id="pixelwars__related_posts" name="pixelwars__related_posts">
																	<option>Yes</option>
																	
																	<option <?php if ( $pixelwars__related_posts == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															
															<td class="option-right">
																Enable/disable.
															</td>
														</tr>
														
														
														<tr>
															<td class="option-left">
																<h4>Numbered Pagination</h4>
																<?php
																	$pagination = get_option( 'pagination', 'No' );
																?>
																<select id="pagination" name="pagination">
																	<option <?php if ( $pagination == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																	<option <?php if ( $pagination == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																</select>
															</td>
															
															<td class="option-right">
																Use numbered pagination instead of Older-Newer links.
															</td>
														</tr>
														
														
														<tr>
															<td class="option-left">
																<h4>Back To Blog</h4>
																<?php
																	$pixelwars__back_to_blog_link_behaviour = get_option( 'pixelwars__back_to_blog_link_behaviour', 'to_regular_blog' );
																?>
																<select name="pixelwars__back_to_blog_link_behaviour">
																	<option>To Regular Blog</option>
																	<option <?php if ( $pixelwars__back_to_blog_link_behaviour == 'to_grid_blog' ) { echo 'selected="selected"'; } ?> value="to_grid_blog">To Grid Blog</option>
																</select>
															</td>
															
															<td class="option-right">
																Link behaviour.
															</td>
														</tr>
														
														
														<tr>
															<td class="option-left">
																<input type="submit" name="submit" class="button button-primary button-large" value="Save Changes">
																
																<input type="hidden" name="settings-submit" value="Y">
															</td>
															
															<td class="option-right">
																
															</td>
														</tr>
													</table>
												</form>
											</div>
										</div>
									<?php
								break;
							}
						}
					?>
				</div>
			</div>
		<?php
	}


/* ============================================================================================================================================ */


	function pixelwars__theme_save_settings()
	{
		global $pagenow;
		
		if ( $pagenow == 'themes.php' && $_GET['page'] == 'theme-options' )
		{
			if ( isset ( $_GET['tab'] ) )
			{
				$tab = $_GET['tab'];
			}
			else
			{
				$tab = 'general';
			}
			
			
			switch ( $tab )
			{
				case 'general' :
				
					update_option( 'logo_image', $_POST['logo_image'] );
					update_option( 'google_map_api_key', $_POST['google_map_api_key'] );
				
				break;
				
				case 'style' :
					
					update_option( 'char_set_latin', $_POST['char_set_latin'] );
					update_option( 'char_set_latin_ext', $_POST['char_set_latin_ext'] );
					update_option( 'char_set_cyrillic', $_POST['char_set_cyrillic'] );
					update_option( 'char_set_cyrillic_ext', $_POST['char_set_cyrillic_ext'] );
					update_option( 'char_set_greek', $_POST['char_set_greek'] );
					update_option( 'char_set_greek_ext', $_POST['char_set_greek_ext'] );
					update_option( 'char_set_vietnamese', $_POST['char_set_vietnamese'] );
					update_option( 'extra_font_styles', $_POST['extra_font_styles'] );
					update_option( 'classic_navigation_menu', $_POST['classic_navigation_menu'] );
					update_option( 'mobile_zoom', $_POST['mobile_zoom'] );
					
				break;
				
				
				case 'layout' :
					
					update_option( 'classic_layout', $_POST['classic_layout'] );
					update_option( 'mobile_only_classic_layout', $_POST['mobile_only_classic_layout'] );
					update_option( 'pixelwars__ajax', $_POST['pixelwars__ajax'] );
					
				break;
				
				
				case 'blog' :
				
					update_option( 'theme_excerpt', $_POST['theme_excerpt'] );
					update_option( 'pixelwars__related_posts', $_POST['pixelwars__related_posts'] );
					update_option( 'pagination', $_POST['pagination'] );
					update_option( 'pixelwars__back_to_blog_link_behaviour', $_POST['pixelwars__back_to_blog_link_behaviour'] );
				
				break;
			}
		}
	}


/* ============================================================================================================================================ */


	function pixelwars__load_settings_page()
	{
		if ( isset( $_POST["settings-submit"] ) == 'Y' )
		{
			check_admin_referer( "settings-page" );
			
			pixelwars__theme_save_settings();
			
			$url_parameters = isset( $_GET['tab'] ) ? 'tab=' . $_GET['tab'] . '&saved=true' : 'saved=true';
			
			wp_redirect( admin_url( 'themes.php?page=theme-options&' . $url_parameters ) );
			
			exit;
		}
	}


/* ============================================================================================================================================ */


	function pixelwars__theme_menu()
	{
		$settings_page = add_theme_page('Theme Options',
										'Theme Options',
										'edit_theme_options',
										'theme-options',
										'pixelwars__theme_options_page' );
		
		add_action( "load-{$settings_page}", 'pixelwars__load_settings_page' );
	}
	
	add_action( 'admin_menu', 'pixelwars__theme_menu' );


/* ============================================================================================================================================ */


?>