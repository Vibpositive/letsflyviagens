<?php

class Quotes extends CI_Controller
{
    public function index($page = 'index')
    {
        // if (!file_exists(APPPATH.'views/quotes/'.$page.'.php')) {
        //     show_404();
        // }

        $data['title'] = ucfirst($page);
        $data['home'] = $this->uri->segment(1) == '';

        $this->load->view('templates/header');
        $this->load->view('home/header', $data);
        // $this->load->view('about/company_description');
        $this->load->view('quotes/index');
        $this->load->view('home/contact_home');
        // $this->load->view('home/services');
        // $this->load->view('home/testimonials');
        // $this->load->view('home/news_home');
        $this->load->view('templates/footer');
    }

    public function flights($page = 'flights')
    {
        if (!file_exists(APPPATH.'views/quotes/'.$page.'.php')) {
            show_404();
        }

        $data['title'] = ucfirst($page);
        $data['home'] = $this->uri->segment(1) == '';
        $data['base_url'] = $this->uri->segment(1);

        $this->load->view('templates/header');
        $this->load->view('home/header', $data);
        $this->load->view('quotes/'.$page, $data);
        $this->load->view('home/contact_home');
        // $this->load->view('home/services');
        // $this->load->view('home/testimonials');
        // $this->load->view('home/news_home');
        $this->load->view('templates/footer');
    }
    

    public function hotels($page = 'hotels')
    {
        if (!file_exists(APPPATH.'views/quotes/'.$page.'.php')) {
            show_404();
        }

        $data['title'] = ucfirst($page);
        $data['home'] = $this->uri->segment(1) == '';
        $data['base_url'] = $this->uri->segment(1);

        $this->load->view('templates/header');
        $this->load->view('home/header', $data);
        $this->load->view('quotes/'.$page, $data);
        $this->load->view('home/contact_home');
        // $this->load->view('home/services');
        // $this->load->view('home/testimonials');
        // $this->load->view('home/news_home');
        $this->load->view('templates/footer');
    }

    public function cruises($page = 'cruises')
    {
        if (!file_exists(APPPATH.'views/quotes/'.$page.'.php')) {
            show_404();
        }

        $data['title'] = ucfirst($page);
        $data['home'] = $this->uri->segment(1) == '';
        $data['base_url'] = $this->uri->segment(1);

        $this->load->view('templates/header');
        $this->load->view('home/header', $data);
        $this->load->view('quotes/'.$page, $data);
        $this->load->view('home/contact_home');
        // $this->load->view('home/services');
        // $this->load->view('home/testimonials');
        // $this->load->view('home/news_home');
        $this->load->view('templates/footer');
    }

    public function travelinsurance($page = 'travelinsurance')
    {
        if (!file_exists(APPPATH.'views/quotes/'.$page.'.php')) {
            show_404();
        }

        $data['title'] = ucfirst($page);
        $data['home'] = $this->uri->segment(1) == '';
        $data['base_url'] = $this->uri->segment(1);

        $this->load->view('templates/header');
        $this->load->view('home/header', $data);
        $this->load->view('quotes/'.$page, $data);
        $this->load->view('home/contact_home');
        // $this->load->view('home/services');
        // $this->load->view('home/testimonials');
        // $this->load->view('home/news_home');
        $this->load->view('templates/footer');
    }

    public function carrental($page = 'carrental')
    {
        if (!file_exists(APPPATH.'views/quotes/'.$page.'.php')) {
            show_404();
        }

        $data['title'] = ucfirst($page);
        $data['home'] = $this->uri->segment(1) == '';
        $data['base_url'] = $this->uri->segment(1);

        $this->load->view('templates/header');
        $this->load->view('home/header', $data);
        $this->load->view('quotes/'.$page, $data);
        $this->load->view('home/contact_home');
        // $this->load->view('home/services');
        // $this->load->view('home/testimonials');
        // $this->load->view('home/news_home');
        $this->load->view('templates/footer');
    }

    public function travelpackages($page = 'travelpackages')
    {
        if (!file_exists(APPPATH.'views/quotes/'.$page.'.php')) {
            show_404();
        }

        $data['title'] = ucfirst($page);
        $data['home'] = $this->uri->segment(1) == '';
        $data['base_url'] = $this->uri->segment(1);

        $this->load->view('templates/header');
        $this->load->view('home/header', $data);
        $this->load->view('quotes/'.$page, $data);
        $this->load->view('home/contact_home');
        // $this->load->view('home/services');
        // $this->load->view('home/testimonials');
        // $this->load->view('home/news_home');
        $this->load->view('templates/footer');
    }
}
