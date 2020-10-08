<div class="card mt-4" style="width: 21rem;">
    <div class="img_block"></div>
    <div class="card-body">
        <h5 class="card-title"><?= $book['book_name']; ?></h5>
        <p class="card-text">
            <div> <?= $book['genre_name']; ?> </div>
            <div> <?= $book['author_name']; ?> </div>
        </p>
        <a href="/?book=<?= $book['book_id'] ?>" class="btn btn-primary">Show</a>
    </div>
</div>