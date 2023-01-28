<?php require_once('baglan.php');



?>

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
  <link rel="stylesheet" href="sweetalert2.min.css">
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
  <script src="sweetalert2.min.js"></script>
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
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
          <div class="col-md-7" style="margin:auto;">
            <?php if ($_GET["sayfa"]=="masrafekle") {?>
           <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">MASRAF EKLEME SAYFASI</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->





              <form action="islem.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Başlık</label>
                    <input type="text" class="form-control" required id="exampleInputEmail1" name="masraf_baslik" placeholder="Başlık giriniz">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Açıklama</label>
                    <textarea name="masraf_aciklama" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tutar</label>
                    <input type="number" class="form-control" required id="exampleInputEmail1" name="masraf_tutar" placeholder="Tutar giriniz">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Zaman</label>
                    <input type="date" class="form-control" required id="exampleInputEmail1" name="masraf_zaman">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button id="ekle" type="submit" name="masrafekle" class="btn btn-primary">Ekle</button>
                </div>
              </form>

            </div>
                    <?php  }elseif($_GET['sayfa']=="odemeekle"){ ?>
                      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">ÖDEME EKLEME SAYFASI</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->





              <form action="islem.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                   <label for="exampleInputEmail1">Kategori</label>
                   <select name="odeme_kategori" required  class="form-control">
                     <option>Kategori Seç</option>

                     <?php

                      $kategoricek = $db -> prepare("select *from kategoriler");
                      $kategoricek -> execute();


                      while ($kategorisor = $kategoricek -> fetch(PDO::FETCH_ASSOC))

                    {
                       $kategori_id = $kategorisor['kategori_id']
                     ?>

                     <option value="<?php echo $kategorisor['kategori_id'] ?>"><?php echo $kategorisor['kategori_ad'] ?></option>
                   <?php } ?>
                   </select>

                 </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Kime</label>
                    <input type="text" class="form-control" required id="exampleInputEmail1" name="odeme_kime" placeholder="Kime yapılacak">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Tutar</label>
                    <input type="number" class="form-control" required id="exampleInputEmail1" name="odeme_tutar" placeholder="Tutar giriniz">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Ödenecek Zaman</label>
                    <input type="date" class="form-control" required id="exampleInputEmail1" name="odeme_zaman">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Durum</label>
                    <select class="form-control" name="odeme_durum">
                      <option value="0">Ödenmedi</option>
                      <option value="1">Ödendi</option>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button id="ekle" type="submit" name="odemeekle" class="btn btn-primary">Ekle</button>
                </div>
              </form>

            </div>
                  <?php  }elseif($_GET['sayfa']=="personelekle"){ ?>

                     <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">PERSONEL EKLEME SAYFASI</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->





              <form action="islem.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Resim</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" name="personel_resim">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ad Soyad</label>
                    <input type="text" class="form-control" required id="exampleInputEmail1" name="personel_ad_soyad" placeholder="Ad soyad giriniz">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Maaş</label>
                    <input type="number" class="form-control" required id="exampleInputEmail1" name="personel_maas" placeholder="Maaş bilgisi giriniz">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Departman</label>
                    <select name="departman" required  class="form-control">
                      <option>Departman Seç</option>

                      <?php

                       $departmancek = $db -> prepare("select *from departmanlar");
                       $departmancek -> execute();


                       while ($departmansor = $departmancek -> fetch(PDO::FETCH_ASSOC))

                     {
                        $departman_id = $departmansor['departman_id']
                      ?>

                      <option value="<?php echo $departmansor['departman_id'] ?>"><?php echo $departmansor['departman_ad'] ?></option>
                    <?php } ?>


                    </select>

                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Adres</label>
                   <textarea class="form-control" name="personel_adres" placeholder="Adres giriniz"></textarea>
                  </div>
            <div class="form-group">
                    <label for="exampleInputEmail1">Telefon</label>
                    <input type="text" class="form-control" maxlength="11" required id="exampleInputEmail1" placeholder="Telefon numarası giriniz" name="personel_tel">
                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="personelekle" class="btn btn-primary">Ekle</button>
                </div>
              </form>

            </div>
           <?php  }elseif($_GET['sayfa']=="borcekle"){ ?>

                     <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">BORÇ EKLEME SAYFASI</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->





              <form action="islem.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tutar</label>
                    <input type="number" class="form-control" required id="exampleInputEmail1" name="borc_tutar" placeholder="Tutar giriniz">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Açıklama</label>
                    <input type="text" class="form-control" required id="exampleInputEmail1" name="borc_aciklama" placeholder="Açıklama giriniz">
                  </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Alınan Zaman</label>
                     <input type="date" class="form-control" required id="exampleInputEmail1" name="alinan_zaman">
                  </div>

            <div class="form-group">
                    <label for="exampleInputEmail1">Verilecek Zaman</label>
                    <input type="date" class="form-control" required id="exampleInputEmail1" name="verilecek_zaman">
                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="borcekle" class="btn btn-primary">Ekle</button>
                </div>
              </form>

            </div>

          <?php  }elseif($_GET['sayfa']=="alacakekle"){ ?>

                     <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">ALACAK EKLEME SAYFASI</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->





              <form action="islem.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tutar</label>
                    <input type="number" class="form-control" required id="exampleInputEmail1" name="alacak_tutar" placeholder="Tutar giriniz">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Açıklama</label>
                    <input type="text" class="form-control" required id="exampleInputEmail1" name="alacak_aciklama" placeholder="Açıklama giriniz">
                  </div>

                  <div class="form-group">
                          <label for="exampleInputEmail1">Verilen Zaman</label>
                          <input type="date" class="form-control" required id="exampleInputEmail1" name="verilen_zaman">
                        </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Alınacak Zaman</label>
                     <input type="date" class="form-control" required id="exampleInputEmail1" name="alinacak_zaman">
                  </div>




                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="alacakekle" class="btn btn-primary">Ekle</button>
                </div>
              </form>

            </div>
           <?php  }elseif($_GET['sayfa']=="departmanekle"){ ?>

                     <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">DEPARTMAN EKLEME SAYFASI</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->





              <form action="islem.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Departman Adı</label>
                    <input type="text" class="form-control" required id="exampleInputEmail1" name="departman_ad" placeholder="Departman adı giriniz">
                  </div>



                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="departmanekle" class="btn btn-primary">Ekle</button>
                </div>
              </form>

            </div>
             <?php  }elseif($_GET['sayfa']=="urunkategoriekle"){ ?>

                     <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">ÜRÜN KATEGORİ EKLEME SAYFASI</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->





              <form action="islem.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kategori Adı</label>
                    <input type="text" class="form-control" required id="exampleInputEmail1" name="kategori_ad" placeholder="Kategori adı giriniz">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Kategori Sıra</label>
                    <input type="number" class="form-control" required id="exampleInputEmail1" name="kategori_sira">
                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="urunkategoriekle" class="btn btn-primary">Ekle</button>
                </div>
              </form>

            </div>

                     <?php  }elseif($_GET['sayfa']=="urunkategoriekle"){ ?>

                     <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">ÜRÜN KATEGORİ EKLEME SAYFASI</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->





              <form action="islem.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kategori Adı</label>
                    <input type="text" class="form-control" required id="exampleInputEmail1" name="kategori_ad" placeholder="Kategori adı giriniz">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Kategori Sıra</label>
                    <input type="number" class="form-control" required id="exampleInputEmail1" name="kategori_sira">
                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="urunkategoriekle" class="btn btn-primary">Ekle</button>
                </div>
              </form>

            </div>
     <?php } if ($_GET["sayfa"]=="cariekle") {?>
           <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">CARİ EKLEME SAYFASI</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->





              <form action="islem.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Cari Ad Soyad</label>
                    <input type="text" class="form-control" required id="exampleInputEmail1" name="cari_adSoyad" placeholder="Ad soyad giriniz">
                  </div>
                     <div class="form-group">
                    <label for="exampleInputEmail1">Telefon</label>
                    <input type="text" class="form-control" maxlength="11" required id="exampleInputEmail1" name="cari_tel" placeholder="Telefon numarası giriniz">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mail</label>
                    <input type="email" class="form-control" required id="exampleInputEmail1" name="cari_mail" placeholder="Mail adresi giriniz">
                  </div>



                  <div class="form-group">
                    <label for="exampleInputEmail1">Adres</label>
                    <textarea class="form-control" name="cari_adres" placeholder="Adres giriniz"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">İl</label>
                    <input type="text" class="form-control" required id="exampleInputEmail1" name="cari_il" placeholder="Şehir giriniz">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">İlçe</label>
                    <input type="text" class="form-control" required id="exampleInputEmail1" name="cari_ilce" placeholder="İlçe giriniz">
                  </div>


                   <div class="form-group">
                    <label for="exampleInputEmail1">Şahıs/Şirket</label>
                    <select class="form-control" name="cari_mukellef">
                      <option value="0">Şahıs</option>
                      <option value="1">Şirket</option>
                    </select>
                  </div>

                       <div class="form-group">
                    <label for="exampleInputEmail1">Vergi No</label>
                    <input type="number" class="form-control"  id="exampleInputEmail1" name="cari_vergiNo" placeholder="Vergi numarası giriniz">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Vergi Dairesi</label>
                    <input type="text" class="form-control"  id="exampleInputEmail1" name="cari_vergiDairesi" placeholder="Vergi dairesi giriniz">
                  </div>



                <!-- /.card-body -->


                  <button type="submit" name="cariekle" class="btn btn-primary">Ekle</button>

              </form>

            </div>
                      <?php } if ($_GET["sayfa"]=="kargoekle") {?>
           <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">KARGO EKLEME SAYFASI</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->





              <form action="islem.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kargo Ad</label>
                    <input type="text" class="form-control" required id="exampleInputEmail1" name="kargo_ad" placeholder="Kargo adı giriniz">
                  </div>
                     <div class="form-group">
                    <label for="exampleInputEmail1">Telefon</label>
                    <input type="text" class="form-control" maxlength="11" required id="exampleInputEmail1" name="kargo_tel" placeholder="Telefon numarası giriniz">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mail</label>
                    <input type="email" class="form-control" required id="exampleInputEmail1" name="kargo_mail" placeholder="Mail adresi giriniz">
                  </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Adres</label>
                    <textarea name="kargo_adres" class="form-control"></textarea>
                  </div>








                <!-- /.card-body -->


                  <button type="submit" name="kargoekle" class="btn btn-primary">Ekle</button>

              </form>

            </div>
            <?php } if ($_GET["sayfa"]=="aracekle") {?>
           <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">ARAÇ EKLEME SAYFASI</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->





              <form action="islem.php" method="post" enctype="multipart/form-data">
                <div class="card-body">

                   <div class="form-group">
                    <label for="exampleInputEmail1">Resim</label>
                    <input type="file" class="form-control" required id="exampleInputEmail1" name="sofor_resim">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Şoför Ad Soyad</label>
                    <input type="text" class="form-control" required id="exampleInputEmail1" name="arac_sofor" placeholder="Şoför ad soyad giriniz">
                  </div>
                     <div class="form-group">
                    <label for="exampleInputEmail1">Telefon</label>
                    <input type="text" class="form-control" maxlength="11" required id="exampleInputEmail1" name="arac_tel" placeholder="Telefon numarası giriniz">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Plaka</label>
                    <input type="text" class="form-control" maxlength="8" required id="exampleInputEmail1" name="arac_plaka" placeholder="Plaka giriniz">
                  </div>



                     <div class="form-group">
                    <label for="exampleInputEmail1">Firma</label>
                    <select name="arac_firma" required  class="form-control">
                      <option>Firma Seç</option>

                      <?php

                       $kargocek = $db -> prepare("select * from kargo");
                       $kargocek -> execute();


                       while ($kargosor = $kargocek -> fetch(PDO::FETCH_ASSOC))

                     {
                        $kargo_id = $kargosor['kargo_id']
                      ?>

                      <option value="<?php echo $kargosor['kargo_id'] ?>"><?php echo $kargosor['kargo_ad'] ?></option>
                    <?php } ?>
                       </select>
                        </div>

                    <button type="submit" name="aracekle" class="btn btn-primary">Ekle</button>

              </form>

                   <?php } if ($_GET["sayfa"]=="satisekle") {?>
           <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">SATIŞ YAPMA SAYFASI</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->





              <form action="islem.php" method="post">
                <div class="card-body">

                        <div class="form-group">
                    <label for="exampleInputEmail1">Ürün</label>
                    <select name="urunsatis" required  class="form-control">
                      <option>Ürün Seç</option>

                      <?php

                       $uruncek = $db -> prepare("select * from urunler");
                       $uruncek -> execute();


                       while ($urunsor = $uruncek -> fetch(PDO::FETCH_ASSOC))

                     {
                        $urun_id = $urunsor['urun_id']
                      ?>

                      <option value="<?php echo $urunsor['urun_id'] ?>"><?php echo $urunsor['urun_ad'] ?></option>
                    <?php } ?>
                    </select>

                  </div>

                       <div class="form-group">
                    <label for="exampleInputEmail1">Personel</label>
                    <select name="personel" required  class="form-control">
                      <option>Personel Seç</option>

                      <?php

                       $personelcek = $db -> prepare("select * from personeller");
                       $personelcek -> execute();


                       while ($personelsor = $personelcek -> fetch(PDO::FETCH_ASSOC))

                     {
                        $personel_id = $personelsor['personel_id']
                      ?>

                      <option value="<?php echo $personelsor['personel_id'] ?>"><?php echo $personelsor['personel_ad_soyad'] ?></option>
                    <?php } ?>
                    </select>

                  </div>

                          <div class="form-group">
                    <label for="exampleInputEmail1">Cari</label>
                    <select name="cari" required  class="form-control">
                      <option>Cari Seç</option>

                      <?php

                       $caricek = $db -> prepare("select * from cariler");
                       $caricek -> execute();


                       while ($carisor = $caricek -> fetch(PDO::FETCH_ASSOC))

                     {
                        $cari_id = $carisor['cari_id']
                      ?>

                      <option value="<?php echo $carisor['cari_id'] ?>"><?php echo $carisor['cari_adSoyad'] ?></option>
                    <?php } ?>
                    </select>

                  </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Fiyat</label>
                    <input type="number" class="form-control" required id="exampleInputEmail1" name="satis_fiyat" placeholder="Fiyat giriniz">
                  </div>


                 <div class="form-group">
                    <label for="exampleInputEmail1">Adet</label>
                    <input type="number" class="form-control" required id="exampleInputEmail1" name="adet" placeholder="Adet giriniz">
                    </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Açıklama</label>
                    <textarea class="form-control" name="siparis_aciklama"></textarea>
                  </div>
                     <div class="form-group">
                    <label for="exampleInputEmail1">Sipariş Numarası</label>
                    <input type="text" class="form-control" maxlength="10" required id="exampleInputEmail1" name="siparis_no" placeholder="Sipariş numarası giriniz">
                  </div>




                  <div class="form-group">
                    <label for="exampleInputEmail1">Ödeme Yöntemi</label>
                    <select class="form-control" name="satis_odeme">
                      <option value="0">Nakit</option>
                      <option value="1">Kredi Kartı</option>
                    </select>
                  </div>

                    <div class="form-group">
                    <label for="exampleInputEmail1">Sipariş Durumu</label>
                    <select class="form-control" name="siparis_durum">
                      <option value="0">Ödeme Alınamadı</option>
                      <option value="1">Onaylandı</option>
                      <option value="2">Kargoda</option>
                      <option value="3">Teslim Edildi</option>
                      <option value="4">İptal Edildi</option>
                    </select>
                  </div>







                <!-- /.card-body -->


                  <button type="submit" name="satisekle" class="btn btn-success">Satış Yap</button>

              </form>

            </div>
                       <?php } if ($_GET["sayfa"]=="markaekle") {?>
           <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">MARKA EKLEME SAYFASI</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->





              <form action="islem.php" method="post">
                <div class="card-body">


                  <div class="form-group">
                    <label for="exampleInputEmail1">Marka Adı</label>
                    <input type="text" class="form-control" required id="exampleInputEmail1" name="marka_ad" placeholder="Marka adı giriniz">
                  </div>
                     <div class="form-group">
                    <label for="exampleInputEmail1">Telefon</label>
                    <input type="text" class="form-control" maxlength="11" required id="exampleInputEmail1" name="marka_tel" placeholder="Telefon numarası giriniz">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Adres</label>
                   <textarea name="marka_adres" class="form-control" placeholder="Adres giriniz"></textarea>
                  </div>





                    <button type="submit" name="markaekle" class="btn btn-primary">Ekle</button>

              </form>

                 <?php } if ($_GET["sayfa"]=="posekle") {?>
           <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">POS CİHAZI EKLEME SAYFASI</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->





              <form action="islem.php" method="post">
                <div class="card-body">


                  <div class="form-group">
                    <label for="exampleInputEmail1">Cihaz Marka</label>
                    <input type="text" class="form-control" required id="exampleInputEmail1" name="pos_marka" placeholder="Marka adı giriniz">
                  </div>
                     <div class="form-group">
                    <label for="exampleInputEmail1">Telefon</label>
                    <input type="text" class="form-control" maxlength="11" required id="exampleInputEmail1" name="pos_tel" placeholder="Telefon numarası giriniz">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Adres</label>
                   <textarea name="pos_adres" class="form-control" placeholder="Adres giriniz"></textarea>
                  </div>

                    <div class="form-group">
                    <label for="exampleInputEmail1">Terminal No</label>
                    <input type="number" class="form-control" required id="exampleInputEmail1" name="pos_terminal" placeholder="Terminal numarası giriniz">
                  </div>

                    <div class="form-group">
                    <label for="exampleInputEmail1">Seri No</label>
                    <input type="text" class="form-control" required id="exampleInputEmail1" name="pos_seri" placeholder="Seri numarası giriniz">
                  </div>





                    <button type="submit" name="posekle" class="btn btn-primary">Ekle</button>

              </form>
       <?php } if ($_GET["sayfa"]=="bankaekle") {?>
           <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">BANKA EKLEME SAYFASI</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->





              <form action="islem.php" method="post">
                <div class="card-body">


                  <div class="form-group">
                    <label for="exampleInputEmail1">Banka Ad</label>
                    <input type="text" class="form-control" maxlength="50" required id="exampleInputEmail1" name="banka_ad" placeholder="Banka adı giriniz">
                  </div>
                     <div class="form-group">
                    <label for="exampleInputEmail1">Hesap Sahibi</label>
                    <input type="text" class="form-control" maxlength="100" required id="exampleInputEmail1" name="banka_hesap_sahibi" placeholder="Hesap sahibi ad soyad giriniz">
                  </div>


                    <div class="form-group">
                    <label for="exampleInputEmail1">İban</label>
                    <input type="text" class="form-control" maxlength="26" required id="exampleInputEmail1" name="banka_iban" placeholder="İban numarası giriniz">
                  </div>







                    <button type="submit" name="bankaekle" class="btn btn-primary">Ekle</button>

              </form>



            <?php } if ($_GET["sayfa"]=="urunekle") {?>
                <div class="card card-primary">
                   <div class="card-header">
                     <h3 class="card-title">ÜRÜN EKLEME SAYFASI</h3>
                   </div>
                   <!-- /.card-header -->
                   <!-- form start -->





                   <form action="islem.php" method="post" enctype="multipart/form-data">
                     <div class="card-body">

                       <div class="form-group">
                         <label for="exampleInputEmail1">Resim Seç</label>
                         <input type="file" class="form-control"  required id="exampleInputEmail1" name="urun_resim">
                       </div>

                       <div class="form-group">
                        <label for="exampleInputEmail1">Kategori</label>
                        <select name="kategori" required  class="form-control">
                          <option>Kategori Seç</option>

                          <?php

                           $urun_kategoricek = $db -> prepare("select * from urun_kategori");
                           $urun_kategoricek -> execute();


                           while ($urun_kategorisor = $urun_kategoricek -> fetch(PDO::FETCH_ASSOC))

                         {

                          ?>

                          <option value="<?php echo $urun_kategorisor['kategori_id'] ?>"><?php echo $urun_kategorisor['kategori_ad'] ?></option>
                        <?php } ?>
                        </select>

                      </div>

                      <div class="form-group">
                       <label for="exampleInputEmail1">Marka</label>
                       <select name="urun_marka" required  class="form-control">
                         <option>Marka Seç</option>

                         <?php

                          $markacek = $db -> prepare("select * from markalar");
                          $markacek -> execute();


                          while ($markasor = $markacek -> fetch(PDO::FETCH_ASSOC))

                        {

                         ?>

                         <option value="<?php echo $markasor['marka_id'] ?>"><?php echo $markasor['marka_ad'] ?></option>
                       <?php } ?>
                       </select>

                     </div>


                       <div class="form-group">
                         <label for="exampleInputEmail1">Ürün Ad</label>
                         <input type="text" class="form-control"  required id="exampleInputEmail1" name="urun_ad" placeholder="Ürün adı giriniz">
                       </div>
                          <div class="form-group">
                         <label for="exampleInputEmail1">Fiyat</label>
                         <input type="number" class="form-control"  required id="exampleInputEmail1" name="urun_fiyat" placeholder="Fiyat giriniz">
                       </div>

                       <div class="form-group">
                      <label for="exampleInputEmail1">Stok Miktarı</label>
                      <input type="number" class="form-control"  required id="exampleInputEmail1" name="urun_stok" placeholder="Stok miktarı giriniz">
                    </div>

                    <div class="form-group">
                   <label for="exampleInputEmail1">Sıra</label>
                   <input type="number" class="form-control"  required id="exampleInputEmail1" name="urun_sira" placeholder="Sıra numarası giriniz">
                 </div>

                 <div class="form-group">
                <label for="exampleInputEmail1">Seri No</label>
                <input type="text" class="form-control" maxlength="6"  required id="exampleInputEmail1" name="seri_no" placeholder="Sıra numarası giriniz">
              </div>











                         <button type="submit" name="urunekle" class="btn btn-primary">Ekle</button>

                   </form>



                       <?php } ?>



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
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>




</script>
</body>
</html>
