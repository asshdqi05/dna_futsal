<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_user extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nama') && !$this->session->userdata('user')) {
            $this->session->set_flashdata('msg', danger('Anda Harus Login Terlebih Dahulu!!!'));
            redirect('admin/C_login');
        }
        $this->load->library('upload');
        $this->load->model('admin/M_user', 'mu');

        //Do your magic here
    }

    public function index()
    {
        $d['datauser']   = $this->mu->get_data();
        $d['datalevel']   = $this->mu->get_level();
        $tempelate = array(
            'mn_user' => 'active',
            'judul' => 'Data User',
            'konten' => $this->load->view('admin/V_user', $d, true)
        );
        $this->parser->parse('admin/template/V_home_admin', $tempelate);
    }

    public function add()
    {
        $this->mu->save();
        $this->session->set_flashdata('msg', success('Data berhasil disimpan.'));
        redirect('admin/C_user');
    }

    public function edit()
    {
        $this->mu->update();
        $this->session->set_flashdata('msg', success('Data berhasil diupdate.'));
        redirect('admin/C_user');
    }

    public function delete()
    {
        $id = $this->input->post('kode');
        if (!$this->mu->delete($id)) {
            $this->session->set_flashdata('msg', danger('Data gagal dihapus.'));
        } else {
            $this->session->set_flashdata('msg', info('Data berhasil dihapus.'));
        }
        redirect('admin/C_user');
    }
}
        
    /* End of file  C_user.php */
