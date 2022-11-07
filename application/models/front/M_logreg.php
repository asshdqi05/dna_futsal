<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_logreg extends CI_Model
{
    private $_table = "penyewa";
    public $id_penyewa;
    public $nama_penyewa;
    public $email_penyewa;
    public $alamat_penyewa;
    public $nohp_penyewa;
    public $username_penyewa;
    public $password_penyewa;
    public $status;
    public $aktif;
    public $tanggal_daftar;
    public $foto;

    public function kode()
    {
        $this->db->select('RIGHT(id_penyewa,3) as kode', FALSE);
        $this->db->order_by('id_penyewa', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('penyewa');
        if ($query->num_rows() <> 0) {
            $dt = $query->row();
            $kode = intval($dt->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax  = str_pad($kode, 6, "0", STR_PAD_LEFT);
        $kodejadi = "PEN-" . $kodemax;
        return $kodejadi;
    }

    function get_data()
    {
        return $this->db->query("SELECT * FROM penyewa");
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["no" => $id])->row();
    }

    public function save()
    {
        $kode = $this->kode();
        $post = $this->input->post();
        $this->id_penyewa = $kode;
        $this->nama_penyewa = htmlspecialchars($post["nama"]);
        $this->email_penyewa = htmlspecialchars($post["email"]);
        $this->nohp_penyewa = htmlspecialchars($post["telepon"]);
        $this->alamat_penyewa = htmlspecialchars($post["alamat"]);
        $this->username_penyewa = htmlspecialchars($post["username"]);
        $this->password_penyewa = password_hash($post["password2"], PASSWORD_DEFAULT);
        $this->status = 'Nonmember';
        $this->aktif = 0;
        $this->tanggal_daftar = time();
        $this->foto = 'default.jpg';
        $this->db->insert($this->_table, $this);
    }
}
