<?php

namespace App;

class Users extends DB {

	private $getUsersQuery = 'SELECT login, password FROM users';

	public function getUsers() {
		$arrList = $this->getList($this->getUsersQuery);
		return $arrList;
	}
}