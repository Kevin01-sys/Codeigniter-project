<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CommunesModel extends CI_Model {
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
        /* exampe:
        SELECT *
        FROM comunas
        WHERE id LIKE "%Arica%"OR comuna LIKE "%Arica%" OR region LIKE "%Arica%"
        */
        return $this->db->get()->result();
    }

    /* start: The number of records is limited to a certain number of communes */
    public function select_communes_page($filtro){
        /* start: francisco's program logic: still unused */
        if (!empty($filtro['orderBy'])) {
            //Campo ascending = 1 indica orden ascendente otro valor indica descendente
            $orderDir = $filtro['ascending'] == 1 ? 'ASC' : 'DESC';
            //Campo orderBy es la columna por la que se debe ordenar los resultados.
            $columnOrder = $filtro['orderBy'];
            $orden = "$columnOrder $orderDir";
        }
        /* end: francisco's program logic: still unused */

        /* start: filters are created for query */
        /* $posicionPage = $filtro['page']-1;
        $pagination = $posicionPage*$filtro['limit']; */
        $length = $filtro['limit'];
        $start = ($filtro['page'] - 1) * $filtro['limit'];
        /* end: filters are created for query */

        /* start: sql query */
        $this->db->select('id, comuna, region');
        $this->db->from('comunas');
        //$this->db->limit(20, 0);
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
        /* $this->db->like('id', 'Anta');
        $this->db->or_like('comuna', 'Anta');
        $this->db->or_like('region', 'Anta'); */
        /* example:
        SELECT *
        FROM comunas
        WHERE id LIKE "%1%"OR comuna LIKE "%%" OR region LIKE "%%"
        ORDER BY id DESC
        LIMIT 0, 20
        */
        /* end: sql query */
        return $this->db->get()->result();
    }
    /* end: The number of records is limited to a certain number of communes */
}
?>