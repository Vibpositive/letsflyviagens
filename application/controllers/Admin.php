<?php

class Admin extends CI_Controller
{
                                             
    public function index($page = 'index')
    {
        if (!file_exists(APPPATH.'views/admin/'.$page.'.php')) {
            // show_404();
        }

        $this->load->view('templates/admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/index');
        $this->load->view('templates/admin/footer');
    }

    public function home($page, $operation = "", $id = 0, $run = "")
    {
        $model_name = $page.'_model';
        $this->load->model("admin/$model_name", "model");

        if($run === "" && $operation !== "create"){
            $this -> loadview("home", $page, $operation, $id);
        }else{
            $post = $this->input->post(NULL, TRUE);
            
            switch ($operation) {
                case 'update':
                    if($this->model->update($id, $post)){
                        redirect("admin/home/" . $page . "/" . $operation . "/" . $id, 'refresh');
                    }else{
                        // TODO: better message
                        die("could not update");
                    }
                    break;
                    case 'delete':
                        if($this->model->delete($id)){
                            redirect("admin/home/" . $page, 'refresh');
                        }else{
                            // TODO: better message
                            die("could not delete");
                        }
                        break;
                        case 'create':
                        if($this->model->create($post)){
                            redirect("admin/home/" . $page, 'refresh');
                        }else{
                            // TODO: better message
                            die("could not create");
                        }
                    break;
                default:
                    # code...
                    break;
            }
        }
    }

    public function news($operation = "", $id = 0, $run = "")
    {
        $page = "news";
        
        $this->load->model("admin/news_model", "model");
        if($run === "" && $operation !== "create"){
            // die("if");

            $this -> loadview("news", "", $operation, $id);

        }else{
            // die("else");
            $post = $this->input->post(NULL, TRUE);
            
            switch ($operation) {
                case 'update':

                    $config['upload_path']          = './assets/images/news/';
                    $config['allowed_types']        = 'gif|jpg|png';
                    $config['encrypt_name']         = true;
                    
                    $config['max_size']             = 9999;
                    $config['max_width']            = 9999;
                    $config['max_height']           = 9999;

                    $this->load->library('upload', $config);

                    if (! $this->upload->do_upload('image')) {
                        $error = array('error' => $this->upload->display_errors());
                        // $this->load->view('admin', $error);
                        die($error);
                    } else {
                        $post           = $this->input->post(null, true);
                        $title          = $post['title'];
                        $body           = $post['body'];
                        $callback       = $post['callback'];
                        $data           = array('image' => $this->upload->data()['file_name'], "title" => $title, "body" => $body);

                        $this->load->model("admin/news_model", "model");

                        if ($this->model->update($id, $data)) {
                            // redirect("admin/news/" . $page . "/" . $operation . "/" . $id, 'refresh');
                            redirect("admin/$callback/", 'refresh');
                        } else {
                            // TODO: better message
                            die("could not update");
                        }
                    }
                    
                    break;
                    case 'delete':
                        if($this->model->delete($id)){
                            redirect("admin/news/", 'refresh');
                        }else{
                            die("could not delete");
                            // TODO: better message
                        }
                        break;
                        case 'create':
                        if($this->model->create($post)){
                            redirect("admin/news/" . $page, 'refresh');
                        }else{
                            // TODO: better message
                            die("could not create");
                        }
                    break;
                default:
                    # code...
                    break;
            }
        }
    }
    
    public function quotes($operation = "", $id = 0, $run = "")
    {
        // die($operation . " || " . $id . " || " . $run);

        switch ($operation) {
            case 'pagination':
                # code...
                $this -> load_quotes();
                break;
            case 'view':
                # code...
                // $this -> load_quotes();
                die("view");
                break;
            
            default:
                # code...
                break;
        }
        

    }

    private function load_quotes(){
        $this->load->library('pagination');
        $this->load->helper('url');

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
             
            $config['base_url'] = base_url() . 'admin/quotes/pagination/';
            // http://localhost/letsfly/admin/quotes

            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 4;
             
            $this->pagination->initialize($config);
             
            // build paging links
            $params["links"] = $this->pagination->create_links();
        }
        
        $this->load->view('templates/admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/quotes/quotes', $params);
        $this->load->view('templates/admin/footer');

    }

    private function loadview($mainpage, $page, $operation = "", $id = 0){
        
        if($operation !== ""){
            if (!file_exists(APPPATH.'views/admin/' . $mainpage . '/' . $page . "/" . $operation . '.php')) {
                show_404();
            }
            
            $data['id'] = $id;
            
            $this->load->view('templates/admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/' . $mainpage . '/' . $page . "/" . $operation, $data);
            $this->load->view('templates/admin/footer');
        }elseif ($page === "") {
            
            if (!file_exists(APPPATH.'views/admin/' . $mainpage . "/" . $mainpage . '.php')) {
                show_404();
            }
            
            $this->load->view('templates/admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/' . $mainpage . "/" . $mainpage);
            $this->load->view('templates/admin/footer');
        }
        else{
            
            if (!file_exists(APPPATH.'views/admin/' . $mainpage . '/' . $page . '.php')) {
                show_404();
            }
            
            $this->load->view('templates/admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/' . $mainpage . '/' . $page);
            $this->load->view('templates/admin/footer');
        }
    }
    
    public function upload(){
        $config['upload_path']          = './assets/images/news/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        
        $config['max_size']             = 9999;
        $config['max_width']            = 9999;
        $config['max_height']           = 9999;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('image')){
            $error = array('error' => $this->upload->display_errors());
            // $this->load->view('admin', $error);
            // $this -> loadview("admin", "");
            $this->session->set_flashdata('error', $error);
            redirect("admin/news/", 'refresh');
        }else{
            $post = $this->input->post(NULL, TRUE);
            $title = $post['title'];
            $body = $post['body'];
            $callback = $post['callback'];
            $data = array('image' => $this->upload->data()['file_name'], "title" => $title, "body" => $body);
            
            $this->load->model("admin/news_model", "model");
            $this->model->create($data);
            
            $this->session->set_flashdata('success', "Criado com sucesso");
            redirect("admin/$callback/", 'refresh');
            // $this->load->view(, $data);  
        } 
    }
    
}