<?php

Class Login_Model extends CI_Model {
    
    private $table = "user";

    public function __construct(){
        $this->load->database();
    }

    // Insert registration data in database
    public function registration_insert($data) {
        
        // Query to check whether username already exist or not
        $condition = "email ='" .  $data['email'] . "'";
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        $this -> load -> model('user_model');
        // $user = $this -> user_model -> get_user_by_username($data['username']);
        $user_name = $this -> user_model -> get_user_by_username($data['username']);
        $user_email = $this -> user_model -> get_user_by_username($data['email']);
        
        if (is_null($user_email) && is_null($user_name)) {
            
            // Query to insert data in database
            $this->db->insert($this -> table, $data);

            if ($this->db->affected_rows() > 0) {
                return "true";
            }
        } else {
            if($user_name){
                return "Username Taken";
            }elseif ($user_email) {
                return "Email Taken";
            }
            return "false";
        }
    }
    
    // Read data using username and password
    public function login($data) {
        
        // $condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
        $condition = "email =" . "'" . $data['email'] . "' AND " . "password =" . "'" . $data['password'] . "'";
        $this->db->select('*');
        $this->db->from($this -> table);
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
            return 'true';
        } else {
            return 'false';
        }
    }
    
    // Read data from database to show data in admin page
    public function read_user_information($username) {
        
        $condition = "username =" . "'" . $username . "'";
        $this->db->select('*');
        $this->db->from($this -> table);
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    
}

?>