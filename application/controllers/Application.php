<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Application extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('app');
	}

	public function index()
	{
		$data['tentang']=$this->app->get_all("tentang_kami")->row();
		$data['donasi']=$this->app->get_where("donasi",array('status' => 'valid'));
		$data['penyaluran']=$this->app->get_all("pengeluaran");
		$data['bank']=$this->app->get_all("bank");
		$data['jumlahuangperbank']=$this->db->query("SELECT bank.bank,sum(donasi.jumlah) as jumlahUang FROM `donasi` inner join bank on(bank.idBank=donasi.idBank) where donasi.status='valid'")->row();
		$data['jumlahuangkeluar']=$this->db->query("SELECT sum(jumlah) as jumlahuang from pengeluaran")->row();
		$this->load->view('header');
		$this->load->view('index',$data);
		$this->load->view('footer');
	}

}
