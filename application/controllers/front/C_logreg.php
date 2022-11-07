<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_logreg extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('front/M_logreg', 'lr');
    }

    public function indexreg()
    {
        $this->load->view('front/penyewa/V_reg_penyewa');
    }

    public function indexlog()
    {
        $this->load->view('front/penyewa/V_login_penyewa');
    }

    public function login()
    {
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|trim',
            [
                'required' => 'Username Tidak Boleh kosong!!',
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim',
            [
                'required' => 'Password Tidak Boleh kosong!!',
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('front/penyewa/V_login_penyewa');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $penyewa = $this->db->get_where('penyewa', ['username_penyewa' => $username])->row_array();

        if ($penyewa) {
            if ($penyewa['aktif'] == 1) {
                if (password_verify($password, $penyewa['password_penyewa'])) {

                    $data = [
                        'email' => $penyewa['email_penyewa'],
                        'status' => $penyewa['status'],
                        'username' => $penyewa['username_penyewa']
                    ];
                    $this->session->set_userdata($data);
                    redirect('penyewa/C_penyewa');
                } else {
                    $this->session->set_flashdata('msg', danger('Password Salah'));
                    redirect('front/C_logreg/login');
                }
            } else {
                $this->session->set_flashdata('msg', danger('Akun Anda Belum Aktif!! Silahkan Aktivasi Akun anda Terlebih dahulu!!'));
                redirect('front/C_logreg/login');
            }
        } else {
            $this->session->set_flashdata('msg', danger('Username Salah atau Tidak terdaftar!!'));
            redirect('front/C_logreg/login');
        }
    }

    public function registrasi()
    {
        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required|trim',
            ['required' => 'Nama Tidak Boleh kosong!!']
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[penyewa.email_penyewa]',
            [
                'required' => 'Email Tidak Boleh kosong!!',
                'is_unique' => 'Email Sudah Terdaftar!!',
                'valid_email' => 'Email Tidak Valid!!'
            ]
        );
        $this->form_validation->set_rules(
            'telepon',
            'Telepon',
            'required|trim|numeric',
            [
                'required' => 'Telepon Tidak Boleh kosong!!',
                'numeric' => 'Telepon Tidak Valid!!'
            ]
        );
        $this->form_validation->set_rules(
            'alamat',
            'Alamat',
            'required|trim',
            ['required' => 'Alamat Tidak Boleh kosong!!']
        );
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|trim|is_unique[penyewa.username_penyewa]',
            [
                'required' => 'Username Tidak Boleh kosong!!',
                'is_unique' => 'Username Sudah Terdaftar!!',
            ]
        );
        $this->form_validation->set_rules(
            'password1',
            'Password1',
            'required|trim|matches[password2]'
        );
        $this->form_validation->set_rules(
            'password2',
            'Password2',
            'required|trim|matches[password1]'
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('front/penyewa/V_reg_penyewa');
        } else {

            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $this->input->post('email'),
                'token' => $token
            ];
            $this->db->insert('user_token', $user_token);
            $this->lr->save();
            $this->_sendemail($token, 'aktivasi');
            $this->session->set_flashdata('msg', info('Registrasi Berhasil!! Silahkan Cek Email Untuk Aktivasi akun anda.'));
            $this->load->view('front/penyewa/V_suksesreg');
        }
    }

    private function _sendemail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'asshidqi1997@gmail.com',
            'smtp_pass' => 'howtobeatbox!!!',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];
        $this->load->library('email', $config);
        $this->email->from('asshidqi1997@gmail.com', 'DNA Futsal');
        $this->email->to($this->input->post('email'));

        if ($type == 'aktivasi') {

            $this->email->subject('Aktivasi Akun DNA Futsal');
            $this->email->message('Registrasi Akun Anda Telah Berhasil, Silahkan Klik Link Berikut Untuk Aktivasi Akun anda:
            <p> <a href="' . base_url() . 'front/C_logreg/aktivasi?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktivasi</a></p>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function aktivasi()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $penyewa = $this->db->get_where('penyewa', ['email_penyewa' => $email])->row_array();

        if ($penyewa) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {

                $this->db->set('aktif', 1);
                $this->db->where('email_penyewa', $email);
                $this->db->update('penyewa');

                $this->db->delete('user_token', ['email' => $email]);

                $this->session->set_flashdata('msg', success('Aktivasi Akun Berhasil, Silahkan Login.'));
                redirect('front/C_logreg/login');
            } else {
                $this->session->set_flashdata('msg', danger('Aktivasi Akun Gagal!! Token Tidak Sessuai.'));
                redirect('front/C_logreg/login');
            }
        } else {
            $this->session->set_flashdata('msg', danger('Aktivasi Akun Gagal!! Email Tidak Sessuai.'));
            redirect('front/C_logreg/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('status');
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('msg', success('Anda Berhasil Logout'));
        redirect('front/C_logreg/login');
    }
}
