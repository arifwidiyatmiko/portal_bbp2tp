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
     <link href="<?php echo base_url(); ?>assets/admin/assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                        <a <?php if($this->uri->segment(2) == '' || $this->uri->segment(2)=='index'){echo 'class="active-menu"';}?> href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard fa-2x"></i> Beranda</a>
                    </li>
                    <li><a <?php if($this->uri->segment(3)=='formBerita'){echo 'class="active-menu"';}?> href="<?php echo base_url(); ?>dashboard/formBerita"><i class="fa fa-edit fa-2x"></i> Formulir Berita</a></li>
                    <li><a <?php if($this->uri->segment(3)=='tabelBerita'){echo 'class="active-menu"';}?> href="<?php echo base_url(); ?>dashboard/tabelBerita"> <i class="fa fa-table fa-2x"></i> Tabel Berita</a></li>
                    <li>
                        <a href="#"><i class="fa fa-table fa-2x"></i> Data Master<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url();?>dashboard/pengguna">Pengguna</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>dashboard/komoditas">Komoditas</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>dashboard/kegiatan">Kegiatan</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>dashboard/kecamatan">Kecamatan</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>dashboard/listKota">Kota</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a <?php if($this->uri->segment(3)=='grafik'){echo 'class="active-menu"';}?>  href="<?php echo base_url(); ?>dashboard/grafik"><i class="fa fa-bar-chart-o fa-2x"></i> Grafik</a>
                    </li>
                    
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
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
                            <h4 class="col-md-10">Tabel Komoditas</h4>
                            <div class="panel-heading">
                                <div class="form form-inline ">
                                   <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambahKomoditas">Tambah Komoditas</a>
                                </div><!-- <?php echo base_url(); ?>dashboard/formBerita -->
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                               <th>NO</th>
                                                <th>Komoditas</th>
                                                <th>Sub Sektor</th>
                                                <!-- <th>Aktor</th> -->
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php
                                            $no=1;
                                            foreach ($komoditas as $b) :
                                            
                                            ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $b->namaKomoditas;?></td>
                                                <td><?php echo $b->namaSubsektor;?></td>
                                                <td>
                                                    <a data-href="<?=base_url()?>Dashboard/delete_komo/<?=$b->idKomoditas?>" data-nama="<?=$b->namaKomoditas?>" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusKomoditas">Hapus</a>
                                                    <a data-nama="<?=$b->namaKomoditas?>" data-id="<?=base_url()?>Dashboard/edit_komo/<?=$b->idKomoditas?>" data-subsektor="<?=$b->idSubsektor?>" class="btn btn-sm btn-info" data-toggle="modal" data-target="#editKomoditas">Edit</a>
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
     <!-- MORRIS CHART SCRIPTS -->
     <!-- <script src="<?php echo base_url(); ?>assets/admin/assets/js/morris/raphael-2.1.0.min.js"></script> -->
    <!-- <script src="<?php echo base_url(); ?>assets/admin/assets/js/morris/morris.js"></script> -->
      <!-- CUSTOM SCRIPTS -->
    <!-- <script src="<?php echo base_url(); ?>assets/admin/assets/js/custom.js"></script> -->
    <script src="<?php echo base_url(); ?>assets/admin/assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script type="text/javascript">
        // dataTables-example
         $(document).ready(function() {
            console.log('ready!');
            $('#dataTables-example').dataTable();
            $('#editKomoditas').on('show.bs.modal', function(e) {
                console.log($(e.relatedTarget).data('subsektor'));
                // $("#t_subsektor option[value="+$(e.relatedTarget).data('idSubsektor')+"]").attr('selected','selected');
                $('#t_subsektor').val($(e.relatedTarget).data('subsektor')).change();
                $('#namaKomoditas_lm').text($(e.relatedTarget).data('nama'));
                $('#t_komoditas').val($(e.relatedTarget).data('nama'));
                $('#form-edit').attr('action', $(e.relatedTarget).data('id'));
            });
            $('#hapusKomoditas').on('show.bs.modal', function(e) {
                // alert('sda');
                // $('#form-edit').attr('action', $(e.relatedTarget).data('href'));
                $(this).find('.btn-ok').attr('action', $(e.relatedTarget).data('href'));
                $('#namaKomoditas_lm0').text($(e.relatedTarget).data('nama'));
                // $('#form-edit').attr('action', $(e.relatedTarget).data('id'));
            });
        });
    </script>
    <!-- Modal -->
    <div id="hapusKomoditas" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Hapus Pengguna : <b><span id="namaKomoditas_lm0"></span></b></h4>
      </div>
       <div class="modal-footer">
                                <a class="btn btn-danger btn-ok">Hapus</a>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Gagal</button>
                            </div>
    </div>

  </div>
</div>
<div id="tambahKomoditas" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Komoditas</h4>
      </div>
      <div class="modal-body">
        <!-- <div class="container"> -->
            <form action="<?= base_url();?>Dashboard/add_komo" method="POST">
                <div class="form-group">
                    <label>Pilih Sub Sektor</label>
                    <select name="subsektor" class="form-control" required>
                        <option selected required> -- Pilih -- </option>
                        <?php 
                        // print_r($subsektor);die();
                            foreach ($subsektor as $keys=>$key) {
                                ?><option value="<?=$key['idSubsektor']?>"><?= $key['namaSubsektor']?></option><?php
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nama Komoditas</label>
                    <input type="text" name="komoditas" class="form-control" placeholder="Nama Komoditas">
                </div>
                <input type="submit" class="btn btn-primary">
            </form>
        <!-- </div> -->
      </div>
    </div>

  </div>
</div>

<div id="editKomoditas" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Komoditas <span id="namaKomoditas_lm"></span></h4>
      </div>
      <div class="modal-body">
        <!-- <div class="container"> -->
            <form  method="POST"  id="form-edit">
                <div class="form-group">
                    <label>Pilih Sub Sektor</label>
                    <select name="subsektor" class="form-control" id="t_subsektor" required>
                        <?php 
                        // print_r($subsektor);die();
                            foreach ($subsektor as $keys=>$key) {
                                ?><option value="<?=$key['idSubsektor']?>"><?= $key['namaSubsektor']?></option><?php
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nama Komoditas</label>
                    <input type="text" name="komoditas" class="form-control" id="t_komoditas" placeholder="Nama Komoditas">
                </div>
                <input type="submit" class="btn btn-primary">
            </form>
        <!-- </div> -->
      </div>
    </div>

  </div>
</div>
</body>
</html>
