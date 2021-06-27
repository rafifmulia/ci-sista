<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('template', ['load' => $this->load]);
    $this->template->admin();
    
    if ($this->session->userdata('id_user') == null) {
      redirect('auth/login');
    }

    $this->load->model('M_data');
  }

  public function dashboard()
  {
    $data = [];

    $this->template->view('admin/dashboard', $data);
  }

  public function daftar_seminar()
  {
    $data = [
      'get_pembimbing' => $this->M_data->get_pembimbing(),
      'get_kategori_seminar' => $this->M_data->get_kategori_seminar(),
    ];

    $this->template->ex_js('admin/ex_js/daftar_seminar', $data);

    $this->template->view('admin/daftar_seminar', $data);
  }

  public function daftar_peserta()
  {
    $data = [];

    $this->template->ex_js('admin/ex_js/daftar_peserta');

    $this->template->view('admin/daftar_peserta', $data);
  }

  public function daftar_user()
  {
    $data = [];

    $this->template->ex_js('admin/ex_js/daftar_user');

    $this->template->view('admin/daftar_user', $data);
  }

  public function verify_user()
  {
    $data = [];

    $this->template->ex_js('admin/ex_js/verify_user');

    $this->template->view('admin/verify_user', $data);
  }
}
