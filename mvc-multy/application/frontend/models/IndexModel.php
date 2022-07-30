<?php
class IndexModel extends Model{
	public function __construct(){
		parent::__construct();
		$this->setTable('rss');
	}
	
	public function listItems($params, $option = ''){
		$query[]     = "SELECT *";
        $query[]     = "FROM `$this->table`";
		$query[]	 = "WHERE `id`>0";

		if(isset($params['search']) &&  !empty(trim($params['search']))){
			$searchValue = trim($params['search']);
			$query[] =  "AND `link`LIKE '%$searchValue%'";
		};
		if($option['task'] == 'rss-items') $query[] =  "AND `status`='active' ORDER BY `ordering` ASC";


		$query        = implode(" ", $query);
        $result        = $this->listRecord($query);
        return $result;
	}
}