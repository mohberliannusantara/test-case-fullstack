<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('cart');
    $this->load->model('transaksi_model');
  }

  function index()
  {
    $data['page'] = 'Pembelian';
    $data['keranjang'] = $this->cart->contents();

    $this->load->view('templates/header', $data);
    $this->load->view('pembelian/index', $data);
    $this->load->view('templates/footer');
  }

  public function addToCart()
  {
    $data = array(
      'id' => $this->input->post('id'),
      'nama' => $this->input->post('nama'),
      'harga' => $this->input->post('harga'),
      'gambar' => $this->input->post('gambar'),
      'qty' => $this->input->post('qty')
    );
    $this->cart->insert($data);
    redirect('produk');
  }

  public function cart(){
    $data['keranjang'] = $this->cart->contents();
    $this->load->view('pembelian/index',$data);
  }

  public function edit(){
    $cart_info = $_POST['keranjang'] ;
    foreach( $cart_info as $id => $cart)
    {
      $rowid = $cart['rowid'];
      $harga = $cart['harga'];
      $gambar = $cart['gambar'];
      $amount = $harga * $cart['qty'];
      $qty = $cart['qty'];
      $data = array('rowid' => $rowid,
      'harga' => $harga,
      'gambar' => $gambar,
      'amount' => $amount,
      'qty' => $qty);
      $this->cart->update($data);
    }
    redirect('pembelian/cart');
  }

  public function delete($rowid){
    if ($rowid =="semua"){
      $this->cart->destroy();
    }else{
      $data = array('rowid' => $rowid,
      'qty' =>0);
      $this->cart->update($data);
    }
    redirect('pembelian');
  }

  public function pay(){

    $cart = $this->cart->contents();
    $this->transaksi_model->checkout($cart);
    $this->cart->destroy();

    redirect('pembelian/finalResult');
  }

  public function finalResult()
  {
    $data['keranjang'] = $this->cart->contents();
    $this->cart->destroy();

    redirect('autentikasi');
  }
}
