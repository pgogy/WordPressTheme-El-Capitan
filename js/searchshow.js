jQuery(document).ready( function(){
	jQuery( "#searchshow a" )
		.each(
			function(index,value){
			
				jQuery(value)
					.on("click", function() {
					
						if(jQuery( "#searchholder" ).is(":visible")){
							jQuery( "#searchholder" ).fadeOut(500);
						}
					
						if(!jQuery( "#searchholder" ).is(":visible")){
							jQuery( "#searchholder" ).fadeIn(500);
						}else{
							jQuery( "#searchholder" ).fadeOut(500);
						}
						
						event.stopPropagation();
						
					});
			}
		)		
});

console.log("loaded");