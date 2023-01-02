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
        $picture = $this->upload->data()['file_name'];

        $data = [
            "email" => $email,
            "password" => $password,
            "picture" => "http://localhost:8000/assets/uploads/" . $picture
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
        $this->db->select("*");
        $this->db->where("email", $email);

        $query = $this->db->get("user");

        return $query->result();
    }
    
    public function checkEmailAvailable($email)
    {
        $this->db->select("*");
        $this->db->where("email", $email);
        $this->db->limit(1);

        $query = $this->db->get("user");

        if ($query->num_rows() == 1) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function login()
    {
        $this->db->select("*");
        $this->db->where("email", $this->input->post("email"));
        $this->db->where("password", sha1($this->input->post("password")));
        $this->db->limit(1);

        $query = $this->db->get("user");

        if ($query->num_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function update()
    {
        $data = [
            "email" => $this->input->post("email"),
            "password" => $this->input->post("password"),
        ];

        $this->db->where("userId", $this->input->post("userId"));
        $this->db->update("user", $data);
    }
}