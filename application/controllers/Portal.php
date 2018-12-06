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

    public function export($type='',$case=''){
        // Load plugin PHPExcel nya
            include APPPATH.'appexcel/PHPExcel.php';
                
                // Panggil class PHPExcel nya
            $excel = new PHPExcel();
            // Settingan awal fil excel
            $excel->getProperties()->setCreator('BBP2TP')
                         ->setLastModifiedBy('BBP2TP')
                         ->setTitle("Laporan Berita")
                         ->setSubject("Berita")
                         ->setDescription("Laporan Berita")
                         ->setKeywords("Laporan erita");
                
                // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
            $style_col = array(
              'font' => array('bold' => true), // Set font nya jadi bold
              'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)88888888888888888888888888v v
              ),
              'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
              )
            );
                // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
            $style_row = array(
              'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, // Set text jadi di tengah secara vertical (middle)
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
              ),
              'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
              )
            );
                $excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN BERITA"); // Set kolom A1 dengan tulisan "DATA SISWA"
                $excel->getActiveSheet()->mergeCells('A1:I2'); // Set Merge Cell pada kolom A1 sampai E1
                $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
                $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
                $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
                    // Buat header tabel nya pada baris ke 3
                $excel->setActiveSheetIndex(0)->setCellValue('A4', "NO"); // Set kolom A3 dengan tulisan "NO"
                $excel->setActiveSheetIndex(0)->setCellValue('B4', "TANGGAL"); // Set kolom B3 dengan tulisan "NIS"
                // $excel->setActiveSheetIndex(0)->setCellValue('C4', "SUBSEKTOR"); // Set kolom C3 dengan tulisan "NAMA"
                // $excel->setActiveSheetIndex(0)->setCellValue('D4', "KOMODITAS"); // Set kolom C3 dengan tulisan "NAMA"
                $excel->setActiveSheetIndex(0)->setCellValue('C4', "KEGIATAN"); // Set kolom C3 dengan tulisan "NAMA"
                $excel->setActiveSheetIndex(0)->setCellValue('D4', "PRIORITAS"); // Set kolom C3 dengan tulisan "NAMA"
                $excel->setActiveSheetIndex(0)->setCellValue('E4', "JUDUL BERITA"); // Set kolom C3 dengan tulisan "NAMA"
                $excel->setActiveSheetIndex(0)->setCellValue('F4', "Sumber"); // Set kolom C3 dengan tulisan "NAMA"
                $excel->setActiveSheetIndex(0)->setCellValue('G4', "BPTP/BBP2TP"); // Set kolom C3 dengan tulisan "NAMA"
            // Apply style header yang telah kita buat tadi ke masing-masing kolom header
            $excel->getActiveSheet()->getStyle('A4')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('B4')->applyFromArray($style_col);
            // $excel->getActiveSheet()->getStyle('C4')->applyFromArray($style_col);
            // $excel->getActiveSheet()->getStyle('D4')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('C4')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('D4')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('E4')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('F4')->applyFromArray($style_col);
            //$excel->getActiveSheet()->getStyle('H3:H'.$excel->getActiveSheet()->getHighestRow())->getAlignment()->setWrapText(true); 
            $excel->getActiveSheet()->getStyle('G4')->applyFromArray($style_col);
                
                // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya

                 switch ($case) {
                     case '4':
                        $wheres = " AND tanggal > DATE_SUB(now(), INTERVAL 12 MONTH)";
                        break;
                    case '2':
                        $wheres = " AND tanggal > DATE_SUB(now(), INTERVAL 1 MONTH)";
                        break;
                    case '3':
                        $wheres = " AND tanggal > DATE_SUB(now(), INTERVAL 6 MONTH)";
                        break;
                    
                    default:
                        $wheres = '';
                        break;
                }
                if ($this->config->item('isDaerah')) {
                       $where = array(
                        'baseUrl'=>base_url(),
                    );
                       // print_r($where);die();
                       $berita = $this->login_m->getAllBerita(base_url(),$wheres);
                }else{
                    $berita = $this->login_m->getAllBerita('',$wheres);
                }
            
            $wizard = new PHPExcel_Helper_HTML;
            // echo json_encode($berita->result());die();
            $no = 1; // Untuk penomoran tabel, di awal set dengan 1
            $numrow = 5; // Set baris pertama untuk isi tabel adalah baris ke 4
            foreach($berita->result() as $data){ // Lakukan looping pada variabel siswa
              $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
              $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->tanggal);
              // $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->namaSubsektor);
              // $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->namaKomoditas);
              $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->namaKegiatan);
              $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->namaPrioritas);
              $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->judulBerita);
            //   $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $wizard->toRichTextObject($data->isiBerita));
              $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->sumber);
              $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->nama);
              

              // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
              $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
              $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
              $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
              $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
              $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
            //   $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
              $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
               $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
              // $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);

              $no++; // Tambah 1 setiap kali looping
              $numrow++; // Tambah 1 setiap kali looping
            }
                // Set width kolom
            $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
            $excel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // Set width kolom B
            // $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
            // $excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); // Set width kolom C
            $excel->getActiveSheet()->getColumnDimension('C')->setWidth(40); // Set width kolom C
            $excel->getActiveSheet()->getColumnDimension('D')->setWidth(30); // Set width kolom C
            $excel->getActiveSheet()->getColumnDimension('E')->setWidth(50); // Set width kolom C
            // $excel->getActiveSheet()->getColumnDimension('F')->setWidth(150); // Set width kolom C
            $excel->getActiveSheet()->getColumnDimension('F')->setWidth(40); // Set width kolom C
            $excel->getActiveSheet()->getColumnDimension('G')->setWidth(40); // Set width kolom C

            // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
            //$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
            // $excel->getActiveSheet()->getStyle('H1:H'.$excel->getActiveSheet()->getHighestRow())->getAlignment()->setWrapText(true); 
            // Set orientasi kertas jadi LANDSCAPE
            $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
            // Set judul file excel nya
            $excel->getActiveSheet(0)->setTitle("Laporan Berita");
            $excel->setActiveSheetIndex(0);
            // Proses file excel
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="Laporan Berita.xlsx"'); // Set nama file excel nya
            header('Cache-Control: max-age=0');
            $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
            $write->save('php://output');
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
        $data['teknologi'] = $this->crud_m->getTeknologiBerita($val)->result();
        // echo count($data['teknologi']);die();
        if (count($data['teknologi']) == 0) {
            $data['teknologis'][] = "";
        }else{
            foreach ($data['teknologi'] as $key ){
               $data['teknologis'][] =  $key->teknologi;
            }
        }
         // print_r($data['teknologi']);die();
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
