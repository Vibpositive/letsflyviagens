<?php

class AdminNews_Controller extends CI_Controller
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
		
		$this->load->model("admin/news_model", "model");
    }

    public function index()
    {
        $this->load->view('templates/admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/news/index');
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
		
        $this->load->view('templates/admin/header');
		$this->load->view('admin/menu');
        $this->load->view('admin/news/edit', $data[0]);
        $this->load->view('templates/admin/footer');
    }
	

	public function create(){
		$this->load->view('templates/admin/header');
		$this->load->view('admin/menu');
		$this->load->view('admin/news/create');
		$this->load->view('templates/admin/footer');
	}
	
	public function create_news(){
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
		
		redirect(base_url() . "admin/news");	
	}
	
	public function update()
	{
		$method = $this->input->method();
		$post = $this->input->post(NULL, TRUE);
		$refer 	= $this->agent->referrer();

		$id = isset($post['id']) ? $post['id'] : null;
		
		if($method != "post" || !$post['id']){
			show_404();	
		}

		$title          = $post['title'];
		$body           = $post['body'];

		if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {

			$config['upload_path']          = './assets/images/news/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['encrypt_name']         = true;
			
			$config['max_size']             = 9999;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;

			$this->load->library('upload', $config);

			if (! $this->upload->do_upload('image')) {
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('error', $error);
				redirect($refer);
			} else {
				$post = $this->input->post(null, true);
				$data = array('image' => $this->upload->data()['file_name'], "title" => $title, "body" => $body);
			}
		}else{
			$data = array("title" => $title, "body" => $body);
		}
		
		$query = $this->model->update($post['id'], $data);
		
		if($query > 0){
			$this->session->set_flashdata('success', "Atualizado com sucesso");
		}else{
			// TODO: LOG error message
			die(print_r($query) . "<br/>after");
			$this->session->set_flashdata('error', array("error" => "Houve um problema ao atualizar"));
		}
		redirect($refer);
	}

	public function upload(){
		
		$upload_path = './assets/images/news/';
        
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
			redirect($refer);
        }else{
			
			$post = $this->input->post(NULL, TRUE);
            $title = $post['title'];
			$body = $post['body'];
			
			$callback = $post['callback'];

			if($title == ""){
				$title = null;
			}
			
			if($body == ""){
				$body = null;
			}
			
			$data = array('image' => $this->upload->data()['file_name'], "title" => $title, "body" => $body);
			
			$query = $this->model->create($data);

			if($query > 0){
				$this->session->set_flashdata('success', "Enviado com sucesso");
			}else{
				// TODO: LOG error message
				$this->session->set_flashdata('error', array("error" => "Houve um problema ao enviar"));
			}
        }
		redirect($refer);
	}
	
}
