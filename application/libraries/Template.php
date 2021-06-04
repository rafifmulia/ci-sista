<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Template
{

  protected $load;
  private $template;
  private $type;

  public function __construct($params)
  {
    $this->load = $params['load'];
  }

  public function landing()
  {
    $template = [];

    $template['head'] = $this->load->view('landing/template/head', '', TRUE);
    $template['loader'] = $this->load->view('landing/template/loader', '', TRUE);
    $template['nav_top'] = $this->load->view('landing/template/nav_top', '', TRUE);
    $template['js'] = $this->load->view('landing/template/js', '', TRUE);

    $this->template = $template;
    $this->type = 'landing';
  }

  public function auth()
  {
    $template = [];

    $template['head'] = $this->load->view('auth/template/head', '', TRUE);
    $template['js'] = $this->load->view('auth/template/js', '', TRUE);

    $this->template = $template;
    $this->type = 'auth';
  }

  public function admin()
  {
    $template = [];

    $template['head'] = $this->load->view('admin/template/head', '', TRUE);
    $template['sidebar'] = $this->load->view('admin/template/sidebar', '', TRUE);
    $template['topbar'] = $this->load->view('admin/template/topbar', '', TRUE);
    $template['modal'] = $this->load->view('admin/template/modal', '', TRUE);
    $template['footer'] = $this->load->view('admin/template/footer', '', TRUE);
    $template['js'] = $this->load->view('admin/template/js', '', TRUE);

    $this->template = $template;
    $this->type = 'admin';
  }

  public function ex_css($view, $data = [])
  {
    $this->template['ex_css'] = $this->load->view($view, $data, TRUE);
  }

  public function ex_js($view, $data = [])
  {
    $this->template['ex_js'] = $this->load->view($view, $data, TRUE);
  }

  public function view($view, $data)
  {
    $this->template['content'] = $this->load->view($view, $data, TRUE);

    if ($this->type == 'landing') {
      return $this->load->view('landing/template/index', $this->template);
    } else if ($this->type == 'auth') {
      return $this->load->view('auth/template/index', $this->template);
    } else if ($this->type == 'admin') {
      return $this->load->view('admin/template/index', $this->template);
    } else {
      return $this->load->view('errors/html/error_404', [
        'heading' => 'Jenis template tidak tersedia',
        'message' => '<p>Jenis template yang tersedia saat ini adalah landing</p>'
      ]);
    }
  }

}
