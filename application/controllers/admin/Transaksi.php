<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('transaksi_model');
  }

  function index()
  {
    $data['page'] = 'Transaksi';

    $data['transaksi'] = $this->transaksi_model->getAllTransaksi();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/transaksi/index', $data);
    $this->load->view('admin/templates/footer');
  }

  public function send($id)
  {
    $data = array(
			'status' => 2,
			'konfirmasi' =>1,
		);

		$where = array(
			'id' => $id
		);

		$this->transaksi_model->updateData($where,$data,'penjualan');
		redirect('admin/transaksi');
  }

  public function detail($id)
  {
    $data['page'] = 'Transaksi';
    $data['penjualan'] = $this->transaksi_model->getDataOrderId($id);

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/transaksi/view',$data);
    $this->load->view('admin/templates/footer');
  }
}
