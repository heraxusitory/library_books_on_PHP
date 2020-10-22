<?php
use App\Genre;
$genre = new Genre();
$genreList = $genre->getGenre();
$title = strtoupper('Genres');

include($_SERVER['DOCUMENT_ROOT'] . '/templates/genre.php');