<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logistik_m extends CI_Model
{

    public function get_all_log()
    {
        $this->db->join('site', 'site.id_site = logistik.l_barang', 'left');


        $query = $this->db->get('logistik');
        return $query->result();
    }
    public function get_all_logs($site)
    {
        $this->db->join('site', 'site.id_site = logistik.l_barang', 'left');

        $this->db->where('l_barang', $site);

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
    public function gto_get($lokasi)
    {
        $this->db->join('site', 'site.id_site = gto_status.tujuan', 'left');
        $this->db->join('karyawan', 'karyawan.id_kar = gto_status.pengirim', 'left');
        $this->db->where('pengirim', $lokasi);
        $query = $this->db->get('gto_status');
        return $query->row();
    }
    public function gto_get2($kode)
    {
        $this->db->join('site', 'site.id_site = gto_status.tujuan', 'left');
        $this->db->join('karyawan', 'karyawan.nik = gto_status.pengirim', 'left');
        $this->db->where('kode_gto_status', $kode);
        $query = $this->db->get('gto_status');
        return $query->row();
    }
    public function gto_get_i($site)
    {
        $this->db->join('site', 'site.id_site = gto_status.tujuan', 'left');
        $this->db->join('karyawan', 'karyawan.nik = gto_status.pengirim', 'left');
        // $this->db->where('tujuan', $site);
        $this->db->where('status_gto', 'pending');
        $query = $this->db->get('gto_status');
        return $query->result();
    }
    public function gto_get_ii($site)
    {
        $this->db->join('site', 'site.id_site = gto_status.tujuan', 'left');
        $this->db->join('karyawan', 'karyawan.nik = gto_status.pengirim', 'left');
        // $this->db->where('tujuan', $site);
        $this->db->where('status_gto', 'selesai');
        $query = $this->db->get('gto_status');
        return $query->result();
    }
    public function gto_get_ii_tolak($site)
    {
        $this->db->join('site', 'site.id_site = gto_status.tujuan', 'left');
        $this->db->join('karyawan', 'karyawan.nik = gto_status.pengirim', 'left');
        // $this->db->where('tujuan', $site);
        $this->db->where('status_gto', 'ditolak');
        $query = $this->db->get('gto_status');
        return $query->result();
    }
    public function gto_get_i2($kode)
    {
        $this->db->join('logistik', 'logistik.mc = gto.barang', 'left');
        $this->db->join('gto_status', 'gto_status.kode_gto_status = gto.kode_gto', 'left');
        // $this->db->where('tujuan', $site);
        $this->db->where('kode_gto', $kode);
        $query = $this->db->get('gto');
        return $query->result();
    }
}

/* End of file logistik_m.php */
