<div class="modal fade" id="modal<?= $modalId ?>" tabindex="-1" aria-labelledby="modalLabel<?= $modalId ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel<?= $modalId ?>">Comic #<?= $comic['num'] ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="<?= htmlspecialchars($comic['imgUrl']) ?>" class="img-fluid mb-3" alt="Comic">
                <p><?= html_entity_decode($comic['altText']) ?></p>
            </div>
        </div>
    </div>
</div>