<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class H extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->model('TransaksiModel');
    }
	public function index()
	{
        if($this->session->userdata('login')==TRUE){
            $data['judul'] = "Dashboard";
            $data['pendapatan'] = $this->TransaksiModel->terakhirPendapatan($this->session->userdata('session_id'));
            $data['total'] = $this->TransaksiModel->totalPendapatan($this->session->userdata('session_id'));
            $data['pengeluaran'] = $this->TransaksiModel->terakhirPengeluaran($this->session->userdata('session_id'));
            $data['total2'] = $this->TransaksiModel->totalPengeluaran($this->session->userdata('session_id'));
            $data['aktif'] = $this->TransaksiModel->aktifTerakhir($this->session->userdata('session_id'));
            $data['keterangan'] = $this->TransaksiModel->keterangan($this->session->userdata('session_id'));
            $this->template->views('dashboard', $data);
        } else {
            $this->load->view('login');
        }
	}
	public function pendapatan()
	{
		$data['judul'] = "Pendapatan";
        $data['cek'] = $this->TransaksiModel->get_pemasukan($this->session->userdata('session_id'));
		$this->template->views('pendapatan', $data);
	}
    public function insert_pendapatan()
    {
        $id = $this->input->post('id_user');
        $tgl = $this->input->post('tgl_pemasukan');
        $jumlah = $this->input->post('jumlah');
        $ket = $this->input->post('keterangan');

        $this->form_validation->set_rules('tgl_pemasukan', 'Tanggal', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah Nominal', 'required');
        if ($this->form_validation->run() == TRUE){

            $data = array(
                'id_user' => $id,
                'tgl_pemasukan' => $tgl,
                'jumlah' => $jumlah,
                'keterangan' => $ket,
            );
            
            $this->session->set_flashdata('pesan', "Sukses Menambah Data Pendapatan");
            $this->TransaksiModel->insert_pemasukan($data);
            redirect('h/pendapatan','refresh');
        }else{
            $this->session->set_flashdata('error', validation_errors());
            redirect('h/pendapatan');
        }
    }
    public function update_pendapatan()
    {
        $id = $this->input->post('id_pemasukan');
        $tgl = $this->input->post('tgl_pemasukan');
        $jumlah = $this->input->post('jumlah');
        $ket = $this->input->post('keterangan');

        $this->form_validation->set_rules('tgl_pemasukan', 'Tanggal', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah Nominal', 'required');
        if ($this->form_validation->run() == TRUE){

            $data = array(
                'tgl_pemasukan' => $tgl,
                'jumlah' => $jumlah,
                'keterangan' => $ket,
            );
            
            $this->session->set_flashdata('pesan', "Sukses Update Data Pendapatan");
            $this->TransaksiModel->update_pemasukan($id, $data);
            redirect('h/pendapatan','refresh');
        }else{
            $this->session->set_flashdata('error', validation_errors());
            redirect('h/pendapatan');
        }
    }
    public function hapus_pendapatan($id)
    {
        if($this->TransaksiModel->hapus_pemasukan($id) == FALSE){
            $this->session->set_flashdata('pesan', 'Data Pendapatan Berhasil Dihapus');
            redirect('h/pendapatan');
        } else {
            $this->session->set_flashdata('error', 'Data Pendapatan Gagal Dihapus');
            redirect('h/pendapatan');
        }
    }
	public function pengeluaran()
    {
        $data['judul'] = "Pengeluaran";
        $data['cek'] = $this->TransaksiModel->get_pengeluaran($this->session->userdata('session_id'));
        $this->template->views('pengeluaran', $data);
    }
    public function insert_pengeluaran()
    {
        $id = $this->input->post('id_user');
        $tgl = $this->input->post('tgl_pengeluaran');
        $jumlah = $this->input->post('jumlah');
        $ket = $this->input->post('keterangan');

        $this->form_validation->set_rules('tgl_pengeluaran', 'Tanggal', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah Nominal', 'required');
        if ($this->form_validation->run() == TRUE){

            $data = array(
                'id_user' => $id,
                'tgl_pengeluaran' => $tgl,
                'jumlah' => $jumlah,
                'keterangan' => $ket,
            );
            
            $this->session->set_flashdata('pesan', "Sukses Menambah Data Pendapatan");
            $this->TransaksiModel->insert_pengeluaran($data);
            redirect('h/pengeluaran','refresh');
        }else{
            $this->session->set_flashdata('error', validation_errors());
            redirect('h/pengeluaran');
        }
    }
    public function update_pengeluaran()
    {
        $id = $this->input->post('id_pengeluaran');
        $tgl = $this->input->post('tgl_pengeluaran');
        $jumlah = $this->input->post('jumlah');
        $ket = $this->input->post('keterangan');

        $this->form_validation->set_rules('tgl_pengeluaran', 'Tanggal', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah Nominal', 'required');
        if ($this->form_validation->run() == TRUE){

            $data = array(
                'tgl_pengeluaran' => $tgl,
                'jumlah' => $jumlah,
                'keterangan' => $ket,
            );
            
            $this->session->set_flashdata('pesan', "Sukses Update Data Pendapatan");
            $this->TransaksiModel->update_pengeluaran($id, $data);
            redirect('h/pengeluaran','refresh');
        }else{
            $this->session->set_flashdata('error', validation_errors());
            redirect('h/pengeluaran');
        }
    }
    public function hapus_pengeluaran($id)
    {
        if($this->TransaksiModel->hapus_pengeluaran($id) == FALSE){
            $this->session->set_flashdata('pesan', 'Data Pengeluaran Berhasil Dihapus');
            redirect('h/pengeluaran');
        } else {
            $this->session->set_flashdata('error', 'Data Pengeluaran Gagal Dihapus');
            redirect('h/pengeluaran');
        }
    }
	public function laporan()
	{
		$data['judul'] = "Laporan";
        $data['query1'] = $this->TransaksiModel->transPendapatan($this->session->userdata('session_id'));
        $data['jumlahmasuk'] = $this->TransaksiModel->totalPendapatan($this->session->userdata('session_id'));
        $data['query2'] = $this->TransaksiModel->transPengeluaran($this->session->userdata('session_id'));
        $data['jumlahkeluar'] = $this->TransaksiModel->totalPengeluaran($this->session->userdata('session_id'));
		$this->template->views('laporan', $data);
	}
    public function exportPendapatan()
    {
        $data['cek'] = $this->TransaksiModel->get_pemasukan($this->session->userdata('session_id'));
        $this->load->view('exportPendapatan', $data);
    }
    public function exportPengeluaran()
    {
        $data['cek'] = $this->TransaksiModel->get_pengeluaran($this->session->userdata('session_id'));
        $this->load->view('exportPengeluaran', $data);
    }
	public function register()
    {
        if($this->session->userdata('login')==TRUE){
            redirect('h');
        } else {
            $this->load->view('register');
        }
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
        redirect('h');
    }
    public function prosesRegister()
    {
    	$username = $this->input->post('user');
        $password = $this->input->post('pass');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $nohp = $this->input->post('nohp');

        $this->form_validation->set_rules('user', 'Username', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('pass', 'Password', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        if ($this->form_validation->run() == TRUE){

            $data = array(
                'username' => $username,
                'pass' => $password,
                'nama' => $nama,
                'email' => $email,
                'noHP'  => $nohp,
                'type' => "User",
                'status' => 1
            );
            
            $this->UserModel->proses_register($data);
            redirect('h/login','refresh');
        }else{
            $this->session->set_flashdata('error', validation_errors());
            redirect('h/register','refresh');
        }
    }
    public function login()
	{
       if($this->session->userdata('login')==TRUE){
            redirect('h');
        } else {
            $this->load->view('login');
        }
    }
    public function prosesLogin()
    {
    	 $username = $this->input->post('user');
        $password = $this->input->post('pass');
        $this->form_validation->set_rules('user', 'Username', 'required');
        $this->form_validation->set_rules('pass', 'Password', 'required');
        if ($this->form_validation->run() == TRUE)
                {
            $cek = $this->UserModel->proses_login($username, $password)->result();
            if ($cek != FALSE) {
                foreach ($cek as $row) {
                    $user = $row->username;
                    $type = $row->type;
                    $nama = $row->nama;
                    $email = $row->email;
                    $id = $row->id_user;
                }
                $this->session->set_userdata('session_id', $id);
                $this->session->set_userdata('session_user', $user);
                $this->session->set_userdata('session_grup', $type);
                $this->session->set_userdata('session_nama', $nama);
                $this->session->set_userdata('session_email', $email);
                $this->session->set_userdata('login', TRUE);
                
                redirect('h', 'refresh');
            } else {
                $this->session->set_flashdata('error','Username atau Password Salah' );
                redirect('h/login');
            }
        }else{
            $this->session->set_flashdata('error', validation_errors());
            redirect('h/login','refresh');
        }
    }
    public function logout()
    {
        session_destroy();
        redirect('h','refresh');
    }
    public function profile()
    {
        $data['judul'] = "Profil";
        $data['user'] = $this->UserModel->get_user($this->session->userdata('session_id'));
        $this->template->views('profil', $data);
    }
    public function update_profile()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $hp = $this->input->post('nohp');
        $email = $this->input->post('email');
        $pass = $this->input->post('pass');

        $this->form_validation->set_rules('nama', 'Nama Anda', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('pass', 'Password', 'required');
        if ($this->form_validation->run() == TRUE){

            $data = array(
                'nama' => $nama,
                'noHP' => $hp,
                'email' => $email,
                'pass' => $pass,
            );
            
            $this->session->set_flashdata('pesan', "Sukses Update Data Profil");
            $this->UserModel->proses_update($id, $data);
            redirect('h/profile','refresh');
        }else{
            $this->session->set_flashdata('error', validation_errors());
            redirect('h/profile');
        }
    }
    public function laporanUser()
    {
        $data['judul'] = "Laporan User";
        $data['lapor'] = $this->UserModel->getLaporan();
        $this->template->views('laporkan', $data);
    }
    public function dataUsers()
    {
        $data['judul'] = "Data User";
        $data['user'] = $this->UserModel->getUser();
        $this->template->views('data_user', $data);
    }
    public function hapusUser($id)
    {
        if($this->UserModel->hapus_user($id) == FALSE){
            $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
            redirect('h/dataUsers');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Dihapus');
            redirect('h/dataUsers');
        }
    }
    public function update_user()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $hp = $this->input->post('nohp');
        $email = $this->input->post('email');
        $pass = $this->input->post('pass');
        $tipe = $this->input->post('tipe');

        $this->form_validation->set_rules('nama', 'Nama Anda', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('pass', 'Password', 'required');
        $this->form_validation->set_rules('tipe', 'Tipe Akun', 'required');
        if ($this->form_validation->run() == TRUE){

            $data = array(
                'nama' => $nama,
                'noHP' => $hp,
                'email' => $email,
                'pass' => $pass,
                'type' => $tipe,
            );
            
            $this->session->set_flashdata('pesan', "Sukses Update Data Profil");
            $this->UserModel->proses_update($id, $data);
            redirect('h/dataUsers','refresh');
        }else{
            $this->session->set_flashdata('error', validation_errors());
            redirect('h/dataUsers');
        }
    }
}

/* End of file Base.php */
/* Location: ./application/controllers/Base.php */