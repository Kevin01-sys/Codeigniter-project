<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {
    public function add($user){
        $this->db->insert('users', $user);
    }//end add

    public function select_all(){
        $this->db->select('*');
        $this->db->from('users');
        return $this->db->get()->result();
    }//end select all

    public function delete($id_user) {
        $this->db->where('id', $id_user);
        $this->db->delete('users');
    }//end delete

    public function update($user, $id_user) {
        $this->db->where('id', $id_user);
        $this->db->update('users', $user);
    }//end update
}
?>