<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('UserModel');
    }

    public function index(){
        $data['users'] = $this->UserModel->select_all();
        //var_dump($data);
        $this->load->view('get_data', $data);
    }

    public function addUser(){
        $user['run'] = $this->input->post('run');
        $user['name'] = $this->input->post('nombre');
        $user['hobby'] = $this->input->post('hobby');
        $user['state'] = 1;
        //var_dump($user);
        $this->UserModel->add($user);
        redirect('Users');
    }

	public function editar($id_persona) {
		$persona['nombre'] = $this->input->post('nombre');
		$persona['ap'] = $this->input->post('ap');
		$persona['am'] = $this->input->post('am');
		$persona['fn'] = $this->input->post('fn');
		$persona['genero'] = $this->input->post('genero');

		$this->Persona->actualizar($persona, $id_persona);
		redirect('welcome');
	}//end editar

    public function deleteUser($id_user){
		$this->UserModel->delete($id_user);
		redirect('users');
    }

    public function getJson(){
        /* Note: You need to clean your $this->input->raw_input_stream.
         You are not using $this->input->post() which means this is not done automatically by CodeIgniter. */
        $stream_clean = $this->security->xss_clean($this->input->raw_input_stream);
        $request = json_decode($stream_clean);
        if (isset($request->nombreGato)) {
            $nombreGato = $request->nombreGato;
        }
        //print_r ($request);
        //echo $nombreGato;

        // As for the response:
        if (isset($request)) {
            $response = json_encode($request);
        } else {
            $response = '';
        }

        header('Content-Type: application/json');
        echo $response;
        /* Note: It is not required to set the header('Content-Type:
        application/json') but I think it is a good practice to do so.
        The request already set the 'Accept': 'application/json' header. */
    }
}