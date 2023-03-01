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
        // $level_akun = $this->session->userdata('level');
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
        $this->load->view('template/header', $data);
        $this->load->view('home/home');
        $this->load->view('template/footer');
    }
    // karyawan
    public function data_karyawan()
    {
        $data['level'] = $this->session->userdata('level');
        $data['data'] = $this->karyawan_m->get_all_kar();
        $data['judul'] = 'Data Karyawan';
        $data['nama'] = $this->session->userdata('nama');
        $this->load->view('template/header', $data);
        $this->load->view('karyawan/data_karyawan');
        $this->load->view('template/footer');
    }


    // end karyawan

    // departement
    public function departement()
    {
        $data['level'] = $this->session->userdata('level');
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
        $data['judul'] = 'Create Departement';
        $data['nama'] = $this->session->userdata('nama');

        $this->load->view('template/header', $data);
        $this->load->view('departement/create_departement', $data);
        $this->load->view('template/footer');
    }
    public function create_log()
    {
        $data['level'] = $this->session->userdata('level');
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
        $data['judul'] = 'GTO';
        $data['nama'] = $this->session->userdata('nama');
        $data['data'] = $this->logistik_m->get_all_log();
        $data['keranjang'] = $this->cart->contents();
        $data['site'] = $this->site_m->get_all_site();
        $this->load->view('template/header', $data);
        $this->load->view('gto/data_gto', $data);
        $this->load->view('template/footer');
    }
    public function tf_gto()
    {
        $data['site'] = $this->site_m->get_all_site();
        $data['level'] = $this->session->userdata('level');
        $data['judul'] = 'GTO';
        $data['nama'] = $this->session->userdata('nama');
        $data['data'] = $this->logistik_m->get_all_log();
        $data['keranjang'] = $this->cart->contents();
        $data['site'] = $this->site_m->get_all_site();
        $this->load->view('template/header', $data);
        $this->load->view('gto/tf_gto', $data);
        $this->load->view('template/footer');
    }
    public function edit_departement($id_dep)
    {
        $data['level'] = $this->session->userdata('level');
        $data['judul'] = 'Update Departement';
        $data['nama'] = $this->session->userdata('nama');

        $data['data'] = $this->departement_m->get_row_dep($id_dep);
        $this->load->view('template/header', $data);
        $this->load->view('departement/edit_departement', $data);
        $this->load->view('template/footer');
    }
    public function proses_tambah_dep()
    {
        $data['level'] = $this->session->userdata('level');
        $data = array(
            'nama_dep' => $this->input->post('nama_dep')
        );
        $this->db->insert('departement', $data);
        return redirect('admin/departement');
    }
    public function proses_tambah_log()
    {
        $data['level'] = $this->session->userdata('level');
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
    public function proses_tambah_unit()
    {
        $data['level'] = $this->session->userdata('level');
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
        $this->db->where('id_dep', $id_dep);
        $this->db->delete('departement');
        return redirect('admin/departement');
    }
    // end departement

    // section
    public function section()
    {
        $data['level'] = $this->session->userdata('level');
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
        $data['judul'] = 'Create Section';
        $data['nama'] = $this->session->userdata('nama');

        $this->load->view('template/header', $data);
        $this->load->view('section/create_section', $data);
        $this->load->view('template/footer');
    }
    public function edit_section($id_sec)
    {
        $data['level'] = $this->session->userdata('level');
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
        $data = array(
            'nama_section' => $this->input->post('nama_section')
        );
        $this->db->insert('section', $data);
        return redirect('admin/section');
    }
    public function proses_edit_sec($id_sec)
    {
        $data['level'] = $this->session->userdata('level');
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

        $this->db->where('id_sec', $id_sec);
        $this->db->delete('section');
        return redirect('admin/section');
    }
    // end section

    // jabatan
    public function jabatan()
    {
        $data['level'] = $this->session->userdata('level');
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
        $data['judul'] = 'Create jabatan';
        $data['nama'] = $this->session->userdata('nama');

        $this->load->view('template/header', $data);
        $this->load->view('jabatan/create_jabatan', $data);
        $this->load->view('template/footer');
    }
    public function edit_jabatan($id_jab)
    {
        $data['level'] = $this->session->userdata('level');
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
        $data = array(
            'nama_jab' => $this->input->post('nama_jab')
        );
        $this->db->insert('jabatan', $data);
        return redirect('admin/jabatan');
    }
    public function proses_edit_jab($id_jab)
    {
        $data['level'] = $this->session->userdata('level');
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

        $this->db->where('id_jab', $id_jab);
        $this->db->delete('jabatan');
        return redirect('admin/jabatan');
    }
    //end jabatan

    // Log
    public function data_logistik()
    {
        $data['level'] = $this->session->userdata('level');
        $data['judul'] = 'Data Logistik';
        $data['nama'] = $this->session->userdata('nama');

        $data['data'] = $this->logistik_m->get_all_log();
        $this->load->view('template/header', $data);
        $this->load->view('logistik/data_log', $data);
        $this->load->view('template/footer');
    }
    // end log

    // karyawan



    public function add_karyawan()
    {
        $data['level'] = $this->session->userdata('level');
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
    public function view_karyawan($nik)
    {
        $data['level'] = $this->session->userdata('level');
        // dep,sec,jab

        $data['data'] = $this->karyawan_m->get_view_kar($nik);

        $data['judul'] = 'Add Karyawan';
        $data['nama'] = $this->session->userdata('nama');
        $this->load->view('template/header', $data);
        $this->load->view('karyawan/view_karyawan');
        $this->load->view('template/footer');
    }
    public function edit_karyawan()
    {
        $data['level'] = $this->session->userdata('level');
        $data['judul'] = 'Update Karyawan';
        $data['nama'] = $this->session->userdata('nama');
        $this->load->view('template/header', $data);
        $this->load->view('karyawan/input_karyawan');
        $this->load->view('template/footer');
    }
    public function proses_tambah_karyawan()
    {
        $data['level'] = $this->session->userdata('level');
        $data = array(
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama_lengkap'),
            'jk' => $this->input->post('jk'),
            'tempat' => $this->input->post('tempat'),
            'tanggal_lahir' => $this->input->post('ttl'),
            'alamat' => $this->input->post('alamat'),
            'agama' => $this->input->post('agama'),
            'email' => $this->input->post('email'),
            'telpon' => $this->input->post('telpon'),
            'section' => $this->input->post('section'),
            'jabatan' => $this->input->post('jabatan'),
            'departement' => $this->input->post('departement'),
            // 'foto' => $this->input->post('foto'),
            'level' => "user",
        );
        $this->db->insert('karyawan', $data);
        $this->session->set_flashdata('pesan', 'buat');
        return redirect('admin/data_karyawan');
    }
    public function proses_edit_karyawan()
    {
        $data['level'] = $this->session->userdata('level');
        $data = array(
            'nama_dep' => $this->input->post('nama_dep')
        );
        $this->db->where('id_dep', $id_dep);
        $this->db->update('departement', $data);
        $this->session->set_flashdata('pesan', 'ubah');
        return redirect('admin/karyawan');
    }


    // end karyawan

    public function update()
    {
        $data['level'] = $this->session->userdata('level');
        $data = array(
            "l_kar" => "1",
        );


        $this->db->update('karyawan', $data);
        echo "ok";
    }

    public function data_site()
    {
        $data['level'] = $this->session->userdata('level');
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
        $data['judul'] = 'Create site';
        $data['nama'] = $this->session->userdata('nama');

        $this->load->view('template/header', $data);
        $this->load->view('site/buat_site', $data);
        $this->load->view('template/footer');
    }
    public function edit_site($id_site)
    {
        $data['level'] = $this->session->userdata('level');
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
        $data = array(
            'nama_site' => $this->input->post('nama_site')
        );
        $this->db->insert('site', $data);
        return redirect('admin/data_site');
    }
    public function proses_edit_site($id_site)
    {
        $data['level'] = $this->session->userdata('level');
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
        $this->db->where('id_site', $id_site);
        $this->db->delete('site');
        return redirect('admin/data_site');
    }

    public function data_unit()
    {
        $data['level'] = $this->session->userdata('level');
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
        $this->db->where('id_unit', $id_unit);
        $this->db->delete('unit');
        return redirect('admin/data_unit');
    }
    public function unit_bd($id_unit)
    {
        $data['level'] = $this->session->userdata('level');
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
        $data = array(
            'status_unit' => "ready",
        );
        $this->db->where('id_unit', $id_unit);
        $this->db->update('unit', $data);
        return redirect('admin/status_unit');
    }
    public function rs()
    {
        $data['level'] = $this->session->userdata('level');
        $data['keranjang'] = $this->cart->contents();
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

    public function order_barang()
    {
        $data['level'] = $this->session->userdata('level');
        $data['judul'] = 'Data Logistik';
        $data['nama'] = $this->session->userdata('nama');

        $data['data'] = $this->logistik_m->get_all_log();
        $this->load->view('template/header', $data);
        $this->load->view('plant/order_barang', $data);
        $this->load->view('template/footer');
    }
}
