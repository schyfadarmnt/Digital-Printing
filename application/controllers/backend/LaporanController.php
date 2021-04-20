<?php


class LaporanController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$model = array('PenggunaModel','BayarModel');
		$helper = array('nominal','tgl_indo');
		$this->load->model($model);
		$this->load->helper($helper);
		if (!$this->session->has_userdata('session_id')) {
			$this->session->set_flashdata('alert', 'belum_login');
			redirect(base_url('admin/login'));
		}
	}
	public function index($tipe){
		if (isset($_POST['lihat'])){
			$tanggal = $this->input->post('tanggal');
			$tipenya = array(
				'spanduk' => $this->BayarModel->lihat_keranjang_spanduk_admin('bayar_menunggu',$tanggal)->result_array(),
				'stiker' => $this->BayarModel->lihat_keranjang_stiker_admin('bayar_menunggu',$tanggal)->result_array(),
				'kartu' => $this->BayarModel->lihat_keranjang_kartu_admin('bayar_menunggu',$tanggal)->result_array(),
				'brosur' => $this->BayarModel->lihat_keranjang_brosur_admin('bayar_menunggu',$tanggal)->result_array()
			);

			$data = array(
				'spanduk' => $tipenya[$tipe],
				'stiker' => $tipenya[$tipe],
				'kartu' => $tipenya[$tipe],
				'brosur' => $tipenya[$tipe],
				'tanggal' => $tanggal,
				'tipe' => $tipe
			);
			$this->load->view('backend/templates/header');
			$this->load->view('backend/laporan/lihat',$data);
			$this->load->view('backend/templates/footer');
		} elseif(isset($_POST['lihatBulan'])){
			$tahun = date('Y');
			$bulan = $this->input->post('bulan');
			$tanggal = $tahun.'-'.$bulan;
			$tipenya = array(
				'spanduk' => $this->BayarModel->lihat_keranjang_spanduk_admin('bayar_menunggu',$tanggal)->result_array(),
				'stiker' => $this->BayarModel->lihat_keranjang_stiker_admin('bayar_menunggu',$tanggal)->result_array(),
				'kartu' => $this->BayarModel->lihat_keranjang_kartu_admin('bayar_menunggu',$tanggal)->result_array(),
				'brosur' => $this->BayarModel->lihat_keranjang_brosur_admin('bayar_menunggu',$tanggal)->result_array()
			);

			$data = array(
				'spanduk' => $tipenya[$tipe],
				'stiker' => $tipenya[$tipe],
				'kartu' => $tipenya[$tipe],
				'brosur' => $tipenya[$tipe],
				'tanggal' => null,
				'bulan' => $bulan,
				'tipe' => $tipe
			);
			$this->load->view('backend/templates/header');
			$this->load->view('backend/laporan/lihat',$data);
			$this->load->view('backend/templates/footer');
		}
		else {
			$data = array(
				'tipe' => $tipe
			);
			$this->load->view('backend/templates/header');
			$this->load->view('backend/laporan/index',$data);
			$this->load->view('backend/templates/footer');
		}
	}
}
