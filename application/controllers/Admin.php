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
            $this -> loadview($page, $operation, $id);  
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
    
    private function loadview($page, $operation = "", $id = 0){
        if($operation !== ""){
            if (!file_exists(APPPATH.'views/admin/home/' . $page . "/" . $operation . '.php')) {
                show_404();
            }

            $data['id'] = $id;
            $this->load->view('templates/admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/home/' . $page . "/" . $operation, $data);
            $this->load->view('templates/admin/footer');
        }else{
            if (!file_exists(APPPATH.'views/admin/home/' . $page . '.php')) {
                show_404();
            }
            
            $this->load->view('templates/admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/home/' . $page);
            $this->load->view('templates/admin/footer');
        }
    }
    
    
}