<?php
class RssModel extends Model{
	public function __construct(){
		parent::__construct();
		$this->setTable('rss');
	}
	
	public function listItems($params){
		$query[]     = "SELECT *";
        $query[]     = "FROM `$this->table`";

		if(isset($params['search']) &&  !empty(trim($params['search']))){
			$searchValue = trim($params['search']);
			$query[] =  "WHERE `link`LIKE '%$searchValue%'";
		};

		$query        = implode(" ", $query);
        $result        = $this->listRecord($query);
        return $result;
	}
	public function changeStatus($params){
		$status = ($params['status'] == 'active') ? 'inactive' : 'active';
		$this->update(['status' => $status], [['id' , $params['id']]]);
		
	}
	public function deleteItem($params){
		$this->delete([ $params['id']]);
	}
	public function saveItems($params, $option = null){
		if($option['task'] == 'add'){
			$params['created_at'] = date('Y-m-d H:i:s');
			$this->insert($params);
		}
		if($option['task'] == 'edit'){
			$params['updated_at'] = date('Y-m-d H:i:s');
			$id = $params['id'];
			unset($params['id']);
			$this->update($params,[['id',$id]]);
		}
	}
	public function getItem($params){
		$query ="SELECT `id`,`link`, `status`,`ordering` FROM `$this->table` WHERE `id` = {$params['id']}";
        $result = $this->singleRecord($query);
		return $result;
    }
}