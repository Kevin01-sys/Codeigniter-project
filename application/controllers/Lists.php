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

    public function communes(){
        $tableGet['query'] = $this->input->get('query');
        $tableGet['limit'] = $this->input->get('limit');
        $tableGet['ascending'] = $this->input->get('ascending');
        $tableGet['page'] = $this->input->get('page');
        $tableGet['byColumn'] = $this->input->get('byColumn');
        $data['comunas'] = $this->UserModel->select_communes_page($tableGet);
        $data['contar_comunas'] = $this->UserModel->count_all_communes($tableGet);
        $response = json_encode($data);
        header('Content-Type: application/json');
        echo $response;
    }
}