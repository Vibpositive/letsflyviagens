<?php 

class Quotes_model extends CI_Model
{

    private $table              = 'quotes';
    private $table_quote_type   = 'quote_type';
    private $table_respomse     = 'quote_answer';
    private $table_cost         = 'quote_answer_cost';

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
        $this->db->select('id') ;
        $this->db->from($this ->able_quote_type);
        $this->db->where(   'name', $name);
        $this->db->limit(   1);
        $query = $this->db->get();

        return $query->row()->id;
    }

    public function get_quote_by_id($id){

        $this->db->select('q.id, u.username, qt.name as quote_type, q.created_at as date, qf.field_name as field_name, qf.field_value as field_value');
        $this->db->from('quotes as q');
        $this->db->join('user as u', 'q.user_id = u.id');
        $this->db->join('quote_type as qt', 'q.quote_type = qt.id');
        $this->db->join('quote_field as qf', 'q.id = qf.quote_id');
        $this->db->where("q.id", $id);
        
        $query = $this->db->get();
        
        // print_r($this->db->last_query());
        return $query->result_array();
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

    public function insert_response($quote_id = 0, $response_array){
        $this->db->insert($this -> table_respomse, $response_array);
        return $this->db->insert_id();
    }

    public function insert_response_cost($quote_id = 0, $cost_array){
        $this->db->insert($this -> table_cost, $cost_array);
        return $this->db->insert_id();
    }
    
    public function get_total()
    {
        return $this->db->count_all($this->table);
    }
}