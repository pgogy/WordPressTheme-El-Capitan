jQuery(document).ready( function(){
	jQuery( "#paginationshow a" )
		.each(
			function(index,value){
			
				jQuery(value)
					.on("click", function() {
					
						if(jQuery( "#searchholder" ).is(":visible")){
							jQuery( "#searchholder" ).fadeOut(500);
						}
					
						if(!jQuery( "#paginationholder" ).is(":visible")){
							jQuery( "#paginationholder" ).fadeIn(500);
						}else{
							jQuery( "#paginationholder" ).fadeOut(500);
						}
						
						event.stopPropagation();
						
					});
			}
		)		
});

console.log("loaded");