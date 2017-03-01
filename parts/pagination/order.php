<?PHP

	if(true){
			?><footer class="page-footer">
				<select name="post_order" id="post_order">
					<option value="title_ASC"><?PHP echo __("Name - Alphabetical"); ?></option>
					<option value="title_DESC"><?PHP echo __("Name - Reverse Alphabetical"); ?></option>
					<option value="date_ASC"><?PHP echo __("Date - newest first"); ?></option>
					<option value="date_DESC"><?PHP echo __("Date - oldest first"); ?></option>
					<option value="ID_ASC"><?PHP echo __("Recent First"); ?></option>
					<option value="ID_DESC"><?PHP echo __("Recent Last"); ?></option>
				</select>
			</footer><?PHP		
	}
