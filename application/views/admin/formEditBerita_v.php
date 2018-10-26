<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin News Portal BBP2TP</title>
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
                <a class="navbar-brand" href="<?php echo base_url(); ?>dashboard"><img src="<?php echo base_url(); ?>assets/home/img/brandtext2.png"></a>
            </div>
            <?php foreach ($admin->result() as $key) {
            $divreal;
            if ($key->idProvinsi == 11)
                $divreal = "Nanggroe Aceh Darussalam";
            elseif($key->idProvinsi == 12)
                $divreal = "Sumatera Utara";
            elseif($key->idProvinsi == 13)
                $divreal = "Sumatera Barat";
            elseif($key->idProvinsi == 14)
                $divreal = "Riau";
            elseif($key->idProvinsi == 15)
                $divreal = "Jambi";
            elseif($key->idProvinsi == 16)
                $divreal = "Sumatera Selatan";
            elseif($key->idProvinsi == 17)
                $divreal = "Bengkulu";
            elseif($key->idProvinsi == 18)
                $divreal = "Lampung";
            elseif($key->idProvinsi == 19)
                $divreal = "Kep. Bangka Belitung";
            elseif($key->idProvinsi == 21)
                $divreal = "Kep. Riau";
            elseif($key->idProvinsi == 31)
                $divreal = "DKI Jakarta";
            elseif($key->idProvinsi == 32)
                $divreal = "Jawa Barat";
            elseif($key->idProvinsi == 33)
                $divreal = "Jawa Tengah";
            elseif($key->idProvinsi == 34)
                $divreal = "DI Yogyakarta";
            elseif($key->idProvinsi == 35)
                $divreal = "Jawa Timur";
            elseif($key->idProvinsi == 36)
                $divreal = "Banten";
            elseif($key->idProvinsi == 51)
                $divreal = "Bali";
            elseif($key->idProvinsi == 52)
                $divreal = "Nusa Tenggara Barat";
            elseif($key->idProvinsi == 53)
                $divreal = "Nusa Tenggara Timur";
            elseif($key->idProvinsi == 61)
                $divreal = "Kalimantan Barat";
            elseif($key->idProvinsi == 62)
                $divreal = "Kalimantan Tengah";
            elseif($key->idProvinsi == 63)
                $divreal = "Kalimantan Selatan";
            elseif($key->idProvinsi == 64)
                $divreal = "Kalimantan Timur";
            elseif($key->idProvinsi == 71)
                $divreal = "Sulawesi Utara";
            elseif($key->idProvinsi == 72)
                $divreal = "Sulawesi Tengah";
            elseif($key->idProvinsi == 73)
                $divreal = "Sulawesi Selatan";
            elseif($key->idProvinsi == 74)
                $divreal = "Sulawesi Tenggara";
            elseif($key->idProvinsi == 75)
                $divreal = "Gorontalo";
            elseif($key->idProvinsi == 76)
                $divreal = "Sulawesi Barat";
            elseif($key->idProvinsi == 81)
                $divreal = "Maluku";
            elseif($key->idProvinsi == 82)
                $divreal = "Maluku Utara";
            elseif($key->idProvinsi == 91)
                $divreal = "Papua Barat";
            elseif($key->idProvinsi == 94)
                $divreal = "Papua";
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
                        <a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard fa-2x"></i> Beranda</a>
                    </li>
                    <li>
                        <a href="#" class="active-menu"><i class="fa fa-edit fa-2x"></i> Formulir<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#" class="active-menu">Formulir Berita</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>dashboard/formAgenda">Formulir Agenda</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table fa-2x"></i> Tabel<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url(); ?>dashboard/tabelBerita">Tabel Berita</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>dashboard/tabelAgenda">Tabel Agenda</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>dashboard/grafik"><i class="fa fa-bar-chart-o fa-2x"></i> Grafik</a>
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
                                        <!-- <form action="<?php echo site_url('dashboard/aksiAfterEditBerita') ?>" method="post" enctype="multipart/form-data"> -->
                                        <?php echo form_open_multipart('dashboard/aksiAfterEditBerita/'.$berita[0]->idBerita);
                                            foreach ($admin->result() as $key) { ?>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="idAdmin" value="<?php echo $berita[0]->idAdmin ?>" />
                                        </div>
                                        <?php }?>
                                        <input type="hidden" name="idBerita" value="<?php echo( $berita[0]->idBerita) ?>">
                                        <div class="form-group">
                                                <label>Tanggal</label>
                                                <input type="text" class="form-control input-group date" name="ftanggal" data-date-format="yyyy-mm-dd" value="<?php echo  $berita[0]->tanggal ?>" required/>
                                        </div>
                                   
                                        <div class="form-group col-sm-4">
                                                <label>Provinsi</label>
                                                <select class="form-control" name="provinsi" id="provinsi" required="true" disabled>
                                                    <?php 
                                                    foreach ($provinsi->result() as $key) {
                                                        ?><option value="<?= $key->idProvinsi?>" <?php if($key->idProvinsi ==  $berita[0]->idProvinsi ){echo "selected";} ?>><?= $key->namaProvinsi ?></option><?php 
                                                    }
                                                    ?>
                                                </select>
                                        </div>
                                         <div class="form-group  col-sm-4">
                                            <label>Kota</label>
                                            <select class="form-control" name="kota" id="kota">
                                                <!-- <option value="" disabled selected>-- Pilih Provinsi Dahulu --</option> -->
                                                <option value="" disabled selected>-- Pilih Kota --</option>
                                                <?php 
                                                    // print_r($kota);die();
                                                    foreach ($kota as $y) {
                                                        // print_r($x['cityName']);echo "-";
                                                        ?><option value="<?php echo $y['idCity'];?>" <?php if($y['idCity'] ==  $berita[0]->idCity){echo "selected";}?>><?php echo $y['cityName']; ?></option><?php 
                                                    }
                                                    ?>
                                            </select>
                                        </div>
                                        <div class="form-group  col-sm-4">
                                            <label>Kecamatan</label>
                                            <select class="form-control" name="kecamatan" id="kecamatan">
                                                <option value="" disabled selected>-- Pilih Kota Terlebih Dahulu --</option>
                                                <?php 
                                                foreach ($kecamatan as $keys) {
                                                    ?>
                                                    <option value="<?=$keys->idKecamatan?>" <?php if($keys->idKecamatan == $berita[0]->idKecamatan){echo "selected";}?>><?=$keys->kecamatanName?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                         <div class="form-group col-sm-6">
                                            <label>Kelurahan atau Desa</label>
                                            <input type="text" class="form-control" name="kelurahan" value="<?=  $berita[0]->kelurahan?>" placeholder="Nama Kelurahan" required/>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Prioritas</label>
                                            <select class="form-control" name="cmbPrioritas" id="cmbPrioritas" required>
                                                <option value="" disabled selected>-- Pilih Prioritas --</option>
                                                <?php foreach($prioritas->result() as $perdata) {?>
                                                <option value="<?php echo $perdata->idPrioritas; ?>" <?php if($perdata->idPrioritas == $berita[0]->idPrioritas){echo 'selected';} ?>><?php echo $perdata->namaPrioritas; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Judul Berita</label>
                                            <input type="text" class="form-control" name="fjudul" value="<?php echo  $berita[0]->judulBerita ?>" placeholder="Judul Berita" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Isi Berita</label>
                                            <textarea class="form-control" name="fisi" id="ckeditor" placeholder="Isi Berita" rows="3" required><?php echo  $berita[0]->isiBerita ?></textarea>
                                            <!-- <span id="hitung">5000</span> Karakter tersisa -->
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Komoditas</label>
                                            <select class="form-control" name="cmbKomoditas[]" id="cmbKomoditas" multiple="multiple" required>
                                                <?php foreach($komoditas->result() as $perdata) {?>
                                                <option value="<?php echo $perdata->idKomoditas; ?>" <?php 
                                                // print_r($komoditas_berita);die()
                                                foreach ($komoditas_berita->result() as $a) {
                                                    if($perdata->idKomoditas ==  $a->idKomoditas){echo 'selected';} 
                                                }
                                                ?>> <?php echo $perdata->namaKomoditas; ?></option>
                                                <?php } ?>
                                            </select>
                                            Pilih sesuai kode subsektor
                                        </div>
                                        <div class="form-group">
                                            <label>Kegiatan</label>
                                            <select class="form-control" name="cmbKegiatan" id="cmbKegiatan" required>
                                                <?php foreach($kegiatan->result() as $perdata) {?>
                                                <option value="<?php echo $perdata->idKegiatan; ?>" <?php if($perdata->idKegiatan ==  $berita[0]->idKegiatan){echo 'selected';} ?>> <?php echo $perdata->namaKegiatan; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group" id="d_fvub">
                                            <label>Varietas Unggul Baru (VUB)*</label>
                                            <input type="text" class="form-control" name="fvub" id="fvub" value="<?= $berita[0]->fvub?>" placeholder="Varietas Unggul Baru (VUB)" />
                                            *<i>Optional</i>
                                        </div>
                                        <div class="form-group col-sm-4 " id="d_ftanam">
                                            <label>Luas Tanam</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="ftanam" id="ftanam" value="<?= $berita[0]->ftanam?>" placeholder="Luas Tanam" />
                                                <span class="input-group-addon">Ha</span>
                                            </div>
                                            *<i>Optional</i>
                                        </div>
                                        <div class="form-group col-sm-4" id="d_fpanen">
                                            <label>Luas Panen</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="fpanen" id="fpanen" value="<?= $berita[0]->fpanen?>" placeholder="Luas Panem" />
                                                <span class="input-group-addon">Ha</span>
                                            </div>
                                            *<i>Optional</i>
                                        </div>
                                         <div class="form-group col-sm-4" id="d_fproduktivitas">
                                            <label>Produktivitas Tanam</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="fproduktivitas" id="fproduktivitas" value="<?= $berita[0]->fproduktivitas?>" placeholder="Luas Tanam" />
                                                <span class="input-group-addon">Ton/Ha</span>
                                            </div>
                                            *<i>Optional</i>
                                        </div>
                                         <div class="form-group" id="d_fgabah">
                                            <label>Serap Gabah</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="fgabah" id="fgabah" value="<?= $berita[0]->fgabah?>" placeholder="Luas Tanam" />
                                                <span class="input-group-addon">Ton GKP</span>
                                            </div>
                                            *<i>Optional</i>
                                        </div>
                                         <div class="form-group" id="d_fpengendalian">
                                            <label>Gerakan Pengendalian OPT </label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="<?= $berita[0]->fpengendalian?>" name="fpengendalian" id="fpengendalian" placeholder="Luas Tanam" />
                                                <span class="input-group-addon">Ha</span>
                                            </div>
                                            *<i>Optional</i>
                                        </div>
                                        <div class="form-group" id="d_fteknologi">
                                            <label>Introduksi Teknologi Lain </label>
                                            <input type="text" class="form-control" name="fteknologi" id="fteknologi" value="<?= $berita[0]->fteknologi?>" placeholder="Luas Tanam" />
                                            *<i>Optional</i>
                                        </div>
                                        <div class="form-group col-sm-6" id="d_fproduksi">
                                            <label>Produksi </label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="fproduksi" value="<?= $berita[0]->fproduksi?>" id="fproduksi" placeholder="Jumlah Bibit Produk" />
                                                <span class="input-group-addon">Bibit</span>
                                            </div>
                                            *<i>Optional</i>
                                        </div>
                                        <div class="form-group col-sm-6" id="d_fdistribusi">
                                            <label>Distribusi </label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="fdistribusi" value="<?= $berita[0]->fdistribusi?>" id="fdistribusi" placeholder="Jumlah Bibit Distribusi" />
                                                <span class="input-group-addon">Bibit</span>
                                            </div>
                                            *<i>Optional</i>
                                        </div>
                                        <div class="form-group col-sm-6" id="d_fvarspek">
                                            <label>Varietas Benih Lokal*</label>
                                            <input type="text" class="form-control" name="fvarspek" id="fvarspek" value="<?= $berita[0]->fvarspek?>" placeholder="Varietas Spesifik Lokasi" />
                                            *Opsional
                                        </div>
                                        <div class="form-group col-sm-6" id="d_fvarspek_prod">
                                            <label>Produksi  Benih Lokal*</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="<?= $berita[0]->fvarspek_prod?>" name="fvarspek_prod" id="fvarspek_prod" placeholder="Produksi Benih Lokal" />
                                                <span class="input-group-addon">Kilogram</span>
                                            </div>
                                            *Opsional
                                        </div>
                                        <div class="form-group">
                                            <label>Sumber*</label>
                                            <input type="text" class="form-control" name="fsumber" value="<?php echo $berita[0]->sumber ?>" placeholder="Sumber"/>
                                            *Opsional
                                        </div>
                                        <!-- <div class="form-group">
                                                <label>Unggah Gambar</label>
                                                <input type="file" name="filefoto" required />
                                            </div> -->
                                        <img src="<?php echo $berita[0]->gambar;?>" style="width: 30%;">
                                        <div class="form-group">
                                            <label>Unggah Gambar</label>
                                            <input type="file" name="filefoto"/>
                                        </div>
                                        <!-- <div class="form-group">
                                                <label>Unggah Berkas</label>
                                                <input type="file" name="fileberkas" required />
                                            </div> -->
                                        
                                        <input type="hidden" id="old" name="oldfoto" value="<?php echo $berita[0]->gambar   ?>">
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                        </form>
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
                        Hak Cipta &copy; 2018 | Kerjasama Balai Besar Pengkajian dan Pengembangan Teknologi Pertanian dengan Program Diploma Institut Pertanian Bogor
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
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script> -->

    <!-- CHAINED DROPDOWN 
    <script type="text/javascript">
	  	$("#fidSubsektor").change(function(){
	    		var selectValues = $("#fidSubsektor").val();
	    		if (selectValues == 0){
	    			var msg = "Komoditas :<br><select name=\"idKomoditas\" disabled><option value=\"Pilih Komoditas\">Pilih Subsektor Dahulu</option></select>";
	    			$('#Komodits').html(msg);
	    		}else{
	    			var fidSubsektor = {fidSubsektor:$("#fidSubsektor").val()};
	    			$('#fidKomoditas').attr("disabled",true);
	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('dashboard/selectKomoditas')?>",
							data: idSubsektor,
							success: function(msg){
								$('#fidKomoditas').html(msg);
							}
				  	});
	    		}
	    });
	   </script> -->
	   
	   <script type="text/javascript">
           $(".input-group.date").datepicker({
            autoclose: true,
            todayHighlight: true
        });

       $(document).ready(function() {
        $('#cmbKomoditas').select2();
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
           
           $(function () {
	    CKEDITOR.replace('ckeditor');
        $('#d_fvub').hide();
            $('#d_ftanam').hide();
            $('#d_fpanen').hide();
            $('#d_fproduktivitas').hide();
            $('#d_fgabah').hide();
            $('#d_fpengendalian').hide();
            $('#d_fteknologi').hide();
            $('#d_fvarspek').hide();
            $('#d_fproduksi').hide();
            $('#d_fdistribusi').hide();
            $('#d_fvarspek_prod').hide();
            $('#cmbKegiatan').change(function() {
                console.log($('#cmbKegiatan').val());
                if ($('#cmbKegiatan').val() == 1) {
                    $('#d_fvub').show();
                    $('#d_ftanam').show();
                    $('#d_fpanen').show();
                    $('#d_fproduktivitas').show();
                    $('#d_fgabah').show();
                    $('#d_fpengendalian').show();
                    $('#d_fteknologi').show();
                    // $('#d_fvarspek').show();
                }else if($('#cmbKegiatan').val() == 2){
                    $('#d_fvub').show();
                    $('#d_fproduksi').show();
                    $('#d_fdistribusi').show();
                    $('#d_fteknologi').show();
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
                    $('#d_fteknologi').hide();
                    $('#d_fvarspek').hide();
                    $('#d_fvarspek_prod').hide();
                    $('#d_fproduksi').hide();
                    $('#d_fdistribusi').hide();
                }
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
