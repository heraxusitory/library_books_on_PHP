<?php 

require($_SERVER['DOCUMENT_ROOT'] . '/app/config.php');
require($_SERVER['DOCUMENT_ROOT'] . '/app/init.php');

if (!empty($_REQUEST)) {
	if ($_REQUEST['email'] == 'sergeev@example.com' && $_REQUEST['password'] == '0000') {
		$arResponse['status'] = 'ok';
		$arResponse['message'] = 'Success';
	} else {
		$arResponse['status'] = 'error';
		$arResponse['message'] = 'Invalid login or password';
	}
	
	

} else {
	$arResponse['status'] = 'error';
	$arResponse['message'] = 'login and password  must not be empty';
}

echo json_encode($arResponse);
