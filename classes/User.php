<?php

class User {

    protected $id;
    protected $pseudo;
    protected $mdp;

    function __construct($pseudo, $mdp, $id = NULL) {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->mdp = $mdp;
    }

    function getId() {
        return $this->id;
    }

    function getPseudo() {
        return $this->pseudo;
    }

    function getMdp() {
        return $this->mdp;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }

    function setMdp($mdp) {
        $this->mdp = $mdp;
    }

    function asHtml() {
        return '<p>' . $this->pseudo . '</p>';
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
