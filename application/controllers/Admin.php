<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('departement_m');
        $this->load->model('jabatan_m');
        $this->load->model('section_m');
        $this->load->model('logistik_m');
        $this->load->model('karyawan_m');
        $this->load->model('site_m');
        $this->load->model('unit_m');
        $this->load->library('cart');
        $level_akun = $this->session->userdata('level');
        // if ($level_akun != "admin") {
        //     $this->session->set_flashdata('login', 'n_login');
        //     return redirect('login');
        // }
    }


    public function index()
    {
        $data['judul'] = 'PT. CPB';
        $data['nama'] = $this->session->userdata('nama');
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');
        // var_dump($this->session->userdata('level'));
        $this->load->view('template/header', $data);
        $this->load->view('home/home', $data);
        $this->load->view('template/footer');
    }
    // karyawan
    public function data_karyawan()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data['data'] = $this->karyawan_m->get_all_kar();
        $data['judul'] = 'Data Karyawan';
        $data['nama'] = $this->session->userdata('nama');
        $this->load->view('template/header', $data);
        $this->load->view('karyawan/data_karyawan', $data);
        $this->load->view('template/footer');
    }
    public function create_karyawan()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');


        $data['site'] = $this->site_m->get_all_site();
        $data['departement'] = $this->departement_m->get_all_dep();
        $data['section'] = $this->section_m->get_all_sec();
        $data['jabatan'] = $this->jabatan_m->get_all_jab();
        $data['judul'] = 'Data Karyawan';
        $data['nama'] = $this->session->userdata('nama');
        $this->load->view('template/header', $data);
        $this->load->view('karyawan/create_karyawan', $data);
        $this->load->view('template/footer');
    }


    // end karyawan

    // departement
    public function departement()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data['judul'] = 'Data Departement';
        $data['nama'] = $this->session->userdata('nama');

        $data['data'] = $this->departement_m->get_all_dep();
        $this->load->view('template/header', $data);
        $this->load->view('departement/data_departement', $data);
        $this->load->view('template/footer');
    }
    public function create_departement()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data['judul'] = 'Create Departement';
        $data['nama'] = $this->session->userdata('nama');

        $this->load->view('template/header', $data);
        $this->load->view('departement/create_departement', $data);
        $this->load->view('template/footer');
    }
    public function create_log()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data['judul'] = 'Create Departement';
        $data['nama'] = $this->session->userdata('nama');
        $data['site'] = $this->site_m->get_all_site();
        $this->load->view('template/header', $data);
        $this->load->view('logistik/create_log', $data);
        $this->load->view('template/footer');
    }
    public function edit_log($id_log)
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data['judul'] = 'Create Logistik';
        $data['nama'] = $this->session->userdata('nama');
        $data['data'] = $this->logistik_m->get_row_log($id_log);

        $data['site'] = $this->site_m->get_all_site();
        $this->load->view('template/header', $data);
        $this->load->view('logistik/edit_log', $data);
        $this->load->view('template/footer');
    }
    public function order($id_log)
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data['judul'] = 'Create Logistik';
        $data['nama'] = $this->session->userdata('nama');
        $data['data'] = $this->logistik_m->get_row_log($id_log);
        $data['unit'] = $this->site_m->get_all_unit_r();
        $this->load->view('template/header', $data);
        $this->load->view('plant/create_gto', $data);
        $this->load->view('template/footer');
    }
    public function order2($id_log)
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data['judul'] = 'Create Logistik';
        $data['nama'] = $this->session->userdata('nama');
        $data['data'] = $this->logistik_m->get_row_log($id_log);

        $data['site'] = $this->site_m->get_all_site();
        $this->load->view('template/header', $data);
        $this->load->view('gto/create_gto', $data);
        $this->load->view('template/footer');
    }
    public function gto()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data['judul'] = 'GTO';
        $data['nama'] = $this->session->userdata('nama');
        $data['data'] = $this->logistik_m->get_all_log();
        $data['keranjang'] = $this->cart->contents();
        $data['site'] = $this->site_m->get_all_site();
        $this->load->view('template/header', $data);
        $this->load->view('gto/data_gto', $data);
        $this->load->view('template/footer');
    }
    public function orderan()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data['judul'] = 'GTO';
        $data['nama'] = $this->session->userdata('nama');
        $data['data'] = $this->logistik_m->get_all_log();
        $data['keranjang'] = $this->cart->contents();
        $data['site'] = $this->site_m->get_all_site();
        $this->load->view('template/header', $data);
        $this->load->view('plant/data_gto', $data);
        $this->load->view('template/footer');
    }
    public function gti()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data['judul'] = 'GTI';
        $data['nama'] = $this->session->userdata('nama');
        $data['data'] = $this->logistik_m->get_all_log();
        $data['keranjang'] = $this->cart->contents();
        $data['site'] = $this->site_m->get_all_site();
        $this->load->view('template/header', $data);
        $this->load->view('gto/data_gti', $data);
        $this->load->view('template/footer');
    }
    public function tf_gto()
    {
        $data['site'] = $this->site_m->get_all_site();
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data['judul'] = 'GTO';
        $data['nama'] = $this->session->userdata('nama');
        $data['data'] = $this->logistik_m->get_all_log();
        $data['keranjang'] = $this->cart->contents();
        $data['site'] = $this->site_m->get_all_site();
        $this->load->view('template/header', $data);
        $this->load->view('gto/tf_gto', $data);
        $this->load->view('template/footer');
    }
    public function tf_unit()
    {
        $data['site'] = $this->site_m->get_all_site();
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data['judul'] = 'Unit';
        $data['nama'] = $this->session->userdata('nama');
        $data['data'] = $this->logistik_m->get_all_log();
        $data['keranjang'] = $this->cart->contents();
        $data['unit'] = $this->site_m->get_all_unit();
        $this->load->view('template/header', $data);
        $this->load->view('plant/tf_gto', $data);
        $this->load->view('template/footer');
    }
    public function edit_departement($id_dep)
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data['judul'] = 'Update Departement';
        $data['nama'] = $this->session->userdata('nama');

        $data['data'] = $this->departement_m->get_row_dep($id_dep);
        $this->load->view('template/header', $data);
        $this->load->view('departement/edit_departement', $data);
        $this->load->view('template/footer');
    }
    public function laporan_plant()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data['judul'] = 'Laporan Plant';
        $data['nama'] = $this->session->userdata('nama');

        $data['data'] = $this->departement_m->get_order();
        $this->load->view('template/header', $data);
        $this->load->view('plant/laporan', $data);
        $this->load->view('template/footer');
    }
    public function order_plant()
    {
        $data['level'] = $this->session->userdata('level');
        // $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data['judul'] = 'Update Departement';
        $data['nama'] = $this->session->userdata('nama');

        $data['data'] = $this->departement_m->get_order();
        $this->load->view('template/header', $data);
        $this->load->view('logistik/order_plant', $data);
        $this->load->view('template/footer');
    }
    public function laporan_pp()
    {
        $data['level'] = $this->session->userdata('level');
        // $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data['judul'] = 'Laporan Permintaan Plant';
        $data['nama'] = $this->session->userdata('nama');

        $data['data'] = $this->departement_m->get_order();
        $this->load->view('template/header', $data);
        $this->load->view('logistik/lp', $data);
        $this->load->view('template/footer');
    }
    public function proses_tambah_dep()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data = array(
            'nama_dep' => $this->input->post('nama_dep')
        );
        $this->db->insert('departement', $data);
        return redirect('admin/departement');
    }
    public function proses_tambah_log()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data = array(
            'mc' => $this->input->post('mc'),
            'spc' => $this->input->post('spc'),
            'binloc' => $this->input->post('binloc'),
            'l_barang' => $this->input->post('l_barang'),
            'qty' => $this->input->post('qty'),
        );
        $this->db->insert('logistik', $data);
        return redirect('admin/data_logistik');
    }
    public function proses_tambah_order_gto()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data = array(
            'barang' => $this->input->post('mc'),
            'jumlah' => $this->input->post('qty'),
            // 'kode_unit' => $this->input->post('kode_unit'),
            'status_o' => "pending",
        );
        $this->db->insert('order', $data);
        return redirect('admin/order_barang2');
    }
    public function proses_tambah_order()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data = array(
            'barang' => $this->input->post('mc'),
            'jumlah' => $this->input->post('qty'),
            'kode_unit' => $this->input->post('kode_unit'),
            'status_o' => "pending",
        );
        $this->db->insert('order', $data);
        return redirect('admin/order_barang2');
    }
    public function proses_tambah_unit()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data = array(
            'kode_unit' => $this->input->post('kode_unit'),
            'tipe' => $this->input->post('tipe'),
            'status_unit' => "ready",
            'l_unit' => $this->input->post('l_unit'),

        );
        $this->db->insert('unit', $data);
        return redirect('admin/data_unit');
    }
    public function proses_edit_unit($id_unit)
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data = array(
            'kode_unit' => $this->input->post('kode_unit'),
            'tipe' => $this->input->post('tipe'),
            'l_unit' => $this->input->post('l_unit'),

        );

        $this->db->where('id_unit', $id_unit);

        $this->db->update('unit', $data);
        return redirect('admin/data_unit');
    }
    public function proses_unit_rusak($id_unit)
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data = array(
            'status_unit' => "rusak",


        );

        $this->db->where('id_unit', $id_unit);
        $this->db->update('unit', $data);
        return redirect('admin/status_unit');
    }
    public function proses_edit_log($id_log)
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data = array(
            'mc' => $this->input->post('mc'),
            'spc' => $this->input->post('spc'),
            'binloc' => $this->input->post('binloc'),
            'l_barang' => $this->input->post('l_barang'),
            'qty' => $this->input->post('qty'),
        );

        $this->db->where('id_log', $id_log);
        $this->db->update('logistik', $data);
        return redirect('admin/data_logistik');
    }
    public function proses_edit_dep($id_dep)
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data = array(
            'nama_dep' => $this->input->post('nama_dep')
        );
        $this->db->where('id_dep', $id_dep);
        $this->db->update('departement', $data);
        return redirect('admin/departement');
    }
    public function delete_departement($id_dep)
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $this->db->where('id_dep', $id_dep);
        $this->db->delete('departement');
        return redirect('admin/departement');
    }
    // end departement

    // section
    public function section()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data['judul'] = 'Data Section';
        $data['nama'] = $this->session->userdata('nama');

        $data['data'] = $this->section_m->get_all_sec();
        $this->load->view('template/header', $data);
        $this->load->view('section/data_section', $data);
        $this->load->view('template/footer');
    }
    public function create_section()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data['judul'] = 'Create Section';
        $data['nama'] = $this->session->userdata('nama');

        $this->load->view('template/header', $data);
        $this->load->view('section/create_section', $data);
        $this->load->view('template/footer');
    }
    public function edit_section($id_sec)
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data['judul'] = 'Update Section';
        $data['nama'] = $this->session->userdata('nama');

        $data['data'] = $this->section_m->get_row_sec($id_sec);
        $this->load->view('template/header', $data);
        $this->load->view('section/edit_section', $data);
        $this->load->view('template/footer');
    }
    public function proses_tambah_section()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data = array(
            'nama_section' => $this->input->post('nama_section')
        );
        $this->db->insert('section', $data);
        return redirect('admin/section');
    }
    public function proses_edit_sec($id_sec)
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data = array(
            'nama_section' => $this->input->post('nama_section')
        );
        $this->db->where('id_sec', $id_sec);
        $this->db->update('section', $data);
        return redirect('admin/section');
    }
    public function delete_section($id_sec)
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');


        $this->db->where('id_sec', $id_sec);
        $this->db->delete('section');
        return redirect('admin/section');
    }
    // end section

    // jabatan
    public function jabatan()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data['judul'] = 'Data jabatan';
        $data['nama'] = $this->session->userdata('nama');

        $data['data'] = $this->jabatan_m->get_all_jab();
        $this->load->view('template/header', $data);
        $this->load->view('jabatan/data_jabatan', $data);
        $this->load->view('template/footer');
    }
    public function create_jabatan()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data['judul'] = 'Create jabatan';
        $data['nama'] = $this->session->userdata('nama');

        $this->load->view('template/header', $data);
        $this->load->view('jabatan/create_jabatan', $data);
        $this->load->view('template/footer');
    }
    public function edit_jabatan($id_jab)
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data['judul'] = 'Update jabatan';
        $data['nama'] = $this->session->userdata('nama');

        $data['data'] = $this->jabatan_m->get_row_jab($id_jab);
        $this->load->view('template/header', $data);
        $this->load->view('jabatan/edit_jabatan', $data);
        $this->load->view('template/footer');
    }
    public function proses_tambah_jab()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data = array(
            'nama_jab' => $this->input->post('nama_jab')
        );
        $this->db->insert('jabatan', $data);
        return redirect('admin/jabatan');
    }
    public function proses_edit_jab($id_jab)
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data = array(
            'nama_jab' => $this->input->post('nama_jab')
        );
        $this->db->where('id_jab', $id_jab);
        $this->db->update('jabatan', $data);
        return redirect('admin/jabatan');
    }
    public function delete_jab($id_jab)
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');


        $this->db->where('id_jab', $id_jab);
        $this->db->delete('jabatan');
        return redirect('admin/jabatan');
    }
    //end jabatan

    // Log
    public function data_logistik()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');
        $l = $this->session->userdata('l_kar');
        $data['judul'] = 'Data Logistik';
        $data['nama'] = $this->session->userdata('nama');

        $data['data'] = $this->logistik_m->get_all_log2($l);
        $this->load->view('template/header', $data);
        $this->load->view('logistik/data_log', $data);
        $this->load->view('template/footer');
    }
    // end log

    // karyawan



    public function add_karyawan()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        // dep,sec,jab
        $data['dep'] = $this->departement_m->get_all_dep();
        $data['sec'] = $this->section_m->get_all_sec();
        $data['jab'] = $this->jabatan_m->get_all_jab();

        $data['judul'] = 'Add Karyawan';
        $data['nama'] = $this->session->userdata('nama');
        $this->load->view('template/header', $data);
        $this->load->view('karyawan/input_karyawan');
        $this->load->view('template/footer');
    }

    public function edit_karyawan($nik)
    {
        $data['data'] = $this->karyawan_m->get_row_nik($nik);
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        // dep,sec,jab
        $data['site'] = $this->site_m->get_all_site();
        $data['departement'] = $this->departement_m->get_all_dep();
        $data['section'] = $this->section_m->get_all_sec();
        $data['jabatan'] = $this->jabatan_m->get_all_jab();
        $data['judul'] = 'Update Karyawan';
        $data['nama'] = $this->session->userdata('nama');
        $this->load->view('template/header', $data);
        $this->load->view('karyawan/edit_karyawan', $data);
        $this->load->view('template/footer');
    }
    public function proses_tambah_karyawan()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data = array(
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'section' => $this->input->post('section'),
            'jabatan' => $this->input->post('jabatan'),
            'departement' => $this->input->post('departement'),
            'l_kar' => $this->input->post('l_kar'),
            'password' => md5($this->input->post('password')),
            'level' => "user",
        );
        $this->db->insert('karyawan', $data);
        $this->session->set_flashdata('pesan', 'buat');
        return redirect('admin/data_karyawan');
    }
    public function proses_edit_karyawan($nik)
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data = array(
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'section' => $this->input->post('section'),
            'jabatan' => $this->input->post('jabatan'),
            'departement' => $this->input->post('departement'),
            'l_kar' => $this->input->post('l_kar'),
            'password' => md5($this->input->post('password')),
            'level' => "user",
        );

        $this->db->where('nik', $nik);
        $this->db->update('karyawan', $data);
        $this->session->set_flashdata('pesan', 'buat');
        return redirect('admin/data_karyawan');
    }
    public function delete_karyawan($nik)
    {
        $this->db->where('nik', $nik);
        $this->db->delete('karyawan');
        return redirect('admin/data_karyawan');
    }
    public function delete_log($id_log)
    {
        $this->db->where('id_log', $id_log);
        $this->db->delete('logistik');
        return redirect('admin/data_logistik');
    }


    // end karyawan

    public function update()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data = array(
            "level" => "logistik",
        );


        $this->db->where('nik', '10034026');
        $this->db->update('karyawan', $data);
        echo "ok";
    }

    public function data_site()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data['judul'] = 'Data site';
        $data['nama'] = $this->session->userdata('nama');

        $data['data'] = $this->site_m->get_all_site();
        $this->load->view('template/header', $data);
        $this->load->view('site/data_site', $data);
        $this->load->view('template/footer');
    }
    public function create_site()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data['judul'] = 'Create site';
        $data['nama'] = $this->session->userdata('nama');

        $this->load->view('template/header', $data);
        $this->load->view('site/buat_site', $data);
        $this->load->view('template/footer');
    }
    public function edit_site($id_site)
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data['judul'] = 'Update site';
        $data['nama'] = $this->session->userdata('nama');

        $data['data'] = $this->site_m->get_row_site($id_site);
        $this->load->view('template/header', $data);
        $this->load->view('site/edit_site', $data);
        $this->load->view('template/footer');
    }

    public function proses_tambah_site()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data = array(
            'nama_site' => $this->input->post('nama_site')
        );
        $this->db->insert('site', $data);
        return redirect('admin/data_site');
    }
    public function proses_edit_site($id_site)
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data = array(
            'nama_site' => $this->input->post('nama_site')
        );
        $this->db->where('id_site', $id_site);
        $this->db->update('site', $data);
        return redirect('admin/data_site');
    }
    public function delete_site($id_site)
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $this->db->where('id_site', $id_site);
        $this->db->delete('site');
        return redirect('admin/data_site');
    }

    public function data_unit()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data['judul'] = 'Data unit';
        $data['nama'] = $this->session->userdata('nama');

        $data['data'] = $this->unit_m->get_all_unit();
        $this->load->view('template/header', $data);
        $this->load->view('unit/data_unit', $data);
        $this->load->view('template/footer');
    }
    public function status_unit()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data['judul'] = 'Data unit';
        $data['nama'] = $this->session->userdata('nama');

        $data['data'] = $this->unit_m->get_all_unit();
        $this->load->view('template/header', $data);
        $this->load->view('unit/status_unit', $data);
        $this->load->view('template/footer');
    }
    public function order_unit()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data['judul'] = 'Data unit';
        $data['nama'] = $this->session->userdata('nama');

        $data['data'] = $this->unit_m->get_all_unit_bd();
        $this->load->view('template/header', $data);
        $this->load->view('plant/unit', $data);
        $this->load->view('template/footer');
    }
    public function create_unit()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data['judul'] = 'Create unit';
        $data['nama'] = $this->session->userdata('nama');

        $data['site'] = $this->site_m->get_all_site();
        $this->load->view('template/header', $data);
        $this->load->view('unit/buat_unit', $data);
        $this->load->view('template/footer');
    }
    public function edit_unit($id_unit)
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data['judul'] = 'Update unit';
        $data['nama'] = $this->session->userdata('nama');
        $data['site'] = $this->site_m->get_all_site();
        $data['data'] = $this->unit_m->get_row_unit($id_unit);
        $this->load->view('template/header', $data);
        $this->load->view('unit/edit_unit', $data);
        $this->load->view('template/footer');
    }



    public function delete_unit($id_unit)
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $this->db->where('id_unit', $id_unit);
        $this->db->delete('unit');
        return redirect('admin/data_unit');
    }
    public function unit_bd($id_unit)
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data = array(
            'status_unit' => "perbaikan",
        );
        $this->db->where('id_unit', $id_unit);
        $this->db->update('unit', $data);
        return redirect('admin/status_unit');
    }
    public function unit_ready($id_unit)
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data = array(
            'status_unit' => "ready",
        );
        $this->db->where('id_unit', $id_unit);
        $this->db->update('unit', $data);
        return redirect('admin/status_unit');
    }
    public function barang_dikirim($id_p, $jumlah, $qty, $id_log)
    {

        $data = array(
            'status_o' => "diterima",
        );
        $this->db->where('id_p', $id_p);
        $this->db->update('order', $data);
        $hasil = $qty - $jumlah;
        $data2 = array(
            'qty' => $hasil,
        );
        $this->db->where('id_log', $id_log);
        $this->db->update('logistik', $data2);
        return redirect('admin/order_plant');
    }
    public function barang_ditolak($id_p)
    {

        $data = array(
            'status_o' => "ditolak",
        );
        $this->db->where('id_p', $id_p);
        $this->db->update('order', $data);

        return redirect('admin/order_plant');
    }

    public function cart_gto()
    {

        $data = array(
            'id' => $this->input->post('id_barang'),
            'price' => '',
            'item' => $this->input->post('spc'),
            'name' => $this->input->post('mc'),
            'id_barang' => $this->input->post('id_barang'),
            'qty' => $this->input->post('qty'),
            'tanggal' => date('Y-m-d'),
        );
        $this->cart->insert($data);
        // print_r($this->cart->contents());
        // var_dump($x);
        redirect('admin/gto');
    }
    public function cart_order()
    {
        $site =  $this->input->post('id_site');
        $keranjang = $this->cart->contents();
        $kode_gto = date('ymdhsi');
        foreach ($keranjang as $x) {

            $data = array(
                'barang' => $x['name'],
                'jumlah' => $x['qty'],
                'kode_gto' => $kode_gto,

            );
            $this->db->insert('gto', $data);
        }
        $data2 = array(
            'status_gto' => "pending",
            'kode_o' => $kode_gto,
            'unit' => $site,
            'pengirim' =>  $this->session->userdata('nik'),
            'tanggal_o' =>  date('Y-m-d'),
        );
        $this->db->insert('gto_status', $data2);
        $this->cart->destroy();
        redirect('admin/order_barang2');
    }
    public function cart_gto_tf()
    {
        $tujuan =  $this->input->post('tujuan');
        $keranjang = $this->cart->contents();
        $kode_gto = date('ymdhsi');
        foreach ($keranjang as $x) {

            $data = array(
                'barang' => $x['name'],
                'jumlah' => $x['qty'],
                'kode_gto' => $kode_gto,

            );
            $this->db->insert('gto', $data);
        }
        $data2 = array(
            'status_gto' => "pending",
            'kode_gto_status' => $kode_gto,
            'tujuan' => $tujuan,
            'pengirim' =>  $this->session->userdata('nik'),
            'waktu_tf' =>  date('Y-m-d'),
        );
        $this->db->insert('gto_status', $data2);
        $this->cart->destroy();
        redirect('admin/laporan_gto');
    }




    public function order_barang()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data['judul'] = 'Data Logistik';
        $data['nama'] = $this->session->userdata('nama');

        $data['data'] = $this->logistik_m->get_all_log();
        $this->load->view('template/header', $data);
        $this->load->view('plant/order_barang', $data);
        $this->load->view('template/footer');
    }
    public function order_barang2()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');

        $data['judul'] = 'Data Logistik';
        $data['nama'] = $this->session->userdata('nama');

        $data['data'] = $this->logistik_m->get_all_log();
        $this->load->view('template/header', $data);
        $this->load->view('plant/order_barang', $data);
        $this->load->view('template/footer');
    }
    public function laporan_gto()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');
        $site = $this->session->userdata('l_kar');

        $data['judul'] = 'Data GTO';
        $data['nama'] = $this->session->userdata('nama');
        // $lokasi = $this->session->userdata('nik');
        $data['data'] = $this->logistik_m->gto_get_i($site);
        $this->load->view('template/header', $data);
        $this->load->view('gto/laporan_gto', $data);
        $this->load->view('template/footer');
    }
    public function laporan_gto_selesai()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');
        $site = $this->session->userdata('l_kar');

        $data['judul'] = 'Data GTO';
        $data['nama'] = $this->session->userdata('nama');
        // $lokasi = $this->session->userdata('nik');
        $data['data'] = $this->logistik_m->gto_get_ii($site);
        $this->load->view('template/header', $data);
        $this->load->view('gto/laporan_gto_s', $data);
        $this->load->view('template/footer');
    }
    public function laporan_gti()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');
        $site = $this->session->userdata('l_kar');

        $data['judul'] = 'Data GTO';
        $data['nama'] = $this->session->userdata('nama');
        $lokasi = $this->session->userdata('nik');
        $data['data'] = $this->logistik_m->gto_get_ii($site);
        $this->load->view('template/header', $data);
        $this->load->view('gto/laporan_gto', $data);
        $this->load->view('template/footer');
    }
    public function ctlaporan_gto($kode)
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');
        $site = $this->session->userdata('l_kar');

        $data['judul'] = 'Data GTO';
        $data['nama'] = $this->session->userdata('nama');
        $lokasi = $this->session->userdata('nik');
        $data['data'] = $this->logistik_m->gto_get_i2($kode);
        $data['data2'] = $this->logistik_m->gto_get2($kode);
        // $this->load->view('template/header', $data);
        $this->load->view('gto/ct', $data);
        // $this->load->view('template/footer');
    }
    public function ctlaporan_gto_s($kode)
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');
        $site = $this->session->userdata('l_kar');

        $data['judul'] = 'Data GTO';
        $data['nama'] = $this->session->userdata('nama');
        $lokasi = $this->session->userdata('nik');
        $data['data'] = $this->logistik_m->gto_get_i2($kode);
        $data['data2'] = $this->logistik_m->gto_get2($kode);
        // $this->load->view('template/header', $data);
        $this->load->view('gto/ct_selesai', $data);
        // $this->load->view('template/footer');
    }
    public function barang_masuk()
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');
        $site = $this->session->userdata('l_kar');

        $data['judul'] = 'Data GTO';
        $data['nama'] = $this->session->userdata('nama');
        $lokasi = $this->session->userdata('nik');
        $data['data'] = $this->logistik_m->gto_get_i($site);
        $this->load->view('template/header', $data);
        $this->load->view('gto/barang_masuk', $data);
        $this->load->view('template/footer');
    }
    public function view_barang_masuk($kode)
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');
        $site = $this->session->userdata('l_kar');
        $data['kd'] = $kode;
        $data['judul'] = 'Data GTO';
        $data['nama'] = $this->session->userdata('nama');
        $lokasi = $this->session->userdata('nik');
        $data['data'] = $this->logistik_m->gto_get_i2($kode);
        $this->load->view('template/header', $data);
        $this->load->view('gto/view_barang_masuk', $data);
        $this->load->view('template/footer');
    }

    public function terima($kd)
    {
        $x = $this->logistik_m->gto_get_i2($kd);

        foreach ($x as $k) {
            $qty = $k->qty;
            $m = $k->jumlah;
            $hasil = $qty - $m;
            $data = array(
                "qty" => $hasil,
            );
            $aa = $k->id_log;
            // $a = $k->tujuan;

            var_dump($data);
            $this->db->where('id_log', $aa);
            // $this->db->where('l_barang', $a);

            $this->db->update('logistik', $data);
            $data2 = array(
                "status_gto" => "selesai",
            );
            $this->db->where('kode_gto_status', $k->kode_gto);
            // $this->db->where('l_barang', $a);

            $this->db->update('gto_status', $data2);
            redirect('admin/laporan_gto');
        }
    }
    public function permintaan_mekanik($kode)
    {
        $data['level'] = $this->session->userdata('level');
        $data['lokasi_k'] = $this->session->userdata('l_kar');
        $site = $this->session->userdata('l_kar');

        $data['judul'] = 'Data GTO';
        $data['nama'] = $this->session->userdata('nama');
        $lokasi = $this->session->userdata('nik');
        $data['data'] = $this->logistik_m->gto_get_i2($kode);
        $this->load->view('template/header', $data);
        $this->load->view('gto/view_barang_masuk', $data);
        $this->load->view('template/footer');
    }
}
