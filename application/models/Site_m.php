<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Site_m extends CI_Model
{

    public function get_all_site()
    {
        $query = $this->db->get('site');
        return $query->result();
    }
    public function get_all_unit()
    {
        $query = $this->db->get('unit');
        return $query->result();
    }
    public function get_all_unit_r()
    {

        $this->db->where('status_unit', "perbaikan");

        $query = $this->db->get('unit');
        return $query->result();
    }
    public function get_row_site($id_site)
    {
        $this->db->where('id_site', $id_site);
        $query = $this->db->get('site');
        return $query->row();
    }
}

/* End of file Auth_m.php */
