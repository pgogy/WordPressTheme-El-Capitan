<?php

function el_capitan_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'el_capitan_add_editor_styles' );

function el_capitan_setup() {

	load_theme_textdomain( 'el-capitan', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );
	
	add_theme_support( 'post-thumbnails' );
	
	$chargs = array(
		'width' => 980,
		'height' => 300,
		'uploads' => true,
	);
	
	if ( ! isset( $content_width ) ) $content_width = 900;
	
	add_theme_support( 'custom-header', $chargs );
	
	set_post_thumbnail_size( 825, 510, true );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'el-capitan' ),
	) );

	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

}
add_action( 'after_setup_theme', 'el_capitan_setup' );

function el_capitan_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area Bottom', 'el-capitan' ),
		'id'            => 'sidebar',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'el-capitan' ),
		'before_widget' => '<aside id="%1$s" class="masonry widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'el_capitan_widgets_init' );
 
function el_capitan_scripts() {

	wp_enqueue_style( 'el_capitan-style', get_template_directory_uri() . '/css/main.css' );
	wp_enqueue_style( 'el_capitan-style-custom', get_template_directory_uri() . '/css/custom.css' );
	wp_enqueue_style( 'el_capitan-core-style', get_template_directory_uri() . '/css/wp_core.css' );
	wp_enqueue_style( 'el_capitan-style-mobile-550', get_template_directory_uri() . '/css/mobile550.css' );
	wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome/font-awesome.min.css'); 

	wp_enqueue_script( 'el_capitan-image-preview', get_template_directory_uri() . '/js/image_preview.js', array( 'jquery' ) );
	wp_enqueue_script( 'el_capitan-lightbox', get_template_directory_uri() . '/js/lightbox.js', array( 'jquery' ) );
	wp_enqueue_script( 'el_capitan-info', get_template_directory_uri() . '/js/moreinfo.js', array( 'jquery' ) );
	wp_enqueue_script( 'el_capitan-pagination', get_template_directory_uri() . '/js/paginationshow.js', array( 'jquery' ) );
	wp_enqueue_script( 'el_capitan-searchshow', get_template_directory_uri() . '/js/searchshow.js', array( 'jquery' ) );
	wp_enqueue_script( 'el_capitan-ordershow', get_template_directory_uri() . '/js/ordershow.js', array( 'jquery' ) );
	wp_localize_script( 'el_capitan-ordershow', 'el_capitan_ordershow', 
																			array( 
																					'nonce' => wp_create_nonce("el_capitan_order"),
																					'ajaxURL' => admin_url("admin-ajax.php")
																				)
					);
	wp_enqueue_script( 'el_capitan-widget-masonry', get_template_directory_uri() . '/js/widgetmasonry.js', array( 'jquery' ) );
	wp_enqueue_script( 'jquery-effects-core', array( 'jQuery' ) );
	wp_enqueue_script( 'masonry', array( 'jQuery' ) );
	wp_enqueue_script( 'jquery-effects-slide', array( 'jQuery-effects-core' ) );
	if ( is_singular() ) wp_enqueue_script( "comment-reply" );
	
}
add_action( 'wp_enqueue_scripts', 'el_capitan_scripts' );
 
function el_capitan_filter_head() {
	if(!is_single() && !is_page()){
		remove_action('wp_head', '_admin_bar_bump_cb');
	}
}
add_action('get_header', 'el_capitan_filter_head');
 
function el_capitan_alter_query($query) {

	global $wp_query;
	
	if(!is_search()){
	
		switch(get_theme_mod("home_page")){
			case "four" : $query-> set('posts_per_page', 4); break;
			case "six" : $query-> set('posts_per_page', 6); break;
			case "eight" : $query-> set('posts_per_page', 8); break;
			case "nine" : $query-> set('posts_per_page', 9); break;
			case "ten" : $query-> set('posts_per_page', 10); break;
			case "fourteen" : $query-> set('posts_per_page', 14); break;
			case "twenty" : $query-> set('posts_per_page', 20); break;
			case "twentyfive" : $query-> set('posts_per_page', 25); break;
		}
	
	}
	
	remove_all_actions ( '__after_loop');
}
add_action('pre_get_posts','el_capitan_alter_query');
 
function el_capitan_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}

