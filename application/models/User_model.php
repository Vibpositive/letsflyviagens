<?php 

class User_model extends CI_Model
{
    private $table = "user";
    public $title;
    public $body;
    public $date;

    public function __construct(){
        $this->load->database();
    }

    public function get($email)
    {
		try {
			$this->db->select('*');
			$this->db->from($this -> table);
			$this->db->where('email', $email);
			$this->db->limit(1);

        	$query = $this->db->get();        	

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

    public function get_by_username($username)
    {
		try {
			$this->db->select('*');
			$this->db->where('username', $username);
			$this->db->limit(1);

        	$query = $this->db->get();        	

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

    public function create_user($email)
    {
		try {
			$user = new stdClass();
			$user -> username   = $email;
			$user -> password   = "";
			$user -> email      = $email;
			$this->db->insert($this -> table, $user);	

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
    
    public function newsletter($id)
    {
        $this->db->set('newsletter', 1);
        $this->db->where('id', $id);
        $this->db->update($this -> table);

		return $this->db->affected_rows();
		
		try {
			$this->db->set('newsletter', 1);
			$this->db->where('id', $id);
			$this->db->update($this -> table);
			
			$result = $this->db->affected_rows();
			
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
