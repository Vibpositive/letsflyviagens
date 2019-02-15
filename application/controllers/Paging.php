<?php
defined('BASEPATH') or exit('No direct script access allowed');
 
class Paging extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper('url');
    }
     
    public function index()
    {
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
             
            $config['base_url'] = base_url() . 'paging/index';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
             
            $this->pagination->initialize($config);
             
            // build paging links
            $params["links"] = $this->pagination->create_links();
        }

        // $this->load->view('user_listing', $params);
        $this->load->view('templates/header');
        $this->load->view('admin/quotes/table', $params);
        $this->load->view('templates/footer');


    }
}
