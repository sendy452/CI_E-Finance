<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');
		$this->load->model('TransaksiModel');
	}

    public function home($where)
    {
        $data = array(
            'pendapatan' =>  $this->TransaksiModel->terakhirPendapatan($where),
            'total' => $this->TransaksiModel->totalPendapatan($where),
            'pengeluaran' => $this->TransaksiModel->terakhirPengeluaran($where),
            'total2' => $this->TransaksiModel->totalPengeluaran($where),
            'aktif' => $this->TransaksiModel->aktifTerakhir($where),
            'keterangan' => $this->TransaksiModel->keterangan($where),
            'success' => 1,
        );
        
        echo json_encode($data);
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
        $cek = $this->UserModel->get_user($where);
            if ($cek != FALSE) {
                echo json_encode($cek);
            } else {
                $array = array('message' => 'wrong user' );
                echo json_encode($array);
            }
    }
    public function update($where)
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $nohp = $this->input->post('noHP');

        $this->form_validation->set_rules('username', 'Username', 'required');
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
            );
            
            $this->UserModel->proses_update($where, $data);

            $datauser = array(
                'username' => $username,
                'pass' => $password,
                'nama' => $nama,
                'email' => $email,
                'noHP' => $nohp,
                'message' => 'Sukses Update',
            );
            echo json_encode($datauser);
        }else{
            echo json_encode(strip_tags(str_replace("\n", '', validation_errors())));
        }
    }
    public function laporan($where)
    {
        $data = array(
            'query1' => $this->TransaksiModel->transPendapatan($where),
            'jumlahmasuk' => $this->TransaksiModel->totalPendapatan($where),
            'query2' => $this->TransaksiModel->transPengeluaran($where),
            'jumlahkeluar' => $this->TransaksiModel->totalPengeluaran($where),
        );
        echo json_encode($data);
    }
    public function laporkan()
    {
        $judul = $this->input->post('judul');
        $isi = $this->input->post('isi');
        $user = $this->input->post('user');
        $email = $this->input->post('email');

        $data = array(
            'username' => $user,
            'email' => $email,
            'judul'  => $judul,
            'isi' => $isi,
        );
        
        $this->UserModel->proses_laporkan($data);
        redirect('h');
    }
     public function pendapatan($where)
    {
        $cek = $this->TransaksiModel->get_pemasukan($where);
            if ($cek != FALSE) {
                echo json_encode($cek);
            } else {
                $array = array('error' => 'Data Pemasukan Kosong' );
                echo json_encode($array);
            }
    }
    public function insert_pendapatan($id_user)
    {
        $tgl = $this->input->post('tgl_pemasukan');
        $jumlah = $this->input->post('jumlah');
        $keterangan = $this->input->post('keterangan');

        

            $data = array(
                'tgl_pemasukan' => $tgl,
                'jumlah' => $jumlah,
                'keterangan' => $keterangan,
                'id_user' => $id_user
            );
            
            $this->TransaksiModel->insert_pemasukan($data);
            echo json_encode($data);
        }
    
    public function update_pendapatan()
    {
        $id = $this->input->post('id_pemasukan');
        $tgl = $this->input->post('tgl_pemasukan');
        $jumlah = $this->input->post('jumlah');
        $ket = $this->input->post('keterangan');

        $this->form_validation->set_rules('id_pemasukan', 'ID Pemasukan', 'required');
        $this->form_validation->set_rules('tgl_pemasukan', 'Tanggal', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah Nominal', 'required');
        if ($this->form_validation->run() == TRUE){

            $data = array(
                'tgl_pemasukan' => $tgl,
                'jumlah' => $jumlah,
                'keterangan' => $ket,
            );
            
            $this->TransaksiModel->update_pemasukan($id, $data);
            echo json_encode($data);
        }else{
            echo json_encode(strip_tags(str_replace("\n", ' ', validation_errors())));
        }
    }
    public function hapus_pendapatan($id)
    {
        if($this->TransaksiModel->hapus_pemasukan($id) == FALSE){
            $data = 'Sukses Hapus';
            echo json_encode($data);
        } else {
            $data = 'Gagal Hapus';
            echo json_encode($data);
        }
    }
    public function pengeluaran($where)
    {
        $cek = $this->TransaksiModel->get_pengeluaran($where);
            if ($cek != FALSE) {
                echo json_encode($cek);
            } else {
                $array = array('error' => 'Data Pengeluaran Kosong' );
                echo json_encode($array);
            }
    }
    public function insert_pengeluaran($id_user)
    {
        $tgl = $this->input->post('tgl_pengeluaran');
        $jumlah = $this->input->post('jumlah');
        $keterangan = $this->input->post('keterangan');

        

            $data = array(
                'tgl_pengeluaran' => $tgl,
                'jumlah' => $jumlah,
                'keterangan' => $keterangan,
                'id_user' => $id_user
            );
            
            $this->TransaksiModel->insert_pengeluaran($data);
            echo json_encode($data);
        }
    
    public function update_pengeluaran()
    {
        $id = $this->input->post('id_pengeluaran');
        $tgl = $this->input->post('tgl_pengeluaran');
        $jumlah = $this->input->post('jumlah');
        $ket = $this->input->post('keterangan');

        $this->form_validation->set_rules('id_pengeluaran', 'ID Pemasukan', 'required');
        $this->form_validation->set_rules('tgl_pengeluaran', 'Tanggal', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah Nominal', 'required');
        if ($this->form_validation->run() == TRUE){

            $data = array(
                'tgl_pengeluaran' => $tgl,
                'jumlah' => $jumlah,
                'keterangan' => $ket,
            );
            
            $this->TransaksiModel->update_pengeluaran($id, $data);
            echo json_encode($data);
        }else{
            echo json_encode(strip_tags(str_replace("\n", ' ', validation_errors())));
        }
    }
    public function hapus_pengeluaran($id)
    {
        if($this->TransaksiModel->hapus_pengeluaran($id) == FALSE){
            $data = 'Sukses Hapus';
            echo json_encode($data);
        } else {
            $data = 'Gagal Hapus';
            echo json_encode($data);
        }
    }
     public function exportPendapatan($where)
    {
        $cek = $this->TransaksiModel->get_pemasukan($where);
        $result = array();
        foreach ($cek as $row) {
            $result[] = array(
                $row->id_pemasukan,$row->tgl_pemasukan,$row->jumlah,$row->keterangan,
            );
        }
        print_r(json_encode($result));   
    }
     public function exportPengeluaran($where)
    {
        $cek = $this->TransaksiModel->get_pengeluaran($where);
        $result = array();
        foreach ($cek as $row) {
            $result[] = array(
                $row->id_pengeluaran,$row->tgl_pengeluaran,$row->jumlah,$row->keterangan,
            );
        }
        print_r(json_encode($result)); 
    }
    public function prosesLaporkan()
    {
        $judul = $this->input->post('judul');
        $isi = $this->input->post('isi');
        $user = $this->input->post('user');
        $email = $this->input->post('email');

        $data = array(
            'username' => $user,
            'email' => $email,
            'judul'  => $judul,
            'isi' => $isi,
        );
        $this->UserModel->proses_laporkan($data);
        print_r(json_encode($data)); 
    }
}

/* End of file api.php */
/* Location: ./application/controllers/api.php */