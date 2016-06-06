<?php
	get_header(); 
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
		<?php
		while ( have_posts() ) : the_post();

			if(is_page()){
				get_template_part( 'parts/content/page' );
			}else{
				get_template_part( 'parts/content/content' );
			}

			if(get_theme_mod("comments")=="on"){
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			}
			
		endwhile;
		?>
		<?PHP

			get_sidebar('sidebar');

		?>
		</main><!-- .site-main -->
		
	</div><!-- .content-area -->
<?php get_footer(); ?>
