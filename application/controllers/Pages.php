<?php

class Pages extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }

    public function index()
    {
        $data = [
            "title" => "Donation Corp."
        ];

        $this->load->view("pages/index", $data);
    }
}