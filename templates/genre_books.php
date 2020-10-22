<h3 class="content_title"><?= $title ?></h3>
<div class="d-flex flex-wrap justify-content-start">
    <?php 
    foreach($booksGenre as $book) {
        include($_SERVER['DOCUMENT_ROOT'] . '/templates/components/genre_books.php');
    }
    ?>
 </div>