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
        /* working: creates a json and traverses it
        $datos='
        {
            "rates": {
            "AED": 3.673014,
            "AFN": 68.343295,
            "ALL": 115.9367,
            "AMD": 479.122298
            }
        }';
        $jsonObject = json_decode($datos);
        print_r($jsonObject);
        foreach ($jsonObject->rates as $v){
            echo "$v\n";
        } */

        // POST test 1: working, but remains as stdClass Object
        $jsonPost=json_decode(file_get_contents("php://input"));

        $tablePost['query'] = $jsonPost->params->query;
        $tablePost['limit'] = $jsonPost->params->limit;
        $tablePost['ascending'] = $jsonPost->params->ascending;
        $tablePost['page'] = $jsonPost->params->page;
        $tablePost['byColumn'] = $jsonPost->params->byColumn;
        $tablePost['orderBy'] = $jsonPost->params->orderBy;
        //var_dump($tablePost);
        /* working:
            foreach ($jsonPost->params as $v){
            echo "$v\n";
        } */

        // POST test 2: working, array
        parse_str(file_get_contents("php://input"),$_POST);
        extract($_POST, EXTR_OVERWRITE);

        // POST test 2: not working
        /* $tablePost['query'] = $this->input->post('query');
        $tablePost['limit'] = $this->input->post('limit');
        $tablePost['ascending'] = $this->input->post('ascending');
        $tablePost['page'] = $this->input->post('page');
        $tablePost['byColumn'] = $this->input->post('byColumn'); */

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