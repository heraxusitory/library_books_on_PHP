<div class="card mt-4" style="width: 21rem;">
    <div class="img_block"></div>
    <div class="card-body">
        <h5 class="card-title"><?= $book['book_name']; ?></h5>
        <p class="card-text">
            <div> <?= $book['author_name']; ?> </div>
        </p>
        <div class="btn_clc">
            <a href="/?page=book&id=<?= $book['book_id'] ?>" class="btn btn-primary target">Show</a>
            <form method="POST" action="app/handlers/handler.php" class="<?= doesExistFavourite($book['book_id'], $userId)?'form_favourite_remove':'form_favourite_add'?>">
            	 <input type="hidden" name="book_id" value="<?= $book['book_id'] ?>">
                 <input type="hidden" name="action" value="<?= doesExistFavourite($book['book_id'], $userId)?'remove':'add'?>">
            	 <button class="btn btn-primary <?= doesExistFavourite($book['book_id'], $userId)?'remove-favourite':'add-favourite'?>"><?= doesExistFavourite($book['book_id'], $userId)?'Delete from favourites':'Add to favourites'?></button>
            </form>
        </div>
        <div class='fatal-error-favourite'></div>
    </div>
</div>