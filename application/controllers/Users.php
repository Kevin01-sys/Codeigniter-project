<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function index()
    {
        $this->load->view('get_data');
    }

    public function getJson()
    {
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