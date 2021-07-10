<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_data extends CI_Model
{

  // user
  public function is_email_used($email)
  {
    if ($email) {
      $sql = "SELECT * FROM user WHERE email = '$email' ";
      $query = $this->db->query($sql);
      $result = $query->row_array();
      return ($query->num_rows() > 0 ? true : false);
    } else {
      return false;
    }
  }

  public function check_login($email, $password)
  {
    if ($email && $password) {
      $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password' ";
      $query = $this->db->query($sql);
      $result = $query->row_array();
      return ($query->num_rows() === 1 ? $result : false);
    } else {
      return false;
    }
  }

  public function save_register($data)
  {
    return $this->db->insert('user', $data);
  }

  public function check_user($id_user)
  {
    $sql = "SELECT * FROM user WHERE id_user = '$id_user'";
    $query = $this->db->query($sql);

    return $query->result_array();
  }

  public function get_user()
  {
    $query = $this->db->where('lvl', 'user')->where('is_verif', 'yes')->get('user');

    return $query->result_array();
  }

  public function get_user_not_verif()
  {
    $query = $this->db->where('lvl', 'user')->where('is_verif', 'not')->get('user');

    return $query->result_array();
  }

  public function count_user_verif()
  {
    $query = $this->db->select('COUNT(u.id_user) as count')->from('user as u')->where('u.is_verif', 'yes')->get();
    return $query->result_array()[0]['count'];
  }

  public function count_user_notverif()
  {
    $query = $this->db->select('COUNT(u.id_user) as count')->from('user as u')->where('u.is_verif', 'not')->get();
    return $query->result_array()[0]['count'];
  }

  public function detail_user($id)
  {
    $query = $this->db->where('id_user', $id)->limit(1)->get('user');

    return $query->result_array();
  }

  public function edit_user($data)
  {
    $query = $this->db->where('id_user', $data['id_user']);
    return $query->update('user', $data);
  }

  public function del_user($id)
  {
    return $this->db->delete('user', ['id_user' => $id]);
  }

  // dosen
  public function get_dosen()
  {
    $query = $this->db->where('deleted_at', null)->get('dosen');

    return $query->result_array();
  }

  public function get_active_dosen()
  {
    $query = $this->db->where('deleted_at', null)->where('is_active', 'yes')->get('dosen');

    return $query->result_array();
  }

  public function count_dosen_total()
  {
    $query = $this->db->select('COUNT(d.id) as count')->from('dosen as d')->get();
    return $query->result_array()[0]['count'];
  }

  public function detail_dosen($id)
  {
    $query = $this->db->where('id', $id)->limit(1)->get('dosen');

    return $query->result_array();
  }

  public function is_nidn_used($nidn)
  {
    if ($nidn) {
      $sql = "SELECT * FROM dosen WHERE nidn = '$nidn' ";
      $query = $this->db->query($sql);
      $result = $query->row_array();
      return ($query->num_rows() > 0 ? true : false);
    } else {
      return false;
    }
  }

  public function save_dosen($data)
  {
    return $this->db->insert('dosen', $data);
  }

  public function edit_dosen($data)
  {
    $query = $this->db->where('id', $data['id']);
    return $query->update('dosen', $data);
  }

  public function del_dosen($id)
  {
    $query = $this->db->where('id', $id);
    return $query->update('dosen', ['deleted_at' => date('Y-m-d H:i:s')]);
  }

  // kategori seminar
  public function get_kategori_seminar()
  {
    $query = $this->db->where('deleted_at', null)->get('kategori_seminar');

    return $query->result_array();
  }

  public function get_active_kategori_seminar()
  {
    $query = $this->db->where('deleted_at', null)->where('is_active', 'yes')->get('kategori_seminar');

    return $query->result_array();
  }

  public function detail_kategori_seminar($id)
  {
    $query = $this->db->where('id', $id)->limit(1)->get('kategori_seminar');

    return $query->result_array();
  }

  public function save_kategori_seminar($data)
  {
    return $this->db->insert('kategori_seminar', $data);
  }

  public function edit_kategori_seminar($data)
  {
    $query = $this->db->where('id', $data['id']);
    return $query->update('kategori_seminar', $data);
  }

  public function del_kategori_seminar($id)
  {
    $query = $this->db->where('id', $id);
    return $query->update('kategori_seminar', ['deleted_at' => date('Y-m-d H:i:s')]);
  }

  // daftar seminar
  public function get_seminar()
  {
    $query = $this->db->select('s.id,s.nim,s.nama_mahasiswa,s.tanggal,s.jam,s.lokasi,cat.nama as kategori_seminar');
    $query->select('(SELECT COUNT(p.id) FROM peserta_seminar as p WHERE p.seminar_id=s.id) AS total_peserta');
    $query->from('seminar_ta as s');
    $query->join('kategori_seminar as cat', 's.kategori_seminar_id = cat.id');
    $exec = $query->get();

    return $exec->result(); 
  }

  public function detail_seminar($id)
  {
    $query = $this->db->select('s.id,s.nim,s.nama_mahasiswa,s.prodi,s.semester,
    s.kategori_seminar_id,s.judul,cat.nama as kategori_seminar,s.tanggal,s.jam,s.lokasi,
    s.pembimbing_id,s.penguji1_id,s.penguji2_id,s.nilai_pembimbing,s.nilai_penguji1,s.nilai_penguji2,s.nilai_akhir
    ');
    $query->select('(SELECT COUNT(p.id) FROM peserta_seminar as p WHERE p.seminar_id=s.id) AS total_peserta');
    $query->select('(SELECT d.nama FROM dosen as d WHERE d.id=s.pembimbing_id) AS nama_pembimbing');
    $query->select('(SELECT d.nama FROM dosen as d WHERE d.id=s.penguji1_id) AS nama_penguji1');
    $query->select('(SELECT d.nama FROM dosen as d WHERE d.id=s.penguji2_id) AS nama_penguji2');
    $query->from('seminar_ta as s');
    $query->join('kategori_seminar as cat', 's.kategori_seminar_id = cat.id');
    $query->where(['s.id' => $id]);
    $query->limit(1);
    $exec = $query->get();

    return $exec->result();
  }

  public function count_seminar_schedule()
  {
    $query = $this->db->select('COUNT(s.id) as count')->from('seminar_ta as s')->where('s.tanggal >', date('Y-m-d'))->get();
    return $query->result_array()[0]['count'];
  }

  public function count_seminar_today()
  {
    $query = $this->db->select('COUNT(s.id) as count')->from('seminar_ta as s')->where('s.tanggal =', date('Y-m-d'))->get();
    return $query->result_array()[0]['count'];
  }

  public function count_seminar_finish()
  {
    $query = $this->db->select('COUNT(s.id) as count')->from('seminar_ta as s')->where('s.tanggal <', date('Y-m-d'))->get();
    return $query->result_array()[0]['count'];
  }

  public function count_seminar_total()
  {
    $query = $this->db->select('COUNT(s.id) as count')->from('seminar_ta as s')->get();
    return $query->result_array()[0]['count'];
  }

  public function save_seminar($data)
  {
    return $this->db->insert('seminar_ta', $data);
  }

  public function edit_seminar($data)
  {
    $query = $this->db->where('id', $data['id']);
    return $query->update('seminar_ta', $data);
  }

  public function del_seminar($id)
  {
    return $this->db->delete('seminar_ta', ['id' => $id]);
  }

  // penilaian
  public function get_penilaian()
  {
    $query = $this->db->where('deleted_at', null)->get('penilaian');

    return $query->result_array();
  }

  public function count_penilaian_total()
  {
    $query = $this->db->select('COUNT(p.id) as count')->from('penilaian as p')->get();
    return $query->result_array()[0]['count'];
  }

  public function detail_penilaian($id)
  {
    $query = $this->db->where('id', $id)->limit(1)->get('penilaian');

    return $query->result_array();
  }

  public function save_penilaian($data)
  {
    return $this->db->insert('penilaian', $data);
  }

  public function edit_penilaian($data)
  {
    $query = $this->db->where('id', $data['id']);
    return $query->update('penilaian', $data);
  }

  public function del_penilaian($id)
  {
    $query = $this->db->where('id', $id);
    return $query->update('penilaian', ['deleted_at' => date('Y-m-d H:i:s')]);
  }

  // peserta
  public function get_peserta($id)
  {
    $query = $this->db->where('seminar_id', $id);
    $exec = $query->get('peserta_seminar');

    return $exec->result(); 
  }

  public function save_peserta($data)
  {
    return $this->db->insert('peserta_seminar', $data);
  }

  public function check_peserta($seminar_id, $nim)
  {
    $sql = "SELECT * FROM peserta_seminar WHERE seminar_id = '$seminar_id' AND nim = '$nim'";
    $query = $this->db->query($sql);
    $result = $query->result_array();

    if (count($result) > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function detail_peserta($id)
  {
    $query = $this->db->where('id', $id)->limit(1)->get('peserta_seminar');

    return $query->result_array();
  }

  public function edit_peserta($data)
  {
    $query = $this->db->where('id', $data['id']);
    return $query->update('peserta_seminar', $data);
  }

  public function del_peserta($id)
  {
    return $this->db->delete('peserta_seminar', ['id' => $id]);
  }
}
