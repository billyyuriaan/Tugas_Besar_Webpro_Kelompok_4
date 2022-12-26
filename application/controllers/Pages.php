<?php

class Pages extends CI_Controller{
    public function __construct() {
        parent::__construct();

        $this->load->library("session");
        $this->load->helper("url");
        $this->load->model("User");
    }

    public function index()
    {
        // if($this->session->has_userdata("email")){
        //     $data = [
        //         "title" => "Donation Corp."
        //     ];

        //     $this->load->view("pages/index", $data);
        // }else{
        //     $data = [
        //         "title" => "Donation Corp.",
        //         "data" => $this->User->getUserByEmail($this->session->userdata("email")),
        //     ];

        //     $this->load->view("pages/dashboard/index", $data);
        // }

        $data = [
            "title" => "Donation Corp."
        ];
        
        $this->load->view("pages/dashboard/index", $data);
    }

    public function login()
    {
        $data = [
            "title" => "Login Donation Corp."
        ];

        $this->load->view("pages/auth/login", $data);
    }
}