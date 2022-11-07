<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_sewa_lapangan extends CI_Model
{
    private $_table = "sewa_lapangan";


    function get_data_sewa()
    {
        return $this->db->query("SELECT * FROM sewa_lapangan");
    }

    function get_detail_sewa($kode)
    {
        return $this->db->query("SELECT * FROM detail_sewa WHERE id_sewa='$kode'");
    }

    public function get_data($kode)
    {
        return $this->db->query("SELECT * FROM sewa_lapangan JOIN detail_sewa JOIN pembayaran_penyewaan 
        ON sewa_lapangan.id_sewa = detail_sewa.id_sewa
        AND sewa_lapangan.id_sewa=pembayaran_penyewaan.sewa_id WHERE sewa_lapangan.id_sewa='$kode'");
    }
}
