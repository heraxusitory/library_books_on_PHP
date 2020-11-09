<div>
    <a class="back">Back</a>
    <!-- <a class="target step-back" href="">Back</a> -->
    <a class="target" href="/">Back to main page</a>
</div>
<div class="row">
    <div class="col-sm-3">
       <div class="img_block"></div>
    </div>
    <div class="col-sm-9">
        <h5><?= $book['book_name'] ?></h5>
        <div><?= $book['author_name'] ?></div>
        <div><?= $book['genre_name'] ?></div>
    </div>
</div>
<p>
    <?= $book['book_desc'] ?>
</p>