<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$model = array('BayarModel');
		$helper = array('tgl_indo', 'nominal');
		$this->load->model($model);
		$this->load->helper($helper);
		$this->load->library('email');
		if (!$this->session->has_userdata('session_id')) {
			$this->session->set_flashdata('alert', 'belum_login');
			redirect(base_url('admin/login'));
		}
	}

	public function index()
	{
		$data = array(
			'transaksi' => $this->BayarModel->lihat_keranjang_faktur_admin()->result_array()
		);
		$this->load->view('backend/templates/header');
		$this->load->view('backend/transaksi/index', $data);
		$this->load->view('backend/templates/footer');
	}

	public function lihat($id)
	{
		$transaksi = $this->BayarModel->lihat_keranjang_faktur_admin_by_id($id)->row_array();
		$konfirmasi = $this->BayarModel->lihat_keranjang_faktur_konfirmasi_admin_by_id($id)->row_array();
//		echo '<pre>';
//		var_dump($konfirmasi);die;
		$data = array(
			'transaksi' => $transaksi,
			'konfirmasi' => $konfirmasi,
			'spanduk' => $this->BayarModel->lihat_keranjang_spanduk($transaksi['keranjang_pengguna_id'], 'bayar_menunggu', $transaksi['keranjang_id'])->result_array(),
			'stiker' => $this->BayarModel->lihat_keranjang_stiker($transaksi['keranjang_pengguna_id'], 'bayar_menunggu', $transaksi['keranjang_id'])->result_array(),
			'kartu' => $this->BayarModel->lihat_keranjang_kartu($transaksi['keranjang_pengguna_id'], 'bayar_menunggu', $transaksi['keranjang_id'])->result_array(),
			'brosur' => $this->BayarModel->lihat_keranjang_brosur($transaksi['keranjang_pengguna_id'], 'bayar_menunggu', $transaksi['keranjang_id'])->result_array(),
		);
		$this->load->view('backend/templates/header');
		$this->load->view('backend/transaksi/lihat', $data);
		$this->load->view('backend/templates/footer');
	}

	public function konfirmasi($id)
	{
		$data = array(
			'faktur_status' => 'sudah'
		);
		$this->BayarModel->update_faktur($id, $data);
		redirect('admin/transaksi/lihat/' . $id);
	}

	public function email($id)
	{
		$transaksi = $this->BayarModel->lihat_keranjang_faktur_admin_by_id($id)->row_array();
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "ssl://smtp.googlemail.com";
		$config['smtp_port'] = 465;
		$config['smtp_user'] = "rahmatikadigitalprinting@gmail.com";
		$config['smtp_pass'] = "rahmatikai123";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";

		$this->email->initialize($config);
		$this->email->from('rahmatikadigitalprinting@gmail.com', 'Surya Madani Digital Printing');
		$list = array($transaksi['pengguna_email']);
		$this->email->to($list);
		$this->email->subject('Pesanan Selesai');
		$message = $transaksi['pengguna_nama'] . ', Pesanan anda sudah selesai, silahkan datang kealamat kami untuk menjemput pesanan anda';

		$data = array(
			'spanduk' => $this->BayarModel->lihat_keranjang_spanduk($transaksi['keranjang_pengguna_id'], 'bayar_menunggu', $transaksi['keranjang_id'])->result_array(),
			'stiker' => $this->BayarModel->lihat_keranjang_stiker($transaksi['keranjang_pengguna_id'], 'bayar_menunggu', $transaksi['keranjang_id'])->result_array(),
			'kartu' => $this->BayarModel->lihat_keranjang_kartu($transaksi['keranjang_pengguna_id'], 'bayar_menunggu', $transaksi['keranjang_id'])->result_array(),
			'brosur' => $this->BayarModel->lihat_keranjang_brosur($transaksi['keranjang_pengguna_id'], 'bayar_menunggu', $transaksi['keranjang_id'])->result_array(),
		);

		$table = array();
		if ($data['spanduk'] != null) {
			$harga = 0;
			foreach ($data['spanduk'] as $key => $value) {
				$harga = $harga + $value['spanduk_total'];
			}
			$spanduk = array(
				'jenis' => 'Spanduk',
				'jumlah' => count($data['spanduk']),
				'harga' => $harga
			);
			array_push($table, $spanduk);
		}
		if ($data['stiker'] != null) {
			$harga = 0;
			foreach ($data['stiker'] as $key => $value) {
				$harga = $harga + $value['stiker_total'];
			}
			$stiker = array(
				'jenis' => 'Stiker',
				'jumlah' => count($data['stiker']),
				'harga' => $harga
			);
			array_push($table, $stiker);
		}
		if ($data['kartu'] != null) {
			$harga = 0;
			foreach ($data['kartu'] as $key => $value) {
				$harga = $harga + $value['kartu_total'];
			}
			$kartu = array(
				'jenis' => 'Kartu Nama',
				'jumlah' => count($data['kartu']),
				'harga' => $harga
			);
			array_push($table, $kartu);
		}
		if ($data['brosur'] != null) {
			$harga = 0;
			foreach ($data['brosur'] as $key => $value) {
				$harga = $harga + $value['brosur_total'];
			}
			$brosur = array(
				'jenis' => 'Brosur',
				'jumlah' => count($data['brosur']),
				'harga' => $harga
			);
			array_push($table, $brosur);
		}

		$message .= '<p>Detail Pesanan</p>';

		$message .= '
			<table border="1" style="border-collapse: collapse">
					<thead>
					<tr>
						<th>Jenis</th>
						<th>Jumlah</th>
						<th style="text-align: right">Harga</th>
					</tr>
					</thead>
					<tbody>
		';

		foreach ($table as $key => $value) {
			$message .= '<tr>
			<td>' . $value['jenis'] . '</td>
			<td style="text-align: center">' . $value['jumlah'] . '</td>
			<td style="text-align: right"> Rp. ' . nominal($value['harga']) . '</td>
		</tr>
		';
		}

		$message .= '
			</tbody>
			<tfoot>
					<tr>
						<td colspan="2"><b>Total</b></td>
						<td style="text-align: right"><b>Rp. '. nominal($transaksi['keranjang_total']) .'</b></td>
					</tr>
					</tfoot>
			</table>
		';

		$this->email->message($message);
		if ($this->email->send()) {
			$this->session->set_flashdata('alert', 'notification');
			redirect('admin/transaksi/lihat/' . $id);
		} else {
			show_error($this->email->print_debugger());
			redirect('admin/transaksi/lihat/' . $id);
		}
	}
}
