<?PHP

if(get_theme_mod("pagination")=="on"){

	$links = paginate_links( array( "prev_text" => _x("Previous", "Before this one", "el-capitan"), "next_text" => _x("Next", "After this one", "el-capitan") ));
		
		if($links!=""){	

	?>
	<div id="paginationshow"><a><i class="fa fa-book" aria-hidden="true"></i></a></div>
	<div id="paginationholder">
		<?PHP
			get_template_part( 'parts/pagination/pagination');
		?>
	</div><?PHP
	}

}

