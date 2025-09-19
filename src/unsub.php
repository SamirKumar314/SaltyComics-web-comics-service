<?php
session_start();
require_once '../db/config.php';
require_once 'functions.php';

$message = '';

//PRG pattern: check for form submission
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(isset($_POST['send-code'])){
        $email = trim($_POST['email'] ?? '');
        
        if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
            $code = generateVerificationCode();
            $type = 'verify';
            $_SESSION['unsubscribe_code'] = $code;
            $_SESSION['unsubscribe_email'] = $email;
            
            if(sendVerificationEmail($email, $code, $type)){
                $_SESSION['message'] = 'Verification code has been sent to your email';
            }else{
                $_SESSION['message'] = 'Failed to send verification code to your email';
            }
            header('location: unsub.php');
            exit;

        }else{
            $_SESSION['message'] = 'Please enter valid email address';
            header('location: unsub.php');
            exit;
        }
    }
    
    if(isset($_POST['unsub-confirm'])){
        $email = trim($_POST['unsub-email'] ?? '');
        $inputCode = trim($_POST['v-code'] ?? '');
        $sessionEmail = $_SESSION['unsubscribe_email'] ?? '';
        $sessionCode = $_SESSION['unsubscribe_code'] ?? '';

        if($email === $sessionEmail && $inputCode === $sessionCode){
            //removes the email from database...
            $result = unsubscribeEmail($conn, $email);
            //shows message depending on the conditions..
            if($result === 'success'){
                $_SESSION['message'] = 'You have been Un-subscribed.';
            }else if($result === 'not_found'){
                $_SESSION['message'] = 'Email does not exists, or is already Un-subscribed.';
            }else if($result === 'error'){
                $_SESSION['message'] = 'Something went wrong! Please try again.';
            }

            //clear session variables
            unset($_SESSION['unsubscribe_email'], $_SESSION['unsubscribe_code']);
            
            header('location: unsub.php');
            exit;

        }else{
            $_SESSION['message'] = 'Verification code or email does not match.';
            header('location: unsub.php');
            exit;
        }
    }
}

//PRG pattern: shows messages if any
if(isset($_SESSION['message'])){
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../assets/chatBubble.png">
    <title>Subscription - SaltyComics</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<body>
    <!-- alert() messages with special characters allowed -->
    <?php if(!empty($message)): ?>
        <script>alert("<?= htmlspecialchars($message) ?>");</script>
    <?php endif; ?>


    <!-- top nav-bar -->
    <?php
        $activePage = 'unsub';
        include __DIR__ . '/components/navbar.php';
    ?>
    

    <!-- input form -->
    <div class="container">
        <h1 class="mt-5 mb-0">Manage Subscription</h1>
        <span class="form-text mb-3">To cancel your Subscription, follow the steps below:</span>

        <!-- input->email=sends code -->
        <form method="post" class="col-lg-7">
            <div class="mb-3 mt-3">
                <label class="form-label mb-1" for="email">Step 1: Email address</label>
                <input type="email" name="email" id="email" class="form-control form-control-lg border-2" placeholder="example@domain.com" required>                
            </div>
            <button type="submit" name="send-code" id="send-code" class="btn btn-success">Send code</button>
        </form>

        <!-- input->email+code=unsubscribe -->
        <form method="post" class="mb-3 col-lg-7">
            <div class="mb-2 mt-5">
                <label class="form-label mb-1" for="unsub-email">Step 2: Confirm your Email and Verification code</label>
                <input type="email" name="unsub-email" id="unsub-email" class="form-control form-control-lg border-2" placeholder="Same email as above" required>
            </div>
            <div class="mb-3">
                <input type="text" name="v-code" id="v-code" class="form-control form-control-lg border-2" placeholder="Enter the 6-digit code" maxlength="6" required>
            </div>
            <button type="submit" name="unsub-confirm" class="btn btn-danger">Unsubscribe Email</button>

        </form>
    </div>

    <!-- Bootstrap JS & Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    
<?php include __DIR__ . '/components/footer.html'; ?>
</body>

</html>