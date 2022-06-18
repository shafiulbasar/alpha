<?php
/*
Plugin Name: Pixelwars Portfolio
Plugin URI:  http://www.pixelwars.org
Description: Pixelwars portfolio.
Version:     1.0.1
Author:      Pixelwars
Author URI:  http://www.pixelwars.org
License:     ThemeForest License
Text Domain: read
Domain Path: /languages/
*/


/* ====================================================================================================================================================== */


	// don't load directly
	if ( ! defined( 'ABSPATH' ) )
	{
		die( '-1' );
	}


/* ====================================================================================================================================================== */


	function pixelwars__create_post_type__portfolio()
	{
		$labels = array('name'               => __( 'Portfolio', 'read' ),
						'singular_name'      => __( 'Portfolio Item', 'read' ),
						'add_new'            => __( 'Add New', 'read' ),
						'add_new_item'       => __( 'Add New', 'read' ),
						'edit_item'          => __( 'Edit', 'read' ),
						'new_item'           => __( 'New', 'read' ),
						'all_items'          => __( 'All', 'read' ),
						'view_item'          => __( 'View', 'read' ),
						'search_items'       => __( 'Search', 'read' ),
						'not_found'          => __( 'No Items found', 'read' ),
						'not_found_in_trash' => __( 'No Items found in Trash', 'read' ),
						'parent_item_colon'  => '',
						'menu_name'          => 'Portfolio' );
		
		
		$args = array(  'labels' => $labels,
						'public' => true,
						'exclude_from_search' => false,
						'publicly_queryable'  => true,
						'show_ui'             => true,
						'query_var'           => true,
						'show_in_nav_menus'   => true,
						'capability_type'     => 'post',
						'hierarchical'        => false,
						'menu_position'       => 5,
						'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
						'rewrite'             => array( 'slug' => 'portfolio', 'with_front' => false ) );
		
		
		register_post_type( 'portfolio' , $args );
	}
	
	add_action( 'init', 'pixelwars__create_post_type__portfolio' );
	
	
	function pixelwars__updated_messages__portfolio( $messages )
	{
		global $post, $post_ID;
		
		
		$messages['portfolio'] = array( 0 => "", // Unused. Messages start at index 1.
										
										1 => sprintf( __( '<strong>Updated.</strong> <a target="_blank" href="%s">View</a>', 'read' ), esc_url( get_permalink( $post_ID ) ) ),
										
										2 => __( 'Custom field updated.', 'read' ),
										
										3 => __( 'Custom field deleted.', 'read' ),
										
										4 => __( 'Updated.', 'read' ),
										
										// translators: %s: date and time of the revision
										5 => isset( $_GET['revision'] ) ? sprintf( __( 'Restored to revision from %s', 'read' ), wp_post_revision_title( ( int ) $_GET['revision'], false ) ) : false,
										
										6 => sprintf( __( '<strong>Published.</strong> <a target="_blank" href="%s">View</a>', 'read' ), esc_url( get_permalink( $post_ID) ) ),
										
										7 => __( 'Saved.', 'read' ),
										
										8 => sprintf( __( 'Submitted. <a target="_blank" href="%s">Preview</a>', 'read' ), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
										
										9 => sprintf( __( 'Scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview</a>', 'read' ),
										
										// translators: Publish box date format, see http://php.net/date
										date_i18n( __( 'M j, Y @ G:i', 'read' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID) ) ),
										
										10 => sprintf( __( '<strong>Item draft updated.</strong> <a target="_blank" href="%s">Preview</a>', 'read' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ) );
		
		
		return $messages;
	}
	
	add_filter( 'post_updated_messages', 'pixelwars__updated_messages__portfolio' );
	
	
	function pixelwars__portfolio_columns( $pf_columns )
	{
		$pf_columns = array('cb'                   => '<input type="checkbox">',
							'title'                => __( 'Title', 'read' ),
							'pf_featured_image'    => __( 'Featured Image', 'read' ),
							'portfolio-categories' => __( 'Portfolio Categories', 'read' ),
							'comments'             => '<span class="vers"><div title="Comments" class="comment-grey-bubble"></div></span>',
							'date'                 => __( 'Date', 'read' ) );
		
		
		return $pf_columns;
	}
	
	add_filter( 'manage_edit-portfolio_columns', 'pixelwars__portfolio_columns' );
	
	
	function pixelwars__custom_columns__portfolio( $pf_column )
	{
		global $post, $post_ID;
		
		
		switch ( $pf_column )
		{
			case 'pf_featured_image':
			
				if ( has_post_thumbnail() )
				{
					the_post_thumbnail( 'thumbnail' );
				}
			
			break;
			
			
			case 'portfolio-categories':
			
				$taxonomy = 'portfolio-category';
				
				$terms_list = get_the_terms( $post_ID, $taxonomy );
				
				if ( ! empty( $terms_list ) )
				{
					$out = array();
					
					foreach ( $terms_list as $term_list )
					{
						$out[] = '<a href="edit.php?post_type=portfolio&portfolio-category=' . $term_list->slug . '">' . $term_list->name . ' </a>';
					}
					
					echo join( ', ', $out );
				}
			
			break;
		}
	}
	
	add_action( 'manage_posts_custom_column',  'pixelwars__custom_columns__portfolio' );
	
	
	function pixelwars__taxonomy__portfolio()
	{
		$labels_cat = array('name'              => __( 'Portfolio Categories', 'read' ),
							'singular_name'     => __( 'Portfolio Category', 'read' ),
							'search_items'      => __( 'Search', 'read' ),
							'all_items'         => __( 'All', 'read' ),
							'parent_item'       => __( 'Parent', 'read' ),
							'parent_item_colon' => __( 'Parent:', 'read' ),
							'edit_item'         => __( 'Edit', 'read' ),
							'update_item'       => __( 'Update', 'read' ),
							'add_new_item'      => __( 'Add New', 'read' ),
							'new_item_name'     => __( 'New Name', 'read' ),
							'menu_name'         => __( 'Portfolio Categories', 'read' ) );
		
		
		register_taxonomy(  'portfolio-category',
							array( 'portfolio' ),
							array(  'hierarchical' => true,
									'labels'       => $labels_cat,
									'show_ui'      => true,
									'public'       => true,
									'query_var'    => true,
									'rewrite'      => array( 'slug' => 'portfolio-category' ) ) );
	}
	
	add_action( 'init', 'pixelwars__taxonomy__portfolio' );
	
	
	function pixelwars_taxonomy_filter_portfolio()
	{
		global $typenow;
		
		
		if ( $typenow == 'portfolio' )
		{
			$filters = array( 'portfolio-category' );
			
			
			foreach ( $filters as $tax_slug )
			{
				$tax_obj = get_taxonomy( $tax_slug );
				
				$tax_name = $tax_obj->labels->name;
				
				$terms = get_terms( $tax_slug );
				
				
				echo '<select name="' . $tax_slug . '" id="' . $tax_slug . '" class="postform">';
				
					echo '<option value="">' . __( 'All', 'read' ) . ' ' . $tax_name . '</option>';
					
					foreach ( $terms as $term )
					{
						echo '<option value=' . $term->slug, @$_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count . ')</option>';
					}
				
				echo '</select>';
			}
		}
	}
	
	add_action( 'restrict_manage_posts', 'pixelwars_taxonomy_filter_portfolio' );
	
	
	function pixelwars_theme_custom_box_show_portfolio( $post )
	{
		?>
			<?php
				wp_nonce_field( 'pixelwars_theme_custom_box_show_portfolio', 'pixelwars_theme_custom_box_nonce_portfolio' );
			?>
			
			
			<p>
				<?php
					$pf_type = get_option( $post->ID . 'pf_type', 'Standard' );
				?>
				
				<label><input type="radio" name="pf_type" <?php if ( $pf_type == 'Standard' ) { echo 'checked="checked"'; } ?> value="Standard"> <?php echo __( 'Standard', 'read' ); ?></label>
				
				<br>
				
				<label><input type="radio" name="pf_type" <?php if ( $pf_type == 'Lightbox Gallery' ) { echo 'checked="checked"'; } ?> value="Lightbox Gallery"> <?php echo __( 'Lightbox Gallery', 'read' ); ?></label>
				
				<br>
				
				<label><input type="radio" name="pf_type" <?php if ( $pf_type == 'Lightbox Audio' ) { echo 'checked="checked"'; } ?> value="Lightbox Audio"> <?php echo __( 'Lightbox Audio', 'read' ); ?></label>
				
				<br>
				
				<label><input type="radio" name="pf_type" <?php if ( $pf_type == 'Lightbox Video' ) { echo 'checked="checked"'; } ?> value="Lightbox Video"> <?php echo __( 'Lightbox Video', 'read' ); ?></label>
				
				<br>
				
				<label><input type="radio" name="pf_type" <?php if ( $pf_type == 'Direct URL' ) { echo 'checked="checked"'; } ?> value="Direct URL"> <?php echo __( 'Direct URL', 'read' ); ?></label>
			</p>
			
			<hr>
			
			<p>
				<?php
					$pf_direct_url = stripcslashes( get_option( $post->ID . 'pf_direct_url' ) );
					
					$pf_link_new_tab = get_option( $post->ID . 'pf_link_new_tab', true );
				?>
				
				<label for="pf_direct_url">URL</label>
				
				<input type="text" id="pf_direct_url" name="pf_direct_url" class="widefat code2" value="<?php echo esc_url( $pf_direct_url ); ?>">
				
				<label><input type="checkbox" name="pf_link_new_tab" <?php if ( $pf_link_new_tab != false ) { echo 'checked="checked"'; } ?>> <?php echo __( 'Open link in new tab', 'read' ); ?></label>
			</p>
		<?php
	}
	
	function pixelwars_theme_custom_box_add_portfolio()
	{
		add_meta_box( 'pixelwars_theme_custom_box_portfolio', __( 'Type', 'read' ), 'pixelwars_theme_custom_box_show_portfolio', 'portfolio', 'side', 'low' );
	}
	
	add_action( 'add_meta_boxes', 'pixelwars_theme_custom_box_add_portfolio' );
	
	
	function pixelwars_theme_custom_box_save_portfolio( $post_id )
	{
		if ( ! isset( $_POST['pixelwars_theme_custom_box_nonce_portfolio'] ) )
		{
			return $post_id;
		}
		
		
		$nonce = $_POST['pixelwars_theme_custom_box_nonce_portfolio'];
		
		if ( ! wp_verify_nonce( $nonce, 'pixelwars_theme_custom_box_show_portfolio' ) )
        {
			return $post_id;
		}
		
		
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        {
			return $post_id;
		}
		
		
		if ( 'page' == $_POST['post_type'] )
		{
			if ( ! current_user_can( 'edit_page', $post_id ) )
			{
				return $post_id;
			}
		}
		else
		{
			if ( ! current_user_can( 'edit_post', $post_id ) )
			{
				return $post_id;
			}
		}
		
		
		update_option( $post_id . 'pf_type', $_POST['pf_type'] );
		update_option( $post_id . 'pf_direct_url', $_POST['pf_direct_url'] );
		update_option( $post_id . 'pf_link_new_tab', $_POST['pf_link_new_tab'] );
	}
	
	add_action( 'save_post', 'pixelwars_theme_custom_box_save_portfolio' );


/* ====================================================================================================================================================== */


?>