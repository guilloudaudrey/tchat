<?php
$messages = [];

if (isset($_POST['message'])){
$text = $_POST['message'];
$messages[] = $text;
foreach($messages as $message)
echo json_encode($messages);

//echo 'yo! '. $text;
} else {

    //pour renvoyer code http
    http_response_code(400);
    header('Content-Type:text/plain');
    echo 'erreur';
}

