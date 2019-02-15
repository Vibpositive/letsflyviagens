<?php

Class Home_model extends CI_Model {
    
    private $table = "typer";

    public function get_section_1() {
        $this->db->select('*');
        $this->db->from($this -> table);
        $query = $this->db->get();
        return $query -> result_array();
    }

    public function get_by_id($id = 0) {
        $this->db->select('*');
        $this->db->where("id", $id);
        $this->db->from($this -> table);
        $query = $this->db->get();
        return $query -> result_array();
    }

    public function insert_into_typer($data) {
        
        $this->db->insert($this -> table, $data);
        return $this->db->affected_rows() > 0;

    }
    
}

?>