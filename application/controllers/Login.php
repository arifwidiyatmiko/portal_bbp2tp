<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public $tabelUser = 'admin';

	public function __construct(){
		parent::__construct();
        $this->load->model('login_m');
	}

	public function index(){
        $this->session->userdata("idAdmin");
		$this->load->view('admin/login_v');
	}

	public function login(){
		$tbl='admin';
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'namaPengguna' => $username,
			'kataSandi' => $password
			// 'baseUrl'=> base_url()
			);

		$hsl=$this->login_m->signin($where);
		$cek = $this->db->get_where('admin',array('namaPengguna' => $username, 'kataSandi' => $password))->row();
		$valid=false;
		// print_r($hsl->result()[0]);die();
		if (count($hsl->result()) > 0) {
			if ($hsl->result()[0]->url == base_url()) {
				$valid=true;
			}
		}
		

		foreach($hsl->result() as $h){
			$this->session->set_userdata('idAdmin',$h->idAdmin);
			$this->session->set_userdata('namaPengguna',$h->namaPengguna);
			$this->session->set_userdata('nama',$h->nama);
			$this->session->set_userdata('idProvinsi',$h->idProvinsi);
			$this->session->set_userdata('url',$h->url);
			$divreal;
			if ($h->idProvinsi == 11)
				$divreal = "Nanggroe Aceh Darussalam";
			else if($h->idProvinsi == 12)
				$divreal = "Sumatera Utara";
			else if($h->idProvinsi == 13)
				$divreal = "Sumatera Barat";
			else if($h->idProvinsi == 14)
				$divreal = "Riau";
			else if($h->idProvinsi == 15)
				$divreal = "Jambi";
			else if($h->idProvinsi == 16)
				$divreal = "Sumatera Selatan";
			else if($h->idProvinsi == 17)
				$divreal = "Bengkulu";
			else if($h->idProvinsi == 18)
				$divreal = "Lampung";
			else if($h->idProvinsi == 19)
				$divreal = "Kep. Bangka Belitung";
			else if($h->idProvinsi == 21)
				$divreal = "Kep. Riau";
			else if($h->idProvinsi == 31)
				$divreal = "DKI Jakarta";
			else if($h->idProvinsi == 32)
				$divreal = "Jawa Barat";
			else if($h->idProvinsi == 33)
				$divreal = "Jawa Tengah";
			else if($h->idProvinsi == 34)
				$divreal = "DI Yogyakarta";
			else if($h->idProvinsi == 35)
				$divreal = "Jawa Timur";
			else if($h->idProvinsi == 36)
				$divreal = "Banten";
			else if($h->idProvinsi == 51)
				$divreal = "Bali";
			else if($h->idProvinsi == 52)
				$divreal = "Nusa Tenggara Barat";
			else if($h->idProvinsi == 53)
				$divreal = "Nusa Tenggara Timur";
			else if($h->idProvinsi == 61)
				$divreal = "Kalimantan Barat";
			else if($h->idProvinsi == 62)
				$divreal = "Kalimantan Tengah";
			else if($h->idProvinsi == 63)
				$divreal = "Kalimantan Selatan";
			else if($h->idProvinsi == 64)
				$divreal = "Kalimantan Timur";
			else if($h->idProvinsi == 71)
				$divreal = "Sulawesi Utara";
			else if($h->idProvinsi == 72)
				$divreal = "Sulawesi Tengah";
			else if($h->idProvinsi == 73)
				$divreal = "Sulawesi Selatan";
			else if($h->idProvinsi == 74)
				$divreal = "Sulawesi Tenggara";
			else if($h->idProvinsi == 75)
				$divreal = "Gorontalo";
			else if($h->idProvinsi == 76)
				$divreal = "Sulawesi Barat";
			else if($h->idProvinsi == 81)
				$divreal = "Maluku";
			else if($h->idProvinsi == 82)
				$divreal = "Maluku Utara";
			else if($h->idProvinsi == 91)
				$divreal = "Papua Barat";
			else
				$divreal = "Papua";

			$this->session->set_userdata('provinsi',$divreal);

			
		}
		if($valid){
			if($cek->idTingkat == 1){
				redirect('login/admin_index');
			}else if($cek->idTingkat == 2){
				redirect('login/progev_index');
			}else if($cek->idTingkat == 3){
				redirect('login/tu_index');
			}else if($cek->idTingkat == 4){
				redirect('login/ksphp_index');
			}else if($cek->idTingkat == 5){
				redirect('login/bptp_index');
			}
		}else{
			$this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
			// $this->load->view('admin/login_v');
			redirect('Login','refresh');
		}
	}

	public function admin_index(){
					redirect('dashboard');
	}

	public function progev_index(){
					redirect('program');
	}

	public function tu_index(){
					redirect('tatausaha');
	}

	public function ksphp_index(){
					redirect('ksphp');
	}

	public function bptp_index(){
					redirect('bptp');
	}

	public function logout(){
        $this->session->sess_destroy();
		$this->load->view('login_v');
	}


	/* public function proses(){
		$this->form_validation->set_rules('username', 'namaPengguna', 'required|trim|xss_clean');
        $this->form_validation->set_rules('password', 'kataSandi', 'required|trim|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/login_v');
        } else {

            $usr = $this->input->post('username'); //input
            $psw = $this->input->post('password'); //input
            $u = mysql_real_escape_string($usr);
            $p = mysql_real_escape_string($psw);
            // $p = md5(mysql_real_escape_string($psw));
            $cek = $this->login_m->cek($u, $p);
            if ($cek->num_rows() > 0) {
                //login berhasil, buat session
                foreach ($cek->result() as $qad) {
                    $sess_data['idAmin'] = $qad->idAmin;
                    $sess_data['nama'] = $qad->nama;
                    $sess_data['namaPengguna'] = $qad->namaPengguna;
                    $sess_data['idTingkat'] = $qad->idTingkat;
                    $sess_data['idProvinsi'] = $qad->idProvinsi;
                    $this->session->set_userdata($sess_data);
                }
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
                redirect('login');
            }
        }
	}

	/* function logout() {
        $this->session->sess_destroy();
        redirect('login');
    } */
}