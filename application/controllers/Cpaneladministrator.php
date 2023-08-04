<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpaneladministrator extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('app');
	}

	function session(){
		if($this->session->userdata('status')!="login"){
			redirect(base_url('login'));
		}
	}

	public function keluar()
	{
		$this->session->sess_destroy();

		redirect('login');
	}

	public function index()
	{
		$this->session();
		$data['donasi']=$this->app->get_where("donasi inner join bank on (bank.idBank=donasi.idBank)",array('status' => 'konfirmasi'));
		$data['jumlahdonatur']=$this->db->query("select count(idDonasi) as jumlahorang from donasi where status='valid'")->row();
		$data['jumlahdonasi']=$this->db->query("select sum(jumlah) as jumlahuang from donasi where status='valid'")->row();
		$data['jumlahpengeluaran']=$this->db->query("select sum(jumlah) as jumlahuang from pengeluaran")->row();
		$data['bank']=$this->app->get_all("bank");
		$this->load->view('cpaneladministrator/header');
		$this->load->view('cpaneladministrator/dashboard',$data);
		$this->load->view('cpaneladministrator/footer');
	}

	public function logprs()
	{
		$user = $this->input->post('pengguna', TRUE);
		$pass = md5($this->input->post('ksandi', TRUE));

		if ($user=='' || $pass==''){
			$this->session->set_flashdata('alert', "Kolom tidak boleh kosong");
			redirect('login');
		}

		$cek = $this->app->get_where('admin', array('namaPengguna' => $user));

		if ($cek->num_rows() > 0) {
			$data = $cek->row();
			if($data->kataSandi==$pass)
			{
				$cekUser = $this->app->get_where('admin', array('idAdmin' => $data->idAdmin));
				$dataSession = $cekUser->row();
				$datauser = array (
					'idAdmin' => $dataSession->idAdmin,
					'nama' => $dataSession->nama,
					'namaPengguna' => $dataSession->namaPengguna,
					'email' => $dataSession->email,
					'status' => 'login',
					'login'=>TRUE
				);
				$this->session->set_userdata($datauser);
				redirect('cpaneladministrator');
			} else {
				$this->session->set_flashdata('alert', "Password yang anda masukkan salah..");
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('alert', "Nama Pengguna Ditolak");
			redirect('login');
		}	
	}

	public function bank()
	{
		$this->session();
		
		if($this->uri->segment(3)=="tambah"){
			$this->load->view('cpaneladministrator/header');
			$this->load->view('cpaneladministrator/tambahbank');
			$this->load->view('cpaneladministrator/footer');
		}elseif($this->uri->segment(3)=="prosesimpan"){

			$cek = $this->app->get_where('bank', array('bank' => $this->input->post('bank', TRUE),'nama' => $this->input->post('nama', TRUE),'norek' => $this->input->post('norek', TRUE)));
			if ($cek->num_rows() > 0) {
				$this->session->set_flashdata('alert', "Bank ini sudah ada");
				redirect('cpaneladministrator/bank/tambah');
			}else{
				$data = array('bank' => $this->input->post('bank',TRUE),
						'nama' => $this->input->post('nama',TRUE),
						'norek' => $this->input->post('norek',TRUE)
						);
			
				$this->app->insert('bank', $data);
				$this->session->set_flashdata('sukses', "Data Berhasil Disimpan");
				redirect('cpaneladministrator/bank/tambah');
			}

		}elseif($this->uri->segment(3)=="hapus"){
			$kode=$this->input->get('bank');
			$this->app->delete('bank', ['idBank' => $kode]);
			$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
			redirect('cpaneladministrator/bank');

		}elseif($this->uri->segment(3)=="edit"){

			$cek = $this->app->get_where('bank', array('bank' => $this->input->post('bank', TRUE),'nama' => $this->input->post('nama', TRUE),'norek' => $this->input->post('norek', TRUE)));
			if ($cek->num_rows() > 0) {
				$this->session->set_flashdata('alert', "Bank ini sudah ada");
				redirect('cpaneladministrator/bank/tambah');
			}else{

				$data = array('bank' => $this->input->post('bank',TRUE),
						'nama' => $this->input->post('nama',TRUE),
						'norek' => $this->input->post('norek',TRUE)
						);
			
				$cond = array('idBank' => $this->input->post('idBank'));
				$update=$this->app->update('bank', $data, $cond);
				$this->session->set_flashdata('sukses', "Data Update");
				redirect('cpaneladministrator/bank');
			}

		}else{
			$data['data']=$this->app->get_all("bank");
			$this->load->view('cpaneladministrator/header');
			$this->load->view('cpaneladministrator/bank',$data);
			$this->load->view('cpaneladministrator/footer');
		}
	}


	public function akunadmin()
	{
		$this->session();
		if ($this->uri->segment(3)=="tambah") {
			$this->load->view('cpaneladministrator/header');
			$this->load->view('cpaneladministrator/tambahakunadmin');
			$this->load->view('cpaneladministrator/footer');
		}elseif($this->uri->segment(3)=="hapus"){
			$kode=$this->input->get('admin');
			$this->app->delete('admin', ['idAdmin' => $kode]);
			$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
			redirect('cpaneladministrator/akunadmin');
		}else{
			$data['data'] = $this->app->get_all('admin');
			$this->load->view('cpaneladministrator/header');
			$this->load->view('cpaneladministrator/admin',$data);
			$this->load->view('cpaneladministrator/footer');
		}
	}

	public function simpanakunadmin()
	{
		$this->session();
		$cek = $this->app->get_all("admin where namaPengguna='".$this->input->post('namaPengguna')."' or email='".$this->input->post('email')."'");
		if ($cek->num_rows() > 0) {
			$this->session->set_flashdata('alert', "Nama Pengguna atau Email sudah digunakan");
			redirect('cpaneladministrator/akunadmin/tambah');
		}else{
			$data = array('nama' => $this->input->post('nama',TRUE),
						  'namaPengguna' => $this->input->post('namaPengguna',TRUE),
						  'email' => $this->input->post('email',TRUE),
						  'kataSandi' => md5($this->input->post('katasandi',TRUE))
						  );
			
			$this->app->insert('admin', $data);
			$this->session->set_flashdata('sukses', "Data Berhasil Disimpan");
			redirect('cpaneladministrator/akunadmin/tambah');
		}
	}

	public function tentang()
	{
		$this->session();
		if ($this->uri->segment(3)=="tambah") {
			$this->load->view('cpaneladministrator/header');
			$this->load->view('cpaneladministrator/tambahabout');
			$this->load->view('cpaneladministrator/footer');
		}elseif($this->uri->segment(3)=="prosessimpan"){
			
			$cek = $this->app->get_all("tentang_kami");
			if ($cek->num_rows() > 0) {
				$data = array('isi' => $this->input->post('isi',TRUE));
				$id=0;
				$cond = array('idTentangKami<>'=>$id);
				$update=$this->app->update('tentang_kami', $data, $cond);
				$this->session->set_flashdata('sukses', "Data Update");
				redirect('cpaneladministrator/tentang');



			}else{
				$data = array('isi' => $this->input->post('isi',TRUE));
				
				$this->app->insert('tentang_kami', $data);
				$this->session->set_flashdata('sukses', "Data Berhasil Disimpan");
				redirect('cpaneladministrator/tentang');
			}

		}else{
			$data['data'] = $this->app->get_all('tentang_kami')->row();
			$this->load->view('cpaneladministrator/header');
			$this->load->view('cpaneladministrator/about',$data);
			$this->load->view('cpaneladministrator/footer');
		}
	}

	public function prosesvalidasi()
	{
		$this->session();

		date_default_timezone_set('Asia/Jakarta');
        $harivar=date("Y-m-d h:i:s");

		$nama="";
		if($this->input->post('anonim')=="anonim"){
			$nama="Nama Disamarkan";
		}else{
			$nama=$this->input->post('nama');
		}

		$config['upload_path']          = './template/images/buktitransfer';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 100000;
		$this->load->library('upload', $config);
		if (!empty($_FILES['bukti_transfer']['name'])) {
			

			if ($this->upload->do_upload('bukti_transfer')) {
				$upload_data = $this->upload->data();
				$namaFile=$upload_data['file_name'];

				$data = array('idBank' => $this->input->post('bank',TRUE),
					  'tanggal' => $harivar,
					  'nama' => $this->input->post('nama'),
					  'namaPublish' => $nama,
					  'email' => $this->input->post('email',TRUE),
					  'jumlah' => $this->input->post('jumlah',TRUE),
					  'bukti' => $namaFile,
					  'status' => $this->input->post('valid',TRUE)
					  );

					$cond = array('idDonasi'=>$this->input->post('idDonasi',TRUE));
					$update=$this->app->update('donasi', $data, $cond);
					$this->session->set_flashdata('sukses', "Konfirmasi diterima");
					redirect('cpaneladministrator');
			}else{
				$this->session->set_flashdata('alert', $this->upload->display_errors());
				redirect('cpaneladministrator','refresh');
			}
			
		}else{
			$data = array('idBank' => $this->input->post('bank',TRUE),
					  'tanggal' => $harivar,
					  'nama' => $this->input->post('nama'),
					  'namaPublish' => $nama,
					  'email' => $this->input->post('email',TRUE),
					  'jumlah' => $this->input->post('jumlah',TRUE),
					  'bukti' => $this->input->post('bukti',TRUE),
					  'status' => $this->input->post('valid',TRUE)
					  );
		
			$cond = array('idDonasi'=>$this->input->post('idDonasi',TRUE));
			$update=$this->app->update('donasi', $data, $cond);
			$this->session->set_flashdata('sukses', "Konfirmasi diterima");
			redirect('cpaneladministrator');
		}
	}

	public function donasi()
	{
		$this->session();
		$data['bank']=$this->app->get_all("bank");
		$data['donasi']=$this->app->get_where("donasi inner join bank on (bank.idBank=donasi.idBank)",array('status<>' => 'konfirmasi'));
		$this->load->view('cpaneladministrator/header');
		$this->load->view('cpaneladministrator/donasi',$data);
		$this->load->view('cpaneladministrator/footer');
	}

	public function tambahdonasi()
	{
		date_default_timezone_set('Asia/Jakarta');
        $harivar=date("Y-m-d h:i:s");

		$nama="";
		if($this->input->post('anonim')=="anonim"){
			$nama="Nama Disamarkan";
		}else{
			$nama=$this->input->post('nama');
		}

		$config['upload_path']          = './template/images/buktitransfer';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 100000;
		$this->load->library('upload', $config);
		if (!empty($_FILES['bukti_transfer']['name'])) {
			

			if ($this->upload->do_upload('bukti_transfer')) {
				$upload_data = $this->upload->data();
				$namaFile=$upload_data['file_name'];

				$data = array('idBank' => $this->input->post('bank',TRUE),
					  'tanggal' => $harivar,
					  'nama' => $this->input->post('nama'),
					  'namaPublish' => $nama,
					  'email' => $this->input->post('email',TRUE),
					  'jumlah' => $this->input->post('jumlah',TRUE),
					  'bukti' => $namaFile,
					  'status' => 'valid'
					  );

				$this->app->insert('donasi', $data);
				$this->session->set_flashdata('sukses', "Laporan anda telah terkirim");
				redirect('cpaneladministrator/donasi','refresh');
			}else{
				$this->session->set_flashdata('alert', $this->upload->display_errors());
				redirect('cpaneladministrator/donasi','refresh');
			}
			
		}else{
			$data = array('idBank' => $this->input->post('bank',TRUE),
					  'tanggal' => $harivar,
					  'nama' => $this->input->post('nama'),
					  'namaPublish' => $nama,
					  'email' => $this->input->post('email',TRUE),
					  'jumlah' => $this->input->post('jumlah',TRUE),
					  'bukti' => "",
					  'status' => 'valid'
					  );
		
		$this->app->insert('donasi', $data);
		$this->session->set_flashdata('sukses', "Laporan anda telah terkirim");
		redirect('cpaneladministrator/donasi','refresh');
		}
	}


	public function penyaluran()
	{
		$this->session();
		$data['bank']=$this->app->get_all("bank");
		$data['penyaluran']=$this->app->get_all("pengeluaran");
		$this->load->view('cpaneladministrator/header');
		$this->load->view('cpaneladministrator/pengeluaran',$data);
		$this->load->view('cpaneladministrator/footer');
	}

	public function tambahpengeluaran()
	{
		$this->session();
		date_default_timezone_set('Asia/Jakarta');
        $harivar=date("Y-m-d h:i:s");

		$data = array('tanggal' => $this->input->post('tanggal',TRUE),
					  'judul' => $this->input->post('judul',TRUE),
					  'jumlah' => $this->input->post('jumlah',TRUE),
					  'ket' => $this->input->post('ket',TRUE)
					  );
		
		$this->app->insert('pengeluaran', $data);
		$this->session->set_flashdata('sukses', "Data Berhasil Disimpan");
		redirect('cpaneladministrator/penyaluran');
		
	}

	public function editpengeluaran()
	{
		$this->session();
		date_default_timezone_set('Asia/Jakarta');
        $harivar=date("Y-m-d h:i:s");

		$data = array('tanggal' => $this->input->post('tanggal',TRUE),
					  'judul' => $this->input->post('judul',TRUE),
					  'jumlah' => $this->input->post('jumlah',TRUE),
					  'ket' => $this->input->post('ket',TRUE)
					  );

		$cond = array('idpengeluaran'=>$this->input->post('idpengeluaran',TRUE));
		$update=$this->app->update('pengeluaran', $data, $cond);
		$this->session->set_flashdata('sukses', "Konfirmasi diterima");
		redirect('cpaneladministrator/penyaluran');
	}

	public function hapuspengeluaran()
	{
		$kode=$this->input->get('edit');
		$this->app->delete('pengeluaran', ['idpengeluaran' => $kode]);
		$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
		redirect('cpaneladministrator/penyaluran');
	}


	public function prosesvalidasi2()
	{
		$this->session();

		date_default_timezone_set('Asia/Jakarta');
        $harivar=date("Y-m-d h:i:s");

		$nama="";
		if($this->input->post('anonim')=="anonim"){
			$nama="Nama Disamarkan";
		}else{
			$nama=$this->input->post('nama');
		}

		$config['upload_path']          = './template/images/buktitransfer';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 100000;
		$this->load->library('upload', $config);
		if (!empty($_FILES['bukti_transfer']['name'])) {
			

			if ($this->upload->do_upload('bukti_transfer')) {
				$upload_data = $this->upload->data();
				$namaFile=$upload_data['file_name'];

				$data = array('idBank' => $this->input->post('bank',TRUE),
					  'tanggal' => $harivar,
					  'nama' => $this->input->post('nama'),
					  'namaPublish' => $nama,
					  'email' => $this->input->post('email',TRUE),
					  'jumlah' => $this->input->post('jumlah',TRUE),
					  'bukti' => $namaFile,
					  'status' => $this->input->post('valid',TRUE)
					  );

					$cond = array('idDonasi'=>$this->input->post('idDonasi',TRUE));
					$update=$this->app->update('donasi', $data, $cond);
					$this->session->set_flashdata('sukses', "Konfirmasi diterima");
					redirect('cpaneladministrator/donasi');
			}else{
				$this->session->set_flashdata('alert', $this->upload->display_errors());
				redirect('cpaneladministrator/donasi','refresh');
			}
			
		}else{
			$data = array('idBank' => $this->input->post('bank',TRUE),
					  'tanggal' => $harivar,
					  'nama' => $this->input->post('nama'),
					  'namaPublish' => $nama,
					  'email' => $this->input->post('email',TRUE),
					  'jumlah' => $this->input->post('jumlah',TRUE),
					  'bukti' => $this->input->post('bukti',TRUE),
					  'status' => $this->input->post('valid',TRUE)
					  );
		
			$cond = array('idDonasi'=>$this->input->post('idDonasi',TRUE));
			$update=$this->app->update('donasi', $data, $cond);
			$this->session->set_flashdata('sukses', "Konfirmasi diterima");
			redirect('cpaneladministrator/donasi');
		}
	}


}
