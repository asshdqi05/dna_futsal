<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{
    public function member()
    {
        return $this->db->query("SELECT * FROM penyewa WHERE STATUS = 'Member'");
    }

    public function penyewaan_perhari($tanggal)
    {
        return $this->db->query("SELECT * FROM detail_sewa WHERE  tanggal_sewa = '$tanggal'");
    }

    public function penyewaan_perbulan($bulan, $tahun)
    {
        return $this->db->query("SELECT * FROM detail_sewa WHERE DATE_FORMAT(tanggal_sewa,'%c')='$bulan' AND DATE_FORMAT(tanggal_sewa,'%Y')='$tahun'");
    }

    public function pemakaian_lapangan()
    {
        return $this->db->query("SELECT * FROM jadwal_lapangan WHERE tanggal_sewa=CURDATE() ORDER BY jam_awal");
    }
}
