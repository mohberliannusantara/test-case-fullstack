<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model{

  public function getAllTransaksi($value='')
  {
    $query = $this->db->query('SELECT pengguna.nama, penjualan.*, pengguna.id as id_user FROM penjualan JOIN pengguna ON pengguna.id=penjualan.id_pengguna');
    return $query->result();
  }

  public function checkout($cart)
	{

		$data = array(
      'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'telepon' => $this->input->post('telepon')
		);

		$this->db->insert('pengguna',$data);

		$id_pengguna = $this->db->insert_id();

		$penjualan = array(
			'id_pengguna' => $id_pengguna,
			'tanggal' => $this->input->post('tanggal'),
			'total' => $this->input->post('total'),
			'status' => '1',
			'konfirmasi' => '0'
		);
		$this->db->insert('penjualan',$penjualan);

		$id_order = $this->db->insert_id();

		foreach($cart as $va){
			$totaldetil=$va['harga']*$va['qty'];
			$set = array(
				'fa_order' => $id_order,
				'id_produk' =>$va['id'],
				'qty' => $va['qty'],
				'total' => $totaldetil,
			);
			$this->db->insert('detil_penjualan',$set);
		}
	}

  function updateData($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

  function getDataOrderId($id)
	{
		$query = $this->db->query("SELECT penjualan.id, detil_penjualan.*, produk.id,produk.nama FROM detil_penjualan JOIN penjualan ON detil_penjualan.fa_order = penjualan.id JOIN produk ON produk.id=detil_penjualan.id_produk WHERE detil_penjualan.fa_order='$id'");
		return $query->result();

	}
}
