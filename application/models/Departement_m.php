<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Departement_m extends CI_Model
{

    public function get_all_dep()
    {
        $query = $this->db->get('departement');
        return $query->result();
    }
    public function get_order()
    {
        $this->db->join('logistik', 'logistik.mc = order.barang', 'left');
        $this->db->join('unit', 'unit.id_unit = order.kode_unit', 'left');

        $this->db->where('status_o', 'pending');

        $query = $this->db->get('order');
        return $query->result();
    }
    public function get_orderacc()
    {
        $this->db->join('logistik', 'logistik.mc = order.barang', 'left');
        $this->db->join('unit', 'unit.id_unit = order.kode_unit', 'left');

        $this->db->where('status_o', 'diterima');

        $query = $this->db->get('order');
        return $query->result();
    }
    public function get_order_ditolak()
    {
        $this->db->join('logistik', 'logistik.mc = order.barang', 'left');
        $this->db->join('unit', 'unit.id_unit = order.kode_unit', 'left');

        $this->db->where('status_o', 'ditolak');

        $query = $this->db->get('order');
        return $query->result();
    }
    public function get_order_l($id_p)
    {
        $this->db->join('logistik', 'logistik.mc = order.barang', 'left');
        $this->db->join('unit', 'unit.id_unit = order.kode_unit', 'left');

        $this->db->where('id_p', $id_p);

        $query = $this->db->get('order');
        return $query->result();
    }
    public function get_row_dep($id_dep)
    {
        $this->db->join('karyawan', 'karyawan.nik = gto_status.pengirim', 'left');

        $this->db->where('id_dep', $id_dep);
        $query = $this->db->get('departement');
        return $query->row();
    }
}

/* End of file Auth_m.php */
