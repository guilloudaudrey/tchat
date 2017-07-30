<?php
include_once 'classes/Message.php';

if (isset($_POST['message'])){
$text = $_POST['message'];

$message = new Message($text);
echo $message->asHtml();


//echo 'yo! '. $text;
} else {

    //pour renvoyer code http
    http_response_code(400);
    header('Content-Type:text/plain');
    echo 'erreur';
}

