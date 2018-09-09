<?php 

class Quotes_model extends CI_Model
{

    private $table              = 'quotes';
    private $table_quote_type   = 'quote_type';
    private $table_response     = 'quote_answer';
    private $table_cost         = 'quote_answer_cost';

    public function __construct()
    {
        $this->load->database();
    }

    public function quote($array, $userid, $quote_type_id)
    {
        
        if($array && $userid && $quote_type_id)
        {
            $quotedata = array(
                'user_id' => $userid,
                'quote_type' => $quote_type_id,
            );
            
            $this->db->insert($this -> table, $quotedata);
            $quote_id = $this->db->insert_id();
            
            for ($i=0; $i < count($array); $i++) { 
                $array[$i]["quote_id"] = $quote_id;
            }
            
            if($quote_id)
            {
                $this->db->insert_batch('quote_field', $array);
            }
        }else{
            return false;
        }
        return true;
    }
    
    public function get_quote_type_id($name)
    {
        $this->db->select('id');
        $this->db->from($this ->able_quote_type);
        $this->db->where('name', $name);
        $this->db->limit(1);
        $query = $this->db->get();

        return $query->row()->id;
    }

    public function get_quote_by_id($id)
    {
        $this->db->select('q.id, u.username, qt.name as quote_type, q.created_at as date, qf.field_name as field_name, qf.field_value as field_value');
        $this->db->from('quotes as q');
        $this->db->join('user as u', 'q.user_id = u.id');
        $this->db->join('quote_type as qt', 'q.quote_type = qt.id');
        $this->db->join('quote_field as qf', 'q.id = qf.quote_id');
        $this->db->where("q.id", $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_current_page_records($limit, $start)
    {
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

    public function insert_response($quote_id = 0, $response_array)
    {
        $this->db->insert($this -> table_response, $response_array);
        return $this->db->insert_id();
    }

    public function insert_response_cost($cost_array)
    {
        $this->db->insert($this -> table_cost, $cost_array);
        return $this->db->insert_id();
    }

    public function update_response($response_array, $id)
    {
        $localizador            = $response_array['localizador'];
        $airline                = $response_array['airline'];
        $flight                 = $response_array['flight'];
        $departure_datetime     = $response_array['departure_datetime'];
        $arrival_datetime       = $response_array['arrival_datetime'];
        $class                  = $response_array['class'];
        $origin                 = $response_array['origin'];
        $destination            = $response_array['destination'];
        $luggage                = $response_array['luggage'];
        $stops                  = $response_array['stops'];
        
        $this->db->set('localizador', $localizador);
        $this->db->set('airline', $airline);
        $this->db->set('flight', $flight);
        $this->db->set('departure_datetime', $departure_datetime);
        $this->db->set('arrival_datetime', $arrival_datetime);
        $this->db->set('class', $class);
        $this->db->set('origin', $origin);
        $this->db->set('destination', $destination);
        $this->db->set('luggage', $luggage);
        $this->db->set('stops', $stops);
        $this->db->where('id', $id);

        $this->db->update($this -> table_response);
        $result = $this->db->affected_rows();

        if($result == 1){
            return $id;
        }

        return 0;
    }

    public function update_response_cost($cost_array, $id)
    {
        $currency_id = $cost_array['currency_id'];
        $exchange = $cost_array['exchange'];
        $original_cost = $cost_array['original_cost'];
        $cost = $cost_array['cost'];
        $tax = $cost_array['tax'];
        $rav = $cost_array['rav'];
        $total = $cost_array['total'];
        
        // $this->db->set('currency_id', $currency_id);
        $this->db->set('exchange', $exchange);
        $this->db->set('original_cost', $original_cost);
        $this->db->set('cost', $cost);
        $this->db->set('tax', $tax);
        $this->db->set('rav', $rav);
        $this->db->set('total', $total);
        $this->db->where('id', $id);
        $this->db->update($this -> table_cost);
        $result = $this->db->affected_rows();

        if($result == 1){
            return $id;
        }

        return 0;
    }

    public function get_quote_response($quote_id)
    {
        $this->db->select('*');
        $this->db->from($this -> table_response);
        $this->db->where("quote_id", $quote_id);
        $this->db->group_by("id");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_quote_response_cost($quote_id)
    {
        $this->db->select('qa.id , qa.localizador, qa.airline, qa.flight, qa.departure_datetime, qa.quote_id, qa.arrival_datetime, qa.class, qa.origin, qa.destination, qa.luggage, qa.stops, qac.exchange, qac.original_cost, qac.cost, qac.tax, qac.rav, qac.total, qac.id as quote_answer_cost_id, currency.name as currency');
        $this->db->from('quote_answer as qa');
        $this->db->join('letsfly.quote_answer_cost qac', 'qa.quote_answer_cost_id = qac.id');
        $this->db->join('letsfly.currency', 'qac.currency_id = currency.id');
        $this->db->where("qa.quote_id", $quote_id);
        $this->db->group_by("qa.id");
        $query = $this->db->get($this -> table);

        return $query->result_array();
    }
    
    public function get_total()
    {
        return $this->db->count_all($this->table);
    }
}