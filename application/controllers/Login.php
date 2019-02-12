<?php

Class Login extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        // Load form helper library
        $this->load->helper('form', 'url');
        
        // Load form validation library
        $this->load->library('form_validation');
        
        // Load session library
        $this->load->library('session');
        
        // Load database
        $this->load->model('login_model');
    }
    
    // Show login page
    public function index() {
        $this->load->view('templates/header');
        $this->load->view('login/login');
    }
    
    // Show registration page
    public function user_registration_show() {
        $this->load->view('login/registration_form');
    }
    
    // Validate and store registration data in database
    // public function new_user_registration() {
        
<<<<<<< HEAD:application/controllers/Login.php
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
=======
    //     // Check validation for user input in SignUp form
    //     $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
    //     $this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean');
    //     $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->load->view('login/registration_form');
    //     } else {
    //         $data = array(
    //             'username' => $this->input->post('username'),
    //             'email' => $this->input->post('email_value'),
    //             'password' => $this->input->post('password')
    //         );
    //         $result = $this->login_model->registration_insert($data);
    //         if ($result == "true") {
    //             $data['message_display'] = 'Registration Successfully !';
    //             $this->load->view('login/login_form', $data);
    //         } else {
    //             $data['message_display'] = $result;
    //             // $this->load->view('login/registration_form', $data);
    //             // header("location: http://localhost/login/");
    //             redirect('/login');
    //         }
    //     }
    // }
>>>>>>> develop:application/controllers/Login.php
    
    // Check for user login process
    public function login() {
        
        // $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        
        if ($this->form_validation->run() == FALSE) {
            if(isset($this->session->userdata['logged_in'])){
                // $this->load->view('login/admin');
                redirect('/admin', 'refresh');
            }else{
<<<<<<< HEAD:application/controllers/Login.php
                // $this->load->view('login/login_form');
                redirect(base_url() . '/login', 'refresh');
=======
                $this->load->view('login/login_form');
                // header("location: http://localhost/login/");
                redirect('/login');
                
>>>>>>> develop:application/controllers/Login.php
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
<<<<<<< HEAD:application/controllers/Login.php
                    // $this->load->view('login/admin');
                    redirect('/admin', 'refresh');
=======
                    // $this->load->view('login/admin_page');
                    redirect('/admin');
>>>>>>> develop:application/controllers/Login.php
                }
            } else {
                $data = array(
                    'error_message' => 'Invalid Username or Password'
                );
<<<<<<< HEAD:application/controllers/Login.php
                $this->session->set_flashdata('error', $data);
                redirect(base_url() . '/admin', 'refresh');
=======
                // $this->load->view('login/login_form', $data);
                // header("location: http://localhost/login/");
                redirect('/login');
>>>>>>> develop:application/controllers/Login.php
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
        // $this->load->view('login/login_form', $data);
        redirect('/login');
    }
    
}

?>
