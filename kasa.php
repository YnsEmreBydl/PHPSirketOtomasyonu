<?php require_once('baglan.php');




                     $satiscek = $db -> prepare("SELECT sum(satis_fiyat) FROM satislar WHERE DAY(satis_zaman) = DAY(CURDATE()) and siparis_durum=:siparis_durum");
                     $satiscek -> execute(array('siparis_durum'=>3));
                   $satissor = $satiscek-> fetch(PDO::FETCH_ASSOC);
                   $gunlukkGelir = $satissor['sum(satis_fiyat)'];


                     $satiscek = $db -> prepare("SELECT sum(satis_fiyat) FROM satislar WHERE WEEK(satis_zaman) = WEEK(CURDATE())  and siparis_durum=:siparis_durum");
                     $satiscek -> execute(array('siparis_durum'=>3));
                   $satissor = $satiscek-> fetch(PDO::FETCH_ASSOC);
                   $haftalikGelir = $satissor['sum(satis_fiyat)'];

                   $satiscek = $db -> prepare("SELECT sum(satis_fiyat) FROM satislar WHERE MONTH(satis_zaman) = MONTH(CURDATE())  and siparis_durum=:siparis_durum");
                   $satiscek -> execute(array('siparis_durum'=>3));
                 $satissor = $satiscek-> fetch(PDO::FETCH_ASSOC);
                 $aylikGelir = $satissor['sum(satis_fiyat)'];



                 $satiscek = $db -> prepare("select sum(satis_fiyat) from satislar where siparis_durum=:siparis_durum");
                 $satiscek -> execute(array('siparis_durum'=>3));
               $satissor = $satiscek-> fetch(PDO::FETCH_ASSOC);
               $satissayisi = $satissor['sum(satis_fiyat)'];



?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Muhasebe Uygulaması</title>
<link rel="stylesheet" href="sweetalert2.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/></head>

</head>
<div class="wrapper">

  <!-- Preloader -->

  <?php require_once('header.php') ?>

  <?php require_once('sidebar.php') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">


        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <!-- ./col -->
          <div class="col-lg-12 col-12" style="text-align:center">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $haftalikGelir ?> ₺</h3>

                <p>HAFTALIK TOPLAM SATIŞ</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-12 col-12" style="text-align:center">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $gunlukkGelir ?> ₺</h3>

                <p>GÜNLÜK TOPLAM SATIŞ</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-12 col-12" style="text-align:center">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $aylikGelir ?> ₺</h3>

                <p>AYLIK TOPLAM SATIŞ</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>

          <!-- ./col -->
        </div>
        <!-- /.row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
      <div class="col-lg-12 col-12" style="text-align:center;">
        <!-- small box -->
        <div class="small-box bg-dark" style="height:300px;">
          <div class="inner">
            <h1><?php echo $satissayisi ?> ₺</h1>

            <h5>TOPLAM SATIŞ KASA TUTARI</h5>
          </div>

<img src="dist/img/safebox.png" style="width:150px;">
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php require_once('footer.php') ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="sweetalert2.min.js"></script>

</body>
</html>
