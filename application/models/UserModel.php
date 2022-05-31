<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    public function add($user){
        $this->db->insert('users', $user);
    }

    public function select_all(){
        $this->db->select('*');
        $this->db->from('users');
        return $this->db->get()->result();
    }

    public function select_all_communes($filtro){
        $this->db->select('*');
        $this->db->from('comunas');
        return $this->db->get()->result();
    }

    public function count_all_communes(){
        $this->db->select('COUNT(id) AS lenght');
        $this->db->from('comunas');
        return $this->db->get()->result();
    }

    public function select_communes_page($filtro){
        $length = $filtro['limit'];
        $start = ($filtro['page'] - 1) * $filtro['limit'];

        if (!empty($filtro['orderBy'])) {
                    //Campo ascending = 1 indica orden ascendente otro valor indica descendente
                    $orderDir = $filtro['ascending'] == 1 ? 'ASC' : 'DESC';
                    //Campo orderBy es la columna por la que se debe ordenar los resultados.
                    $columnOrder = $filtro['orderBy'];
                    $orden = "$columnOrder $orderDir";
                }
        //

        $posicionPage = $filtro['page']-1;
        $pagination = $posicionPage*$filtro['limit'];
        $this->db->select('*');
        $this->db->from('comunas');
        //$this->db->limit(20, 0);
        $this->db->limit($filtro['limit'], $pagination);
        return $this->db->get()->result();
    }

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