<?php 
  $b=$detail->row_array();
?>


    <!-- Page Content -->
    <div class="container" id="big-card">
         <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
             
              <?php 
              $limit = 6;$i=1;if(!$this->config->item('isDaerah')){$limit = $limit-1;}
              foreach ($kategori4->result() as $k) { if($i <= $limit){ ?>
                            <li class="<?php if($k->idKegiatan == $this->uri->segment(3) && $this->uri->segment(2) == 'kategoriK'){echo 'active';} ?>"><a href="<?php echo base_url().'Portal/kategoriK/'.$k->idKegiatan;?>"><?php echo $k->namaKegiatan; ?></a></li>
                            <?php }$i++; }

              ?>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Lain-lain <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <?php 
                  $i=1;
              foreach ($kategori4->result() as $k) { if($i > $limit){ ?>
                            <li><a href="<?php echo base_url().'Portal/kategoriK/'.$k->idKegiatan;?>"><?php echo $k->namaKegiatan; ?></a></li>
                            <?php }$i++; }
                  ?>
                </ul>
              </li>
            </ul>
            <?php 
            if(!$this->config->item('isDaerah')){
              ?>
              <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Export <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li class="dropdown-header">Data Excel Intensitas Berita</li>
                                          <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('Portal/export/data/2') ?>">1 Bulan Terakhir</a></li>
                                          <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('Portal/export/data/3') ?>">6 Bulan Terakhir</a></li>
                                          <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('Portal/export/data/4') ?>">12 Bulan Terakhir</a></li>
                                          <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('Portal/export/data/0') ?>">Seluruh Data Berita</a></li>
                  <!-- <li role="separator" class="divider"></li>
                  <li><a href="#">Grafik</a></li> -->
                </ul>
              </li>
            </ul>
              <?php
            }
            ?>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

        <div class="row" id="content-list">


            <div class="col-md-8 nopadding" id="left-side">

                <ol class="breadcrumb">
                    <li><a href="<?php echo site_url('Portal/index'); ?>">Beranda</a></li>
                    <li class="active"><?php echo $b['judulBerita'];?></li>
                    <!-- <li class="active"><?php echo $b['namaKomoditas'];?></li> -->
                </ol>
                <hr><?php echo $b['tanggal']; ?>
                <h2><?php echo $b['judulBerita']; ?></h2>
                <h6><?php echo $b['nama']; ?></h6>
                <div class="col-xs-12  no-gutter nopadding">
                    
                  <!--   <img class="img-responsive" src="<?php echo base_url().'assets/upload/berita/'.$b['gambar'];?>" style="width: 650px; height: 350px;" alt="..."> -->
                  <img class="img-responsive" src="<?php echo $b['gambar'];?>" style="width: 650px; height: 350px;" alt="...">

                    <p><?php echo $b['isiBerita']; ?></p>
                    <?php if($b['berkas'] != NULL) {?>
                    <b>Unduh Berkas </b> <a href="<?php echo base_url().'assets/upload/berita/berkas/'.$b['berkas'];?>">Disini</a>
                    <?php } ?>
                </div>
                <h6>Sub Sektor : <?= implode(', ', $komoditas);?> </h6>
                <h6>Komoditas : <?= implode(', ', $subsektor);?> </h6>
                
                <h6><a href="<?php echo $b['sumber']; ?>"><?php echo $b['sumber']; ?></a></h6>

                
            </div>
            <div class="col-md-4" id="right-side">
                
                <hr>

                <h5 class="heading-list2">Serambi BBP2TP</h5><div class="hr-heading-list2"></div>
                <ul class="media-list comment-list">
                <?php foreach ($serambi->result() as $s) { ?>
                  <li class="media">
                    <div class="media-body">
                      <a href="<?php echo base_url().'Portal/detailBerita/'.$s->idBerita;?>" class="media-heading"><?php echo $s->judulBerita; ?></a>
                    </div>
                  </li>
                  <hr>
                <?php } ?>
                </ul>
                <!-- <h5 class="heading-list">Statistik Pengunjung</h5><div class="hr-heading-list"></div>
                <ul class="media-list comment-list">
                  <li class="media">
                    <div class="media-body">
                      Statistik
                    </div>
                  </li>
                </ul>
                <hr> -->
                
            </div>
             <div class="col-md-12" id="right-side">
                <h5 class="heading-list2">Link BPTP Lain</h5><div class="hr-heading-list2"></div>
                  <div class="row no-gutter">
                      <table class="table table-stripped">
                          <thead>
                              <tr>
                                  <td colspan="2" style="text-align: center;"><h4><b class="text-center">INDONESIA</b></h4></td>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>SUMATERA</td>
                                  <td>
                                    <?php 
                                    foreach ($provinsi as $key) {
                                      if($key->pulau == 1){
                                        echo "<a href='".$key->url."'>".$key->namaProvinsi."</a> - ";
                                      }
                                    }
                                    ?>
                                  </td>
                              </tr>
                              <tr>
                                  <td>JAWA</td>
                                  <td>
                                    <?php 
                                    foreach ($provinsi as $key) {
                                      if($key->pulau == 2){
                                        echo "<a href='".$key->url."'>".$key->namaProvinsi."</a> - ";
                                      }
                                    }
                                    ?>
                                  </td>
                              </tr>
                              <tr>
                                  <td>KALIMANTAN</td>
                                  <td>
                                    <?php 
                                    foreach ($provinsi as $key) {
                                      if($key->pulau == 3){
                                        echo "<a href='".$key->url."'>".$key->namaProvinsi."</a> - ";
                                      }
                                    }
                                    ?>
                                  </td>
                              </tr>
                              <tr>
                                  <td>NUSA TENGGARA</td>
                                  <td>
                                    <?php 
                                    foreach ($provinsi as $key) {
                                      if($key->pulau == 4){
                                        echo "<a href='".$key->url."'>".$key->namaProvinsi."</a> - ";
                                      }
                                    }
                                    ?>
                                  </td>
                              </tr>
                              <tr>
                                  <td>SULAWESI</td>
                                  <td>
                                    <?php 
                                    foreach ($provinsi as $key) {
                                      if($key->pulau == 5){
                                        echo "<a href='".$key->url."'>".$key->namaProvinsi."</a> - ";
                                      }
                                    }
                                    ?>
                                  </td>
                              </tr>
                              <tr>
                                  <td>PAPUA</td>
                                  <td>
                                    <?php 
                                    foreach ($provinsi as $key) {
                                      if($key->pulau == 6){
                                        echo "<a href='".$key->url."'>".$key->namaProvinsi."</a> - ";
                                      }
                                    }
                                    ?>
                                  </td>
                              </tr>
                          </tbody>
                      </table>
                  </div>      

            </div>
        </div>
        
    </div>
 
        
    
    <!-- /.container -->

    <footer>
        <div id="copyright">
            <div class="container">
                <div class="row nopadding text-center">
                    <p>
                      Hak Cipta &copy; 2018 |  Balai Besar Pengkajian dan Pengembangan Teknologi Pertanian <br> Jalan Tentara Pelajar Cimanggu No. 10,Ciwaringin,Bogor Tengah,Kota Bogor,Jawa Barat 16111 <br> Telp. : (0251) 8351277 Fax : (0251) 8350928 Email : bbpengkajian2016@gmail.com <br> Contact Person Admin : (+62) 81383750033
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/home/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/home/js/bootstrap.min.js"></script>

</body>

</html>
