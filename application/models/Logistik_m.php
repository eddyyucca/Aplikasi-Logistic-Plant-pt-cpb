<?php
defined('BASEPATH') or exit('No direct script access allowed');

class logistik_m extends CI_Model
{

    public function get_all_log()
    {
        $this->db->join('site', 'site.id_site = logistik.l_barang', 'left');
        $query = $this->db->get('logistik');
        return $query->result();
    }
    public function get_all_log2($l)
    {
        $this->db->join('site', 'site.id_site = logistik.l_barang', 'left');

        $this->db->where('l_barang', $l);

        $query = $this->db->get('logistik');
        return $query->result();
    }
    public function get_row_log($id_log)
    {
        $this->db->join('site', 'site.id_site = logistik.l_barang', 'left');

        $this->db->where('id_log', $id_log);
        $query = $this->db->get('logistik');
        return $query->row();
    }
}

/* End of file logistik_m.php */
