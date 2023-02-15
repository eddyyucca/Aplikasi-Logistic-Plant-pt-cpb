<?php
defined('BASEPATH') or exit('No direct script access allowed');

class logistik_m extends CI_Model
{

    public function get_all_log()
    {
        $query = $this->db->get('logistik');
        return $query->result();
    }
}

/* End of file logistik_m.php */
