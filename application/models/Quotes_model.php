<?php 

class Quotes_model extends CI_Model
{

    public function __construct(){
        $this->load->database();
    }

    public function quote($array, $userid, $quote_type_id){
        
        if($array && $userid && $quote_type_id){
            $quotedata = array(
                'user_id' => $userid,
                'quote_type' => $quote_type_id,
            );
            
            $this->db->insert('quotes', $quotedata);
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
    
}