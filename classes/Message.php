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
    protected $content;
    protected $date;
    protected $author;
    
    function __construct($content) {
        $this->content = $content;
        $this->date = new DateTime;
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


    function asHtml(){
        return $this->content .$this->date->format('d/m/y à H:i');
    }
}
