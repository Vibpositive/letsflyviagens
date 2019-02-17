<?php 

class Populardestinations_model extends CI_Model
{
	
    public function __construct(){
        $this->load->database();
    }

    public function get($amount = 9)
    {
		try {
			$this->db->order_by("created_at", "desc");

        	$query = $this->db->get('popular_destinations', $amount);			

			$result = $query->result();
			
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
