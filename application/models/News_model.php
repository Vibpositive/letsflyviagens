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

    public function getnews()
    {
        $this->db->order_by("id", "desc");
        $query = $this->db->get('news', 3);
        
        // print_r($query->result_array());

        $result = $query->result();
        // echo random_element($result)->title;

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