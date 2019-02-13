<?php

class Sales_controller extends CI_Controller
{

	public function __construct() {
		parent::__construct();
		
        $this->load->helper('form', 'url');
		$this->load->library('form_validation');
		$this->load->library('user_agent');
		$this->load->library('session');
		
		// TODO: session management to all endpoints
		if(!isset($this->session->userdata['logged_in'])){
			show_404();
		}
    }

    public function index($page = 'index')
    {
        $model_name = 'Sales_model';
        $page_name = 'index';
        $section_name = "sales";
        
        $this->load->model("admin/$model_name", "model");

        $this->load->view('templates/admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/' . $section_name . '/' . $page_name);
        $this->load->view('templates/admin/footer');
	}
	
    public function sales_update($id){
		
		if(!$id){
			show_404();
		}

        $model_name = 'Sales_model';
        $page_name = 'index';
        $section_name = "sales";
        
		$this->load->model("admin/$model_name", "model");

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

    public function sales_create()
    {
        $model_name = 'Sales_model';
        $this->load->model("admin/$model_name", "model");

        $this->load->view('templates/admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/sales/create');
        $this->load->view('templates/admin/footer');
	}
	
    public function upload(){
		
		$upload_path = './assets/images/sales/';
        
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
			$this->load->model("admin/sales_model", "model");

			$post = $this->input->post(NULL, TRUE);
			$data = array('image' => $this->upload->data()['file_name']);
			
			$result = false;

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
		$this->load->model("admin/sales_model", "model");

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
