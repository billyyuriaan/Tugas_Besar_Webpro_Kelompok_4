<?php

class Register extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }

    public function index()
    {
        $data = [
            "title" => "register"
        ];

        $this->load->view("pages/auth/register", $data);
    }

}