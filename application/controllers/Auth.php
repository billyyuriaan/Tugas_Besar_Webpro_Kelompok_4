<?php

class Login extends CI_Controller{
    public function __construct() {
        parent::__construct();

        $this->load->helper("form", "url");
        $this->load->library("form_validation", "session");
    }

    public function index()
    {
        $data = [
            "title" => "Login"
        ];

        $this->load->view("pages/auth/login", $data);
    }

    public function login()
    {
        $this->form_validation->set_rules("email", "Password", "required");
        $this->form_validation->set_rules("psasword", "Password", "required");


        if ($this->form_validation->run() == FALSE) {
                $data = [
                    "title" => "Login",
                    "error" => "Failed To Login, Wrong Password Or Email, Please Try Again"
                ];
               $this->load->view("pages/auth/login", $data);
        } else{
            if ($this->User->checkUser()) {
                $data = $this->user->getUserByEmail($this->input->post("email"));

                $this->session->set_userdata("user", $data[0]["email"]);

                redirect(base_url());

            } else{
                $data = [
                    "title" => "Login",
                    "error" => "Failed To Login, Wrong Password Or Email, Please Try Again"
                ];
                
               $this->load->view("pages/auth/login", $data);
            }
            
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}