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
              $limit = 6;$i=1;
              foreach ($kategori4->result() as $k) { if($i <= $limit){ ?>
                            <li><a href="<?php echo base_url().'Portal/kategoriK/'.$k->idKegiatan;?>"><?php echo $k->namaKegiatan; ?></a></li>
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
                  <li><a href="#">Excel</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">Grafik</a></li>
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
                    <li class="active">Lain-Lain</li>
                    <li class="active"><?php echo $b['namaKegiatan'];?></li>
                </ol>
            
                <div class="col-xs-12  no-gutter nopadding">
                  <?php
                    function limit_words($string, $word_limit){
                        $words = explode(" ",$string);
                        return implode(" ",array_splice($words,0,$word_limit));
                    }
                    foreach ($padi as $pa) { ?>
                    <ul class="media-list news-item">
                      <li class="media">
                        <div class="media-left">
                            <img class="media-object" src="<?php echo $pa->gambar;?>" style="width: 200px; height: 150px;" alt="...">
                            <!-- <img class="media-object" src="<?php echo base_url().'assets/upload/berita/'.$pa->gambar;?>" style="width: 275px; height: 175px;" alt="..."> -->
                        </div>
                        <div class="media-body">
                          <a href="<?php echo base_url().'Portal/detailBerita/'.$pa->idBerita;?>"><h4><?php echo $pa->judulBerita; ?></h4></a>
                          <p><?php echo limit_words($pa->isiBerita,50); ?>...</p>
                        </div>
                      </li>
                      <?php } ?>
                    </ul>

                    <nav>
                      <?php echo $pagination; ?>
                    </nav>

                </div>

            </div>
            <div class="col-md-4" id="right-side">
                
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
            </div>
            
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
