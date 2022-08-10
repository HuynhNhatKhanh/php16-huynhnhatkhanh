<?php
class GroupModel extends Model{
	public function __construct(){
		parent::__construct();
        $this->setTable(TB_GROUP);
	}
	
	public function listItems($params){
		$query[] = "SELECT `id`, `name`, `group_acp`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`";
		$query[]     = "FROM `$this->table`";
		if (isset($params['search']) && !empty(trim($params['search']))) {
            $searchValue = trim($params['search']);
            $query[]     = "WHERE 
			 `name` LIKE '%$searchValue%'";
        }
		$query        = implode(" ", $query);
		$result        = $this->listRecord($query);
        return $result;
	}

	public function changeStatus($params){
		$id = $params['id'];
        $status = ($params['status'] == 'active') ?  'inactive' : 'active';
		$query = "UPDATE `$this->table` SET `status` = '$status' WHERE  `id` = '$id'";
		$this->query($query);
	}
	public function changeGroupAcp($params){
		$id = $params['id'];
        $groupAcp = ($params['groupAcp'] == 'yes') ?  'no' : 'yes';
		$query = "UPDATE `$this->table` SET `group_acp` = '$groupAcp' WHERE  `id` = '$id'";
		$this->query($query);
	}
	public function deleteItem($params){
		$id = $params['id'];
		$this->delete([$id]);
	}
}
//`id`, `name`, `group_acp`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`