<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
{

	function in($user, $pass)
	{
		return $this->db->query("SELECT * from user join level_user ON level_user=id where username_user='$user' and password_user=MD5('$pass')");
	}
}
