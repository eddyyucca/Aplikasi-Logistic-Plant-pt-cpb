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
        $this->load->view('template/header', $data);
        $this->load->view('home/home');
        $this->load->view('template/footer');
    }
    // karyawan
    public function data_karyawan()
    {
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
        $data['judul'] = 'Data Departement';
        $data['nama'] = $this->session->userdata('nama');

        $data['data'] = $this->departement_m->get_all_dep();
        $this->load->view('template/header', $data);
        $this->load->view('departement/data_departement', $data);
        $this->load->view('template/footer');
    }
    public function create_departement()
    {
        $data['judul'] = 'Create Departement';
        $data['nama'] = $this->session->userdata('nama');

        $this->load->view('template/header', $data);
        $this->load->view('departement/create_departement', $data);
        $this->load->view('template/footer');
    }
    public function edit_departement($id_dep)
    {
        $data['judul'] = 'Update Departement';
        $data['nama'] = $this->session->userdata('nama');

        $data['data'] = $this->departement_m->get_row_dep($id_dep);
        $this->load->view('template/header', $data);
        $this->load->view('departement/edit_departement', $data);
        $this->load->view('template/footer');
    }
    public function proses_tambah_dep()
    {
        $data = array(
            'nama_dep' => $this->input->post('nama_dep')
        );
        $this->db->insert('departement', $data);
        return redirect('admin/departement');
    }
    public function proses_edit_dep($id_dep)
    {
        $data = array(
            'nama_dep' => $this->input->post('nama_dep')
        );
        $this->db->where('id_dep', $id_dep);
        $this->db->update('departement', $data);
        return redirect('admin/departement');
    }
    public function delete_departement($id_dep)
    {
        $this->db->where('id_dep', $id_dep);
        $this->db->delete('departement');
        return redirect('admin/departement');
    }
    // end departement

    // section
    public function section()
    {
        $data['judul'] = 'Data Section';
        $data['nama'] = $this->session->userdata('nama');

        $data['data'] = $this->section_m->get_all_sec();
        $this->load->view('template/header', $data);
        $this->load->view('section/data_section', $data);
        $this->load->view('template/footer');
    }
    public function create_section()
    {
        $data['judul'] = 'Create Section';
        $data['nama'] = $this->session->userdata('nama');

        $this->load->view('template/header', $data);
        $this->load->view('section/create_section', $data);
        $this->load->view('template/footer');
    }
    public function edit_section($id_sec)
    {
        $data['judul'] = 'Update Section';
        $data['nama'] = $this->session->userdata('nama');

        $data['data'] = $this->section_m->get_row_sec($id_sec);
        $this->load->view('template/header', $data);
        $this->load->view('section/edit_section', $data);
        $this->load->view('template/footer');
    }
    public function proses_tambah_section()
    {
        $data = array(
            'nama_section' => $this->input->post('nama_section')
        );
        $this->db->insert('section', $data);
        return redirect('admin/section');
    }
    public function proses_edit_sec($id_sec)
    {
        $data = array(
            'nama_section' => $this->input->post('nama_section')
        );
        $this->db->where('id_sec', $id_sec);
        $this->db->update('section', $data);
        return redirect('admin/section');
    }
    public function delete_section($id_sec)
    {

        $this->db->where('id_sec', $id_sec);
        $this->db->delete('section');
        return redirect('admin/section');
    }
    // end section

    // jabatan
    public function jabatan()
    {
        $data['judul'] = 'Data jabatan';
        $data['nama'] = $this->session->userdata('nama');

        $data['data'] = $this->jabatan_m->get_all_jab();
        $this->load->view('template/header', $data);
        $this->load->view('jabatan/data_jabatan', $data);
        $this->load->view('template/footer');
    }
    public function create_jabatan()
    {
        $data['judul'] = 'Create jabatan';
        $data['nama'] = $this->session->userdata('nama');

        $this->load->view('template/header', $data);
        $this->load->view('jabatan/create_jabatan', $data);
        $this->load->view('template/footer');
    }
    public function edit_jabatan($id_jab)
    {
        $data['judul'] = 'Update jabatan';
        $data['nama'] = $this->session->userdata('nama');

        $data['data'] = $this->jabatan_m->get_row_jab($id_jab);
        $this->load->view('template/header', $data);
        $this->load->view('jabatan/edit_jabatan', $data);
        $this->load->view('template/footer');
    }
    public function proses_tambah_jab()
    {
        $data = array(
            'nama_jab' => $this->input->post('nama_jab')
        );
        $this->db->insert('jabatan', $data);
        return redirect('admin/jabatan');
    }
    public function proses_edit_jab($id_jab)
    {
        $data = array(
            'nama_jab' => $this->input->post('nama_jab')
        );
        $this->db->where('id_jab', $id_jab);
        $this->db->update('jabatan', $data);
        return redirect('admin/jabatan');
    }
    public function delete_jab($id_jab)
    {

        $this->db->where('id_jab', $id_jab);
        $this->db->delete('jabatan');
        return redirect('admin/jabatan');
    }
    //end jabatan

    // Log
    public function data_logistik()
    {
        $data['judul'] = 'Data Logistik';
        $data['nama'] = $this->session->userdata('nama');

        $data['data'] = $this->logistik_m->get_all_log();
        $this->load->view('template/header', $data);
        $this->load->view('logistik/data_log', $data);
        $this->load->view('template/footer');
    }
    // end log

    // karyawan


    public function search_data_karyawan()
    {
        $perpage = 8;
        $offset = $this->uri->segment(1);

        $cari = $this->input->post('cari');

        $data['data'] = $this->karyawan_m->cari_data($perpage, $offset, $cari)->result();

        $config['base_url'] = site_url('admin/search_data_karyawan');
        $config['total_rows'] = $this->karyawan_m->getRow($cari)->num_rows();
        $config['per_page'] = $perpage;
        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);

        //end

        $data['judul'] = 'Data Karyawan';
        $data['nama'] = $this->session->userdata('nama');

        $this->load->view('template/header', $data);
        $this->load->view('karyawan/data_karyawan');
        $this->load->view('template/footer');
    }
    public function add_karyawan()
    {
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
        $data['judul'] = 'Update Karyawan';
        $data['nama'] = $this->session->userdata('nama');
        $this->load->view('template/header', $data);
        $this->load->view('karyawan/input_karyawan');
        $this->load->view('template/footer');
    }
    public function proses_tambah_karyawan()
    {
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
        $data = array(
            'nama_dep' => $this->input->post('nama_dep')
        );
        $this->db->where('id_dep', $id_dep);
        $this->db->update('departement', $data);
        $this->session->set_flashdata('pesan', 'ubah');
        return redirect('admin/karyawan');
    }
    public function import()
    {

        $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        if (isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {
            $arr_file = explode('.', $_FILES['file']['name']);
            $extension = end($arr_file);
            if ('csv' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } elseif ('xls' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
            $sheetData = $spreadsheet->getActiveSheet()->toArray();
            if (!empty($sheetData)) {
                for ($i = 1; $i < count($sheetData); $i++) {
                    // $cek = $this->karyawan_m->cek_nik(115);
                    // $cek = $this->karyawan_m->cek_nik(($sheetData[$i][0]));

                    $nik = $sheetData[$i][0];
                    $nama = $sheetData[$i][1];
                    $section = $sheetData[$i][3];
                    $jabatan = $sheetData[$i][5];
                    $departement = $sheetData[$i][7];
                    // looping insert data
                    $data = array(
                        'nik' => $nik,
                        'nama' => $nama,
                        'section' => $section,
                        'jabatan' => $jabatan,
                        'departement' => $departement,
                        'password' => md5('12345678'),
                        'level' => 'user',
                    );

                    $this->db->insert('karyawan', $data);
                }
            }
        }
        $this->session->set_flashdata('pesan', 'import');
        return redirect('admin/data_karyawan');
    }
    public function upload_config($path)
    {
        if (!is_dir($path))
            mkdir($path, 0777, TRUE);
        $config['upload_path']         = './' . $path;
        $config['allowed_types']     = 'csv|CSV|xlsx|XLSX|xls|XLS';
        $config['max_filename']         = '255';
        $config['encrypt_name']     = TRUE;
        $config['max_size']         = 4096;
        $this->load->library('upload', $config);
    }
    // end karyawan

    public function update()
    {
        $data = array(
            "l_kar" => "1",
        );


        $this->db->update('karyawan', $data);
        echo "ok";
    }

    public function data_site()
    {
        $data['judul'] = 'Data site';
        $data['nama'] = $this->session->userdata('nama');

        $data['data'] = $this->site_m->get_all_site();
        $this->load->view('template/header', $data);
        $this->load->view('site/data_site', $data);
        $this->load->view('template/footer');
    }
    public function create_site()
    {
        $data['judul'] = 'Create site';
        $data['nama'] = $this->session->userdata('nama');

        $this->load->view('template/header', $data);
        $this->load->view('site/buat_site', $data);
        $this->load->view('template/footer');
    }
    public function edit_site($id_site)
    {
        $data['judul'] = 'Update site';
        $data['nama'] = $this->session->userdata('nama');

        $data['data'] = $this->site_m->get_row_site($id_site);
        $this->load->view('template/header', $data);
        $this->load->view('site/edit_site', $data);
        $this->load->view('template/footer');
    }

    public function proses_tambah_site()
    {
        $data = array(
            'nama_site' => $this->input->post('nama_site')
        );
        $this->db->insert('site', $data);
        return redirect('admin/data_site');
    }
    public function proses_edit_site($id_site)
    {
        $data = array(
            'nama_site' => $this->input->post('nama_site')
        );
        $this->db->where('id_site', $id_site);
        $this->db->update('site', $data);
        return redirect('admin/data_site');
    }
    public function delete_site($id_site)
    {
        $this->db->where('id_site', $id_site);
        $this->db->delete('site');
        return redirect('admin/data_site');
    }

    public function data_unit()
    {
        $data['judul'] = 'Data unit';
        $data['nama'] = $this->session->userdata('nama');

        $data['data'] = $this->unit_m->get_all_unit();
        $this->load->view('template/header', $data);
        $this->load->view('unit/data_unit', $data);
        $this->load->view('template/footer');
    }
    public function create_unit()
    {
        $data['judul'] = 'Create unit';
        $data['nama'] = $this->session->userdata('nama');

        $this->load->view('template/header', $data);
        $this->load->view('unit/buat_unit', $data);
        $this->load->view('template/footer');
    }
    public function edit_unit($id_unit)
    {
        $data['judul'] = 'Update unit';
        $data['nama'] = $this->session->userdata('nama');

        $data['data'] = $this->unit_m->get_row_unit($id_unit);
        $this->load->view('template/header', $data);
        $this->load->view('unit/edit_unit', $data);
        $this->load->view('template/footer');
    }

    public function proses_tambah_unit()
    {
        $data = array(
            'nama_unit' => $this->input->post('nama_unit')
        );
        $this->db->insert('unit', $data);
        return redirect('admin/data_unit');
    }
    public function proses_edit_unit($id_unit)
    {
        $data = array(
            'nama_unit' => $this->input->post('nama_unit')
        );
        $this->db->where('id_unit', $id_unit);
        $this->db->update('unit', $data);
        return redirect('admin/data_unit');
    }
    public function delete_unit($id_unit)
    {
        $this->db->where('id_unit', $id_unit);
        $this->db->delete('unit');
        return redirect('admin/data_unit');
    }
}
