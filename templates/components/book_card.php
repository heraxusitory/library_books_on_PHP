<div class="card mt-4" style="width: 21rem;">
    <div class="img_block"></div>
    <div class="card-body">
        <h5 class="card-title"><?= $book['book_name']; ?></h5>
        <p class="card-text">
            <div> <?= $book['author_name']; ?> </div>
        </p>
        <a href="/?book=<?= $book['book_id'] ?>" class="btn btn-primary">Show</a>
        <form method="POST" action="app/handlers/handler.php" class="form_favourite_add">
        	 <input type="hidden" name="book_id" value="<?= $book['book_id'] ?>">
             <input type="hidden" name="action" value="add">
        	 <button class="btn btn-primary add-favourite">Добавить в избранное</button>
             <div class="errorAdd"></div>
        </form>

       
    </div>
</div>