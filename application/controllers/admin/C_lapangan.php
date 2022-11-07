<?php

class C_lapangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nama') && !$this->session->userdata('user')) {
            $this->session->set_flashdata('msg', danger('Anda Harus Login Terlebih Dahulu!!!'));
            redirect('admin/C_login');
        }
        $this->load->library('upload');
        $this->load->model('admin/M_lapangan', 'ml');

        //Do your magic here
    }

    public function index()
    {
        $d['datalapangan']   = $this->ml->get_data();
        $tempelate = array(
            'mn_lapangan' => 'active',
            'judul' => 'Data Lapangan',
            'konten' => $this->load->view('admin/V_lapangan', $d, true)
        );
        $this->parser->parse('admin/template/V_home_admin', $tempelate);
    }

    function simpan()
    {
        $config['upload_path']          =  './foto/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2000;
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('foto')) {
            $file = $this->upload->data();
            $foto = $file['file_name'];

            $params = array(
                'id_lapangan'    => $this->ml->kode(),
                'nama_lapangan' => $this->input->post('nama'),
                'deskripsi_lapangan' => $this->input->post('deskripsi'),
                'foto_lapangan' => $foto
            );

            $lapangan_id = $this->ml->add($params);
            $this->session->set_flashdata('msg', success('Data berhasil disimpan.'));
            redirect('admin/C_lapangan');
        } else {
            echo '<script>alert("Data gagal disimpan");</script>';
        }
    }

    function edit()
    {
        $config['upload_path']          =  './foto/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 10000;
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;
        $config['overwrite']            = true;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('foto')) {
            $file = $this->upload->data();
            $foto = $file['file_name'];

            $params = array(
                'id_lapangan'    => $this->input->post('id'),
                'nama_lapangan' => $this->input->post('nama'),
                'deskripsi_lapangan' => $this->input->post('deskripsi'),
                'foto_lapangan' => $foto
            );
            $lapangan_id = $this->input->post('id');

            $this->ml->edit($params, $lapangan_id);
            $this->session->set_flashdata('msg', success('Data berhasil disimpan.'));
            redirect('admin/C_lapangan');
        } else {
            echo '<script>alert("Data gagal disimpan");</script>';
            redirect('admin/C_lapangan');
        }
    }

    public function hapus()
    {
        $id = $this->input->post('id');
        if (!$this->ml->delete($id) && !$this->ml->deleteImage($id)) {
            $this->session->set_flashdata('msg', danger('Data gagal dihapus.'));
        } else {
            $this->session->set_flashdata('msg', info('Data berhasil dihapus.'));
        }
        redirect('admin/C_lapangan');
    }
}
