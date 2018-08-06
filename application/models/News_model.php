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

    public function insert_entry()
    {
        $this->title    = $_POST['title']; // please read the below note
        $this->body  = $_POST['body'];
        $this->date     = time();

        $this->db->insert('entries', $this);
    }

    public function update_entry()
    {
        $this->title    = $_POST['title'];
        $this->body  = $_POST['body'];
        $this->date     = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }
}