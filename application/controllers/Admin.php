<?php

class Admin extends CI_Controller
{
                                             
    public function index($page = 'index')
    {
        if (!file_exists(APPPATH.'views/admin/'.$page.'.php')) {
            // show_404();
        }

        $this->load->view('templates/admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/index');
        $this->load->view('templates/admin/footer');
    }

    public function home($page, $operation = "", $id = 0, $run = "")
    {
        $model_name = $page.'_model';
        $this->load->model("admin/$model_name", "model");

        if($run === "" && $operation !== "create"){
            $this -> loadview("home", $page, $operation, $id);
        }else{
            $post = $this->input->post(NULL, TRUE);
            
            switch ($operation) {
                case 'update':
                    if($this->model->update($id, $post)){
                        redirect("admin/home/" . $page . "/" . $operation . "/" . $id, 'refresh');
                    }else{
                        // TODO: better message
                        die("could not update");
                    }
                    break;
                    case 'delete':
                        if($this->model->delete($id)){
                            redirect("admin/home/" . $page, 'refresh');
                        }else{
                            // TODO: better message
                            die("could not delete");
                        }
                        break;
                        case 'create':
                        if($this->model->create($post)){
                            redirect("admin/home/" . $page, 'refresh');
                        }else{
                            // TODO: better message
                            die("could not create");
                        }
                    break;
                default:
                    # code...
                    break;
            }
        }
    }

