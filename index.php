<?php require_once('baglan.php');

                       $uruncek = $db -> prepare("select sum(urun_stok) from urunler");
                       $uruncek -> execute();
                     $urunsor = $uruncek-> fetch(PDO::FETCH_ASSOC);
                     $stoksayisi = $urunsor['sum(urun_stok)'];


                        $poscek = $db -> prepare("select count(*) from pos where pos_durum=:pos_durum");
                       $poscek -> execute(array('pos_durum'=>0));
                     $possor = $poscek-> fetch(PDO::FETCH_ASSOC);
                     $arizalipossayisi = $possor['count(*)'];

                     $bekleyencek = $db -> prepare("select count(*) from satislar where siparis_durum=:siparis_durum");
                    $bekleyencek -> execute(array('siparis_durum'=>0));
                  $bekleyensor = $bekleyencek-> fetch(PDO::FETCH_ASSOC);
                  $odemebekleyen = $bekleyensor['count(*)'];

                  $onaycek = $db -> prepare("select count(*) from satislar where siparis_durum=:siparis_durum");
                 $onaycek -> execute(array('siparis_durum'=>1));
               $onaysor = $onaycek-> fetch(PDO::FETCH_ASSOC);
               $onaylanan = $onaysor['count(*)'];

               $kargocek = $db -> prepare("select count(*) from satislar where siparis_durum=:siparis_durum");
              $kargocek -> execute(array('siparis_durum'=>2));
            $kargosor = $kargocek-> fetch(PDO::FETCH_ASSOC);
            $kargoda = $kargosor['count(*)'];


            $iptalcek = $db -> prepare("select count(*) from satislar where siparis_durum=:siparis_durum");
           $iptalcek -> execute(array('siparis_durum'=>3));
         $iptalsor = $iptalcek-> fetch(PDO::FETCH_ASSOC);
         $iptal = $iptalsor['count(*)'];

         $arizauruncek = $db -> prepare("select count(*) from urunler where urun_durum=:urun_durum");
        $arizauruncek -> execute(array('urun_durum'=>2));
      $arizaurunsor = $arizauruncek-> fetch(PDO::FETCH_ASSOC);
      $arizaliurun = $arizaurunsor['count(*)'];

      $arizaliaraccek = $db -> prepare("select count(*) from araclar where arac_durum=:arac_durum");
     $arizaliaraccek -> execute(array('arac_durum'=>3));
   $arizaliaracsor = $arizaliaraccek-> fetch(PDO::FETCH_ASSOC);
   $arizaliarac = $arizaliaracsor['count(*)'];
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

          <div class="col-lg-3 col-6"  style="text-align:center; cursor:pointer;">
            <!-- small box -->

        <div class="small-box bg-dark">
              <div class="inner">
                <h4>ÖDEME BEKLEYENLER</h4>
                <h3><?php echo $odemebekleyen ?></h3>

              </div>
              <div class="icon">
                <img src="dist/img/stopwatch.png" style="width:100px; padding:5px">
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6"  style="text-align:center; cursor:pointer;">
            <!-- small box -->
        <div class="small-box bg-dark">
              <div class="inner">
                <h4>ONAYLANAN SİPARİŞLER</h4>
                <h3><?php echo $onaylanan ?></h3>

              </div>
              <div class="icon">
                <img src="dist/img/order.png" style="width:100px; padding:5px">
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6"  style="text-align:center; cursor:pointer;">
            <!-- small box -->
        <div class="small-box bg-dark">
              <div class="inner">
                <h4>KARGODAKİ SİPARİŞLER</h4>
                <h3><?php echo $kargoda ?></h3>

              </div>
              <div class="icon">
                <img src="dist/img/fast-delivery.png" style="width:100px; padding:5px">
              </div>
            </div>
          </div>
          <!-- ./col -->


          <div class="col-lg-3 col-6"  style="text-align:center; cursor:pointer;">
            <!-- small box -->
        <div class="small-box bg-dark">
              <div class="inner">
                <h4>İPTAL EDİLEN SİPARİŞLER</h4>
                <h3><?php echo $iptal ?></h3>


              </div>
              <div class="icon">
                <img src="dist/img/x.png" style="width:100px; padding:5px">
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-6"  style="text-align:center; cursor:pointer;">
            <!-- small box -->
        <div class="small-box bg-dark">
              <div class="inner">
                <h4>ARIZALI ÜRÜNLER</h4>
                <h3><?php echo $arizaliurun ?></h3>


              </div>
              <div class="icon">
                <img src="dist/img/defect.png" style="width:100px; padding:5px">
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-6"  style="text-align:center; cursor:pointer;">
            <!-- small box -->
          <div class="small-box bg-dark">
              <div class="inner">
                <h4>ARIZALI POSLAR</h4>
                <h3><?php echo $arizalipossayisi ?></h3>


              </div>
              <div class="icon">
                <img src="dist/img/poss.png" style="width:100px; padding:5px">
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-6"  style="text-align:center; cursor:pointer;">
            <!-- small box -->
          <div class="small-box bg-dark">
              <div class="inner">
                <h4>ARIZALI ARAÇLAR</h4>
                <h3><?php echo $arizaliarac ?></h3>


              </div>
              <div class="icon">
                <img src="dist/img/delivery.png" style="width:100px; padding:5px">
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6"  style="text-align:center; cursor:pointer;">
            <!-- small box -->
          <div class="small-box bg-dark">
              <div class="inner">
                <h4>TOPLAM STOK SAYISI</h4>
                <h3><?php echo $stoksayisi ?></h3>


              </div>
              <div class="icon">
                <img src="dist/img/delivery.png" style="width:100px; padding:5px">
              </div>
            </div>
          </div>

          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->

          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
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
