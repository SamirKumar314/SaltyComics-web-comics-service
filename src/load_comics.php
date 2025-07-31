<?php
require_once 'functions.php';

//fetching data from a function...
$comics = [];
for($i = 0; $i < 9; $i++){
    $comics[] = fetchAndFormatComicData(); //contains the data required
}

foreach($comics as $index => $comic): ?>

    <!-- card grid -->
    <div class="col">
        <div class="card h-100 shadow border-2 rounded-4">
            <img src="<?= htmlspecialchars($comic['imgUrl']) ?>" class="card-img-top comic-img border-bottom border-2 rounded-top-4" alt="Comic <?= $comic['num'] ?>">
            <div class="card-body">
                <h5 class="card-title">Comic #<?= $comic['num'] ?></h5>
                <p class="card-text"><?= html_entity_decode($comic['altText']) ?></p>
                <button class="btn btn-primary mt-auto" data-bs-toggle="modal" data-bs-target="#modal<?= $index ?>">
                    View Larger
                </button>
            </div>
        </div>
    </div>

    <!-- modal -->
    <div class="modal fade" id="modal<?= $index?>" tabindex="-1" aria-labelledby="modalLabel<?= $index ?>" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel<?= $index ?>">Comic #<?= $comic['num'] ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="<?= htmlspecialchars($comic['imgUrl']) ?>" class="img-fluid mb-3" alt="Comic">
                    <p><?= html_entity_decode($comic['altText']) ?></p>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>