<?PHP

if(get_theme_mod("pagination")=="on"){
?>
<div id="paginationshow"><a><i class="fa fa-book" aria-hidden="true"></i></a></div>
<div id="paginationholder">
	<?PHP
		get_template_part( 'parts/pagination/pagination');
	?>
</div><?PHP
}

