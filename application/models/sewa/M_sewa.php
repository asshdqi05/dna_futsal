<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_sewa extends CI_Model
{
    private $_table = "sewa_lapangan";

    public function kode_sewa()
    {
        $this->db->select('RIGHT(id_sewa,3) as kode', FALSE);
        $this->db->order_by('id_sewa', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('sewa_lapangan');
        if ($query->num_rows() <> 0) {
            $dt = $query->row();
            $kode = intval($dt->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax  = str_pad($kode, 7, "0", STR_PAD_LEFT);
        $kodejadi = "SW-" . $kodemax;
        return $kodejadi;
    }

    public function kode_pembayaran()
    {
        $this->db->select('RIGHT(no_transaksi,3) as kode', FALSE);
        $this->db->order_by('no_transaksi', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pembayaran_penyewaan');
        if ($query->num_rows() <> 0) {
            $dt = $query->row();
            $kode = intval($dt->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax  = str_pad($kode, 7, "0", STR_PAD_LEFT);
        $kodejadi = "TR-" . $kodemax;
        return $kodejadi;
    }

    public function pembayaran()
    {
        $data = $this->db->get_where('penyewa', ['username_penyewa' =>
        $this->session->userdata('username')])->row_array();
        $ip = $data['id_penyewa'];
        $idsewa = $this->session->userdata('idsewa');
        return $this->db->query("SELECT * FROM detail_sewa JOIN sewa_lapangan ON detail_sewa.id_sewa = sewa_lapangan.id_sewa WHERE penyewa_id='$ip' AND sewa_lapangan.id_sewa='$idsewa'");
    }
    public function pembayaran2($kode)
    {
        $data = $this->db->get_where('penyewa', ['username_penyewa' =>
        $this->session->userdata('username')])->row_array();
        $ip = $data['id_penyewa'];
        $idsewa = $this->session->userdata('idsewa');
        return $this->db->query("SELECT * FROM detail_sewa JOIN sewa_lapangan ON detail_sewa.id_sewa = sewa_lapangan.id_sewa WHERE penyewa_id='$ip' AND sewa_lapangan.id_sewa='$kode'");
    }
    public function data_bayar()
    {
        $idsewa = $this->session->userdata('idsewa');
        return $this->db->query("SELECT * FROM detail_sewa WHERE id_sewa='$idsewa'");
    }
    public function data_bayar2($kode)
    {
        return $this->db->query("SELECT * FROM detail_sewa WHERE id_sewa='$kode'");
    }

    public function cetak_bukti()
    {
        $idsewa = $this->session->userdata('idsewa');
        return $this->db->query("SELECT id_sewa,nama_penyewa,status_penyewa,no_transaksi,tanggal_bayar FROM `sewa_lapangan`JOIN pembayaran_penyewaan
        ON id_sewa = sewa_id WHERE id_sewa='$idsewa'");
    }
    public function cetak_bukti2($kode)
    {

        return $this->db->query("SELECT id_sewa,nama_penyewa,status_penyewa,no_transaksi,tanggal_bayar FROM `sewa_lapangan`JOIN pembayaran_penyewaan
        ON id_sewa = sewa_id WHERE id_sewa='$kode'");
    }

    public function jadwal_member($ip, $st)
    {
        $a = $this->db->query("select * from jadwal_lapangan where tanggal_sewa = '0000-00-00' and id_penyewa = '$ip' and status_penyewa ='$st'");
        return $a;
    }

    public function batal_sewa($kode)
    {
        return $this->db->delete($this->_table, array("id_sewa" => $kode));
    }
}
