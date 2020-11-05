<?php

namespace App;

class Favourites extends DB{
	private $getListFavouriteQuery = "SELECT * FROM favourites WHERE user_id = ";
	private $addBookQuery = "INSERT INTO favourites (user_id, book_id) VALUES(:user_id,:book_id)";
	function getListFavourite($user_id) {
		$arrList = $this->getList($this->getListFavouriteQuery . $user_id);
		return $arrList;
	}

	function addFavouriteBook($user_id, $book_id) {
		$connect = $this->connect(DB_NAME, DB_USER, DB_PASSWORD);
		$sth = $connect->prepare("INSERT INTO favourites (user_id, book_id) VALUES(:user_id,:book_id)");
		$sth->bindParam(':user_id', $user_id);
		$sth->bindParam(':book_id', $book_id);
		$execute = $sth->execute();
		if ($execute) {
			return true;
		} 
		return false;
	}

	function dropFavourBook($book_id, $user_id) {
		$connect = $this->connect(DB_NAME, DB_USER, DB_PASSWORD);
		$sth = $connect->prepare("DELETE FROM favourites WHERE book_id = :book_id AND user_id = :user_id");
		$sth->bindParam(':book_id', $book_id);
		$sth->bindParam(':user_id', $user_id);
		$execute = $sth->execute();
		if ($execute) {
			return true;
		}
		return false;
	}

	function doesTheBookExistInFavourite($book_id, $user_id) {
		$listFavourite = $this->getListFavourite($user_id);
		if (is_array($listFavourite)) {
			for ($i=0; $i < count($listFavourite); $i++) { 
				if (($listFavourite[$i]['book_id'] == $book_id) && ($listFavourite[$i]['user_id'] == $user_id)) {
					return true;	
				}
			}
		
		}
		return false;
	}

	function emptyFavouriteList($book_id, $user_id) {
		$listFavourite =$this->getListFavourite($user_id);
		if (empty($listFavourite)) {
			return true;
		}
		return false;
	}

}