<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portal extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('crud_m');
        $this->load->model('login_m');
		//$this->load->model('crud_m','',TRUE);
		//$this->load->helper('url');
		//$this->load->library('upload');
        // echo base_url();die();
	}
    public function index(){
        $data['agenda'] = $this->crud_m->getAgenda();
        // print_r($data['agenda']);die();
        $data['grid'] = $this->crud_m->getAllProvince();
        $data['marquee'] = $this->crud_m->marqueeAgenda();
        // echo json_encode($data['marquee']);die();
        $data['presiden'] = $this->crud_m->getPresiden();
        $data['menteri'] = $this->crud_m->getMenteri();
        $data['gubernur'] = $this->crud_m->getGubernur();
        $data['kepalaBadan'] = $this->crud_m->getKepalaBadan();
        $data['umum'] = $this->crud_m->getUmum();
        $data['mingguan'] = $this->crud_m->getMingguan();
        $data['serambi'] = $this->crud_m->getSerambi();
        $data['kategori'] = $this->crud_m->getKategori();
        $data['kategori1'] = $this->crud_m->getKategori1();
        $data['kategori2'] = $this->crud_m->getKategori2();
        $data['kategori3'] = $this->crud_m->getKategori3();
        $data['kategori4'] = $this->crud_m->getKategori4();

        //  MENU
        //$data['menu'] = $this->crud_m->getMenu(0,"");

        // PAGINATION //
        //konfigurasi pagination
        $config['base_url'] = site_url('Portal/index'); //site url
        $config['total_rows'] = $this->crud_m->get_berita_count(base_url()) ;//total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['provinsi'] = $this->login_m->ambilData('provinsi')->result();
        // print_r($data['provinsi']);die();
        //panggil function get_mahasiswa_list yang ada pada mmodel crud_m. 
        $data['berita'] = $this->crud_m->get_berita_list($config["per_page"], $data['page']);           
 
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('header',$data);
        $this->load->view('portal_bptp_v',$data);
    } 

	public function bptp(){
		$data['agenda'] = $this->crud_m->getAgenda();
		$data['grid'] = $this->crud_m->getAllProvince();
        $data['marquee'] = $this->crud_m->marqueeAgenda();
		$data['presiden'] = $this->crud_m->getPresiden();
		$data['menteri'] = $this->crud_m->getMenteri();
		$data['gubernur'] = $this->crud_m->getGubernur();
		$data['kepalaBadan'] = $this->crud_m->getKepalaBadan();
		$data['umum'] = $this->crud_m->getUmum();
		$data['mingguan'] = $this->crud_m->getMingguan();
		$data['serambi'] = $this->crud_m->getSerambi();
		$data['kategori'] = $this->crud_m->getKategori();
		$data['kategori1'] = $this->crud_m->getKategori1();
		$data['kategori2'] = $this->crud_m->getKategori2();
		$data['kategori3'] = $this->crud_m->getKategori3();
		$data['kategori4'] = $this->crud_m->getKategori4();

		//	MENU
		//$data['menu'] = $this->crud_m->getMenu(0,"");

		// PAGINATION //
		//konfigurasi pagination
        $config['base_url'] = site_url('Portal/bptp'); //site url
        $config['total_rows'] = $this->db->count_all('berita'); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
      	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
        //panggil function get_mahasiswa_list yang ada pada mmodel crud_m. 
        $data['berita'] = $this->crud_m->get_berita_list($config["per_page"], $data['page']);           
 
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('header',$data);
		$this->load->view('portal_bptp_v',$data);
	}

	/*public function read($idKomoditas){
                       
                $data['menu'] = $this->crud_m->getMenu(0,"");
                $data['isi_menu']=$this->crud_m->read($idKomoditas);
                $data['halaman']='menu/view_menu';
                $this->load->view('portal_v',$data);     
                       
                }*/

	public function detailBerita($val)
	{
       
        $data['agenda'] = $this->crud_m->getAgenda();
        $data['serambi'] = $this->crud_m->getSerambi();
		$data['kategori'] = $this->crud_m->getKategori();
		$data['kategori1'] = $this->crud_m->getKategori1();
		$data['kategori2'] = $this->crud_m->getKategori2();
		$data['kategori3'] = $this->crud_m->getKategori3();
		$data['kategori4'] = $this->crud_m->getKategori4();
		$kode=$this->uri->segment(3);
		$data['detail']=$this->crud_m->getDetailBerita($val);
        $data['detail_komo'] = $this->crud_m->getKomo_berita($val,'all');
        $data['komoditas'] = [];
        $data['subsektor'] = [];
        $data['provinsi'] = $this->login_m->ambilData('provinsi')->result();
        foreach ($data['detail_komo'] as $key) {
            if (!in_array($key->namaKomoditas, $data['komoditas'])) {
                $data['komoditas'][] = $key->namaKomoditas;
            }
            if (!in_array($key->namaSubsektor, $data['subsektor'])) {
                $data['subsektor'][] = $key->namaSubsektor;
            }
            
        }
         // echo print_r($data['subsektor']);die();
        $this->load->view('header',$data);
		$this->load->view('detail_v',$data);
	}

	public function detailAgenda($kode='')
	{
        $data['provinsi'] = $this->login_m->ambilData('provinsi')->result();
        $data['agenda'] = $this->crud_m->getAllAgenda();
        $data['serambi'] = $this->crud_m->getSerambi();
		$data['kategori'] = $this->crud_m->getKategori();
		$data['kategori1'] = $this->crud_m->getKategori1();
		$data['kategori2'] = $this->crud_m->getKategori2();
		$data['kategori3'] = $this->crud_m->getKategori3();
		$data['kategori4'] = $this->crud_m->getKategori4();
		$kode=$this->uri->segment(3);
		$data['detail']=$this->crud_m->getDetailAgenda($kode);
        $this->load->view('header',$data);
		$this->load->view('detailAgenda_v',$data);
	}

	public function kategori($id,$page='')
	{
        $data['agenda'] = $this->crud_m->getAllAgenda();
        $data['serambi'] = $this->crud_m->getSerambi();
		$data['kategori'] = $this->crud_m->getKategori();
		$data['kategori1'] = $this->crud_m->getKategori1();
		$data['kategori2'] = $this->crud_m->getKategori2();
		$data['kategori3'] = $this->crud_m->getKategori3();
		$data['kategori4'] = $this->crud_m->getKategori4();
		$kode=$this->uri->segment(3);
		$data['detail']=$this->crud_m->getDetailKategori($kode);
		// PAGINATION //
		//konfigurasi pagination
        $data['provinsi'] = $this->login_m->ambilData('provinsi')->result();
        $config['base_url'] = site_url('Portal/kategori/'.$id); //site url
        if ($this->config->item('isDaerah')) {
            $config['total_rows'] = $this->db->query("SELECT komoditas_berita.idKomoditas,berita.* FROM `komoditas_berita` INNER JOIN berita on berita.idBerita = komoditas_berita.idBerita where komoditas_berita.idKomoditas = '".$id."' AND berita.baseUrl = '".base_url()."';")->num_rows(); //total 
        }else{
            $config['total_rows'] = $this->db->query("SELECT komoditas_berita.idKomoditas,berita.* FROM `komoditas_berita` INNER JOIN berita on berita.idBerita = komoditas_berita.idBerita where komoditas_berita.idKomoditas = '".$id."';")->num_rows(); //total 
        }
        
        // print_r($config['total_rows']);die();
        $config['per_page'] = 3;  //show record per halaman
        $config["uri_segment"] = 4;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
      	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        // print_r($data['page']);die();
        //panggil function get_mahasiswa_list yang ada pada mmodel crud_m. 
        $data['padi'] = $this->crud_m->getPadi($kode, $config["per_page"], $data['page']);           
 
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('header',$data);
		$this->load->view('kategori_v',$data);
	}
    
    public function kategoriK($id,$page='')
	{
        $data['provinsi'] = $this->login_m->ambilData('provinsi')->result();
        $data['agenda'] = $this->crud_m->getAllAgenda();
        $data['serambi'] = $this->crud_m->getSerambi();
		$data['kategori'] = $this->crud_m->getKategori();
		$data['kategori1'] = $this->crud_m->getKategori1();
		$data['kategori2'] = $this->crud_m->getKategori2();
		$data['kategori3'] = $this->crud_m->getKategori3();
		$data['kategori4'] = $this->crud_m->getKategori4();
		$kode=$this->uri->segment(3);
		$data['detail']=$this->crud_m->getDetailKategoriK($kode);
		// PAGINATION //
		//konfigurasi pagination
        $config['base_url'] = site_url('Portal/kategoriK/'.$id); //site url
        if (!$this->config->item('isDaerah')) {
            $config['total_rows'] = $this->db->query("SELECT * FROM berita INNER JOIN kegiatan on kegiatan.idKegiatan = berita.idKegiatan where berita.idKegiatan  = '".$id."';")->num_rows(); //total row
        }else{
            $config['total_rows'] = $this->db->query("SELECT * FROM berita INNER JOIN kegiatan on kegiatan.idKegiatan = berita.idKegiatan where berita.idKegiatan  = '".$id."' AND berita.baseUrl = '".base_url()."';")->num_rows(); //total row
        }
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 4;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
      	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
 
        //panggil function get_mahasiswa_list yang ada pada mmodel crud_m. 
        $data['padi'] = $this->crud_m->getPadi1($kode, $config["per_page"], $data['page']);           
 
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('header',$data);
		$this->load->view('kategoriK_v',$data);
	}

	public function pencarian(){
        $data['provinsi'] = $this->login_m->ambilData('provinsi')->result();
        $data['agenda'] = $this->crud_m->getAllAgenda();
        $data['serambi'] = $this->crud_m->getSerambi();
		$data['kategori'] = $this->crud_m->getKategori();
		$data['kategori1'] = $this->crud_m->getKategori1();
		$data['kategori2'] = $this->crud_m->getKategori2();
		$data['kategori3'] = $this->crud_m->getKategori3();
		$data['kategori4'] = $this->crud_m->getKategori4();
		$keyword = $this->input->post('keyword');
		$data['cari']=$this->crud_m->cariBerita($keyword);
        $this->load->view('header',$data);
		$this->load->view('pencarian_v',$data);
	}

}
