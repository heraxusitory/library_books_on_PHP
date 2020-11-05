<?php 

require($_SERVER['DOCUMENT_ROOT'] . '/app/config.php');
require($_SERVER['DOCUMENT_ROOT'] . '/app/init.php');

use App\Favourites;
$favourite = new Favourites;
$userId = $_SESSION['user']['user_id'];
$bookId = $_REQUEST['book_id'];
//Проверка на нажаитие кнопки submit
if (!empty($_REQUEST)) {
	//Проверяем авторизован ли пользователь
	if (isset($_SESSION['user'])) {
		if (!($favourite->addFavouriteBook($userId, $bookId)) || !($favourite->dropFavourBook($bookId, $userId))) {
			$arResponse['fatalError'] = true;
			$arResponse['book_id'] = $bookId;
		} else {
			$arResponse['isAuth'] = true;
			//Проверяем как кнопка нажата(в данном случае проверка на нажатие 'Добавить в избранное'')
			if ($_REQUEST['action'] == 'add') {
				$arResponse['user_id'] = $_SESSION['user']['user_id'];
				$arResponse['book_id'] = $_REQUEST['book_id'];
				$arResponse['action'] = 'add';
				$arResponse['removeAction'] = 'remove';
				$arResponse['text'] = 'Delete from favourites';
				//Записываем в массив все записи из таблицы БД favourites
				$arrFavBooks = $favourite->getListFavourite($userId);
				//Если таблица БД не пустая,то проверяем нет ли уже такой добавляемой книги в записи таблицы БД
				if (!empty($arrFavBooks)) {
					$errorAdd = false;
					for ($i=0; $i <count($arrFavBooks) ; $i++) {
						//Если существует такая книга, то вспомогательный флаг об ошибке добавления
						if ($arrFavBooks[$i]['book_id'] == $_REQUEST['book_id'] && $arrFavBooks[$i]['user_id'] == $userId) {
							$errorAdd = true;
							$arResponse['errorAdd'] = $errorAdd;
							break;
						}
					}

					if (!$errorAdd) {
							$favourite->addFavouriteBook($userId, $bookId);
						}
				} else {
						$favourite->addFavouriteBook($userId, $bookId);
					}
			}

			if (($_REQUEST['action'] == 'remove') && ($_REQUEST['dropFavourite'] == 'true')) {
				$arResponse['dropFavourite'] = true;
				$arResponse['book_id'] = $_REQUEST['book_id'];
				$arResponse['action'] = 'remove';
				$favourite->dropFavourBook($bookId, $userId);
				if ($favourite->emptyFavouriteList($bookId, $userId)) {
					$arResponse['emptyFavourite'] = true;
				}
			}
			
			else if ($_REQUEST['action'] == 'remove') {
					$arResponse['user_id'] = $_SESSION['user']['user_id'];
					$arResponse['book_id'] = $_REQUEST['book_id'];
					$arResponse['action'] = 'remove';
					$arResponse['removeAction'] = 'add';
					$arResponse['text'] = 'Add to favourites';

					$arrFavBooks = $favourite->getListFavourite($userId);
					$errorAdd = false;
					for ($i=0; $i <count($arrFavBooks) ; $i++) { 
						if ($arrFavBooks[$i]['book_id'] == $_REQUEST['book_id'] && $arrFavBooks[$i]['user_id'] == $userId) {
							$favourite->dropFavourBook($bookId, $userId);
							$errorRemove = true;
							$arResponse['errorRemove'] = $errorRemove;
							break;
						}
					}	
			}
		}
		
	} else {
		$arResponse['isAuth'] =false;
	}
	
}

echo json_encode($arResponse);
