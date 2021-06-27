<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_data extends CI_Model
{

  public function check_login($email, $password)
  {
    if ($email && $password) {
      $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password' ";
      $query = $this->db->query($sql);
      $result = $query->row_array();
      return ($query->num_rows() === 1 ? $result['id_user'] : false);
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

  public function get_pembimbing()
  {
    $query = $this->db->get('dosen');
    
    return $query->result_array();
  }

  public function get_kategori_seminar()
  {
    $query = $this->db->get('kategori_seminar');
    
    return $query->result_array();
  }

}