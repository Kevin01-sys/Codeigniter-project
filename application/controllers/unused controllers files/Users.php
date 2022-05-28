<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    public function test()
    {
        $stream_clean = $this->security->xss_clean($this->input->raw_input_stream);
        $request = json_decode($stream_clean);
        $ready = $request->nombreGato;
        print_r ($request);
        echo $ready;

        /* Fetch JSON: Not working */
        $data = $this->input->post("nombreGato", true);
        var_dump($this->input->post());

        /* Fetch JSON: working with pure PHP */
        $dataObtain = json_decode(file_get_contents('php://input')); // Get JSON and decode it
        $nombreGato = $dataObtain->nombreGato;
        $array = [];
        $array[0] = $nombreGato;
        echo json_encode($array);
    }
}