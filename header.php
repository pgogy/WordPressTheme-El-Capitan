<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<?PHP
	get_template_part( 'parts/header/main');
?>
<body <?php body_class(el_capitan_body_class()); ?>>
	<div id="lightbox"><div id="holder" class="album_div"></div><div id="close"><a><i class="fa fa-times" aria-hidden="true"></i></a></div></div>
	<div id="homeshow"><a href="<?PHP echo site_url(); ?>"><i class="fa fa-home" aria-hidden="true"></i></a></div>
	<div id="searchshow"><a><i class="fa fa-search" aria-hidden="true"></i></a></div>
	<div id="searchholder">
		<?PHP
			get_template_part( 'parts/search-form/standard');
		?>
	</div>
	<div id="page" class="hfeed site">
		<div id="content" class="site-content">
