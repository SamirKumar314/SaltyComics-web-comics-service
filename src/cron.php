<?php
require_once 'D:\xampp\htdocs\saltycomics\db\config.php';  //contains db connection file
require_once 'functions.php';                              //contains the required function

$res = sendComicsToSubscribers($conn);

//for testing...
// if($res == true){
//     echo "comic sent successfully";
// }
?>