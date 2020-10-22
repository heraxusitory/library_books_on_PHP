<?php 

require($_SERVER['DOCUMENT_ROOT'] . '/app/config.php');
require($_SERVER['DOCUMENT_ROOT'] . '/app/init.php');

use App\DB;
$d = new DB();
$push = $d->pushData('INSERT INTO posts() VALUES()');

echo json_encode($arResponse);
