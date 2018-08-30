<?php 

class Quotes_model extends CI_Model
{

    private $table = 'quotes';

    public function __construct(){
        $this->load->database();
    }

    public function quote($array, $userid, $quote_type_id){
        
        if($array && $userid && $quote_type_id){
            $quotedata = array(
                'user_id' => $userid,
                'quote_type' => $quote_type_id,
            );
            
            $this->db->insert($this -> table, $quotedata);
            $quote_id = $this->db->insert_id();
            
            for ($i=0; $i < count($array); $i++) { 
                $array[$i]["quote_id"] = $quote_id;
            }
            
            if($quote_id){
                $this->db->insert_batch('quote_field', $array);
            }
        }else{
            return false;
        }
        return true;
    }
    
    public function get_quote_type_id($name){
        $this->db->select('id');
        $this->db->from('quote_type');
        $this->db->where('name', $name);
        $this->db->limit(1);
        $query = $this->db->get();

        return $query->row()->id;
    }

    public function get_current_page_records($limit, $start)
    {
        // SELECT q.id as quote_id, qt.name quote_type, u.id as user_id, u.username, q.created_at as date
        // FROM quotes q
        // INNER JOIN user u ON q.user_id = u.id
        // INNER JOIN quote_type qt ON q.quote_type = qt.id
        // GROUP BY q.id
        // ORDER BY q.created_at DESC;

        $this->db->select('q.id, u.username, qt.name as quote_type, q.created_at as date');
        $this->db->from('quotes as q');
        $this->db->join('user as u', 'q.user_id = u.id');
        $this->db->join('quote_type as qt', 'q.quote_type = qt.id');
        $this->db->group_by("q.id"); // Produces: GROUP BY title
        $this->db->order_by('quotes.created_at', 'DESC');

        $this->db->limit($limit, $start);
        $query = $this->db->get($this -> table);
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
             
            return $data;
        }
 
        return false;
    }
    
    public function get_total()
    {
        return $this->db->count_all($this->table);
    }
}