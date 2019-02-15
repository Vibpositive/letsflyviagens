<?php

class AdminTyper_Controller extends CI_Controller
{

	public function __construct() {
		parent::__construct();
		
        $this->load->helper('form', 'url');
		$this->load->library('form_validation');
		$this->load->library('user_agent');
		$this->load->library('session');
		
		$this->load->model("admin/Typer_model", "model");
		
		// TODO: session management to all endpoints
		if(!isset($this->session->userdata['logged_in'])){
			show_404();
		}
    }

    public function index()
    {
        $this->load->view('templates/admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/typer/index');
        $this->load->view('templates/admin/footer');
	}

	public function edit($id){
		
		if(!$id){
			show_404();
		}
		
		
		$data = $this -> model -> get_by_id($id);
		
		if(!$data){
			show_404();
		}
		
		$data = array(
			'id' => $data[0]['id'],
			'vallue' => $data[0]['value']
		);
		
        $this->load->view('templates/admin/header');
		$this->load->view('admin/menu');
        $this->load->view('admin/Typer/edit', $data);
        $this->load->view('templates/admin/footer');
    }
	

	public function create(){
		$this->load->view('templates/admin/header');
		$this->load->view('admin/menu');
		$this->load->view('admin/Typer/create');
		$this->load->view('templates/admin/footer');
	}
	
	public function create_typer(){
		$method = $this->input->method();

		if($method != "post"){
			show_404();
		}

		$refer 	= $this->agent->referrer();
		$post 	= $this->input->post(NULL, TRUE);

		if(!$post){
			redirect($refer);
		}
		
		$query = $this->model->create($post);

		if($query > 0){
			$this->session->set_flashdata('success', "Criado com sucesso");
		}else{
			// TODO: LOG error message
			$this->session->set_flashdata('error', array("error" => "Houve um problema ao inserir"));
		}

		redirect($refer);
	}

	public function delete(){

		$method = $this->input->method();
		$post = $this->input->post(NULL, TRUE);

		if($method != "post" || !$post['id']){
			show_404();	
		}
		
		$refer =  $this->agent->referrer();

		$query = $this->model->delete($post['id']);
		
		if($query > 0){
			$this->session->set_flashdata('success', "Deletado com sucesso");
		}else{
			// TODO: LOG error message
			$this->session->set_flashdata('error', array("error" => "Houve um problema ao deletar"));
		}
		
		redirect(base_url() . "admin/typer");	
	}
	
	public function update()
	{
		$method = $this->input->method();
		$post = $this->input->post(NULL, TRUE);
		$refer 	= $this->agent->referrer();
		
		if($method != "post" || !$post['id']){
			show_404();	
		}
		
		$data = array('value' => $post['value'], "id" => $post['id']);
		
		$query = $this->model->update($post['id'], $data);
		
		if($query > 0){
			$this->session->set_flashdata('success', "Atualizado com sucesso");
		}else{
			// TODO: LOG error message
			$this->session->set_flashdata('error', array("error" => "Houve um problema ao atualizar"));
		}
		redirect($refer);
	}
	
}
