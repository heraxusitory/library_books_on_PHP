<?php 
require($_SERVER['DOCUMENT_ROOT'] . '/templates/header.php'); 
use App\Books;

$b = new Books();

?>
    <div class="container custom-container">
        <?php
        if (!isset($_GET['book'])) :

            $books = $b->getBooks();
        ?>
    
            <div class="d-flex flex-wrap justify-content-between">

                <?php  foreach($books as $book): ?>
                    <?php include($_SERVER['DOCUMENT_ROOT'] . '/templates/components/book_card.php'); ?>
                <?php endforeach; ?>

            </div>
        <?php else: ?>
            <?php
            $book = $b->getBookById($_GET['book']);
            // echo "<pre>";
            // var_dump($book);
            // echo "</pre>"; 
            include($_SERVER['DOCUMENT_ROOT'] . '/templates/components/book_detail.php');

            ?> 
        <?php endif ?> 
    </div>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php'); ?>
