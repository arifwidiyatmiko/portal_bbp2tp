<?php 
  $b=$detail->row_array();
?>

    <!-- Page Content -->
    <div class="container" id="big-card">
         

        <div class="row" id="content-list">


            <div class="col-md-8 nopadding" id="left-side">

                <ol class="breadcrumb">
                    <li><a href="<?php echo site_url('Portal/index'); ?>">Beranda</a></li>
                    <li class="active">Agenda</li>
                </ol>
                
                <hr><?php echo $b['tanggal']; ?>
                <h2><?php echo $b['judulKegiatan']; ?></h2>
                <div class="col-xs-12  no-gutter nopadding">
                    
                    <!-- <img class="img-responsive" src="<?php echo base_url().'assets/upload/agenda/'.$b['foto'];?>" style="width: 650px; height: 350px;" alt="..."> <!-- 650x350 --> -->
                    <img class="img-responsive" src="<?php echo $b['foto'];?>" style="width: 650px; height: 350px;" alt="..."> <!-- 650x350 -->
                    <br>
                    <h5>Tempat : <?php echo $b['tempat']; ?></h5>
                    <h5>Peserta : <?php echo $b['peserta']; ?> Peserta</h5>
                    <h5>Tamu VIP : <?php echo $b['tamuVIP']; ?></h5>
                    <h5>Penanggung Jawab Kegiatan : <?php echo $b['pjKegiatan']; ?></h5>
                </div>

                <!-- <div class="row" id="related-news">
                    <div class="col-xs-12">
                        <h4>Berita Terkait</h4>
                        <div class="col-xs-6 col-md-6 col-lg-6" >
                            <div class="thumbnail">
                              <img src="http://placehold.it/650x350" alt="...">
                              <div class="caption">
                                <h5>Kewajiban Lapor Kartu Kredit Bikin Ekonomi Kian Lesu</h5>
                                
                              </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-6 col-lg-6" >
                            <div class="thumbnail">
                              <img src="http://placehold.it/650x350" alt="...">
                              <div class="caption">
                                <h5>Menteri Susi Ancam Tenggelamkan Rumpon Liar di Laut Timor</h5>
                                
                              </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-6 col-lg-6">
                            <div class="thumbnail">
                              <img src="http://placehold.it/650x350" alt="...">
                              <div class="caption">
                                <h5>Investor Jepang Minati Sektor Ketenagalistrikan dan Gas</h5>
                                
                              </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-6 col-lg-6">
                            <div class="thumbnail">
                              <img src="http://placehold.it/650x350" alt="...">
                              <div class="caption">
                                <h5>Investor Jepang Minati Sektor Ketenagalistrikan dan Gas</h5>
                                
                              </div>
                            </div>
                        </div>
                    </div>
                </div> -->
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
