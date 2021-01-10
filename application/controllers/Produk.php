<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('cart');
    $this->load->model('produk_model');
  }

  function index()
  {
    $data['page'] = 'Produk';

    $data['keranjang'] = $this->cart->contents();
    $data['produk'] = $this->produk_model->getAllProduct();

    $this->load->view('templates/header', $data);
    $this->load->view('produk/index', $data);
    $this->load->view('templates/footer');
  }



}
