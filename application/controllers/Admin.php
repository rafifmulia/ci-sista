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

  public function profile()
  {
    $data = [
      'profile' => $this->M_data->detail_user($this->session->userdata('id_user')),
    ];

    $this->template->ex_js('admin/ex_js/profile', $data);

    $this->template->view('admin/profile', $data);
  }

  public function change_profile()
  {
    $data = array(
      'id_user' => $this->session->userdata('id_user'),
    );

    if ($this->input->post('password') != '') {
      if ($this->input->post('password2') == '') {
        $this->session->set_flashdata('warning', 'Konfirmasi Password tidak boleh kosong');
        redirect('admin/profile');
      } else if ($this->input->post('password2') != $this->input->post('password')) {
        $this->session->set_flashdata('warning', 'Konfirmasi Password tidak sama');
        redirect('admin/profile');
      }
      $data['password'] = md5($this->input->post('password'));
    }

    // die(var_dump($_FILES['avatar']));
    if ($_FILES['avatar']['size'] != 0) {
      $config['upload_path'] = './assets/img/uploads';
      $config['allowed_types'] = 'jpg|png|jpeg';
      $config['max_size']     = '100';

      $this->load->library('upload', $config);
      if ($this->upload->do_upload('avatar')) {
        die(var_dump($this->upload->display_errors()));
      } else {
        die(var_dump($this->upload->data()));
        $data['avatar'] = null;
      }
    }

    if (count($data) == 1) {
      $this->session->set_flashdata('info', 'Tidak ada data yang dirubah');
      redirect('admin/profile');
    }

    $change = $this->M_data->edit_user($data);
    if ($change) {
      $this->session->set_flashdata('info', 'Berhasil merubah profile');
    } else {
      $this->session->set_flashdata('warning', 'Gagal merubah profile');
    }

    redirect('admin/profile');
  }

  public function daftar_seminar()
  {
    $data = [
      'get_dosen' => $this->M_data->get_active_dosen(),
      'get_kategori_seminar' => $this->M_data->get_active_kategori_seminar(),
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
    if ($data['kategori_seminar_id'] == 0) {
      $this->session->set_flashdata('warning', 'Silahkan pilih kategori seminar');
      redirect('admin/daftar_seminar');
    }
    if ($data['pembimbing_id'] == 0) {
      $this->session->set_flashdata('warning', 'Silahkan pilih pembimbing');
      redirect('admin/daftar_seminar');
    }
    if ($data['penguji1_id'] == 0) {
      $this->session->set_flashdata('warning', 'Silahkan pilih penguji1');
      redirect('admin/daftar_seminar');
    }
    if ($data['penguji2_id'] == 0) {
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
    if ($data['kategori_seminar_id'] == 0) {
      $this->session->set_flashdata('warning', 'Silahkan pilih kategori seminar');
      redirect('admin/daftar_seminar');
    }
    if ($data['pembimbing_id'] == 0) {
      $this->session->set_flashdata('warning', 'Silahkan pilih pembimbing');
      redirect('admin/daftar_seminar');
    }
    if ($data['penguji1_id'] == 0) {
      $this->session->set_flashdata('warning', 'Silahkan pilih penguji1');
      redirect('admin/daftar_seminar');
    }
    if ($data['penguji2_id'] == 0) {
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
    $id = $this->input->get('id');

    $data = [
      'seminar_id' => $id,
      'detail_seminar' => $this->M_data->detail_seminar($id),
      'daftar_peserta' => $this->M_data->get_peserta($id),
    ];

    if (count($data['detail_seminar']) < 1) {
      $this->load->view('errors/html/error_general', ['heading' => 'Kamu jahil!', 'message' => '<p>Jangan diubah-ubah ya :)</p>']);
      return false;
    }

    $this->template->ex_js('admin/ex_js/daftar_peserta');

    $this->template->view('admin/daftar_peserta', $data);
  }

  public function detail_peserta()
  {
    header('Content-Type: application/json');

    $id = $this->input->get('id');
    $data = $this->M_data->detail_peserta($id);

    if (count($data) < 1) {
      echo json_encode([
        'meta' => [
          'code' => 400,
          'message' => 'Fail get detail peserta',
        ]
      ]);
      return true;
    }

    echo json_encode([
      'meta' => [
        'code' => 200,
        'message' => 'Success get detail peserta',
      ],
      'data' => $data[0]
    ]);
    return true;
  }

  public function edit_peserta()
  {
    $data = array(
      'id' => $this->input->post('id'),
      'status' => ($this->input->post('status') == 'acc') ? 'acc' : 'reject',
    );

    $peserta = $this->M_data->detail_peserta($data['id']);

    $this->load->model('M_data');
    $reg = $this->M_data->edit_peserta($data);
    if ($reg) {
      $this->session->set_flashdata('info', 'Berhasil merubah peserta');
    } else {
      $this->session->set_flashdata('warning', 'Gagal merubah peserta');
    }

    redirect('admin/daftar_peserta?id=' . $peserta[0]['seminar_id']);
  }

  public function del_peserta()
  {
    $id = $this->input->post('id');
    $this->load->model('M_data');
    $delete = $this->M_data->del_peserta($id);
    if ($delete) {
      $this->session->set_flashdata('info', 'Berhasil menghapus peserta');
    } else {
      $this->session->set_flashdata('warning', 'Gagal menghapus peserta');
    }

    redirect('admin/daftar_peserta');
  }

  public function daftar_user()
  {
    $data = [
      'get_user' => $this->M_data->get_user(),
    ];

    $this->template->ex_js('admin/ex_js/daftar_user');

    $this->template->view('admin/daftar_user', $data);
  }

  public function detail_user()
  {
    header('Content-Type: application/json');

    $id = $this->input->get('id');
    $data = $this->M_data->detail_user($id);

    if (count($data) < 1) {
      echo json_encode([
        'meta' => [
          'code' => 400,
          'message' => 'Fail get detail user',
        ]
      ]);
      return true;
    }

    echo json_encode([
      'meta' => [
        'code' => 200,
        'message' => 'Success get detail user',
      ],
      'data' => $data[0]
    ]);
    return true;
  }

  public function save_user()
  {
    $password2 = $this->input->post('password2');

    $data = array(
      'username' => $this->input->post('username'),
      'email' => $this->input->post('email'),
      'password' => md5($this->input->post('password')),
      'lvl' =>  'user',
    );

    $this->load->model('M_data');
    if ($this->input->post('username') == '') {
      $this->session->set_flashdata('warning', 'Username tidak boleh kosong');
    } else if ($this->input->post('email') == '') {
      $this->session->set_flashdata('warning', 'Email tidak boleh kosong');
    } else if ($this->input->post('password') == '') {
      $this->session->set_flashdata('warning', 'Password tidak boleh kosong');
    } else if ($this->input->post('password2') == '') {
      $this->session->set_flashdata('warning', 'Konfirmasi Password tidak boleh kosong');
    } else if ($this->input->post('password') == $password2) {
      $check = $this->M_data->is_email_used($data['email']);
      if ($check) {
        $this->session->set_flashdata('warning', 'Email sudah digunakan');
      } else {

        $reg = $this->M_data->save_register($data);
        if ($reg) {
          $this->session->set_flashdata('info', 'Akun kamu berhasil dibuat');
        } else {
          $this->session->set_flashdata('warning', 'Gagal membuat akun');
        }
      }
    } else {
      $this->session->set_flashdata('warning', 'Password tidak sama');
    }

    redirect('admin/daftar_user');
  }

  public function edit_user()
  {
    $data = array(
      'id_user' => $this->input->post('id'),
      'status' => ($this->input->post('status') == 'on') ? 'active' : 'not',
    );

    $this->load->model('M_data');
    $reg = $this->M_data->edit_user($data);
    if ($reg) {
      $this->session->set_flashdata('info', 'Berhasil merubah akun');
    } else {
      $this->session->set_flashdata('warning', 'Gagal merubah akun');
    }

    redirect('admin/daftar_user');
  }

  public function del_user()
  {
    $id = $this->input->post('id');
    $this->load->model('M_data');
    $delete = $this->M_data->del_user($id);
    if ($delete) {
      $this->session->set_flashdata('info', 'Berhasil menghapus user');
    } else {
      $this->session->set_flashdata('warning', 'Gagal menghapus user');
    }

    redirect('admin/daftar_user');
  }

  public function verify_user()
  {
    $data = [
      'user' => $this->M_data->get_user_not_verif(),
    ];

    $this->template->ex_js('admin/ex_js/verify_user');

    $this->template->view('admin/verify_user', $data);
  }

  public function act_verify_user()
  {
    $data = array(
      'id_user' => $this->input->post('id'),
      'is_verif' => ($this->input->post('verify') == 'on') ? 'yes' : 'not',
    );

    $this->load->model('M_data');
    $reg = $this->M_data->edit_user($data);
    if ($reg) {
      $this->session->set_flashdata('info', 'Berhasil memverifikasi user');
    } else {
      $this->session->set_flashdata('warning', 'Gagal memverifikasi user');
    }

    redirect('admin/verify_user');
  }

  public function daftar_dosen()
  {
    $data = [
      'dosen' => $this->M_data->get_dosen(),
    ];

    $this->template->ex_js('admin/ex_js/daftar_dosen');

    $this->template->view('admin/daftar_dosen', $data);
  }

  public function detail_dosen()
  {
    header('Content-Type: application/json');

    $id = $this->input->get('id');
    $data = $this->M_data->detail_dosen($id);

    if (count($data) < 1) {
      echo json_encode([
        'meta' => [
          'code' => 400,
          'message' => 'Fail get detail dosen',
        ]
      ]);
      return true;
    }

    echo json_encode([
      'meta' => [
        'code' => 200,
        'message' => 'Success get detail dosen',
      ],
      'data' => $data[0]
    ]);
    return true;
  }

  public function save_dosen()
  {
    $data = array(
      'nidn' => $this->input->post('nidn'),
      'nama' => $this->input->post('nama'),
      'is_active' => ($this->input->post('status') == 'on') ? 'yes' : 'not',
    );

    $this->load->model('M_data');
    if ($this->input->post('nidn') == '') {
      $this->session->set_flashdata('warning', 'NIDN tidak boleh kosong');
    } else if ($this->input->post('nama') == '') {
      $this->session->set_flashdata('warning', 'Nama tidak boleh kosong');
    }

    $check = $this->M_data->is_nidn_used($data['nidn']);
    if ($check) {
      $this->session->set_flashdata('warning', 'NIDN sudah digunakan');
    } else {
      $save = $this->M_data->save_dosen($data);
      if ($save) {
        $this->session->set_flashdata('info', 'Berhasil menambahkan dosen baru');
      } else {
        $this->session->set_flashdata('warning', 'Gagal menambahkan dosen baru');
      }
    }

    redirect('admin/daftar_dosen');
  }

  public function edit_dosen()
  {
    $data = array(
      'id' => $this->input->post('id'),
      'is_active' => ($this->input->post('is_active') == 'on') ? 'yes' : 'not',
    );

    $this->load->model('M_data');
    $reg = $this->M_data->edit_dosen($data);
    if ($reg) {
      $this->session->set_flashdata('info', 'Berhasil merubah dosen');
    } else {
      $this->session->set_flashdata('warning', 'Gagal merubah dosen');
    }

    redirect('admin/daftar_dosen');
  }

  public function del_dosen()
  {
    $id = $this->input->post('id');
    $this->load->model('M_data');
    $delete = $this->M_data->del_dosen($id);
    if ($delete) {
      $this->session->set_flashdata('info', 'Berhasil menghapus dosen');
    } else {
      $this->session->set_flashdata('warning', 'Gagal menghapus dosen');
    }

    redirect('admin/daftar_dosen');
  }

  public function daftar_kategori_seminar()
  {
    $data = [
      'kategori' => $this->M_data->get_kategori_seminar(),
    ];

    $this->template->ex_js('admin/ex_js/daftar_kategori_seminar');

    $this->template->view('admin/daftar_kategori_seminar', $data);
  }

  public function detail_kategori_seminar()
  {
    header('Content-Type: application/json');

    $id = $this->input->get('id');
    $data = $this->M_data->detail_kategori_seminar($id);

    if (count($data) < 1) {
      echo json_encode([
        'meta' => [
          'code' => 400,
          'message' => 'Fail get detail kategori seminar',
        ]
      ]);
      return true;
    }

    echo json_encode([
      'meta' => [
        'code' => 200,
        'message' => 'Success get detail kategori seminar',
      ],
      'data' => $data[0]
    ]);
    return true;
  }

  public function save_kategori_seminar()
  {
    $data = array(
      'nama' => $this->input->post('nama'),
      'is_active' => ($this->input->post('is_active') == 'on') ? 'yes' : 'not',
    );

    $this->load->model('M_data');
    if ($this->input->post('nama') == '') {
      $this->session->set_flashdata('warning', 'Nama tidak boleh kosong');
    }

    $save = $this->M_data->save_kategori_seminar($data);
    if ($save) {
      $this->session->set_flashdata('info', 'Berhasil menambahkan kategori baru');
    } else {
      $this->session->set_flashdata('warning', 'Gagal menambahkan kategori baru');
    }

    redirect('admin/daftar_kategori_seminar');
  }

  public function edit_kategori_seminar()
  {
    $data = array(
      'id' => $this->input->post('id'),
      'nama' => $this->input->post('nama'),
      'is_active' => ($this->input->post('is_active') == 'on') ? 'yes' : 'not',
    );

    $this->load->model('M_data');
    $reg = $this->M_data->edit_kategori_seminar($data);
    if ($reg) {
      $this->session->set_flashdata('info', 'Berhasil merubah kategori');
    } else {
      $this->session->set_flashdata('warning', 'Gagal merubah kategori');
    }

    redirect('admin/daftar_kategori_seminar');
  }

  public function del_kategori_seminar()
  {
    $id = $this->input->post('id');
    $this->load->model('M_data');
    $delete = $this->M_data->del_kategori_seminar($id);
    if ($delete) {
      $this->session->set_flashdata('info', 'Berhasil menghapus kategori seminnar');
    } else {
      $this->session->set_flashdata('warning', 'Gagal menghapus kategori seminnar');
    }

    redirect('admin/daftar_kategori_seminar');
  }

  public function daftar_penilaian()
  {
    $data = [
      'penilaian' => $this->M_data->get_penilaian(),
    ];

    $this->template->ex_js('admin/ex_js/daftar_penilaian');

    $this->template->view('admin/daftar_penilaian', $data);
  }

  public function detail_penilaian()
  {
    header('Content-Type: application/json');

    $id = $this->input->get('id');
    $data = $this->M_data->detail_penilaian($id);

    if (count($data) < 1) {
      echo json_encode([
        'meta' => [
          'code' => 400,
          'message' => 'Fail get detail penilaian',
        ]
      ]);
      return true;
    }

    echo json_encode([
      'meta' => [
        'code' => 200,
        'message' => 'Success get detail penilaian',
      ],
      'data' => $data[0]
    ]);
    return true;
  }

  public function save_penilaian()
  {
    $data = array(
      'nama' => $this->input->post('nama'),
      'keterangan' => $this->input->post('keterangan'),
      'is_active' => ($this->input->post('is_active') == 'on') ? 'yes' : 'not',
    );

    $this->load->model('M_data');
    if ($this->input->post('nama') == '') {
      $this->session->set_flashdata('warning', 'Nama tidak boleh kosong');
    } else if ($this->input->post('keterangan') == '') {
      $this->session->set_flashdata('warning', 'Keterangan tidak boleh kosong');
    }

    $save = $this->M_data->save_penilaian($data);
    if ($save) {
      $this->session->set_flashdata('info', 'Berhasil menambahkan penilaian baru');
    } else {
      $this->session->set_flashdata('warning', 'Gagal menambahkan penilaian baru');
    }

    redirect('admin/daftar_penilaian');
  }

  public function edit_penilaian()
  {
    $data = array(
      'id' => $this->input->post('id'),
      'nama' => $this->input->post('nama'),
      'keterangan' => $this->input->post('keterangan'),
      'is_active' => ($this->input->post('is_active') == 'on') ? 'yes' : 'not',
    );

    $this->load->model('M_data');
    $reg = $this->M_data->edit_penilaian($data);
    if ($reg) {
      $this->session->set_flashdata('info', 'Berhasil merubah penilaian');
    } else {
      $this->session->set_flashdata('warning', 'Gagal merubah penilaian');
    }

    redirect('admin/daftar_penilaian');
  }

  public function del_penilaian()
  {
    $id = $this->input->post('id');
    $this->load->model('M_data');
    $delete = $this->M_data->del_penilaian($id);
    if ($delete) {
      $this->session->set_flashdata('info', 'Berhasil menghapus penilaian');
    } else {
      $this->session->set_flashdata('warning', 'Gagal menghapus penilaian');
    }

    redirect('admin/daftar_penilaian');
  }
}
