<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PelangganController extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$model = array('PenggunaModel');
		$this->load->model($model);
		if (!$this->session->has_userdata('session_id')) {
			$this->session->set_flashdata('alert', 'belum_login');
			redirect(base_url('admin/login'));
		}
	}
	public function index(){
		$data = array(
			'pelanggan' => $this->PenggunaModel->get_pelanggan()
		);
		$this->load->view('backend/templates/header');
		$this->load->view('backend/pelanggan/index',$data);
		$this->load->view('backend/templates/footer');
	}
}
