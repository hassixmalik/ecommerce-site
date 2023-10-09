<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        //$this->load->library('session');
        $this->load->database();
    }

    public function shop(){
        $this->load->view('shop');
    }

    public function shopdetail(){
        $this->load->view('shopdetail');
    }

    public function admin(){
        $this->load->view('login');
    }

    public function adminauth(){
        $userid = $this->input->post('uid');
        $password = $this->input->post('password');

        // Query the database to check user credentials
        $user = $this->user_model->validate_user($userid, $password);

        if($user){
            $this->load->view('adminview');
        }
    }

}