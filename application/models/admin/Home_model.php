<?php

Class Home_model extends CI_Model {
    
    private $table = "home";

    // Insert registration data in database
    public function get_section_1() {
        
        // Query to check whether username already exist or not
        // $condition = "email ='" .  $data['email'] . "'";

        $this->db->select('*');
        $this->db->from($this -> table);
        // $this->db->where($condition);
        // $this->db->limit(1);
        $query = $this->db->get();

        // print_r();
        // die();

        return $query -> result_array();
        
        // $this -> load -> model('user_model');
        // $user = $this -> user_model -> get_user_by_username($data['username']);
        // $user_name = $this -> user_model -> get_user_by_username($data['username']);
        // $user_email = $this -> user_model -> get_user_by_username($data['email']);
        
        // if (is_null($user_email) && is_null($user_name)) {
            
        //     // Query to insert data in database
        //     $this->db->insert($this -> table, $data);

        //     if ($this->db->affected_rows() > 0) {
        //         return "true";
        //     }
        // } else {
        //     if($user_name){
        //         return "Username Taken";
        //     }elseif ($user_email) {
        //         return "Email Taken";
        //     }
        //     return "false";
        // }
    }

    public function insert_into_typer($data) {
        
        $this->db->insert($this -> table, $data);
        return $this->db->affected_rows() > 0;

    }

    public function update_typer($data) {
        
        $minupdate = count($data);
        $updatecount = 0;

        
        foreach ($data as $item) {
            $where = $item[key($item)];
            echo "<pre>";
            print_r($item);
            echo "</pre>";
            // die();
            // $this->db->where("name", $where);
            // $this->db->update($this -> table, $item);
            // if($this->db->affected_rows() == 1);
        }
        // $this->db->update($this -> table, $data);
        // echo  $this->db->affected_rows() > 0;
        // return $this->db->affected_rows() > 0;

    }
    
}

?>