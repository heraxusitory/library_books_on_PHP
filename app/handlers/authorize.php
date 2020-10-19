<?php 

require($_SERVER['DOCUMENT_ROOT'] . '/app/config.php');
require($_SERVER['DOCUMENT_ROOT'] . '/app/init.php');

use App\Users;

if (!empty($_REQUEST)) {

	if (isset($_REQUEST['sign_in'])) {

		$users = new Users;
		$userList = $users->getUsers();
		$foundUser = false;

		if (is_array($userList)) {
			foreach ($userList as $user) {

				if ($_REQUEST['login'] == $user['login'] && $_REQUEST['password'] == $user['password']) {
					$foundUser = true;
					$arResponse['status'] = 'ok';
					$_SESSION['user'] = [
						'auth' => true,
						'user_id' => $user['id'],
					];
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

	}

	if (isset($_REQUEST['sign_out'])) {

		unset($_SESSION['user']);
		$arResponse['status'] = 'ok';
	}
	

} else {
	$arResponse['status'] = 'error';
	$arResponse['message'] = 'login and password  must not be empty';
}

echo json_encode($arResponse);
