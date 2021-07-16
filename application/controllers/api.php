<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');
		$this->load->model('TransaksiModel');
	}
    
	public function register()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $nohp = $this->input->post('nohp');

        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        if ($this->form_validation->run() == TRUE){

            $data = array(
                'username' => $username,
                'pass' => $password,
                'nama' => $nama,
                'email' => $email,
                'noHP' => $nohp,
                'type' => "User",
                'status' => 1,
            );
            
            $this->UserModel->proses_register($data);
            $pesan = array(
                'message' => 'Register Success',
                'success' => 1
            );
            echo json_encode($pesan);
        }else{
            echo json_encode(strip_tags(str_replace("\n", '', validation_errors())));
        }
    }
    public function login()
	{
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == TRUE){
            $cek = $this->UserModel->proses_login($username, $password)->result();
            if ($cek != FALSE) {
                $cek = $this->UserModel->proses_login($username, $password)->row();
                $array = array(
                    'id_user' => $cek->id_user,
                    'username' => $cek->username,
                    'nama' => $cek->nama,
                    'email' => $cek->email,
                    'status' => $cek->status,
                    'error' => 'Login Succsess',
                    );
                echo json_encode($array);
            } else {
                $array = array('error' => 'wrong username or password' );
                echo json_encode($array);
            }
        }else{
            echo json_encode(strip_tags(str_replace("\n", '', validation_errors())));
        }
    }
    public function profil($where)
    {
        $cek = $this->UserModel->get_user($where)->result();
            if ($cek != FALSE) {
                echo json_encode($cek);
            } else {
                $array = array('error' => 'wrong user' );
                echo json_encode($array);
            }

    }
    public function update($where)
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $type = $this->input->post('type');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('type', 'Tipe', 'required');
        if ($this->form_validation->run() == TRUE){

            $data = array(
                'username' => $username,
                'pass' => $password,
                'nama' => $nama,
                'email' => $email,
                'type' => $type,
            );
            
            $this->UserModel->proses_update($where, $data);
            echo json_encode($data);
        }else{
            echo json_encode(strip_tags(str_replace("\n", '', validation_errors())));
        }
    }
    public function logout(){
      //delete all session
      session_destroy();
      $this->output->set_output(json_encode(array('status'=>true,'msg'=>'log Out successfully')));
    }

    public function pemasukan($where)
    {
        $cek = $this->TransaksiModel->get_pemasukan($where);
            if ($cek != FALSE) {
                echo json_encode($cek);
            } else {
                $array = array('error' => 'Data Pemasukan Kosong' );
                echo json_encode($array);
            }
    }
    public function input_pemasukan()
    {
        $tgl = $this->input->post('tgl_pemasukan');
        $jumlah = $this->input->post('jumlah');
        $keterangan = $this->input->post('keterangan');
        $id_user = $this->input->post('id_user');

        $this->form_validation->set_rules('tgl_pemasukan', 'Tanggal Pemasukan', 'required');
        $this->form_validation->set_rules('jumlah', 'Nama', 'required');
        $this->form_validation->set_rules('keterangan', 'email', 'required');
        $this->form_validation->set_rules('id_user', 'ID', 'required');
        if ($this->form_validation->run() == TRUE){

            $data = array(
                'tgl_pemasukan' => $tgl,
                'jumlah' => $jumlah,
                'keterangan' => $keterangan,
                'id_user' => $id_user
            );
            
            $this->TransaksiModel->insert_pemasukan($data);
            echo json_encode($data);
        }else{
            echo json_encode(strip_tags(str_replace("\n", ' ', validation_errors())));
        }
    }

}

/* End of file api.php */
/* Location: ./application/controllers/api.php */