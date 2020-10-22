<?php
if (!empty($_GET)) {
    switch (key($_GET)) {
        case 'book':
            include($_SERVER['DOCUMENT_ROOT'] . '/app/routes/general_menu/book.php');
            break;
        case 'auth':
            include($_SERVER['DOCUMENT_ROOT'] . '/app/routes/auth.php');
            break;
        case 'profile':
            include($_SERVER["DOCUMENT_ROOT"] . '/app/routes/profile/profile.php');
            break;
        case 'favourites':
            include($_SERVER["DOCUMENT_ROOT"] . '/app/routes/profile/favourites.php');
            break;
        case 'authors':
            include($_SERVER["DOCUMENT_ROOT"] . '/app/routes/authors/authors.php');
            break;
        case 'author':
            include($_SERVER["DOCUMENT_ROOT"] . '/app/routes/authors/author_books.php');
            break;
        case 'genres':
            include($_SERVER["DOCUMENT_ROOT"] . '/app/routes/genres/genres.php');
            break;
        case 'genre':
            include($_SERVER["DOCUMENT_ROOT"] . '/app/routes/genres/genre_books.php');
            break;
        default:
            include($_SERVER['DOCUMENT_ROOT'] . '/404.php');
            break;
    }
} else {
    include($_SERVER['DOCUMENT_ROOT'] . '/app/routes/general_menu/general_menu.php');
} 
?> 