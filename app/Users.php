<?php

namespace App;

class Users extends DB {

	private $getUsersQuery = 'SELECT * FROM users';
	private $getById = 'WHERE id = ';

	public function getUsers() {
		$arrList = $this->getList($this->getUsersQuery);
		return $arrList;
	}


	// TODO: написать метод который получает пользователя по id
	

	public function getUserById($user_id) {
		$user = $this->get($this->getUsersQuery . " " . $this->getById . " " . $user_id);
		return $user;


	}

	// TODO: написать метод который получает id текущего авторизованного пользователя
	public function getUserId() {
		if (isset($_SESSION['user'])) {
			$userId = $_SESSION['user']["user_id"];
			return $userId;
		} 
		return false;

	}

	// TODO: написать метод, который проверяет, является ли текущий авторизованный пользователь Админом сайта
	public function isAdmin() {
		$userId = $this->getUserId();
		if ($userId) {
			$user = $this->getUserById($userId);
			return (bool) $user['is_admin']; 	

		} 
		return false;

	}

	public  function isAuth() {
		if ($this->getUserId()) {
			return true;
		} 
		return false;
	}
	
}