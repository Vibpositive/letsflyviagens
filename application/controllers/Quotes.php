<?php

class Quotes extends CI_Controller
{
    public function index($page = 'index')
    {
        // if (!file_exists(APPPATH.'views/quotes/'.$page.'.php')) {
        //     show_404();
        // }

        $this->load->model('populardestinations_model', 'populardestinations');

        $data['title'] = ucfirst($page);
        $data['home'] = $this->uri->segment(1) == '';
        $data['populardestinations'] = $this -> populardestinations -> getpopulardestinations();
        
        $this->load->view('templates/header');
        $this->load->view('home/header', $data);
        $this->load->view('quotes/index');
        $this->load->view('home/contact_home');
        $this->load->view('templates/footer', $data);
    }

    private function quote($quote_name){
        if ($this->input->method() != "post") {
            // TODO: redirect to the right place
            // redirect('/quotes/flights', 'refresh');
        }
        
        $this->load->helper('url');
        $this->load->helper('form_helper');
        
        $this->load->model('quotes_model', 'quotes');
        $this->load->model('user_model', 'user');
        
        $post = $this->input->post(NULL, TRUE);
        $email = get_quote_email($post);
        $quote_type_id = $this -> quotes -> get_quote_type_id($quote_name);
        
        if($email && $quote_type_id){
            $user = $this -> user -> get_user($email);
            
            if(!$user){
                $this -> user -> create_user($email);
                $user = $this -> user -> get_user($email);
            }
            $userid = $user -> id;
        }//TODO: else if no email and quote type id
        
        
        if(isset($userid)){
            $data = array();
            foreach ($post as $key => $value) {
                $subkey = substr ($key , 3);
                $register = array("quote_id" => null, "field_name" => $subkey, "field_value" => $value);
                array_push($data, $register);
            }

            $this -> quotes -> quote($data, $userid, $quote_type_id);

            $this->output->set_output(print_r($data));

            
            $emaildestinatario = "letsfly@letsflyviagens.com.br";
            $emailsender = "william@letsflyviagens.com.br";
            $assunto = "Pedido de cotação - $quote_name";
            $mensagemHTML = "Voce recebeu uma mensagem de: ";
            $quebra_linha = "<br>";


            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Sao_Paulo');
            $now = strftime('%A, %d de %B de %Y', strtotime('today'));
            
            $mensagemHTML .= "em: $now";
            $mensagemHTML .= "\n";

            foreach ($data as $campo) {
                $mensagemHTML .= "Nome do campo: " . $campo['field_name'] . " > " . $campo['field_value'];
                $mensagemHTML .= "\n";
            }


            $headers = "MIME-Version: 1.1\r\n";
            $headers .= "Content-type: text/plain; charset=UTF-8\r\n";
    
            $headers .= "From: $email\r\n"; // remetente
            $headers .= "Return-Path: $email\r\n"; // return-path
    
            if(!mail($emaildestinatario, $assunto, $mensagemHTML, $headers ,"-r".$emailsender)){ // Se for Postfix
                $headers .= "Return-Path: " . $emailsender . $quebra_linha; // Se "não for Postfix"
                mail($emaildestinatario, $assunto, $mensagemHTML, $headers );
                return $this->output->set_output("sucess"); 
            }
        }
        
        $this->output->set_output("failure");

    }

    public function flightquote(){
        if ($this->input->method() != "post") {
            redirect('/quotes/flights', 'refresh');
        }
        return $this -> quote("flight");
    }

    public function carrentalquote(){
        if ($this->input->method() != "post") {
            redirect('/quotes/carrental', 'refresh');
        }
        $this -> quote("carrental");
    }

    public function cruisequote(){
        if ($this->input->method() != "post") {
            redirect('/quotes/cruise', 'refresh');
        }
        $this -> quote("cruise");
    }

    public function hotelquote(){
        if ($this->input->method() != "post") {
            redirect('/quotes/hotel', 'refresh');
        }
        $this -> quote("hotel");
    }

    public function travelinsurancequote(){
        if ($this->input->method() != "post") {
            redirect('/quotes/travelinsurance', 'refresh');
        }
        $this -> quote("travelinsurance");
    }
    
