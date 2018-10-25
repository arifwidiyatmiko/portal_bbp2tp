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
                                        <?php echo form_open_multipart('dashboard/aksiAfterEditBerita');
                                            foreach ($admin->result() as $key) { ?>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="idAdmin" value="<?php echo $key->idAdmin ?>" />
                                        </div>
                                        <?php }?>
                                        <input type="hidden" name="idBerita" value="<?php echo($idBerita) ?>">
                                        <div class="form-group">
                                                <label>Tanggal</label>
                                                <input type="text" class="form-control input-group date" name="ftanggal" data-date-format="yyyy-mm-dd" value="<?php echo $tanggal ?>" required/>
                                        </div>
                                        <div class="form-group">
                                                <label>Provinsi</label>
                                                <select class="form-control" name="provinsi" id="provinsi" required="true" disabled>
                                                    <option>Pilih Provinsi</option>
                                                    <?php 
                                                    foreach ($provinsi->result() as $x) {
                                                        ?><option value="<?= $x->idProvinsi?>" <?php if($x->idProvinsi == $idProvinsi){echo "selected";}?>><?= $x->namaProvinsi ?></option><?php 
                                                    }
                                                    ?>
                                                </select>
                                        </div>
                                         <div class="form-group">
                                            <label>Kota</label>
                                            <select class="form-control" name="kota" id="kota" disabled>
                                                <option value="" disabled selected>-- Pilih Kota Dahulu --</option>
                                                <?php 
                                                    // print_r($kota);die();
                                                    foreach ($kota as $y) {
                                                        // print_r($x['cityName']);echo "-";
                                                        ?><option value="<?php echo $y['idCity'];?>" <?php if($y['idCity'] == $idCity){echo "selected";}?>><?php echo $y['cityName']; ?></option><?php 
                                                    }
                                                    ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Judul Berita</label>
                                            <input type="text" class="form-control" name="fjudul" value="<?php echo $judulBerita ?>" placeholder="Judul Berita" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Isi Berita</label>
                                            <textarea class="form-control" name="fisi" id="ckeditor" placeholder="Isi Berita" rows="3" required><?php echo $isiBerita ?></textarea>
                                            <!-- <span id="hitung">5000</span> Karakter tersisa -->
                                        </div>
                                        <!-- <div class="form-group">
                                                <label>Subsektor</label>
                                                <select class="form-control" name="cmbSubsektor" id="cmbSubsektor" >
                                                <option>-- Pilih Subsektor --</option>
                                                <option value="<?php echo $idSubsektor ?>">Tanaman Pangan</option>
                                                <option>Peternakan</option>
                                                <option>Perkebunan</option>
                                                <option>Hortikultura</option>
                                                <option>Lain-Lain</option>
                                            </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Komoditas</label>
                                                <select class="form-control" name="cmbKomoditas" id="cmbKomoditas">
                                                <option>-- Pilih Komoditas --</option>
                                                <option value="<?php echo $idKomoditas ?>">Padi</option>
                                            </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Kegiatan</label>
                                                <div class="radio">
                                                    <label class="form-check-label" value="<?php echo $idKegiatan ?>">
                                                            <input type="radio" class="form-check-input" name="fkegiatan" value="1" checked>UPSUS
                                                        </label>
                                                </div>
                                                <div class="radio">
                                                    <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="fkegiatan" value="2">Serab Gabah
                                                        </label>
                                                </div>
                                                <div class="radio">
                                                    <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="fkegiatan" value="3">Perbenihan
                                                        </label>
                                                </div>
                                                <div class="radio">
                                                    <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="fkegiatan" value="4">SL Mandiri Benih
                                                        </label>
                                                </div>
                                                <div class="radio">
                                                    <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="fkegiatan" value="5">Unit Pengelola Benih Sumber (UPBS)
                                                        </label>
                                                </div>
                                                <div class="radio">
                                                    <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="fkegiatan" value="6">Pendampingan Kawasan
                                                        </label>
                                                </div>
                                                <div class="radio">
                                                    <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="fkegiatan" value="7">Perbatasan
                                                        </label>
                                                </div>
                                                <div class="radio">
                                                    <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="fkegiatan" value="8">Bio Industri
                                                        </label>
                                                </div>
                                                <div class="radio">
                                                    <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="fkegiatan" value="9">Sumber Daya Genetik Lokal (SDG Lokal)
                                                        </label>
                                                </div>
                                                <div class="radio">
                                                    <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="fkegiatan" value="10">Penyuluhan
                                                        </label>
                                                </div>
                                                <div class="radio">
                                                    <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="fkegiatan" value="11">Sumber Daya Air (SDA)
                                                        </label>
                                                </div>
                                                <div class="radio">
                                                    <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="fkegiatan" value="12">TTP/TSP
                                                        </label>
                                                </div>
                                                <div class="radio">
                                                    <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="fkegiatan" value="13">Sapi Indukan Wajib Bunting (SIWAB)
                                                        </label>
                                                </div>
                                                <div class="radio">
                                                    <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="fkegiatan" value="14">In House
                                                        </label>
                                                </div>
                                                <div class="radio">
                                                    <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="fkegiatan" value="15">Kerjasama non Litbang
                                                        </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Prioritas</label>
                                                <div class="radio">
                                                    <label class="form-check-label" value="<?php echo $idPrioritas ?>">
                                                            <input type="radio" class="form-check-input" name="fprioritas" value="1" checked>Presiden
                                                        </label>
                                                </div>
                                                <div class="radio">
                                                    <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="fprioritas" value="2">Menteri
                                                        </label>
                                                </div>
                                                <div class="radio">
                                                    <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="fprioritas" value="3">Gubernur
                                                        </label>
                                                </div>
                                                <div class="radio">
                                                    <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="fprioritas" value="4">Kepala Badan
                                                        </label>
                                                </div>
                                                <div class="radio">
                                                    <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="fprioritas" value="5">Eslon II
                                                        </label>
                                                </div>
                                                <div class="radio">
                                                    <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="fprioritas" value="6">Pemerintah Daerah (Pemda)
                                                        </label>
                                                </div>
                                                <div class="radio">
                                                    <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="fprioritas" value="7">Lain-Lain
                                                        </label>
                                                </div>
                                            </div> -->
                                        <div class="form-group">
                                            <label>Subsektor</label>
                                            <select class="form-control" name="cmbSubsektor" id="cmbSubsektor" required>
                                                <?php foreach($subsektor->result() as $perdata) {?>
                                                <option value="<?php echo $perdata->idSubsektor; ?>" <?php if($perdata->idSubsektor == $idSubsektor){echo 'selected';} ?>><?php echo $perdata->namaSubsektor; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Komoditas</label>
                                            <select class="form-control" name="cmbKomoditas" id="cmbKomoditas" required>
                                                <?php foreach($komoditas->result() as $perdata) {?>
                                                <option value="<?php echo $perdata->idKomoditas; ?>" <?php if($perdata->idKomoditas == $idKomoditas){echo 'selected';} ?>> <?php echo $perdata->namaKomoditas; ?></option>
                                                <?php } ?>
                                            </select>
                                            Pilih sesuai kode subsektor
                                        </div>
                                        <div class="form-group">
                                            <label>Kegiatan</label>
                                            <select class="form-control" name="cmbKegiatan" id="cmbKegiatan" required>
                                                <?php foreach($kegiatan->result() as $perdata) {?>
                                                <option value="<?php echo $perdata->idKegiatan; ?>" <?php if($perdata->idKegiatan == $idKegiatan){echo 'selected';} ?>> <?php echo $perdata->namaKegiatan; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Prioritas</label>
                                            <select class="form-control" name="cmbPrioritas" id="cmbPrioritas" required>
                                                <?php foreach($prioritas->result() as $perdata) {?>
                                                <option value="<?php echo $perdata->idPrioritas; ?>" <?php if($perdata->idPrioritas == $idPrioritas){echo 'selected';} ?>><?php echo $perdata->namaPrioritas; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Varietas Unggul Baru (VUB)*</label>
                                            <input type="text" class="form-control" name="fvub" value="<?php echo $vub ?>" placeholder="Varietas Unggul Baru (VUB)" />
                                            *Opsional
                                        </div>
                                        <div class="form-group">
                                            <label>Varietas Spesifik Lokasi*</label>
                                            <input type="text" class="form-control" name="fvarspek" value="<?php echo $varSpeklok ?>" placeholder="Varietas Spesifik Lokasi" />
                                            *Opsional
                                        </div>
                                        <div class="form-group">
                                            <label>Sumber*</label>
                                            <input type="text" class="form-control" name="fsumber" value="<?php echo $sumber ?>" placeholder="Sumber"/>
                                            *Opsional
                                        </div>
                                        <!-- <div class="form-group">
                                                <label>Unggah Gambar</label>
                                                <input type="file" name="filefoto" required />
                                            </div> -->
                                        <img src="<?php echo $gambar;?>">
                                        <div class="form-group">
                                            <label>Unggah Gambar</label>
                                            <input type="file" name="filefoto"/>
                                        </div>
                                        <!-- <div class="form-group">
                                                <label>Unggah Berkas</label>
                                                <input type="file" name="fileberkas" required />
                                            </div> -->
                                        
                                        <input type="hidden" id="old" name="oldfoto" value="<?php echo $gambar   ?>">
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
            $("#cmbSubsektor").change(function(){
                var cmbSubsektor = $("#cmbSubsektor").val();
                $.ajax({
                    type : "POST",
                    url : "<?php echo base_url(); ?>dashboard/getKom",
                    data : "cmbSubsektor=" + cmbSubsektor,
                    // contentType: 'application/json',
                    success: function(data){
                        console.log(data)
                    $("#cmbKomoditas").html(data.dropdown);
                }
                });
            });
        });
           
           $(function () {
	    CKEDITOR.replace('ckeditor');
	  });
    </script>

</body>

</html>
