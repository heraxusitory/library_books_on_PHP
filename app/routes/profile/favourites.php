<?php

use App\Books;
use App\Favourites;
$b = new Books();
$userId = $_SESSION['user']['user_id'];
$books = $b->getBooks();
$favourite = new Favourites;
include($_SERVER['DOCUMENT_ROOT'] . '/templates/favourites/list.php');

?>
