<?php

get_header(); 

?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div id="lightbox"><div id="holder" class="album_div"></div><div id="close"><a><i class="fa fa-times" aria-hidden="true"></i></a></div></div>
			<?PHP
				get_template_part( 'parts/home/' . get_theme_mod("home_page"));
			?>			
		</main><!-- .site-main -->
	</div><!-- .content-area -->
<?php get_footer(); ?>
