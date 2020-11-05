<div class="d-flex flex-wrap justify-content-between">
    <?php  foreach($books as $book):
    if($favourite->doesTheBookExistInFavourite($book['book_id'], $userId)):
    	include($_SERVER['DOCUMENT_ROOT'] . '/templates/components/favourite_card.php');
    endif; ?>
    <?php endforeach;?>
    	<h1 class='emptyFavourite'><?= $favourite->emptyFavouriteList($book['book_id'], $userId)?'There are no books in favourites':'' ?></h1>
</div>