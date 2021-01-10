<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Product_model');
  }

  function index()
  {
    $data['page'] = 'Pengguna';

    $data['product'] = $this->Product_model->getAllProduct();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/pengguna/index', $data);
    $this->load->view('admin/templates/footer');
  }

  public function detail($id)
	{
		$data['penjualan'] = $this->M_cart->getById($id);
		$this->load->view('admin/transaksi/view',$data);
	}
}
