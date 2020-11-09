<div class="card mt-4 favourite-drop-<?= $book['book_id'] ?>" style="width: 21rem;">
    <div class="img_block"></div>
    <div class="card-body">
        <h5 class="card-title"><?= $book['book_name']; ?></h5>
        <p class="card-text">
            <div> <?= $book['author_name']; ?> </div>
        </p>
       	<div class='btn_clc'>
	        <a href="/?page=book&id=<?= $book['book_id'] ?>" class="btn btn-primary">Show</a>
	        <form method="POST" action="app/handlers/handler.php" class="form_favourite_remove">
	        	 <input type="hidden" name="book_id" value="<?= $book['book_id'] ?>">
	             <input type="hidden" name="action" value="remove">
	             <input type="hidden" name="dropFavourite" value='true'>
	        	 <button class="btn btn-primary remove-favourite">Delete from favourites</button>
	        </form>
	    </div>
       
    </div>
</div>