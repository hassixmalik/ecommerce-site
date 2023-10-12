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

    public function additemsview(){
        $this->load->view('additems');
    }

    public function additems(){
        if ($this->input->post()) {
            // Retrieve data from the form
            $data = array(
                'Category' => $this->input->post('category'),
                'Title' => $this->input->post('title'),
                'Price' => $this->input->post('price'),
                'Discount' => $this->input->post('discount'),
                'Description' => $this->input->post('description'),
                'Size' => $this->input->post('size'),
                'Shades' => $this->input->post('shades'),
                'ImageURL' => $this->input->post('imageURL')
            );

            // Call the model method to insert the data into the database
            if($this->User_model->insert_product($data)){
                echo 'submitted';
            }
            else{
                echo 'failed';
            }

            // You can add a success message or redirect the user to a success page here
        }

       
        $this->load->view('adminview');
    }

}