function el_capitan_extra_style(){

	?><style>
	
		html{
			background-color: <?PHP echo get_theme_mod('site_allsite_background_colour'); ?>;
			color: <?PHP echo get_theme_mod('site_alltext_colour'); ?>;
		}
		
		aside.masonry{
			border-top: 5px solid <?PHP echo get_theme_mod('site_alltext_colour'); ?>;
		}
		
		h1,h2,h3,h4,h5,h6{
			color: <?PHP echo get_theme_mod('site_alltext_colour'); ?>;
		}
		
		.picmenu a{
			color :  <?PHP echo get_theme_mod('site_alllink_colour'); ?>;
		}
		
		.single article{
			background-color: <?PHP echo get_theme_mod('site_post_background_colour'); ?>;
		}
		
		#searchform form input[type=text],
		#commentform input[type=text],
		#commentform input[type=email],
		#commentform input[type=url],
		textarea{
			-webkit-box-shadow: inset 4px 4px 19px -3px rgba(<?PHP echo $hex[0] . "," . $hex[1] . "," . $hex[2]; ?>, 0.75);
			-moz-box-shadow:    inset 4px 4px 19px -3px rgba(<?PHP echo $hex[0] . "," . $hex[1] . "," . $hex[2]; ?>, 0.75);
			box-shadow:         inset 4px 4px 19px -3px rgba(<?PHP echo $hex[0] . "," . $hex[1] . "," . $hex[2]; ?>, 0.75);
			background-color: <?PHP echo get_theme_mod('site_menu_background_colour'); ?>;
		}
		
		header#masthead{
			background-color: <?PHP echo get_theme_mod('site_header_colour'); ?>; 
		}		
		
		#main article h1,
		#main article h2,
		#main article h3,
		#main article h4,
		#main article h5,
		#main article h6{
			color: <?PHP echo get_theme_mod('site_post_text_colour'); ?>;
		}

		a{
			color: <?PHP echo get_theme_mod('site_alllink_colour'); ?>;
		}
		
		.single #main a{
			color: <?PHP echo get_theme_mod('site_post_link_colour'); ?>;
		}

		.single #main{
			color: <?PHP echo get_theme_mod('site_post_text_colour'); ?>;
		}
				
		button,
		input[type=submit]{
			background-color:  <?PHP echo get_theme_mod("site_button_colour"); ?>;
			color:  <?PHP echo get_theme_mod("site_button_text_colour"); ?>;
		}
		
		<?PHP
			$colour_1 = get_theme_mod('site_allsite_background_colour');
			$colour_2 = get_theme_mod('site_alltext_colour'); 
			$colour_3 = get_theme_mod('site_alllink_colour');
		?>
		
		.cubes{
			width:100%; height:100%; 
			background-color:<?PHP echo $colour_1; ?>;
			background-image: linear-gradient(30deg, <?PHP echo $colour_2; ?> 12%, transparent 12.5%, transparent 87%, <?PHP echo $colour_2; ?> 87.5%, <?PHP echo $colour_2; ?>),
			linear-gradient(150deg, <?PHP echo $colour_2; ?> 12%, transparent 12.5%, transparent 87%, <?PHP echo $colour_2; ?> 87.5%, <?PHP echo $colour_2; ?>),
			linear-gradient(30deg, <?PHP echo $colour_2; ?> 12%, transparent 12.5%, transparent 87%, <?PHP echo $colour_2; ?> 87.5%, <?PHP echo $colour_2; ?>),
			linear-gradient(150deg, <?PHP echo $colour_2; ?> 12%, transparent 12.5%, transparent 87%, <?PHP echo $colour_2; ?> 87.5%, <?PHP echo $colour_2; ?>),
			linear-gradient(60deg, <?PHP echo  $colour_3; ?> 25%, transparent 25.5%, transparent 75%, <?PHP echo  $colour_3; ?> 75%, <?PHP echo  $colour_3; ?>), 
			linear-gradient(60deg, <?PHP echo  $colour_3; ?> 25%, transparent 25.5%, transparent 75%, <?PHP echo  $colour_3; ?> 75%, <?PHP echo  $colour_3; ?>);
			background-size:80px 140px;
			background-position: 0 0, 0 0, 40px 70px, 40px 70px, 0 0, 40px 70px;
		}

		.stars{
			height:100%;
			width:100%;
			background:
			linear-gradient(324deg, <?PHP echo $colour_1; ?> 4%,   transparent 4%) -70px 43px,
			linear-gradient( 36deg, <?PHP echo $colour_1; ?> 4%,   transparent 4%) 30px 43px,
			linear-gradient( 72deg, <?PHP echo $colour_2; ?> 8.5%, transparent 8.5%) 30px 43px,
			linear-gradient(288deg, <?PHP echo $colour_2; ?> 8.5%, transparent 8.5%) -70px 43px,
			linear-gradient(216deg, <?PHP echo $colour_2; ?> 7.5%, transparent 7.5%) -70px 23px,
			linear-gradient(144deg, <?PHP echo $colour_2; ?> 7.5%, transparent 7.5%) 30px 23px,

			linear-gradient(324deg, <?PHP echo $colour_1; ?> 4%,   transparent 4%) -20px 93px,
			linear-gradient( 36deg, <?PHP echo $colour_1; ?> 4%,   transparent 4%) 80px 93px,
			linear-gradient( 72deg, <?PHP echo $colour_2; ?> 8.5%, transparent 8.5%) 80px 93px,
			linear-gradient(288deg, <?PHP echo $colour_2; ?> 8.5%, transparent 8.5%) -20px 93px,
			linear-gradient(216deg, <?PHP echo $colour_2; ?> 7.5%, transparent 7.5%) -20px 73px,
			linear-gradient(144deg, <?PHP echo $colour_2; ?> 7.5%, transparent 7.5%) 80px 73px;
			background-color: <?PHP echo $colour_1; ?>;
			background-size: 100px 100px;
			background-size: 100px 100px;
		}

		.arrows{
			height:100%;
			width: 100%;
			background:
			linear-gradient(45deg, <?PHP echo $colour_2; ?> 45px, transparent 45px)64px 64px,
			linear-gradient(45deg, <?PHP echo $colour_2; ?> 45px, transparent 45px,transparent 91px, <?PHP echo $colour_1; ?> 91px, <?PHP echo $colour_1; ?> 135px, transparent 135px),
			linear-gradient(-45deg, <?PHP echo $colour_2; ?> 23px, transparent 23px, transparent 68px,<?PHP echo $colour_2; ?> 68px,<?PHP echo $colour_2; ?> 113px,transparent 113px,transparent 158px,<?PHP echo $colour_2; ?> 158px);
			background-color:<?PHP echo $colour_1; ?>;
			background-size: 128px 128px;
 		}

		.stairs{
			height:100%;
			width: 100%;
			background: 
			linear-gradient(63deg, <?PHP echo $colour_2; ?> 23%, transparent 23%) 7px 0, 
			linear-gradient(63deg, transparent 74%, <?PHP echo $colour_2; ?> 78%), 
			linear-gradient(63deg, transparent 34%, <?PHP echo $colour_2; ?> 38%, <?PHP echo $colour_2; ?> 58%, transparent 62%), 
			<?PHP echo $colour_1; ?>;
			background-size: 16px 48px;
		}

		.grid{	
			height:100%;
			width: 100%;
			background-color: <?PHP echo $colour_1; ?>;
			background-image: linear-gradient(45deg, <?PHP echo $colour_2 ?> 25%, transparent 25%, transparent 75%, <?PHP echo $colour_2 ?> 75%, <?PHP echo $colour_2 ?>), 
			linear-gradient(-45deg, <?PHP echo $colour_2 ?> 25%, transparent 25%, transparent 75%, <?PHP echo $colour_2 ?> 75%, <?PHP echo $colour_2 ?>);
			background-size:60px 60px;
		}

		.gridother{
			height:100%;
			width: 100%;
			background-color: <?PHP echo $colour_1; ?>;
			background-image: linear-gradient(45deg, <?PHP echo $colour_2 ?> 25%, transparent 25%, transparent 75%, <?PHP echo $colour_2 ?> 75%, <?PHP echo $colour_2 ?>), 
			linear-gradient(45deg, <?PHP echo $colour_2 ?> 25%, transparent 25%, transparent 75%, <?PHP echo $colour_2 ?> 75%, <?PHP echo $colour_2 ?>);
			background-size:60px 60px;
			background-position:0 0, 30px 30px
		}
		
	</style><?PHP

}
add_action("wp_head", "el_capitan_extra_style");

