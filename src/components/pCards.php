<?php for($i = 0; $i < 3; $i++): ?>

    <div class="col placeholder-card">
        <div class="card h-100 shadow border-2 rounded-4">
            <div style="height: 250px; background: #e0e0e08e;" class="rounded-top-4"></div>
            <div class="card-body">
                <h5 class="card-title placeholder-glow">
                    <span class="placeholder col-6"></span>
                </h5>
                <p class="card-text placeholder-glow">
                    <span class="placeholder col-8 mb-2"></span>
                    <span class="placeholder col-5 mb-2"></span>
                    <span class="placeholder col-7 mb-2"></span>
                </p>
                <button class="btn btn-secondary" type="button" disabled>
                    <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span>
                    <span role="status">Loading...</span>
                </button>
            </div>
        </div>
    </div>
    
<?php endfor; ?>