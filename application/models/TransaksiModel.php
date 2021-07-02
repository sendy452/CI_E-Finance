<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiModel extends CI_Model {

	public function insert_pemasukan($data)
	{
		$this->db->insert('pemasukan', $data);
	}
	public function get_pemasukan($id)
	{
		$this->db->select('*');
		$this->db->from('pemasukan');
		$this->db->where('id_user', $id);
		$this->db->order_by('tgl_pemasukan', 'asc');
		$query = $this->db->get()->result();
		return $query;
	}

}

/* End of file TransaksiModel.php */
/* Location: ./application/models/TransaksiModel.php */