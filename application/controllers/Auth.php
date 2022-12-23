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
               $this->load->view("pages/login");
        } else{
            if ($this->User->checkUser()) {
                $data = $this->user->getUserByEmail($this->input->post("email"));

                $this->session->set_userdata("user", sha1($data[0]["email"]));

                $this->load->view("");

            } else{
                $this->session->set_flashdata("message", "Login Failed");

                $this->load->view("pages/login");
            }
            
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}