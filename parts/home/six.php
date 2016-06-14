<?php if ( have_posts() ) : 

	$counter = 1;	
		
	while ( have_posts() ) : the_post();
	
		$post->counter = $counter;
		$post->number = "six";

		get_template_part( 'parts/content/content-number', get_post_format() );
		$counter++;

	endwhile;
	
	get_template_part( 'parts/pagination/pagination_html' );
	
else :

	get_template_part( 'content', 'none' );

endif;

?>