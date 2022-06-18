				<?php
					if (is_active_sidebar( 'pixelwars__sidebar_4' ) ||
						is_active_sidebar( 'pixelwars__sidebar_5' ) ||
						is_active_sidebar( 'pixelwars__sidebar_6' ) )
					{
						?>
							<footer class="site-footer" role="contentinfo">
								<div class="layout-medium">
									<div class="footer-sidebar widget-area" role="complementary"> 
										<?php
											dynamic_sidebar( 'pixelwars__sidebar_4' );
											
											dynamic_sidebar( 'pixelwars__sidebar_5' );
											
											dynamic_sidebar( 'pixelwars__sidebar_6' );
										?>
									</div>
								</div>
							</footer>
						<?php
					}
				?>
            </div>
		</div>
	</div>
	
	<?php
		wp_footer();
	?>
	
	<script>
		(function($) { "use strict"; 
			$.extend($.validator.messages, {
				required: "<?php esc_html_e('This field is required.', 'empathy'); ?>",
				remote: "<?php esc_html_e('Please fix this field.', 'empathy'); ?>",
				email: "<?php esc_html_e('Please enter a valid email address.', 'empathy'); ?>",
				url: "<?php esc_html_e('Please enter a valid URL.', 'empathy'); ?>",
				date: "<?php esc_html_e('Please enter a valid date.', 'empathy'); ?>",
				dateISO: "<?php esc_html_e('Please enter a valid date ( ISO ).', 'empathy'); ?>",
				number: "<?php esc_html_e('Please enter a valid number.', 'empathy'); ?>",
				digits: "<?php esc_html_e('Please enter only digits.', 'empathy'); ?>",
				equalTo: "<?php esc_html_e('Please enter the same value again.', 'empathy'); ?>",
				maxlength: $.validator.format("<?php esc_html_e('Please enter no more than {0} characters.', 'empathy'); ?>"),
				minlength: $.validator.format("<?php esc_html_e('Please enter at least {0} characters.', 'empathy'); ?>"),
				rangelength: $.validator.format("<?php esc_html_e('Please enter a value between {0} and {1} characters long.', 'empathy'); ?>"),
				range: $.validator.format("<?php esc_html_e('Please enter a value between {0} and {1}.', 'empathy'); ?>"),
				max: $.validator.format("<?php esc_html_e('Please enter a value less than or equal to {0}.', 'empathy'); ?>"),
				min: $.validator.format("<?php esc_html_e('Please enter a value greater than or equal to {0}.', 'empathy'); ?>"),
				step: $.validator.format("<?php esc_html_e('Please enter a multiple of {0}.', 'empathy'); ?>")
			});
		})(jQuery);
	</script>
</body>
</html>