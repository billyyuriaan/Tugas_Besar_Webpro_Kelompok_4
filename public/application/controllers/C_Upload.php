<?php

class C_Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
               
               $this->load->helper("form");
               $this->load->helper("url");
               $this->load->model("User");
               $this->load->library("session");
               $this->load->library("form_validation");
        }

        public function index()
        {
                $this->load->view("pages/auth/register", array("title" => "Register Donation Corp."));
        }

       
        public function do_upload()
        {
                $this->form_validation->set_rules("email", "Password", "required");
                $this->form_validation->set_rules("psasword", "Password", "required");

                $config['upload_path'] = "./assets/uploads";
                $config['allowed_types'] = "jpg|png|jpeg|gif"; 
                $config['max_size'] =  1000;
                $config['max_width'] =  1024;
                $config['max_height'] =  768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile') && $this->form_validation->run() == FALSE)
                {
                        $data = [
                                "title" => "Register Donation Corp.",
                                "error" => $this->upload->display_errors()
                        ];

                        $this->load->view('pages/auth/register', $data);

                }else{

                        if ($this->User->checkEmailAvailable($this->input->post("email"))) {
                                $this->User->createUser();

                                $data = [
                                        "message" => "Register Was Successful, now try to login",
                                        "title" => "Register Donation Corp.",
                                ];

                                $this->session->set_flashdata("message", "Register Success");

                                $this->load->view("pages/auth/register", $data);
                        } else {
                                $data = [
                                        "title" => "Register Donation Corp.",
                                        "error" => "User Email Is Already Exist"
                                ];
        
                                $this->load->view('pages/auth/register', $data);
                        }
                }
        }

        public function updateUser()
        {
                $this->form_validation->set_rules("email", "Password", "required");
                $this->form_validation->set_rules("psasword", "Password", "required");

                $config['upload_path'] = "./assets/uploads";
                $config['allowed_types'] = "jpg|png|jpeg|gif"; 
                $config['max_size'] =  1000;
                $config['max_width'] =  1024;
                $config['max_height'] =  768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile') && $this->form_validation->run() == FALSE)
                {
                        $data = [
                                "title" => "Register Donation Corp.",
                                "error" => $this->upload->display_errors(),
                                "data" => $this->User->getUserByEmail($this->session->userdata("user"))
                        ];

                        $this->load->view('pages/user/updateUser', $data);

                }else{
                        $this->User->update();

                        $data = [
                                "message" => "Account update Was Successful",
                                "title" => "Update Donation Corp.",
                                "data" => $this->User->getUserByEmail($this->session->userdata("user"))
                        ];


                        redirect(base_url());
                }
        }
}
