<?php

class C_sewa_lapangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nama') && !$this->session->userdata('user')) {
            $this->session->set_flashdata('msg', danger('Anda Harus Login Terlebih Dahulu!!!'));
            redirect('admin/C_login');
        }
        $this->load->model('admin/M_sewa_lapangan', 'ms');
        $this->load->model('admin/M_jadwal', 'mj');
    }

    public function index()
    {
        $d['datasewa']   = $this->ms->get_data_sewa();
        $tempelate = array(
            'mn_sewa_lapangan' => 'active',
            'judul' => 'Data Sewa Lapangan',
            'konten' => $this->load->view('admin/V_sewa_lapangan', $d, true)
        );
        $this->parser->parse('admin/template/V_home_admin', $tempelate);
    }

    public function konfirmasi()
    {
        $this->mj->konfirmasi();
        $this->session->set_flashdata('msg', success('Penyewaan berhasil Dikonfirmasi.'));
        redirect('admin/C_sewa_lapangan');
    }

    public function detail_sewa()
    {
        $kode             = $this->uri->segment(4);
        $x['ambildata']   = $this->ms->get_data($kode);
        $x['ambildetail']   = $this->ms->get_detail_sewa($kode);
        $tempelate        = array(
            'mn_sewa_lapangan' => 'active',
            'judul' => 'Detail Sewa Lapangan',
            'konten' => $this->load->view('admin/V_detail_penyewa', $x, true)
        );
        $this->parser->parse('admin/template/V_home_admin', $tempelate);
    }
}