    public function news($operation = "", $id = 0, $run = "")
    {
        $page = "news";
        
        $this->load->model("admin/news_model", "model");
        if($run === "" && $operation !== "create"){
            // die("if");

            $this -> loadview("news", "", $operation, $id);

        }else{
            // die("else");
            $post = $this->input->post(NULL, TRUE);
            
            switch ($operation) {
                case 'update':

                    $config['upload_path']          = './assets/images/news/';
                    $config['allowed_types']        = 'gif|jpg|png';
                    $config['encrypt_name']         = true;
                    
                    $config['max_size']             = 9999;
                    $config['max_width']            = 9999;
                    $config['max_height']           = 9999;

                    $this->load->library('upload', $config);

                    if (! $this->upload->do_upload('image')) {
                        $error = array('error' => $this->upload->display_errors());
                        // $this->load->view('admin', $error);
                        die($error);
                    } else {
                        $post           = $this->input->post(null, true);
                        $title          = $post['title'];
                        $body           = $post['body'];
                        $callback       = $post['callback'];
                        $data           = array('image' => $this->upload->data()['file_name'], "title" => $title, "body" => $body);

                        $this->load->model("admin/news_model", "model");

                        if ($this->model->update($id, $data)) {
                            // redirect("admin/news/" . $page . "/" . $operation . "/" . $id, 'refresh');
                            redirect("admin/$callback/", 'refresh');
                        } else {
                            // TODO: better message
                            die("could not update");
                        }
                    }
                    
                    break;
                    case 'delete':
                        if($this->model->delete($id)){
                            redirect("admin/news/", 'refresh');
                        }else{
                            die("could not delete");
                            // TODO: better message
                        }
                        break;
                        case 'create':
                        if($this->model->create($post)){
                            redirect("admin/news/" . $page, 'refresh');
                        }else{
                            // TODO: better message
                            die("could not create");
                        }
                    break;
                default:
                    # code...
                    break;
            }
        }
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
            && isset($post['exchange'])            && array_key_exists('exchange',              $post) 
            && isset($post['original_cost'])       && array_key_exists('original_cost',         $post) 
            && isset($post['tax'])                 && array_key_exists('tax',                   $post) 
            && isset($post['rav'])                 && array_key_exists('rav',                   $post) 
            && isset($post['total'])               && array_key_exists('total',                 $post)
        ) {
            $this->load->database();
            $this->load->model('Quotes_model', 'model');
            $this->load->model('admin/Currency_model', 'currency_model');

            $currency_id = $this -> currency_model -> get_currency_id($post['currency']);
            // TODO: validate $currency_id
            
            
            // $cost = array(
            //     'currency_id'       => $currency_id,
            //     'exchange'          => $post['exchange'],
            //     'original_cost'     => $post['original_cost'],
            //     'tax'               => $post['tax'],
            //     'rav'               => $post['rav'],
            //     'total'             => $post['total']
            // );

            $exchange           = $post['exchange'];
            $original_cost      = $post['original_cost'];
            $cost               = $post['cost'];
            $tax                = $post['tax'];
            $rav                = $post['rav'];
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


            
            $cost = array(

                
                'currency_id'       => $currency_id,
                'exchange'          => $post['exchange'],
                'original_cost'     => $post['original_cost'],
                'cost'              => $original_cost * $exchange,
                'tax'               => $post['tax'],
                'rav'               => $post['rav'],
                'total'             => ($post['original_cost'] * $post['exchange']) + ($cost + $tax + $rav)
            );
            
            $cost_id = $this -> model -> insert_response_cost(1, $cost);

            if($cost_id > 0){
                $response = array(
                    'localizador'           => $post['localizador'],
                    'airline'               => $post['airline'],
                    'flight'                => $post['flight'],
                    'departure_datetime'    => $post['departure_datetime'],
                    'arrival_datetime'      => $post['arrival_datetime'],
                    'class'                 => $post['class'],
                    'origin'                => $post['origin'],
                    'destination'           => $post['destination'],
                    'quote_answer_cost_id'  => $cost_id,
                    'quote_id'              => 1,
                    'luggage'               => $post['luggage'],
                    'stops'                 => $post['stops']
                );

                $response_id = $this -> model -> insert_response(1, $response);
                if($response_id > 0){
                    die("success");
                }
            }

            

            echo "<pre>";
            print_r($post);
            echo "</pre>";
        }else {
            die("error");
        }
    }

    private function load_quote($id){
        // TODO: if id == 0

        // load db and model
        $this->load->database();
        $this->load->model('Quotes_model', 'model');
        
        $data['quote'] = $this-> model -> get_quote_by_id($id);
        
        // die("here");

        $this->load->view('templates/admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/quotes/view', $data);
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

    private function loadview($mainpage, $page, $operation = "", $id = 0){
        
        if($operation !== ""){
            if (!file_exists(APPPATH.'views/admin/' . $mainpage . '/' . $page . "/" . $operation . '.php')) {
                show_404();
            }
            
            $data['id'] = $id;
            
            $this->load->view('templates/admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/' . $mainpage . '/' . $page . "/" . $operation, $data);
            $this->load->view('templates/admin/footer');
        }elseif ($page === "") {
            
            if (!file_exists(APPPATH.'views/admin/' . $mainpage . "/" . $mainpage . '.php')) {
                show_404();
            }
            
            $this->load->view('templates/admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/' . $mainpage . "/" . $mainpage);
            $this->load->view('templates/admin/footer');
        }
        else{
            
            if (!file_exists(APPPATH.'views/admin/' . $mainpage . '/' . $page . '.php')) {
                show_404();
            }
            
            $this->load->view('templates/admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/' . $mainpage . '/' . $page);
            $this->load->view('templates/admin/footer');
        }
    }
    
    public function upload(){
        $config['upload_path']          = './assets/images/news/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        
        $config['max_size']             = 9999;
        $config['max_width']            = 9999;
        $config['max_height']           = 9999;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('image')){
            $error = array('error' => $this->upload->display_errors());
            // $this->load->view('admin', $error);
            // $this -> loadview("admin", "");
            $this->session->set_flashdata('error', $error);
            redirect("admin/news/", 'refresh');
        }else{
            $post = $this->input->post(NULL, TRUE);
            $title = $post['title'];
            $body = $post['body'];
            $callback = $post['callback'];
            $data = array('image' => $this->upload->data()['file_name'], "title" => $title, "body" => $body);
            
            $this->load->model("admin/news_model", "model");
            $this->model->create($data);
            
            $this->session->set_flashdata('success', "Criado com sucesso");
            redirect("admin/$callback/", 'refresh');
            // $this->load->view(, $data);  
        } 
    }
    
}