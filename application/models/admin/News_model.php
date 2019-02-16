<?php

Class News_model extends CI_Model {
    
    private $table = "news";
    
    public function __construct(){
        $this->load->database();
    }
    
    public function get() {
		try {
			$this->db->select('*');
			$this->db->from($this -> table);
			$this->db->order_by("id", "desc");
			$query = $this->db->get();
			$result = $query -> result_array();
			
            $db_error = $this->db->error();
            if ($db_error['code'] != 0) {
				throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
            }
            
			return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function get_by_id($id = 0) {
		try {
			$this->db->select('*');
			$this->db->where("id", $id);
			$this->db->from($this -> table);
			$query = $this->db->get();
			$result = $query -> result_array();
			
            $db_error = $this->db->error();
            if ($db_error['code'] != 0) {
				throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
            }
            
			return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function update($id, $data) {
		try {
			$this->db->where("id", $id);
			$this->db->update($this -> table, $data);
			
			$result = $this->db->affected_rows() == 1;

            $db_error = $this->db->error();
            if ($db_error['code'] != 0) {
				throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
            }
            
			return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
		
    }
    
    public function delete($id) {
		// TODO: remove image from dir - reported
		try {
			$this->db->where("id", $id);
        	$this->db->delete($this -> table);
			
			$result = $this->db->affected_rows() == 1;

            $db_error = $this->db->error();
            if ($db_error['code'] != 0) {
				throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
            }
			return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function create($data) {
		try {
			$this->db->insert($this -> table, $data);
			
			$result = $this->db->insert_id();

            $db_error = $this->db->error();
            if ($db_error['code'] != 0) {
				throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
            }
			return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
	}

}

?>
