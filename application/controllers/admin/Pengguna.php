<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('pengguna_model');

    if (!$this->session->logged_in == TRUE) {
			redirect('autentikasi','refresh');
		}
  }

  function index()
  {
    $data['page'] = 'Pengguna';

    $data['pengguna'] = $this->pengguna_model->getAllPengguna();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/pengguna/index', $data);
    $this->load->view('admin/templates/footer');
  }
}
