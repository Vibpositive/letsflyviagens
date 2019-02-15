<?php

class Currency_model extends CI_Model
{
    private $table = "currency";

    public function get_currency_id($name)
    {
        $this->db->select('*');
        $this->db->where("name", $name);
        $this->db->from($this -> table);
		$query = $this->db->get();
        return $query -> row() -> id;
    }

    public function get_currency($name)
    {
        $this->db->select('*');
        $this->db->where("name", $name);
        $this->db->from($this -> table);
        $query = $this->db->get();
        return $query -> result();
    }

    public function get_currencies()
    {
        $this->db->select('*');
        $this->db->from($this -> table);
        $query = $this->db->get();
        return $query -> result_array();
    }
}
