<?php

class Input {

	function get($label, $default = ''){
		
		if(!isset($_GET[$label]))
			return $default;
		else
			return $_GET[$label];
		
	}
	
}

?>
