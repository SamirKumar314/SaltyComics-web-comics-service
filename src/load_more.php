<?php
require_once __DIR__ . '/functions.php';

//fetching data from a function...
$comics = [];
for($i = 0; $i < 3; $i++){
    $comics[] = fetchAndFormatComicData(); //contains the data required
}

foreach($comics as $index => $comic){
    $modalId = 'modal-comic-' . htmlspecialchars($comic['num']);

    // card grid
    include __DIR__ . '/components/cards.php';

    // modal
    include __DIR__ . '/components/modals.php';
}

?>