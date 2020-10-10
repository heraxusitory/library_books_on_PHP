<?php

namespace App;

class Users extends DB {

	private $getUsersQuery = 'SELECT login, password FROM users';

	public function getUsers() {
		$arrList = $this->getList($this->getUsersQuery);
		return $arrList;
	}

	// TODO: написать метод который получает пользователя по id
	public function getById($user_id) {

	}

	// TODO: написать метод который получает id текущего авторизованного пользователя
	public function getUserId() {

	}

	// TODO: написать метод, который проверяет, является ли текущий авторизованный пользователь Админом сайта
	public function isAdmin() {

	}
	
}