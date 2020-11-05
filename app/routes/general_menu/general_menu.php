<?php
use App\Books;
$b = new Books();
$books = $b->getBooks();
$title = strtoupper('Books');
$userId = $_SESSION['user']['user_id'];

include($_SERVER['DOCUMENT_ROOT'] . '/templates/book_list.php');
