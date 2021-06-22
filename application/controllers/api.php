<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');
		$this->load->model('TransaksiModel');
	}

	public function login()
	{
		
	}
	public function register()
	{
		// code...
	}

}

/* End of file api.php */
/* Location: ./application/controllers/api.php */