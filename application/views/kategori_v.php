

    <!-- Page Content -->
    <div class="container" id="big-card">
         

        <div class="row" id="content-list">


            <div class="col-md-8 nopadding" id="left-side">

                <ol class="breadcrumb">
                    <li><a href="<?php echo site_url('Portal/index'); ?>">Beranda</a></li>
                    <li class="active"><?php echo $b['namaSubsektor'];?></li>
                    <li class="active"><?php echo $b['namaKomoditas'];?></li>
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
                            <!-- <img class="media-object" src="<?php echo base_url().'assets/upload/berita/'.$pa->gambar;?>" style="width: 275px; height: 175px;" alt="..."> -->
                            <img class="media-object" src="<?php echo $b->gambar;?>" style="width: 200px; height: 150px;" alt="...">
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
        
    </div>
 
        
    
    <!-- /.container -->

    <footer>
        <div id="copyright">
            <div class="container">
                <div class="row nopadding text-center">
                    <p>
                      Hak Cipta &copy; 2018 | Kerjasama Balai Besar Pengkajian dan Pengembangan Teknologi Pertanian dengan Program Diploma Institut Pertanian Bogor <br> Jalan Tentara Pelajar Cimanggu No. 10,Ciwaringin,Bogor Tengah,Kota Bogor,Jawa Barat 16111 <br> Telp. : (0251) 8351277 Fax : (0251) 8350928 Email : bbpengkajian2016@gmail.com <br> Contact Person Admin : (+62) 81383750033
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
