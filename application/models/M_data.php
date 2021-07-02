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

  public function save_seminar($data)
  {
    return $this->db->insert('seminar_ta', $data);
  }

  public function del_seminar($id)
  {
    return $this->db->delete('seminar_ta', ['id' => $id]);
  }

}