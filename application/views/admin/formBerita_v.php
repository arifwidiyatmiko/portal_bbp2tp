<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin News Portal Balai Besar</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/home/img/logo-mini.png">
    <!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url(); ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/admin/assets/datepicker/css/bootstrap-datepicker.css" rel="stylesheet" type="text/css" />
    <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url(); ?>assets/admin/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="<?php echo base_url(); ?>assets/admin/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url(); ?>assets/admin/assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/css/jquery-ui.css">

</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>dashboard"><h3>BPTP News: Input Data</h3></a>
            </div>
            <?php foreach ($admin->result() as $key) {
            $divreal;
            if ($key->idProvinsi == 11){
                $divreal = "Nanggroe Aceh Darussalam";$idProvinsi_def = $key->idProvinsi;
            }
            elseif($key->idProvinsi == 12){
                $divreal = "Sumatera Utara";$idProvinsi_def = $key->idProvinsi;
            }
            elseif($key->idProvinsi == 13){
                $divreal = "Sumatera Barat";$idProvinsi_def = $key->idProvinsi;
            }
            elseif($key->idProvinsi == 14){
                $divreal = "Riau";$idProvinsi_def = $key->idProvinsi;
            }
            elseif($key->idProvinsi == 15){
                $divreal = "Jambi";$idProvinsi_def = $key->idProvinsi;
            }
            elseif($key->idProvinsi == 16){
                $divreal = "Sumatera Selatan";$idProvinsi_def = $key->idProvinsi;
            }
            elseif($key->idProvinsi == 17){
                $divreal = "Bengkulu";$idProvinsi_def = $key->idProvinsi;
            }
            elseif($key->idProvinsi == 18){
                $divreal = "Lampung";$idProvinsi_def = $key->idProvinsi;
            }
            elseif($key->idProvinsi == 19){
                $divreal = "Kep. Bangka Belitung";
            }
            elseif($key->idProvinsi == 21){
                $divreal = "Kep. Riau";$idProvinsi_def = $key->idProvinsi;
            }
            elseif($key->idProvinsi == 31){
                $divreal = "DKI Jakarta";$idProvinsi_def = $key->idProvinsi;
            }
            elseif($key->idProvinsi == 32){
                $divreal = "Jawa Barat";$idProvinsi_def = $key->idProvinsi;
            }
            elseif($key->idProvinsi == 33){
                $divreal = "Jawa Tengah";$idProvinsi_def = $key->idProvinsi;
            }
            elseif($key->idProvinsi == 34){
                $divreal = "DI Yogyakarta";$idProvinsi_def = $key->idProvinsi;
            }
            elseif($key->idProvinsi == 35){
                $divreal = "Jawa Timur";$idProvinsi_def = $key->idProvinsi;
            }
            elseif($key->idProvinsi == 36){
                $divreal = "Banten";$idProvinsi_def = $key->idProvinsi;
            }
            elseif($key->idProvinsi == 51){
                $divreal = "Bali";$idProvinsi_def = $key->idProvinsi;
            }
            elseif($key->idProvinsi == 52){
                $divreal = "Nusa Tenggara Barat";$idProvinsi_def = $key->idProvinsi;
            }
            elseif($key->idProvinsi == 53){
                $divreal = "Nusa Tenggara Timur";$idProvinsi_def = $key->idProvinsi;
            }
            elseif($key->idProvinsi == 61){
                $divreal = "Kalimantan Barat";$idProvinsi_def = $key->idProvinsi;
            }
            elseif($key->idProvinsi == 62){
                $divreal = "Kalimantan Tengah";$idProvinsi_def = $key->idProvinsi;
            }
            elseif($key->idProvinsi == 63){
                $divreal = "Kalimantan Selatan";$idProvinsi_def = $key->idProvinsi;
            }
            elseif($key->idProvinsi == 64){
                $divreal = "Kalimantan Timur";$idProvinsi_def = $key->idProvinsi;
            }
            elseif($key->idProvinsi == 71){
                $divreal = "Sulawesi Utara";$idProvinsi_def = $key->idProvinsi;
            }
            elseif($key->idProvinsi == 72){
                $divreal = "Sulawesi Tengah";$idProvinsi_def = $key->idProvinsi;
            }
            elseif($key->idProvinsi == 73){
                $divreal = "Sulawesi Selatan";$idProvinsi_def = $key->idProvinsi;
            }
            elseif($key->idProvinsi == 74){
                $divreal = "Sulawesi Tenggara";$idProvinsi_def = $key->idProvinsi;
            }
            elseif($key->idProvinsi == 75){
                $divreal = "Gorontalo";$idProvinsi_def = $key->idProvinsi;
            }
            elseif($key->idProvinsi == 76){
                $divreal = "Sulawesi Barat";$idProvinsi_def = $key->idProvinsi;
            }
            elseif($key->idProvinsi == 81){
                $divreal = "Maluku";$idProvinsi_def = $key->idProvinsi;
            }
            elseif($key->idProvinsi == 82){
                $divreal = "Maluku Utara";$idProvinsi_def = $key->idProvinsi;
            }
            elseif($key->idProvinsi == 91){
                $divreal = "Papua Barat";$idProvinsi_def = $key->idProvinsi;
            }
            elseif($key->idProvinsi == 94){
                $divreal = "Papua";$idProvinsi_def = $key->idProvinsi;}
              ?>
            <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">
                <?php echo $key->nama ?>&nbsp;
                <a href="<?php echo site_url('dashboard/logout'); ?>" class="btn btn-danger square-btn-adjust">Logout</a>
            </div>
        </nav>
        <?php } ?>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a class="active-menu" href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard fa-2x"></i> Beranda</a>
                    </li>
                    <li><a href="<?php echo base_url(); ?>dashboard/formBerita"><i class="fa fa-edit fa-2x"></i> Formulir Berita</a></li>
                    <li><a href="<?php echo base_url(); ?>dashboard/tabelBerita"> <i class="fa fa-table fa-2x"></i> Tabel Berita</a></li>
                    <li>
                        <a href="#"><i class="fa fa-table fa-2x"></i> Data Master<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url(); ?>dashboard/tabelBerita">Pengguna</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>dashboard/komoditas">Komoditas</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a   href="<?php echo base_url(); ?>dashboard/grafik"><i class="fa fa-bar-chart-o fa-2x"></i> Grafik</a>
                    </li>
                    <!-- <li>
                        <a  href="blank.html"><i class="fa fa-square-o fa-2x"></i> Blank Page</a>
                    </li> -->   
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>dashboard">Beranda</a></li>
                            <li class="active">Formulir</li>
                            <li class="active">Formulir Berita</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <!-- Form Elements -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Formulir Berita
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- <form action="<?php echo base_url().'dashboard/simpanBerita'?>" method="post" enctype="multipart/form-data"> -->
                                        <?php echo form_open_multipart('dashboard/simpanBerita'); ?>
                                        <?php   foreach ($admin->result() as $key) { ?>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="idAdmin" value="<?php echo $key->idAdmin ?>" />
                                        </div>
                                        <?php }?>
                                        <div class="form-group">
                                                <label>Tanggal <span style="color: red;">(wajib)</span></label>
                                                <input type="text" class="form-control input-group date" name="ftanggal" data-date-format="yyyy-mm-dd" placeholder="Tanggal" required/>
                                        </div>
                                        <div class="form-group col-sm-4">
                                                <label>Provinsi  <span style="color: red;">(wajib)</span></label>
                                                <select class="form-control" name="provinsi" id="provinsi" required="true" disabled>
                                                    <?php 
                                                    foreach ($provinsi->result() as $key) {
                                                        ?><option value="<?= $key->idProvinsi?>" <?php if($key->idProvinsi == $idProvinsi_def){echo "selected";} ?>><?= $key->namaProvinsi ?></option><?php 
                                                    }
                                                    ?>
                                                </select>
                                        </div>
                                         <div class="form-group  col-sm-4">
                                            <label>Kota <span style="color: red;">(wajib)</span></label>
                                            <select class="form-control" name="kota" id="kota">
                                                <!-- <option value="" disabled selected>-- Pilih Provinsi Dahulu --</option> -->
                                                <option value="" disabled selected>-- Pilih Kota --</option>
                                                <?php 
                                                // print_r($city);die();
                                                foreach ($city as $val=>$key) {
                                                        ?><option value="<?= $key['idCity']?>"><?= $key['cityName'] ?></option><?php 
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group  col-sm-4">
                                            <label>Kecamatan <span style="color: red;">(wajib)</span></label>
                                            <select class="form-control" name="kecamatan" id="kecamatan">
                                                <option value="" disabled selected>-- Pilih Kota Terlebih Dahulu --</option>
                                               
                                            </select>
                                        </div>
                                         <div class="form-group col-sm-6">
                                            <label>Kelurahan atau Desa <span style="color: red;">(wajib)</span></label>
                                            <input type="text" class="form-control" name="kelurahan" placeholder="Nama Kelurahan" required/>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Prioritas <span style="color: red;">(wajib)</span></label>
                                            <select class="form-control" name="cmbPrioritas" id="cmbPrioritas" required>
                                                <option value="" disabled selected>-- Pilih Prioritas --</option>
                                                <?php foreach($cmbPrioritas->result() as $perdata) {?>
                                                <option value="<?php echo $perdata->idPrioritas; ?>"><?php echo $perdata->namaPrioritas; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Judul Berita <span style="color: red;">(wajib)</span></label>
                                            <input type="text" class="form-control" name="fjudul" placeholder="Judul Berita" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Isi Berita <span style="color: red;">(wajib)</span></label>
                                            <textarea class="form-control" name="fisi" id="ckeditor" placeholder="Isi Berita" required></textarea>
                                            <!-- <span id="hitung">5000</span> Karakter tersisa -->
                                        </div>
                                       
                                        <div class="form-group">
                                            <label>Komoditas <span style="color: red;">(wajib)</span></label>
                                            <select class="form-control" name="cmbKomoditas[]" id="cmbKomoditas" multiple="multiple">
                                                <?php 
                                                foreach ($cmbKomoditas as $key) {
                                                    $komoditas[$key->namaSubsektor][] = array('idKomoditas'=>$key->idKomoditas,'namaKomoditas'=>$key->namaKomoditas);
                                                }
                                                foreach ($komoditas as $subs=>$value){
                                                    echo "<optgroup label='".$subs."'>";
                                                    foreach ($value as $keys) {
                                                        echo "<option value='".$keys['idKomoditas']."'>".$keys['namaKomoditas']."</option>";
                                                    }
                                                    echo "</optgroup>";
                                                }?>
                                                <!-- <option value="x">Lain Lain</option> -->
                                            </select>
                                            <!-- <input id="tags" class="form-control" size="50"> -->
                                        </div>
                                        <div class="form-group" id="d_fteknologi">
                                            <label>Introduksi Teknologi Lain </label>
                                            <input type="text" class="form-control" name="fteknologi" id="fteknologi" placeholder="Luas Tanam" />
                                        </div>
                                        <div class="form-group" id="d_fteknologi">
                                            <label>Agroekosistem *</label>
                                            <select name="fagroekosistem" id="fagroekosistem" class="form-control">
                                                <option value="Lahan Sawah">Lahan Sawah</option>
                                                <option value="Lahan Kering">Lahan Kering</option>
                                                <option value="Lahan Rawa">Lahan Rawa</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kegiatan</label>
                                            <select class="form-control" name="cmbKegiatan" id="cmbKegiatan" required>
                                                <option value="" disabled selected>-- Pilih Kegiatan --</option>
                                                <?php foreach($cmbKegiatan->result() as $perdata) {?>
                                                <option value="<?php echo $perdata->idKegiatan; ?>"><?php echo $perdata->namaKegiatan; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group" id="d_fvub">
                                            <label>Varietas Unggul Baru (VUB)*</label>
                                            <input type="text" class="form-control" name="fvub" id="fvub" placeholder="Varietas Unggul Baru (VUB)" />
                                            *<i>Optional</i>
                                        </div>
                                        <div class="form-group col-sm-4 " id="d_ftanam">
                                            <label>Luas Tanam</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="ftanam" id="ftanam" placeholder="Luas Tanam" />
                                                <span class="input-group-addon">Ha</span>
                                            </div>
                                            *<i>Optional</i>
                                        </div>
                                        <div class="form-group col-sm-4" id="d_fpanen">
                                            <label>Luas Panen</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="fpanen" id="fpanen" placeholder="Luas Panem" />
                                                <span class="input-group-addon">Ha</span>
                                            </div>
                                            *<i>Optional</i>
                                        </div>
                                         <div class="form-group col-sm-4" id="d_fproduktivitas">
                                            <label>Produktivitas Panen</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="fproduktivitas" id="fproduktivitas" placeholder="Produktivitas Panen" />
                                                <span class="input-group-addon">Ton/Ha</span>
                                            </div>
                                            *<i>Optional</i>
                                        </div>
                                         <div class="form-group" id="d_fgabah">
                                            <label>Serap Gabah</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="fgabah" id="fgabah" placeholder="Luas Tanam" />
                                                <span class="input-group-addon">Ton GKP</span>
                                            </div>
                                            *<i>Optional</i>
                                        </div>
                                         <div class="form-group" id="d_fpengendalian">
                                            <label>Gerakan Pengendalian OPT </label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="fpengendalian" id="fpengendalian" placeholder="Luas Pengendalian OPT" />
                                                <span class="input-group-addon">Ha</span>
                                            </div>
                                            *<i>Optional</i>
                                        </div>
                                        <div class="form-group col-sm-6" id="d_fproduksi">
                                            <label>Produksi </label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="fproduksi" id="fproduksi" placeholder="Jumlah Bibit Produk" />
                                                <span class="input-group-addon">Bibit</span>
                                            </div>
                                            *<i>Optional</i>
                                        </div>
                                        <div class="form-group col-sm-6" id="d_fdistribusi">
                                            <label>Distribusi </label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="fdistribusi" id="fdistribusi" placeholder="Jumlah Bibit Distribusi" />
                                                <span class="input-group-addon">Bibit</span>
                                            </div>
                                            *<i>Optional</i>
                                        </div>
                                        <div class="form-group col-sm-6" id="d_fvarspek">
                                            <label>Varietas/ Nama Benih Lokal*</label>
                                            <input type="text" class="form-control" name="fvarspek" id="fvarspek" placeholder="Varietas Spesifik Lokasi" />
                                            *Opsional
                                        </div>
                                        <div class="form-group col-sm-6" id="d_fvarspek_prod">
                                            <label>Produksi Benih Lokal*</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="fvarspek_prod" id="fvarspek_prod" placeholder="Produksi Benih Lokal" />
                                                <span class="input-group-addon">Kilogram</span>
                                            </div>
                                            *Opsional
                                        </div>
                                        <div class="form-group">
                                            <label>Sumber (Media Online, Situs Berita)*</label>
                                            <input type="text" class="form-control" name="fsumber" placeholder="https://"/>
                                            *Opsional
                                        </div>
                                        <div class="form-group">
                                            <label>Unggah Gambar <span style="color: red;">(wajib)</span></label>
                                            <input type="file" class="form-control" onchange="upload('gambar')" name="filefoto" id="filefoto" required/>
                                            .jpg .jpeg .png
                                        </div>
                                        <div class="form-group">
                                            <label>Unggah Berkas*</label>
                                            <input type="file" class="form-control" name="fileberkas" onchange="upload('berkas')" id="fileberkas" />
                                            *Opsional | .doc .docx .pdf | Maksimal 10MB
                                        </div>
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                        <!-- </form> -->
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid clearfix">
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">
                        Hak Cipta &copy; 2018 | Kerjasama Balai Besar Pengkajian dan Pengembangan Teknologi Pertanian 
                    </span>
                </div>
            </footer>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/admin/assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    
    <script src="<?php echo base_url(); ?>assets/admin/assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/admin/assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/admin/assets/js/custom.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/assets/js/jquery-1.7.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/assets/datepicker/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/assets/js/jquery-ui.js"></script>
	   
    <script type="text/javascript">
         $(document).ready(function(){
             $('#cmbKomoditas').select2();
            var komoditas_data = [];
            $(".input-group.date").datepicker({
                autoclose: true,
                todayHighlight: true
            });

            // $(function () {
    	    CKEDITOR.replace('ckeditor');
            $('#d_fvub').hide();
            $('#d_ftanam').hide();
            $('#d_fpanen').hide();
            $('#d_fproduktivitas').hide();
            $('#d_fgabah').hide();
            $('#d_fpengendalian').hide();
            // $('#d_fteknologi').hide();
            $('#d_fvarspek').hide();
            $('#d_fproduksi').hide();
            $('#d_fdistribusi').hide();
            $('#d_fvarspek_prod').hide();
            $('#cmbKegiatan').change(function() {
                $('#d_fvub').hide();
                    $('#d_ftanam').hide();
                    $('#d_fpanen').hide();
                    $('#d_fproduktivitas').hide();
                    $('#d_fgabah').hide();
                    $('#d_fpengendalian').hide();
                    // $('#d_fteknologi').hide();
                    $('#d_fvarspek').hide();
                    $('#d_fvarspek_prod').hide();
                    $('#d_fproduksi').hide();
                    $('#d_fdistribusi').hide();
                console.log($('#cmbKegiatan').val());
                if ($('#cmbKegiatan').val() == 1) {
                    $('#d_fvub').show();
                    $('#d_ftanam').show();
                    $('#d_fpanen').show();
                    $('#d_fproduktivitas').show();
                    $('#d_fgabah').show();
                    $('#d_fpengendalian').show();
                    // $('#d_fteknologi').show();
                    // $('#d_fvarspek').show();
                }else if($('#cmbKegiatan').val() == 3){
                    $('#d_fvub').show();
                    $('#d_fproduksi').show();
                    $('#d_fdistribusi').show();
                    // $('#d_fteknologi').show();
                    $('#d_fvarspek').show();
                    $('#d_fvarspek_prod').show();
                }else if($('#cmbKegiatan').val() == 9){
                    $('#d_fvarspek').show();
                }else{
                    $('#d_fvub').hide();
                    $('#d_ftanam').hide();
                    $('#d_fpanen').hide();
                    $('#d_fproduktivitas').hide();
                    $('#d_fgabah').hide();
                    $('#d_fpengendalian').hide();
                    // $('#d_fteknologi').hide();
                    $('#d_fvarspek').hide();
                    $('#d_fvarspek_prod').hide();
                    $('#d_fproduksi').hide();
                    $('#d_fdistribusi').hide();
                }
            })
    		$("#cmbSubsektor").change(function(){
                    var cmbSubsektor = $("#cmbSubsektor").val();
                    $.ajax({
                        type : "POST",
                        url : "<?php echo base_url(); ?>dashboard/getKom",
                        data : "cmbSubsektor=" + cmbSubsektor,
                        dataType: 'json',
                        success: function(data){
                            
                            $.each(data.datas,function(key,value){
                                komoditas_data.push(value.namaKomoditas);
                            });
                            console.log(komoditas_data);
                            $("#cmbKomoditas").html(data.dropdown);
                        }
                    });
                });
                $('#kota').change(function(argument) {
                    // body...
                    $.ajax({
                        type : "GET",
                        url : "<?php echo base_url(); ?>Json/dataKecamatann/"+$('#kota').val(),
                        // data : "cmbSubsektor=" + ,
                        success: function(data){
                            $("#kecamatan").html(data);

                    }
                    });
                })
        });
         function upload(type) {
             if (type == 'gambar') {
                var file_data = $('#filefoto').prop('files')[0]; 
                  console.log(file_data);     
                  if (file_data.type != 'image/jpeg' && file_data.type != 'image/png') {
                    alert('Upload Bukti Transfer dalam format berkas .png atau .jpg atau .jpeg');$('#filefoto').val('');return false;
                  }
                  if (file_data.size > (1024*1000*5)) {
                    alert('Upload Bukti Transfer dalam format berkas dengan Ukuran Maksimal 5 MB');$('#filefoto').val('');return false;
                  }
             }else{
                var file_data = $('#fileberkas').prop('files')[0]; 
                  console.log(file_data);     
                  if (file_data.size > (1024*1000*5)) {
                    alert('Upload Bukti Transfer dalam format berkas dengan Ukuran Maksimal 5 MB');$('#fileberkas').val('');return false;
                  }
             }
         }
    </script>

</body>

</html>
