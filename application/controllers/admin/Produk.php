<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('produk_model');
    $this->load->library('form_validation');
    
    if (!$this->session->logged_in == TRUE) {
			redirect('autentikasi','refresh');
		}
  }

  function index()
  {
    $data['page'] = 'Produk';

    $data['produk'] = $this->produk_model->getAllProduct();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/produk/index', $data);
    $this->load->view('admin/templates/footer');
  }

  public function create()
  {
    $data['page'] = 'Produk';

    // validasi input
    $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
    $this->form_validation->set_rules('harga', 'Harga', 'trim|required');
    $this->form_validation->set_rules('deskripsi', 'Keterangan', 'trim');

    if ($this->form_validation->run() === FALSE)
    {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/produk/create', $data);
      $this->load->view('admin/templates/footer');
    }
    else
    {
      if ( isset($_FILES['gambar']) && $_FILES['gambar']['size'] > 0 )
      {
        // Konfigurasi folder upload & file yang diijinkan untuk diupload/disimpan
        $config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 10000000000;
        $config['max_width']            = 5000;
        $config['max_height']           = 5000;

        $this->load->library('upload', $config);

        if ( !$this->upload->do_upload('gambar'))
        {
          $data['upload_error'] = $this->upload->display_errors();

          $post_image = '';

          $this->load->view('admin/templates/header', $data);
          $this->load->view('admin/produk/create', $data);
          $this->load->view('admin/templates/footer');
        }
        else
        { //jika berhasil upload
          $img_data = $this->upload->data();
          $post_image = $img_data['file_name'];
        }
      }
      else
      { //jika tidak upload gambar
        $post_image = '';
      }

      $post_data = array(
      'nama' => $this->input->post('nama'),
      'harga' => str_replace(',', '', $this->input->post('harga')),
      'deskripsi' => $this->input->post('deskripsi'),
      'gambar' => $post_image
      );

      if( empty($data['upload_error']) )
      {
        $this->produk_model->create($post_data);
        redirect('admin/produk','refresh');
      }
    }
  }

  public function edit($id = null)
  {
    $data['page'] = 'Produk';

    $data['produk'] = $this->produk_model->getById($id);

    $old_image = $data['produk']->gambar;
    // validasi input
    $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
    $this->form_validation->set_rules('harga', 'Harga', 'trim|required');
    $this->form_validation->set_rules('deskripsi', 'Keterangan', 'trim');

    if ($this->form_validation->run() === FALSE)
    {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/produk/edit', $data);
      $this->load->view('admin/templates/footer');

    } else {
      if ( isset($_FILES['gambar']) && $_FILES['gambar']['size'] > 0 )
      {
        // Konfigurasi folder upload & file yang diijinkan untuk diupload/disimpan
        $config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 10000000000000;
        $config['max_width']            = 5000;
        $config['max_height']           = 5000;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('gambar'))
        {
          $data['upload_error'] = $this->upload->display_errors();

          $post_image = '';

          $this->load->view('admin/templates/header', $data);
          $this->load->view('admin/produk/edit', $data);
          $this->load->view('admin/templates/footer');

        } else { //jika berhasil upload
          if (!empty($old_image)) {
            if (file_exists('./assets/uploads/'.$old_image)) {
              unlink('./assets/uploads/'.$old_image);
            } else {
              echo "file not found";
            }
          }

          $img_data = $this->upload->data();
          $post_image = $img_data['file_name'];

        }
      } else { //jika tidak upload gambar

        $post_image = ( !empty($old_image) ) ? $old_image : '';

      }

      $post_data = array(
        'nama' => $this->input->post('nama'),
        'harga' => str_replace(',', '', $this->input->post('harga')),
        'deskripsi' => $this->input->post('deskripsi'),
        'gambar' => $post_image
      );

      if( empty($data['upload_error']) ) {
        $this->produk_model->update($post_data,$id);
        redirect('admin/produk','refresh');
      }
    }
  }


  public function delete($id)
	{
		$this->produk_model->delete($id);
		redirect('admin/produk','refresh');
	}

}
