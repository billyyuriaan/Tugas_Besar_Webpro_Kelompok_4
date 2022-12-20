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

        $this->load->view("pages/index", $data);
    }
}