<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class h extends CI_Controller {

	public function index()
	{
		$data['judul'] = "Dashboard";
		$this->template->views('dashboard', $data);
	}
	public function pendapatan()
	{
		$data['judul'] = "Pendapatan";
		$this->template->views('pendapatan', $data);
	}
	public function pengeluaran()
	{
		$data['judul'] = "Pengeluaran";
		$this->template->views('pengeluaran', $data);
	}
	public function laporan()
	{
		$data['judul'] = "Laporan";
		$this->template->views('laporan', $data);
	}

}

/* End of file Base.php */
/* Location: ./application/controllers/Base.php */