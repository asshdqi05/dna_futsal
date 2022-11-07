<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_penyewa extends CI_Model
{
    private $_table = "penyewa";


    function get_data()
    {
        return $this->db->query("SELECT * FROM penyewa");
    }

    function get_detail($kode)
    {
        return $this->db->query("SELECT * FROM penyewa WHERE id_penyewa='$kode'");
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_penyewa" => $id));
    }
}