    public function travelpackagequote(){
        if ($this->input->method() != "post") {
            redirect('/quotes/travelpackage', 'refresh');
        }
        $this -> quote("travelpackage");
    }
    
    public function flights($page = 'flights')
    {
        if (!file_exists(APPPATH.'views/quotes/'.$page.'.php')) {
            show_404();
        }

        $this->load->model('populardestinations_model', 'populardestinations');
        
        $data['title'] = ucfirst($page);
        $data['home'] = $this->uri->segment(1) == '';
        $data['base_url'] = $this->uri->segment(1);
        $data['populardestinations'] = $this -> populardestinations -> getpopulardestinations();

        $this->load->view('templates/header');
        $this->load->view('home/header', $data);
        $this->load->view('quotes/'.$page, $data);
        $this->load->view('home/contact_home');
        $this->load->view('templates/footer', $data);
    }
    
    public function hotels($page = 'hotels')
    {
        if (!file_exists(APPPATH.'views/quotes/'.$page.'.php')) {
            show_404();
        }

        $this->load->model('populardestinations_model', 'populardestinations');

        $data['title'] = ucfirst($page);
        $data['home'] = $this->uri->segment(1) == '';
        $data['base_url'] = $this->uri->segment(1);
        $data['populardestinations'] = $this -> populardestinations -> getpopulardestinations();

        $this->load->view('templates/header');
        $this->load->view('home/header', $data);
        $this->load->view('quotes/'.$page, $data);
        $this->load->view('home/contact_home');
        $this->load->view('templates/footer', $data);
    }

    public function cruises($page = 'cruises')
    {
        if (!file_exists(APPPATH.'views/quotes/'.$page.'.php')) {
            show_404();
        }

        $this->load->model('populardestinations_model', 'populardestinations');

        $data['title'] = ucfirst($page);
        $data['home'] = $this->uri->segment(1) == '';
        $data['base_url'] = $this->uri->segment(1);
        $data['populardestinations'] = $this -> populardestinations -> getpopulardestinations();

        $this->load->view('templates/header');
        $this->load->view('home/header', $data);
        $this->load->view('quotes/'.$page, $data);
        $this->load->view('home/contact_home');
        $this->load->view('templates/footer', $data);
    }

    public function travelinsurance($page = 'travelinsurance')
    {
        if (!file_exists(APPPATH.'views/quotes/'.$page.'.php')) {
            show_404();
        }

        $this->load->model('populardestinations_model', 'populardestinations');

        $data['title'] = ucfirst($page);
        $data['home'] = $this->uri->segment(1) == '';
        $data['base_url'] = $this->uri->segment(1);
        $data['populardestinations'] = $this -> populardestinations -> getpopulardestinations();

        $this->load->view('templates/header');
        $this->load->view('home/header', $data);
        $this->load->view('quotes/'.$page, $data);
        $this->load->view('home/contact_home');
        $this->load->view('templates/footer', $data);
    }

    public function carrental($page = 'carrental')
    {
        if (!file_exists(APPPATH.'views/quotes/'.$page.'.php')) {
            show_404();
        }

        $this->load->model('populardestinations_model', 'populardestinations');

        $data['title'] = ucfirst($page);
        $data['home'] = $this->uri->segment(1) == '';
        $data['base_url'] = $this->uri->segment(1);
        $data['populardestinations'] = $this -> populardestinations -> getpopulardestinations();

        $this->load->view('templates/header');
        $this->load->view('home/header', $data);
        $this->load->view('quotes/'.$page, $data);
        $this->load->view('home/contact_home');
        $this->load->view('templates/footer', $data);
    }

    public function travelpackage($page = 'travelpackage')
    {
        if (!file_exists(APPPATH.'views/quotes/'.$page.'.php')) {
            show_404();
        }

        $this->load->model('populardestinations_model', 'populardestinations');

        $data['title'] = ucfirst($page);
        $data['home'] = $this->uri->segment(1) == '';
        $data['base_url'] = $this->uri->segment(1);
        $data['populardestinations'] = $this -> populardestinations -> getpopulardestinations();

        $this->load->view('templates/header');
        $this->load->view('home/header', $data);
        $this->load->view('quotes/'.$page, $data);
        $this->load->view('home/contact_home');
        $this->load->view('templates/footer', $data);
    }
}
