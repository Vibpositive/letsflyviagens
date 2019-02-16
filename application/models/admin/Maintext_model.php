<?php

Class  Maintext_model extends CI_Model {
    
    private $table = "home_maintext";

    public function __construct(){
        $this->load->database();
    }
    
    public function get($random = false) {
		try {
			$this->db->select('*');
			$this->db->from($this -> table);
			$query = $this->db->get();
			$result = $query->result_array();
			
			if($random === true){

				shuffle ($result);
		
				foreach ($result as $row) {
					if(count($result) > 1){
						array_pop($result);
					}
				}	
			}
			
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
}

?>
