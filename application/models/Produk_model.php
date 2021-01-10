<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function getAllProduct($value='')
  {
    $query = $this->db->get('produk');
    return $query->result();
  }

  public function getById($id='')
  {
    $this->db->where('id', $id);

    $query = $this->db->get('produk');
    return $query->row();
  }

  public function update($data,$id)
  {
    $this->db->where('id', $id);
    return $this->db->update('produk', $data);
  }

  public function create($data)
  {
    return $this->db->insert('produk', $data);
  }

  public function delete($id)
  {
    if ( !empty($id) ){
      $delete = $this->db->delete('produk', array('id'=>$id) );
      return $delete ? true : false;
    } else {
      return false;
    }
  }
}
