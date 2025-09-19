<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand mb-0 h1" href="index.php">
            <img src="../assets/chatBubble.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            SALTYCOMICS
        </a>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 nav nav-underline">
                <li class="nav-item">
                <a class="nav-link <?= ($activePage === 'home') ? 'active' : '' ?>" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link <?= ($activePage === 'signup') ? 'active' : '' ?>" aria-current="page" href="signup.php">Sign-up</a>
                </li>
                <li class="nav-item">
                <a class="nav-link  <?= ($activePage === 'unsub') ? 'active' : '' ?>" href="unsub.php">Subscription</a>
                </li>                                
            </ul>            
        </div>
    </div>
</nav>