<?php

class Layout {
	
	public function apply_to($items){
		
		// layout begining
		
		echo '<html>';
		echo '<head>';
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
		echo '<style type="text/css" media="all">';
		echo '  @import url("styles/main.css");';
		echo '</style>';
		echo '</head>';
		echo '<body>';
		
		// header
		
		echo '<div class="header_container">';
		echo '<h1>Przeszukiwanie feedu RSS</h1>';
		echo '<form class="input_form" method="get">';
		echo '<input type="text" name="keyword" autofocus="autofocus" placeholder="wpisz wyszukiwane słowo..."></input>';
		echo '<input type="submit" value="szukaj"></input>';
		echo '</form>';
		echo '</div>';
		
		// news items
		
		foreach($items as $item){
			echo '<div class="item">';
			echo '<div class="item_title">' . $item['title'] . '</div>';
			echo '<div class="item_meta">' . $item['creator'] . ', ' . $item['publication_date'] . '</div>';
			echo '<div class="item_content">' . $item['content'] . '</div>';
			echo '</div>';
		}
		
		// layout end
		
		echo '</body>';
		echo '</html>';
		
	}
	
}

?>
