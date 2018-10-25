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
                <a class="navbar-brand" href="<?php echo base_url(); ?>bptp"><img src="<?php echo base_url(); ?>assets/home/img/brandtext2.png"></a>
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
                <a href="<?php echo site_url('bptp/logout'); ?>" class="btn btn-danger square-btn-adjust">Logout</a>
            </div>
        </nav>
        <?php } ?>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="<?php echo base_url(); ?>bptp"><i class="glyphicon glyphicon-home fa-2x"></i> Beranda</a>
                    </li>
                    <li>
                        <a href="#" class="active-menu"><i class="fa fa-edit fa-2x"></i> Formulir Berita</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>bptp/tabelBerita"><i class="fa fa-table fa-2x"></i> Tabel Berita</a>
                    </li>
                    <!-- <li>
                        <a   href="<?php echo base_url(); ?>bptp/grafik"><i class="fa fa-bar-chart-o fa-2x"></i> Grafik</a>
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
                            <li><a href="<?php echo base_url(); ?>bptp">Beranda</a></li>
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
                                        <!-- <form action="<?php echo site_url('bptp/aksiAfterEditBerita') ?>" method="post" enctype="multipart/form-data"> -->
                                        <?php echo form_open_multipart('bptp/aksiAfterEditBerita');
                                            foreach ($admin->result() as $key) { ?>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="idAdmin" value="<?php echo $key->idAdmin ?>" />
                                        </div>
                                        <?php }?>
                                        <input type="hidden" name="idBerita" value="<?php echo($idBerita) ?>">
                                        <div class="form-group">
                                            <label>Kota</label>
                                            <select class="form-control" name="kota" id="kota">
                                                <option value="" disabled>-- Pilih Kota --</option>
                                                <?php 
                                                // print_r($idCity);die();
                                                foreach ($city as $val=>$key) {
                                                        ?><option value="<?= $key['idCity']?>" <?php if($key['idCity'] == $idCity){echo "selected";} ?>><?= $key['cityName'] ?></option><?php 
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                                <label>Tanggal</label>
                                                <input type="text" class="form-control input-group date" name="ftanggal" data-date-format="yyyy-mm-dd" value="<?php echo $tanggal ?>" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Judul Berita</label>
                                            <input type="text" class="form-control" name="fjudul" value="<?php echo $judulBerita ?>" placeholder="Judul Berita" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Isi Berita</label>
                                            <textarea class="form-control" name="ckeditor" placeholder="Isi Berita" required><?php echo $isiBerita ?></textarea>
                                            <!-- <span id="hitung">5000</span> Karakter tersisa -->
                                        </div>
                                        <div class="form-group">
                                            <label>Subsektor</label>
                                            <select class="form-control" name="cmbSubsektor" id="cmbSubsektor" required>
                                                <!-- <option><?php echo $idSubsektor  ?></option> -->
                                                <?php foreach($subsektor->result() as $perdata) {?>
                                                <option value="<?php echo $perdata->idSubsektor; ?>" <?php if($perdata->idSubsektor == $idSubsektor){ echo "selected";} ?> > <?php echo $perdata->namaSubsektor; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Komoditas</label>
                                            <select class="form-control" name="cmbKomoditas" id="cmbKomoditas" required>
                                                <!-- <option><?php echo $idKomoditas  ?></option> -->
                                                <?php foreach($komoditas->result() as $perdata) {?>
                                                <option value="<?php echo $perdata->idKomoditas; ?>" <?php if($perdata->idKomoditas == $idKomoditas){ echo "selected";} ?>> <?php echo $perdata->namaKomoditas; ?></option>
                                                <?php } ?>
                                            </select>
                                            Pilih sesuai kode subsektor
                                        </div>
                                        <div class="form-group">
                                            <label>Kegiatan</label>
                                            <select class="form-control" name="cmbKegiatan" id="cmbKegiatan" required>
                                                <!-- <option><?php echo $idKegiatan  ?></option> -->
                                                <?php foreach($kegiatan->result() as $perdata) {?>
                                                <option value="<?php echo $perdata->idKegiatan; ?>" <?php if($perdata->idKegiatan == $idKegiatan){ echo "selected";} ?>><?php echo $perdata->namaKegiatan; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Prioritas</label>
                                            <select class="form-control" name="cmbPrioritas" id="cmbPrioritas" required>
                                                <!-- <option><?php echo $idPrioritas  ?></option> -->
                                                <?php foreach($prioritas->result() as $perdata) {?>
                                                <option value="<?php echo $perdata->idPrioritas; ?>" <?php if($perdata->idPrioritas == $idPrioritas){ echo "selected";} ?> > <?php echo $perdata->namaPrioritas; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Varietas Unggul Baru (VUB)*</label>
                                            <input type="text" class="form-control" name="fvub" value="<?php echo $vub ?>" placeholder="Varietas Unggul Baru (VUB)" />
                                            *<i>Optional</i>
                                        </div>
                                        <div class="form-group">
                                            <label>Varietas Spesifik Lokasi*</label>
                                            <input type="text" class="form-control" name="fvarspek" value="<?php echo $varSpeklok ?>" placeholder="Varietas Spesifik Lokasi" />
                                            *<i>Optional</i>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Sumber*</label>
                                            <input type="text" class="form-control" name="fsumber" value="<?php echo $sumber ?>" placeholder="Sumber"/>
                                            *<i>Optional</i>
                                        </div>
                                        <div class="form-group">
                                            <img src="<?php echo $gambar ?>" style="max-width: 100%;">
                                        </div>
                                        <div class="form-group">
                                            <label>Unggah Gambar</label>
                                            <input type="file" name="filefoto"/>
                                        </div>
                                        <input type="hidden" id="old" name="oldfoto" value="<?php echo $gambar   ?>">
                                        <!-- <input type="hidden" id="old" name="oldberkas" value="<?php echo $berkas   ?>"> -->
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
