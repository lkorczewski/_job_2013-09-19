<?php

class Feed_Item {
	
	private $title;
	private $creator;
	private $publication_date;
	private $description;
	private $content;
	
	//-----------------------------------------------
	// title management
	//-----------------------------------------------
	
	public function set_title($title){
		$this->title = $title;
	}
	
	public function get_title(){
		return $this->title;
	}
	
	//-----------------------------------------------
	// creator management
	//-----------------------------------------------
	
	public function set_creator($creator){
		$this->creator = $creator;	
	}
	
	public function get_creator(){
		return $this->creator;
	}
	
	//-----------------------------------------------
	// publication date management
	//-----------------------------------------------
	
	public function set_publication_date($publication_date){
		$this->publication_date = $publication_date;
	}
	
	public function get_publication_date(){
		return $this->publication_date;
	}
	
	//-----------------------------------------------
	// description management
	//-----------------------------------------------
	
	public function set_description($description){
		$this->description = $description;
	}
	
	public function get_description(){
		return $this->description;;
	}
	
	//-----------------------------------------------
	// content management
	//-----------------------------------------------
	
	public function set_content($content){
		$this->content = $content;
	}
	
	public function get_content(){
		return $this->content;
	}
	
}

?>
