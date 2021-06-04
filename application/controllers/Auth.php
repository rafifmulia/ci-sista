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

    $this->template->ex_js('auth/ex_js/login');

    $this->template->view('auth/login', $data);
  }

  public function register()
  {
    $data = [];

    $this->template->ex_js('auth/ex_js/register');

    $this->template->view('auth/register', $data);
  }

  public function forgot_password()
  {
    $data = [];

    $this->template->ex_js('auth/ex_js/forgot_password');

    $this->template->view('auth/forgot_password', $data);
  }
}
