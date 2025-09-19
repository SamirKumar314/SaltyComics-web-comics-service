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
    <?php
        $activePage = 'home';
        include __DIR__ . '/components/navbar.php';
    ?>


    <!-- carousel heading -->
    <div class="p-3 bg-black text-white">
        <h2 class="mx-3">Latest Comics</h2>
        <hr class="border-2">
    </div>

    <!-- carousel -->
    <?php include __DIR__ . '/components/carousel.php'; ?>


    
    <!-- cards section -->
    <div class="container my-4">
        <!-- heading -->
        <div class="mx-5">
            <h2 class="text-start mb-2 mx-3">Comic Gallery</h2>
            <hr class="border-2">
        </div>

        <!-- initial cards added here -->
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-2 mx-5" id="rows">

            <!-- placeholder cards(gets removed when content loaded) -->
            <?php include __DIR__ . '/components/pCards.php'; ?>

        </div>
        

        <!-- new cards added here -->
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-2 mx-5" id="loadContent"></div>
        

        <!-- load more button -->
        <div class="mx-auto mt-4" id="loaddiv">
            <button type="button" class="btn btn-primary d-block mx-auto" id="loadbutton">
                Load more
            </button>
        </div>
        
    </div>

    
    <!-- Bootstrap JS & Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    
    <!-- JS script for loading content -->
    <script src="JS/loader.js"></script>

    <!-- JS script for loading more content -->
    <script src="JS/load_more.js"></script>


<!-- footer -->
<?php include __DIR__ . '/components/footer.html'; ?>
</body>

</html>