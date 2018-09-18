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
                <a class="navbar-brand" href="<?php echo base_url(); ?>ksphp"><img src="<?php echo base_url(); ?>assets/home/img/brandtext2.png"></a>
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
                <?php echo $key->nama ?> /
                <?php echo $divreal; ?> &nbsp;
                <a href="<?php echo site_url('ksphp/logout'); ?>" class="btn btn-danger square-btn-adjust">Logout</a>
            </div>
        </nav>
        <?php } ?>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="<?php echo base_url(); ?>ksphp"><i class="glyphicon glyphicon-home fa-2x"></i> Beranda</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>ksphp/formBerita" class="active-menu"><i class="fa fa-edit fa-2x"></i> Formulir Berita</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>ksphp/tabelBerita"><i class="fa fa-table fa-2x"></i> Tabel Berita</a>
                    </li>
                    <!-- <li>
                        <a   href="<?php echo base_url(); ?>ksphp/grafik"><i class="fa fa-bar-chart-o fa-2x"></i> Grafik</a>
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
                            <li><a href="<?php echo base_url(); ?>ksphp">Beranda</a></li>
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
                                        <?php echo form_open_multipart('ksphp/simpanBerita'); ?>
                                        <?php   foreach ($admin->result() as $key) { ?>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="idAdmin" value="<?php echo $key->idAdmin ?>" />
                                        </div>
                                        <?php }?>
                                        <div class="form-group">
                                                <label>Tanggal</label>
                                                <input type="text" class="form-control input-group date" name="ftanggal" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Judul Berita</label>
                                            <input type="text" class="form-control" name="fjudul" placeholder="Judul Berita" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Isi Berita</label>
                                            <textarea class="form-control" name="fisi" id="ckeditor" placeholder="Isi Berita" required></textarea>
                                            <!-- <span id="hitung">5000</span> Karakter tersisa -->
                                        </div>
                                        <div class="form-group">
                                            <label>Subsektor</label>
                                            <select class="form-control" name="cmbSubsektor" id="cmbSubsektor" required>
                                                <option value="" disabled selected>-- Pilih Subsektor --</option>
                                                <?php foreach ($cmbsubs as $subs){
                                                    echo "<option value='$subs[idSubsektor]'>$subs[namaSubsektor]</option>";
                                                }?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Komoditas</label>
                                            <select class="form-control" name="cmbKomoditas" id="cmbKomoditas">
                                                <option value="" disabled selected>-- Pilih Subsektor Dahulu --</option>
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
                                        <div class="form-group">
                                            <label>Prioritas</label>
                                            <select class="form-control" name="cmbPrioritas" id="cmbPrioritas" required>
                                                <option value="" disabled selected>-- Pilih Prioritas --</option>
                                                <?php foreach($cmbPrioritas->result() as $perdata) {?>
                                                <option value="<?php echo $perdata->idPrioritas; ?>"><?php echo $perdata->namaPrioritas; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Varietas Unggul Baru (VUB)</label>
                                            <input type="text" class="form-control" name="fvub" placeholder="Varietas Unggul Baru (VUB)" />
                                        </div>
                                        <div class="form-group">
                                            <label>Varietas Spesifik Lokasi</label>
                                            <input type="text" class="form-control" name="fvarspek" placeholder="Varietas Spesifik Lokasi" />
                                        </div>
                                        <div class="form-group">
                                            <label>Sumber</label>
                                            <input type="text" class="form-control" name="fsumber" placeholder="Sumber" />
                                        </div>
                                        <div class="form-group">
                                            <label>Unggah Gambar</label>
                                            <input type="file" name="filefoto" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Unggah Berkas</label>
                                            <input type="file" name="fileberkas" /> Maksimal 10MB
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
                        Hak Cipta &copy; 2018 | Kerjasama Balai Besar Pengkajian dan Pengembangan Teknologi Pertanian dengan ksphp Diploma Institut Pertanian Bogor
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
	   
    <script type="text/javascript">
        $(".input-group.date").datepicker({
            autoclose: true,
            todayHighlight: true
        });
        
        /*$(document).ready(function() {
            $('#fisi').keyup(function(){
                var len = this.value.length;
                if (len >= 5000){
                    this.value = this.value.substring(0,5000);
                }
                $('#hitung').text(5000 - len);
            });
        });*/

        $(function () {
        CKEDITOR.replace('ckeditor');
      });
        
        $(document).ready(function(){
            $("#cmbSubsektor").change(function(){
                var cmbSubsektor = $("#cmbSubsektor").val();
                $.ajax({
                    type : "POST",
                    url : "<?php echo base_url(); ?>dashboard/getKom",
                    data : "cmbSubsektor=" + cmbSubsektor,
                    success: function(data){
                    $("#cmbKomoditas").html(data);
                }
                });
            });
        });
    </script>

</body>

</html>
