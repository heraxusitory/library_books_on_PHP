<?php 

require($_SERVER['DOCUMENT_ROOT'] . '/app/config.php');
require($_SERVER['DOCUMENT_ROOT'] . '/app/init.php');

use App\Users;

if (!empty($_REQUEST)) {

	$users = new Users;
	$userList = $users->getUsers();
	$foundUser = false;

	if (is_array($userList)) {
		foreach ($userList as $user) {

			if ($_REQUEST['login'] == $user['login'] && $_REQUEST['password'] == $user['password']) {
				$foundUser = true;
				$arResponse['status'] = 'ok';
				$arResponse['message'] = 'Success';
			}
		} 
		
		if (!$foundUser) {
			$arResponse['status'] = 'error';
			$arResponse['message'] = 'Invalid login or password';
		}

	} else {
		$arResponse['status'] = 'error';
		$arResponse['message'] = 'Internal server error';
	}
	
	

} else {
	$arResponse['status'] = 'error';
	$arResponse['message'] = 'login and password  must not be empty';
}

echo json_encode($arResponse);
