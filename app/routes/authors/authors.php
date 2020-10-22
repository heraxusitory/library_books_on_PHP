<?php
use App\Authors;
$authors = new Authors();

$authorsList = $authors->getAuthors();

include($_SERVER['DOCUMENT_ROOT'] . '/templates/authors.php');