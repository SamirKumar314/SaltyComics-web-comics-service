<?php
/**
 * Register an email (stores the email in the database)
 */
function registerEmail(mysqli $conn, string $email): bool {

    //checking if email already exists...
    $stmt = $conn->prepare("SELECT id FROM subscribers WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    //if already exists then 
    if($stmt->num_rows > 0){
        $stmt->close();
        return false;
    }
    $stmt->close();
    
    //insert new email...
    $stmt = $conn->prepare("INSERT INTO subscribers (email) VALUES (?)");
    $stmt->bind_param("s", $email);
    $result = $stmt->execute();
    $stmt->close();

    return $result;
}

/* 
 * generates random 6-digit code
 */
function generateVerificationCode(): string {
    return str_pad((string)random_int(0, 999999), 6, '0', STR_PAD_LEFT);
}

/* 
 * Sends verification code to an email
 */
function sendVerificationEmail(string $email, string $code, string $type, int $comicNum = 0): bool {

    $subject = '';
    $body = '';

    //different mail formats...
    if($type === 'verify'){
        $subject = 'Confirm Un-subscription';
        $body = "<p>To confirm un-subscription, use this code: <strong>$code</strong></p>";
    }elseif($type === 'comic'){
        $subject = 'Daily SaltyComics : #' . $comicNum;
        $body = $code;   //this here is html comic content
    }

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8\r\n";
    $headers .= "From: XKCD Mail Service <no-reply@example.com>\r\n";
    $headers .= "Reply-To: no-reply@example.com\r\n";

    mail($email, $subject, $body, $headers);
    return true;
}


/* 
 * unsubscribes the email(removes from databsse)
 */
function unsubscribeEmail(mysqli $conn, string $email): string {
    // Implement this function...
    $stmt = $conn->prepare("DELETE FROM subscribers WHERE email = ?");

    if(!$stmt){
        return 'error';  //SQL error
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();

    if($stmt->affected_rows > 0){
        $stmt->close();
        return 'success';  //email successfuly removed from db
    }else{
        $stmt->close();
        return 'not_found';  //email does not exists
    }

}

/* 
 * send comics to all the emails in db
 */
function sendComicsToSubscribers(mysqli $conn): bool {
    //fetch comic html amd number...
    $comicData = fetchAndFormatComicData();
    $comicHTML = $comicData['html'];
    $comicNum = $comicData['num'];
    $type = 'comic';

    //get all subscribers...
    $queryResult = $conn->query("SELECT email FROM subscribers");
    
    if($queryResult && $queryResult->num_rows > 0){
        while($row = $queryResult->fetch_assoc()) {
            $email = $row['email'];
            //sends the mail...
            sendVerificationEmail($email, $comicHTML, $type, $comicNum);
        }
    }else{
        echo "No subscribers found.";
        return false;
    }
    return true;
}


/*
 * Fetch random XKCD comic and format data as HTML.
 */
function fetchAndFormatComicData(): array {
    //get latest comic to determine the upper limit...
    $latestData = @file_get_contents('https://xkcd.com/info.0.json');
    if(!$latestData){
        return ['html' => '<p>Could not fetch XKCD comic data.</p>', 'num' => null];
    }

    $latestComic = json_decode($latestData, true);
    $maxNum = $latestComic['num'];

    //get a random comic number
    $randomNum = rand(1, $maxNum);

    //fetch the random comic JSON
    $comicData = @file_get_contents("https://xkcd.com/{$randomNum}/info.0.json");    /*used double quotes which allows special characters*/
    if(!$comicData){
        return ['html' => '<p>Failed to retrieve comic.</p>', 'num' => null];
    }
    
    $comic = json_decode($comicData, true);
    $imgUrl = htmlspecialchars($comic['img'] ?? '');
    $altText = htmlspecialchars($comic['alt'] ?? '');

    //build html format for mail...
    $html = "<h2>SaltyComic #$randomNum</h2>
            <img src=\"$imgUrl\" alt=\"SaltyComic\" title=\"$altText\">
            <p><a href=\"http://localhost/saltycomics/src/unsub.php\" id=\"unsubscribe-button\">Unsubscribe</a></p>";

    //return HTML format
    return ['html' => $html, 'num' => $randomNum, 'imgUrl' => $imgUrl, 'altText' => $altText];
}

function fetchLatestComic(int $item): array {
    $latestInfo = @file_get_contents('https://xkcd.com/info.0.json');
    if(!$latestInfo){
        return ['num' => null, 'altText' => '<p>Could not fetch comic data.</p>'];
    }
    $latestComic = json_decode($latestInfo, true);
    $maxNum = $latestComic['num'];  //determining the latest comic(max value)

    //number of items on the carousel (i.e. '3')
    if($item == 0){
        $n1 = $maxNum;
        $comicData = @file_get_contents("https://xkcd.com/{$n1}/info.0.json");
        if(!$comicData){
            return ['num' => null];
        }
    }elseif($item == 1){
        $n1 = $maxNum-1;
        $comicData = @file_get_contents("https://xkcd.com/{$n1}/info.0.json");
        if(!$comicData){
            return ['num' => null];
        }
    }elseif($item == 2){
        $n1 = $maxNum-2;
        $comicData = @file_get_contents("https://xkcd.com/{$n1}/info.0.json");
        if(!$comicData){
            return ['num' => null];
        }
    }else{
        return ['num' => null, 'altText' => '<p>This item doee not exists.</p>'];
    }
    $comic = json_decode($comicData, true);
    $imgUrl = htmlspecialchars($comic['img'] ?? '');
    $altText = htmlspecialchars($comic['alt'] ?? '');    
    //return the comic data...
    return ['num' => $n1, 'imgUrl' => $imgUrl, 'altText' => $altText];
}

?>