<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <script src="{{ asset('js/script.js') }}"></script>
  <title>@yield('title')</title>
</head>

<style>
  .navbar-nav {
    color: black;
    font-weight: 500;
    font-style: bold;
  }

  .nav-item {
    text-align: center;
  }

  body {
    background-image: url('https://www.istockphoto.com/id/vektor/gaya-cair-warna-warni-latar-belakang-abstrak-pastel-dengan-elemen-vektor-gm1288020112-384099439');
    background-repeat: no-repeat;
    background-size: cover;
	background-position: center
  }

  .navbar-brand {
    font-size: 24px;
    font-weight: bold;
    color: #333;
  }

  .navbar-toggler {
    border-color: #333;
  }

  .navbar-toggler-icon {
    background-color: #333;
  }

  .nav-link {
    color: #333;
    transition: color 0.3s;
  }

  .nav-link:hover {
    color: #666;
  }
</style>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">Pembukuan ZAIA</a>
      <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/belibarang') }}">Beli Barang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/terjual') }}">Terjual</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/ambiluang') }}">Ambil Uang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/produkgagal') }}">Produk Gagal</a>
          </li>
          <!--
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/galeri') }}">Galeri</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
          </li>
          -->
          <!--
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/register') }}">Register</a>
          </li>
          -->
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/logout') }}">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  @yield('container')

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  -->
</body>

</html>
