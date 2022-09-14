<?php
class DashboardModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		//$this->setTable(TB_GROUP);
	}

	public function countRecord($option = null){
		switch ($option){
			case 'group':
				$result		= $this->singleRecord("SELECT COUNT(`id`) AS `count` FROM `group`");
				break;
			case 'user':
				$result		= $this->singleRecord("SELECT COUNT(`id`) AS `count` FROM `user`");
				break;
			case 'category':
				$result		= $this->singleRecord("SELECT COUNT(`id`) AS `count` FROM `category`");
				break;
			case 'book':
				$result		= $this->singleRecord("SELECT COUNT(`id`) AS `count` FROM `book`");
				break;
		}
		return $result;
	}
	
	
}
