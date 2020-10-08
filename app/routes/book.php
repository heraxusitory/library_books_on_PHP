<?php
$book = $b->getBookById($_GET['book']);

include($_SERVER['DOCUMENT_ROOT'] . '/templates/components/book_detail.php');

?> 