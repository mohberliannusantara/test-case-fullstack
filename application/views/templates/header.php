<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/logo.png') ?>">

  <title>Dasboard | Majoo</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url('assets/css/modern-business.css') ?>" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Majoo Teknologi Indonesia</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item <?php if ($page == 'Beranda'): ?>active<?php endif; ?>">
            <a class="nav-link" href="<?php echo base_url('beranda') ?>">Beranda</a>
          </li>
          <li class="nav-item <?php if ($page == 'Produk'): ?>active<?php endif; ?>">
            <a class="nav-link" href="<?php echo base_url('produk') ?>">Produk</a>
          </li>
          <li class="nav-item <?php if ($page == 'Pesanan'): ?>active<?php endif; ?>">
            <a class="nav-link" href="<?php echo base_url('pesanan') ?>">Pesanan</a>
          </li>
          <li class="nav-item <?php if ($page == 'Pembelian'): ?>active<?php endif; ?>">
            <a class="nav-link" href="<?php echo base_url('pembelian') ?>">
              <img src="<?php echo base_url('assets/img/shopping_cart.png') ?>" alt="" style="width:20px;">(<?php echo count($keranjang); ?>)
            </a>
          </li>
          <li class="nav-item">
            <?php if ($this->session->userdata('logged_in') == TRUE): ?>
              <a class="nav-link" href="<?php echo base_url('autentikasi/logout') ?>">Logout</a>
            <?php else: ?>
              <a class="nav-link" href="<?php echo base_url('autentikasi') ?>">Login</a>
            <?php endif; ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>
