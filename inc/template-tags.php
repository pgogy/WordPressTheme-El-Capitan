<?php

function el_capitan__get_categories($id){

	$post_categories = wp_get_post_categories($id);
	$cats = array();
		
	foreach($post_categories as $c){
		$cat = get_category( $c );
		$cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug, 'link' => get_category_link($c) );
	}
	
	return $cats;

}

function el_capitan__get_categories_links($id){

	$html = array();
	$cats = el_capitan__get_categories($id);
	
	foreach($cats as $cat){
		$html[] = "<a href='" . $cat['link'] ."'>" . $cat['name'] . "</a>";
	}
	
	
	if(count($html)==0){
		$html[] = _x("No Categories", "No Categories", "el-capitan");
	}
	
	return $html;

}

function el_capitan__body_class(){

	if(is_author()){
		return "author";
	}
	
}

function el_capitan__get_tags($id){

	$post_tags = wp_get_post_tags($id);
	$cats = array();
		
	foreach($post_tags as $c){
		$cat = get_tag( $c );
		$cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug, 'link' => get_tag_link($c) );
	}
	
	return $cats;

}

function el_capitan__get_tags_links($id){

	$html = array();
	$cats = el_capitan__get_tags($id);
	
	foreach($cats as $cat){
		$html[] = "<a href='" . $cat['link'] ."'>" . $cat['name'] . "</a>";
	}
	
	if(count($html)==0){
		$html[] = _x("No Tags", "No tags found", "el-capitan");
	}
	
	return $html;

}

function el_capitan__entry_meta() {
	
	?><div>
		<h6 class='meta_label'><?PHP echo _x('Categories', 'Categories', 'el-capitan'); ?></h6><span><?PHP echo implode(" / ", el_capitan__get_categories_links(get_the_ID())); ?></span>
	</div>
	<div>
		<h6 class='meta_label'><?PHP echo _x('Tags', 'Tags', 'el-capitan'); ?></h6><span><?PHP echo get_the_tag_list(" ", " / ", " "); ?></span>
	</div>
	<?PHP if(get_theme_mod("author")=="on"){ ?>
	<div>
		<h6 class='meta_label'><?PHP echo _x('Author', 'Post Author', 'el-capitan'); ?></h6><span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span></h6>
	</div>
	<div>
		<h6 class='meta_label'><?PHP echo _x('Published', 'Published', 'el-capitan'); ?></h6><span><a href="<?php echo get_permalink( get_the_ID() ); ?>"><?php the_date(); ?></a></span></h6>
	</div>
	<?PHP
	}
	
}

function el_capitan__post_background() {
	$background = rand(1,6);
	switch($background){
		case 1: return "cubes";
		case 2: return "stars";
		case 3: return "arrows";
		case 4: return "grid";
		case 5: return "gridother";
		case 6: return "arrows";
	}
}

function el_capitan__category_title_background($term) {

	$hex = el_capitan__hex2rgb(get_theme_mod("site_post_background_colour"));

	$thumbnail = get_option( 'el_capitan__picture_' . $term . '_thumbnail_id', 0 );
	
	if($thumbnail){
		
		?>margin-top: 10px; background-color: rgba(<?PHP echo $hex[0] . "," . $hex[1] . "," . $hex[2]; ?>, 0.75); <?PHP		
	
	}else{

		$colour = get_option( 'el_capitan__' . $term . '_colour');
		
		if($colour){
			
			?> background-color: rgba(<?PHP echo $hex[0] . "," . $hex[1] . "," . $hex[2]; ?>, 0.75); <?PHP		
		
		}
		
	}

}

function el_capitan__post_colour_background() {

	global $post;
	$colour = get_post_meta($post->ID, "el_capitan__post_colour", true);
	?> background-color:<?PHP echo $colour;?>; <?PHP
	
}

function el_capitan__post_thumbnail() {

	if(get_post_thumbnail_id(get_the_ID())!=""){
		
		$id = get_the_ID();

		echo get_the_post_thumbnail($id, array(90,90), array("class" => "post-thumbnail-article"));
	
	}
	
}

function el_capitan__child_categories(){

	?><footer class="page-footer">
		<h1 class="page-title"><?PHP echo _x('Related Categories', "Similar Categories", 'el-capitan'); ?></h1>
		<div class="taxonomy-description"><?PHP
		
			$category = get_category($_GET['cat']);
			
			$childcats = get_categories('child_of=' . $category->parent . '&hide_empty=1&exclude=' . $_GET['cat']);
			$output = array();
			foreach ($childcats as $childcat) {
				if (cat_is_ancestor_of($ancestor, $childcat->cat_ID) == false){
					$output[] = '<a href="'.get_category_link($childcat->cat_ID).'">' . $childcat->cat_name . '</a>';
					$ancestor = $childcat->cat_ID;
				}
			}
			
			echo implode(" / ", $output);
			
		?></div>
	</footer><?PHP

}

function el_capitan__posts_authors_list($type, $id){

	$the_query = new WP_Query( array($type => $id, 'posts_per_page' => 99) );
	
	$authors = array();

	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$authors[] = get_the_author_meta('ID');
		}
	} 
	
	wp_reset_postdata();
	
	return $authors;
	
}

function el_capitan__posts_authors_html($type, $id){

	$authors = array_unique(el_capitan__posts_authors_list($type, $id));

	$output = array();
	foreach($authors as $author){
		$output[] = "<a href='" . get_author_posts_url($author) . "'>" . ucfirst(get_the_author_meta( 'display_name', $author )) . "</a>";
	}
	
	echo implode(" / ", $output);

}

function el_capitan__post_authors($type, $id){
	?><footer class="page-footer">
		<h1 class="page-title"><?PHP echo _x('Authors', "WordPress authors", 'el-capitan'); ?></h1>
		<div class="taxonomy-description" id='tag_cloud'><?PHP
		
			el_capitan__posts_authors_html($type, $id);
			
		?></div>
	</footer><?PHP
}

function el_capitan__posts_content($type, $id){

	$the_query = new WP_Query( array($type => $id, 'posts_per_page' => 99) );
	
	$content = "";

	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$content .= str_replace("\r", "", str_replace("\n", "", str_replace(".", "", preg_replace("/(?![=$'%-])\p{P}/u", " ", strip_tags(strtolower(get_the_content()))))));
		}
	} 
	
	wp_reset_postdata();
	
	return $content;
	
}
