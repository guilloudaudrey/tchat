<?php
session_start();

include_once 'classes/Message.php';
include_once 'classes/Database.php';
$db = new Database();

if (isset($_POST['message'])){
$text = $_POST['message'];

$message = new Message($text);
$db->createMessage($message);
echo $message->asHtml();

//echo 'yo! '. $text;
} else {
    //pour renvoyer code http
    http_response_code(400);
    header('Content-Type:text/plain');
    echo 'erreur';
}

