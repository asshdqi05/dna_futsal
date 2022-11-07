<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    private $_table = "user";

    public function kode()
    {
        $this->db->select('RIGHT(id_user,3) as kode', FALSE);
        $this->db->order_by('id_user', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('user');
        if ($query->num_rows() <> 0) {
            $dt = $query->row();
            $kode = intval($dt->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax  = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $kodejadi = "USER-" . $kodemax;
        return $kodejadi;
    }

    function get_data()
    {
        return $this->db->query("SELECT * FROM user");
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["no" => $id])->row();
    }

    public function get_level()
    {
        return $this->db->query("SELECT * FROM level_user");
    }

    public function save()
    {
        $kode = $this->kode();
        $post = $this->input->post();
        $id_user = $kode;
        $nama_user = $post["nama"];
        $username_user = $post["username"];
        $password_user = $post["password"];
        $level_user = $post["level"];
        return $this->db->query("INSERT INTO user VALUES('$id_user','$nama_user','$username_user',md5('$password_user'),'$level_user')");
    }

    public function update()
    {
        $post = $this->input->post();
        $id_user = $post["kode"];
        $nama_user = $post["nama"];
        $username_user = $post["username"];
        $password_user = $post["password"];
        $level_user = $post["level"];
        return $this->db->query("UPDATE user SET nama_user='$nama_user',username_user='$username_user',password_user=md5('$password_user') ,level_user='$level_user' where id_user='$id_user'");
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_user" => $id));
    }
}
