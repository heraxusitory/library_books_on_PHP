<h3 class="content_title"><?= $title ?></h3>
<div class="d-flex flex-wrap justify-content-start">
    <?php 
    foreach($authorsList as $author) {
        include($_SERVER['DOCUMENT_ROOT'] . '/templates/components/author_card.php');
    }
    ?>
</div>