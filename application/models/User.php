<?php

class User extends CI_Model{
    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->library("session");
    }

    public function createUser()
    {
        
    }
}