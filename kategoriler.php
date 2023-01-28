<?php require_once('baglan.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Muhasebe Uygulaması</title>

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

  <script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="sweetalert2.min.css">
<!-- JavaScript -->
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
          <div class="col-md-6" style="margin: auto ;">
            <div class="card">







                <div class="card-header">
                <h3 class="card-title">ÖDEME KATEGORİ TABLOSU</h3>


              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-responsive">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Kategori Adı</th>
                      <th>Sıra</th>

                      <th>Düzenle</th>
                      <th>Sil</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php



                    $sayfada = 10; // sayfada gösterilecek içerik miktarını belirtiyoruz.
                     $sorgu=$db->prepare("SELECT * FROM kategoriler");
                     $sorgu->execute();
                     $toplam_icerik=$sorgu->rowCount();
                     $toplam_sayfa = ceil($toplam_icerik / $sayfada);
                  // eğer sayfa girilmemişse 1 varsayalım.
                     $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;

          // eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
                     if($sayfa < 1) $sayfa = 1;
        // toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
                     if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;
                     $limit = ($sayfa - 1) * $sayfada;

                       if ($toplam_icerik == 0) {?>
                    <div class="alert alert-warning">KATEGORİ BULUNMUYOR</div>

                   <?php } else{

                   $kategorilercek = $db -> prepare("select * from kategoriler order by kategori_sira ASC limit $limit,$sayfada");
                    $kategorilercek->execute();

                    $toplam_icerik=$kategorilercek->rowCount();
                    while ($kategorilersor = $kategorilercek -> fetch(PDO::FETCH_ASSOC)){   ?>

                       <tr>
                      <td ><?php echo $kategorilersor['kategori_id'] ?></td>
                      <td  style="width: 100px"><?php echo $kategorilersor['kategori_ad'] ?> </td>
                       <td  style="width: 100px"><?php echo $kategorilersor['kategori_sira'] ?> </td>
                      <td><a href="duzenle.php?sayfa=kategoriduzenle&kategori_id=<?php echo $kategorilersor['kategori_id'] ?>"><button type="submit" class="btn btn-warning btn-sm">Düzenle</button></a></td>
                      <td><a onClick="sil(<?php echo $kategorilersor['kategori_id']?>)" type="submit" class="btn btn-danger btn-sm">Sil</a></td>
                    </tr>

                  <?php } ?>

                <?php } ?>

                  </tbody>

                </table>






                <nav aria-label="Page navigation example">
  <ul style="float:right;" class="pagination p-3">
    <?php     $s=0; ?>
    <li class="page-item"><a class="page-link" href="kategoriler.php?sayfa=<?php echo $s; ?>">İlk Sayfa</a></li>
     <?php



                          while ($s < $toplam_sayfa) {

                            $s++; ?>

                            <?php

                            if ($s==$sayfa) {?>
    <li class="page-item active"><a class="page-link" href="kategoriler.php?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a></li>
     <?php } else {?>
        <li>

      <li class="page-item"><a class="page-link" href="kategoriler.php?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a></li>

                            </li>

                            <?php   }

                          }

                          ?>
    <li class="page-item"><a class="page-link" href="kategoriler.php?sayfa=<?php echo $s; ?>">Son Sayfa</a></li>
  </ul>
</nav>


                  </div>
            <!-- /.card -->


            <!-- /.card -->
          </div>
          <!-- /.col -->
            <div class="card">







                <div class="card-header">
                <h3 class="card-title">KATEGORİ EKLE</h3><br>
   <form action="islem.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kategori Adı</label>
                    <input type="text" class="form-control" required id="exampleInputEmail1" name="kategori_ad" placeholder="Kategori adı giriniz">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sıra</label>
                    <input type="number" class="form-control" required id="exampleInputEmail1" name="kategori_sira" placeholder="Sıra numarası giriniz">
                  </div>



                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="kategoriekle" class="btn btn-primary">Ekle</button>
                </div>
              </form>
            <!-- /.card -->


            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>


        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
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
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


 <?php if (@$_GET['kategoridurum']=="kategorieklendi") {?>
 <script type="text/javascript">


Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Ekleme İşlemi Başarılı',
  showConfirmButton: false,
  timer: 1500
});

  </script>

<?php } ?>

 <?php if (@$_GET['kategoridurum']=="kategoriup") {?>
 <script type="text/javascript">


Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Güncelleme İşlemi Başarılı',
  showConfirmButton: false,
  timer: 1500
});
 </script>
<?php } ?>


<script type="text/javascript">

  function sil(kategori_id){
    Swal.fire({
      title: 'Silmek istediğinize emin misiniz?',
      text: "Bu işlem geri alınamaz!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'İptal',
      confirmButtonText: 'Evet, Sil!'
    }).then((result) => {
      if (result.value) {

          window.location.href = 'islem.php?kategori_id=' + kategori_id;

      }
    })

  }


 </script>

</body>
</html>
