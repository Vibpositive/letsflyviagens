<?php

class AdminQuotes_Controller extends CI_Controller
{    
    public function __construct()
    {
        parent::__construct();
		$this->load->library('session');
		$this->load->helper('form', 'url');
		$this->load->library('form_validation');
		$this->load->library('user_agent');
		$this->load->model('Quotes_model', 'model');
		// $this->load->model('admin/Currency_model', 'currency_model');
	}
	
	public function index(){
		$this->load->library('pagination');
		$this->load->helper('url');
		
		$params = array();
		$limit_per_page = 7;

		$start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$total_records = $this->model->get_total();

		if ($total_records > 0) {
            $params["results"] = $this->model->get_current_page_records($limit_per_page, $start_index);
             
            $config['base_url'] = base_url() . 'admin/quotes/';
            
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
             
			$this->pagination->initialize($config);

            $params["links"] = $this->pagination->create_links();            
		}
		
		$this->load->view('templates/admin/header');
		$this->load->view('admin/menu');
		$this->load->view('admin/quotes/index', $params);
		$this->load->view('templates/admin/footer');
		
	}

	public function edit($id = 0)
	{
		if(!$id > 0){
			show_404();
		}
		
        $this->load->model('admin/Currency_model', 'currency_model');
        
        $data['quote']         = $this-> model             -> get_quote_by_id($id);
        $data['currency']      = $this-> currency_model    -> get_currencies();
        
        $quote_id = $data['quote'][0]['id'];
        
        $data['quote_response_cost'] = $this-> model -> get_quote_response_cost($quote_id);
        
        $this->load->view('templates/admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/quotes/view', $data);
        $this->load->view('admin/quotes/response', $data);
        $this->load->view('templates/admin/footer');
	}

	public function response()
	{
		$post = $this->input->post(null, true);
		$refer =  $this->agent->referrer();
		
		$this->load->model('admin/Currency_model', 'currency_model');
		
		$id           = $post['id'];

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('localizador', 'Localizador', 'required');
		$this->form_validation->set_rules('airline', 'airline', 'required');
		$this->form_validation->set_rules('flight', 'flight', 'required');
		$this->form_validation->set_rules('departure_datetime', 'departure_datetime', 'required');
		$this->form_validation->set_rules('departure_datetime', 'departure_datetime', 'required');
		$this->form_validation->set_rules('arrival_datetime', 'arrival_datetime', 'required');
		$this->form_validation->set_rules('arrival_datetime', 'arrival_datetime', 'required');
		$this->form_validation->set_rules('class', 'class', 'required');
		$this->form_validation->set_rules('origin', 'origin', 'required');
		$this->form_validation->set_rules('destination', 'destination', 'required');
		$this->form_validation->set_rules('luggage', 'luggage', 'required');
		$this->form_validation->set_rules('stops', 'stops', 'required');
		$this->form_validation->set_rules('currency', 'currency', 'required');
		$this->form_validation->set_rules('exchange', 'exchange', 'required|numeric');
		$this->form_validation->set_rules('original_cost', 'original_cost', 'required|numeric');
		$this->form_validation->set_rules('tax', 'tax', 'required|numeric');
		$this->form_validation->set_rules('rav', 'rav', 'required|numeric');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error', array('error' => validation_errors()));
		}else{

			try {

				if(!isset($id) || is_null($id) || $id == "" || !is_numeric($id)){
					throw new Exception('Paramater error! ID must be informed');
				}

				$currency_id = $this -> currency_model -> get_currency($post['currency']);

				if(!$currency_id){
					throw new Exception('Uma moeda valida deve ser informada');
				}else{
					$insert_cost_id     = $this -> insert_response_cost($post);
					$insert_response_id = $this -> insert_response($post, $insert_cost_id );
					$db_error = $this->db->error();
					
					if ($db_error['code'] != 0) {
						throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					}
				}
				$this->session->set_flashdata('success', "Inserido com sucesso");
			} catch (Exception $e) {
				$this->session->set_flashdata('error', array('error' => $e->getMessage() ));
			}
		}

