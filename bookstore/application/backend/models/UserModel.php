<?php
class UserModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTable(TB_USER);
	}

	public function countItem($params, $option = null){
	
		$query[]	= "SELECT `status` COUNT(`status`) AS `count`";
		$query[]	= "FROM `$this->table`";
		$query[]	= "WHERE `id` > 0";
		
		$query[]	= "GROUP BY `status`";

		$query		= implode(" ", $query);
		$result		= $this->listRecord($query);

		$result		= array_combine(array_column($result, 'status'), array_column($result, 'count'));
		$result	    = ['all' => array_sum($result)] + $result;
		return $result;
	}

	public function listItems($params)
	{
		$query[] = "SELECT `id`, `username`, `email`,`fullname`, `password`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`";
		$query[]     = "FROM `$this->table`";
		$query[]     = "WHERE `id` > 0";

		// if (isset(($params['filter_groupacp'])) && ($params['filter_groupacp']) != 'default') {
		// 	$filterGroupAcp = $params['filter_groupacp'];
		// 	$query[] = "AND `group_acp` = '$filterGroupAcp'";
		// }
		// if (isset($params['search']) && !empty(trim($params['search']))) {
		// 	$searchValue = trim($params['search']);
		// 	$query[]     = "AND `name` LIKE '%$searchValue%'";
		// }

		// if (isset($params['filter_status']) && $params['filter_status'] != 'all') {
		// 	$statusValue = $params['filter_status'];
		// 	$query[]     = "AND `status`='$statusValue' ";
		// }

		// PAGINATION
		// $pagination			= $params['pagination'];
		// $totalItemsPerPage	= $pagination['totalItemsPerPage'];
		// if($totalItemsPerPage > 0){
		// 	$position	= ($pagination['currentPage']-1)*$totalItemsPerPage;
		// 	$query[]	= "LIMIT $position, $totalItemsPerPage";
		// }

		$query        = implode(" ", $query);
		$result        = $this->listRecord($query);
		return $result;
	}

	public function changeStatus($params)
	{
		$id = $params['id'];
		$status = ($params['status'] == 'active') ?  'inactive' : 'active';
		$query = "UPDATE `$this->table` SET `status` = '$status' WHERE  `id` = '$id'";
		$this->query($query);
		if ($this->affectedRows()) {
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
			$this->insert($params);
		}
		if ($option['task'] == 'edit') {

			$params['modified'] = date('Y-m-d H:i:s');
			$id = $params['id'];

			unset($params['id']);
			$this->update($params, [['id', $id]]);
		}
	}
	public function getItem($params)
	{
		$query = "SELECT `id`,`name`, `status`,`group_acp` FROM `$this->table` WHERE `id` = {$params['id']}";
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
//`id`, `name`, `group_acp`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`