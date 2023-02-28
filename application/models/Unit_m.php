<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit_m extends CI_Model
{

    public function get_all_unit()
    {
        $query = $this->db->get('unit');
        return $query->result();
    }
    public function get_all_unit_bd()
    {

        $this->db->where('status_unit', 'perbaikan');

        $query = $this->db->get('unit');
        return $query->result();
    }
    public function get_row_unit($id_unit)
    {
        $this->db->where('id_unit', $id_unit);
        $query = $this->db->get('unit');
        return $query->row();
    }
}

/* End of file Auth_m.php */
