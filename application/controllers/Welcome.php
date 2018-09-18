<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('crud_m');
	}

	public function index()
	{
		$this->load->view('portal_v');
	}

	public function detail()
	{
		$this->load->view('detail_v');
	}

	public function kategori()
	{
		$this->load->view('kategori_v');
	}

}