		$forminput = $arrayName = array(
			'localizador' 			=> $post['localizador'],
			'airline' 				=> $post['airline'],
			'flight' 				=> $post['flight'],
			'departure_datetime' 	=> $post['departure_datetime'],
			'departure_datetime' 	=> $post['departure_datetime'],
			'arrival_datetime' 		=> $post['arrival_datetime'],
			'arrival_datetime' 		=> $post['arrival_datetime'],
			'class' 				=> $post['class'],
			'origin' 				=> $post['origin'],
			'destination' 			=> $post['destination'],
			'luggage' 				=> $post['luggage'],
			'stops' 				=> $post['stops'],
			'currency' 				=> $post['currency'],
			'exchange' 				=> $post['exchange'],
			'original_cost' 		=> $post['original_cost'],
			'tax' 					=> $post['tax'],
			'rav' 					=>$post['rav'] 
		);
		
		$this->session->set_flashdata('forminput', $forminput);

		redirect($refer);
	}

	public function date_check($str)
	{
		$day = (int) substr($date, 0, 2);
		$month = (int) substr($date, 3, 2);
		$year = (int) substr($date, 6, 4);
		if(!checkdate($month, $day, $year)){
			$this->form_validation->set_message('date_check', 'O campo {field} deve conter uma data valida');
			return FALSE;
		}
		
		return TRUE;
	}

	public function update()
	{
		echo "here";
		// TODO
        // $post = $this->input->post(null, true);
        
        // if (
        //     isset($post['localizador'])            && array_key_exists('localizador',           $post)
        //     && isset($post['airline'])             && array_key_exists('airline',               $post)
        //     && isset($post['flight'])              && array_key_exists('flight',                $post)
        //     && isset($post['departure_datetime'])  && array_key_exists('departure_datetime',    $post)
        //     && isset($post['arrival_datetime'])    && array_key_exists('arrival_datetime',      $post)
        //     && isset($post['class'])               && array_key_exists('class',                 $post)
        //     && isset($post['origin'])              && array_key_exists('origin',                $post)
        //     && isset($post['destination'])         && array_key_exists('destination',           $post)
        //     && isset($post['luggage'])             && array_key_exists('luggage',               $post)
        //     && isset($post['stops'])               && array_key_exists('stops',                 $post)
        //     && isset($post['currency'])            && array_key_exists('currency',              $post)
        // ) {
        //     $this->load->database();
        //     $this->load->model('Quotes_model', 'model');
        //     $this->load->model('admin/Currency_model', 'currency_model');

            
		// 	// TODO: validate $currency_id
			
		// 	$quote_id           = $post['id'];
			
		// 	$quote_response_exists = $this -> get_quote_response($post['id']);
			
		// 	die($quote_response_exists);

        //     $quote_response = $this -> model -> get_quote_response($quote_id);
            
        //     $update_response = false;
        //     $update_response_cost = false;
        //     $insert_cost_id = false;
        //     $insert_response_id = false;

            
        //     if($quote_response_exists){
        //         $update_response      = $this -> update_response($post, $quote_id);
        //         $update_response_cost = $this -> update_response_cost($post, $quote_response[0]['quote_answer_cost_id']);
        //     }else {
        //         $insert_cost_id     = $this -> insert_response_cost($post);
        //         $insert_response_id = $this -> insert_response($post, $insert_cost_id );
        //     }
            
        //     if(
        //         ($update_response !== false) ||
        //         ($update_response_cost !== false)    ||
        //         ($insert_cost_id !== false)    ||
        //         ($insert_response_id !== false)
        //     ){
        //         redirect(base_url() . "admin/quotes/view/" . $quote_id, 'refresh');
        //     }
        // }else {
        //     $return = array('error' => "wrong number of parameters");
        // }
	}

	private function get_quote_response($quote_id){
        $result = $this -> model -> get_quote_response_cost($quote_id);
        $exists = (isset($result[0]['quote_id']) && array_key_exists('quote_id', $result[0]));
        return $exists;
	}
	
	private function update_response_cost($post, $id){
        $currency_id = $this -> currency_model -> get_currency_id($post['currency']);
        if (!$currency_id) {
            $currency_id = $this -> currency_model -> get_currency_id("USA");
        }
        
        
        $cost_array = array(
            'currency_id'       => $currency_id,
            'exchange'          => $post['exchange'],
            'original_cost'     => $post['original_cost'],
            'cost'              => $post['original_cost'] * $post['exchange'],
            'tax'               => $post['tax'],
            'rav'               => $post['rav'],
            'total'             => ($post['original_cost'] * $post['exchange']) + ($post['tax'] + $post['rav'])
        );
        
        return $this -> model -> update_response_cost($cost_array, $id);
	}
	
	private function insert_response_cost($post){
        
        if(!$post['currency']){
            $currency_id = $this -> currency_model -> get_currency("USA");
        }else{
            $currency_id = $this -> currency_model -> get_currency_id($post['currency']);
    
            if (!$currency_id) {
                $currency_id = $this -> currency_model -> get_currency("USA");
            }
        }


        $cost_array = array(
            'currency_id'       => $currency_id,
            'exchange'          => $post['exchange'],
            'original_cost'     => $post['original_cost'],
            'cost'              => $post['original_cost'] * $post['exchange'],
            'tax'               => $post['tax'],
            'rav'               => $post['rav'],
            'total'             => ($post['original_cost'] * $post['exchange']) + ($post['tax'] + $post['rav'])
        );

        return $this -> model -> insert_response_cost($cost_array);
	}
	
	private function update_response($post, $quote_id)
    {
        $localizador        = $post['localizador'];
        $airline            = $post['airline'];
        $flight             = $post['flight'];

        $arrival_datetime   = $post['arrival_datetime'];
        $departure_datetime = $post['departure_datetime'];
        
        $class              = $post['class'];
        $origin             = $post['origin'];
        $destination        = $post['destination'];
        $luggage            = $post['luggage'];
        $stops              = $post['stops'];
        
        $response_array = array(
            'localizador'           => $localizador,
            'airline'               => $airline,
            'flight'                => $flight,
            'departure_datetime'    => $departure_datetime,
            'arrival_datetime'      => $arrival_datetime,
            'class'                 => $class,
            'origin'                => $origin,
            'destination'           => $destination,
            'quote_id'              => $quote_id,
            'luggage'               => $luggage,
            'quote_id'              => $quote_id,
            'stops'                 => $stops
        );

        $response_id = $this -> model -> update_response($response_array, $quote_id);
        // TODO: return something
	}
	
	private function insert_response($post, $cost_id){
        $localizador        = $post['localizador'];
        $airline            = $post['airline'];
        $flight             = $post['flight'];
        $departure_datetime = $post['departure_datetime'];
        $arrival_datetime   = $post['arrival_datetime'];
        $class              = $post['class'];
        $origin             = $post['origin'];
        $destination        = $post['destination'];
        $luggage            = $post['luggage'];
        $stops              = $post['stops'];
        $id                 = $post['id'];
        
        $response_array = array(
            'localizador'           => $localizador,
            'airline'               => $airline,
            'flight'                => $flight,
            'departure_datetime'    => $departure_datetime,
            'arrival_datetime'      => $arrival_datetime,
            'class'                 => $class,
            'origin'                => $origin,
            'destination'           => $destination,
            'quote_id'              => $id,
            'luggage'               => $luggage,
            'quote_answer_cost_id'  => $cost_id,
            'stops'                 => $stops
        );

        $response_id = $this -> model -> insert_response($id, $response_array);
        // TODO: return something
    }
}
