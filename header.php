<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<?PHP
	get_template_part( 'parts/header/main');
?>
<body <?php body_class(); ?>>
	<?PHP 
		if(!is_home()){
	?>
	<div id="homeshow"><a href="<?PHP echo site_url(); ?>"><i class="fa fa-home" aria-hidden="true"></i></a></div>
	<?PHP
		}
		if(get_theme_mod("search")=="on"){
	?>
	<div id="searchshow"><a><i class="fa fa-search" aria-hidden="true"></i></a></div>
	<div id="searchholder">
		<?PHP
			get_template_part( 'parts/search-form/standard');
		?>
	</div>
	<?PHP
		}
		
		if(true){
	?>
	<div id="ordershow"><a><i class="fa fa-arrows-v" aria-hidden="true"></i></a></div>
	<div id="orderholder">
		<?PHP
			get_template_part( 'parts/pagination/order');
		?>
	</div>
	<?PHP
		}
	?>
	<div id="page" class="hfeed site">
		<div id="content" class="site-content">
