<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/M_login', 'l');
        $this->load->library('form_validation', 'session');
    }

    function index()
    {
        $this->load->view('admin/V_login');
    }

    function masuk()
    {
        $user    = strip_tags(str_replace("'", "", $this->input->post('un', true)));
        $pass    = strip_tags(str_replace("'", "", $this->input->post('ps', true)));
        $cekakun = $this->l->in($user, $pass);
        if (strlen($user) == '' || strlen($pass) == '') {
            $this->session->set_flashdata('msg', danger('Username Atau Password anda Tidak Boleh kosong!!'));

            redirect('admin/C_login');
        } else {
            if ($cekakun->num_rows() > 0) {
                $rcekuser = $cekakun->row_array();
                $this->session->set_userdata('masuk', true);
                $this->session->set_userdata('status_login', 'oke');
                $this->session->set_userdata('nama', $rcekuser['nama_user']);
                $this->session->set_userdata('user', $rcekuser['username_user']);
                $this->session->set_userdata('password', $rcekuser['password_user']);
                $this->session->set_userdata('level', $rcekuser['level']);
                $this->session->set_userdata('level_akses', $rcekuser['level_user']);
            } else {
                $this->session->set_userdata('masuk', false);
            }
            if ($this->session->userdata('masuk') == true) {
                $user = $this->session->userdata('user');
                redirect('C_home_admin');
            } else {
                $this->session->set_flashdata('msg', Danger('Username Atau Password Salah!!!'));

                redirect('admin/C_login');
            }
        }
    }


    function logout()
    {
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('level');
        redirect('admin/C_login');
    }
}
        
    /* End of file  C_login.php */
