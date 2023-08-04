<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Senddonasi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('app');
	}

	public function index()
	{
		$url=base_url()."#donate";
		date_default_timezone_set('Asia/Jakarta');
        $harivar=date("Y-m-d h:i:s");

		$nama="";
		if($this->input->post('anonim')=="anonim"){
			$nama="Nama Disamarkan";
		}else{
			$nama=$this->input->post('nama');
		}

		if($this->input->post('tempfile')==""){

			$data = array('idBank' => $this->input->post('bank',TRUE),
						  'tanggal' => $harivar,
						  'nama' => $this->input->post('nama'),
						  'namaPublish' => $nama,
						  'email' => $this->input->post('email',TRUE),
						  'jumlah' => $this->input->post('jumlah',TRUE),
						  'bukti' => "",
						  'status' => 'konfirmasi'
						  );
			
			$this->app->insert('donasi', $data);
			$this->session->set_flashdata('sukses', "Laporan anda telah terkirim");
			redirect($url,'refresh');
		}else{

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
						  'status' => 'konfirmasi'
						  );

					$this->app->insert('donasi', $data);
					$this->session->set_flashdata('sukses', "Laporan anda telah terkirim");
					redirect($url,'refresh');
				}else{
					$this->session->set_flashdata('alert', $this->upload->display_errors());
					redirect($url,'refresh');
				}
				
			}

		}
	}

}
