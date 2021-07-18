<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiModel extends CI_Model {

	public function terakhirPendapatan($id_user)
    {
    	$query = $this->db->query("SELECT jumlah, CASE WHEN jumlah = 0 THEN 0 END FROM pemasukan WHERE id_user = ".$id_user." ORDER BY tgl_pemasukan DESC, id_pemasukan DESC");
    	return $query->row()->jumlah;
    }
    public function terakhirPendapatanWeb($id_user)
    {
    	$query = $this->db->query("SELECT jumlah AS jumlah FROM pemasukan WHERE id_user = ".$id_user." ORDER BY tgl_pemasukan DESC, id_pemasukan DESC");
    	return $query->row()->jumlah;
    }
	public function totalPendapatan($id_user)
	{
    	$query = $this->db->select('SUM(jumlah) AS total')->from('pemasukan')->where('id_user', $id_user)->get();
    	return $query->row()->total;
    }
    public function terakhirPengeluaran($id_user)
    {
    	$query = $this->db->query("SELECT jumlah, CASE WHEN jumlah = 0 THEN 0 END FROM pengeluaran WHERE id_user = ".$id_user." ORDER BY tgl_pengeluaran DESC, id_pengeluaran DESC");
    	return $query->row()->jumlah;
    }
     public function terakhirPengeluaranWeb($id_user)
    {
    	$query = $this->db->query("SELECT jumlah AS jumlah FROM pengeluaran WHERE id_user = ".$id_user." ORDER BY tgl_pengeluaran DESC, id_pengeluaran DESC");
    	return $query->row()->jumlah;
    }
    public function totalPengeluaran($id_user)
	{
    	$query = $this->db->select('SUM(jumlah) AS total')->from('pengeluaran')->where('id_user', $id_user)->get();
    	return $query->row()->total;
    }
    public function aktifTerakhir($id_user)
    {
    	$query = $this->db->query("SELECT IF(tgl_pengeluaran > tgl_pemasukan, pengeluaran.keterangan, pemasukan.keterangan) AS aktivitas FROM pemasukan JOIN pengeluaran WHERE pemasukan.id_user = ".$id_user." AND pengeluaran.id_user = ".$id_user." ORDER BY tgl_pemasukan DESC, id_pemasukan DESC, tgl_pengeluaran DESC, id_pengeluaran DESC LIMIT 1");
    	return $query->row()->aktivitas;
    }
    public function keterangan($id_user)
    {
    	$query = $this->db->query("SELECT IF(MAX(tgl_pengeluaran) > MAX(tgl_pemasukan),'Pengeluaran', ''), IF(MAX(tgl_pengeluaran) < MAX(tgl_pemasukan),'Pemasukan', '') AS aktivitas FROM pengeluaran LEFT JOIN pemasukan ON pengeluaran.id_user = pemasukan.id_user WHERE pengeluaran.id_user = ".$id_user." AND pemasukan.id_user = ".$id_user);
    	return $query->row()->aktivitas;
    }
	public function insert_pemasukan($data)
	{
		$this->db->insert('pemasukan', $data);
	}
	public function get_pemasukan($id)
	{
		$this->db->select('*');
		$this->db->from('pemasukan');
		$this->db->where('id_user', $id);
		$this->db->order_by('tgl_pemasukan', 'desc');
		$this->db->order_by('id_pemasukan', 'desc');
		$query = $this->db->get()->result();
		return $query;
	}
	public function update_pemasukan($where, $data)
	{
		$this->db->where('id_pemasukan',$where);
        $this->db->update('pemasukan', $data);
	}
	public function hapus_pemasukan($where)
	{
		$this->db->delete('pemasukan', ['id_pemasukan' => $where]);
	}
	public function transPendapatan($where)
	{
		$sql = "SELECT * FROM pemasukan WHERE id_user =".$where;
		$query = $this->db->query($sql);
    	return $query->num_rows();
	}
	public function insert_pengeluaran($data)
	{
		$this->db->insert('pengeluaran', $data);
	}
	public function get_pengeluaran($id)
	{
		$this->db->select('*');
		$this->db->from('pengeluaran');
		$this->db->where('id_user', $id);
		$this->db->order_by('tgl_pengeluaran', 'desc');
		$this->db->order_by('id_pengeluaran', 'desc');
		$query = $this->db->get()->result();
		return $query;
	}
	public function update_pengeluaran($where, $data)
	{
		$this->db->where('id_pengeluaran',$where);
        $this->db->update('pengeluaran', $data);
	}
	public function hapus_pengeluaran($where)
	{
		$this->db->delete('pengeluaran', ['id_pengeluaran' => $where]);
	}
	public function transPengeluaran($where)
	{
		$sql = "SELECT * FROM pengeluaran WHERE id_user =".$where;
		$query = $this->db->query($sql);
    	return $query->num_rows();
	}
}

/* End of file TransaksiModel.php */
/* Location: ./application/models/TransaksiModel.php */