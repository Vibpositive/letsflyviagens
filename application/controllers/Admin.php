<?php

class Admin extends CI_Controller
{

	public function __construct() {
		parent::__construct();
		
		if(!isset($this->session->userdata['logged_in'])){
			show_404();
		}

    }
	
	public function index(){
		$this->load->view('templates/admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/index');
        $this->load->view('templates/admin/footer');
	}
}
