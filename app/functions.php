<?php

use App\Users;
use App\Favourites;

function isAuth() {
	$user = new Users;
	if ($user->isAuth()) {
		return true;
	}
	return false;
	// можно сократить до return ($user->isAuth());
}

function isAdmin() {
	$user = new Users;
	if ($user->isAdmin()) {
		return true;
	}
	return false;
	// можно сократить до return ($user->isAdmin());
}

function getNameAndLoginUser() {
	$user = new Users;
	$nameAndLogin = $user->getUserById($user->getUserId());
	return $nameAndLogin;

}
//Для работы с AJAX $_GET['genre'] заменен на $_GET['id']
function checkExistGenre($idOfGenre) {
	foreach ($idOfGenre as $element) {
		$isExist = false;
		if ($element['id'] === $_GET['id']) {
			$isExist = true;
			break;
		} 
	}
return $isExist;
}
//Для работы с AJAX $_GET['author'] заменен на $_GET['id']
function checkExistAuthor($idOfAuthor) {
	foreach ($idOfAuthor as $element) {
		$isExist = false;
		if ($element['id'] === $_GET['id']) {
			$isExist = true;
			break;
		} 
	}
return $isExist;
}

//Для работы с AJAX $_GET['book'] заменен на $_GET['id']
function checkExistBook($idOfBook) {
	foreach ($idOfBook as $element) {
		$isExist = false;
		if ($element['id'] === $_GET['id']) {
			$isExist = true;
			break;
		} 
	}
return $isExist;
}


function doesExistFavourite($book_id, $user_id) {
	$favourite = new Favourites;
	$itFavourite = $favourite->doesTheBookExistInFavourite($book_id, $user_id);
	return $itFavourite;
}

function dropFavourBook($bookId) {
	$favourite = new Favourites;
	$favourite->dropFavourBook($bookId);
}