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

    public function getnews($ammount = 3)
    {
        $this->db->order_by("id", "desc");
        $query = $this->db->get('news', $ammount);
        $result = $query->result();
        return $query->result();
    }

    public function getpost($id = "")
    {
        $this->db->order_by("id", "desc");
        $this->db->where("id", $id);
        $query = $this->db->get('news', 1);
        
        // return $query->result();
        // print_r($query->row());
        return $query->row();
    }
    
}