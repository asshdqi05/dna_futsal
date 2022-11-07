<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_home_front extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/M_jadwal', 'jd');
    }

    public function index()
    {
        $d['d'] = $this->jd->tampil_jadwal();
        $d['tgla'] = $this->jd->tgla();
        $d['tglb'] = $this->jd->tglb();
        $tempelate = array(
            'jadwal' => $this->load->view('front/V_jadwal', $d, true),
        );
        $this->parser->parse('front/V_homefront', $tempelate);
    }
}
