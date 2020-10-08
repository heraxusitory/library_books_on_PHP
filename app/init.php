<?php 
// Подключаем классы
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/DB.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/Books.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/Users.php');
// Юзаем НЭЙМСПЭЙС
use App\DB;

// Создаем объект класса DB
$db = new DB;
// Обращаемся к методу класса через его объект
$connect = $db->connect(DB_NAME, DB_USER, DB_PASSWORD);


