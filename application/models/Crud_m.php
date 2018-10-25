<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_m extends CI_Model {

    /* public function getBerita(){
        $this->db->order_by('idBerita','DESC');
        $query = $this->db->get('berita');
        return $query->result();
    } */
    
    public function marqueeAgenda(){
        $this->db->select('*');
        $this->db->where('baseUrl', base_url());
        $this->db->order_by('idAgenda','DESC');
        $query = $this->db->get('agenda');
        return $query->result();
    }

    public function getAgenda(){
        $this->db->select('*');
        $this->db->where('baseUrl', base_url());
        $this->db->order_by('idAgenda','DESC');
        $query = $this->db->get('agenda',2,0);
        return $query->result();
    }
    
    function getAllAgenda(){
		$hsl=$this->db->query("SELECT * FROM agenda WHERE baseUrl = '".base_url()."' ORDER BY idAgenda DESC");
		return $hsl;
	}
    public function getAllProvince($value='')
    {
        return $this->db->get('provinsi');
    }
    public function getAllCity($value='')
    {
        if ($value != '') {
           $this->db->where('idProvince',$value);
        }
        $result =  $this->db->get('t_city');
        if  ($result->num_rows() > 0){
            return $result->result_array();
        }else{
            return array();
        }
    }

    public function getKomoditasId($id)
    {
       $this->db->where('idSubsektor', $id);
       return $this->db->get('komoditas');
    }

    public function getPresiden(){
        $this->db->select('*');
        $this->db->where('idPrioritas', '1');
        $this->db->where('status', '1');
        $this->db->order_by('idBerita','DESC');
        $query = $this->db->get('berita',1,0);
        return $query->result();
    }

    public function getMenteri(){
        $this->db->select('*');
        $this->db->where('idPrioritas', '2');
        $this->db->where('status', '1');
        $this->db->order_by('idBerita','DESC');
        $query = $this->db->get('berita',1,0);
        return $query->result();
    }
    public function getKomo_berita($idBerita)
    {
        $sql = "SELECT * FROM `komoditas_berita` INNER JOIN `komoditas` on komoditas_berita.idKomoditas = komoditas.idKomoditas WHERE idBerita = '".$idBerita."'";
        $data = $this->db->query($sql)->result();
        // print_r($data);die();
        foreach ($data as $key) {
            $res[] = $key->namaKomoditas;
        }
        return $res;
    }

    public function getGubernur(){
        $this->db->select('*');
        $this->db->where('idPrioritas', '3');
        $this->db->where('status', '1');
        $this->db->order_by('idBerita','DESC');
        $query = $this->db->get('berita',1,0);
        return $query->result();
    }
    
    public function getKepalaBadan(){
        $this->db->select('*');
        $this->db->where('idPrioritas', '4');
        $this->db->where('status', '1');
        $this->db->order_by('idBerita','DESC');
        $query = $this->db->get('berita',1,0);
        return $query->result();
    }
    
    public function getUmum(){
        $query = $this->db->query("select * from berita where idPrioritas > '4' and status = '1' order by idBerita DESC limit 1");
        return $query->result();
    }

    //  PAGINATION //
    public function get_berita_count($uri='')
    {
        $this->db->where('baseUrl', base_url());
        $this->db->where('status', '1');
        return $this->db->get('berita')->num_rows();
    }

    function get_berita_list($limit, $start){
        $this->db->where('baseUrl', base_url());
        $this->db->where('status', '1');
        $this->db->order_by('idBerita','DESC');
        $query = $this->db->get('berita', $limit, $start);
        return $query;
    }
    //  END OF PAGINATION //
    
    public function getPadi($kode, $limit, $start){
        $this->db->select('*');
        $this->db->where('idKomoditas', $kode);
        $this->db->where('status', '1');
        $this->db->order_by('idBerita','DESC');
        $query = $this->db->get('berita', $limit, $start);
        return $query->result();
    }
    
    public function getPadi1($kode, $limit, $start){
        $this->db->select('*');
        $this->db->where('idKegiatan', $kode);
        $this->db->where('status', '1');
        $this->db->order_by('idBerita','DESC');
        $query = $this->db->get('berita', $limit, $start);
        return $query->result();
    }

    public function getMingguan(){
        $query = $this->db->query("SELECT * FROM berita WHERE tanggal >= DATE_SUB(curdate(),INTERVAL 7 day) AND status = '1' ORDER BY idBerita DESC LIMIT 7;");
        return $query->result();
    }

    /*public function getKomoditas($kode){
        $query = $this->db->query("SELECT * FROM komoditas WHERE idKomoditas='$kode'");
        return $query;
    }*/
    
    public function getSerambi(){
        $query = $this->db->query("SELECT * FROM berita WHERE baseUrl = '".base_url()."' and status = '1' ORDER BY idBerita DESC LIMIT 7");
        return $query;
    }
    
    public function getKategori(){
        $query = $this->db->query("SELECT * FROM komoditas as k INNER JOIN subsektor as s on k.idSubsektor = s.idSubsektor WHERE s.idSubsektor='1'");
        return $query;
    }
    
    public function getKategori1(){
        $query = $this->db->query("SELECT * FROM komoditas as k INNER JOIN subsektor as s on k.idSubsektor = s.idSubsektor WHERE s.idSubsektor='2'");
        return $query;
    }
    
    public function getKategori2(){
        $query = $this->db->query("SELECT * FROM komoditas as k INNER JOIN subsektor as s on k.idSubsektor = s.idSubsektor WHERE s.idSubsektor='3'");
        return $query;
    }
    
    public function getKategori3(){
        $query = $this->db->query("SELECT * FROM komoditas as k INNER JOIN subsektor as s on k.idSubsektor = s.idSubsektor WHERE s.idSubsektor='4'");
        return $query;
    }
    
    public function getKategori4(){
        $query = $this->db->query("SELECT * FROM kegiatan");
        return $query;
    }

    public function getDetailKategori($kode){
        $query =$this->db->query("SELECT * FROM komoditas as k INNER JOIN subsektor as s on k.idSubsektor = s.idSubsektor WHERE k.idKomoditas='$kode'");
        return $query;
    }
    
    public function getDetailKategoriK($kode){
        $query =$this->db->query("SELECT * FROM kegiatan WHERE idKegiatan='$kode'");
        return $query;
    }
    
    public function getDetailBerita($kode){
        $query =$this->db->query("SELECT * FROM berita as b INNER JOIN subsektor as s on b.idSubsektor = s.idSubsektor INNER JOIN komoditas as k ON b.idKomoditas = k.idKomoditas INNER JOIN kegiatan as ke ON b.idKegiatan = ke.idKegiatan INNER JOIN prioritas as p ON b.idPrioritas = p.idPrioritas INNER JOIN admin as a ON b.idAdmin = a.idAdmin WHERE idBerita='$kode' AND status = '1'");
        return $query;
    }

    public function getDetailAgenda($kode){
        $query =$this->db->query("SELECT * FROM agenda WHERE idAgenda='$kode'");
        return $query;
    }

    public function cariBerita($keyword){
        $query = $this->db->query("SELECT * FROM berita WHERE status = '1' AND baseUrl = '".base_url()."' AND (judulBerita LIKE '$keyword' OR isiBerita LIKE '$keyword') ORDER BY idBerita DESC"); 
        // print_r($query);die();
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->where('status', '1');
        $this->db->where('baseUrl', base_url());
        $this->db->like('judulBerita',$keyword);
        $this->db->or_like('isiBerita',$keyword);
        $this->db->order_by('idBerita','DESC');
        return $this->db->get()->result();
        //return $query->result();
    }

/*    public function menu($parent=0,$hasil){
        $w = $this->db->query("SELECT * from komoditas where idSubsektor='".$parent."'");
        if(($w->num_rows())>0)
        {
            $hasil .= "<ul>";
        }
        foreach($w->result() as $h)
        {
            $hasil .= "<li>".$h->namaKomoditas;
            $hasil = $this->menu($h->idKomoditas,$hasil);
            $hasil .= "</li>";
        }
        if(($w->num_rows)>0)
        {
            $hasil .= "</ul>";
        }
        return $hasil;
    }

    function getMenu($parent,$hasil){
         $w = $this->db->query("SELECT * from komoditas where idSubsektor='".$parent."'");
         foreach($w->result() as $h)
         {
                 $cek_parent=$this->db->query("SELECT * from komoditas WHERE idSubsektor=".$h->idKomoditas."");
         if(($cek_parent->num_rows())>0){
                $hasil .= '<li class="dropdown"><a href="'.base_url().'portal/read/'.$h->idKomoditas.'" class="dropdown-toggle" data-toggle="dropdown">'.$h->namaKomoditas.' &nbsp;<b class="caret"></b></a> ';
                }
          else {
                        $hasil.='<li><a href="'.base_url().'portal/read/'.$h->idKomoditas.'">'.$h->namaKomoditas.'</a></li>';
                        }
                                $hasil .='<ul class="dropdown-menu">';
                                $hasil = $this->getMenu($h->idKomoditas,$hasil);
                                $hasil .='</ul>';              
                                $hasil .= "</li></li>";
         }
         return str_replace('<ul class="dropdown-menu"></ul>','',$hasil);
     }           
     
     // fungsi untuk menampilkan menu yang di klik
     public function read($idKomoditas){
                $this->db->where('idKomoditas',$idKomoditas);
                $sql_menu=$this->db->get('komoditas');
                        if($sql_menu->num_rows()==1){
                                return $sql_menu->row_array();   
                        }        
                }


    public function ceklogin($tbl,$where){
      return $this->db->get_where($tbl,$where);
    }

    public function ambilSemua($tbl)
    {
        return $this->db->get($tbl);
    }

    public function ambilData($tbl, $where = null)
    {
        if ($where) {
            $this->db->where($where);
        }
        return $this->db->get($tbl);
    }

    public function insertData($tbl,$data)
    {
        $this->db->insert($tbl, $data);
    }

    public function updateData($tbl, $data, $where)
    {
        $this->db->update($tbl, $data, $where);
    }

    public function deleteData($tbl, $where)
    {
        $this->db->delete($tbl,$where);
    }
*/
}
