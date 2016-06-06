<article id="post-<?php the_ID(); ?>" <?php post_class("home-page eight eight_picture_" . $post->counter); ?>>
	<?PHP
			$pictures = array();
			$domDocument = new DOMDocument();
			@$domDocument->loadHTML($post->post_content); 
			$query = "//img";
			$xpath = new DOMXPath($domDocument); 
			$result = $xpath->query($query); 
			foreach ($result as $node) {
				array_push($pictures,$node->getAttribute("src"));
			}
		?>
	<div class="album_div" current_img="0" <?PHP
		for($x=0;$x<count($pictures);$x++){
			echo " background_" . $x . "='" . $pictures[$x] . "' ";
		}
		echo " style='width:100%; height:100%; float:left; position:relative; background-image:url(" . $pictures[0] . "); background-size: cover; background-position: center center; background-repeat:no-repeat;' ";
	?>>&nbsp;
	</div>
	<div class="album_name">
		<a href="<?PHP echo get_permalink(); ?>" rel="bookmark">
		<?PHP
			echo $post->post_title;
		?>
		</a>
	</div>
	<div class="picmenu">
		<div class="picinfo"><a><i class="fa fa-plus" aria-hidden="true"></i></a></div>
		<div class="piclightbox"><a><i class="fa fa-lightbulb-o" aria-hidden="true"></i></a></div>
		<div class="picview"><a href="<?PHP echo get_permalink(); ?>" rel="bookmark"><i class="fa fa-eye" aria-hidden="true"></i></a></div>
	</div>
</article><!-- #post-## -->