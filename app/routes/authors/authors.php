<?php
use App\Authors;
$authors = new Authors();

$authorsList = $authors->getAuthors();
$title = strtoupper('Authors');

include($_SERVER['DOCUMENT_ROOT'] . '/templates/authors.php');