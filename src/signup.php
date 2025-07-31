<?php
session_start();
require_once '../db/config.php';
require_once 'functions.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    //registers the email into the database
    if(isset($_POST['submit-email'])){
        $email = trim($_POST['email'] ?? '');
        if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){

            if(registerEmail($conn, $email)){
                $_SESSION['message'] = 'You have successfully subscribed!';
                header('Location: signup.php');
                exit;
            }else{
                $_SESSION['message'] = 'This email is already subscribed, try different email';
                header('Location: signup.php');
                exit;
            }
        }else{
            $_SESSION['message'] = 'Please enter a valid email address';
            header('Location: signup.php');
            exit;
        }
    }
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../assets/chatBubble.png">
    <title>Sign-Up - SaltyComics</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
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
                    <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="signup.php">Sign-up</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="unsub.php">Subscription</a>
                    </li>
                </ul>            
            </div>
        </div>
    </nav>

    <!-- input form -->
    <main class="container flex-grow-1">
        <h1 class="mt-5 mb-3">Sign-up to Salty Comics</h1>
        <form method="post">
            <div class="mb-3 mt-4 col-lg-7">
                <label class="form-label mb-1">Email address:</label>
                <input type="email" name="email" id="email" class="form-control form-control-lg border-2" placeholder="example@domain.com" required>
                
                <div class="form-text" id="basic-addon4">We'll send you interesting comics to your email once everyday.</div>
            </div>
            <button type="submit" name="submit-email" id="submit-email" class="btn btn-success">Subscribe</button>
        </form>
    </main>

    <div style="margin-bottom: 200px;"></div>

    <!-- Bootstrap JS & Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

<?php include 'footer.html'; ?>
</body>

<?php
if(isset($_SESSION['message'])){
    echo "<script>alert('" . $_SESSION['message'] . "');</script>";
    unset($_SESSION['message']);
}
?>

</html>