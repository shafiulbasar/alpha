<?php
	get_header();
?>

<div id="main" class="site-main">
	<div class="page-single page-layout">
		<div class="layout-fixed">
			<article <?php post_class(); ?>>
				<header class="entry-header">
					 <h1 class="entry-title"><?php echo __( 'you are lost!', 'empathy' ); ?></h1>
				</header>
				
				<div class="entry-content">
					<div class="http-alert">
						<h1>
							<i class="pe-7s-way"></i>
						</h1>
						
						<p><?php echo __( 'The page you are looking for was not found!', 'empathy' ); ?></p>
					</div>
				</div>
			</article>
		</div>

<?php
	get_footer();
?>