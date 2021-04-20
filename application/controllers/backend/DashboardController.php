<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$model = array('PenggunaModel','BayarModel');
		$this->load->model($model);
		if (!$this->session->has_userdata('session_id')) {
			$this->session->set_flashdata('alert', 'belum_login');
			redirect(base_url('admin/login'));
		}
	}
	public function index(){
		$data = array(
			'pelanggan' => $this->PenggunaModel->get_pelanggan(),
			'transaksi' => $this->BayarModel->lihat_keranjang_faktur_admin()->result_array(),
		);
		$this->load->view('backend/templates/header');
		$this->load->view('backend/index',$data);
		$this->load->view('backend/templates/footer');
	}
}
