<article id="post-<?php the_ID(); ?>" <?php post_class("home-page " . $post->number . " " . $post->number . "_picture_" . $post->counter); ?> >
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

		if(count($pictures)!=0){
	
		?><div class="album_div" current_img="0" <?PHP
			for($x=0;$x<count($pictures);$x++){
				echo " background_" . $x . "='" . $pictures[$x] . "' ";
			}
			echo " style=' background-image:url(" . $pictures[0] . "); ' ";
			?>>&nbsp;
			</div><?PHP
		}else{
			?><div class="<?PHP echo el-capitan_post_background(); ?>">&nbsp;</div><?PHP
		}?>
	<div class="album_name">
		<a href="<?PHP echo get_permalink(); ?>" rel="bookmark">
		<?PHP
			echo $post->post_title;
		?>
		</a>
	</div>
	<div class="picmenu">
		<div class="picinfo"><a><i class="fa fa-plus" aria-hidden="true"></i></a></div>
		<?PHP
			if(count($pictures)!=0){
		?>
		<div class="piclightbox"><a><i class="fa fa-lightbulb-o" aria-hidden="true"></i></a></div>
		<?PHP
			}
		?>
		<div class="picview"><a href="<?PHP echo get_permalink(); ?>" rel="bookmark"><i class="fa fa-eye" aria-hidden="true"></i></a></div>
	</div>
</article><!-- #post-## -->