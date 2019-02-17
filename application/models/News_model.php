<?php 

class News_model extends CI_Model
{
    public $id;
    public $title;
    public $body;
    public $date;
    
    public function __construct(){
        $this->load->database();
    }

    public function get($ammount = 3)
    {
		try {
			$this->db->order_by("id", "desc");
			$query = $this->db->get('news', $ammount);
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

    public function get_by_id($id = "")
    {
		try {
			$this->db->order_by("id", "desc");
			$this->db->where("id", $id);
			$query = $this->db->get('news', 1);

			$result = $query->row();
			
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
