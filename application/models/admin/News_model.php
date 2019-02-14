<?php

Class News_model extends CI_Model {
    
    private $table = "news";
    
    public function __construct(){
        $this->load->database();
    }
    
    public function get() {
        $this->db->select('*');
        $this->db->from($this -> table);
        $this->db->order_by("id", "desc");
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
        // TODO: remove image from dir
        $this->db->where("id", $id);
        $this->db->delete($this -> table);
        return $this->db->affected_rows() == 1;
    }
    
    public function create($data) {
		try {
			$this->db->insert($this -> table, $data);
			$db_error = $this->db->error();
			
			if ($db_error['code'] != 0) {
				throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
			}
			return $this->db->insert_id();
		} catch (Exception $e) {
			return $e->getMessage();
		}		
    }
       
}

?>
