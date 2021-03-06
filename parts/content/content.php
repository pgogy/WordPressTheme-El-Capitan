<article id="post-<?php the_ID(); ?>">
	<header class="entry-header">
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s', 'el-capitan' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );
			
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'el-capitan' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'el-capitan' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->
	<?PHP
		if(get_theme_mod("page-navigation")=="on"){
	?>
	<div class="page-navigation">
		<?PHP 
			$prev = get_previous_post_link();
			if($prev!=""){
				echo __("Previous", "el-capitan") . " " . $prev;	
			}
		 ?>
		<?PHP 
			$next = get_next_post_link();
			if($next!=""){
				echo __("Next", "el-capitan") . " " . $next; 
			} 
		?>
	</div><?PHP
		}
	?>
	<footer class="entry-footer">
		<?php el_capitan_entry_meta(); ?>
		<?php edit_post_link( __( 'Edit', 'el-capitan' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
	<div style="clear:both"></div>
</article><!-- #post-## -->