function el_capitan_init(){

	session_start();

	if(!get_option("el_capitan_setup_theme")){
	
		set_theme_mod('site_allsite_background_colour','#000000');
		set_theme_mod('site_alllink_colour','#ffffff');
		set_theme_mod('site_alllink_hover_colour','#ff0000');
		set_theme_mod('site_post_background_colour','#ffffff');
		set_theme_mod('site_post_text_colour','#000000');
		set_theme_mod('site_post_link_colour','#ff0000');
		set_theme_mod('site_alltext_colour','#eeeeee');
		set_theme_mod('site_button_colour','#ffffff');
		set_theme_mod('site_button_text_colour','#000000');
		set_theme_mod('pagination','on');
		set_theme_mod('search','on');
		set_theme_mod('author','on');
		set_theme_mod('comments','on');
		set_theme_mod('page-navigation','on');
		set_theme_mod('home_page','fourteen');

		add_option("el_capitan_setup_theme", 1);
	
	}

}
add_action("init", "el_capitan_init");

function el_capitan_alter_query_order($query) {

	if(isset($_SESSION['order'])){

		global $wp_query;

		$data = explode("_", $_SESSION['order']);

		$query->set('orderby', array($data[0] => $data[1]));
	
		remove_all_actions ( '__after_loop');
	
	}
	
}
add_action('pre_get_posts','el_capitan_alter_query_order');

require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/reorder.php';
