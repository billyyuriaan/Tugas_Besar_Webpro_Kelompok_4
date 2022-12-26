<?php

class DonateController extends CI_Controller{
    public function __construct() {
        parent::__construct();

        $this->load->helper("form");
        $this->load->helper("url");
        $this->load->model("User");
        $this->load->model("Donate");
        $this->load->library("session");
        $this->load->library("form_validation");
    }

    public function index()
    {
        if ($this->session->has_userdata("user")){
            $this->form_validation->set_rules("email", "Email", "required");

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata("error", "Failed To Donate, Please Try Again");
                redirect(base_url());
            } else {
                $this->Donate->createDonate();
                $this->session->set_flashdata("message", "Your Donation Has Been Recieved");
                redirect(base_url());
            }
            

        }else{
            redirect(base_url());
        }
    }
}