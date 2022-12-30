<?php

class Donate extends CI_Model{
    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->model("User");
    }

    public function getAll()
    {
        $this->db->select("*");

        $query = $this->db->get("donate");

        return $query->result();
    }

    public function getByEmail($email)
    {
        $this->db->select("donate.donateTO,donate.ammout,donate.message,donate.alias,donate.payMethode,donate.donateDate");
        $this->db->join("donate", "user.userId = donate.userId");
        $this->db->where("user.email", $email);

        $query = $this->db->get("user");

        return $query->result();
    }

    public function createDonate()
    {
        $data = [
            "userId" => $this->User->getUserByEmail($this->session->userdata("user"))[0]->userId,
            "donateTo" => $this->input->post("donate"),
            "ammout" => $this->input->post("nominal"),
            "message" => $this->input->post("message"),
            "alias" => $this->input->post("from"),
            "PayMethode" => "GOPAY",
            "donateDate" => $this->input->post("time")
        ];

        $this->db->insert("donate", $data);
    }
}