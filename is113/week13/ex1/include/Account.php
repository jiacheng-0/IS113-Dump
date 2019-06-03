<?php

// DO NOT MODIFY THIS FILE

class Account {

    private $id;
    private $email;
    private $fullname;
    private $pass;
    
    public function __construct($id, $email, $fullname, $pass) {
        $this->id = $id;
        $this->email = $email;
        $this->fullname = $fullname;
        $this->pass = $pass;
    }

    public function getID() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getFullname() {
        return $this->fullname;
    }

    public function getPass() {
        return $this->pass;
    }
}

?>