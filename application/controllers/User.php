<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Makassar");
class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('jabatan_m');
		// $this->load->model('atk_model');
		// $this->load->model('pegawai_m');
		// $this->load->model('pengajuan_m');
		$this->load->library('pagination');
		$this->load->library('cart');
		$level_akun = $this->session->userdata('level');
		if ($level_akun != "user") {

			return redirect('auth');
		}
	}
	public function index()
	{
		$data['judul'] = 'Dashboard Pegawai';
		$data['nama'] = $this->session->userdata('nama_lengkap');
		$id_pegawai =  $this->session->userdata('id_pegawai');
		$data['data'] = $this->pegawai_m->get_row_pegawai($id_pegawai);
		$data['keranjang'] = $this->cart->contents();
		$this->load->view('template_user/header', $data);
		$this->load->view('user/index', $data);
		$this->load->view('template_user/footer');
	}

	
}   

/* End of file User.php */
