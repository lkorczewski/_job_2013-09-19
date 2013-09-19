<?php

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
		
		foreach($this->rss->channel->item as $source_item){
			$item = array();
			$item['title']             = $source_item->title;
			$item['creator']           = $source_item->xpath('dc:creator')[0];
			$item['publication_date']  = $source_item->pubDate;
			$item['content']           = $source_item->xpath('content:encoded')[0];
			$this->items[] = $item;
		}
		
	}
	
	public function search($keyword){
		$filtered_items = array();
		
		foreach($this->items as $item){
			$regex = '/.*' . preg_quote($keyword, '/') . '.*/';
			if(preg_match($regex, $item['content'])){
				$filtered_items[] = $item;
			}
		}
		
		return $filtered_items;
	}
	
}

?>
