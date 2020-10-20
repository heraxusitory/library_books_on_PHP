<?php
use App\Authors;
$authors = new Authors();

$authorsList = $authors->getAuthors($_GET['authors']);

include($_SERVER['DOCUMENT_ROOT'] . '/templates/authors.php');