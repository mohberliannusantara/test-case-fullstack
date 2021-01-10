<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autentikasi_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Autentikasi_model');
  }

	public function login($username,$password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get('pengguna');
	}

  
}

 ?>
