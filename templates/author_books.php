<div class="d-flex flex-wrap justify-content-between">
    <?php 
    foreach($booksAuthor as $book) {
        include($_SERVER['DOCUMENT_ROOT'] . '/templates/components/author_books.php');
    }
    ?>
 </div>