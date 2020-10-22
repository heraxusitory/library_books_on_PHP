<?php

use App\Books;
use App\Genre;
$g = new Genre;
$b = new Books();
$idOfGenre = $g->getIdOfGenre();

 if(checkExistGenre($idOfGenre)) {
	 $booksGenre = $b->getGenreById($_GET['genre']);
	//  TODO - указать правильный жанр
	 $title = strtoupper('Custom genre');
	include($_SERVER['DOCUMENT_ROOT'] . '/templates/genre_books.php');

 } else {
 	include($_SERVER['DOCUMENT_ROOT'] . '/404.php');
 }



