<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Database
 *
 * @author guilloud
 */
class Database {

    private $pdo;

    function __construct() {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=ajax-chat', 'ajax-chat-user', 'simplon');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo 'fail to connect DB: ' . $e->getMessage();
            exit(1);
        }
    }

    public function createMessage(Message $message) {
        $date = $message->getDate()->format('Y-m-d H:i:s');
        $text = $message->getContent();

        $stmt = $this->pdo->prepare('INSERT INTO message(date, text) VALUES(:date, :text);');
        $stmt->bindValue('date', $date);
        $stmt->bindValue('text', $text);

        if ($stmt->execute()) {

            $message->setId(intval($this->pdo->lastInsertId()));
            return TRUE;
        }
        return FALSE;
    }

    //parcourir les posts
    public function readMessagesList(): Array {

        $stmt = $this->pdo->query('SELECT * FROM message');
        $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($messages);
        //$messageslist = [];
        //foreach ($messages as $message) {
        //$id = $message['id'];
        //$date = $message['date'];
        //  $text = $post['text'];
        //$newmessage = new Post($text);
        //$messageslist[] = $newmessage;
        //}
        //return $newmessage;
    }

}
