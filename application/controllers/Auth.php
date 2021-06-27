<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('template', ['load'=>$this->load]);
    $this->template->auth();
  }

  public function login()
  {
    $data = [];

    // $this->template->ex_js('auth/ex_js/login');

    $this->template->view('auth/login', $data);
  }

  public function check_login()
  {
    $email = $this->input->post('email');
    $password = md5($this->input->post('password'));
    $this->load->model('M_data');
    $data = $this->M_data->check_login($email, $password);
    if ($data) {
      $data_user = array(
        'id_user' => $data,
      );
      $this->session->set_userdata($data_user);

      redirect('admin/dashboard');
    } else {
      redirect('auth/login');
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
    $this->output->set_header("Pragma: no-cache");
    redirect('auth/login');
  }

  public function register()
  {
    $data = [];

    // $this->template->ex_js('auth/ex_js/register');

    $this->template->view('auth/register', $data);
  }

  public function save_register()
  {
    $password2 = $this->input->post('password2');

    $data = array(
      'username' => $this->input->post('username'),
      'email' => $this->input->post('email'),
      'password' => md5($this->input->post('password')),
      'lvl' =>  'user',
    );

    if ($this->input->post('password') == $password2) {
      $this->load->model('M_data');
      $reg = $this->M_data->save_register($data);
      if ($reg) {
        $this->session->set_flashdata('pesan', 'Akun kamu berhasil dibuat');
      } else {
        $this->session->set_flashdata('pesan', 'Data gagal disimpan');  
      }
    } else if ($this->input->post('password') == '') {
      $this->session->set_flashdata('pesan', 'Password tidak boleh kosong');
    } else {
      $this->session->set_flashdata('pesan', 'Password tidak sama');
    }

    redirect('auth/register');
  }

  public function forgot_password()
  {
    $data = [];

    $this->template->ex_js('auth/ex_js/forgot_password');

    $this->template->view('auth/forgot_password', $data);
  }
}
