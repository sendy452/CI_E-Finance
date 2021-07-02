<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

	public function proses_register($data)
	{
		$this->db->insert('user', $data);
	}
	public function proses_login($username, $password)
	{
		$this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('pass', $password);
        $query = $this->db->get();
        return $query;
	}
	function get_user($where)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_user', $where);
        $query = $this->db->get();
        return $query;
    }
    function proses_update($where, $data)
    {
        $this->db->where('id_user',$where);
        $this->db->update('user', $data);
    }
}

/* End of file UserModel.php */
/* Location: ./application/models/UserModel.php */