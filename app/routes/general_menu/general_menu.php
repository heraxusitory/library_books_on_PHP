<?php
use App\Books;
$b = new Books();
$books = $b->getBooks();
?>
<div class="d-flex flex-wrap justify-content-between">
	<?php  foreach($books as $book): ?>
	    <?php include($_SERVER['DOCUMENT_ROOT'] . '/templates/components/book_card.php'); ?>
	<?php endforeach; ?>
</div>