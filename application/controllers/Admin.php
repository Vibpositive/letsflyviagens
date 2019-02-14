<?php

class Admin extends CI_Controller
{    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
    
    public function index($page = 'index')
    {
        $this->load->view('templates/admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/index');
        $this->load->view('templates/admin/footer');
	}
	
    
    public function quotes($operation = "", $id = 0, $run = "")
    {
        switch ($operation) {
            case 'view':
                $this -> load_quote($id);
            break;
                
            default:
                $this -> load_quotes();
            break;
        }
    }

    public function quote_response()
    {
        $post = $this->input->post(null, true);
        
        if (
            isset($post['localizador'])            && array_key_exists('localizador',           $post)
            && isset($post['airline'])             && array_key_exists('airline',               $post)
            && isset($post['flight'])              && array_key_exists('flight',                $post)
            && isset($post['departure_datetime'])  && array_key_exists('departure_datetime',    $post)
            && isset($post['arrival_datetime'])    && array_key_exists('arrival_datetime',      $post)
            && isset($post['class'])               && array_key_exists('class',                 $post)
            && isset($post['origin'])              && array_key_exists('origin',                $post)
            && isset($post['destination'])         && array_key_exists('destination',           $post)
            && isset($post['luggage'])             && array_key_exists('luggage',               $post)
            && isset($post['stops'])               && array_key_exists('stops',                 $post)
            && isset($post['currency'])            && array_key_exists('currency',              $post)
        ) {
            $this->load->database();
            $this->load->model('Quotes_model', 'model');
            $this->load->model('admin/Currency_model', 'currency_model');

            
            // TODO: validate $currency_id
            
            // $localizador        = $post['localizador'];
            // $exchange           = $post['exchange'];
            // $original_cost      = $post['original_cost'];
            // $tax                = $post['tax'];
            // $rav                = $post['rav'];
            // $localizador        = $post['localizador'];
            // $airline            = $post['airline'];
            // $flight             = $post['flight'];
            // $departure_datetime = $post['departure_datetime'];
            // $arrival_datetime   = $post['arrival_datetime'];
            // $class              = $post['class'];
            // $origin             = $post['origin'];
            // $destination        = $post['destination'];
            // $luggage            = $post['luggage'];
            // $stops              = $post['stops'];
            $quote_id           = $post['quote_id'];
            
            // $cost_array = array(
            //     'currency_id'       => $currency_id,
            //     'exchange'          => $post['exchange'],
            //     'original_cost'     => $post['original_cost'],
            //     'cost'              => $original_cost * $exchange,
            //     'tax'               => $post['tax'],
            //     'rav'               => $post['rav'],
            //     'total'             => ($post['original_cost'] * $post['exchange']) + ($tax + $rav)
            // );
            
            // $result = $this -> model -> get_quote_response_cost($quote_id);

            // // TODO compare if values have been updated;
            
            // if(
                //     isset($result[0]['quote_id']) && array_key_exists('quote_id', $result[0]) &&
                //     isset($result[0]['quote_answer_cost_id']) && array_key_exists('quote_answer_cost_id', $result[0])
                // ){
                    // $quote_response = $this -> model -> get_quote_response($post['quote_id']);
            $quote_response_exists = $this -> get_quote_response($post['quote_id']);
            $quote_response = $this -> model -> get_quote_response($quote_id);
            
            $update_response = false;
            $update_response_cost = false;
            $insert_cost_id = false;
            $insert_response_id = false;

            
            if($quote_response_exists){
                $update_response      = $this -> update_response($post, $quote_id);
                $update_response_cost = $this -> update_response_cost($post, $quote_response[0]['quote_answer_cost_id']);
            }else {
                $insert_cost_id     = $this -> insert_response_cost($post);
                $insert_response_id = $this -> insert_response($post, $insert_cost_id );
            }
            
            if(
                ($update_response !== false) ||
                ($update_response_cost !== false)    ||
                ($insert_cost_id !== false)    ||
                ($insert_response_id !== false)
            ){
                redirect(base_url() . "admin/quotes/view/" . $quote_id, 'refresh');
            }
        }else {
            $return = array('error' => "wrong number of parameters");
        }
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
        $quote_id           = $post['quote_id'];
        
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
            'quote_answer_cost_id'  => $cost_id,
            'stops'                 => $stops
        );

        $response_id = $this -> model -> insert_response($quote_id, $response_array);
        // TODO: return something
    }

    public function getquotecost($quote_id){
        $this->load->model('Quotes_model', 'model');

        $result = $this -> model -> get_quote_response_cost($quote_id);
    }

    private function load_quote($id){
        // TODO: if id == 0

        $this->load->database();
        $this->load->model('Quotes_model', 'model');
        $this->load->model('admin/Currency_model', 'currency_model');
        
        $data['quote']          = $this-> model             -> get_quote_by_id($id);
        $data['currency']      = $this-> currency_model    -> get_currencies();
        
        $quote_id = $data['quote'][0]['id'];
        
        $data['quote_response_cost'] = $this-> model -> get_quote_response_cost($quote_id);
        
        $this->load->view('templates/admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/quotes/view', $data);
        $this->load->view('admin/quotes/response', $data);
        $this->load->view('templates/admin/footer');
    }

    private function load_quotes(){
        $this->load->library('pagination');
        $this->load->helper('url');

        // load db and model
        $this->load->database();
        $this->load->model('Quotes_model', 'model');
 
        // init params
        $params = array();
        $limit_per_page = 7;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->model->get_total();
 
        if ($total_records > 0) {
            // get current page records
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
        $this->load->view('admin/quotes/quotes', $params);
        $this->load->view('templates/admin/footer');
	}
}
