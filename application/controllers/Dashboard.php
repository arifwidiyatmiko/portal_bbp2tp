<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public $tabelAdmin = 'admin';
    public $tabelAgenda = 'agenda';
    public $tabelBerita = 'berita';
    public $tabelSub = 'subsektor';
    public $tabelKomoditas = 'komoditas';
    public $tabelKegiatan = 'kegiatan';
    public $tabelPrioritas = 'prioritas';

    public function __construct()
    {
				parent::__construct();
				$this->load->model('login_m');
                $this->load->model('Crud_m');
    }

    public function index(){
        //  CHAINED DROPDOWN    //
        //$data['optionSubsektor'] = $this->login_m->getSubsektorList();
		$where = array(
						'idAdmin' => $this->session->userdata("idAdmin")
						);
		$data['admin']=$this->login_m->ambilData($this->tabelAdmin,$where);
		$this->load->view('admin/dashboard_v',$data);
	}

	public function formBerita(){
		$where = array(
						'idAdmin' => $this->session->userdata("idAdmin")
						);
		$data['admin']=$this->login_m->ambilData($this->tabelAdmin,$where);
        
        $data['cmbsubs']=$this->login_m->getSubsektor();
        $data['cmbKegiatan']=$this->login_m->ambilSemua($this->tabelKegiatan);
        $data['cmbPrioritas']=$this->login_m->ambilSemua($this->tabelPrioritas);
        $data['provinsi'] = $this->Crud_m->getAllProvince();
		$this->load->view('admin/formBerita_v',$data);
	}
    
    public function getKom(){
        $idSubsektor = $this->input->post('cmbSubsektor');
        $kom = $this->login_m->getKomoditas($idSubsektor);
        $data .= "<option value=''>-- Pilih Komoditas --</option>";
        foreach ($kom as $k){
            $data .= "<option value='$k[idKomoditas]'>$k[namaKomoditas]</option>\n";
        }
        echo $data;
    }
    
    public function formAgenda(){
		$where = array(
						'idAdmin' => $this->session->userdata("idAdmin")
						);
		$data['admin']=$this->login_m->ambilData($this->tabelAdmin,$where);
		$this->load->view('admin/formAgenda_v',$data);
	}
    
    public function tabelBerita(){
        $data['berita'] = $this->login_m->getAllBerita();
		$where = array(
						'idAdmin' => $this->session->userdata("idAdmin")
						);
		$data['admin']=$this->login_m->ambilData($this->tabelAdmin,$where);
		$this->load->view('admin/tabelBerita_v',$data);
	}
    
    public function tabelAgenda(){
        $data['agenda'] = $this->login_m->getAllAgenda();
		$where = array(
						'idAdmin' => $this->session->userdata("idAdmin")
						);
		$data['admin']=$this->login_m->ambilData($this->tabelAdmin,$where);
		$this->load->view('admin/tabelAgenda_v',$data);
	}
    
    public function grafik(){
		$where = array(
						'idAdmin' => $this->session->userdata("idAdmin")
						);
		$data['admin']=$this->login_m->ambilData($this->tabelAdmin,$where);
		$this->load->view('admin/grafik_v',$data);
	}
    
    /*function simpanAgenda(){
		$config['upload_path'] = './assets/upload/agenda/'; //path folder
	    $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	    $this->upload->initialize($config);
	    if(!empty($_FILES['filefoto']['name'])){
	        if ($this->upload->do_upload('filefoto')){
	        	$gbr = $this->upload->data();
	            //Compress Image
	            $config['image_library']='gd2';
	            $config['source_image']='./assets/upload/agenda/'.$gbr['file_name'];
	            $config['create_thumb']= FALSE;
	            $config['maintain_ratio']= FALSE;
	            $config['quality']= '60%';
	            $config['width']= 0; //670 atau 710
	            $config['height']= 0; //500 atau 420
	            $config['new_image']= './assets/upload/agenda/'.$gbr['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();

	            $gambar=$gbr['file_name'];
                
                $jdl=$this->input->post('fjudul');
                $tempat=$this->input->post('ftempat');
                $tanggal=$this->input->post('ftanggal');
                $peserta=$this->input->post('fpeserta');
                $tVIP=$this->input->post('ftamuVIP');
                $pj=$this->input->post('fpjKegiatan');

				$this->login_m->simpanAgenda($jdl,$tempat,$tanggal,$peserta,$tVIP,$pj,$gambar);
				redirect('dashboard/tabelAgenda');
		}else{
			redirect('dashboard');
	    }
	                 
	    }else{
			redirect('dashboard');
		}
				
	} */
    
    function simpanAgenda(){
        if(!empty($_FILES['filefoto']['name'])){
                $config['upload_path'] = './assets/upload/agenda/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['file_name'] = $_FILES['filefoto']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('filefoto')){
                    $uploadData = $this->upload->data();
                     $filefoto = $uploadData['file_name'];
                }else{
                    $filefoto = '';
                }
            }else{
			$filefoto = '';}
			
		        $jdl=$this->input->post('fjudul');
                $tempat=$this->input->post('ftempat');
                $tanggal=$this->input->post('ftanggal');
                $peserta=$this->input->post('fpeserta');
                $tVIP=$this->input->post('ftamuVIP');
                $pj=$this->input->post('fpjKegiatan');
        
        $data = array(
			"judulKegiatan" => $jdl,
			"tempat" => $tempat,
			"tanggal" => $tanggal,
			"peserta" => $peserta,
			"tamuVIP" => $tVIP,
			"pjKegiatan" => $pj,
            "foto" => $filefoto
        );

			$this->login_m->insertData($this->tabelAgenda,$data);
        
        redirect('dashboard/tabelAgenda');
    }
    
    function simpanBerita(){
		if(!empty($_FILES['filefoto']['name'])){
                $config['upload_path'] = './assets/upload/berita/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['file_name'] = $_FILES['filefoto']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('filefoto')){
                    $uploadData = $this->upload->data();
                     $filefoto = $uploadData['file_name'];
                }else{
                    $filefoto = '';
                }
            }else{
			$filefoto = '';}
            // echo $filefoto;die();
			 // if(!empty($_FILES['fileberkas']['name'])){
    //             $config['upload_path'] = './assets/upload/berita/berkas/';
    //             $config['allowed_types'] = 'pdf|doc|docx';
    //             $config['file_name'] = $_FILES['fileberkas']['name'];
                
    //             //Load upload library and initialize configuration
    //             $this->load->library('upload',$config);
    //             $this->upload->initialize($config);
                
    //             if($this->upload->do_upload('fileberkas')){
    //                 $uploadData = $this->upload->data();
    //                 $fileberkas = $uploadData['file_name'];
    //             }else{
    //                 $fileberkas = '';
    //             }
    //         }else{
    //             $fileberkas = '';
    //         }
			
		 $idSubsektor= $this->input->post('cmbSubsektor');
		 $vub= $this->input->post('fvub');
		 $tanggal= $this->input->post('ftanggal');
		 $varSpeklok= $this->input->post('fvarspek');
		 $idKomoditas= $this->input->post('cmbKomoditas');
		 $idKegiatan =$this->input->post('cmbKegiatan');
		 $idPrioritas =$this->input->post('cmbPrioritas');
		 $judulBerita =$this->input->post('fjudul');
		 $isiBerita =$this->input->post('fisi');
		 $sumber =$this->input->post('fsumber');
		 $idAdmin =$this->input->post('idAdmin');
        
        $data= array(
			   "idSubsektor"=>$idSubsektor,
			   "vub"=>$vub,
               "idProvinsi"=>$this->input->post('provinsi'),
               "idCity"=>$this->input->post('kota'),
			   "tanggal"=>$tanggal,
			   "varSpeklok"=>$varSpeklok,
			   "idKomoditas"=>$idKomoditas,
			   "idKegiatan"=>$idKegiatan,
			   "idPrioritas"=>$idPrioritas,
			   "judulBerita"=>$judulBerita,
			   "isiBerita"=>$isiBerita,
			   "sumber"=>$sumber,
               "gambar"=>$filefoto,
               "berkas"=>'',
			   "idAdmin"=>$idAdmin
		   );


			$this->login_m->insertData($this->tabelBerita,$data);
        
        redirect('dashboard/tabelBerita');
		 }
    
    function aksiUpdateBerita($id){
		$where = array(
            'idBerita' => $id
        );
        $query = $this->login_m->ambilData($this->tabelBerita,$where);

        $row = $query->row();

        $data = array(
            "idBerita" => $row->idBerita,
			"idSubsektor" => $row->idSubsektor,
            "idProvinsi"=>$row->idProvinsi,
            "idCity"=>$row->idCity,
			"vub" => $row->vub,
			"tanggal" => $row->tanggal,
			"varSpeklok" => $row->varSpeklok,
			"idKomoditas" => $row->idKomoditas,
			"idKegiatan" => $row->idKegiatan,
			"idPrioritas" => $row->idPrioritas,
			"judulBerita" => $row->judulBerita,
			"isiBerita" => $row->isiBerita,
			"sumber" => $row->sumber,
			"berkas" => $row->berkas,
			"gambar" => $row->gambar,
			"idAdmin" => $row->idAdmin,
        );

        
        $data['berita'] = $this->login_m->getAllBerita();
        $data['subsektor'] = $this->login_m->ambilSemua($this->tabelSub);
        $data['komoditas'] = $this->login_m->ambilSemua($this->tabelKomoditas);
        $data['kegiatan'] = $this->login_m->ambilSemua($this->tabelKegiatan);
        $data['prioritas'] = $this->login_m->ambilSemua($this->tabelPrioritas);
        $data['provinsi'] = $this->Crud_m->getAllProvince();
        $data['kota'] = $this->Crud_m->getAllCity($data['idProvinsi']);
		$where = array(
						'idAdmin' => $this->session->userdata("idAdmin")
						);
		$data['admin']=$this->login_m->ambilData($this->tabelAdmin,$where);
        // print_r($data['admin']->result());die();
        $this->load->view('admin/formEditBerita_v',$data);
    }
    
    /* function aksiEditBerita1($id){
        $where = array(
            'idBerita' => $id
        );
        $query = $this->login_m->ambilData($this->tabelBerita,$where);

        $row = $query->row();

        $data = array(
            "idBerita" => $row->idBerita,
			"tanggal" => $row->tanggal,
			"idSubsektor" => $row->idSubsektor,
			"vub" => $row->vub,
			"varSpeklok" => $row->varSpeklok,
			"idKomoditas" => $row->idKomoditas,
			"idKegiatan" => $row->idKegiatan,
			"idPrioritas" => $row->idPrioritas,
			"judulBerita" => $row->judulBerita,
			"isiBerita" => $row->isiBerita,
			"sumber" => $row->sumber,
			"berkas" => $row->berkas,
			"gambar" => $row->gambar,
			"idAdmin" => $row->idAdmin
        );

        $data['cmbsubs']=$this->login_m->getSubsektor();
        $data['cmbkom']=$this->login_m->ambilSemua($this->tabelKomoditas);
        $data['berita'] = $this->login_m->getAllBerita();
		$where = array(
						'idAdmin' => $this->session->userdata("idAdmin")
						);
		$data['admin']=$this->login_m->ambilData($this->tabelAdmin,$where);
        $this->load->view('admin/formEditBerita_v', $data);
    } */
    
    function aksiAfterEditBerita(){
        if(!empty($_FILES['filefoto']['name'])){
                $config['upload_path'] = './assets/upload/berita/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['file_name'] = $_FILES['filefoto']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('filefoto')){
                    $uploadData = $this->upload->data();
                     $filefoto = $uploadData['file_name'];
                }else{
                    $filefoto = '';
                }
            }else{
			$filefoto = $this->input->post('oldfoto');}
			 if(!empty($_FILES['fileberkas']['name'])){
                $config['upload_path'] = './assets/upload/berita/berkas/';
                $config['allowed_types'] = 'pdf|doc|docx';
                $config['file_name'] = $_FILES['fileberkas']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('fileberkas')){
                    $uploadData = $this->upload->data();
                    $fileberkas = $uploadData['file_name'];
                }else{
                    $fileberkas = '';
                }
            }else{
                $fileberkas = $this->input->post('oldberkas');
            }
			
		 $idSubsektor= $this->input->post('cmbSubsektor');
		 $vub= $this->input->post('fvub');
         $tanggal=$this->input->post('ftanggal');
		 $varSpeklok= $this->input->post('fvarspek');
		 $idKomoditas= $this->input->post('cmbKomoditas');
		 $idKegiatan =$this->input->post('cmbKegiatan');
		 $idPrioritas =$this->input->post('cmbPrioritas');
		 $judulBerita =$this->input->post('fjudul');
		 $isiBerita =$this->input->post('fisi');
		 $sumber =$this->input->post('fsumber');
		 $idAdmin =$this->input->post('idAdmin');
		 $idBerita =$this->input->post('idBerita');
        
        $data = array(
			   "idSubsektor"=>$idSubsektor,
			   "vub"=>$vub,
			   "tanggal"=>$tanggal,
			   "varSpeklok"=>$varSpeklok,
			   "idKomoditas"=>$idKomoditas,
			   "idKegiatan"=>$idKegiatan,
			   "idPrioritas"=>$idPrioritas,
			   "judulBerita"=>$judulBerita,
			   "isiBerita"=>$isiBerita,
			   "sumber"=>$sumber,
               "gambar"=>$filefoto,
               "berkas"=>$fileberkas,
			   "idAdmin"=>$idAdmin
		   );

        $where = array(
			'idBerita'=>$idBerita
		);

        $this->login_m->UpdateData($this->tabelBerita,$data,$where);
        redirect('dashboard/tabelBerita');
    }
    
    //  CRUD    //
    public function aksiDelAgenda($id)
		{
		  $where = array(
		          'idAgenda' => $id
		          );
		      $this->login_m->deleteData($this->tabelAgenda,$where);
		      redirect('dashboard/tabelAgenda');
		}
    
    public function aksiAccBerita($id){
        $data = array(
            "status" => 1
        );
        $where = array(
            'idBerita' => $id
        );

        $this->login_m->updateData($this->tabelBerita,$data,$where);
        redirect('dashboard/tabelBerita');
    }
    
    public function aksiDelBerita($id)
		{
		  $where = array(
		          'idBerita' => $id
		          );
		      $this->login_m->deleteData($this->tabelBerita,$where);
		      redirect('dashboard/tabelBerita');
		}
    
    public function aksiUpdateAgenda($id)
    {
        $where = array(
            'idAgenda' => $id
        );
        $query = $this->login_m->ambilData($this->tabelAgenda,$where);

        $row = $query->row();

        $data = array(
            "idAgenda" => $row->idAgenda,
			"judulKegiatan" => $row->judulKegiatan,
			"tempat" => $row->tempat,
			"tanggal" => $row->tanggal,
			"peserta" => $row->peserta,
			"tamuVIP" => $row->tamuVIP,
			"pjKegiatan" => $row->pjKegiatan,
			"foto" => $row->foto
        );

        
        $data['agenda'] = $this->login_m->getAllAgenda();
		$where = array(
						'idAdmin' => $this->session->userdata("idAdmin")
						);
		$data['admin']=$this->login_m->ambilData($this->tabelAdmin,$where);
        
        $this->load->view('admin/formEditAgenda_v', $data);

    }
    
    public function aksiAfterEditAgenda(){
        if(!empty($_FILES['filefoto']['name'])){
                $config['upload_path'] = './assets/upload/agenda/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['file_name'] = $_FILES['filefoto']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('filefoto')){
                    $uploadData = $this->upload->data();
                     $filefoto = $uploadData['file_name'];
                }else{
                    $filefoto = '';
                }
            }else{
			$filefoto = $this->input->post('oldfoto');}
        
        $idAgenda = $this->input->post('idAgenda');
        $jdl=$this->input->post('fjudul');
        $tempat=$this->input->post('ftempat');
        $tanggal=$this->input->post('ftanggal');
        $peserta=$this->input->post('fpeserta');
        $tVIP=$this->input->post('ftamuVIP');
        $pj=$this->input->post('fpjKegiatan');

        $data = array(
            "judulKegiatan" => $jdl,
            "tempat" => $tempat,
            "tanggal" => $tanggal,
            "peserta" => $peserta,
            "tamuVIP" => $tVIP,
            "pjKegiatan" => $pj,
            "foto" => $filefoto
        );
        $where = array(
            'idAgenda' => $idAgenda
        );

        $this->login_m->updateData($this->tabelAgenda,$data,$where);
        redirect('dashboard/tabelAgenda');
		}
    
    //  GRAFIK  //
    public function json() {
        
        $c = array(
                    "caption"=>"Grafik Berita Bulan Juli 2018",
                    "subCaption"=>"NEWS PORTAL BBP2TP",
                    "xAxisName"=>"Komoditas",
                    "yAxisName"=>"Jumlah",
                    "theme"=>"fint"
                );
                $d = array();
        
                $query = $this->login_m->grafikBulan7();
                foreach($query->result() as $rcrd){
                    array_push($d,array("label"=>$rcrd->Komoditas, "value"=>$rcrd->Jumlah));
                }

                $gab = array("chart"=>$c,"data"=>$d);
                echo json_encode($gab);
        
        /* $bulan = $this->input->post('fbulan');
        switch ($bulan) {
            case "03":
                $c = array(
                    "caption"=>"Grafik Berita",
                    "subCaption"=>"NEWS PORTAL BBP2TP",
                    "xAxisName"=>"Komoditas",
                    "yAxisName"=>"Jumlah",
                    "theme"=>"fint"
                );
                $d = array();
        
                $query = $this->login_m->grafikBulan3();
                foreach($query->result() as $rcrd){
                    array_push($d,array("label"=>$rcrd->Komoditas, "value"=>$rcrd->Jumlah));
                }

                $gab = array("chart"=>$c,"data"=>$d);
                echo json_encode($gab);
                break;
                
            case "04":
                $c = array(
                    "caption"=>"Grafik Berita",
                    "subCaption"=>"NEWS PORTAL BBP2TP",
                    "xAxisName"=>"Komoditas",
                    "yAxisName"=>"Jumlah",
                    "theme"=>"fint"
                );
                $d = array();
        
                $query = $this->login_m->grafikBulan4();
                foreach($query->result() as $rcrd){
                    array_push($d,array("label"=>$rcrd->Komoditas, "value"=>$rcrd->Jumlah));
                }

                $gab = array("chart"=>$c,"data"=>$d);
                echo json_encode($gab);
                break;
                
            default:
                $c = array(
                    "caption"=>"Grafik Berita Bulan $bulan",
                    "subCaption"=>"NEWS PORTAL BBP2TP",
                    "xAxisName"=>"Komoditas",
                    "yAxisName"=>"Jumlah",
                    "theme"=>"fint"
                );
                $d = array();
        
                $query = $this->login_m->grafikBulan4();
                foreach($query->result() as $rcrd){
                    array_push($d,array("label"=>$rcrd->Komoditas, "value"=>$rcrd->Jumlah));
                }

                $gab = array("chart"=>$c,"data"=>$d);
                echo json_encode($gab);
                break;
        }*/
	}
    
    public function statistik(){
        
    }
    
    public function export(){
        // Load plugin PHPExcel nya
    include APPPATH.'appexcel/PHPExcel.php';
        
        // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
    $excel->getProperties()->setCreator('BBP2TP & Program Diploma IPB')
                 ->setLastModifiedBy('BBP2TP & Program Diploma IPB')
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
        $excel->setActiveSheetIndex(0)->setCellValue('C4', "SUBSEKTOR"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('D4', "KOMODITAS"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('E4', "KEGIATAN"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('F4', "PRIORITAS"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('G4', "JUDUL BERITA"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('H4', "ISI BERITA"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('I4', "SUMBER"); // Set kolom C3 dengan tulisan "NAMA"
    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
    $excel->getActiveSheet()->getStyle('A4')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B4')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C4')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D4')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('E4')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('F4')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('G4')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('H4')->applyFromArray($style_col);
    //$excel->getActiveSheet()->getStyle('H3:H'.$excel->getActiveSheet()->getHighestRow())->getAlignment()->setWrapText(true); 
    $excel->getActiveSheet()->getStyle('I4')->applyFromArray($style_col);
        
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya

		$where = array(
			'idBerita' => 1
		);

    $berita = $this->login_m->getAllBerita('berita',$where);
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 5; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($berita->result() as $data){ // Lakukan looping pada variabel siswa
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->tanggal);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->namaSubsektor);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->namaKomoditas);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->namaKegiatan);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->namaPrioritas);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->judulBerita);
      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->isiBerita);
      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->sumber);

      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);

      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
        // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // Set width kolom B
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(40); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(50); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(150); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(40); // Set width kolom C

    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    //$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    $excel->getActiveSheet()->getStyle('H1:H'.$excel->getActiveSheet()->getHighestRow())->getAlignment()->setWrapText(true); 
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
    
	function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}