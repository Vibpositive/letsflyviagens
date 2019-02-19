<?php

class AdminSales_Controller extends CI_Controller
{

	public function __construct() {
		parent::__construct();
		
		if(!isset($this->session->userdata['logged_in'])){
			redirect(base_urL() . '/login');
		}

        $this->load->helper('form', 'url');
		$this->load->library('form_validation');
		$this->load->library('user_agent');
		$this->load->library('session');
		$this->load->model("admin/Sales_model", "model");

    }

    public function index($page = 'index')
    {
        $this->load->view('templates/admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/sales/index');
        $this->load->view('templates/admin/footer');
	}
	
    public function update($id){
		
		if(!$id){
			show_404();
		}
		
		$data = $this -> model -> get_by_id($id);
		
		if(!$data){
			show_404();
		}
		
		$data = array(
			'id' => $data[0]['id'],
			'image' => $data[0]['image']
		);
		
        $this->load->view('templates/admin/header');
		$this->load->view('admin/menu');
        $this->load->view('admin/sales/update', $data);
        $this->load->view('templates/admin/footer');
    }

    public function create()
    {
        $this->load->view('templates/admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/sales/create');
        $this->load->view('templates/admin/footer');
	}
	
    public function upload(){
		
		$upload_path = './assets/images/caroussel/';
        
        $config['upload_path']          = $upload_path;
        $config['allowed_types']        = 'gif|jpg|png';
		
        $config['encrypt_name'] = TRUE;
        
        $config['max_size']             = 9999;
        $config['max_width']            = 1024;
		$config['max_height']           = 1024;
		
		$this->load->library('upload', $config);
		
		$refer =  $this->agent->referrer();
		
        if ( ! $this->upload->do_upload('image')){
            $error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('error', $error);
        }else{

			$post = $this->input->post(NULL, TRUE);
			$data = array('image' => $this->upload->data()['file_name']);
			
			$result = false;

			// FIXME: setflashdata message on result var
			if($post['id']){
				$result = $this->model->update($post['id'], $data);
				$this->session->set_flashdata('success', "Atualizado com sucesso");
				redirect($refer);
			}else{
				$result = $this->model->create($data);
				$this->session->set_flashdata('success', "Enviado com sucesso");
				redirect(base_url() . "/admin/sales");
			}
        }
	}
	
	public function delete(){

		$method = $this->input->method();
		if($method != "post"){
			show_404();	
		}

		$refer =  $this->agent->referrer();
		
		$post = $this->input->post(NULL, TRUE);
		
		$result = false;

		if(!$post['id']){
			show_404();
		}
		
		$result = $this->model->delete($post['id']);
		
		$this->session->set_flashdata('success', "removido com sucesso");

		redirect(base_url() . "admin/sales");
    }
}
