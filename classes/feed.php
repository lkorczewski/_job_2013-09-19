<?php

require_once __DIR__ . '/feed_item.php';

class Feed {
	
	public $rss;
	public $items;
	
	public function __construct($link){
		$this->rss = simplexml_load_file('http://xlab.pl/feed/');
		
		$namespace_prefix = 'content';
		$namespace_string = 'http://purl.org/rss/1.0/modules/content/';
		$this->rss->registerXPathNamespace($namespace_prefix, $namespace_string);
		
		$namespace_prefix = 'dc';
		$namespace_string = 'http://purl.org/dc/elements/1.1/';
		$this->rss->registerXPathNamespace($namespace_prefix, $namespace_string);
		
		$this->items = array();
		foreach($this->rss->channel->item as $source_item){
			$item = new Feed_Item();
			$item->set_title($source_item->title);
			$item->set_creator($source_item->xpath('dc:creator')[0]);
			$item->set_publication_date($source_item->pubDate);
			$item->set_description($source_item->description);
			$item->set_content($source_item->xpath('content:encoded')[0]);
			$this->items[] = $item;
		}
		
	}
	
	public function search($keyword){
		$filtered_items = array();
		
		foreach($this->items as $item){
			$regex = '/.*' . preg_quote($keyword, '/') . '.*/';
			if(preg_match($regex, $item->get_description())){
				$filtered_items[] = $item;
			}
		}
		
		return $filtered_items;
	}
	
}

?>
