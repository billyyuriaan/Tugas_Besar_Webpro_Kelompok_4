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

            // var_dump($this->User->getUserByEmail($this->session->user)[0]->userType);
            if ($this->User->getUserByEmail($this->session->user)[0]->userType == "1") {
                $data = [
                    "title" => "Login Donation Corp.",
                    "datas" => $this->Donate->getAll(),
                    "count" => $this->Donate->getCount(date('m'))
                ];
    
                // var_dump($data);
                $this->load->view("pages/dashboard/viewDonation", $data);
            }else{
                $data = [
                    "title" => "Login Donation Corp.",
                    "datas" => $this->Donate->getByEmail($this->session->userdata("user"))
                ];
    
                // var_dump($data);
                $this->load->view("pages/dashboard/viewDonation", $data);
            }
        } else {
            redirect(base_url());
        }
        
    }

    public function updateUser()
    {
        if ($this->session->has_userdata("user")){
            $data = [
                "title" => "Update User",
                "data" => $this->Donate->getByEmail($this->session->userdata("user"))
            ];
            
            $this->load->view("pages/user/updateUser", $data);
        }else {
            redirect(base_url());
        }
    }
}