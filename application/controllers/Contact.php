<?php

class Contact extends CI_Controller
{
    public function index($page = 'index')
    {
        if (!file_exists(APPPATH.'views/contact/'.$page.'.php')) {
            show_404();
        }

        $this->load->model('populardestinations_model', 'populardestinations');

        $data['populardestinations'] = $this -> populardestinations -> getpopulardestinations();
        $data['title'] = ucfirst($page);
        $data['home'] = $this->uri->segment(1) == '';

        $this->load->view('templates/header');
        $this->load->view('home/header', $data);
        $this->load->view('contact/index');
        $this->load->view('home/contact_home');
        $this->load->view('templates/footer', $data);
    }
}
