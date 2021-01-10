<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('produk_model');
  }

  function index()
  {
    $data['page'] = 'Beranda';

    $data['produk'] = $this->produk_model->getAllProduct();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/beranda/index', $data);
    $this->load->view('admin/templates/footer');
  }

}
