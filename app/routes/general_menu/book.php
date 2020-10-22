<?php
use App\Books;
$b = new Books();
$book = $b->getBookById($_GET['book']);
$idOfBooks = $b->getIdOfBooks();
if(checkExistBook($idOfBooks)) {
 	$booksGenre = $b->getGenreById($_GET['book']);
	include($_SERVER['DOCUMENT_ROOT'] . '/templates/components/book_detail.php');
} else {
 	include($_SERVER['DOCUMENT_ROOT'] . '/404.php');
	}
?> 