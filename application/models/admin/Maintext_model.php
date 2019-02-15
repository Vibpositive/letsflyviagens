<?php

Class  Maintext_model extends CI_Model {
    
    private $table = "home_maintext";

    public function __construct(){
        $this->load->database();
    }
    
    public function get($random = false) {
        $this->db->select('*');
        $this->db->from($this -> table);
        $query = $this->db->get();
        
        if($random === true){
            $this->db->select('*');
            $this->db->from($this -> table);
            $query = $this->db->get();
            $shuffled_query = $query->result_array();
            shuffle ($shuffled_query);
    
            foreach ($shuffled_query as $row) {
                if(count($shuffled_query) > 1){
                    array_pop($shuffled_query);
                }
            }
            return $shuffled_query;
        }

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
        return $this->db->affected_rows() == 1;
    }
    
    
}

?>