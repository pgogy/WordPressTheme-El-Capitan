<?php if ( have_posts() ) : 

	$counter = 0;	
		
	while ( have_posts() ) : the_post();

		get_template_part( 'parts/content/content-fourteen', get_post_format() );

	endwhile;
	
	get_template_part('parts/pagination/pagination');
	
else :

	get_template_part( 'content', 'none' );

endif;

?>