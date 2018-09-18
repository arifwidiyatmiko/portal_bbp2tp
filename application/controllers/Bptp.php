<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bptp extends CI_Controller {
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
    }

    public function index(){
		$where = array(
						'idAdmin' => $this->session->userdata("idAdmin")
						);
		$data['admin']=$this->login_m->ambilData($this->tabelAdmin,$where);
		$this->load->view('bptp/bptp_v',$data);
	}
    
    public function formBerita(){
		$where = array(
						'idAdmin' => $this->session->userdata("idAdmin")
						);
		$data['admin']=$this->login_m->ambilData($this->tabelAdmin,$where);
        
        $data['cmbsubs']=$this->login_m->getSubsektor();
        $data['cmbKegiatan']=$this->login_m->ambilSemua($this->tabelKegiatan);
        $data['cmbPrioritas']=$this->login_m->ambilSemua($this->tabelPrioritas);
		$this->load->view('bptp/formBerita_v',$data);
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
    
    public function tabelBerita(){
        //$where = array(
        //    'idAdmin' => $id
        //);
        //$data['berita'] = $this->login_m->ambilData($this->tabelBerita,$where);
        //$data['berita'] = $this->login_m->getAllBeritaAceh();
		$where = array(
						'idAdmin' => $this->session->userdata("idAdmin")
						);
		$data['admin']=$this->login_m->ambilData($this->tabelAdmin,$where);
		$data['berita']=$this->login_m->ambilData($this->tabelBerita,$where);
		$data['subsektor']=$this->login_m->ambilSemua($this->tabelSub);
        $data['komoditas'] = $this->login_m->ambilSemua($this->tabelKomoditas);
        $data['kegiatan'] = $this->login_m->ambilSemua($this->tabelKegiatan);
        $data['prioritas'] = $this->login_m->ambilSemua($this->tabelPrioritas);
		$this->load->view('bptp/tabelBerita_v',$data);
	}
    
    public function grafik(){
		$where = array(
						'idAdmin' => $this->session->userdata("idAdmin")
						);
		$data['admin']=$this->login_m->ambilData($this->tabelAdmin,$where);
		$this->load->view('bptp/grafik_v',$data);
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
                $fileberkas = '';
            }
			
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


			$this->login_m->insertData($this->tabelBerita,$data);
        
        redirect('bptp/tabelBerita');
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
		$where = array(
						'idAdmin' => $this->session->userdata("idAdmin")
						);
		$data['admin']=$this->login_m->ambilData($this->tabelAdmin,$where);
        
        $this->load->view('bptp/formEditBerita_v',$data);
    }
    
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
        redirect('bptp/tabelBerita');
    }
    
    //  CRUD    //
    public function aksiDelBerita($id)
		{
		  $where = array(
		          'idBerita' => $id
		          );
		      $this->login_m->deleteData($this->tabelBerita,$where);
		      redirect('bptp/tabelBerita');
		}
    
    //  GRAFIK  //
    /*public function json() {
		$c = array(
			"caption"=>"Grafik Berita",
			"subCaption"=>"NEWS PORTAL BBP2TP",
			"xAxisName"=>"Komoditas",
			"yAxisName"=>"Jumlah",
			"theme"=>"fint"
		);
        
		$d = $this->login_m->grafikPadi1();
        array_push($d,array("label"=>"k.namaKomoditas", "value"=>count($b.idKomoditas)));

		$gab = array("chart"=>$c,"data"=>$d);
		echo json_encode($gab);;
	}*/

	function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}

