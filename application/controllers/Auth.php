<?php

class Auth extends CI_Controller{
    public function __construct() {
        parent::__construct();

        $this->load->helper("form", "url");
        $this->load->model("User");
        $this->load->library("form_validation", "session");
    }

    public function login()
    {
        $this->form_validation->set_rules("email", "Email", "required");
        $this->form_validation->set_rules("password", "Password", "required");


        if ($this->form_validation->run() == FALSE) {
                $data = [
                    "title" => "Login",
                    "error" => "Email And Password Cannot Be Empty"
                ];
               $this->load->view("pages/auth/login", $data);
        } else{
            if ($this->User->login()) {
                $this->session->set_userdata("user", $this->input->post("email"));

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