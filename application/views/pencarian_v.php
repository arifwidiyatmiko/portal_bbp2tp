

    <!-- Page Content -->
    <div class="container" id="big-card">
         

        <div class="row" id="content-list">


            <div class="col-md-8 nopadding" id="left-side">

                <h3>Hasil Pencarian</h3><br>

                <?php
                function limit_words($string, $word_limit){
                        $words = explode(" ",$string);
                        return implode(" ",array_splice($words,0,$word_limit));
                }
                if (count($cari)>0) {
                foreach ($cari as $c) { ?>

                <a href="<?php echo base_url().'Portal/detailBerita/'.$c->idBerita;?>"><h4><?php echo $c->judulBerita ?></h4></a>
                <div class="col-xs-12  no-gutter nopadding">
                    <p><?php echo limit_words($c->isiBerita,25); ?>...</p><hr>
                </div>

                <?php 
                }
                }else{
                    echo "Data tidak ditemukan";
                } ?>
                
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

                <!-- <h5 class="heading-list">Statistik Pengunjung</h5><div class="hr-heading-list"></div>
                <ul class="media-list comment-list">
                  <li class="media">
                    <div class="media-body">
                      Statistik
                    </div>
                  </li>
                </ul>
                <hr> -->
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
                                  <td><a href="http://localhost/portal_bbp2tp/">Aceh</a>, <a href="http://localhost/portal_bbp2tp/">Sumatera Barat</a>, <a href="http://localhost/portal_bbp2tp/">Sumatera Utara</a>, <a href="http://localhost/portal_bbp2tp/">Riau</a>, <a href="http://localhost/portal_bbp2tp/">Jambi</a>, <a href="http://localhost/portal_bbp2tp/">Sumatera Selatan</a>, <a href="http://localhost/portal_bbp2tp/">Lampung</a></td>
                              </tr>
                              <tr>
                                  <td>JAWA</td>
                                  <td><a href="http://localhost/portal_bbp2tp/">Banten</a>, <a href="http://localhost/portal_bbp2tp/">DKI Jakarta</a>, <a href="http://localhost/portal_bbp2tp/">Jawa Barat</a>, <a href="http://localhost/portal_bbp2tp/">Jawa Tengah</a>, <a href="http://localhost/portal_bbp2tp/">Jawa Timur</a>, <a href="http://localhost/portal_bbp2tp/">Madura</a>, <a href="http://localhost/portal_bbp2tp/">Bali</a></td>
                              </tr>
                              <tr>
                                  <td>Kalimantan</td>
                                  <td>Aceh, Sumatera Utara, Sumatera Barat, Bengkulu, Riau, Kep. Riau, Jambi, Sumatera Selatan,</td>
                              </tr>
                          </tbody>
                      </table>
                  </div>      

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
