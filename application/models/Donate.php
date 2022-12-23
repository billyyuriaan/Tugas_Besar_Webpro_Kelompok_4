<?php

class Donate extends CI_Model{
    public function __construct() {
        parent::__construct();

        $this->load->database();
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
        $this->db->from("user");
        $this->db->join("donate", "user.userId = donate.userId");
        $this->db->where("user.email", $email);

        $query = $this->db->get();

        return $query->result();
    }
}