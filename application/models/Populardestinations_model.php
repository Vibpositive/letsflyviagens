<?php 

class Populardestinations_model extends CI_Model
{
    public $id;
    public $title;
    public $body;
    public $date;
    private $table = 'popular_destinations';

    public function __construct(){
        $this->load->database();

    }

    public function getpopulardestinations()
    {
        $this->db->order_by("id", "desc");
        $query = $this->db->get('popular_destinations', 9);
        
        // print_r($query->result_array());

        $result = $query->result();
        // echo random_element($result)->title;

        return $query->result();
    }
}