<?php
use App\Genre;
$genre = new Genre();
$genreList = $genre->getGenre();

include($_SERVER['DOCUMENT_ROOT'] . '/templates/genre.php');