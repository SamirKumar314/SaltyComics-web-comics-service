<div class="col">
    <div class="card h-100 shadow border-2 rounded-4">
        <img src="<?= htmlspecialchars($comic['imgUrl']) ?>" class="card-img-top comic-img border-bottom border-2 rounded-top-4" alt="Comic <?= $comic['num'] ?>">
        <div class="card-body">
            <h5 class="card-title">Comic #<?= $comic['num'] ?></h5>
            <p class="card-text"><?= html_entity_decode($comic['altText']) ?></p>
            <button class="btn btn-primary mt-auto" data-bs-toggle="modal" data-bs-target="#modal<?= $modalId ?>">
                View Larger
            </button>
        </div>
    </div>
</div>