<article id="post-<?php the_ID(); ?>">
	<header class="entry-header" style="<?php el-capitan_post_colour_background(); ?>">
		<h1 class="entry-title">
			<?PHP
				echo sprintf(
					 __( 'Sorry, Nothing found for %s', 'el-capitan' ), $_GET['s']
				);
			?>
		</h1>
	</header>
</article><!-- #post-## -->
