<?php

get_header(); 

?>	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main"><?PHP

			get_template_part( 'parts/author/all_posts'); 
	
		?></main><!-- .site-main -->
	</div><!-- .content-area -->
	<?PHP
		get_template_part( 'parts/pagination/pagination_html' );
	?>
<?php get_footer(); ?>
