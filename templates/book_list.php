<h3 class="content_title"><?= $title ?></h3>
<div class="d-flex flex-wrap justify-content-start">
	<?php  foreach($books as $book): ?>
	    <?php include($_SERVER['DOCUMENT_ROOT'] . '/templates/components/book_card.php'); ?>
	<?php endforeach; ?>
</div>