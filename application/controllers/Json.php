<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Json extends CI_Controller {
    public function __construct()
    {
				parent::__construct();
				ob_start();
				$this->load->model('login_m');
                $this->load->model('Crud_m');
    }

    public function index(){
	    echo "sdas";
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
    public function grafik($id)
    {
        $provinsi = $this->Crud_m->getAllProvince();
        switch ($id) {
             case '4':
                $where = " AND tanggal > DATE_SUB(now(), INTERVAL 12 MONTH)";
                break;
            case '2':
                $where = " AND tanggal > DATE_SUB(now(), INTERVAL 1 MONTH)";
                break;
            case '3':
                $where = " AND tanggal > DATE_SUB(now(), INTERVAL 6 MONTH)";
                break;
            
            default:
                $where = '';
                break;
        }
        
        foreach ($provinsi->result() as $key) {
            $res = $this->login_m->chartBatang_provinsi($key->idProvinsi,$where);
            $data['grafik'][] = array('label' => $res[0]['namaProvinsi'],'value' =>$res[0]['jml']  );
        }
        header('Content-Type: application/json');
        echo json_encode($data['grafik']);
    }
    public function grafikTek($id)
    {
        $provinsi = $this->Crud_m->getAllProvince();
        switch ($id) {
            case '4':
                $where = " AND tanggal > DATE_SUB(now(), INTERVAL 12 MONTH)";
                break;
            case '2':
                $where = " AND tanggal > DATE_SUB(now(), INTERVAL 1 MONTH)";
                break;
            case '3':
                $where = " AND tanggal > DATE_SUB(now(), INTERVAL 6 MONTH)";
                break;
            
            default:
                $where = '';
                break;
        }
        foreach ($provinsi->result() as $key) {
                        $res = $this->login_m->chartProvinsi_teknologi($key->idProvinsi,$where);
                        $data['grafik'][] = array('name' => $res[0]['namaProvinsi'],'y' =>intval($res[0]['jml']),'drilldown' => $res[0]['namaProvinsi'],  );
                        $hsl = $this->login_m->chartProvinsi_teknologi_drill($key->idProvinsi,$where);
                        // unset($hasil);
                        $hasil =array();
                        foreach ($hsl as $nn) {
                           $hasil[] = array('0' => $nn->teknologi,'1'=>intval($nn->jml) );
                        }
                        $data['series'][] = array('name'=>$res[0]['namaProvinsi'],'id'=>$res[0]['namaProvinsi'],'data'=>$hasil);
                        
                    }
        header('Content-Type: application/json');
        echo json_encode(array('data'=>$data['grafik'],'series'=>$data['series']));
    }
}
