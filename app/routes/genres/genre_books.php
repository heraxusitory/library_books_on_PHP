<?php

use App\Books;
use App\Genre;
$g = new Genre;
$b = new Books();
$idOfGenre = $g->getIdOfGenre();
$genreList = $g->getGenreById($_GET['genre']);
$genreName = $genreList['name'];

 if(checkExistGenre($idOfGenre)) {
	 $booksGenre = $b->getGenreById($_GET['genre']);
	//  TODO - указать правильный жанр
	 $title = mb_strtoupper($genreName);
	include($_SERVER['DOCUMENT_ROOT'] . '/templates/genre_books.php');

 } else {
 	include($_SERVER['DOCUMENT_ROOT'] . '/404.php');
 }



