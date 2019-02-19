<?php

class Currency_model extends CI_Model
{
    private $table = "currency";
    
    public function get_currency_id($name)
    {
        try {
            $this->db->select('*');
            $this->db->where("name", $name);
            // $this->db->where("name", "USD");
			$this->db->from($this -> table);
			
            $query = $this->db->get();
            
			$db_error = $this->db->error();
			
			$row = $query -> row();
			
            if ($db_error['code'] != 0) {
                throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
			}
			
			if (isset($row))
			{
				return $query -> row() -> id;
			}else{
				// return $this -> get_currency_id("USD");
				return null;
			}
			
        } catch (Exception $e) {
			return null;
        }
    }
    
    public function get_currency($name)
    {
        try {
            $this->db->select('*');
            $this->db->where("name", $name);
            $this->db->from($this -> table);
            
            $query = $this->db->get();
            $db_error = $this->db->error();
            
            if ($db_error['code'] != 0) {
                throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
            }
            
            return $query;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function get_currencies()
    {
        try {
            $this->db->select('*');
            $this->db->from($this -> table);
            
            $query = $this->db->get();
            $db_error = $this->db->error();
            
            if ($db_error['code'] != 0) {
                throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
            }
            
            return $query -> result_array();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
