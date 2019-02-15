<?php

class Currency extends CI_Controller
{
    public function index($page = 'index')
    {
        $this->load->database();
        $this->load->model('admin/Currency_model', 'model');
        header('Content-Type: application/json');

        echo json_encode($this->model->get_currencies());
    }

}
