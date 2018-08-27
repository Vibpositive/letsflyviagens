<?php

Class Typer_model extends CI_Model {
    
    private $table = "typer";



    public function get() {
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

    public function update($id, $data) {
        $this->db->where("id", $id);
        $this->db->update($this -> table, $data);
        return $this->db->affected_rows() == 1;
    }

    public function delete($id) {
        $this->db->where("id", $id);
        $this->db->delete($this -> table);
        return $this->db->affected_rows() == 1;
    }

    public function create($data) {
        $this->db->insert($this -> table, $data);
        // return $this->db->affected_rows() > 0;
        return $this->db->affected_rows() == 1;
    }

    

    // public function get_typer_item_by_id($id = 0) {
    //     $this->db->select('*');
    //     $this->db->where("id", $id);
    //     $this->db->from($this -> table);
    //     $query = $this->db->get();
    //     return $query -> result_array();
    // }

    // public function insert_into_typer($data) {
        
    //     $this->db->insert($this -> table, $data);
    //     return $this->db->affected_rows() > 0;

    // }

    
    
}

?>