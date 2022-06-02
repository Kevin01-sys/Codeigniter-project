<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lists extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('UserModel');
        $this->load->model('CommunesModel');
    }

    public function index(){ // VIEW
        $this->load->view('list_view.php');
    }

    public function addCommunes(){
        $comuna['region'] = $this->input->post('region');
        $comuna['comuna'] = $this->input->post('comuna');
        $comuna['provincia_id'] = 1;
        $comuna['region_id'] = 1;
        $comuna['provincia'] = 'ejemplo';
        //var_dump($comuna);
        $this->CommunesModel->add($comuna);
        redirect('lists');
    }
    public function people(){ // DATA JSON
        $jsonPost=json_decode(file_get_contents("php://input")); // get Json data as stdClass Object

        /* start: json to array */
        $tablePost['query'] = $jsonPost->params->query;
        $tablePost['limit'] = $jsonPost->params->limit;
        $tablePost['ascending'] = $jsonPost->params->ascending;
        $tablePost['page'] = $jsonPost->params->page;
        $tablePost['byColumn'] = $jsonPost->params->byColumn;
        $tablePost['orderBy'] = $jsonPost->params->orderBy;
        /* end: json to array */

        $data['users'] = $this->UserModel->select_all(); // user table records
        $response = json_encode($data['users']);
        header('Content-Type: application/json');
        echo $response;
    }

    public function communes(){ // DATA JSON
        /* start: json to array */
        $tableGet['query'] = $this->input->get('query');
        $tableGet['limit'] = $this->input->get('limit');
        $tableGet['ascending'] = $this->input->get('ascending');
        $tableGet['page'] = $this->input->get('page');
        $tableGet['byColumn'] = $this->input->get('byColumn');
        $tableGet['orderBy'] = $this->input->get('orderBy');
        /* end: json to array */
        $data['comunas'] = $this->CommunesModel->select_communes_page($tableGet); // obtains a certain portion of the total number of records
        $data['contar_comunas'] = $this->CommunesModel->count_communes($tableGet); // one hundred percent of records are counted
        //$data['contar_comunas'] = count($data['comunas']); // one hundred percent of records are counted

        $response = json_encode($data);
        header('Content-Type: application/json');
        echo $response;
    }
}