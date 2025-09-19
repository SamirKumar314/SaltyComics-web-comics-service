<div id="comicCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
    <div class="carousel-inner mx-auto">
        <?php for($i=0; $i<3; $i++): ?>
            <?php $comic = fetchLatestComic($i); ?>
            
            <div class="carousel-item <?= $i === 0 ? 'active' : '' ?> bg-black text-center">
                <div style="height: 400px;" class="mb-4">
                    <img src="<?= $comic['imgUrl'] ?>" class="d-inline-block" alt="#<?= $comic['num'] ?>" style="max-height: 100%; max-width: 100%; object-fit: contain;">
                </div>
                
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 text-start">
                    <h5 class="mx-3">Comic #<?= $comic['num'] ?></h5>
                    <p class="mx-3"><?= $comic['altText'] ?></p>
                </div>                    
            </div>
        <?php endfor; ?>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#comicCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#comicCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
</div>