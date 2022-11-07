<?php

class C_penyewa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nama') && !$this->session->userdata('user')) {
            $this->session->set_flashdata('msg', danger('Anda Harus Login Terlebih Dahulu!!!'));
            redirect('admin/C_login');
        }
        $this->load->model('admin/M_penyewa', 'mp');
    }

    public function index()
    {
        $d['datapenyewa']   = $this->mp->get_data();
        $tempelate = array(
            'mn_penyewa' => 'active',
            'judul' => 'Data Penyewa',
            'konten' => $this->load->view('admin/V_penyewa', $d, true)
        );
        $this->parser->parse('admin/template/V_home_admin', $tempelate);
    }

    public function delete()
    {
        $id = $this->input->post('kode');
        if (!$this->mp->delete($id)) {
            $this->session->set_flashdata('msg', danger('Data gagal dihapus.'));
        } else {
            $this->session->set_flashdata('msg', info('Data berhasil dihapus.'));
        }
        redirect('admin/C_penyewa');
    }

    public function detail_penyewa()
    {
        $kode             = $this->uri->segment(4);
        $x['ambildata']   = $this->mp->get_detail($kode);
        $tempelate        = array(
            'mn_penyewa' => 'active',
            'judul' => 'Detail Penyewa',
            'konten' => $this->load->view('admin/V_detail_pen', $x, true)
        );
        $this->parser->parse('admin/template/V_home_admin', $tempelate);
    }
}
