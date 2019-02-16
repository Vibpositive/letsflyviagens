<?php

Class Home_model extends CI_Model {
    
    private $table = "typer";

    public function get_typer_items() {
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

?>
