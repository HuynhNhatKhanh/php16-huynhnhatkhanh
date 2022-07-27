<?php
class RssModel extends Model{
	public function __construct(){
		parent::__construct();
		$this->setTable('rss');
	}
	
	public function listItems(){
		echo '<h3> hello </h3>';
	}
}