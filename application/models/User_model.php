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

    public function get_user($email)
    {
        $this->db->select('id');
        $this->db->from('user');
        $this->db->where('email', $email);
        $this->db->limit(1);
        $query = $this->db->get();

        return $query->row();
    }

    public function create_user($email)
    {
        $user = new stdClass();
        $user -> username   = $email;
        $user -> password   = "";
        $user -> email      = $email;
        $this->db->insert($this -> table, $user);
        return $this->db->insert_id();
    }
    
}