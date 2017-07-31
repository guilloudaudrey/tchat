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
    public function readPostsList(): Array {

        $stmt = $this->pdo->query('SELECT * FROM post INNER JOIN user ON post.author = user.id');
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $postslist = [];
        foreach ($posts as $post) {
            $title = $post['title'];
            $categorie = $post['categorie'];
            $date = $post['date'];
            $description = $post['description'];
            $localisation = $post['localisation'];
            $price = $post['price'];
            $typeannonce = $post['typeannonce'];
            $author = $post['pseudo'];
            $id = $post['id'];

            $newpost = new Post($title, $description, $price, $author, $categorie, $localisation, $typeannonce, $id);
            $postslist[] = $newpost;
        }
        return $postslist;
    }
}
