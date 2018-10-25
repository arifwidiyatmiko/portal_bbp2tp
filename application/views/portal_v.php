<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>News Portal BBP2TP</title>

    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/home/img/logo-mini.png">

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/home/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/home/css/style.css" rel="stylesheet">

</head>

<body>
    
    <nav class="navbar head navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
                <a class="navbar-brand" id="color-me" href="<?php echo site_url('Portal/index'); ?>"><img class="img-responsive" src="<?php echo base_url(); ?>assets/home/img/brandtext.png"></a>
            </div>
            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#" id="color-me">Beranda <span class="sr-only">(current)</span></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" id="color-me" data-toggle="dropdown" role="button" aria-expanded="false">Tanaman Pangan <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                           <?php foreach ($kategori->result() as $k) { ?>
                            <li><a href="<?php echo base_url().'Portal/kategori/'.$k->idKomoditas;?>"><?php echo $k->namaKomoditas; ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" id="color-me" data-toggle="dropdown" role="button" aria-expanded="false">Peternakan <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <?php foreach ($kategori1->result() as $k) { ?>
                            <li><a href="<?php echo base_url().'Portal/kategori/'.$k->idKomoditas;?>"><?php echo $k->namaKomoditas; ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" id="color-me" data-toggle="dropdown" role="button" aria-expanded="false">Perkebunan <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <?php foreach ($kategori2->result() as $k) { ?>
                            <li><a href="<?php echo base_url().'Portal/kategori/'.$k->idKomoditas;?>"><?php echo $k->namaKomoditas; ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" id="color-me" data-toggle="dropdown" role="button" aria-expanded="false">Hortikultura <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <?php foreach ($kategori3->result() as $k) { ?>
                            <li><a href="<?php echo base_url().'Portal/kategori/'.$k->idKomoditas;?>"><?php echo $k->namaKomoditas; ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" id="color-me" data-toggle="dropdown" role="button" aria-expanded="false">Lain-Lain <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <?php foreach ($kategori4->result() as $k) { ?>
                            <li><a href="<?php echo base_url().'Portal/kategoriK/'.$k->idKegiatan;?>"><?php echo $k->namaKegiatan; ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>
                <form action="<?php echo site_url('Portal/pencarian');?>" method="POST" class="navbar-form navbar-left navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" name="keyword" class="form-control" style="color: #fff;" placeholder="Pencarian...">
                    </div>
                </form>
            </div>
        </div>
    </nav>


    <!-- Page Content -->
    <div class="container" id="big-card">
        <!-- <div class="jumbotron"> -->
            <h5 class="heading-list">Berita Terbaru</h5><div class="hr-heading-list"></div>
            <?php 
            foreach ($grid->result() as $key) {
                ?>
                <div class="col-md-2">
                    <!-- <div class="thumbnail"> -->
                      <a href="<?= $key->url;?>">
                        <img src="<?php echo base_url();?>assets/<?php echo $key->thumb_image;?>" alt="Lights" class="img-responsive" >
                      </a>
                    <!-- </div> -->
                  </div>
                <?php
            }
            ?>
        <!-- </div> -->
        
       
        
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
                <div class="col-xs-12  no-gutter nopadding">
                	<?php
                	function limit_words($string, $word_limit){
		                $words = explode(" ",$string);
		                return implode(" ",array_splice($words,0,$word_limit));
		            }
                	foreach ($berita->result() as $b) {
                	?>
                    <ul class="media-list news-item">
                      <li class="media">
                        <div class="media-left">
                            <img class="media-object" src="<?php echo $b->gambar;?>" style="width: 200px; height: 150px;" alt="...">
                        </div>
                        <div class="media-body">
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
                    <?php foreach ($serambi->result() as $s) { ?>
                   <li class="list-group-item"><a href="<?php echo base_url().'Portal/detailBerita/'.$s->idBerita;?>" class="media-heading"><?php echo $s->judulBerita; ?></a></li>
                    
                  <!-- <hr> -->
                <?php } ?>
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
                <h5 class="heading-list2">Beria Penting Lain</h5><div class="hr-heading-list2"></div>
                <div class="row no-gutter">
            
            <div class="col-lg-6 left-padding">
                <?php foreach ($presiden as $p) { ?>
                <div class="side-featured " style="background-image:url(<?php echo base_url().'assets/upload/berita/'.$p->gambar;?>); width: 530px; height: 500px;" alt="...">
                    <a href="<?php echo base_url().'Portal/detailBerita/'.$p->idBerita;?>" class="anchor-block"></a>
                    <div class="bottom-align-text">
                        <a href="#" class="cat">Presiden</a>
                        <a href="#" class="featured"><h3><?php echo $p->judulBerita; ?></h3></a>
                    </div>
                </div>
                
                <?php } ?>
            </div>
            <div class="col-lg-5 " >
                <div class="row">
                    <?php foreach ($menteri as $m) { ?>
                <div class="side-featured" style="background-image:url(<?php echo base_url().'assets/upload/berita/'.$m->gambar;?>); width: 525.5px; height: 250px; float: left;" alt="...">
                    <a href="<?php echo base_url().'Portal/detailBerita/'.$m->idBerita;?>" class="anchor-block"></a>
                    <div class="bottom-align-text2">
                        <a href="#" class="cat">Menteri</a>
                        <a href="#" class="featured"><h5><?php echo $m->judulBerita; ?></h5></a>
                    </div>
                </div>
                    <?php } 
                        foreach ($gubernur as $g) { ?>
                <div class="side-featured" style="background-image:url(<?php echo base_url().'assets/upload/berita/'.$g->gambar;?>); width: 525.5px; height: 250px; float: left;" alt="...">
                    <a href="<?php echo base_url().'Portal/detailBerita/'.$g->idBerita;?>" class="anchor-block"></a>
                    <div class="bottom-align-text3">
                        <a href="#" class="cat">Gubernur</a>
                        <a href="#" class="featured"><h5><?php echo $g->judulBerita; ?></h5></a>
                    </div>
                </div>
                <?php } ?>
                </div>
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
