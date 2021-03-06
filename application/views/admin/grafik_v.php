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
    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/admin/assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <!-- <CHART>-->
    <script src="<?php echo base_url(); ?>assets/pustakaFC/js/fusioncharts.js"></script>
    <script src="<?php echo base_url(); ?>assets/pustakaFC/js/themes/fusioncharts.theme.fint.js"></script>
    
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
                    <li><a <?php if($this->uri->segment(2)=='formBerita'){echo 'class="active-menu"';}?> href="<?php echo base_url(); ?>dashboard/formBerita"><i class="fa fa-edit fa-2x"></i> Formulir Berita</a></li>
                    <li><a <?php if($this->uri->segment(2)=='tabelBerita'){echo 'class="active-menu"';}?> href="<?php echo base_url(); ?>dashboard/tabelBerita"> <i class="fa fa-table fa-2x"></i> Tabel Berita</a></li>
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
                        <a <?php if($this->uri->segment(2)=='grafik'){echo 'class="active-menu"';}?>  href="<?php echo base_url(); ?>dashboard/grafik"><i class="fa fa-bar-chart-o fa-2x"></i> Grafik</a>
                    </li>
                    
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- Form Elements -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span>Grafik</span>
                                <!-- <div class="row"> -->
                                    
                                    <div class="btn-group pull-right">
                                          <button type="button" class="btn btn-xs btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Pilih Grafik <span class="caret"></span>
                                          </button>
                                          <ul class="dropdown-menu">
                                            <li><a href="<?=base_url()?>dashboard/grafik">Intensitas Berita</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="<?=base_url()?>dashboard/grafik/teknologi">Penggunaan Teknologi</a></li>
                                          </ul>
                                        </div>
                                <!-- </div> -->
                                

                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form>
                                            <div class="form-group">
                                                <label>Kurun Waktu : </label>
                                                <select class="form-control" name="waktu" id="kurunWaktu">
                                                    <option value="1">Seluruh Waktu</option>
                                                    <option value="2">1 Bulan Terakhir</option>
                                                    <option value="3">6 Bulan Terakhir</option>
                                                    <option value="4">1 Tahun Terakhir</option>
                                                </select>
                                            </div>
                                        </form>
                                        <div class="table-responsive">
                                            <center>
                                                <div id="chart-container" style="min-height: 400px;"></div>
                                            
                                                
                                            </center>
                                            <br>

                                            <div class="form-row">
                                                <!-- <div class="form-group col-md-6">
                                                    <center><a href="#" type="button" class="btn btn-default"><i class="fa fa-print"></i> Laporan Berita (PDF)</a></center>
                                                </div> -->
                                                <div class="form-group col-md-12">
                                                    <center><a href="<?php echo site_url('dashboard/export') ?>" type="button" class="btn btn-default"><i class="fa fa-download"></i> Laporan Berita (Excel)</a></center>
                                                </div>
                                            </div>
                                        </div>

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
    <script>
        var dataSource = {
          "chart": {
            "caption": "Grafik jumlah Berita setiap Provinsi",
            "subcaption": "Sumber : Database BPTPNEWS.ID",
            "xaxisname": "Provinsi",
            "yaxisname": "Jumlah Berita",
            "numbersuffix": "",
            "theme": "fusion"
          },
          "data": <?=json_encode($grafik)?>
          
        };

        FusionCharts.ready(function() {
           var myChart = new FusionCharts({
              type: "column2d",
              renderAt: "chart-container",
              width: "100%",
              height: "100%",
              dataFormat: "json",
              dataSource
           }).render();
        });
        $('#kurunWaktu').on('change',function() {
            if ($('#kurunWaktu').val() ==1) {dataSource.chart.caption = "Grafik jumlah Berita setiap Provinsi";}
            else if ($('#kurunWaktu').val() ==2) {dataSource.chart.caption = "Grafik jumlah Berita setiap Provinsi 1 Bulan Terakhir";}
            else if ($('#kurunWaktu').val() ==3) {dataSource.chart.caption = "Grafik jumlah Berita setiap Provinsi 6 Bulan Terakhir";}
            else{dataSource.chart.caption = "Grafik jumlah Berita setiap Provinsi 1 Tahun Terakhir";}
            $.ajax({
                        type : "GET",
                        url : "<?php echo base_url(); ?>Json/grafik/"+$('#kurunWaktu').val(),
                        // data : "cmbSubsektor=" + ,
                        success: function(data){
                            dataSource.data = data;
                            FusionCharts.ready(function() {
                               var myChart = new FusionCharts({
                                  type: "column2d",
                                  renderAt: "chart-container",
                                  width: "100%",
                                  height: "100%",
                                  dataFormat: "json",
                                  dataSource
                               }).render();
                            });
                        }
                    });
        })
          </script>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    
    <script src="<?php echo base_url(); ?>assets/admin/assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/admin/assets/js/jquery.metisMenu.js"></script>
    <!-- MORRIS CHART SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/admin/assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/assets/js/morris/morris.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo base_url(); ?>assets/admin/assets/js/custom.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            console.log('dsdas');
        });
    </script>

</body>

</html>
