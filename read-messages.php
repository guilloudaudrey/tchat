<?php

include_once 'classes/Message.php';
include_once 'classes/Database.php';
$db = new Database();

$liste = $db->readMessagesList();

echo(json_encode($db->readMessagesList()));

