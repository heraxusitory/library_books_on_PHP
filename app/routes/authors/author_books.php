<?php

use App\Books;
use App\Authors;
$a = new Authors();
$b = new Books();
$idOfAuthor = $a->getIdOfAuthor();

if(checkExistAuthor($idOfAuthor)) {
	 $booksAuthor = $b->getBooksById($_GET['author']);
	 $title = strtoupper('Custom Author'); // TODO - указать правильного автора
	include($_SERVER['DOCUMENT_ROOT'] . '/templates/author_books.php');

} else {
 	include($_SERVER['DOCUMENT_ROOT'] . '/404.php');
}