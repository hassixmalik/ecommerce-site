<?php
defined('BASEPATH') OR exit('No direct script access allowed');


 
class User_model extends CI_Model {

    public function get_user_by_id($id,$password) {
        // Retrieve user data based on the provided User ID

        $query = $this->db->get_where('users', array(
            'uid' => $id,
            'password' => $password
        ));
        return $query->row_array();
    }

    public function validate_user($userid, $password){
        $query = $this->db->get_where('users', array('userID' => $userid, 'Password' => $password));
        if ($query->num_rows() === 1) {
            return true;
        }
    }

    public function insert_product($data) {
        return $this->db->insert('products', $data);
    }


}