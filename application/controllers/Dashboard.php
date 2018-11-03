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
                if (!$this->session->userdata("idAdmin")) {
                   redirect('Login','refresh');
                }
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
        $data['cmbKomoditas']=$this->login_m->getKomoditasAll();
        $data['cmbKegiatan']=$this->login_m->getKegiatan();
        $data['cmbPrioritas']=$this->login_m->ambilSemua($this->tabelPrioritas);
        $data['provinsi'] = $this->Crud_m->getAllProvince();
        $data['city'] = $this->Crud_m->getAllCity($this->session->userdata('idProvinsi'));
        // print_r($data['city']);die();
		$this->load->view('admin/formBerita_v',$data);
	}
    public function komoditas($value='')
    {
        $where = array(
                        'idAdmin' => $this->session->userdata("idAdmin")
                        );
        $data['admin']=$this->login_m->ambilData($this->tabelAdmin,$where);
        $data['provinsi'] = $this->Crud_m->getAllProvince();
        $data['city'] = $this->Crud_m->getAllCity($this->session->userdata('idProvinsi'));
        $data['komoditas'] = $this->login_m->getKomoditasAll();
        $data['subsektor'] = $this->login_m->getSubsektor();
        // print_r($data['subsektor']);die();
        $this->load->view('admin/komoditas_tabel', $data);
    }
    public function add_komo()
    {
        $data = array('idSubsektor' => $this->input->post('subsektor'),'namaKomoditas'=>$this->input->post('komoditas') );
        $this->login_m->insertKomoditas($data);
        redirect('Dashboard/komoditas','refresh');
    }
    public function edit_komo($id)
    {
        // echo $id;die();
        $data = array('namaKomoditas' => $this->input->post('komoditas') );
        $this->login_m->updateKomoditas($id,$data);
        redirect('Dashboard/komoditas','refresh');
    }
    public function delete_komo($id)
    {
        $this->login_m->deleteKomoditas($id);
        redirect('Dashboard/komoditas','refresh');
    }
    public function kegiatan($value='')
    {
        $where = array(
                        'idAdmin' => $this->session->userdata("idAdmin")
                        );
        $data['admin']=$this->login_m->ambilData($this->tabelAdmin,$where);
        $data['provinsi'] = $this->Crud_m->getAllProvince();
        $data['city'] = $this->Crud_m->getAllCity($this->session->userdata('idProvinsi'));
        $data['kegiatan'] = $this->login_m->ambilData('kegiatan')->result();
        // print_r($data['kegiatan']);die();
        $this->load->view('admin/kegiatan_tabel', $data);
    }
    public function add_kegiatan()
    {
        $data = array('namaKegiatan' => $this->input->post('kegiatan') );
        $this->login_m->insertKegiatan($data);
        redirect('Dashboard/kegiatan','refresh');
    }
    public function edit_kegiatan($id)
    {
        // echo $id;die();
        $data = array('namaKegiatan' => $this->input->post('komoditas') );
        $where = array('idKegiatan' => $id);
        $this->login_m->updateData('kegiatan', $data, $where);
        redirect('Dashboard/kegiatan','refresh');
    }
    public function delete_kegiatan($id)
    {
        $this->login_m->deleteKegiatan($id);
        redirect('Dashboard/kegiatan','refresh');
    }
    public function kecamatan($value='')
    {
        $where = array(
                        'idAdmin' => $this->session->userdata("idAdmin")
                        );
        $data['admin']=$this->login_m->ambilData($this->tabelAdmin,$where);
        $data['provinsi'] = $this->Crud_m->getAllProvince();
        $data['city'] = $this->Crud_m->getAllCity($this->session->userdata('idProvinsi'));
        $data['kecamatan'] = $this->login_m->getKecamatanAll()->result();
        // print_r($data['kecamatan']);die();
        $this->load->view('admin/kecamatan_tabel', $data);
    }
    public function add_kecamatan()
    {
        $data = array('namaKecamatan' => $this->input->post('namaKecamatan'),'idCity'=>$this->input->post('idCity') );
        $this->login_m->insertKomoditas($data);
        redirect('Dashboard/kegiatan','refresh');
    }
    public function edit_kecamatan($id)
    {
        // echo $id;die();
        $data = array('namaKegiatan' => $this->input->post('komoditas') );
        $where = array('idKegiatan' => $id);
        $this->login_m->updateData('kegiatan', $data, $where);
        redirect('Dashboard/kegiatan','refresh');
    }
    public function delete_kecamatan($id)
    {
        $this->login_m->deleteKomoditas($id);
        redirect('Dashboard/kegiatan','refresh');
    }
    public function getKom(){
        $idSubsektor = $this->input->post('cmbSubsektor');
        $kom = $this->login_m->getKomoditas($idSubsektor);
        $data = "<option value=''>-- Pilih Komoditas --</option>";
        foreach ($kom as $k){
            $data .= "<option value='$k[idKomoditas]'>$k[namaKomoditas]</option>\n";
        }
        $arr = array('dropdown' =>$data ,'datas'=>$kom );
        header('Content-Type: application/json');
        echo json_encode($arr);
    }
    
    public function formAgenda(){
		$where = array(
						'idAdmin' => $this->session->userdata("idAdmin")
						);
		$data['admin']=$this->login_m->ambilData($this->tabelAdmin,$where);
		$this->load->view('admin/formAgenda_v',$data);
	}
    
    public function tabelBerita(){
        $data['berita'] = $this->login_m->getAllBerita(base_url());
		$where = array(
						'idAdmin' => $this->session->userdata("idAdmin")
						);
		$data['admin']=$this->login_m->ambilData($this->tabelAdmin,$where);
        // print_r($data['berita']->result());die();
		$this->load->view('admin/tabelBerita_v',$data);
	}
    
    public function tabelAgenda(){
        $data['agenda'] = $this->login_m->getAllAgenda(base_url());
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
                     $filefoto = base_url().'assets/upload/berita/'.$uploadData['file_name'];
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
            "foto" => $filefoto,
            "baseUrl"=>base_url()
        );
        // echo json_encode($data);die();
			$this->login_m->insertData($this->tabelAgenda,$data);
        
        redirect('dashboard/tabelAgenda');
    }
    
    function simpanBerita(){
        // print_r($this->input->post('cmbKomoditas'));die();
        $idKomoditas = $this->input->post('cmbKomoditas');
		if(!empty($_FILES['filefoto']['name'])){
                $config['upload_path'] = './assets/upload/berita/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['file_name'] = $_FILES['filefoto']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('filefoto')){
                    $uploadData = $this->upload->data();
                     $filefoto = base_url().'assets/upload/berita/'.$uploadData['file_name'];
                }else{
                    $filefoto = '';
                }
            }else{
			$filefoto = '';}
            // echo $filefoto;die();
			 if(!empty($_FILES['fileberkas']['name'])){
                $config['upload_path'] = './assets/upload/berita/berkas/';
                $config['allowed_types'] = 'pdf|doc|docx';
                $config['file_name'] = $_FILES['fileberkas']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('fileberkas')){
                    $uploadData = $this->upload->data();
                    $fileberkas = base_url().'assets/upload/berita/'.$uploadData['file_name'];
                }else{
                    $fileberkas = '';
                }
            }else{
                $fileberkas = '';
            }
		// $fileberkas = '';$filefoto='';
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
        // echo substr($tanggal, 6,4)."-".substr($tanggal, 0,2)."-".substr($tanggal, 3,2);die();
        $data= array(
			   // "idSubsektor"=>1,
			   // "vub"=>$vub,
               "idProvinsi"=>$this->session->userdata('idProvinsi'),
               // "idProvinsi"=>$this->input->post('provinsi'),
               "idCity"=>$this->input->post('kota'),
			   "tanggal"=>substr($tanggal, 6,4)."-".substr($tanggal, 0,2)."-".substr($tanggal, 3,2),
			   // "varSpeklok"=>$varSpeklok,
			   // "idKomoditas"=>0,
               "idKecamatan"=>$this->input->post('kecamatan'),
               "kelurahan"=>$this->input->post('kelurahan'),
			   "idKegiatan"=>$idKegiatan,
			   "idPrioritas"=>$idPrioritas,
			   "judulBerita"=>$judulBerita,
			   "isiBerita"=>$isiBerita,
			   "sumber"=>$sumber,
               "gambar"=>$filefoto,
               "berkas"=>$fileberkas,
			   "idAdmin"=>$idAdmin,
               "baseUrl"=>base_url(),
		   );
        switch ($this->input->post('cmbKegiatan') ) {
            case '1':
                // echo "string";die();
                $data['ftanam'] = $this->input->post('ftanam');
                $data['fpanen'] = $this->input->post('fpanen');
                $data['fproduktivitas'] = $this->input->post('fproduktivitas');
                $data['fgabah'] = $this->input->post('fgabah');
                $data['fpengendalian'] = $this->input->post('fpengendalian');
                $data['fteknologi'] = $this->input->post('fteknologi');
                break;
            case '2':
                $data['fvub'] = $this->input->post('fvub');
                $data['fproduksi'] = $this->input->post('fproduksi');
                $data['fdistribusi'] = $this->input->post('fdistribusi');
                $data['fvarspek'] = $this->input->post('fvarspek');
                $data['fvarspek_prod'] = $this->input->post('fvarspek_prod');
                $data['fteknologi'] = $this->input->post('fteknologi');
                break;
            case '9':
                $data['fvarspek'] = $this->input->post('fvarspek');
                break;
            default:
                // echo $this->input->post('idKegiatan');die();
                break;
        }
        // echo "sdas";
        // print_r($data);die();
        // $idBerita = 1;
			$idBerita = $this->login_m->insertData($this->tabelBerita,$data);
            $i = 0;
            foreach ($idKomoditas as $key => $value) {
                $komo_berita['idKomoditas'] = $value;
                $komo_berita['idBerita'] = $idBerita;
                $this->login_m->insertData('komoditas_berita',$komo_berita);
                $i++;
            }
            // print_r($komo_berita);die();
        
        redirect('dashboard/tabelBerita');
		 }
    
    function aksiUpdateBerita($id){
		$where = array(
            'idBerita' => $id
        );
        $data['berita'] = $this->login_m->ambilData($this->tabelBerita,$where)->result();

        $data['komoditas_berita'] = $this->login_m->ambilData('komoditas_berita',$where);
        $data['komoditas'] = $this->login_m->ambilSemua($this->tabelKomoditas);
        $data['kegiatan'] = $this->login_m->ambilSemua($this->tabelKegiatan);
        $data['prioritas'] = $this->login_m->ambilSemua($this->tabelPrioritas);
        $data['kecamatan'] = $this->Crud_m->getAllKecamatan($data['berita'][0]->idCity)->result();
        $data['provinsi'] = $this->Crud_m->getAllProvince();
        $data['kota'] = $this->Crud_m->getAllCity($data['berita'][0]->idProvinsi);
		$where = array(
						'idAdmin' => $this->session->userdata("idAdmin")
						);
		$data['admin']=$this->login_m->ambilData($this->tabelAdmin,$where);
        // print_r($data['admin']->result());die();
        $this->load->view('admin/formEditBerita_v',$data);
    }
    
  
    function aksiAfterEditBerita($id){
        if(!empty($_FILES['filefoto']['name'])){
                $config['upload_path'] = './assets/upload/berita/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['file_name'] = $_FILES['filefoto']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('filefoto')){
                    $uploadData = $this->upload->data();
                     $filefoto = base_url().'assets/upload/berita/'.$uploadData['file_name'];
                }else{
                    $filefoto = $this->input->post('oldfoto');
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
                    $fileberkas = base_url().'assets/upload/berita/'.$uploadData['file_name'];
                }else{
                    $fileberkas = '';
                }
            }else{
                $fileberkas = '';
            }
        $idKomoditas = $this->input->post('cmbKomoditas');
		 // $idSubsektor= $this->input->post('cmbSubsektor');
		 $vub= $this->input->post('fvub');
         $tanggal=$this->input->post('ftanggal');
		 $varSpeklok= $this->input->post('fvarspek');
		 // $idKomoditas= $this->input->post('cmbKomoditas');
		 $idKegiatan =$this->input->post('cmbKegiatan');
		 $idPrioritas =$this->input->post('cmbPrioritas');
		 $judulBerita =$this->input->post('fjudul');
		 $isiBerita =$this->input->post('fisi');
		 $sumber =$this->input->post('fsumber');
		 $idAdmin =$this->input->post('idAdmin');
		 $idBerita =$this->input->post('idBerita');
        
        $data = array(
			   // "idSubsektor"=>$idSubsektor,
			   "fvub"=>$vub,
			   "tanggal"=>$tanggal,
			   // "varSpeklok"=>$varSpeklok,
			   // "idKomoditas"=>$idKomoditas,
			   "idKegiatan"=>$idKegiatan,
			   "idPrioritas"=>$idPrioritas,
			   "judulBerita"=>$judulBerita,
			   "isiBerita"=>$isiBerita,
			   "sumber"=>$sumber,
               "gambar"=>$filefoto,
               // "berkas"=>$fileberkas,
			   "idAdmin"=>$idAdmin
		   );

        switch ($this->input->post('cmbKegiatan') ) {
            case '1':
                // echo "string";die();
                $data['ftanam'] = $this->input->post('ftanam');
                $data['fpanen'] = $this->input->post('fpanen');
                $data['fproduktivitas'] = $this->input->post('fproduktivitas');
                $data['fgabah'] = $this->input->post('fgabah');
                $data['fpengendalian'] = $this->input->post('fpengendalian');
                $data['fteknologi'] = $this->input->post('fteknologi');
                break;
            case '2':
                $data['fvub'] = $this->input->post('fvub');
                $data['fproduksi'] = $this->input->post('fproduksi');
                $data['fdistribusi'] = $this->input->post('fdistribusi');
                $data['fvarspek'] = $this->input->post('fvarspek');
                $data['fvarspek_prod'] = $this->input->post('fvarspek_prod');
                $data['fteknologi'] = $this->input->post('fteknologi');
                break;
            case '9':
                $data['fvarspek'] = $this->input->post('fvarspek');
                break;
            default:
                // echo $this->input->post('idKegiatan');die();
                break;
        }

        $where = array(
			'idBerita'=>$id
		);
        // echo json_encode($data);die();
        $this->login_m->UpdateData($this->tabelBerita,$data,$where);
        $this->login_m->deleteData('komoditas_berita',$where);
        $i = 0;
            foreach ($idKomoditas as $key => $value) {
                $komo_berita['idKomoditas'] = $value;
                $komo_berita['idBerita'] = $id;
                // print_r($komo_berita);die();
                $this->login_m->insertData('komoditas_berita',$komo_berita);
                $i++;
            }
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
              $this->login_m->deleteData('komoditas_berita',$where);
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
        $excel->setActiveSheetIndex(0)->setCellValue('F4', "ISI BERITA"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('G4', "SUMBER"); // Set kolom C3 dengan tulisan "NAMA"
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

		
        if ($this->config->item('isDaerah')) {
               $where = array(
                'baseUrl'=>base_url(),
            );
               // print_r($where);die();
               $berita = $this->login_m->getAllBerita(base_url());
        }else{
            $berita = $this->login_m->getAllBerita();
        }

    
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
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->isiBerita);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->sumber);

      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
      // $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
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
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(150); // Set width kolom C
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
    
	function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}
