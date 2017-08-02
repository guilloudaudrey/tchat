 <?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Message
 *
 * @author guilloud
 */
class Message {
    protected $id;
    protected $content;
    protected $date;
    protected $author;
    
    function __construct($content) {
        $this->content = $content;
        $this->date = new DateTime();
    }
    
    function getContent() {
        return $this->content;
    }

    function getDate() {
        return $this->date;
    }

    function setContent($content) {
        $this->content = $content;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function getId() {
        return $this->id;
    }

    function getAuthor() {
        return $this->author;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setAuthor($author) {
        $this->author = $author;
    }

        function asHtml(){
        return '<p>'.$this->content .'</p><p>'.$this->date->format('d/m/y à H:i').'</p>';
    }
    
    //function JSONserialize
}
