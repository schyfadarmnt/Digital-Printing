<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PesanModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function simpan_spanduk($data){
		$this->db->insert('sipesan_spanduk',$data);
		return $this->db->affected_rows();
	}
	public function lihat_spanduk_by_id($id){
		$this->db->where('spanduk_id',$id);
		return $this->db->get('sipesan_spanduk')->row_array();
	}
	public function simpan_stiker($data){
		$this->db->insert('sipesan_stiker',$data);
		return $this->db->affected_rows();
	}
	public function lihat_stiker_by_id($id){
		$this->db->where('stiker_id',$id);
		return $this->db->get('sipesan_stiker')->row_array();
	}
	public function simpan_kartu($data){
		$this->db->insert('sipesan_kartu',$data);
		return $this->db->affected_rows();
	}
	public function lihat_kartu_by_id($id){
		$this->db->where('kartu_id',$id);
		return $this->db->get('sipesan_kartu')->row_array();
	}
	public function simpan_brosur($data){
		$this->db->insert('sipesan_brosur',$data);
		return $this->db->affected_rows();
	}
	public function lihat_brosur_by_id($id){
		$this->db->where('brosur_id',$id);
		return $this->db->get('sipesan_brosur')->row_array();
	}
	public function delete($key,$id,$table){
		$this->db->where($key,$id);
		return $this->db->delete($table);
	}
	public function lihat_desain($table,$key,$id){
		$this->db->where($key,$id);
		return $this->db->get($table)->row_array();
	}
	public function simpan($table,$data){
		$this->db->insert($table,$data);
		return $this->db->affected_rows();
	}
	public function update($table,$key,$id,$data){
		$this->db->where($key, $id);
		$this->db->update($table,$data);
		return $this->db->affected_rows();
	}
}
