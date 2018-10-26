

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Json extends CI_Controller {
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
	
	}
	public function dataKota($value='')
    {
    	$data = '';
        $kom = $this->Crud_m->getAllCity($value);
        $data .= "<option value=''>-- Pilih Kota --</option>";
        foreach ($kom as $k){
            $data .= "<option value='$k[idCity]'>$k[cityName]</option>\n";
        }
        echo $data;
        // $data = array('data' => $result);
        // echo json_encode($data);
    }
    public function dataKecamatann($value='')
    {
        $data = '';
        $kom = $this->Crud_m->getAllKecamatan($value)->result_array();
        $data .= "<option value=''>-- Pilih Kecamatan --</option>";
        foreach ($kom as $k){
            $data .= "<option value='$k[idKecamatan]'>$k[kecamatanName]</option>\n";
        }
        echo $data;
        // $data = array('data' => $result);
        // echo json_encode($data);
    }
}
