<?php

	function empathy_blog_page_link_html($blog_page_url)
	{
		?>
			<p class="launch">
				<a class="button" href="<?php echo esc_url($blog_page_url); ?>">
					<?php
						esc_html_e('SEE ALL POSTS', 'empathy');
					?>
				</a>
			</p> <!-- .launch -->
		<?php
	}
	
	
	function empathy_blog_page_link()
	{
		$front_page_displays = get_option('show_on_front');
		
		if ($front_page_displays == 'posts')
		{
			$blog_page_url = home_url('/');
			empathy_blog_page_link_html($blog_page_url);
		}
		else
		{
			$blog_page_id = get_option('page_for_posts');
			
			if ($blog_page_id)
			{
				$blog_page_url = get_page_link($blog_page_id);
				empathy_blog_page_link_html($blog_page_url);
			}
		}
	}

?>