jQuery(document).ready( function(){
	jQuery( "#ordershow a" )
		.each(
			function(index,value){
			
				jQuery(value)
					.on("click", function() {
					
						if(jQuery( "#searchholder" ).is(":visible")){
							jQuery( "#searchholder" ).fadeOut(500);
						}
						
						if(jQuery( "#paginationholder" ).is(":visible")){
							jQuery( "#paginationholder" ).fadeOut(500);
						}
					
						if(!jQuery( "#orderholder" ).is(":visible")){
							jQuery( "#orderholder" ).fadeIn(500);
						}else{
							jQuery( "#orderholder" ).fadeOut(500);
						}
						
						event.stopPropagation();
						
					});
			}
		)	

	jQuery( "#post_order" )
		.change(
			function(){
			
				var data = {
							'action': 'elcapitan_reorder',
							'data': jQuery("#post_order").val(),
							'nonce': el_capitan_ordershow.nonce
						};
						
				jQuery.post(el_capitan_ordershow.ajaxURL, data, function(response) {

						if(response=="changed"){
							location.reload();
						}
						
					}
				);
			
			}
		)	
	
});