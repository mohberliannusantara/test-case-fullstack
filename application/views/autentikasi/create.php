<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/logo.png') ?>">

    <title>Dasboard | Majoo</title>

    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/"> -->

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/signin.css') ?>" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin">
      <img class="mb-4" src="<?php echo base_url('assets/img/logo.png') ?>" alt="" width="100" height="100">
      <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>

      <label for="inputEmail" class="sr-only">Nama</label>
      <input type="text" id="input" class="form-control" placeholder="Nama" required autofocus>

      <label for="inputPassword" class="sr-only">Alamat</label>
      <input type="text" id="inputPassword" class="form-control" placeholder="Alamat" required>

      <label for="inputPassword" class="sr-only">Telepon</label>
      <input type="text" id="inputPassword" class="form-control" placeholder="Telepon" required>

      <label for="inputEmail" class="sr-only">Email</label>
      <input type="text" id="inputEmail" class="form-control" placeholder="Email address" required>

      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
      <p class="mt-4">Sudah punya akun? <a href="<?php echo base_url('autentikasi') ?>">Masuk!</a></p>
      <p class="mt-5 mb-3 text-muted">2019 &copy; PT. Majoo Teknologi Indonesia</p>
    </form>
  </body>
</html>
