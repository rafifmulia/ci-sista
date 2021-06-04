<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('template', ['load'=>$this->load]);
    $this->template->landing();
  }

  public function index()
  {
    redirect(base_url('landing/home'));
  }

  public function home()
  {
    $data['username'] = 'kamu';

    // $this->template->ex_css('landing/ex_css/clarity');

    $this->template->view('landing/home', $data);
  }

  public function jadwal()
  {
    $data = [];

    $this->template->ex_js('landing/ex_js/jadwal');

    $this->template->view('landing/jadwal', $data);
  }

  public function detail_jadwal_seminar()
  {
    $data = [];

    $this->template->view('landing/detail_jadwal_seminar', $data);
  }

  public function daftar_peserta()
  {
    $data = [];

    $this->template->ex_js('landing/ex_js/daftar_peserta');

    $this->template->view('landing/daftar_peserta', $data);
  }

  public function daftar_seminar()
  {
    $data = [];

    $this->template->ex_js('landing/ex_js/daftar_seminar');

    $this->template->view('landing/daftar_seminar', $data);
  }

  public function about()
  {
    $data = [];

    $this->template->view('landing/about', $data);
  }
}
