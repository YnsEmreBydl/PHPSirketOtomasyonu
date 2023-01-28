<?php require_once('baglan.php') ?>

<!DOCTYPE html>
<html lang="tr">
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
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

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
          <div class="col-md-12" style="margin:auto;">
            <div class="card">
         <div class="card-header ">
           <div class="butonlarim" class="col-md-12" style="display:flex; flex-wrap: nowrap; float:right;">

             <a href="ekle.php?sayfa=odemeekle">
             <button type="submit" class="btn btn-primary" style="float:right; margin-right:5px">Ödeme Ekle</button>
             </a>
             <a href="odemeyapilmis.php">
             <button type="submit" class="btn btn-success" style="float:right; margin-right:5px">Ödemesi Yapılmış</button>
             </a>
             <a href="odemeler.php">
             <button type="submit" class="btn btn-danger" style="float:right; margin-right:5px">Ödenmemiş</button>
             </a>

                       </div>
                <h3 class="card-title">ÖDEMELER TABLOSU</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-responsive">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>

                      <th>Kategori</th>
                      <th>Kime</th>
                      <th>Tutar</th>
                      <th>Ödenecek Zaman</th>
                      <th>Kalan Gün Sayısı</th>
                      <th>Durum</th>
                      <th>Düzenle</th>
                      <th>Sil</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php



                  $sayfada = 10; // sayfada gösterilecek içerik miktarını belirtiyoruz.
                     $sorgu=$db->prepare("SELECT * FROM odemeler");
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
                   <div class="alert alert-warning">ÖDEMENİZ BULUNMUYOR</div>
                  <?php } else{

                      $odemecek = $db -> prepare("select * from odemeler inner join kategoriler on kategoriler.kategori_id=odemeler.odeme_kategori where odeme_durum=:odeme_durum limit $limit, $sayfada");
                     $odemecek -> execute(array('odeme_durum'=>0));
                     $toplam_icerik=$odemecek->rowCount();
                   while ($odemesor = $odemecek -> fetch(PDO::FETCH_ASSOC))

                    {  ?>

                      <tr>
                     <td ><?php echo $odemesor['odeme_id'] ?></td>
                      <td ><?php echo $odemesor['kategori_ad'] ?></td>
                    <td  style="width: 150px"><?php echo $odemesor['odeme_kime'] ?></td>


                     <td><?php echo $odemesor['odeme_tutar'] ?> ₺</td>
                     <td><?php echo $odemesor['odeme_zaman'] ?></td>

                     <td style="background:orangered; color:black;"><?php
               $tarih1 = strtotime(date('d.m.Y'));
               $tarih2 = strtotime($odemesor['odeme_zaman']);
               $fark = $tarih2 - $tarih1;
               echo $sonuc = floor($fark / (60 * 60 * 24));
               ?>  Gün kaldı</td>
               <td>
               <?php if ($odemesor['odeme_durum']==1) { ?>

                 <div class="btn btn-success btn-sm">Ödendi</div>

               <?php } elseif($odemesor['odeme_durum']==0) {?>
                 <div class="btn btn-danger btn-sm">Ödenmedi</div>
               <?php } ?>
             </td>


                   <td><a href="duzenle.php?sayfa=odemeduzenle&odeme_id=<?php echo $odemesor['odeme_id'] ?>"><button type="submit" class="btn btn-warning btn-sm">Düzenle</button></a></td>
                   <td><a onClick="sil(<?php echo $odemesor['odeme_id']?>)" type="submit" class="btn btn-danger btn-sm">Sil</a></td>
                   </tr>

                <?php }  ?>

         <?php } ?>

                  </tbody>

                </table>
                                                <nav aria-label="Page navigation example">
  <ul style="float:right;" class="pagination p-3">
    <li class="page-item"><a class="page-link" href="odemeler.php?sayfa=<?php $s; ?>">İlk Sayfa</a></li>
     <?php

                          $s=0;

                          while ($s < $toplam_sayfa) {

                            $s++; ?>

                            <?php

                            if ($s==$sayfa) {?>
    <li class="page-item active"><a class="page-link" href="odemeler.php?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a></li>
     <?php } else {?>
        <li>

      <li class="page-item"><a class="page-link" href="odemeler.php?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a></li>

                            </li>

                            <?php   }

                          }

                          ?>
    <li class="page-item"><a class="page-link" href="#">Son Sayfa</a></li>
  </ul>
</nav>
              </div>

            <!-- /.card -->
          </div>
          <!-- /.col -->

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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php if (@$_GET['odemedurum']=="odemeeklendi") {?>
 <script type="text/javascript">


Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Yeni Ödeme Eklendi',
  showConfirmButton: false,
  timer: 1500
});

  </script>

<?php } ?>

 <?php if (@$_GET['odemedurum']=="odemeguncellendi") {?>
 <script type="text/javascript">


Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Güncelleme Başarılı',
  showConfirmButton: false,
  timer: 1500
});

  </script>

<?php } ?>

 <script type="text/javascript">

   function sil(odeme_id){
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

           window.location.href = 'islem.php?odeme_id=' + odeme_id;

       }
     })

   }


  </script>






</body>
</html>
