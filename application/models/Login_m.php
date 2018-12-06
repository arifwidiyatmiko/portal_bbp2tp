
<?php

class Login_m extends CI_Model {

    private $table = "admin";

    public function ceklogin($tbl,$where){
      return $this->db->get_where($tbl,$where);
    }
    public function signin($array)
    {
        $sql = "SELECT * FROM admin INNER JOIN provinsi on provinsi.idProvinsi = admin.idProvinsi WHERE admin.namaPengguna = '".$array['namaPengguna']."' AND admin.kataSandi = '".$array['kataSandi']."' ";
        // echo $sql;die();
        return $this->db->query($sql);
    }

    public function ambilSemua($tbl)
    {
        return $this->db->get($tbl);
    }

    public function insertData($tbl,$data)
    {
        // echo json_encode($data);die();
        $this->db->insert($tbl, $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    public function updateData($tbl, $data, $where)
    {
        $this->db->update($tbl, $data, $where);
    }

    public function deleteData($tbl, $where)
    {
        $this->db->delete($tbl,$where);
    }

    public function ambilData($tbl, $where = null)
    {
        if ($where) {
            $this->db->where($where);
        }
        return $this->db->get($tbl);
    }
    
    public function getKecamatanAll()
    {
        $sql = "SELECT * FROM `kecamatan` INNER JOIN `kota` on kota.idCity = kecamatan.idCIty INNER JOIN provinsi on provinsi.idProvinsi = kota.idProvince ORDER BY `idKecamatan`  DESC";
        return $this->db->query($sql);
    }

    function simpanAgenda($jdl,$tempat,$tanggal,$peserta,$tVIP,$pj,$gambar){
		$hsl=$this->db->query("INSERT INTO agenda (idAgenda,judulKegiatan,tempat,tanggal,peserta,tamuVIP,pjKegiatan,foto) VALUES ('NULL','$jdl','$tempat','$tanggal','$peserta','$tVIP','$pj','$gambar')");
		return $hsl;
	}
    
    function getAllAgenda($where=''){
		if ($where != '') {
           $hsl=$this->db->query("SELECT * FROM agenda WHERE baseUrl = '".$where."' ORDER BY idAgenda DESC");
        }else{
            $hsl=$this->db->query("SELECT * FROM agenda ORDER BY idAgenda DESC");
        }
		return $hsl;
	}
    
    public function chartBatang_provinsi($id,$where='')
    {
        $sql = "SELECT berita.idProvinsi,provinsi.namaProvinsi, COUNT(berita.idBerita) as jml FROM `berita`  RIGHT JOIN provinsi on provinsi.idProvinsi=berita.idProvinsi WHERE provinsi.idProvinsi = ".$id." ".$where." ";
        return $this->db->query($sql)->result_array();
    }

    public function chartProvinsi_teknologi($id,$where='')
    {
        $sql = "SELECT berita.idProvinsi, COUNT(teknologi_berita.idTeknologi) as jml,provinsi.namaProvinsi FROM `berita`  RIGHT JOIN teknologi_berita on teknologi_berita.idBerita=berita.idBerita INNER JOIN provinsi on provinsi.idProvinsi = berita.idProvinsi WHERE berita.idProvinsi = '".$id."' ".$where." ";
        return $this->db->query($sql)->result_array();
    }
    public function chartProvinsi_teknologi_drill($id,$where='')
    {
        $sql = "SELECT teknologi.teknologi,COUNT(teknologi_berita.idBerita) as jml,provinsi.namaProvinsi FROM `teknologi` INNER JOIN teknologi_berita on teknologi_berita.idTeknologi = teknologi.idTeknologi INNER JOIN berita on berita.idBerita = teknologi_berita.idBerita INNER JOIN provinsi on provinsi.idProvinsi = berita.idProvinsi  WHERE berita.idProvinsi = '".$id."' ".$where." GROUP BY teknologi_berita.idTeknologi";
        return $this->db->query($sql)->result();
    }

    function simpanBerita($idSubsektor,$vub,$varSpeklok,$idKomoditas,$idKegiatan,$idPrioritas,$judulBerita,$isiBerita,$sumber,$berkas,$gambar,$idAdmin,$status){
		$hsl=$this->db->query("INSERT INTO `db_bbp2tp`.`berita` (`idBerita`, `tanggal`, `idSubsektor`, `vub`, `varSpeklok`, `idKomoditas`, `idKegiatan`, `idPrioritas`, `judulBerita`, `isiBerita`, `sumber`, `berkas`, `gambar`, `idAdmin`, `status`) VALUES (NULL, CURRENT_TIMESTAMP, '$idSubsektor', '$vub', '$varSpeklok', '$idKomoditas', '$idKegiatan', '$idPrioritas', '$judulBerita', '$isiBerita', '$sumber', '$berkas', '$gambar', '$idAdmin', '0');");
		return $hsl;
	}
    
    function getAllBerita($where = '',$case=''){
        if ($where != '') {
            $sql = "SELECT * FROM berita as b INNER JOIN kegiatan as ke ON b.idKegiatan = ke.idKegiatan INNER JOIN prioritas as p ON b.idPrioritas = p.idPrioritas INNER JOIN admin as a ON b.idAdmin = a.idAdmin WHERE b.baseUrl = '".$where."' ";
            
        }else{
            $sql = "SELECT * FROM berita as b INNER JOIN kegiatan as ke ON b.idKegiatan = ke.idKegiatan INNER JOIN prioritas as p ON b.idPrioritas = p.idPrioritas INNER JOIN admin as a ON b.idAdmin = a.idAdmin ";
		      //$hsl=$this->db->query($sql);
        }
        $sql .= $case;
        $sql .= "ORDER BY b.idBerita DESC";
        $hsl=$this->db->query($sql);
        // echo $sql;die();        
		return $hsl;
	}
    
    function getAllBeritaAceh(){
		$hsl=$this->db->query("SELECT * FROM berita as b INNER JOIN subsektor as s on b.idSubsektor = s.idSubsektor INNER JOIN komoditas as k ON b.idKomoditas = k.idKomoditas INNER JOIN kegiatan as ke ON b.idKegiatan = ke.idKegiatan INNER JOIN prioritas as p ON b.idPrioritas = p.idPrioritas WHERE b.idAdmin = '5' ORDER BY idBerita DESC");
		return $hsl;
	}
    
    function getAllBeritaProgram(){
		$hsl=$this->db->query("SELECT * FROM berita as b INNER JOIN subsektor as s on b.idSubsektor = s.idSubsektor INNER JOIN komoditas as k ON b.idKomoditas = k.idKomoditas INNER JOIN kegiatan as ke ON b.idKegiatan = ke.idKegiatan INNER JOIN prioritas as p ON b.idPrioritas = p.idPrioritas WHERE b.idAdmin = '2' ORDER BY idBerita DESC");
		return $hsl;
	}
    
    function getAllBeritaTU(){
		$hsl=$this->db->query("SELECT * FROM berita as b INNER JOIN subsektor as s on b.idSubsektor = s.idSubsektor INNER JOIN komoditas as k ON b.idKomoditas = k.idKomoditas INNER JOIN kegiatan as ke ON b.idKegiatan = ke.idKegiatan INNER JOIN prioritas as p ON b.idPrioritas = p.idPrioritas WHERE b.idAdmin = '3' ORDER BY idBerita DESC");
		return $hsl;
	}
    
    function getAllBeritaKsphp(){
		$hsl=$this->db->query("SELECT * FROM berita as b INNER JOIN subsektor as s on b.idSubsektor = s.idSubsektor INNER JOIN komoditas as k ON b.idKomoditas = k.idKomoditas INNER JOIN kegiatan as ke ON b.idKegiatan = ke.idKegiatan INNER JOIN prioritas as p ON b.idPrioritas = p.idPrioritas WHERE b.idAdmin = '4' ORDER BY idBerita DESC");
		return $hsl;
	}
    
    function getAllBeritaBptp($where){
		$hsl=$this->db->query("SELECT * FROM berita as b INNER JOIN subsektor as s on b.idSubsektor = s.idSubsektor INNER JOIN komoditas as k ON b.idKomoditas = k.idKomoditas INNER JOIN kegiatan as ke ON b.idKegiatan = ke.idKegiatan INNER JOIN prioritas as p ON b.idPrioritas = p.idPrioritas WHERE b.idAdmin = '$where' ORDER BY idBerita DESC");
		return $hsl;
	}
    
    function grafikBulan1(){
        $query = $this->db->query("select k.namaKomoditas as Komoditas,count(*) as Jumlah from komoditas as k inner join berita as b on k.idKomoditas = b.idKomoditas where month(tanggal) = '01' group by b.idKomoditas");
        return $query;
    }
    
    function grafikBulan2(){
        $query = $this->db->query("select k.namaKomoditas as Komoditas,count(*) as Jumlah from komoditas as k inner join berita as b on k.idKomoditas = b.idKomoditas where month(tanggal) = '02' group by b.idKomoditas");
        return $query;
    }
    
    function grafikBulan3(){
        $query = $this->db->query("select k.namaKomoditas as Komoditas,count(*) as Jumlah from komoditas as k inner join berita as b on k.idKomoditas = b.idKomoditas where month(tanggal) = '03' group by b.idKomoditas");
        return $query;
    }
    
    function grafikBulan4(){
        $query = $this->db->query("select k.namaKomoditas as Komoditas,count(*) as Jumlah from komoditas as k inner join berita as b on k.idKomoditas = b.idKomoditas where month(tanggal) = '04' group by b.idKomoditas");
        return $query;
    }
    
    function grafikBulan5(){
        $query = $this->db->query("select k.namaKomoditas as Komoditas,count(*) as Jumlah from komoditas as k inner join berita as b on k.idKomoditas = b.idKomoditas where month(tanggal) = '05' group by b.idKomoditas");
        return $query;
    }
    
    function grafikBulan6(){
        $query = $this->db->query("select k.namaKomoditas as Komoditas,count(*) as Jumlah from komoditas as k inner join berita as b on k.idKomoditas = b.idKomoditas where month(tanggal) = '06' group by b.idKomoditas");
        return $query;
    }
    
    function grafikBulan7(){
        $query = $this->db->query("select k.namaKomoditas as Komoditas,count(*) as Jumlah from komoditas as k inner join berita as b on k.idKomoditas = b.idKomoditas where month(tanggal) = '07' group by b.idKomoditas");
        return $query;
    }
    
    function grafikTahunan(){
        $query = $this->db->query("select k.namaKomoditas as Komoditas,count(*) as Jumlah from komoditas as k inner join berita as b on k.idKomoditas = b.idKomoditas where year(tanggal) = '2018' group by b.idKomoditas");
        return $query;
    }
    
    /* function grafikStatistik(){
        $query = $this->db->query("select namaKomoditas,k.idKomoditas from komoditas as k left join berita as b on k.idKomoditas = b.idKomoditas  WHERE b.idAdmin = '1'");
        return $query;
    } */
    
    function grafikSubsektor1(){
        $query = $this->db->query("select namaSubsektor as Subsektor,count(b.idSubsektor) as Jumlah from subsektor as s right join berita as b on s.idSubsektor = b.idSubsektor WHERE b.idSubsektor = '1' Order By b.idBerita DESC");
        return $query;
    }
    
    //------------------------------------------------------------------------
    //  CHAINED DROPDOWN SEMUA   //
    /* function getSubsektorList(){
		$result = array();
		$this->db->select('*');
		$this->db->from('subsektor');
		$this->db->order_by('idSubsektor','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Subsektor-';
            $result[$row->idSubsektor]= $row->namaSubsektor;
        }
        
        return $result;
	}
    
    function getKomoditasList(){
		$idSubsektor = $this->input->post('fidSubsektor');
		$result = array();
		$this->db->select('*');
		$this->db->from('komoditas');
		$this->db->where('idSubsektor',$idSubsektor);
		$this->db->order_by('idKomoditas','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Komoditas-';
            $result[$row->idKomoditas]= $row->namaKomoditas;
        }
        
        return $result;
	} */
    
    // DROPDOWN 2 //
    function getSubsektor(){
        $result = $this->db->get('subsektor');
        if  ($result->num_rows() > 0){
            return $result->result_array();
        }else{
            return array();
        }
    }

    public function getKomoditasAll()
    {
        $sql = "SELECT * FROM `komoditas` INNER JOIN `subsektor` on subsektor.idSubsektor = komoditas.idSubsektor ORDER BY subsektor.namaSubsektor";
        return $this->db->query($sql)->result();
    }
    public function insertKomoditas($data)
    {
        $this->db->insert('komoditas', $data);
    }
    public function updateKomoditas($id,$data)
    {
        $this->db->where('idKomoditas', $id);
        $this->db->update('komoditas', $data);
    }
    public function deleteKomoditas($id)
    {
        $this->db->where('idKomoditas', $id);
        $this->db->delete('komoditas');
    }
    
    public function getBeritaTek($idTek,$url=''){
        $this->db->select('*');
        $this->db->join('berita','berita.idBerita = teknologi_berita.idBerita','inner');
        $this->db->join('prioritas','prioritas.idPrioritas = berita.idPrioritas','inner');
        $this->db->join('kegiatan','kegiatan.idKegiatan = berita.idKegiatan','inner');
        $this->db->join('admin','admin.idAdmin = berita.idAdmin','inner');
        $this->db->where('teknologi_berita.idTeknologi',$idTek);    
        if($url != ''){$this->db->where('berita.baseUrl',$url);}
        return $this->db->get('teknologi_berita');
    }
    public function getAllTek($where){
        $this->db->select('*');
        $this->db->join('teknologi', 'teknologi.idTeknologi = teknologi_berita.idTeknologi', 'right');
        $this->db->where('teknologi_berita.idBerita', $id);
        return $this->db->get('teknologi_berita');
    }
    
    public function getTeknologi($id)
    {
        $this->db->select('*');
        $this->db->join('teknologi', 'teknologi.idTeknologi = teknologi_berita.idTeknologi', 'right');
        $this->db->where('teknologi_berita.idBerita', $id);
        return $this->db->get('teknologi_berita');
    }
    public function getKegiatan($value='')
    {
        $this->db->order_by('namaKegiatan', 'ASC');
        return $this->db->get('kegiatan');
    }
    public function insertKegiatan($data)
    {
        $this->db->insert('kegiatan', $data);
    }
    public function updateKegiatan($id,$data)
    {
        $this->db->where('idKegiatan', $id);
        $this->db->update('kegiatan', $data);
    }
    public function deleteKegiatan($id)
    {
        $this->db->where('idKegiatan', $id);
        $this->db->delete('kegiatan');
    }
    
    function getKomoditas($idSubsektor){
        $this->db->where('idSubsektor',$idSubsektor);
        $result = $this->db->get('komoditas');
        if  ($result->num_rows() > 0){
            return $result->result_array();
        }else{
            return array();
        }
    }
    public function cekTekno($value)
    {
        $this->db->where('teknologi', $value);
        return $this->db->get('teknologi');
    }
}
