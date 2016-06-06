<?PHP

	if(get_theme_mod("search")=="on"){

	?><form action="<?PHP echo home_url(); ?>" method="GET">
			<input type="text" class='el-capitan_search_box' name="s" value="<?PHP __("Search....", "el-capitan"); ?>" />
			<br />
			<input type="submit" value="<?PHP echo __("search", "el-capitan"); ?>" />
		</form>
	<?PHP
	
	}
	
?>