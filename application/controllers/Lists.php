<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lists extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('UserModel');
    }

    public function index(){
        $this->load->view('list_view.php');
    }

    public function people(){
        $data['users'] = $this->UserModel->select_all();
        $response = json_encode($data['users']);
        header('Content-Type: application/json');
        echo $response;
    }
}