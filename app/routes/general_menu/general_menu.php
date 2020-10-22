<?php
use App\Books;
$b = new Books();
$books = $b->getBooks();
$title = strtoupper('Books');

include($_SERVER['DOCUMENT_ROOT'] . '/templates/book_list.php');
