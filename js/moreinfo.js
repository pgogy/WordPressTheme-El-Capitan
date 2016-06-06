jQuery(document).ready( function(){
	
	jQuery( ".picinfo" )
		.each(
			function(index,value){

				jQuery(value)
					.on("click", function() {
						
						if(!jQuery(value).parent().parent().children().first().next().is(":visible")){
							jQuery(value).parent().parent().children().first().next().fadeIn(500);
						}else{
							jQuery(value).parent().parent().children().first().next().fadeOut(500);
						}
						event.stopPropagation();
						
					});
			}
		)		
});