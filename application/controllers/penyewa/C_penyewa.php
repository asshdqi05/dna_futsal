<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_penyewa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('msg', danger('Anda Harus Login Terlebih Dahulu!!!'));
            redirect('front/C_logreg/Login');
        }
        $this->load->model('front/M_logreg', 'lr');
        $this->load->model('sewa/M_sewa', 'sw');
        $this->load->model('admin/M_sewa_lapangan', 'ms');
        $this->load->library('upload');
    }


    public function index()
    {
        $beranda = [
            'mn_home' => 'active',
            'judul' => 'Home',
            'konten' => $this->load->view('penyewa/V_beranda', '', true),
        ];
        $this->parser->parse('penyewa/template/V_home_penyewa', $beranda);
    }


    public function profile()
    {
        $profile = [
            'mn_profil' => 'active',
            'judul' => 'My Profile',
            'konten' => $this->load->view('penyewa/V_profile', '', true),
        ];
        $this->parser->parse('penyewa/template/V_home_penyewa', $profile);
    }


    public function edit_profile()
    {
        $edit_profile = [
            'judul' => 'Edit Profil',
            'konten' => $this->load->view('penyewa/v_edit_profile', '', true),
        ];
        $this->parser->parse('penyewa/template/V_home_penyewa', $edit_profile);
    }


    public function edit()
    {

        $data = $this->db->get_where('penyewa', ['username_penyewa' =>
        $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required|trim',
            ['required' => 'Nama Tidak Boleh kosong!!']
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email',
            [
                'required' => 'Email Tidak Boleh kosong!!',
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

        if ($this->form_validation->run() == false) {
            $edit_profile = [
                'judul' => 'Edit Profil',
                'konten' => $this->load->view('penyewa/v_edit_profile', '', true),
            ];
            $this->parser->parse('penyewa/template/V_home_penyewa', $edit_profile);
        } else {
            $nama_penyewa = $this->input->post('nama');
            $alamat_penyewa = $this->input->post('alamat');
            $nohp_penyewa = $this->input->post('telepon');
            $email_penyewa = $this->input->post('email');
            $username_penyewa = $this->input->post('username');

            $upload_image = $_FILES['foto'];

            if ($upload_image) {
                $config['upload_path']          =  './foto/profil/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto')) {
                    $old_foto = $data['foto'];
                    if ($old_foto != 'default.jpg') {
                        unlink(FCPATH . 'foto/profil/' . $old_foto);
                    }

                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('foto', $new_foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('nama_penyewa', $nama_penyewa);
            $this->db->set('alamat_penyewa', $alamat_penyewa);
            $this->db->set('nohp_penyewa', $nohp_penyewa);
            $this->db->set('email_penyewa', $email_penyewa);

            $this->db->where('username_penyewa', $username_penyewa);
            $this->db->update('penyewa');
            $this->session->set_flashdata('msg', success('Profil anda berhasil diupdate.'));
            redirect('penyewa/C_penyewa/profile');
        }
    }

    public function edit_password()
    {
        $data = $this->db->get_where('penyewa', ['username_penyewa' =>
        $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules(
            'pas1',
            'pas1',
            'required|trim',
            [
                'required' => 'Password Tidak Boleh kosong!!'
            ]
        );

        $this->form_validation->set_rules(
            'pas2',
            'Password2',
            'required|trim|matches[pas3]',
            [
                'required' => 'Password Tidak Boleh kosong!!',
                'matches' => 'Password Tidak Cocok!!'
            ]
        );
        $this->form_validation->set_rules(
            'pas3',
            'Password3',
            'required|trim|matches[pas2]',
            [
                'required' => 'Email Tidak Boleh kosong!!',
                'matches' => 'Password Tidak Cocok!!'
            ]
        );

        if ($this->form_validation->run() == false) {
            $edit_password = [
                'judul' => 'Ganti Password',
                'konten' => $this->load->view('penyewa/v_edit_password', '', true)
            ];
            $this->parser->parse('penyewa/template/V_home_penyewa', $edit_password);
        } else {
            $password_sekarang = $this->input->post('pas1');
            $password_baru = $this->input->post('pas2');

            if (!password_verify($password_sekarang, $data['password_penyewa'])) {
                $this->session->set_flashdata('msg', danger('Password lama anda tidak Sesuai!!.'));
                redirect('penyewa/C_penyewa/edit_password');
            } else {
                if ($password_sekarang == $password_baru) {
                    $this->session->set_flashdata('msg', danger('Password Baru Tidak Boleh sama Dengan Password lama!!.'));
                    redirect('penyewa/C_penyewa/edit_password');
                } else {
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
                    $this->db->set('password_penyewa', $password_hash);
                    $this->db->where('username_penyewa', $data['username_penyewa']);
                    $this->db->update('penyewa');
                    $this->session->set_flashdata('msg', success('Password Berhasil diubah!!.'));
                    redirect('penyewa/C_penyewa/profile');
                }
            }
        }
    }

    public function simpan_temp()
    {

        $data = $this->db->get_where('penyewa', ['username_penyewa' =>
        $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules(
            'tgl_sewa',
            'Tanggal Sewa',
            'required|trim',
            [
                'required' => 'Tanggal Sewa Tidak Boleh kosong!!'
            ]
        );

        $this->form_validation->set_rules(
            'harga',
            'Harga',
            'required|trim',
            [
                'required' => 'Harga Sewa Tidak Boleh kosong!!',
            ]
        );

        $this->form_validation->set_rules(
            'jam',
            'Jam',
            'required|trim',
            [
                'required' => 'Jam Sewa Tidak Boleh kosong!!'
            ]
        );

        if ($this->form_validation->run() == false) {
            $sewa_lapangan = [
                'mn_sewa' => 'active',
                'judul'   => 'Sewa Lapangan',
                'konten' => $this->load->view('penyewa/V_sewa_lapangan', '', true)
            ];
            $this->parser->parse('penyewa/template/V_home_penyewa', $sewa_lapangan);
        } else {

            $tgl = $this->input->post('tgl_sewa');
            $tanggal = date('Y-m-d', strtotime($tgl));
            $jam = $this->input->post('jam');
            $hari = $this->input->post('hari');
            $dt = $this->db->query("select * from jadwal_lapangan where tanggal_sewa='$tanggal' and jam_sewa='$jam' and hari_sewa='$hari'")->result_array();
            $ht = $this->db->query("select * from jadwal_lapangan where jam_sewa='$jam' and hari_sewa='$hari'")->result_array();
            $ct = $this->db->query("select * from temp_sewa where tanggal='$tanggal' and jam='$jam'")->result_array();

            if ($dt == true) {
                $this->session->set_flashdata('msg', danger('Jadwal sewa Sudah ada, Silahkan pilih jadwal lain'));
                redirect('penyewa/C_penyewa/simpan_temp');
            } else {
                if ($ht == true) {
                    $this->session->set_flashdata('msg', danger('Jadwal sewa Sudah ada, Silahkan pilih jadwal lain'));
                    redirect('penyewa/C_penyewa/simpan_temp');
                } else {
                    if ($ct == true) {
                        $this->session->set_flashdata('msg', danger('Jadwal sewa Sudah dipilih, Silahkan pilih jadwal lain'));
                        redirect('penyewa/C_penyewa/simpan_temp');
                    } else {
                        $tanggal = $this->input->post('tgl_sewa', true);
                        $save = [
                            'username' => $data['username_penyewa'],
                            'hari' => $this->input->post('hari', true),
                            'tanggal' => date('Y-m-d', strtotime($tanggal)),
                            'jam' => $this->input->post('jam', true),
                            'harga' => $this->input->post('harga', true),
                        ];
                        $this->db->insert('temp_sewa', $save);
                        $this->session->set_flashdata('msg', success('Jadwal sewa lapangan Berhasil Ditambah'));
                        redirect('penyewa/C_penyewa/simpan_temp');
                    }
                }
            }
        }
    }


    public function hapus_temp()
    {
        $id = $this->input->post('kode');
        if (!$this->db->delete('temp_sewa', array("id" => $id))) {
            $this->session->set_flashdata('msg', danger('Item gagal dihapus.'));
        } else {
            $this->session->set_flashdata('msg', info('Item berhasil dihapus.'));
        }
        redirect('penyewa/C_penyewa/simpan_temp');
    }


    public function sewa_lapangan()
    {
        $sewa_lapangan = [
            'mn_sewa' => 'active',
            'judul'   => 'Sewa Lapangan',
            'konten' => $this->load->view('penyewa/V_sewa_lapangan', '', true)
        ];
        $this->parser->parse('penyewa/template/V_home_penyewa', $sewa_lapangan);
    }

    // public function proses_sewa()
    // {
    //     $data = $this->db->get_where('penyewa', ['username_penyewa' =>
    //     $this->session->userdata('username')])->row_array();
    //     $cek = $this->db->get('temp_sewa')->num_rows();

    //     if ($cek == 0) {
    //         $this->session->set_flashdata('msg', danger('Silahkan Pilih Jadwal Sewa!!'));
    //         redirect('penyewa/C_penyewa/simpan_temp');
    //     } else {

    //         $id_sewa = $this->sw->kode_sewa();
    //         $penyewa_id = $data['id_penyewa'];
    //         $penyewa_nama = $data['nama_penyewa'];
    //         $penyewa_status = $data['status'];
    //         $status = "Belum Bayar";
    //         $this->session->set_userdata('idsewa', $id_sewa);

    //         $this->db->query("insert into sewa_lapangan (id_sewa,penyewa_id,penyewa_nama,penyewa_status,status) select '$id_sewa','$penyewa_id','$penyewa_nama','$penyewa_status','$status'");
    //         $this->db->query("insert into detail_sewa(id_sewa,id_penyewa,nama_penyewa,status_penyewa,tanggal_sewa,hari_sewa,jam_sewa,jumlah_bayar) select 
    //                                 '$id_sewa','$penyewa_id','$penyewa_nama','$penyewa_status',tanggal,hari,jam,harga from temp_sewa");
    //         $this->db->empty_table('temp_sewa');
    //         $this->session->set_flashdata('msg', success('Berhasil. Silahkan Lakukan Pembayaran'));
    //         redirect('penyewa/C_penyewa/pembayaran');
    //     }
    // }

    public function proses_sewa2()
    {
        $data = $this->db->get_where('penyewa', ['username_penyewa' =>
        $this->session->userdata('username')])->row_array();

        $id_sewa = $this->sw->kode_sewa();
        $penyewa_id = $data['id_penyewa'];
        $penyewa_nama = $data['nama_penyewa'];
        $penyewa_status = $data['status'];
        $hari = $this->input->post('hari', true);
        $tanggal = $this->input->post('tgl_sewa', true);
        $tgl = date('Y-m-d', strtotime($tanggal));
        $jamawal = $this->input->post('jamawal', true);
        $jamakhir = $this->input->post('jamakhir', true);
        $harga = $this->input->post('harga', true);
        $status = "Belum Bayar";
        $this->session->set_userdata('idsewa', $id_sewa);

        $cek = $this->db->query("SELECT * FROM jadwal_lapangan WHERE hari_sewa='$hari' AND tanggal_sewa='$tgl' AND jam_awal AND jam_akhir BETWEEN '$jamawal' AND '$jamakhir'");
        $cekmem = $this->db->query("SELECT * FROM jadwal_lapangan WHERE hari_sewa='$hari' AND jam_awal AND jam_akhir BETWEEN '$jamawal' AND '$jamakhir'");

        if ($jamawal >= $jamakhir) {
            echo '<script language="javascript">';
            echo 'alert("Masukan Jadwal Dengan benar!!");history.go(-1);';
            echo '</script>';
        } else {
            if ($cek->num_rows() > 0) {
                echo '<script language="javascript">';
                echo 'alert("Jadwal Sudah Ada, Silahkan Pilih Jadwal Yang Lain :)");history.go(-1);';
                echo '</script>';
            } else {
                if ($cekmem->num_rows() > 0) {
                    echo '<script language="javascript">';
                    echo 'alert("Jadwal Sudah Ada, Silahkan Pilih Jadwal Yang Lain :)");history.go(-1);';
                    echo '</script>';
                } else {
                    $this->db->query("insert into sewa_lapangan values ('$id_sewa','$penyewa_id','$penyewa_nama','$penyewa_status','$tgl','$status')");
                    $this->db->query("insert into detail_sewa(id_sewa,id_penyewa,nama_penyewa,status_penyewa,tanggal_sewa,hari_sewa,jam_awal,jam_akhir,jumlah_bayar) select 
                                        '$id_sewa','$penyewa_id','$penyewa_nama','$penyewa_status','$tgl','$hari','$jamawal','$jamakhir','$harga'");
                    $this->db->empty_table('temp_sewa');
                    $this->session->set_flashdata('msg', success('Berhasil. Silahkan Lakukan Pembayaran'));
                    redirect('penyewa/C_penyewa/pembayaran');
                }
            }
        }
    }

    public function pembayaran()
    {
        $dt = $this->sw->pembayaran();
        $cek = $dt->row_array();
        $d = [
            'id_sewa' => $cek['id_sewa'],
            'nama_penyewa' => $cek['nama_penyewa'],
            'status_penyewa' => $cek['status_penyewa'],
        ];
        $d['db'] = $this->sw->data_bayar();

        $sewa_lapangan = [
            'mn_sewa' => 'active',
            'judul'   => 'Pembayaran Sewa Lapangan',
            'konten' => $this->load->view('penyewa/V_pembayaran', $d, true)
        ];
        $this->parser->parse('penyewa/template/V_home_penyewa', $sewa_lapangan);
    }

    public function pembayaran2()
    {
        $kode = $this->uri->segment(4);
        $dt = $this->sw->pembayaran2($kode);
        $cek = $dt->row_array();
        $d = [
            'id_sewa' => $cek['id_sewa'],
            'nama_penyewa' => $cek['nama_penyewa'],
            'status_penyewa' => $cek['status_penyewa'],
        ];
        $d['db'] = $this->sw->data_bayar2($kode);

        $sewa_lapangan = [
            'mn_sewa' => 'active',
            'judul'   => 'Pembayaran Sewa Lapangan',
            'konten' => $this->load->view('penyewa/V_pembayaran', $d, true)
        ];
        $this->parser->parse('penyewa/template/V_home_penyewa', $sewa_lapangan);
    }

    function bayar()
    {
        $upload_image = $_FILES['foto'];

        if ($upload_image) {
            $config['upload_path']          =  './foto/bukti_pembayaran/';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = 2048;
            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto')) {
                $new_foto = $this->upload->data('file_name');
                $tgl = date('Y-m-d');
                $sid = $this->input->post('sewaid');
                $pem = [
                    'no_transaksi' => $this->sw->kode_pembayaran(),
                    'tanggal_bayar' => $tgl,
                    'sewa_id' => $this->input->post('sewaid'),
                    'nama_penyewa' => $this->input->post('nama'),
                    'status_penyewa' => $this->input->post('status'),
                    'jumlah_bayar' => $this->input->post('bayar'),
                    'bukti_pembayaran' => $new_foto
                ];
                $this->db->insert('pembayaran_penyewaan', $pem);
                $this->db->set('status', 'Menunggu Konfirmasi');
                $this->db->where('id_sewa', $sid);
                $this->db->update('sewa_lapangan');
                redirect('penyewa/C_penyewa/sukses');
            } else {
                echo $this->upload->display_errors();
            }
        }
    }

    public function sukses()
    {
        $sukses = [
            'mn_sewa' => 'active',
            'judul'   => 'Pembayaran Sewa Lapangan',
            'konten' => $this->load->view('penyewa/V_pembayaran_sukses', '', true)
        ];
        $this->parser->parse('penyewa/template/V_home_penyewa', $sukses);
    }

    public function cetak_bukti()
    {
        $dt = $this->sw->cetak_bukti();
        $cek = $dt->row_array();
        $d = [
            'id_sewa' => $cek['id_sewa'],
            'nama_penyewa' => $cek['nama_penyewa'],
            'status_penyewa' => $cek['status_penyewa'],
            'no_transaksi' => $cek['no_transaksi'],
            'tanggal_bayar' => $cek['tanggal_bayar']
        ];
        $d['db'] = $this->sw->data_bayar();

        $this->load->view('penyewa/V_bukti_sewa', $d);
    }

    public function cetak_bukti2()
    {
        $kode    = $this->uri->segment(4);
        $dt = $this->sw->cetak_bukti2($kode);
        $cek = $dt->row_array();
        $d = [
            'id_sewa' => $cek['id_sewa'],
            'nama_penyewa' => $cek['nama_penyewa'],
            'status_penyewa' => $cek['status_penyewa'],
            'no_transaksi' => $cek['no_transaksi'],
            'tanggal_bayar' => $cek['tanggal_bayar']
        ];
        $d['db'] = $this->sw->data_bayar2($kode);

        $this->load->view('penyewa/V_bukti_sewa', $d);
    }

    public function detail_sewa()
    {
        $kode             = $this->uri->segment(4);
        $x['ambildata']   = $this->ms->get_data($kode);
        $x['ambildetail']   = $this->ms->get_detail_sewa($kode);
        $tempelate        = array(
            'mn_sewa' => 'active',
            'judul' => 'Detail Sewa Lapangan',
            'konten' => $this->load->view('penyewa/V_detail_penyewa', $x, true)
        );
        $this->parser->parse('penyewa/template/V_home_penyewa', $tempelate);
    }

    public function batal_sewa()
    {
        $kode = $this->uri->segment(4);
        if (!$this->sw->batal_sewa($kode)) {
            $this->session->set_flashdata('msg', danger('Gagal.'));
        } else {
            $this->session->set_flashdata('msg', info('Sewa Lapangan Berhasil Dibatalkan.'));
        }
        redirect('penyewa/C_penyewa/sewa_lapangan');
    }

    public function daf_member()
    {
        $daftar_member = [
            'mn_member' => 'active',
            'judul'   => 'Pendaftaran Member',
            'konten' => $this->load->view('penyewa/V_daftar_member', '', true)
        ];
        $this->parser->parse('penyewa/template/V_home_penyewa', $daftar_member);
    }

    // public function daftar_member()
    // {

    //     $data = $this->db->get_where('penyewa', ['username_penyewa' =>
    //     $this->session->userdata('username')])->row_array();
    //     $cek = $this->db->get('temp_sewa')->num_rows();

    //     if ($cek == 0) {
    //         $this->session->set_flashdata('msg', danger('Silahkan Pilih Jadwal Sewa!!'));
    //         redirect('penyewa/C_penyewa/simpan_temp_member');
    //     } else {
    //         $tgl = $this->input->post('tgl_sewa');
    //         $tanggal = date('Y-m-d', strtotime($tgl));
    //         $jam = $this->input->post('jam');
    //         $dt = $this->db->query("select * from jadwal_lapangan where tanggal_sewa='$tanggal' and jam_sewa='$jam'")->result_array();

    //         if ($dt == true) {
    //             $this->session->set_flashdata('msg', danger('Jadwal sewa Sudah ada, Silahkan pilih jadwal lain'));
    //             redirect('penyewa/C_penyewa/daftar_member');
    //         } else {


    //             $id_sewa = $this->sw->kode_sewa();
    //             $id_penyewa = $data['id_penyewa'];
    //             $nama_penyewa = $data['nama_penyewa'];
    //             $status_penyewa = 'Member';
    //             $tanggal_sewa = '-';
    //             $this->db->query("insert into jadwal_lapangan(id_sewa,id_penyewa,nama_penyewa,status_penyewa,tanggal_sewa,hari_sewa,jam_sewa,biaya_sewa) select 
    //                                 '$id_sewa','$id_penyewa','$nama_penyewa','$status_penyewa','$tanggal_sewa',hari,jam,harga from temp_sewa");

    //             $this->db->set('status', 'Member');
    //             $this->db->where('id_penyewa', $data['id_penyewa']);
    //             $this->db->update("penyewa");
    //             $this->db->empty_table('temp_sewa');
    //             $this->session->set_flashdata('msg', success('Pendaftaran Member Berhasil.'));
    //             redirect('penyewa/C_penyewa/member');
    //         }
    //     }
    // }

    public function daftar_member2()
    {
        $data = $this->db->get_where('penyewa', ['username_penyewa' =>
        $this->session->userdata('username')])->row_array();

        $id_sewa = $this->sw->kode_sewa();
        $penyewa_id = $data['id_penyewa'];
        $penyewa_nama = $data['nama_penyewa'];
        $penyewa_status = $data['status'];
        $hari = $this->input->post('hari', true);
        $tgl = "-";
        $jamawal = $this->input->post('jamawal', true);
        $jamakhir = $this->input->post('jamakhir', true);
        $harga = $this->input->post('harga', true);
        $status = "Belum Bayar (Pendaftaran Member)";
        $this->session->set_userdata('idsewa', $id_sewa);

        $cek = $this->db->query("SELECT * FROM jadwal_lapangan WHERE hari_sewa='$hari' AND tanggal_sewa='$tgl' AND jam_awal AND jam_akhir BETWEEN '$jamawal' AND '$jamakhir'");
        $cekmem = $this->db->query("SELECT * FROM jadwal_lapangan WHERE hari_sewa='$hari' AND jam_awal AND jam_akhir BETWEEN '$jamawal' AND '$jamakhir'");

        if ($jamawal >= $jamakhir) {
            echo '<script language="javascript">';
            echo 'alert("Masukan Jadwal Dengan benar!!");history.go(-1);';
            echo '</script>';
        } else {
            if ($cek->num_rows() > 0) {
                echo '<script language="javascript">';
                echo 'alert("Jadwal Sudah Ada, Silahkan Pilih Jadwal Yang Lain :)");history.go(-1);';
                echo '</script>';
            } else {
                if ($cekmem->num_rows() > 0) {
                    echo '<script language="javascript">';
                    echo 'alert("Jadwal Sudah Ada, Silahkan Pilih Jadwal Yang Lain :)");history.go(-1);';
                    echo '</script>';
                } else {
                    $this->db->query("insert into sewa_lapangan values ('$id_sewa','$penyewa_id','$penyewa_nama','$penyewa_status','$tgl','$status')");
                    $this->db->query("insert into detail_sewa(id_sewa,id_penyewa,nama_penyewa,status_penyewa,tanggal_sewa,hari_sewa,jam_awal,jam_akhir,jumlah_bayar) select 
                                        '$id_sewa','$penyewa_id','$penyewa_nama','$penyewa_status','$tgl','$hari','$jamawal','$jamakhir','$harga'");
                    $this->db->empty_table('temp_sewa');
                    $this->session->set_flashdata('msg', success('Berhasil. Silahkan Lakukan Pembayaran'));
                    redirect('penyewa/C_penyewa/pembayaran_member');
                }
            }
        }
    }

    public function pembayaran_member()
    {
        $dt = $this->sw->pembayaran();
        $cek = $dt->row_array();
        $d = [
            'id_sewa' => $cek['id_sewa'],
            'nama_penyewa' => $cek['nama_penyewa'],
            'status_penyewa' => $cek['status_penyewa'],
        ];
        $d['db'] = $this->sw->data_bayar();

        $sewa_lapangan = [
            'mn_sewa' => 'active',
            'judul'   => 'Pembayaran Pendaftaran Member',
            'konten' => $this->load->view('penyewa/V_pembayaran_member', $d, true)
        ];
        $this->parser->parse('penyewa/template/V_home_penyewa', $sewa_lapangan);
    }

    function bayar_member()
    {
        $upload_image = $_FILES['foto'];

        if ($upload_image) {
            $config['upload_path']          =  './foto/bukti_pembayaran/';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = 2048;
            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto')) {
                $new_foto = $this->upload->data('file_name');
                $tgl = date('Y-m-d');
                $sid = $this->input->post('sewaid');
                $pem = [
                    'no_transaksi' => $this->sw->kode_pembayaran(),
                    'tanggal_bayar' => $tgl,
                    'sewa_id' => $this->input->post('sewaid'),
                    'nama_penyewa' => $this->input->post('nama'),
                    'status_penyewa' => $this->input->post('status'),
                    'jumlah_bayar' => $this->input->post('bayar'),
                    'bukti_pembayaran' => $new_foto
                ];
                $this->db->insert('pembayaran_penyewaan', $pem);
                $this->db->set('status', 'Menunggu Konfirmasi(Pendaftaran Member)');
                $this->db->where('id_sewa', $sid);
                $this->db->update('sewa_lapangan');
                redirect('penyewa/C_penyewa/sukses');
            } else {
                echo $this->upload->display_errors();
            }
        }
    }

    public function simpan_temp_member()
    {

        $data = $this->db->get_where('penyewa', ['username_penyewa' =>
        $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules(
            'harga',
            'Harga',
            'required|trim',
            [
                'required' => 'Harga Sewa Tidak Boleh kosong!!',
            ]
        );

        $this->form_validation->set_rules(
            'jam',
            'Jam',
            'required|trim',
            [
                'required' => 'Jam Sewa Tidak Boleh kosong!!'
            ]
        );

        if ($this->form_validation->run() == false) {
            $daftar_member = [
                'mn_member' => 'active',
                'judul'   => 'Pendaftaran Member',
                'konten' => $this->load->view('penyewa/V_daftar_member', '', true)
            ];
            $this->parser->parse('penyewa/template/V_home_penyewa', $daftar_member);
        } else {
            $jam = $this->input->post('jam');
            $hari = $this->input->post('hari');
            $dt = $this->db->query("select * from jadwal_lapangan where jam_sewa='$jam' and hari_sewa='$hari'")->result_array();
            $ct = $this->db->query("select * from temp_sewa where  jam='$jam'")->result_array();

            if ($dt == true) {
                $this->session->set_flashdata('msg', danger('Jadwal sewa Sudah ada, Silahkan pilih jadwal lain'));
                redirect('penyewa/C_penyewa/simpan_temp_member');
            } else {
                if ($ct == true) {
                    $this->session->set_flashdata('msg', danger('Jadwal sewa Sudah dipilih, Silahkan pilih jadwal lain'));
                    redirect('penyewa/C_penyewa/simpan_temp_member');
                } else {

                    $save = [
                        'username' => $data['username_penyewa'],
                        'hari' => $this->input->post('hari', true),
                        'jam' => $this->input->post('jam', true),
                        'harga' => $this->input->post('harga', true),
                    ];
                    $this->db->insert('temp_sewa', $save);
                    $this->session->set_flashdata('msg', success('Jadwal Member Berhasil Ditambah'));
                    redirect('penyewa/C_penyewa/simpan_temp_member');
                }
            }
        }
    }


    public function hapus_temp_member()
    {
        $id = $this->input->post('kode');
        if (!$this->db->delete('temp_sewa', array("id" => $id))) {
            $this->session->set_flashdata('msg', danger('Item gagal dihapus.'));
        } else {
            $this->session->set_flashdata('msg', info('Item berhasil dihapus.'));
        }
        redirect('penyewa/C_penyewa/simpan_temp_member');
    }

    public function member()
    {
        $data = $this->db->get_where('penyewa', ['username_penyewa' =>
        $this->session->userdata('username')])->row_array();
        $ip = $data['id_penyewa'];
        $st = $data['status'];
        $dt['da'] = $this->sw->jadwal_member($ip, $st);
        $dt['dat'] = $this->sw->jadwal_member($ip, $st);
        $member = [
            'mn_member' => 'active',
            'judul'   => 'Member',
            'konten' => $this->load->view('penyewa/V_member', $dt, true)
        ];
        $this->parser->parse('penyewa/template/V_home_penyewa', $member);
    }

    public function ganti_jadwal_member()
    {
        $id = $this->input->post('id_jadwal');
        $hari = $this->input->post('hari_sewa');
        $jam = $this->input->post('jam_sewa');

        $dt = $this->db->query("select * from jadwal_lapangan where jam_sewa='$jam' and hari_sewa='$hari'")->result_array();
        $ct = $this->db->query("select * from temp_sewa where  jam='$jam'")->result_array();

        if ($dt == true) {
            $this->session->set_flashdata('msg', danger('Jadwal sewa Sudah ada, Silahkan pilih jadwal lain'));
            redirect('penyewa/C_penyewa/member');
        } else {
            if ($ct == true) {
                $this->session->set_flashdata('msg', danger('Jadwal sewa Sudah dipilih, Silahkan pilih jadwal lain'));
                redirect('penyewa/C_penyewa/member');
            } else {

                $this->db->set('hari_sewa', $hari);
                $this->db->set('jam_sewa', $jam);

                $this->db->where('id_jadwal', $id);
                $this->db->update('jadwal_lapangan');
                $this->session->set_flashdata('msg', success('Jadwal Member berhasil diupdate.'));
                redirect('penyewa/C_penyewa/member');
            }
        }
    }

    public function hapus_jadwal_member()
    {
        $id = $this->input->post('kode');
        if (!$this->db->delete('jadwal_lapangan', array("id_jadwal" => $id))) {
            $this->session->set_flashdata('msg', danger('Jadwal Member Gagal Dihapus.'));
            redirect('penyewa/C_penyewa/member');
        } else {
            $this->session->set_flashdata('msg', info('Jadwal Member Berhasil Dihapus.'));
        }
        redirect('penyewa/C_penyewa/member');
    }

    public function hapus_member()
    {
        $data = $this->db->get_where('penyewa', ['username_penyewa' =>
        $this->session->userdata('username')])->row_array();
        $ip = $data['id_penyewa'];
        $st = $data['status'];
        $dt = $this->db->query("select * from jadwal_lapangan where tanggal_sewa = '0000-00-00' and id_penyewa = '$ip' and status_penyewa ='$st'")->result_array();

        if ($dt == true) {
            $this->session->set_flashdata('msg', danger('Silahkan Hapus Jadwal Member Terlebih Dahulu!!.'));
            redirect('penyewa/C_penyewa/member');
        } else {
            $status = 'Nonmember';
            $ip = $data['id_penyewa'];
            $this->db->set('status', $status);
            $this->db->where('id_penyewa', $ip);
            $this->db->update('penyewa');
            $this->session->set_flashdata('msg', info('Member berhasil dihapus.'));
        }
        redirect('penyewa/C_penyewa/daf_member');
    }
}
