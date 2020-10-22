<div class="d-flex flex-wrap justify-content-between">
    <?php 
    foreach($booksGenre as $book) {
        include($_SERVER['DOCUMENT_ROOT'] . '/templates/components/genre_books.php');
    }
    ?>
 </div>