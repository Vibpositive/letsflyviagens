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
					// die("cost: " . print_r($insert_cost_id) . " end cost");

					// $post['cost_id'] = $insert_cost_id;
					// echo('$post<pre>');
					// print_r($post);
					// echo('</pre>end $post');
					// die();
					
					$insert_response_id = $this -> insert_response($post, $insert_cost_id );
					
					
					// die("response id: " . print_r($insert_response_id) . " end insert_response_id");

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
			'rav' 					=> $post['rav'] 
		);
		
		$this->session->set_flashdata('forminput', $forminput);

		redirect($refer);
	}
	
	public function update()
	{
		// TODO fix all endpoints that are meant to be access by post to remove direct access to it
		$method = $this->input->method();
		$refer 	=  $this->agent->referrer();
		$post 	= $this->input->post(null, true);
		$id 	= $post['id'];

		if($method != "post"){
			show_404();
		}

		$this->load->model('admin/Currency_model', 'currency_model');

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

		$this->form_validation->set_rules('id', 'id', 'required|numeric');
		
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
					
					$quote_response = $this -> model -> get_quote_response($id);

					if($quote_response){
						
						// TODO transaction to make sure both oprations - Reported
						$update_response      = $this -> update_response($post, $id);
						$update_response_cost = $this -> update_response_cost($post, $quote_response[0]['quote_answer_cost_id']);

					}else{
						redirect($refer);
					}
					
					$db_error = $this->db->error();
					
					if ($db_error['code'] != 0) {
						throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
					}
				}

				$this->session->set_flashdata('success', "Atualizado com sucesso");
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
        // TODO: update method so it does not get an automatic value from db as it is being under validation already - reported
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
	
	private function update_response($post, $id)
    {
        $response_array = array(
            'localizador'           => $post['localizador'],
            'airline'               => $post['airline'],
            'flight'                => $post['flight'],
            'departure_datetime'    => $post['departure_datetime'],
            'arrival_datetime'      => $post['arrival_datetime'],
            'class'                 => $post['class'],
            'origin'                => $post['origin'],
            'destination'           => $post['destination'],
            'quote_id'              => $post['id'],
            'luggage'               => $post['luggage'],
            'quote_id'              => $post['id'],
            'stops'                 => $post['stops']
        );

        $response_id = $this -> model -> update_response($response_array, $id);
	}
	
	private function insert_response($post, $cost_id){
		
        $response_array = array(
            'localizador'           => $post['localizador'],
            'airline'               => $post['airline'],
            'flight'                => $post['flight'],
            'departure_datetime'    => $post['departure_datetime'],
            'arrival_datetime'      => $post['arrival_datetime'],
            'class'                 => $post['class'],
            'origin'                => $post['origin'],
            'destination'           => $post['destination'],
            'quote_id'              => $post['id'],
            'luggage'               => $post['luggage'],
            // 'quote_answer_cost_id'  => $post['cost_id'],
            'quote_answer_cost_id'  => $cost_id,
            'stops'                 => $post['stops']
        );

        $response_id = $this -> model -> insert_response($post['id'], $response_array);
        // TODO: return something - Reported
    }
}
