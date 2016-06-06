jQuery(document).ready( function(){
	
	jQuery("#close")
		.on("click", function() {
						
						jQuery("#lightbox")
							.fadeOut(500);
				}
			);
	
	jQuery( ".piclightbox" )
		.each(
			function(index,value){

				jQuery(value)
					.on("click", function() {
						
						jQuery("#lightbox #holder")
							.css("background-image", jQuery(value).parent().parent().children().first().css("background-image"));

						counter = 0;
						
						while(jQuery(value).parent().parent().children().first().attr("background_" + counter)!=undefined){
							jQuery("#lightbox #holder")
								.attr("background_" + counter, jQuery(value).parent().parent().children().first().attr("background_" + counter));
							counter+=1;
						}

						jQuery("#lightbox")
							.fadeIn(500);

						event.stopPropagation();
						
					});
			}
		)		
});