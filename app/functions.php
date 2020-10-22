<?php

use App\Users;

function isAuth() {
	$user = new Users;
	if ($user->isAuth()) {
		return true;
	}
	return false;
}

function isAdmin() {
	$user = new Users;
	if ($user->isAdmin()) {
		return true;
	}
	return false;
}

function getNameAndLoginUser() {
	$user = new Users;
	$nameAndLogin = $user->getUserById($user->getUserId());
	return $nameAndLogin;

}

function checkExistGenre($idOfGenre) {
	foreach ($idOfGenre as $element) {
		$isExist = false;
		if ($element['id'] === $_GET['genre']) {
			$isExist = true;
			break;
		} 
	}
return $isExist;
}

function checkExistAuthor($idOfAuthor) {
	foreach ($idOfAuthor as $element) {
		$isExist = false;
		if ($element['id'] === $_GET['author']) {
			$isExist = true;
			break;
		} 
	}
return $isExist;
}

function checkExistBook($idOfBook) {
	foreach ($idOfBook as $element) {
		$isExist = false;
		if ($element['id'] === $_GET['book']) {
			$isExist = true;
			break;
		} 
	}
return $isExist;
}