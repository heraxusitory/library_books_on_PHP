<h3 class="content_title"><?= $title ?></h3>
<div class="d-flex flex-wrap justify-content-between">
    <?php 
    foreach($genreList as $genre) {
        include($_SERVER['DOCUMENT_ROOT'] . '/templates/components/genre_card.php');
    }
    ?>
 </div>