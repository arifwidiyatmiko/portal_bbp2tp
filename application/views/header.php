<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>News Portal BPTP</title>

    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/home/img/logo-mini.png">

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/home/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/home/css/style.css" rel="stylesheet">

</head>

<body>
    <style type="text/css">
        .br {
          content: "";
          margin: 0.3em;
          display: block;
          /*font-size: 24%;*/
        }
    </style>
    <nav class="navbar head navbar-fixed-top" >
        <div class="container">
            <div class="navbar-header" >
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
                <a class="navbar-brand" id="color-me" href="<?php echo base_url(); ?>" style="margin-top: -5px;">BPTP Jakarta News <h6 class="br" id="color-me">Dikembangkan oleh BBP2TP</h6></a>
                <!-- <a class="navbar-brand" id="color-me" href="<?php echo site_url('Portal/index'); ?>"><img class="img-responsive" src="<?php echo base_url(); ?>assets/home/img/brandtext.png"></a> -->
            </div>
            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="<?= base_url();?>" id="color-me">Beranda <span class="sr-only">(current)</span></a></li>
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
                    <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" id="color-me" data-toggle="dropdown" role="button" aria-expanded="false">Lain-Lain <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <?php foreach ($kategori4->result() as $k) { ?>
                            <li><a href="<?php echo base_url().'Portal/kategoriK/'.$k->idKegiatan;?>"><?php echo $k->namaKegiatan; ?></a></li>
                            <?php } ?>
                        </ul>
                    </li> -->
                </ul>
                <form action="<?php echo site_url('Portal/pencarian');?>" method="POST" class="navbar-form navbar-left navbar-right" role="search">
                    <div class="form-group" >
                        <input type="text" name="keyword" class="form-control" style="color: #fff;" placeholder="Pencarian...">
                    </div>
                </form>
            </div>
        </div>
    </nav>
