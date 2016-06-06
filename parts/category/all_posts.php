<?php 

if ( have_posts() ) :

	while ( have_posts() ) : the_post();

		get_template_part( 'parts/content/content-category');

	endwhile;
	
else :

	get_template_part( 'content', 'none' );

endif;

?>