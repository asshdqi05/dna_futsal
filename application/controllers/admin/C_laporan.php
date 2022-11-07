<?php

class C_laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nama') && !$this->session->userdata('user')) {
            $this->session->set_flashdata('msg', danger('Anda Harus Login Terlebih Dahulu!!!'));
            redirect('admin/C_login');
        }
        $this->load->model('admin/M_laporan', 'ml');
    }

    public function index()
    {

        $tempelate = array(
            'mn_laporan' => 'active',
            'judul' => 'Laporan',
            'konten' => $this->load->view('admin/V_laporan', '', true)
        );
        $this->parser->parse('admin/template/V_home_admin', $tempelate);
    }

    public function cetak_member()
    {
        $data['data'] = $this->ml->member();
        $this->load->view('admin/laporan/V_laporan_member', $data);
    }

    public function cetak_penyewaan_perhari()
    {
        $tgl = $this->input->post('tanggal', true);
        $tanggal    = date("Y-m-d", strtotime($tgl));
        $data['tanggal'] = $tanggal;
        $data['data'] = $this->ml->penyewaan_perhari($tanggal);
        $this->load->view('admin/laporan/V_laporan_penyewaan_perhari', $data);
    }

    public function cetak_penyewaan_perbulan()
    {
        $bulan = $this->input->post('bulan', true);
        $tahun = $this->input->post('tahun', true);
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['data'] = $this->ml->penyewaan_perbulan($bulan, $tahun);
        $this->load->view('admin/laporan/V_laporan_penyewaan_perbulan', $data);
    }

    public function cetak_pemakaian_lapangan()
    {
        $data['data'] = $this->ml->pemakaian_lapangan();
        $this->load->view('admin/laporan/V_laporan_pemakaian_lapangan', $data);
    }
}
