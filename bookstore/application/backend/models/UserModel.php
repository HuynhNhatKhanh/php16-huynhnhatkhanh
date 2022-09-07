<?php
class UserModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTable(TB_USER);
	}

	public function countItem($params, $option = null){
	
		$query[]	= "SELECT `$this->table`.`status`, COUNT(`$this->table`.`id`) AS `count`";
		$query[]	= "FROM `$this->table`";
		$query[]    = "LEFT JOIN `group`";
		$query[]    = "ON `$this->table`.`group_id` = `group`.`id`";
		$query[]	= "WHERE `$this->table`.`id` > 0";
		if(isset(($params['filter_groupacp'])) && ($params['filter_groupacp']) != 'default'){
			$filterGroupAcp = $params['filter_groupacp'];
			$query[] = "AND `group_acp` = '$filterGroupAcp'";
		}
		if (isset($params['search']) && !empty(trim($params['search']))) {
			$searchValue = trim($params['search']);
			$query[]     = "AND `username` LIKE '%$searchValue%'";
			$query[]     = "OR `fullname` LIKE '%$searchValue%'";
			$query[]     = "OR `email` LIKE '%$searchValue%'";
		}
		$query[]	= "GROUP BY `status`";
		$query		= implode(" ", $query);

		// echo $query;
		// die();

		$result		= $this->listRecord($query);
		$result		= array_combine(array_column($result, 'status'), array_column($result, 'count'));
		$result	    = ['all' => array_sum($result)] + $result;
		return $result;
	}

	public function listItems($params, $option = null)
	{
		if($option == 'select-all'){
			$query[] = "SELECT DISTINCT `$this->table`.`group_id`, `$this->table`.`id`,`$this->table`.`username`, `$this->table`.`email`,`$this->table`.`fullname`, `$this->table`.`password`, `$this->table`.`created`, `$this->table`.`created_by`, `$this->table`.`modified`, `$this->table`.`modified_by`, `$this->table`.`status`, `$this->table`.`group_acp`, `$this->table`.`ordering`, `group`.`name`";
			$query[]     = "FROM `$this->table`";
			$query[]     = "LEFT JOIN `group`";
			$query[]     = "ON `$this->table`.`group_id` = `group`.`id`";
			$query[]     = "WHERE `$this->table`.`id` > 0";
			
			if (isset(($params['filter_groupacp'])) && ($params['filter_groupacp']) != 'default') {
				$filterGroupAcp = $params['filter_groupacp'];
				$query[] = "AND `group_acp` = '$filterGroupAcp'";
			}
			if (isset($params['filter_status']) && $params['filter_status'] != 'all') {
				$statusValue = $params['filter_status'];
				$query[]     = "AND `status`='$statusValue' ";
			}
			if (isset($params['search']) && !empty(trim($params['search']))) {
				$searchValue = trim($params['search']);
				$query[]     = "AND `username` LIKE '%$searchValue%'";
				$query[]     = "OR `fullname` LIKE '%$searchValue%'";
				$query[]     = "OR `email` LIKE '%$searchValue%'";
			}

			//PAGINATION
			$pagination			= $params['pagination'];
			$totalItemsPerPage	= $pagination['totalItemsPerPage'];
			if($totalItemsPerPage > 0){
				$position	= ($pagination['currentPage']-1)*$totalItemsPerPage;
				$query[]	= "LIMIT $position, $totalItemsPerPage";
			}

			$query        = implode(" ", $query);
			// echo $query;
			// die();
			$result        = $this->listRecord($query);
			return $result;
		}
		if($option == 'get-groupid-name'){
			$query[] = "SELECT DISTINCT `$this->table`.`group_id`, `group`.`name`";
			$query[]     = "FROM `$this->table`";
			$query[]     = "LEFT JOIN `group`";
			$query[]     = "ON `$this->table`.`group_id` = `group`.`id`";
			$query[]     = "WHERE `$this->table`.`id` > 0";
			$query        = implode(" ", $query);
			// echo $query;
			// die();
			$result        = $this->listRecord($query);
			$result		= array_combine(array_column($result, 'group_id'), array_column($result, 'name'));
			//$result	    = ['all' => array_sum($result)] + $result;
			return $result;
		}
	}

	public function changeStatus($params)
	{
		$id = $params['id'];
		$status = ($params['status'] == 'active') ?  'inactive' : 'active';
		$query = "UPDATE `$this->table` SET `status` = '$status' WHERE  `id` = '$id'";
		$this->query($query);
		if ($this->affectedRows()) {
			return HelperBackend::showItemStatus($params['module'],$params['controller'], $id, $status);
			Session::set('message', NOTICE_UPDATE_STATUS_SUCCESS);
		}
	}
	public function changeGroupAcp($params)
	{
		$id = $params['id'];
		$groupAcp = ($params['groupAcp'] == 'yes') ?  'no' : 'yes';
		$query = "UPDATE `$this->table` SET `group_acp` = '$groupAcp' WHERE  `id` = '$id'";
		$this->query($query);
		if ($this->affectedRows()) {
			Session::set('message', NOTICE_UPDATE_GROUP_SUCCESS);
		}
	}
	public function deleteItem($params)
	{
		if (isset($params['ckid'])) {
			$ids = $params['ckid'];
		} else {
			$ids = [$params['id']];
		}
		$this->delete($ids);
		if ($this->affectedRows()) {
			Session::set('message', NOTICE_DELETE_SUCCESS);
		}
	}
	public function saveItems($params, $option = null)
	{
		if ($option['task'] == 'add') {
			$params['created'] = date('Y-m-d H:i:s');
			$params['created_by'] = 'dev';
			$this->insert($params);
			if ($this->affectedRows()) {
				Session::set('message', NOTICE_ADD_ITEM_SUCCESS);
			}
		}
		if ($option['task'] == 'edit') {
			$params['modified'] = date('Y-m-d H:i:s');
			$params['modified_by'] = 'dev';
			$id = $params['id'];
			unset($params['id']);
			$this->update($params, [['id', $id]]);
			if ($this->affectedRows()) {
				Session::set('message', NOTICE_UPDATE_ITEM_SUCCESS);
			}
		}
	}
	public function getItem($params)
	{
		$query = "SELECT `$this->table`.`id`,`$this->table`.`username`, `$this->table`.`fullname`, `$this->table`.`email`, `$this->table`.`password`, `$this->table`.`status`,`$this->table`.`group_acp` 
		FROM `$this->table` 
		WHERE `id` = {$params['id']}";
		$result = $this->singleRecord($query);
		return $result;
	}

	public function statusAction($params, $options = null)
	{
		$ids = implode(',', $params['ckid']);
		$status = $params['action'];
		$query = "UPDATE `$this->table` SET `status` = '$status' WHERE  `id` IN ({$ids})";
		$this->query($query);
		if ($this->affectedRows()) {
			Session::set('message', NOTICE_UPDATE_STATUS_SUCCESS);
		}
	}
}
