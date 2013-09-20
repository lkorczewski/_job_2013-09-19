<?php

class Layout {
	
	public $parameters;
	
	public function set_parameters($parameters){
		
		$this->parameters = $parameters;
		
	}
	
	private function get_parameter($label){
		
		if(!isset($this->parameters[$label]))
			return '';
		
		return $this->parameters[$label];
	}
	
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
		echo '<div class="feed_meta"><span class="feed_meta_label">Feed:</span> ' . $this->get_parameter('location') . '</div>';
		echo '<form class="input_form" method="get">';
		echo '<input' .
			' class="phrase_input"' .
			' type="text" name="keyword"' .
			' placeholder="wpisz wyszukiwane słowo..."' .
			" value=\"{$this->get_parameter('keyword')}\"" .
			'>' .
			'</input>';
		echo '<input class="submit_button" type="submit" value="szukaj"></input>';
		echo '</form>';
		echo '</div>';
		
		// news items
		
		foreach($items as $item){
			echo '<div class="item">';
			echo '<div class="item_title">' . $item->get_title() . '</div>';
			echo '<div class="item_meta">' . $item->get_creator() . ', ' . $item->get_publication_date() . '</div>';
			echo '<div class="item_content">' . $item->get_content() . '</div>';
			echo '</div>';
		}
		
		// layout end
		
		echo '</body>';
		echo '</html>';
		
	}
	
}

?>
