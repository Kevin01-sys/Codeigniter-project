<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CommunesModel extends CI_Model {
    public function add($comuna){
        $this->db->insert('comunas', $comuna);
    }//end add

    public function select_all_communes(){
        $this->db->select('*');
        $this->db->from('comunas');
        return $this->db->get()->result();
    }

    // counts the communes with or without filter
    public function count_communes($filtro){
        $this->db->select('count(id) AS lenght');
        $this->db->from('comunas');
        $this->db->like('id', $filtro['query']);
        $this->db->or_like('comuna', $filtro['query']);
        $this->db->or_like('region', $filtro['query']);
        return $this->db->get()->result();
    }

    /* start: The number of records is limited to a certain number of communes */
    public function select_communes_page($filtro){
        /* start: filters are created for query */
        $length = $filtro['limit'];
        $start = ($filtro['page'] - 1) * $filtro['limit'];

        if (!empty($filtro['orderBy'])) {
            //Campo ascending = 1 indica orden ascendente otro valor indica descendente
            $orderDir = $filtro['ascending'] == 1 ? 'ASC' : 'DESC';
            //Campo orderBy es la columna por la que se debe ordenar los resultados.
            $columnOrder = $filtro['orderBy'];
        }
        /* end: filters are created for query */

        /* start: sql query */
        $this->db->select('id, comuna, region_id, provincia , provincia_id,region');
        $this->db->from('comunas');
        $this->db->limit($length, $start);
        if (isset($columnOrder) && isset($orderDir)) {
            $this->db->order_by($columnOrder, $orderDir);
        }
        if (isset($columnOrder)) {
            $this->db->order_by($columnOrder, $orderDir);
        }
        $this->db->like('id', $filtro['query']);
        $this->db->or_like('comuna', $filtro['query']);
        $this->db->or_like('region', $filtro['query']);
        /* end: sql query */
        return $this->db->get()->result();
    }
    /* end: The number of records is limited to a certain number of communes */
}
?>