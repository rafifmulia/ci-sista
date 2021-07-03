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
      'get_dosen' => $this->M_data->get_dosen(),
      'get_kategori_seminar' => $this->M_data->get_kategori_seminar(),
      'daftar_seminar' => $this->M_data->get_seminar(),
    ];

    $this->template->ex_js('admin/ex_js/daftar_seminar', $data);

    $this->template->view('admin/daftar_seminar', $data);
  }

  public function detail_seminar()
  {
    header('Content-Type: application/json');

    $id = $this->input->get('id');
    $data = $this->M_data->detail_seminar($id);

    if (count($data) < 1) {
      echo json_encode([
        'meta' => [
          'code' => 400,
          'message' => 'Fail get detail seminar',
        ]
      ]);
      return true;
    }
    
    echo json_encode([
      'meta' => [
        'code' => 200,
        'message' => 'Success get detail seminar',
      ],
      'data' => $data[0]
    ]);
    return true;
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
      redirect('admin/daftar_seminar');
    }
    if ($data['nama_mahasiswa'] == null) {
      $this->session->set_flashdata('warning', 'Silahkan isi nama mahasiswa');
      redirect('admin/daftar_seminar');
    }
    if ($data['prodi'] == 'ti') {
    } else if ($data['prodi'] == 'si') {
    } else {
      $this->session->set_flashdata('warning', 'Silahkan pilih prodi');
      redirect('admin/daftar_seminar');
    }
    if ($data['tanggal'] == null) {
      $this->session->set_flashdata('warning', 'Silahkan isi tanggal seminar');
      redirect('admin/daftar_seminar');
    }
    if ($data['jam'] == null) {
      $this->session->set_flashdata('warning', 'Silahkan isi jam seminar');
      redirect('admin/daftar_seminar');
    }
    if ($data['lokasi'] == null) {
      $this->session->set_flashdata('warning', 'Silahkan isi ruangan');
      redirect('admin/daftar_seminar');
    }
    if ($data['judul'] == null) {
      $this->session->set_flashdata('warning', 'Silahkan isi judul');
      redirect('admin/daftar_seminar');
    }
    if ($data['kategori_seminar_id'] == null) {
      $this->session->set_flashdata('warning', 'Silahkan pilih kategori seminar');
      redirect('admin/daftar_seminar');
    }
    if ($data['pembimbing_id'] == null) {
      $this->session->set_flashdata('warning', 'Silahkan pilih pembimbing');
      redirect('admin/daftar_seminar');
    }
    if ($data['penguji1_id'] == null) {
      $this->session->set_flashdata('warning', 'Silahkan pilih penguji1');
      redirect('admin/daftar_seminar');
    }
    if ($data['penguji2_id'] == null) {
      $this->session->set_flashdata('warning', 'Silahkan pilih penguji2');
      redirect('admin/daftar_seminar');
    }

    $this->load->model('M_data');
    $save = $this->M_data->save_seminar($data);
    if ($save) {
      $this->session->set_flashdata('info', 'Berhasil membuat seminar');
    } else {
      $this->session->set_flashdata('warning', 'Gagal membuat seminar');
    }

    redirect('admin/daftar_seminar');
  }

  public function edit_seminar()
  {
    $data = array(
      'id' => $this->input->post('id'),
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
      redirect('admin/daftar_seminar');
    }
    if ($data['nama_mahasiswa'] == null) {
      $this->session->set_flashdata('warning', 'Silahkan isi nama mahasiswa');
      redirect('admin/daftar_seminar');
    }
    if ($data['prodi'] == 'ti') {
    } else if ($data['prodi'] == 'si') {
    } else {
      $this->session->set_flashdata('warning', 'Silahkan pilih prodi');
      redirect('admin/daftar_seminar');
    }
    if ($data['tanggal'] == null) {
      $this->session->set_flashdata('warning', 'Silahkan isi tanggal seminar');
      redirect('admin/daftar_seminar');
    }
    if ($data['jam'] == null) {
      $this->session->set_flashdata('warning', 'Silahkan isi jam seminar');
      redirect('admin/daftar_seminar');
    }
    if ($data['lokasi'] == null) {
      $this->session->set_flashdata('warning', 'Silahkan isi ruangan');
      redirect('admin/daftar_seminar');
    }
    if ($data['judul'] == null) {
      $this->session->set_flashdata('warning', 'Silahkan isi judul');
      redirect('admin/daftar_seminar');
    }
    if ($data['kategori_seminar_id'] == null) {
      $this->session->set_flashdata('warning', 'Silahkan pilih kategori seminar');
      redirect('admin/daftar_seminar');
    }
    if ($data['pembimbing_id'] == null) {
      $this->session->set_flashdata('warning', 'Silahkan pilih pembimbing');
      redirect('admin/daftar_seminar');
    }
    if ($data['penguji1_id'] == null) {
      $this->session->set_flashdata('warning', 'Silahkan pilih penguji1');
      redirect('admin/daftar_seminar');
    }
    if ($data['penguji2_id'] == null) {
      $this->session->set_flashdata('warning', 'Silahkan pilih penguji2');
      redirect('admin/daftar_seminar');
    }

    $this->load->model('M_data');
    $edit = $this->M_data->edit_seminar($data);
    if ($edit) {
      $this->session->set_flashdata('info', 'Berhasil mengubah seminar');
    } else {
      $this->session->set_flashdata('warning', 'Gagal mengubah seminar');
    }

    redirect('admin/daftar_seminar');
  }

  public function del_seminar()
  {
    $id = $this->input->post('id');
    $this->load->model('M_data');
    $delete = $this->M_data->del_seminar($id);
    if ($delete) {
      $this->session->set_flashdata('info', 'Berhasil menghapus seminar');
    } else {
      $this->session->set_flashdata('warning', 'Gagal menghapus seminar');
    }

    redirect('admin/daftar_seminar');
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
