<?php

get_header(); 

?>	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main"><?PHP

			get_template_part( 'parts/tag/all_posts'); 
	
		?></main><!-- .site-main -->
	</div><!-- .content-area -->
	
	<div id="paginationshow"><a><i class="fa fa-book" aria-hidden="true"></i></a></div>
	<div id="paginationholder">
		<?PHP
			get_template_part( 'parts/pagination/pagination');
		?>
	</div>
	
	<div id="searchshow"><a><i class="fa fa-search" aria-hidden="true"></i></a></div>
	<div id="searchholder">
		<?PHP
			get_template_part( 'parts/search-form/standard');
		?>
	</div>

<?php get_footer(); ?>
