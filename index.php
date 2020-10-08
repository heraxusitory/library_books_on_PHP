<?php 
require($_SERVER['DOCUMENT_ROOT'] . '/templates/header.php'); 
use App\Books;

$b = new Books();

?>
    <div class="container custom-container">
        <?php
        if (!empty($_GET)):
            switch (key($_GET)) {
                case 'book':
                    include($_SERVER['DOCUMENT_ROOT'] . '/app/routes/book.php');
                    break;
                case 'auth':
                    include($_SERVER['DOCUMENT_ROOT'] . '/app/routes/auth.php');
                    break;
                default:
                    include($_SERVER['DOCUMENT_ROOT'] . '/404.php');
                    break;
            }
        ?>
        <?php else: ?>
            <?php

            $books = $b->getBooks();
            ?>
            <div class="d-flex flex-wrap justify-content-between">
                <?php  foreach($books as $book): ?>
                    <?php include($_SERVER['DOCUMENT_ROOT'] . '/templates/components/book_card.php'); ?>
                <?php endforeach; ?>
            </div>
        <?php endif ?> 
    </div>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php'); ?>
