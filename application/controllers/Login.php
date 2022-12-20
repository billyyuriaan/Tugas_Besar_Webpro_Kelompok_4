<?php

class Login extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }

    public function index()
    {
        $data = [
            "title" => "Login"
        ];

        $this->load->view("pages/auth/login", $data);
    }


}