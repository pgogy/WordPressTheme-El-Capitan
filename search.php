<?php

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main"><?PHP
		
			get_template_part("parts/search/search");

		?></main><!-- .site-main -->
	</section><!-- .content-area -->
	
	<div id="searchshow"><a><i class="fa fa-search" aria-hidden="true"></i></a></div>
	<div id="searchholder">
		<?PHP
			get_template_part( 'parts/search-form/standard');
		?>
	</div>

<?php get_footer(); ?>
