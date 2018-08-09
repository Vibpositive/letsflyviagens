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

    public function getpopulardestinations($amount = 9)
    {
        $this->load->helper('text');
        $this->load->helper('date');

        $this->db->order_by("created_at", "desc");

        $query = $this->db->get('popular_destinations', $amount);
        return $query->result();
    }
}