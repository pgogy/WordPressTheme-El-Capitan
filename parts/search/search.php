<?php 

	if ( have_posts() ) : 
			
		while ( have_posts() ) : the_post(); 
		
			$post->number = "eight";
		
			get_template_part( 'parts/content/content-search' );

		endwhile;
			
	else :
		
		get_template_part( 'parts/content/content-none' );

	endif;
	
?>