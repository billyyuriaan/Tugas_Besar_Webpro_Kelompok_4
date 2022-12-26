<?php

class Pages extends CI_Controller{
    public function __construct() {
        parent::__construct();

        $this->load->library("session");
        $this->load->helper("url");
        $this->load->model("User");
        $this->load->model("Donate");
    }

    public function index()
    {
        if($this->session->has_userdata("user")){
            $data = [
                "title" => "Donation Corp.",
                "data" => $this->User->getUserByEmail($this->session->userdata("user")),
            ];

            // var_dump($data);
            $this->load->view("pages/dashboard/index", $data);
        }else{
            $data = [
                "title" => "Donation Corp."
            ];

            $this->load->view("pages/index", $data);
        }
    }

    public function login()
    {
        $data = [
            "title" => "Login Donation Corp."
        ];

        $this->load->view("pages/auth/login", $data);
    }

    public function history()
    {
        if ($this->session->has_userdata("user")) {
            $data = [
                "title" => "Login Donation Corp.",
                "datas" => $this->Donate->getByEmail($this->session->userdata("user"))
            ];

            // var_dump($data);
            $this->load->view("pages/dashboard/viewDonation", $data);
        } else {
            redirect(base_url());
        }
        
    }
}