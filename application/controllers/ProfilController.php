<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ProfilController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$model = array('BayarModel','PesanModel');
		$helper = array('nominal','tgl_indo');
		$this->load->model($model);
		$this->load->helper($helper);
		if (!$this->session->has_userdata('session_id')) {
			$this->session->set_flashdata('alert', 'belum_login');
			redirect(base_url('login'));
		}
	}
	public function index(){
		$data = array(
			'title' => 'Profil | Rahmatika Digital Printing'
		);
		$this->load->view('frontend/templates/header',$data);
		$this->load->view('frontend/profil/index');
		$this->load->view('frontend/templates/footer');
	}
	public function pesanan(){
		$data = array(
			'title' => 'Pesanan | Rahmatika Digital Printing',
			'pesanan' => $this->BayarModel->lihat_keranjang_faktur($this->session->userdata('session_id'))->result_array(),
		);
		$this->load->view('frontend/templates/header',$data);
		$this->load->view('frontend/profil/pesanan',$data);
		$this->load->view('frontend/templates/footer');
	}
	public function detailPesanan($id){
		$pesanan = $this->BayarModel->lihat_keranjang_faktur_by_id($id,$this->session->userdata('session_id'))->row_array();
		$data = array(
			'title' => 'Detail Pesanan | Rahmatika Digital Printing',
			'pesanan' => $pesanan,
			'spanduk' => $this->BayarModel->lihat_keranjang_spanduk($this->session->userdata('session_id'),'bayar_menunggu',$pesanan['keranjang_id'])->result_array(),
			'stiker' => $this->BayarModel->lihat_keranjang_stiker($this->session->userdata('session_id'),'bayar_menunggu',$pesanan['keranjang_id'])->result_array(),
			'kartu' => $this->BayarModel->lihat_keranjang_kartu($this->session->userdata('session_id'),'bayar_menunggu',$pesanan['keranjang_id'])->result_array(),
			'brosur' => $this->BayarModel->lihat_keranjang_brosur($this->session->userdata('session_id'),'bayar_menunggu',$pesanan['keranjang_id'])->result_array(),
		);
		$this->load->view('frontend/templates/header',$data);
		$this->load->view('frontend/profil/detail_pesanan',$data);
		$this->load->view('frontend/templates/footer');
	}
	public function desain($id){
		$pesanan = $this->BayarModel->lihat_keranjang_faktur_by_id($id,$this->session->userdata('session_id'))->row_array();
		$data = array(
			'title' => 'Data Desain | Surya Madani Digital Printing',
			'spanduk' => $this->BayarModel->lihat_keranjang_spanduk($this->session->userdata('session_id'),'bayar_menunggu',$pesanan['keranjang_id'])->result_array(),
			'stiker' => $this->BayarModel->lihat_keranjang_stiker($this->session->userdata('session_id'),'bayar_menunggu',$pesanan['keranjang_id'])->result_array(),
			'kartu' => $this->BayarModel->lihat_keranjang_kartu($this->session->userdata('session_id'),'bayar_menunggu',$pesanan['keranjang_id'])->result_array(),
			'brosur' => $this->BayarModel->lihat_keranjang_brosur($this->session->userdata('session_id'),'bayar_menunggu',$pesanan['keranjang_id'])->result_array(),
		);
		$this->load->view('frontend/templates/header',$data);
		$this->load->view('frontend/profil/desain',$data);
		$this->load->view('frontend/templates/footer');
	}
	public function detailDesain($id){
		if (isset($_POST['desain'])){
			$desainId = $this->input->post('id');
			$komentar = $this->input->post('komentar');
			$data = array(
				'desain_komentar' => $komentar,
				'desain_status' => 'tunggu'
			);
			$this->PesanModel->update('sipesan_desain','desain_id',$desainId,$data);
			$this->session->set_flashdata('alert', 'komentar_sukses');
			redirect('pesanan');
		} else {
			$data = array(
				'title' => 'Detail Desain | Rahmatika Digital Printing',
				'produk' => $this->PesanModel->lihat_desain('sipesan_desain','desain_produk_id',$id),
				'id' => $id
			);
			$this->load->view('frontend/templates/header',$data);
			$this->load->view('frontend/profil/detail_desain',$data);
			$this->load->view('frontend/templates/footer');
		}
	}
}
