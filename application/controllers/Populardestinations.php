<?php

class Populardestinations extends CI_Controller
{

    
    public function index($page = 'index')
    {
        if (!file_exists(APPPATH.'views/' . strtolower(get_class($this)) . '/'.$page.'.php')) {
            show_404();
        }

        $this->load->model('populardestinations_model', 'populardestinations');
        
        $data['title'] = ucfirst($page);
        $data['home'] = $this->uri->segment(1) == '';
        $data['populardestinations'] = $this -> populardestinations -> get();

        $this->load->view('templates/header');
        $this->load->view('home/header', $data);
        $this->load->view(strtolower(get_class($this)) . '/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function destination(){
        die($this->uri->segment(2));
        // die(uri_string());
        die(current_url());
    }
}
