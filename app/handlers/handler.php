<?php 

require($_SERVER['DOCUMENT_ROOT'] . '/app/config.php');
require($_SERVER['DOCUMENT_ROOT'] . '/app/init.php');

if (!empty($_REQUEST)) {
	if ($_REQUEST['action'] == 'add') {
		if (isset($_SESSION['user'])) {

			$arResponse['user_id'] = $_SESSION['user']['user_id'];
			$arResponse['book_id'] = $_REQUEST['book_id'];
			$arResponse['action'] = 'add';
			$arResponse['removeAction'] = 'remove';
			$arResponse['text'] = 'Удалить из избранного';
			// echo "<pre>";
			$arrFavBooks = $db->getList("SELECT book_id FROM favourites");
			// var_dump($arrFavBooks);
			if (!empty($arrFavBooks)) {
				$errorAdd = false;
				for ($i=0; $i <count($arrFavBooks) ; $i++) { 
					if ($arrFavBooks[$i]['book_id'] == $_REQUEST['book_id']) {
						$errorAdd = true;
						$arResponse['errorAdd'] = $errorAdd;
						break;
					}
				}

				if (!$errorAdd) {
						$sth = $connect->prepare("INSERT INTO favourites (user_name, book_id) VALUES(:user_name,:book_id)");
						$sth->bindParam(':user_name', $userName);
						$sth->bindParam(':book_id', $bookId);
						$userName = $_SESSION['user']['user_id'];
						// echo "<pre>";
						$bookId = $_REQUEST['book_id'];
						$sth->execute();

					}
			} else {
					$sth = $connect->prepare("INSERT INTO favourites (user_name, book_id) VALUES(:user_name,:book_id)");
					$sth->bindParam(':user_name', $userName);
					$sth->bindParam(':book_id', $bookId);
					$userName = $_SESSION['user']['user_id'];
					// echo "<pre>";
					$bookId = $_REQUEST['book_id'];
					$sth->execute();
				}
			

			
			

		}
	}
	if ($_REQUEST['action'] == 'remove') {
		if (isset($_SESSION['user'])) {
			$arResponse['user_id'] = $_SESSION['user']['user_id'];
			$arResponse['book_id'] = $_REQUEST['book_id'];
			$arResponse['action'] = 'remove';
			$arResponse['removeAction'] = 'add';
			$arResponse['text'] = 'Добавить в избранное';

			$arrFavBooks = $db->getList("SELECT book_id FROM favourites");
			// var_dump($arrFavBooks);
			$errorAdd = false;
			for ($i=0; $i <count($arrFavBooks) ; $i++) { 
				if ($arrFavBooks[$i]['book_id'] == $_REQUEST['book_id']) {
					$sth = $connect->prepare("DELETE FROM favourites WHERE book_id = :id");
					$sth->bindParam(':id', $bookId);
					$bookId = $_REQUEST['book_id'];
					$sth->execute();

					$errorRemove = true;
					$arResponse['errorRemove'] = $errorRemove;
					break;
				}
			}
		}	
			
	}
}

echo json_encode($arResponse);
