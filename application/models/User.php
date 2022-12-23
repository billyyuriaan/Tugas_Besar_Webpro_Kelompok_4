<?php

class User extends CI_Model{
    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->library("session");
    }

    public function createUser()
    {
        $email = $this->input->post('email');
        $password = sha1($this->input->post("password"));

        $data = [
            "email" => $email,
            "password" => $password
        ];

        $this->db->insert("user", $data);
    }

    public function checkUser()
    {
        $email = $this->input->post('email');
        $password = sha1($this->input->post("password"));

        $this->db->select("*");
        $this->db->where("email", $email);
        $this->db->where("password", $password);

        $query = $this->db->get("user");

        if ($query->num_rows() == 1) {
            return TRUE;
        }else {
            return FALSE;
        }
    }

    public function getUserByEmail($email)
    {
        $this->db->select("email");
        $this->db->where("email", $email);

        $query = $this->db->get("user");

        return $query->result();
    }
    
    public function checkEmailAvailable($email)
    {
        $this->db->select("*");
        $this->db->where("email", $email);

        $query = $this->db->get("user");

        if ($query->num_rows() == 1) {
            return FALSE;
        } else {
            return TRUE;
        }
        
    }
}