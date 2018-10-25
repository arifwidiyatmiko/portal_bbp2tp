<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin News Portal BBP2TP</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/home/img/logo-mini.png">
    <!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url(); ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url(); ?>assets/admin/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="<?php echo base_url(); ?>assets/admin/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url(); ?>assets/admin/assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- TABLE STYLES-->
    <link href="<?php echo base_url(); ?>assets/admin/assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                        <a href="<?php echo base_url(); ?>bptp/formBerita"><i class="fa fa-edit fa-2x"></i> Formulir Berita</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>bptp/tabelBerita" class="active-menu"><i class="fa fa-table fa-2x"></i> Tabel Berita</a>
                    </li>
                    <!-- <li>
                        <a   href="<?php echo base_url(); ?>bptp/grafik"><i class="fa fa-bar-chart-o fa-2x"></i> Grafik</a>
                    </li> -->
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
                            <li><a href="<?php echo base_url(); ?>bptp">Beranda</a></li>
                            <li class="active">Tabel</li>
                            <li class="active">Tabel Berita</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <h4 class="col-md-10">Tabel Berita</h4>
                            <div class="panel-heading">
                                <div class="form form-inline ">
                                    <button type="button" name="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary"><a href="<?php echo base_url(); ?>bptp/formBerita" style="color: #fff;"><div class="glyphicon glyphicon-plus"></div> Tambah Berita</a></button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                               <th>NO</th>
                                                <th>Tanggal</th>
                                                <th>Judul Berita</th>
                                                <th>Isi Berita</th>
                                                <th>Subsektor</th>
                                                <th>Komoditas</th>
                                                <th>Kegiatan</th>
                                                <th>Prioritas</th>
                                                <th>Sumber</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php
                                            $no=1;
                                            // print_r($subsektor->result());die();
                                            foreach ($berita->result() as $b) {
                                            /*    foreach ($subsektor->result() as $s) {
                                                    foreach ($komoditas->result() as $ko) {
                                                        foreach ($kegiatan->result() as $ke) {
                                                            foreach ($prioritas->result() as $p) {
                                            $idBerita=$b->idBerita;
                                            $tanggal=$b->tanggal;
                                            $idSubsektor=$b->idSubsektor;
                                            $namaSubsektor=$b->namaSubsektor;
                                            $vub=$b->vub;
                                            $varSpeklok=$b->varSpeklok;
                                            $idKomoditas=$b->idKomoditas;
                                            $namaKomoditas=$b->namaKomoditas;
                                            $idKegiatan=$b->idKegiatan;
                                            $namaKegiatan=$b->namaKegiatan;
                                            $idPrioritas=$b->idPrioritas;
                                            $namaPrioritas=$b->namaPrioritas;
                                            $judulBerita=$b->judulBerita;
                                            $isiBerita=$b->isiBerita;
                                            $sumber=$b->sumber;
                                            $berkas=$b->berkas;
                                            $gambar=$b->gambar;
                                            $idAdmin=$b->idAdmin;
                                            $status=$b->status;*/

                                            foreach ($subsektor->result() as $s) {
                                                    if($s->idSubsektor == $b->idSubsektor){$subsektord = $s->namaSubsektor;}
                                                }
                                                foreach ($komoditas->result() as $s) {
                                                    if($s->idKomoditas == $b->idKomoditas){$komoditasd = $s->namaKomoditas;}
                                                }
                                                foreach ($kegiatan->result() as $s) {
                                                    if($s->idKegiatan == $b->idKegiatan){$kegiatand = $s->namaKegiatan;}
                                                }
                                                foreach ($prioritas->result() as $s) {
                                                    if($s->idPrioritas == $b->idPrioritas){$prioritasd = $s->namaPrioritas;}
                                                }
                                            ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $b->tanggal;?></td>
                                                <td><?php echo $b->judulBerita;?></td>
                                                <td><?php echo substr($b->isiBerita, 0,250);?></td>
                                                <td><?php echo $subsektord;?></td>
                                                <td><?php echo $komoditasd;?></td>
                                                <td><?php echo $kegiatand;?></td>
                                                <td><?php echo $prioritasd;?></td>
                                                <td><?php echo $b->sumber;?></td>
                                                <td>
                                                    <a href="<?php echo site_url('bptp/aksiUpdateBerita/'.$b->idBerita) ?>" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                                    <a href="<?php echo site_url('bptp/aksiDelBerita/'.$b->idBerita) ?>" class="btn btn-danger" onClick="return confirm('Yakin ingin menghapus berita ini?')"><i class="glyphicon glyphicon-trash"></i></a>
                                                </td>
                                            </tr>
                                            <?php }
                                            $no++;?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!--End Advanced Tables -->
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
    <!-- DATA TABLE SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/admin/assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').dataTable({
                "lengthMenu": [[5, 15, 25, -1], [5, 15, 25, "All"]],
                "scrollX": true,
                "columnDefs": [{
                    "targets": [0],
                    "visible": false
                }]
            });
        });

    </script>
    <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/admin/assets/js/custom.js"></script>

</body>

</html>
