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
		try {

			if(!$array || !$userid || !$quote_type_id){
				throw new Exception('Wrong Params');
			}

			$quotedata = array(
				'user_id' => $userid,
				'quote_type' => $quote_type_id,
			);
			
			$this->db->insert($this -> table, $quotedata);
			$result = $this->db->insert_id();
			
			for ($i=0; $i < count($array); $i++) { 
				$array[$i]["quote_id"] = $result;
			}
			
			if($result)
			{
				$this->db->insert_batch('quote_field', $array);
			}
			
            $db_error = $this->db->error();
            if ($db_error['code'] != 0) {
				throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
            }
			return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function get_quote_type_id($name)
    {
		try {
			$this->db->select('id');
			$this->db->from($this ->table_quote_type);
			$this->db->where('name', $name);
			$this->db->limit(1);

        	$query = $this->db->get();

			$result = $query->row()->id;
			
            $db_error = $this->db->error();
            if ($db_error['code'] != 0) {
				throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
            }
			return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
	}
	
    public function get_quote_by_id($id)
    {
		try {
			$this->db->select('q.id, u.username, qt.name as quote_type, q.created_at as date, qf.field_name as field_name, qf.field_value as field_value');
			$this->db->from('quotes as q');
			$this->db->join('user as u', 'q.user_id = u.id');
			$this->db->join('quote_type as qt', 'q.quote_type = qt.id');
			$this->db->join('quote_field as qf', 'q.id = qf.quote_id');
			$this->db->where("q.id", $id);
			$query = $this->db->get();		

			$result = $query->result_array();
			
            $db_error = $this->db->error();
            if ($db_error['code'] != 0) {
				throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
            }
			return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
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
		try {
			$this->db->insert($this -> table_response, $response_array);
			$result = $this->db->insert_id();
			
            $db_error = $this->db->error();
            if ($db_error['code'] != 0) {
				throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
            }
			return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function insert_response_cost($cost_array)
    {
		try {
			$this->db->insert($this -> table_cost, $cost_array);
			
			$result = $this->db->insert_id();
			
            $db_error = $this->db->error();
            if ($db_error['code'] != 0) {
				throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
            }
			return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
		
    }

    public function update_response($post, $id)
    {
		try {
			$this->db->where('quote_id', $id);
			$this->db->update($this -> table_response, $post);

			$result = $this->db->affected_rows();
			
            $db_error = $this->db->error();
            if ($db_error['code'] != 0) {
				throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
            }
			return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update_response_cost($post, $id)
    {
		try {
			$this->db->where('id', $id);
			$this->db->update($this -> table_cost, $post);

			$result = $this->db->affected_rows();
			
            $db_error = $this->db->error();
            if ($db_error['code'] != 0) {
				throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
            }
			return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function get_quote_response($quote_id)
    {
		try {
			$this->db->select('*');
			$this->db->from($this -> table_response);
			$this->db->where("quote_id", $quote_id);
			$this->db->group_by("id");

			$query = $this->db->get();

			$result = $query->result_array();
			
            $db_error = $this->db->error();
            if ($db_error['code'] != 0) {
				throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
            }
			return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function get_quote_response_cost($quote_id)
    {
		try {
			$this->db->select('qa.id , qa.localizador, qa.airline, qa.flight, qa.departure_datetime, qa.quote_id, qa.arrival_datetime, qa.class, qa.origin, qa.destination, qa.luggage, qa.stops, qac.exchange, qac.original_cost, qac.cost, qac.tax, qac.rav, qac.total, qac.id as quote_answer_cost_id, currency.name as currency');
			$this->db->from('quote_answer as qa');
			$this->db->join('letsfly.quote_answer_cost qac', 'qa.quote_answer_cost_id = qac.id');
			$this->db->join('letsfly.currency', 'qac.currency_id = currency.id');
			$this->db->where("qa.quote_id", $quote_id);
			$this->db->group_by("qa.id");

			$query = $this->db->get($this -> table);
		
			$result = $query->result_array();
			
            $db_error = $this->db->error();
            if ($db_error['code'] != 0) {
				throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
            }
			return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function get_total()
    {
        return $this->db->count_all($this->table);
    }
}
