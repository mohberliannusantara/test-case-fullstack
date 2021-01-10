<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autentikasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Autentikasi_model');
	}

  public function index()
  {
    $this->load->view('autentikasi/index');
  }

  public function signUp()
  {
    $this->load->view('autentikasi/create');
  }

	function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run() === FALSE){
			redirect('autentikasi');
		}else {
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));

			$cek = $this->Autentikasi_model->login($username,$password);

			if ($cek->num_rows() == 1) {

				$value = $cek->row();

				$userdata = array(
					'id' => $value->id,
					'username' => $value->username,
					'nama' => $value->nama,
					'alamat' => $value->alamat,
          'telepon' => $value->telepon,
					'logged_in' => TRUE
				);

				$this->session->set_flashdata('user_loggedin', 'You are now logged in');

				if ($userdata['id'] == 1) {
					$this->session->set_userdata($userdata);
					redirect('admin/beranda','refresh');
				}else {
					$this->session->set_userdata($userdata);
					redirect('beranda','refresh');
				}
			} else {
				echo "<script>alert('Informasi Akun yang Anda Masukkan Salah') </script>";
				redirect('autentikasi','refresh');
			}
		}
	}

	function logout()
	{
		$userdata = array('username','logged_in');
		$this->session->unset_userdata($userdata);
		redirect('beranda','refresh');
	}
}
