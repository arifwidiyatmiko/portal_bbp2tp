

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
      <!-- <marquee behavior="scroll" bgcolor="#3e30ff" width="100%" height="40px" style="color: #fff; font-size:16pt;" direction="left">
            <?php 
            foreach ($marquee as $key) {
              ?><span><a style="underline:none;color:white;" href="<?= base_url()?>Portal/detailAgenda/<?= $key->idAgenda?>"><?= $key->judulKegiatan."/ ".$key->tanggal."/ Di ".$key->tempat."/ ".$key->judulKegiatan."/ "?></a></span><?php
            }
            ?>
              </marquee> -->
       <div class="col-md-12" id="right-side">
                <h5 class="heading-list2">Beria Penting Lain</h5><div class="hr-heading-list2"></div>
                    <div class="row no-gutter">
            
                        <div class="col-lg-6 left-padding">
                            <?php foreach ($presiden as $p) { ?>
                            <div class="side-featured " style="background-image:url(<?php echo $p->gambar;?>); width: 530px; height: 500px;" alt="...">
                                <a href="<?php echo $p->baseUrl.'Portal/detailBerita/'.$p->idBerita;?>" <?php if($p->baseUrl != base_url()){echo 'target="new"';}?> class="anchor-block"></a>
                                <div class="bottom-align-text">
                                    <a href="<?php echo $p->baseUrl.'Portal/detailBerita/'.$p->idBerita;?>" <?php if($p->baseUrl !=  base_url()){echo 'target="new"';}?> class="cat">Presiden</a>
                                    <a href="<?php echo $p->baseUrl.'Portal/detailBerita/'.$p->idBerita;?>"<?php if($p->baseUrl !=  base_url()){echo 'target="new"';}?> class="featured"><h3><?php echo $p->judulBerita; ?></h3></a>
                                </div>
                            </div>
                            
                            <?php } ?>
                        </div>
                        <div class="col-lg-5 " >
                            <div class="row">
                                <?php foreach ($menteri as $m) { ?>
                            <div class="side-featured" style="background-image:url(<?php echo $m->gambar;?>); width: 525.5px; height: 250px; float: left;" alt="...">
                                <a href="<?php echo $m->baseUrl.'Portal/detailBerita/'.$m->idBerita;?>" <?php if($m->baseUrl !=  base_url()){echo 'target="new"';}?> class="anchor-block"></a>
                                <div class="bottom-align-text2">
                                    <a href="<?php echo $m->baseUrl.'Portal/detailBerita/'.$m->idBerita;?>" <?php if($m->baseUrl!=  base_url()){echo 'target="new"';}?> href="#" class="cat">Menteri</a>
                                    <a href="<?php echo $m->baseUrl.'Portal/detailBerita/'.$m->idBerita;?>" <?php if($m->baseUrl !=  base_url()){echo 'target="new"';}?> href="#" class="featured"><h5><?php echo $m->judulBerita; ?></h5></a>
                                </div>
                            </div>
                                <?php } 
                                    foreach ($gubernur as $g) { ?>
                            <div class="side-featured" style="background-image:url(<?php echo $g->gambar;?>); width: 525.5px; height: 250px; float: left;" alt="...">
                                <a href="<?php echo $g->baseUrl.'Portal/detailBerita/'.$g->idBerita;?>" <?php if($g->baseUrl !=  base_url()){echo 'target="new"';}?> class="anchor-block"></a>
                                <div class="bottom-align-text3">
                                    <a href="<?php echo $g->baseUrl.'Portal/detailBerita/'.$g->idBerita;?>" <?php if($g->baseUrl!=  base_url()){echo 'target="new"';}?> class="cat">Gubernur</a>
                                    <a href="<?php echo $g->baseUrl.'Portal/detailBerita/'.$g->idBerita;?>" <?php if($g->baseUrl!=  base_url()){echo 'target="new"';}?> class="featured"><h5><?php echo $g->judulBerita; ?></h5></a>
                                </div>
                            </div>
                            <?php } ?>
                            </div>
                        </div>
                    
                    </div>        

            </div>
        
       
        
        <div class="row" id="content-list">
        	<!-- <div class="col-md-3" id="left-side">
        		<h5 class="heading-list1">Berita Mingguan</h5><div class="hr-heading-list1"></div>
                <ul class="media-list comment-list">
                	<?php foreach ($mingguan as $m) { ?>
                  <li class="media">
                    <div class="media-body">
                      <a href="<?php echo base_url().'Portal/detailBerita/'.$m->idBerita;?>" class="media-heading"><?php echo $m->judulBerita; ?></a>
                    </div>
                  </li>
                  <hr>
                  <?php } ?>
                </ul>
        	</div> -->

            <div class="col-md-8 nopadding" id="left-side">

                <h5 class="heading-list">Berita Terbaru</h5><div class="hr-heading-list"></div>
                <div class="col-sm-12  no-gutter nopadding">
                	<?php
                	function limit_words($string, $word_limit){
		                $words = explode(" ",$string);
		                return implode(" ",array_splice($words,0,$word_limit));
		            }
                	foreach ($berita->result() as $b) {
                	?>
                    <ul class="media-list news-item">
                      <li class="media">
                        <div class="col-sm-4">
                            <!-- <img class="media-object" src="<?php echo base_url().'assets/upload/berita/'.$b->gambar;?>" style="width: 200px; height: 150px;" alt="..."> -->
                            <img class="media-object" src="<?php echo $b->gambar;?>" style="width: 200px; height: 150px;" alt="...">
                        </div>
                        <div class="col-sm-8">
                          <a href="<?php echo base_url().'Portal/detailBerita/'.$b->idBerita;?>"><h5><?php echo $b->judulBerita; ?></h5></a>
                          <p><?php echo limit_words($b->isiBerita,20); ?>...</p>
                        </div>
                      </li>
                    </ul>
                    <hr>
                    <?php } ?>

                    <nav>
                    	<?php echo $pagination; ?>
                    </nav>

                </div>

            </div>
            <div class="col-md-4" id="right-side">

                <h5 class="heading-list2">Serambi BBP2TP</h5><div class="hr-heading-list2"></div>
                <ul class="list-group">
                    <?php 
                    $i=0;
                    foreach ($serambi->result() as $s) { if($i<5){?>
                   <li class="list-group-item"><a href="<?php echo base_url().'Portal/detailBerita/'.$s->idBerita;?>" class="media-heading"><?php echo $s->judulBerita; ?></a></li>
                    
                  <!-- <hr> -->
                <?php }$i++;} ?>
                </ul>
                <h5 class="heading-list2">Video BBP2TP</h5><div class="hr-heading-list2"></div>
                <!-- 16:9 aspect ratio -->
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/watch?v=ZANoDd5IcRA&t=11s"></iframe>
                  <iframe class="embed-responsive-item"" src="https://www.youtube.com/embed/ZANoDd5IcRA?controls=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
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
                    	Hak Cipta &copy; 2018 | Balai Besar Pengkajian dan Pengembangan Teknologi Pertanian<br> Jalan Tentara Pelajar Cimanggu No. 10,Ciwaringin,Bogor Tengah,Kota Bogor,Jawa Barat 16111 <br> Telp. : (0251) 8351277 Fax : (0251) 8350928 Email : bbpengkajian2016@gmail.com <br> Contact Person Admin : (+62) 81383750033
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
