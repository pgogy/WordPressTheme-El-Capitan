<?php if ( have_posts() ) : 

	$counter = 1;	
		
	while ( have_posts() ) : the_post();
	
		$post->counter = $counter;
		$post->number = "six";

		get_template_part( 'parts/content/content-number', get_post_format() );
		$counter++;

	endwhile;
	
	?>
	<div id="paginationshow"><a><i class="fa fa-book" aria-hidden="true"></i></a></div>
	<div id="paginationholder">
		<?PHP
			get_template_part( 'parts/pagination/pagination');
		?>
	</div><?PHP
	
else :

	get_template_part( 'content', 'none' );

endif;

?>