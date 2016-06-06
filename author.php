<?php

get_header(); 

?>	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main"><?PHP

			get_template_part( 'parts/author/all_posts'); 
	
		?></main><!-- .site-main -->
	</div><!-- .content-area -->
	
	<div id="paginationshow"><a><i class="fa fa-book" aria-hidden="true"></i></a></div>
	<div id="paginationholder">
		<?PHP
			get_template_part( 'parts/pagination/pagination');
		?>
	</div>

<?php get_footer(); ?>
