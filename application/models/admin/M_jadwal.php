<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_jadwal extends CI_Model
{
    private $_table = "jadwal_lapangan";

    public function konfirmasi()
    {

        $post = $this->input->post();
        $this->id_sewa = htmlspecialchars($post["sewaid"]);
        $this->id_penyewa = htmlspecialchars($post["penyewaid"]);
        $this->nama_penyewa = htmlspecialchars($post["nama"]);
        $this->status_penyewa = htmlspecialchars($post["status"]);
        $this->tanggal_sewa = htmlspecialchars($post["tgl"]);
        $this->hari_sewa = htmlspecialchars($post["hari"]);
        $this->jam_awal = htmlspecialchars($post["jamawal"]);
        $this->jam_akhir = htmlspecialchars($post["jamakhir"]);
        $this->biaya_sewa = htmlspecialchars($post["biaya"]);
        $this->db->insert($this->_table, $this);

        $idsewa = $this->input->post('sewaid');
        $idpen = $this->input->post('penyewaid');
        $sts = $this->input->post('sts');

        if ($sts == "Menunggu Konfirmasi(Pendaftaran Member)") {
            $this->db->set('status', 'Dikonfirmasi(Pendaftaran Member)');
            $this->db->where('id_sewa', $idsewa);
            $this->db->update("sewa_lapangan");

            $this->db->set('status', 'Member');
            $this->db->where('id_Penyewa', $idpen);
            $this->db->update("penyewa");

            $this->db->set('status_penyewa', 'Member');
            $this->db->where('id_Penyewa', $idpen);
            $this->db->update("jadwal_lapangan");
        } else {

            $this->db->set('status', 'Dikonfirmasi');
            $this->db->where('id_sewa', $idsewa);
            $this->db->update("sewa_lapangan");
        }
    }

    public function tampil_jadwal()
    {
        return $this->db->query("SELECT *, IF(tanggal_sewa='0000-00-00','Jadwal Member','Jadwal Nonmember') AS ket FROM jadwal_lapangan WHERE tanggal_sewa = '0000-00-00' OR tanggal_sewa BETWEEN CURDATE() AND DATE_ADD(CURDATE(),INTERVAL 6 DAY) ORDER BY tanggal_sewa");
    }
    public function tgla()
    {
        return $this->db->query("SELECT CURDATE() as ta");
    }
    public function tglb()
    {
        return $this->db->query("SELECT DATE_ADD(CURDATE(),INTERVAL 6 DAY) as tk");
    }
}
