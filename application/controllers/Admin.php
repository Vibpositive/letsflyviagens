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

        // print_r("page: " . $page  . " || operation: " . $operation . " || id: " . $id);
        // echo "<br>";
        // echo APPPATH.'views/admin/' . $page . "/" . $operation . '.php';
        // echo "<br>";
        // echo APPPATH.'views/admin/' . $page . '.php';
        // echo "<br>";
        // die();

        
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
    
    private function loadview($mainpage, $page, $operation = "", $id = 0){

        // print_r("mainpage: " . $mainpage . " || page: " . $page  . " || operation: " . $operation . " || id: " . $id);
        // echo "<br>";
        // echo APPPATH.'views/admin/' . $mainpage . '/' . $page . "/" . $operation . '.php';
        // echo "<br>";
        // echo APPPATH.'views/admin/' . $mainpage . '/' . $page . '.php';
        // echo "<br>";
        // die();
        
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

            // $this -> loadview($callback, "");
            redirect("admin/$callback/", 'refresh');
            // $this->load->view(, $data);  
        } 
    }
    
}