<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('cart');
    $this->load->model('transaksi_model');
  }

  function index()
  {
    $data['page'] = 'Pesanan';

    $data['keranjang'] = $this->cart->contents();
    $data['pesanan'] = $this->transaksi_model->getOrders($this->session->id);

    $this->load->view('templates/header', $data);
    $this->load->view('pesanan/index',$data);
    $this->load->view('templates/footer');
  }

  public function confirmation($id)
  {
    $data = array(
			'id' => $id,
			'status' => 3,
			'konfirmasi' =>2,
		);

		$where = array(
			'id' => $id
		);

		$this->transaksi_model->updateData($where,$data,'penjualan');
		redirect('pesanan');
  }

  public function detail($id)
  {
    $data['page'] = 'Pesanan';

    $data['keranjang'] = $this->cart->contents();
    $data['pesanan'] = $this->transaksi_model->getDataOrderId($id);

    $this->load->view('templates/header', $data);
    $this->load->view('pesanan/detail',$data);
    $this->load->view('templates/footer');
  }

}
