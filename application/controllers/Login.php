<?php

Class Login extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        // Load form helper library
        $this->load->helper('form');
        
        // Load form validation library
        $this->load->library('form_validation');
        
        // Load session library
        $this->load->library('session');
        
        // Load database
        $this->load->model('login_model');
    }
    
    // Show login page
    public function index() {
        // $this->load->helper('form');
        // $this->load->view('login/login_form');
        $this->load->view('templates/header');
        $this->load->view('login/login');
    }
    
    // Show registration page
    public function user_registration_show() {
        $this->load->view('login/registration_form');
    }
    
    // Validate and store registration data in database
    public function new_user_registration() {
        
        // Check validation for user input in SignUp form
        // $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login/registration_form');
        } else {
            $data = array(
                // 'username' => $this->input->post('username'),
                'username' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );
            $result = $this->login_model->registration_insert($data);
            if ($result == "true") {
                $data['message_display'] = 'Registration Successfully !';
                $this->load->view('login/login_form', $data);
            } else {
                $data['message_display'] = $result;
                $this->load->view('login/registration_form', $data);
            }
        }
    }
    
    // Check for user login process
    public function user_login_process() {
        
        // $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        
        if ($this->form_validation->run() == FALSE) {
            if(isset($this->session->userdata['logged_in'])){
                // $this->load->view('login/admin');
                redirect('/admin', 'refresh');
            }else{
                // $this->load->view('login/login_form');
                redirect(base_url() . '/login', 'refresh');
            }
        } else {
            $data = array(
                // 'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );
            $result = $this->login_model->login($data);
            // die($result);   
            if ($result == 'true') {
                
                // $username = $this->input->post('username');
                $email = $this->input->post('email');
                $result = $this->login_model->read_user_information($email);
                if ($result != false) {
                    $session_data = array(
                        'username' => $result[0]->username
                   );
                    // Add user data in session
                    $this->session->set_userdata('logged_in', $session_data);
                    // $this->load->view('login/admin');
                    redirect('/admin', 'refresh');
                }
            } else {
                $data = array(
                    'error_message' => 'Invalid Username or Password'
                );
                $this->session->set_flashdata('error', $data);
                redirect(base_url() . '/admin', 'refresh');
            }
        }
    }
    
    // Logout from admin page
    public function logout() {
        
        // Removing session data
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $data['message_display'] = 'Successfully Logout';
        $this->load->view('login/login_form', $data);
    }
    
}

?>
