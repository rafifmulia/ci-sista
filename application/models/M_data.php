<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_data extends CI_Model
{

  public function is_email_used($email)
  {
    if ($email) {
      $sql = "SELECT * FROM user WHERE email = '$email' ";
      $query = $this->db->query($sql);
      $result = $query->row_array();
      return ($query->num_rows() === 1 ? true : false);
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

  public function get_dosen()
  {
    $query = $this->db->get('dosen');
    
    return $query->result_array();
  }

  public function get_kategori_seminar()
  {
    $query = $this->db->get('kategori_seminar');
    
    return $query->result_array();
  }

  public function get_seminar()
  {
    $query = $this->db->select('s.id,s.nim,s.nama_mahasiswa,s.tanggal,s.jam,s.lokasi,cat.nama as kategori_seminar');
    $query->select('(SELECT SUM(p.id) FROM peserta_seminar as p WHERE p.seminar_id=id) AS total_peserta');
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
    $query->select('(SELECT SUM(p.id) FROM peserta_seminar as p WHERE p.seminar_id=id) AS total_peserta');
    $query->from('seminar_ta as s');
    $query->join('kategori_seminar as cat', 's.kategori_seminar_id = cat.id');
    $query->where(['s.id' => $id]);
    $query->limit(1);
    $exec = $query->get();
    
    return $exec->result();
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

}