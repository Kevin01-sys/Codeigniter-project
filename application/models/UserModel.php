<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    public function add($user)
    {
        $this->db->insert('users', $user);
    }
}
?>