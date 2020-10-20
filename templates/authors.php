<div class="d-flex flex-wrap justify-content-between">
    <?php 
    foreach($authorsList as $author) {
        include($_SERVER['DOCUMENT_ROOT'] . '/templates/components/author_card.php');
    }
    ?>
 </div>