<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_home_admin extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('nama') && !$this->session->userdata('user')) {
      $this->session->set_flashdata('msg', danger('Anda Harus Login Terlebih Dahulu!!!'));
      redirect('admin/C_login');
    }
  }

  public function index()
  {
    $tempelate = array(
      'mn_home' => 'active',
      'judul' => 'Home Admin',
      'konten' => $this->load->view('admin/template/V_beranda', '', true)
    );
    $this->parser->parse('admin/template/V_home_admin', $tempelate);
  }
}
        
    /* End of file  C_home_admin.php */
