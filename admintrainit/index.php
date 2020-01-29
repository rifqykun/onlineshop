<?php 
include '../config/class.php';
?>

<?php 
if (!isset($_SESSION['admin'])) 
{
  echo "<script>alert('Anda belum Login');</script>";
  echo "<script>location='../login.php';</script>";
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Admin Train It</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
  <link rel="stylesheet" type="text/css" href="css/mystyle.css">
  <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/data.js"></script>
  <script src="https://code.highcharts.com/modules/drilldown.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>

</head>
<body>
  <div id="wrap">
    <nav class="navbar navbar-default">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".sidebar-collapse" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Trainit</a>
      </div>
    </nav>
    <nav class="navbar-default navbar-side">
      <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
          <li><a href="index.php"><i class="fa fa-home" aria-hiden="true"></i>&nbsp; Home</a></li>
          <li><a href="index.php?halaman=kategori"><i class="fa fa-list" aria-hiden="true"></i>&nbsp; Kategori</a></li>
          <li><a href="index.php?halaman=produk"><i class="fa fa-cubes" aria-hiden="true"></i>&nbsp; Produk</a></li>
          <li><a href="index.php?halaman=pelanggan"><i class="fa fa-user" aria-hiden="true"></i>&nbsp; Pelanggan</a></li>
          <li><a href="index.php?halaman=pembelian"><i class="fa fa-money" aria-hiden="true"></i>&nbsp; Pembelian</a></li>
          <li><a href="index.php?halaman=testimoni"><i class="fa fa-book" aria-hiden="true"></i>&nbsp; Testimoni</a></li>
          <li><a href="index.php?halaman=blog"><i class="fa fa-newspaper-o" aria-hiden="true"></i>&nbsp; Blog</a></li>
          <li><a href="index.php?halaman=laporan"><i class="fa fa-file" aria-hiden="true"></i>&nbsp; Laporan</a></li>
          <li><a href="index.php?halaman=pengaturan"><i class="fa fa-cog" aria-hiden="true"></i>&nbsp; Pengaturan</a></li>
          <li><a href="index.php?halaman=logout"><i class="fa fa-sign-out" aria-hiden="true"></i>&nbsp; Logout</a></li>
        </ul>
      </div>
    </nav>
    <div id="page-wrapper">
      <div id="page-inner">
        <?php 
        if (!isset($_GET['halaman'])) 
        {
          include 'home.php';
        }
        else
        {
          if ($_GET['halaman']=="kategori") 
          {
            include 'kategori/tampilkategori.php';
          }
          elseif ($_GET['halaman']=="tambahkategori") 
          {
            include 'kategori/tambahkategori.php';
          }
          elseif ($_GET['halaman']=="hapuskategori") 
          {
            include 'kategori/hapuskategori.php';
          }
          elseif ($_GET['halaman']=="ubahkategori") 
          {
            include 'kategori/ubahkategori.php';
          }
          elseif ($_GET['halaman']=="produk") 
          {
            include 'produk/tampilproduk.php';
          }
          elseif ($_GET['halaman']=="tambahproduk") 
          {
            include 'produk/tambahproduk.php';
          }
          elseif ($_GET['halaman']=="hapusproduk") 
          {
            include 'produk/hapusproduk.php';
          }
          elseif ($_GET['halaman']=="ubahproduk") 
          {
            include 'produk/ubahproduk.php';
          }
          elseif ($_GET['halaman']=="pelanggan") 
          {
            include 'pelanggan/tampilpelanggan.php';
          }
          elseif ($_GET['halaman']=="tambahpelanggan") 
          {
            include 'pelanggan/tambahpelanggan.php';
          }
          elseif ($_GET['halaman']=="hapuspelanggan") 
          {
            include 'pelanggan/hapuspelanggan.php';
          }
          elseif ($_GET['halaman']=="ubahpelanggan") 
          {
            include 'pelanggan/ubahpelanggan.php';
          }
          elseif ($_GET['halaman']=="pembelian") 
          {
            include 'pembelian/tampilpembelian.php';
          }
          elseif ($_GET['halaman']=="nota") 
          {
            include 'pembelian/nota.php';
          }
          elseif ($_GET['halaman']=="pembayaran") 
          {
            include 'pembelian/pembayaran.php';
          }
          elseif ($_GET['halaman']=="testimoni") 
          {
            include 'testimoni.php';
          }
          elseif ($_GET['halaman']=="blog") 
          {
            include 'blog/tampilblog.php';
          }
          elseif ($_GET['halaman']=="tambahblog") 
          {
            include 'blog/tambahblog.php';
          }
          elseif ($_GET['halaman']=="pengaturan") 
          {
            include 'pengaturan/tampilpengaturan.php';
          }
          elseif ($_GET['halaman']=="ubahpengaturan") 
          {
            include 'pengaturan/ubahpengaturan.php';
          }
          elseif ($_GET['halaman']=="logout") 
          {
            include 'logout.php';
          }
          elseif ($_GET['halaman']=="konfirmasi") 
          {
            include 'pembelian/konfirmasi.php';
          }
          elseif ($_GET['halaman']=="resi") 
          {
            include 'pembelian/resi.php';
          }
          elseif ($_GET['halaman']=="laporan") 
          {
            include 'laporan.php';
          }
        }
        ?>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $('#table').DataTable();
    } );
  </script>
  <script src="ckeditor/ckeditor.js"></script>
  <script>
    CKEDITOR.replace("editor");
  </script>
  <script src="js/my.js"></script>
</body>
</html>