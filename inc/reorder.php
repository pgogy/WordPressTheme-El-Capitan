<?PHP
	
	class elcapitanReOrder{
	
		function __construct(){
			add_action("wp_ajax_nopriv_elcapitan_reorder", array($this, "reorder"));
			add_action("wp_ajax_elcapitan_reorder", array($this, "reorder"));
		}

		function reorder(){
		
			if(wp_verify_nonce($_POST['nonce'], "el_capitan_order"))
			{
				$_SESSION['order'] = $_POST['data'];
				echo "changed";
			}
			wp_die();
		
		}
	
	}
	
	$elcapitanReOrder = new elcapitanReOrder();
	