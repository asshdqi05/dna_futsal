<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_lapangan extends CI_Model
{
    private $_table = "lapangan";

    public function kode()
    {
        $this->db->select('RIGHT(id_lapangan,3) as kode', FALSE);
        $this->db->order_by('id_lapangan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('lapangan');
        if ($query->num_rows() <> 0) {
            $dt = $query->row();
            $kode = intval($dt->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax  = str_pad($kode, 7, "0", STR_PAD_LEFT);
        $kodejadi = "LP-" . $kodemax;
        return $kodejadi;
    }

    function get_data()
    {
        return $this->db->query("SELECT * FROM lapangan");
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["no" => $id])->row();
    }


    function add($params)
    {
        $this->db->insert('lapangan', $params);
    }

    function edit($params, $lapangan_id)
    {
        $this->db->set($params);
        $this->db->where('id_lapangan', $lapangan_id);
        $this->db->update('lapangan');
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_lapangan" => $id));
    }

    private function deleteImage($id)
    {
        $lap = $this->getById($id);
        $filename = explode(".", $lap->image)[0];
        return array_map('unlink', glob(FCPATH . "foto/$filename.*"));
    }
}
