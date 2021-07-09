<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('template', ['load'=>$this->load]);
    $this->template->landing();
    $this->load->model('M_data');
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
    $data = [
      'daftar_seminar' => $this->M_data->get_seminar(),
    ];

    $this->template->ex_js('landing/ex_js/jadwal');

    $this->template->view('landing/jadwal', $data);
  }

  public function detail_jadwal_seminar()
  {
    $id = $this->input->get('id');
    
    $data = [
      'id' => $id,
      'detail' => $this->M_data->detail_seminar($id),
    ];
    
    if (count($data['detail']) < 1) {
      $this->load->view('errors/html/error_general', ['heading'=>'Kamu jahil!', 'message'=>'<p>Jangan diubah-ubah ya :)</p>']);
      return false;
    }

    $this->template->view('landing/detail_jadwal_seminar', $data);
  }

  public function daftar_peserta()
  {
    $id = $this->input->get('id');
    
    $data = [
      'seminar_id' => $id,
      'detail' => $this->M_data->detail_seminar($id),
    ];

    if (count($data['detail']) < 1) {
      $this->load->view('errors/html/error_general', ['heading'=>'Kamu jahil!', 'message'=>'<p>Jangan diubah-ubah ya :)</p>']);
      return false;
    }

    // $this->template->ex_js('landing/ex_js/daftar_peserta');

    $this->template->view('landing/daftar_peserta', $data);
  }

  public function save_peserta()
  {
    $data = array(
      'seminar_id' => $this->input->post('seminar_id'),
      'nim' => $this->input->post('nim'),
      'nama' => $this->input->post('nama'),
      'prodi' => $this->input->post('prodi'),
      'program' => $this->input->post('program'),
      'status' => 'no',
    );

    // validate data
    if ($data['seminar_id'] == null) {
      $this->session->set_flashdata('warning', 'Jangan diubah-ubah ya');
      redirect('landing/daftar_peserta?id='.$data['seminar_id']);
    }
    if ($data['nim'] == null) {
      $this->session->set_flashdata('warning', 'Silahkan isi nim');
      redirect('landing/daftar_peserta?id='.$data['seminar_id']);
    }
    if ($data['nama'] == null) {
      $this->session->set_flashdata('warning', 'Silahkan isi nama mahasiswa');
      redirect('landing/daftar_peserta?id='.$data['seminar_id']);
    }
    if ($data['prodi'] == 'ti') {
    } else if ($data['prodi'] == 'si') {
    } else {
      $this->session->set_flashdata('warning', 'Silahkan pilih prodi');
      redirect('landing/daftar_peserta?id='.$data['seminar_id']);
    }
    if ($data['program'] == 's1') {
      $data['program'] = 'S1';
    } else if ($data['program'] == 's1') {
      $data['program'] = 'S1 Fast Track';
    } else if ($data['program'] == 's2') {
      $data['program'] = 'S2';
    } else if ($data['program'] == 'd3') {
      $data['program'] = 'D3';
    } else {
      $this->session->set_flashdata('warning', 'Silahkan pilih program');
      redirect('landing/daftar_peserta?id='.$data['seminar_id']);
    }

    $this->load->model('M_data');
    $check = $this->M_data->check_peserta($data['seminar_id'], $data['nim']);
    if ($check) {
      $this->session->set_flashdata('info', 'Kamu telah terdaftar sebagai peserta');
      redirect('landing/daftar_peserta?id='.$data['seminar_id']);
    }

    $save = $this->M_data->save_peserta($data);
    if ($save) {
      $this->session->set_flashdata('info', 'Berhasil daftar sebagai peserta');
    } else {
      $this->session->set_flashdata('warning', 'Gagal daftar sebagai peserta');
    }

    redirect('landing/daftar_peserta?id='.$data['seminar_id']);
  }

  public function daftar_seminar()
  {
    $data = [
      'get_dosen' => $this->M_data->get_active_dosen(),
      'get_kategori_seminar' => $this->M_data->get_active_kategori_seminar(),
    ];

    // $this->template->ex_js('landing/ex_js/daftar_seminar');

    $this->template->view('landing/daftar_seminar', $data);
  }

  public function save_seminar()
  {
    $data = array(
      'nim' => $this->input->post('nim'),
      'nama_mahasiswa' => $this->input->post('nama'),
      'semester' => $this->input->post('semester'),
      'prodi' => $this->input->post('prodi'),
      'judul' => $this->input->post('judul'),
      'kategori_seminar_id' => $this->input->post('kategori_seminar'),
      'pembimbing_id' => $this->input->post('pembimbing'),
      'penguji1_id' => $this->input->post('penguji1'),
      'penguji2_id' => $this->input->post('penguji2'),
      'jam' => $this->input->post('jam'),
      'tanggal' => $this->input->post('tgl'),
      'lokasi' => $this->input->post('ruangan'),
    );

    // validate data
    if ($data['nim'] == null) {
      $this->session->set_flashdata('warning', 'Silahkan isi nim');
      redirect('landing/daftar_seminar');
    }
    if ($data['nama_mahasiswa'] == null) {
      $this->session->set_flashdata('warning', 'Silahkan isi nama mahasiswa');
      redirect('landing/daftar_seminar');
    }
    if ($data['prodi'] == 'ti') {
    } else if ($data['prodi'] == 'si') {
    } else {
      $this->session->set_flashdata('warning', 'Silahkan pilih prodi');
      redirect('landing/daftar_seminar');
    }
    if ($data['tanggal'] == null) {
      $this->session->set_flashdata('warning', 'Silahkan isi tanggal seminar');
      redirect('landing/daftar_seminar');
    }
    if ($data['jam'] == null) {
      $this->session->set_flashdata('warning', 'Silahkan isi jam seminar');
      redirect('landing/daftar_seminar');
    }
    if ($data['lokasi'] == null) {
      $this->session->set_flashdata('warning', 'Silahkan isi ruangan');
      redirect('landing/daftar_seminar');
    }
    if ($data['judul'] == null) {
      $this->session->set_flashdata('warning', 'Silahkan isi judul');
      redirect('landing/daftar_seminar');
    }
    if ($data['kategori_seminar_id'] == 0) {
      $this->session->set_flashdata('warning', 'Silahkan pilih kategori seminar');
      redirect('landing/daftar_seminar');
    }
    if ($data['pembimbing_id'] == 0) {
      $this->session->set_flashdata('warning', 'Silahkan pilih pembimbing');
      redirect('landing/daftar_seminar');
    }
    if ($data['penguji1_id'] == 0) {
      $this->session->set_flashdata('warning', 'Silahkan pilih penguji1');
      redirect('landing/daftar_seminar');
    }
    if ($data['penguji2_id'] == 0) {
      $this->session->set_flashdata('warning', 'Silahkan pilih penguji2');
      redirect('landing/daftar_seminar');
    }

    $this->load->model('M_data');
    $save = $this->M_data->save_seminar($data);
    if ($save) {
      $this->session->set_flashdata('info', 'Berhasil membuat seminar');
    } else {
      $this->session->set_flashdata('warning', 'Gagal membuat seminar');
    }

    redirect('landing/daftar_seminar');
  }

  public function about()
  {
    $data = [];

    $this->template->view('landing/about', $data);
  }
}
