<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function getAllPengguna($value='')
  {
    $query = $this->db->get('pengguna');
    return $query->result();
  }
}
