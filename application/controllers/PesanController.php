<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PesanController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$model = array('PesanModel','BayarModel');
		$this->load->model($model);
		if (!$this->session->has_userdata('session_id')) {
			$this->session->set_flashdata('alert', 'belum_login');
			redirect(base_url('login'));
		}
	}

	public function pesanSpanduk()
	{
		if (isset($_POST['keranjang'])) {
			$spandukId = 'SDK-' . substr(time(), 5);
			$panjang = $this->input->post('panjang');
			$lebar = $this->input->post('lebar');
			$bahan = $this->input->post('bahan');
			$jumlah = $this->input->post('jumlah');
			$estimasi = $this->input->post('estimasi');
			$total = 0;
			if ($bahan == 'Biasa') {
				$total = ($panjang * $lebar) * $jumlah * 20000;
			} elseif ($bahan == 'Menengah') {
				$total = ($panjang * $lebar) * $jumlah * 30000;
			} elseif ($bahan == 'Bagus') {
				$total = ($panjang * $lebar) * $jumlah * 35000;
			}

			$config['upload_path'] = './assets/images/spanduk/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('upload')) {
				$error = array('error' => $this->upload->display_errors());
				var_dump($error);
			} else {
				$foto = $this->upload->data('file_name');

				$dataSpanduk = array(
					'spanduk_id' => $spandukId,
					'spanduk_panjang' => $panjang,
					'spanduk_lebar' => $lebar,
					'spanduk_bahan' => $bahan,
					'spanduk_jumlah' => $jumlah,
					'spanduk_estimasi' => $estimasi,
					'spanduk_total' => $total,
					'spanduk_foto' => $foto,
				);

				$allCart = $this->BayarModel->lihat_keranjang();
				$undoneCart = $this->BayarModel->lihat_keranjang_status($this->session->userdata('session_id'),'belum')->row_array();

				if ($allCart == null){
					$cartId = 'CRT-' . substr(time(), 5);
					$dataSpanduk['spanduk_keranjang_id'] = $cartId;
					$dataCart = array(
						'keranjang_id' => $cartId,
						'keranjang_pengguna_id' => $this->session->userdata('session_id'),
						'keranjang_total' => $total,
					);
					$this->PesanModel->simpan_spanduk($dataSpanduk);
					$this->BayarModel->simpan_keranjang($dataCart);
					$this->session->set_flashdata('alert', 'pesan_sukses');
					redirect('spanduk');
				} else {
					if ($undoneCart != null){
						$cartId = $undoneCart['keranjang_id'];
						$cartTotal = $undoneCart['keranjang_total'];
						$dataSpanduk['spanduk_keranjang_id'] = $cartId;
						$dataCart['keranjang_total'] = $cartTotal + $total;

						$this->PesanModel->simpan_spanduk($dataSpanduk);
						$this->BayarModel->update_keranjang($cartId,$dataCart);
						$this->session->set_flashdata('alert', 'pesan_sukses');
						redirect('spanduk');
					} else {
						$cartId = 'CRT-' . substr(time(), 5);
						$dataSpanduk['spanduk_keranjang_id'] = $cartId;
						$dataCart = array(
							'keranjang_id' => $cartId,
							'keranjang_pengguna_id' => $this->session->userdata('session_id'),
							'keranjang_total' => $total,
						);
						$this->PesanModel->simpan_spanduk($dataSpanduk);
						$this->BayarModel->simpan_keranjang($dataCart);
						$this->session->set_flashdata('alert', 'pesan_sukses');
						redirect('spanduk');
					}
				}
			}
		}
		$data = array(
			'title' => 'Pesan Spanduk | Rahmatika Digital Printing'
		);
		$this->load->view('frontend/templates/header',$data);
		$this->load->view('frontend/pesanan/spanduk');
		$this->load->view('frontend/templates/footer');
	}
	public function pesanStiker(){

		if (isset($_POST['keranjang'])) {
			$stikerId = 'SKR-' . substr(time(), 5);
			$panjang = $this->input->post('panjang');
			$lebar = $this->input->post('lebar');
			$bahan = $this->input->post('bahan');
			$jumlah = $this->input->post('jumlah');
			$estimasi = $this->input->post('estimasi');
			$total = 0;
			if ($bahan == 'biasa') {
				$total = ($panjang * $lebar) * $jumlah * 75000;
			} elseif ($bahan == 'bagus') {
				$total = ($panjang * $lebar) * $jumlah * 95000;
			}

			$config['upload_path'] = './assets/images/stiker/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('upload')) {
				$error = array('error' => $this->upload->display_errors());
				var_dump($error);
			} else {
				$foto = $this->upload->data('file_name');

				$dataStiker = array(
					'stiker_id' => $stikerId,
					'stiker_panjang' => $panjang,
					'stiker_lebar' => $lebar,
					'stiker_bahan' => $bahan,
					'stiker_jumlah' => $jumlah,
					'stiker_estimasi' => $estimasi,
					'stiker_total' => $total,
					'stiker_foto' => $foto,
				);

				$allCart = $this->BayarModel->lihat_keranjang();
				$undoneCart = $this->BayarModel->lihat_keranjang_status($this->session->userdata('session_id'),'belum')->row_array();

				if ($allCart == null){
					$cartId = 'CRT-' . substr(time(), 5);
					$dataStiker['stiker_keranjang_id'] = $cartId;
					$dataCart = array(
						'keranjang_id' => $cartId,
						'keranjang_pengguna_id' => $this->session->userdata('session_id'),
						'keranjang_total' => $total,
					);
					$this->PesanModel->simpan_stiker($dataStiker);
					$this->BayarModel->simpan_keranjang($dataCart);
					$this->session->set_flashdata('alert', 'pesan_sukses');
					redirect('stiker');
				} else {
					if ($undoneCart != null){
						$cartId = $undoneCart['keranjang_id'];
						$cartTotal = $undoneCart['keranjang_total'];
						$dataStiker['stiker_keranjang_id'] = $cartId;
						$dataCart['keranjang_total'] = $cartTotal + $total;

						$this->PesanModel->simpan_stiker($dataStiker);
						$this->BayarModel->update_keranjang($cartId,$dataCart);
						$this->session->set_flashdata('alert', 'pesan_sukses');
						redirect('stiker');
					} else {
						$cartId = 'CRT-' . substr(time(), 5);
						$dataStiker['stiker_keranjang_id'] = $cartId;
						$dataCart = array(
							'keranjang_id' => $cartId,
							'keranjang_pengguna_id' => $this->session->userdata('session_id'),
							'keranjang_total' => $total,
						);
						$this->PesanModel->simpan_stiker($dataStiker);
						$this->BayarModel->simpan_keranjang($dataCart);
						$this->session->set_flashdata('alert', 'pesan_sukses');
						redirect('stiker');
					}
				}
			}
		}
		$data = array(
			'title' => 'Pesan Stiker | Rahmatika Digital Printing'
		);
		$this->load->view('frontend/templates/header',$data);
		$this->load->view('frontend/pesanan/stiker');
		$this->load->view('frontend/templates/footer');
	}
	public function pesanKartu(){

		if (isset($_POST['keranjang'])) {
			$kartuId = 'CRD-' . substr(time(), 5);
			$bahan = $this->input->post('bahan');
			$jumlah = $this->input->post('jumlah');
			$estimasi = $this->input->post('estimasi');
			$total = 0;
			if ($bahan == 'biasa') {
				$total =  $jumlah * 35000;
			} elseif ($bahan == 'bagus') {
				$total =  $jumlah * 45000;
			}

			$config['upload_path'] = './assets/images/kartu/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('upload')) {
				$error = array('error' => $this->upload->display_errors());
				var_dump($error);
			} else {
				$foto = $this->upload->data('file_name');

				$dataKartu = array(
					'kartu_id' => $kartuId,
					'kartu_bahan' => $bahan,
					'kartu_jumlah' => $jumlah,
					'kartu_estimasi' => $estimasi,
					'kartu_total' => $total,
					'kartu_foto' => $foto,
				);

				$allCart = $this->BayarModel->lihat_keranjang();
				$undoneCart = $this->BayarModel->lihat_keranjang_status($this->session->userdata('session_id'),'belum')->row_array();

				if ($allCart == null){
					$cartId = 'CRT-' . substr(time(), 5);
					$dataKartu['kartu_keranjang_id'] = $cartId;
					$dataCart = array(
						'keranjang_id' => $cartId,
						'keranjang_pengguna_id' => $this->session->userdata('session_id'),
						'keranjang_total' => $total,
					);
					$this->PesanModel->simpan_kartu($dataKartu);
					$this->BayarModel->simpan_keranjang($dataCart);
					$this->session->set_flashdata('alert', 'pesan_sukses');
					redirect('kartu');
				} else {
					if ($undoneCart != null){
						$cartId = $undoneCart['keranjang_id'];
						$cartTotal = $undoneCart['keranjang_total'];
						$dataKartu['kartu_keranjang_id'] = $cartId;
						$dataCart['keranjang_total'] = $cartTotal + $total;

						$this->PesanModel->simpan_kartu($dataKartu);
						$this->BayarModel->update_keranjang($cartId,$dataCart);
						$this->session->set_flashdata('alert', 'pesan_sukses');
						redirect('kartu');
					} else {
						$cartId = 'CRT-' . substr(time(), 5);
						$dataKartu['kartu_keranjang_id'] = $cartId;
						$dataCart = array(
							'keranjang_id' => $cartId,
							'keranjang_pengguna_id' => $this->session->userdata('session_id'),
							'keranjang_total' => $total,
						);
						$this->PesanModel->simpan_kartu($dataKartu);
						$this->BayarModel->simpan_keranjang($dataCart);
						$this->session->set_flashdata('alert', 'pesan_sukses');
						redirect('kartu');
					}
				}
			}
		}
		$data = array(
			'title' => 'Pesan Kartu Nama | Rahmatika Digital Printing'
		);
		$this->load->view('frontend/templates/header',$data);
		$this->load->view('frontend/pesanan/kartu');
		$this->load->view('frontend/templates/footer');
	}
	public function pesanBrosur(){
		if (isset($_POST['keranjang'])) {
			$brosurId = 'BRC-' . substr(time(), 5);
			$ukuran = $this->input->post('ukuran');
			$bahan = $this->input->post('bahan');
			$jumlah = $this->input->post('jumlah');
			$estimasi = $this->input->post('estimasi');
			$total = 0;
			if ($bahan == 'hvs') {
				$total =  $jumlah * 500000;
			} elseif ($bahan == 'konstruk') {
				$total =  $jumlah * 750000;
			}

			$config['upload_path'] = './assets/images/brosur/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('upload')) {
				$error = array('error' => $this->upload->display_errors());
				var_dump($error);
			} else {
				$foto = $this->upload->data('file_name');

				$dataBrosur = array(
					'brosur_id' => $brosurId,
					'brosur_bahan' => $bahan,
					'brosur_ukuran' => $ukuran,
					'brosur_jumlah' => $jumlah,
					'brosur_estimasi' => $estimasi,
					'brosur_total' => $total,
					'brosur_foto' => $foto,
				);

				$allCart = $this->BayarModel->lihat_keranjang();
				$undoneCart = $this->BayarModel->lihat_keranjang_status($this->session->userdata('session_id'),'belum')->row_array();

				if ($allCart == null){
					$cartId = 'CRT-' . substr(time(), 5);
					$dataBrosur['brosur_keranjang_id'] = $cartId;
					$dataCart = array(
						'keranjang_id' => $cartId,
						'keranjang_pengguna_id' => $this->session->userdata('session_id'),
						'keranjang_total' => $total,
					);
					$this->PesanModel->simpan_brosur($dataBrosur);
					$this->BayarModel->simpan_keranjang($dataCart);
					$this->session->set_flashdata('alert', 'pesan_sukses');
					redirect('brosur');
				} else {
					if ($undoneCart != null){
						$cartId = $undoneCart['keranjang_id'];
						$cartTotal = $undoneCart['keranjang_total'];
						$dataBrosur['brosur_keranjang_id'] = $cartId;
						$dataCart['keranjang_total'] = $cartTotal + $total;

						$this->PesanModel->simpan_brosur($dataBrosur);
						$this->BayarModel->update_keranjang($cartId,$dataCart);
						$this->session->set_flashdata('alert', 'pesan_sukses');
						redirect('brosur');
					} else {
						$cartId = 'CRT-' . substr(time(), 5);
						$dataBrosur['brosur_keranjang_id'] = $cartId;
						$dataCart = array(
							'keranjang_id' => $cartId,
							'keranjang_pengguna_id' => $this->session->userdata('session_id'),
							'keranjang_total' => $total,
						);
						$this->PesanModel->simpan_brosur($dataBrosur);
						$this->BayarModel->simpan_keranjang($dataCart);
						$this->session->set_flashdata('alert', 'pesan_sukses');
						redirect('brosur');
					}
				}
			}
		}
		$data = array(
			'title' => 'Pesan Brosur | Rahmatika Digital Printing'
		);
		$this->load->view('frontend/templates/header',$data);
		$this->load->view('frontend/pesanan/brosur');
		$this->load->view('frontend/templates/footer');
	}

	public function hapusKartu($id){
		$kartu = $this->PesanModel->lihat_kartu_by_id($id);
		$keranjang_id = $kartu['kartu_keranjang_id'];
		$keranjang = $this->BayarModel->lihat_keranjang_by_id($keranjang_id);
		$total = $kartu['kartu_total'];
		$data = array(
			'keranjang_total' => $keranjang['keranjang_total'] - $total
		);
		$this->PesanModel->delete('kartu_id',$id,'sipesan_kartu');
		$this->BayarModel->update_keranjang($keranjang_id,$data);
		$this->session->set_flashdata('alert', 'pesan_hapus');
		redirect('keranjang');
	}

	public function hapusSpanduk($id){
		$spanduk = $this->PesanModel->lihat_spanduk_by_id($id);
		$keranjang_id = $spanduk['spanduk_keranjang_id'];
		$keranjang = $this->BayarModel->lihat_keranjang_by_id($keranjang_id);
		$total = $spanduk['spanduk_total'];
		$data = array(
			'keranjang_total' => $keranjang['keranjang_total'] - $total
		);
		$this->PesanModel->delete('spanduk_id',$id,'sipesan_spanduk');
		$this->BayarModel->update_keranjang($keranjang_id,$data);
		$this->session->set_flashdata('alert', 'pesan_hapus');
		redirect('keranjang');
	}

	public function hapusStiker($id){
		$stiker = $this->PesanModel->lihat_stiker_by_id($id);
		$keranjang_id = $stiker['stiker_keranjang_id'];
		$keranjang = $this->BayarModel->lihat_keranjang_by_id($keranjang_id);
		$total = $stiker['stiker_total'];
		$data = array(
			'keranjang_total' => $keranjang['keranjang_total'] - $total
		);
		$this->PesanModel->delete('stiker_id',$id,'sipesan_stiker');
		$this->BayarModel->update_keranjang($keranjang_id,$data);
		$this->session->set_flashdata('alert', 'pesan_hapus');
		redirect('keranjang');
	}

	public function hapusBrosur($id){
		$brosur = $this->PesanModel->lihat_brosur_by_id($id);
		$keranjang_id = $brosur['brosur_keranjang_id'];
		$keranjang = $this->BayarModel->lihat_keranjang_by_id($keranjang_id);
		$total = $brosur['brosur_total'];
		$data = array(
			'keranjang_total' => $keranjang['keranjang_total'] - $total
		);
		$this->PesanModel->delete('brosur_id',$id,'sipesan_brosur');
		$this->BayarModel->update_keranjang($keranjang_id,$data);
		$this->session->set_flashdata('alert', 'pesan_hapus');
		redirect('keranjang');
	}
}
