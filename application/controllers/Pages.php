<?php

class Pages extends CI_Controller{
    public function __construct() {
        parent::__construct();

        $this->load->library("session");
        $this->load->helper("url");
    }

    public function index()
    {
        $data = [
            "title" => "Donation Corp."
        ];

        if($this->session->has_userdata("email")){
            $this->load->view("pages/index", $data);
        }else{
            $this->load->view("pages/index", $data);
        }
    }
}