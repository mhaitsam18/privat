<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Privat Les</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="<?= base_url() ?>asset/lumnia/assets/img/favicon.png" rel="icon">
  <link href="<?= base_url() ?>asset/lumnia/assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->
  <!-- <link rel="stylesheet" href="<?= base_url() ?>asset/admin/vendors/font-awesome/css/font-awesome.min.css"> -->
  <link rel="stylesheet" href="<?= base_url() ?>asset/fontawesome/css/all.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url() ?>asset/lumnia/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>asset/lumnia/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>asset/lumnia/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>asset/lumnia/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?= base_url() ?>asset/lumnia/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url() ?>asset/lumnia/assets/css/style.css" rel="stylesheet">
  <script src="<?= base_url() ?>asset/lumnia/assets/vendor/jquery/jquery.min.js"></script>

  <link rel="stylesheet" href="<?= base_url() ?>asset/admin/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>asset/admin/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
  <style>
    .avatar {
      vertical-align: middle;
      width: 25px;
      height: 25px;
      /* border-radius: 50%; */
    }
  </style>
  <!-- =======================================================
  * Template Name: Lumia - v2.2.0
  * Template URL: https://bootstrapmade.com/lumia-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1><a href="<?= base_url() ?>">Privat</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <!-- <li class="active"><a href="index.html">Home</a></li> -->
          <!-- <li class="drop-down"><a href="">About</a>
            <ul>
              <li><a href="#about">About Us</a></li>
              <li><a href="#team">Team</a></li>
              <li class="drop-down"><a href="#">Deep Drop Dow</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
            </ul>
          </li> -->
          <?php if($this->uri->segment(1) == "privat" || $this->uri->segment(1) == ""){?>
          <!-- <li><a href="#about"><?=$this->uri->segment(1);?></a></li> -->
          <li><a href="#about">Tentang Kami</a></li>
          <li><a href="#services">Layanan Kami</a></li>
          <li><a href="#portfolio">Mata Pelajaran</a></li>
          <li><a href="#testimonials">Testimoni</a></li>
          <li><a href="#contact">Kontak Kami</a></li>
          <?php }?>
          <?php if ($this->session->isLogin == FALSE) { ?>
            <li><a href="<?= base_url() ?>auth/">Masuk</a></li>
          <?php } else { ?>
            <li class="drop-down">
              <a href="#">
                <?= $this->session->name ?>
                <img class="avatar rounded-circle" src="<?= base_url() ?>foto/<?= $this->session->avatar ?>" alt="Avatar">
              </a>
              <ul>
                <li><a href="<?= base_url() ?>profil/">Profil Saya</a></li>
                <li><a href="<?= base_url() ?>kelas/">Kelas Privat Saya</a></li>
                <li><a href="<?= base_url() ?>pesan/pesanan/">Pesanan Saya</a></li>
                <li><a href="<?= base_url() ?>pesan/jadwal/">Jadwal saya</a></li>
                <li><a href="<?= base_url() ?>auth/signout/">Keluar</a></li>
              </ul>
            </li>
          <?php } ?>

        </ul>
      </nav><!-- .nav-menu -->

      <!-- <div class="header-social-links">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div> -->

    </div>
  </header><!-- End Header -->