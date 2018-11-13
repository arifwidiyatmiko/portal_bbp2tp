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
                <a class="navbar-brand" href="<?php echo base_url(); ?>dashboard"><h3>BPTP News: Input Data</h3></a>
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
                                    <button type="button" name="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary"><a href="<?php echo site_url('dashboard/export') ?>" style="color: #fff;"><div class="glyphicon glyphicon-download"></div> Laporan Berita (Excel)</a></button>
                                </div><!-- <?php echo base_url(); ?>dashboard/formBerita -->
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
                                                <th>Komoditas</th>
                                                <th>Kegiatan</th>
                                                <th>Prioritas</th>
                                                <th>Sumber</th>
                                                <!-- <th>Aktor</th> -->
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php
                                            $no=1;$namaKomoditas ='';
                                            foreach ($berita->result_array() as $b) :
                                            $d = $this->Crud_m->getKomo_berita($b['idBerita']);
                                            // print_r($d);die();
                                            $namaKomoditas = implode(', ', $d);
                                            $idBerita=$b['idBerita'];
                                            $tanggal=$b['tanggal'];
                                            $idProvinsi = $b['idProvinsi'];
                                            $idCity = $b['idCity'];
                                            // $idSubsektor=$b['idSubsektor'];
                                            // $namaSubsektor=$b['namaSubsektor'];
                                            $vub=$b['fvub'];
                                            $varSpeklok=$b['fvarspek'];
                                            // $idKomoditas=$b['idKomoditas'];
                                            // $namaKomoditas=$b['namaKomoditas'];
                                            $idKegiatan=$b['idKegiatan'];
                                            $namaKegiatan=$b['namaKegiatan'];
                                            $idPrioritas=$b['idPrioritas'];
                                            $namaPrioritas=$b['namaPrioritas'];
                                            $judulBerita=$b['judulBerita'];
                                            $isiBerita=$b['isiBerita'];
                                            $sumber=$b['sumber'];
                                            $berkas=$b['berkas'];
                                            $gambar=$b['gambar'];
                                            $idAdmin=$b['idAdmin'];
                                            $nama=$b['nama'];
                                            $status=$b['status'];
                                            ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $tanggal;?></td>
                                                <td><?php echo $judulBerita;?></td>
                                                <td><?php echo $isiBerita;?></td>
                                                
                                                <td><?php echo $namaKomoditas;?></td>
                                                <td><?php echo $namaKegiatan;?></td>
                                                <td><?php echo $namaPrioritas;?></td>
                                                <td><?php echo $sumber;?></td>
                                                <!-- <td><?php echo $nama;?></td> -->
                                                <td>
                                                    <?php //if($idAdmin == '1'){ ?>
                                                    <a href="<?php echo site_url('dashboard/aksiUpdateBerita/'.$idBerita) ?>" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                                    <?php //}
                                                    if($status == '0'){ ?>
                                                    <a href="<?php echo site_url('dashboard/aksiAccBerita/'.$idBerita) ?>" type="button" class="btn btn-success" onclick="return confirm('Yakin ingin menampilkan berita ini?')"><i class="glyphicon glyphicon-ok"></i></a>
                                                    <?php } 
                                                    if($idAdmin == '1' || $status >= '0'){?>
                                                    <a href="<?php echo site_url('dashboard/aksiDelBerita/'.$idBerita) ?>" class="btn btn-danger" onClick="return confirm('Yakin ingin menghapus berita ini?')"><i class="glyphicon glyphicon-trash"></i></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php 
                                            $no++;
                                            endforeach;?>
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
