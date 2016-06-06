jQuery(document).ready( function(){
	jQuery( ".album_div" )
		.each(
			function(index,value){

				jQuery(value)
					.on("click", function() {
					
						jQuery( value )
							.fadeOut(200, function(){
								
								if(jQuery(value).attr("background_" + (parseInt(jQuery(value).attr("current_img"))+1))!=undefined){
									next_img = jQuery(value).attr("background_" + (parseInt(jQuery(value).attr("current_img"))+1)); 
									jQuery(value).attr("current_img", parseInt(jQuery(value).attr("current_img"))+1);
								}else{
									next_img = jQuery(value).attr("background_0");
									jQuery(value).attr("current_img", 0);
								}
								
								jQuery(value)
									.css("background-image","url(" + next_img + ")");
								
								jQuery(value)
									.fadeIn(200);
								
							}
						);

						event.stopPropagation();
						
					});
			}
		)		
});