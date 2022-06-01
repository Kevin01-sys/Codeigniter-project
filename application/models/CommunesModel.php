<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CommunesModel extends CI_Model {
    public function select_all_communes(){
        $this->db->select('*');
        $this->db->from('comunas');
        return $this->db->get()->result();
    }

    public function count_all_communes(){
        $this->db->select('count(id) AS lenght');
        $this->db->from('comunas');
        return $this->db->get()->result();
    }

    public function select_communes_page($filtro){
        /* start: francisco's program logic: still unused */
        $length = $filtro['limit'];
        $start = ($filtro['page'] - 1) * $filtro['limit'];
        if (!empty($filtro['orderBy'])) {
            //Campo ascending = 1 indica orden ascendente otro valor indica descendente
            $orderDir = $filtro['ascending'] == 1 ? 'ASC' : 'DESC';
            //Campo orderBy es la columna por la que se debe ordenar los resultados.
            $columnOrder = $filtro['orderBy'];
            $orden = "$columnOrder $orderDir";
        }
        /* end: francisco's program logic: still unused */

        /* start: filters are created for query */
        $posicionPage = $filtro['page']-1;
        $pagination = $posicionPage*$filtro['limit'];
        /* end: filters are created for query */

        /* start: sql query */
        $this->db->select('*');
        $this->db->from('comunas');
        //$this->db->limit(20, 0);
        $this->db->limit($filtro['limit'], $pagination);
        if (isset($columnOrder) && isset($orderDir)) {
            $this->db->order_by($columnOrder, $orderDir);
        }
        /* end: sql query */
        return $this->db->get()->result();
    }
}
?>