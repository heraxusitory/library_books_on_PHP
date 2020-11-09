<?php
require($_SERVER['DOCUMENT_ROOT'] . '/app/config.php');
require($_SERVER['DOCUMENT_ROOT'] . '/app/init.php');
use App\Books;
use App\Authors;
use App\Genre;

if ($_REQUEST['page'] === '/') {
	$b = new Books();
	$books = $b->getBooks();
	$title = strtoupper('Books');
	$userId = $_SESSION['user']['user_id'];

	ob_start();
	include($_SERVER['DOCUMENT_ROOT'] . '/templates/book_list.php');
	$html = ob_get_clean();

	$arResponse['html'] = $html;

	echo json_encode($arResponse);

}

if ($_REQUEST['page'] === 'authors') {

	$authors = new Authors();
	$authorsList = $authors->getAuthors();
	$title = strtoupper('Authors');

	ob_start();
	include($_SERVER['DOCUMENT_ROOT'] . '/templates/authors.php');
	$html = ob_get_clean();

	$arResponse['html'] = $html;

	echo json_encode($arResponse);

}

if ($_REQUEST['page'] === 'genres') {

	$genre = new Genre();
	$genreList = $genre->getGenre();
	$title = strtoupper('Genres');

	ob_start();
	include($_SERVER['DOCUMENT_ROOT'] . '/templates/genre.php');
	$html = ob_get_clean();

	$arResponse['html'] = $html;

	echo json_encode($arResponse);

}

if ($_REQUEST['page'] === 'profile') {

	$user = getNameAndLoginUser();
	$isAdmin = isAdmin()?'<span class="badge badge-success text-wrap"> Admin</span>':"";

	ob_start();
	require ($_SERVER['DOCUMENT_ROOT'] . '/templates/profile.php');
	$html = ob_get_clean();

	$arResponse['html'] = $html;

	echo json_encode($arResponse);

}

if ($_REQUEST['page'] === 'auth') {

	ob_start();
	include $_SERVER['DOCUMENT_ROOT'] . '/templates/auth.php';
	$html = ob_get_clean();

	$arResponse['html'] = $html;

	echo json_encode($arResponse);

}

if ($_REQUEST['page'] === 'book') {
	$b = new Books();
	$book = $b->getBookById($_REQUEST['id']);
	$idOfBooks = $b->getIdOfBooks();

	if(checkExistBook($idOfBooks)) {
	 	$booksGenre = $b->getGenreById($_REQUEST['id']);

	 	ob_start();
		include($_SERVER['DOCUMENT_ROOT'] . '/templates/components/book_detail.php');
		$html = ob_get_clean();

		$arResponse['html'] = $html;

		echo json_encode($arResponse);
	} else {
		ob_start();
	 	include($_SERVER['DOCUMENT_ROOT'] . '/404.php');
	 	$html = ob_get_clean();

		$arResponse['html'] = $html;

		echo json_encode($arResponse);
		}
}

if ($_REQUEST['page'] === 'author') {
	$a = new Authors();
	$b = new Books();
	$idOfAuthor = $a->getIdOfAuthor();
	$authorList = $a->getAuthorById($_REQUEST['id']);
	$authorName = $authorList['name'];

	if(checkExistAuthor($idOfAuthor)) {
		 $booksAuthor = $b->getBooksById($_REQUEST['id']);
		 $title = mb_strtoupper($authorName);
		 ob_start();
		include($_SERVER['DOCUMENT_ROOT'] . '/templates/author_books.php');
		$html = ob_get_clean();

		$arResponse['html'] = $html;

		echo json_encode($arResponse);

	} else {
		ob_start();
	 	include($_SERVER['DOCUMENT_ROOT'] . '/404.php');
	 	$html = ob_get_clean();

		$arResponse['html'] = $html;

		echo json_encode($arResponse);
	}
}

if ($_REQUEST['page'] === 'genre') {
	$g = new Genre;
	$b = new Books();
	$idOfGenre = $g->getIdOfGenre();
	$genreList = $g->getGenreById($_GET['id']);
	$genreName = $genreList['name'];

	 if(checkExistGenre($idOfGenre)) {
		 $booksGenre = $b->getGenreById($_GET['id']);
		//  TODO - указать правильный жанр
		 $title = mb_strtoupper($genreName);
		 ob_start();
		include($_SERVER['DOCUMENT_ROOT'] . '/templates/genre_books.php');
		$html = ob_get_clean();

		$arResponse['html'] = $html;

		echo json_encode($arResponse);

	 } else {
	 	ob_start();
	 	include($_SERVER['DOCUMENT_ROOT'] . '/404.php');
	 	$html = ob_get_clean();

		$arResponse['html'] = $html;

		echo json_encode($arResponse);
	 }
}