<?php
class UserModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTable(TB_USER);
	}

	public function countItem($params, $option = null){
	
		$query[]	= "SELECT `u`.`status`, COUNT(`u`.`id`) AS `count`";
		$query[]	= "FROM `$this->table` AS `u`";
		$query[]    = "LEFT JOIN `group` AS `g`";
		$query[]    = "ON `u`.`group_id` = `g`.`id`";
		$query[]	= "WHERE `u`.`id` > 0";
		if(isset(($params['filter_groupid'])) && ($params['filter_groupid']) != 'default'){
			$filterGroupId = $params['filter_groupid'];
			$query[] = "AND `group_id` = '$filterGroupId'";
		}
		if (isset($params['search']) && !empty(trim($params['search']))) {
			$searchValue = trim($params['search']);
			$query[]     = "AND `u`.`username` LIKE '%$searchValue%'";
			$query[]     = "OR `u`.`fullname` LIKE '%$searchValue%'";
			$query[]     = "OR `u`.`email` LIKE '%$searchValue%'";
		}
		$query[]	= "GROUP BY `u`.`status`";
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
			$query[] = "SELECT DISTINCT `u`.`group_id`, `u`.`id`,`u`.`username`, `u`.`email`,`u`.`fullname`, `u`.`password`, `u`.`created`, `u`.`created_by`, `u`.`modified`, `u`.`modified_by`, `u`.`status`, `u`.`ordering`, `g`.`name`";
			$query[]     = "FROM `$this->table` AS `u`";
			$query[]     = "LEFT JOIN `group` AS `g`";
			$query[]     = "ON `u`.`group_id` = `g`.`id`";
			$query[]     = "WHERE `u`.`id` > 0";
			
			if (isset(($params['filter_groupid'])) && ($params['filter_groupid']) != 'default') {
				$filterGroupId = $params['filter_groupid'];
				$query[] = "AND `group_id` = '$filterGroupId'";
			}
			if (isset($params['filter_status']) && $params['filter_status'] != 'all') {
				$statusValue = $params['filter_status'];
				$query[]     = "AND `u`.`status`='$statusValue' ";
			}
			if (isset($params['search']) && !empty(trim($params['search']))) {
				$searchValue = trim($params['search']);
				$query[]     = "AND `u`.`username` LIKE '%$searchValue%'";
				$query[]     = "OR `u`.`fullname` LIKE '%$searchValue%'";
				$query[]     = "OR `u`.`email` LIKE '%$searchValue%'";
			}

			$query[] = "ORDER BY `u`.`id` DESC ";

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
			$query[] 	= "SELECT DISTINCT `u`.`group_id`, `g`.`name`";
			$query[]     = "FROM `$this->table` AS `u`";
			$query[]     = "LEFT JOIN `group` AS `g`";
			$query[]     = "ON `u`.`group_id` = `g`.`id`";
			$query[]     = "WHERE `u`.`id` > 0";
			$query        = implode(" ", $query);
			// echo $query;
			// die();
			$result        = $this->listRecord($query);
			$result		= array_combine(array_column($result, 'group_id'), array_column($result, 'name'));
			$result['default'] = '- Select Group -';
			ksort($result);
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
	public function changeGroup($params)
	{
		$id = $params['id'];
		$groupId = $params['group_id'];
		$query = "UPDATE `$this->table` SET `group_id` = '$groupId' WHERE  `id` = '$id'";
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
		$query = "SELECT `id`,`email`,`username`,`fullname`,`password`, `status`,`group_id` FROM `$this->table` WHERE `id` = {$params['id']}";
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
