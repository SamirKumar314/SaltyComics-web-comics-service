<?php
require_once 'functions.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../assets/chatBubble.png">
    <title>SaltyComics</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    
    <!-- CSS for cards -->
    <link rel="stylesheet" href="../assets/styles.css">

</head>
<body>
    <!-- top nav-bar -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand mb-0 h1" href="index.php">
                <img src="../assets/chatBubble.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                SALTYCOMICS
            </a>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 nav nav-underline">
                    <li class="nav-item">
                    <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="signup.php">Sign-up</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="unsub.php">Subscription</a>
                    </li>                                
                </ul>            
            </div>
        </div>
    </nav>

    <!-- comic carousel -->
    <div class="p-3 bg-black text-white">
        <h2 class="mx-3">Latest Comics</h2>
        <hr class="border-2">
    </div>

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
    
    <!-- comics gallery(placeholder cards) -->
    <div class="container my-4">
        <div class="mx-5">
            <h2 class="text-start mb-2 mx-3">Comic Gallery</h2>
            <hr class="border-2">
        </div>
        
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-2 mx-5">

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

        </div>
    </div>
    <!-- Bootstrap JS & Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    
    <!-- JS script for loading real content -->
    <script src="loader.js"></script>

<?php include 'footer.html'; ?>
</body>

</html>