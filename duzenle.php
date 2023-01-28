<?php require_once('baglan.php');



    $masrafcek = $db -> prepare("select * from masraflar where masraf_id=:masraf_id");
    $masrafcek -> execute(array("masraf_id"=>@$_GET['masraf_id']));
    $masrafsor = $masrafcek -> fetch(PDO::FETCH_ASSOC);

    $kategoricek = $db -> prepare("select * from kategoriler where kategori_id=:kategori_id");
 $kategoricek -> execute(array("kategori_id"=>@$_GET['kategori_id']));
 $kategorisor = $kategoricek -> fetch(PDO::FETCH_ASSOC);

 $odemecek = $db -> prepare("select * from odemeler inner join kategoriler on kategoriler.kategori_id=odemeler.odeme_kategori where odeme_id=:odeme_id");
 $odemecek -> execute(array("odeme_id"=>@$_GET['odeme_id']));
 $odemesor = $odemecek -> fetch(PDO::FETCH_ASSOC);


$departmancek = $db -> prepare("select * from departmanlar where departman_id=:departman_id");
 $departmancek -> execute(array("departman_id"=>@$_GET['departman_id']));
 $departmansor = $departmancek -> fetch(PDO::FETCH_ASSOC);

    $personelcek = $db -> prepare("select * from personeller inner join departmanlar on departmanlar.departman_id=personeller.departman where personel_id=:personel_id");
    $personelcek -> execute(array("personel_id"=>@$_GET['personel_id']));
    $personelsor = $personelcek -> fetch(PDO::FETCH_ASSOC);


  $borccek = $db -> prepare("select * from borclar where borc_id=:borc_id");
    $borccek -> execute(array("borc_id"=>@$_GET['borc_id']));
    $borcsor = $borccek -> fetch(PDO::FETCH_ASSOC);

      $alacakcek = $db -> prepare("select * from alacaklar where alacak_id=:alacak_id");
    $alacakcek -> execute(array("alacak_id"=>@$_GET['alacak_id']));
    $alacaksor = $alacakcek -> fetch(PDO::FETCH_ASSOC);






      $urun_kategoricek = $db -> prepare("select * from urun_kategori where kategori_id=:kategori_id");
    $urun_kategoricek -> execute(array("kategori_id"=>@$_GET['kategori_id']));
    $urun_kategorisor = $urun_kategoricek -> fetch(PDO::FETCH_ASSOC);


     $uruncek = $db -> prepare("select * from urunler inner join markalar on markalar.marka_id=urunler.urun_marka inner join urun_kategori on urun_kategori.kategori_id=urunler.kategori where urun_id=:urun_id");
    $uruncek -> execute(array("urun_id"=>@$_GET['urun_id']));
    $urunsor = $uruncek -> fetch(PDO::FETCH_ASSOC);

     $markacek = $db -> prepare("select * from markalar where marka_id=:marka_id");
    $markacek -> execute(array("marka_id"=>@$_GET['marka_id']));
    $markasor = $markacek -> fetch(PDO::FETCH_ASSOC);

    $caricek = $db -> prepare("select * from cariler where cari_id=:cari_id");
    $caricek -> execute(array("cari_id"=>@$_GET['cari_id']));
    $carisor = $caricek -> fetch(PDO::FETCH_ASSOC);

      $kargocek = $db -> prepare("select * from kargo where kargo_id=:kargo_id");
    $kargocek -> execute(array("kargo_id"=>@$_GET['kargo_id']));
    $kargosor = $kargocek -> fetch(PDO::FETCH_ASSOC);

         $araccek = $db -> prepare("select * from araclar inner join kargo on kargo.kargo_id=araclar.arac_firma where arac_id=:arac_id");
    $araccek -> execute(array("arac_id"=>@$_GET['arac_id']));
    $aracsor = $araccek -> fetch(PDO::FETCH_ASSOC);

    $satiscek = $db -> prepare("select * from satislar inner join urunler on urunler.urun_id=satislar.urunsatis inner join personeller on personeller.personel_id=satislar.personel inner join cariler on cariler.cari_id=satislar.cari where satis_id=:satis_id");
    $satiscek -> execute(array("satis_id"=>@$_GET['satis_id']));
    $satissor = $satiscek -> fetch(PDO::FETCH_ASSOC);

        $markacek = $db -> prepare("select * from markalar where marka_id=:marka_id");
    $markacek -> execute(array("marka_id"=>@$_GET['marka_id']));
    $markasor = $markacek -> fetch(PDO::FETCH_ASSOC);

     $bankacek = $db -> prepare("select * from banka where banka_id=:banka_id");
    $bankacek -> execute(array("banka_id"=>@$_GET['banka_id']));
    $bankasor = $bankacek -> fetch(PDO::FETCH_ASSOC);

         $poscek = $db -> prepare("select * from pos where pos_id=:pos_id");
    $poscek -> execute(array("pos_id"=>@$_GET['pos_id']));
    $possor = $poscek -> fetch(PDO::FETCH_ASSOC);
?>

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
            <?php if ($_GET["sayfa"]=="masrafduzenle") {?>
           <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">MASRAF DÜZENLEME SAYFASI</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->



              <form action="islem.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Başlık</label>
                    <input type="text" class="form-control" value="<?php echo $masrafsor['masraf_baslik'] ?>"  id="exampleInputEmail1" name="masraf_baslik" placeholder="Başlık giriniz">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Açıklama</label>
                    <textarea name="masraf_aciklama" class="form-control"><?php echo $masrafsor['masraf_aciklama'] ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Tutar</label>
                    <input type="number" class="form-control" value="<?php echo $masrafsor['masraf_tutar'] ?>"  id="exampleInputEmail1" name="masraf_tutar">
                  </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Zaman</label>
                    <input type="date" class="form-control" value="<?php echo $masrafsor['masraf_zaman'] ?>"  id="exampleInputEmail1" name="masraf_zaman">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="hidden" name="masraf_id" value="<?php echo $masrafsor['masraf_id'] ?>">
                  <button  type="submit" name="masrafduzenle" class="btn btn-warning">Güncelle</button>
                </div>
              </form>

            </div>

                   <?php } elseif ($_GET["sayfa"]=="odemeduzenle") {?>


          <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">ÖDEME DÜZENLEME SAYFASI</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->



              <form action="islem.php" method="post">
                <div class="card-body">


                 <div class="form-group">
                <label for="exampleInputEmail1">Kategori</label>
                  <select name="odeme_kategori" class="form-control">
                      <option value="<?php echo $odemesor['odeme_kategori'] ?>" ><?php echo $odemesor['kategori_ad'] ?></option>

                      <?php

                      $kategoricek = $db-> prepare("select * from kategoriler");
                      $kategoricek->execute();

                      while ($kategorisor = $kategoricek-> fetch(PDO::FETCH_ASSOC)) {?>
                      <option value="<?php echo $kategorisor['kategori_id'] ?>"><?php echo $kategorisor['kategori_ad'] ?></option>
                              <?php } ?>
                                      </select>

                                    </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Kime</label>
                    <input type="text" class="form-control" value="<?php echo $odemesor['odeme_kime'] ?>"  id="exampleInputEmail1" name="odeme_kime">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Tutar</label>
                    <input type="number" class="form-control" value="<?php echo $odemesor['odeme_tutar'] ?>"  id="exampleInputEmail1" name="odeme_tutar">
                  </div>



                    <div class="form-group">
                    <label for="exampleInputEmail1">Ödeme Zamanı</label>
                    <input type="date" class="form-control" value="<?php echo $odemesor['odeme_zaman'] ?>"  id="exampleInputEmail1" name="odeme_zaman">
                  </div>

                  <div class="form-group">
                  <label for="exampleInputEmail1">Durum</label>
                  <select name="odeme_durum" class="form-control">
                    <?php if ($odemesor['odeme_durum']==1) { ?>
                      <option value="1">Ödendi</option>
                    <option value="0">Ödenmedi</option>

                  <?php } elseif($odemesor['odeme_durum']==0) {?>


                      <option value="0">Ödenmedi</option>
                    <option value="1">Ödendi</option>

                  <?php } ?>

                  </select>

              </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="hidden" name="odeme_id" value="<?php echo $odemesor['odeme_id'] ?>">
                  <button  type="submit" name="odemeduzenle" class="btn btn-warning">Güncelle</button>
                </div>
              </form>

            </div>

                    <?php } elseif($_GET['sayfa']=="personelduzenle"){ ?>

                     <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">PERSONEL DÜZENLEME SAYFASI</h3>
              </div>



              <form action="islem.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Yüklü Resim</label>
                    <img width="200" src="<?php echo $personelsor['personel_resim'] ?>">
                  </div>
                     <div class="form-group">
                    <label for="exampleInputEmail1">Reçim Seç</label>
                    <input type="file" class="form-control" value="<?php echo $personelsor['personel_resim'] ?>"  id="exampleInputEmail1" name="personel_resim">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ad Soyad</label>
                    <input type="text" class="form-control" value="<?php echo $personelsor['personel_ad_soyad'] ?>"  id="exampleInputEmail1" name="personel_ad_soyad" placeholder="Başlık giriniz">
                  </div>


                   <div class="form-group">
                    <label for="exampleInputEmail1">Departman</label>
                    <select name="departman" class="form-control">
                      <option value="<?php echo $personelsor['departman'] ?>" ><?php echo $personelsor['departman_ad'] ?></option>

                    <?php    $departmancek = $db -> prepare("select * from departmanlar");
                            $departmancek -> execute();
     while ($departmansor = $departmancek-> fetch(PDO::FETCH_ASSOC)) {?>
                      <option value="<?php echo $departmansor['departman_id'] ?>"><?php echo $departmansor['departman_ad'] ?></option>
            <?php } ?>
                    </select>

                  </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Maaş</label>
                    <input type="number" class="form-control" value="<?php echo $personelsor['personel_maas'] ?>"  id="exampleInputEmail1" name="personel_maas">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Adres</label>
                    <textarea name="personel_adres" class="form-control"><?php echo $personelsor['personel_adres'] ?></textarea>
                  </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Telefon</label>
                    <input type="text" class="form-control" maxlength="11" value="<?php echo $personelsor['personel_tel'] ?>"  id="exampleInputEmail1" name="personel_tel">
                  </div>



                    <div class="form-group">
                    <label for="exampleInputEmail1">Durum</label>
                    <select name="durum" class="form-control">
                      <?php if ($personelsor['durum']==1) { ?>
                        <option value="1">Aktif</option>
                      <option value="0">İzinli</option>
                      <option value="2">Yıllık İzinde</option>
                      <option value="3">Hasta</option>

                    <?php } elseif($personelsor['durum']==0) {?>

                      <option value="0">İzinli</option>
                      <option value="1">Aktif</option>

                    <option value="2">Yıllık İzinde</option>
                    <option value="3">Hasta</option>

                  <?php } elseif($personelsor['durum']==2) {?>
                    <option value="2">Yıllık İzinde</option>
                      <option value="0">İzinli</option>
                      <option value="1">Aktif</option>


                    <option value="3">Hasta</option>

                  <?php }elseif($personelsor['durum']==3) {?>
                    <option value="3">Hasta</option>
                      <option value="0">İzinli</option>
                      <option value="1">Aktif</option>

                    <option value="2">Yıllık İzinde</option>


                    <?php }?>

                    </select>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="hidden" name="personel_id" value="<?php echo $personelsor['personel_id'] ?>">
                  <button  type="submit" name="personelduzenle" class="btn btn-warning">Güncelle</button>
                </div>
              </form>

            </div>
             <?php } elseif($_GET['sayfa']=="borcduzenle"){ ?>
             <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">BORÇ DÜZENLEME SAYFASI</h3>
              </div>



              <form action="islem.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tutar</label>
                    <input type="number" class="form-control" value="<?php echo $borcsor['borc_tutar'] ?>"  id="exampleInputEmail1" name="borc_tutar" >
                  </div>




                   <div class="form-group">
                    <label for="exampleInputEmail1">Açıklama</label>
                    <input type="text" class="form-control" value="<?php echo $borcsor['borc_aciklama'] ?>"  id="exampleInputEmail1" name="borc_aciklama">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Alınan Zaman</label>
                    <input type="date" class="form-control" value="<?php echo $borcsor['alinan_zaman'] ?>"  id="exampleInputEmail1" name="alinan_zaman"></div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Ödenecek Zaman</label>
                    <input type="date" class="form-control" value="<?php echo $borcsor['verilecek_zaman'] ?>"  id="exampleInputEmail1" name="verilecek_zaman">
                  </div>



                    <div class="form-group">
                    <label for="exampleInputEmail1">Durum</label>
                    <select name="durum" class="form-control">
                      <?php if ($borcsor['durum']==1) { ?>
                        <option value="1">Ödendi</option>
                      <option value="0">Ödenmedi</option>

                    <?php } elseif($borcsor['durum']==0) {?>


                        <option value="0">Ödenmedi</option>
                      <option value="1">Ödendi</option>




                    <?php } ?>

                    </select>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="hidden" name="borc_id" value="<?php echo $borcsor['borc_id'] ?>">
                  <button  type="submit" name="borcduzenle" class="btn btn-warning">Güncelle</button>
                </div>
              </form>

            </div>
            <?php } elseif($_GET['sayfa']=="alacakduzenle"){ ?>
             <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">ALACAK DÜZENLEME SAYFASI</h3>
              </div>



              <form action="islem.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tutar</label>
                    <input type="number" class="form-control" value="<?php echo $alacaksor['alacak_tutar'] ?>"  id="exampleInputEmail1" name="alacak_tutar" >
                  </div>




                   <div class="form-group">
                    <label for="exampleInputEmail1">Açıklama</label>
                    <input type="text" class="form-control" value="<?php echo $alacaksor['alacak_aciklama'] ?>"  id="exampleInputEmail1" name="alacak_aciklama">
                  </div>

                  <div class="form-group">
                   <label for="exampleInputEmail1">Verilen Zaman</label>
                   <input type="date" class="form-control" value="<?php echo $alacaksor['verilen_zaman'] ?>"  id="exampleInputEmail1" name="verilen_zaman">
                 </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Alınacak Zaman</label>
                    <input type="date" class="form-control" value="<?php echo $alacaksor['alinacak_zaman'] ?>"  id="exampleInputEmail1" name="alinacak_zaman"></div>





                    <div class="form-group">
                    <label for="exampleInputEmail1">Durum</label>
                    <select name="durum" class="form-control">
                      <?php if ($alacaksor['durum']==1) { ?>
                        <option value="1">Ödendi</option>
                      <option value="0">Ödenmedi</option>

                    <?php } elseif($alacaksor['durum']==0) {?>


                        <option value="0">Ödenmedi</option>
                      <option value="1">Ödendi</option>
                        <?php } ?>

                    </select>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="hidden" name="alacak_id" value="<?php echo $alacaksor['alacak_id'] ?>">
                  <button  type="submit" name="alacakduzenle" class="btn btn-warning">Güncelle</button>
                </div>
              </form>

            </div>

            <?php } elseif($_GET['sayfa']=="kategoriduzenle"){ ?>
             <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">KATEGORİ DÜZENLEME SAYFASI</h3>
              </div>



              <form action="islem.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kategori Adı</label>
                    <input type="text" class="form-control" value="<?php echo $kategorisor['kategori_ad'] ?>"  id="exampleInputEmail1" name="kategori_ad" >
                  </div>




                   <div class="form-group">
                    <label for="exampleInputEmail1">Sıra</label>
                    <input type="text" class="form-control" value="<?php echo $kategorisor['kategori_sira'] ?>"  id="exampleInputEmail1" name="kategori_sira">
                  </div>







                <div class="card-footer">
                  <input type="hidden" name="kategori_id" value="<?php echo $kategorisor['kategori_id'] ?>">
                  <button  type="submit" name="kategoriduzenle" class="btn btn-warning">Güncelle</button>
                </div>
              </form>

            </div>
          <?php  }elseif($_GET['sayfa']=="departmanduzenle"){ ?>

                     <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">DEPARTMAN DÜZENLEME SAYFASI</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->





              <form action="islem.php" method="post">
                <div class="card-body">
                 <div class="form-group">
                    <label for="exampleInputEmail1">Departman Adı</label>
                    <input type="text" class="form-control" value="<?php echo $departmansor['departman_ad'] ?>"  id="exampleInputEmail1" name="departman_ad">
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="hidden" name="departman_id" value="<?php echo $departmansor['departman_id'] ?>">
                  <button  type="submit" name="departmanduzenle" class="btn btn-warning">Güncelle</button>
                </div>
              </form>

            </div>
            <?php  }elseif($_GET['sayfa']=="urunkategoriduzenle"){ ?>

                     <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">ÜRÜN KATEGORİ DÜZENLEME SAYFASI</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->





              <form action="islem.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kategori Adı</label>
                    <input type="text" class="form-control" required id="exampleInputEmail1" name="kategori_ad" value="<?php echo $urun_kategorisor['kategori_ad'] ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Kategori Sıra</label>
                    <input type="number" class="form-control" required id="exampleInputEmail1" name="kategori_sira" value="<?php echo $urun_kategorisor['kategori_sira'] ?>">
                  </div>

                         <div class="form-group">
                    <label for="exampleInputEmail1">Durum</label>
                    <select name="kategori_durum" class="form-control">
                      <?php if ($urun_kategorisor['kategori_durum']==1) { ?>
                        <option value="1">Aktif</option>
                      <option value="0">Pasif</option>

                    <?php } elseif($urun_kategorisor['kategori_durum']==0) {?>


                        <option value="0">Pasif</option>
                      <option value="1">Aktif</option>

                    <?php } ?>

                    </select>

                </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                   <input type="hidden" name="kategori_id" value="<?php echo $urun_kategorisor['kategori_id'] ?>">
                  <button type="submit" name="urunkategoriduzenle" class="btn btn-warning">Düzenle</button>
                </div>
              </form>

            </div>
         <?php  }elseif($_GET['sayfa']=="urunduzenle"){ ?>

                     <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">ÜRÜN DÜZENLEME SAYFASI</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->





              <form action="islem.php" method="post" enctype="multipart/form-data">
                <div class="card-body">

                   <div class="form-group">
                    <label for="exampleInputEmail1">Yüklü Resim</label>
                    <img width="200" src="<?php echo $urunsor['urun_resim'] ?>">
                  </div>

                    <div class="form-group">
                    <label for="exampleInputEmail1">Resim</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" name="urun_resim" value="<?php echo $urunsor['urun_resim'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ürün Adı</label>
                    <input type="text" class="form-control" required id="exampleInputEmail1" name="urun_ad" value="<?php echo $urunsor['urun_ad'] ?>">
                  </div>



                           <div class="form-group">
                    <label for="exampleInputEmail1">Marka</label>
                    <select name="urun_marka" class="form-control">
                      <option value="<?php echo $urunsor['urun_marka'] ?>" ><?php echo $urunsor['marka_ad'] ?></option>

                    <?php

                      $markacek = $db-> prepare("select * from markalar");
                      $markacek->execute();

                     while ($markasor = $markacek-> fetch(PDO::FETCH_ASSOC)) {?>
                      <option value="<?php echo $markasor['marka_id'] ?>"><?php echo $markasor['marka_ad'] ?></option>
            <?php } ?>
                    </select>

                  </div>

                           <div class="form-group">
                    <label for="exampleInputEmail1">Kategori</label>
                    <select name="kategori" class="form-control">
                      <option value="<?php echo $urunsor['kategori'] ?>" ><?php echo $urunsor['kategori_ad'] ?></option>

                    <?php

                      $urun_kategoricek = $db -> prepare("select * from urun_kategori");
                      $urun_kategoricek -> execute();

                     while ($urun_kategorisor = $urun_kategoricek-> fetch(PDO::FETCH_ASSOC)) {?>
                      <option value="<?php echo $urun_kategorisor['kategori_id'] ?>"><?php echo $urun_kategorisor['kategori_ad'] ?></option>
            <?php } ?>
                    </select>

                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Seri No</label>
                    <input type="text" class="form-control" required id="exampleInputEmail1" maxlength="6" name="seri_no" value="<?php echo $urunsor['seri_no'] ?>">
                  </div>

                     <div class="form-group">
                    <label for="exampleInputEmail1">Fiyat</label>
                    <input type="number" class="form-control" required id="exampleInputEmail1" name="urun_fiyat" value="<?php echo $urunsor['urun_fiyat'] ?>">
                  </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Stok</label>
                    <input type="number" class="form-control" required id="exampleInputEmail1" name="urun_stok" value="<?php echo $urunsor['urun_stok'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sıra</label>
                    <input type="number" class="form-control" required id="exampleInputEmail1" name="urun_sira" value="<?php echo $urunsor['urun_sira'] ?>">
                  </div>

                    <div class="form-group">
                    <label for="exampleInputEmail1">Arıza Açıklama</label>
                    <textarea name="urun_aciklama" class="form-control"><?php echo $urunsor['urun_aciklama'] ?></textarea>
                  </div>



                         <div class="form-group">
                    <label for="exampleInputEmail1">Durum</label>
                    <select name="urun_durum" class="form-control">
                      <?php if ($urunsor['urun_durum']==1) { ?>
                        <option value="1">Aktif</option>
                      <option value="0">Pasif</option>
                      <option value="2">Arızalı</option>
                    <?php } elseif($urunsor['urun_durum']==0) {?>


                        <option value="0">Pasif</option>
                      <option value="1">Aktif</option>
                      <option value="2">Arızalı</option>
                     <?php } elseif($urunsor['urun_durum']==2) {?>

                      <option value="2">Arızalı</option>
                        <option value="0">Pasif</option>
                      <option value="1">Aktif</option>

                     <?php }?>

                    </select>

                </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                   <input type="hidden" name="urun_id" value="<?php echo $urunsor['urun_id'] ?>">
                  <button type="submit" name="urunduzenle" class="btn btn-warning">Düzenle</button>
                </div>
              </form>

            </div>
         <?php  }elseif($_GET['sayfa']=="cariduzenle"){ ?>

                     <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">CARİ DÜZENLEME SAYFASI</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->





              <form action="islem.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ad Soyad</label>
                    <input type="text" class="form-control" required id="exampleInputEmail1" name="cari_adSoyad" value="<?php echo $carisor['cari_adSoyad'] ?>">
                  </div>



                  <div class="form-group">
                    <label for="exampleInputEmail1">Mail</label>
                    <input type="email" class="form-control" required id="exampleInputEmail1" name="cari_mail" value="<?php echo $carisor['cari_mail'] ?>">
                  </div>

                     <div class="form-group">
                    <label for="exampleInputEmail1">Telefon</label>
                    <input type="text" class="form-control" maxlength="11" required id="exampleInputEmail1" name="cari_tel" value="<?php echo $carisor['cari_tel'] ?>">
                  </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Vergi Numarası</label>
                    <input type="number" class="form-control"  id="exampleInputEmail1" name="cari_vergiNo" value="<?php echo $carisor['cari_vergiNo'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Vergi Dairesi</label>
                    <input type="text" class="form-control"  id="exampleInputEmail1" name="cari_vergiDairesi" value="<?php echo $carisor['cari_vergiDairesi'] ?>">
                  </div>

                     <div class="form-group">
                    <label for="exampleInputEmail1">İl</label>
                    <input type="text" class="form-control" required id="exampleInputEmail1" name="cari_il" value="<?php echo $carisor['cari_il'] ?>">
                  </div>

                     <div class="form-group">
                    <label for="exampleInputEmail1">İlçe</label>
                    <input type="text" class="form-control" required id="exampleInputEmail1" name="cari_ilce" value="<?php echo $carisor['cari_ilce'] ?>">
                  </div>

                     <div class="form-group">
                    <label for="exampleInputEmail1">Adres</label>
                    <textarea name="cari_adres" class="form-control"><?php echo $carisor['cari_adres'] ?></textarea>
                  </div>

                           <div class="form-group">
                    <label for="exampleInputEmail1">Şahıs/Şirket</label>
                    <select name="cari_mukellef" class="form-control">
                      <?php if ($carisor['cari_mukellef']==1) { ?>
                        <option value="1">Şirket</option>
                      <option value="0">Şahıs</option>

                    <?php } elseif($carisor['cari_mukellef']==0) {?>


                        <option value="0">Şahıs</option>
                      <option value="1">Şirket</option>

                     <?php } ?>

                    </select>

                </div>

                         <div class="form-group">
                    <label for="exampleInputEmail1">Durum</label>
                    <select name="cari_durum" class="form-control">
                      <?php if ($carisor['cari_durum']==1) { ?>
                        <option value="1">Aktif</option>
                      <option value="0">Pasif</option>

                    <?php } elseif($carisor['cari_durum']==0) {?>


                        <option value="0">Pasif</option>
                      <option value="1">Aktif</option>

                     <?php } ?>

                    </select>

                </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                   <input type="hidden" name="cari_id" value="<?php echo $carisor['cari_id'] ?>">
                  <button type="submit" name="cariduzenle" class="btn btn-warning">Düzenle</button>
                </div>
              </form>

            </div>
         <?php  }elseif($_GET['sayfa']=="kargoduzenle"){ ?>

                     <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">KARGO DÜZENLEME SAYFASI</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->





              <form action="islem.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kargo Adı</label>
                    <input type="text" class="form-control" required id="exampleInputEmail1" name="kargo_ad" value="<?php echo $kargosor['kargo_ad'] ?>">
                  </div>



                  <div class="form-group">
                    <label for="exampleInputEmail1">Mail</label>
                    <input type="email" class="form-control" required id="exampleInputEmail1" name="kargo_mail" value="<?php echo $kargosor['kargo_mail'] ?>">
                  </div>

                     <div class="form-group">
                    <label for="exampleInputEmail1">Telefon</label>
                    <input type="text" class="form-control" required maxlength="11" id="exampleInputEmail1" name="kargo_tel" value="<?php echo $kargosor['kargo_tel'] ?>">
                  </div>




                     <div class="form-group">
                    <label for="exampleInputEmail1">Adres</label>
                    <input type="text" class="form-control" required id="exampleInputEmail1" name="kargo_adres" value="<?php echo $kargosor['kargo_adres'] ?>">
                  </div>



                         <div class="form-group">
                    <label for="exampleInputEmail1">Durum</label>
                    <select name="kargo_durum" class="form-control">
                      <?php if ($kargosor['kargo_durum']==1) { ?>
                        <option value="1">Aktif</option>
                      <option value="0">Pasif</option>

                    <?php } elseif($kargosor['kargo_durum']==0) {?>


                        <option value="0">Pasif</option>
                      <option value="1">Aktif</option>

                     <?php } ?>

                    </select>

                </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                   <input type="hidden" name="kargo_id" value="<?php echo $kargosor['kargo_id'] ?>">
                  <button type="submit" name="kargoduzenle" class="btn btn-warning">Düzenle</button>
                </div>
              </form>

            </div>
           <?php  }elseif($_GET['sayfa']=="aracduzenle"){ ?>

                     <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">ARAÇ DÜZENLEME SAYFASI</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->





              <form action="islem.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Yüklü Resim</label>
                    <img width="200" src="<?php echo $aracsor['sofor_resim'] ?>">
                  </div>


                    <div class="form-group">
                    <label for="exampleInputEmail1">Resim</label>
                    <input type="file" class="form-control"  id="exampleInputEmail1" name="sofor_resim" value="<?php echo $aracsor['sofor_resim'] ?>">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Şoför Ad Soyad</label>
                    <input type="text" class="form-control"  id="exampleInputEmail1" name="arac_sofor" value="<?php echo $aracsor['arac_sofor'] ?>">
                  </div>


                   <div class="form-group">
                    <label for="exampleInputEmail1">Firma</label>
                    <select name="arac_firma" class="form-control">
                      <option value="<?php echo $aracsor['arac_firma'] ?>" ><?php echo $aracsor['kargo_ad'] ?></option>

                    <?php    $kargocek = $db -> prepare("select * from kargo");
                            $kargocek -> execute();
                           while ($kargosor = $kargocek-> fetch(PDO::FETCH_ASSOC)) {?>
                      <option value="<?php echo $kargosor['kargo_id'] ?>"><?php echo $kargosor['kargo_ad'] ?></option>
            <?php } ?>
                    </select>

                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Telefon</label>
                    <input type="text" class="form-control" maxlength="11"  id="exampleInputEmail1" name="arac_tel" value="<?php echo $aracsor['arac_tel'] ?>">
                  </div>

                     <div class="form-group">
                    <label for="exampleInputEmail1">Plaka</label>
                    <input type="text" class="form-control"maxlength="8"   id="exampleInputEmail1" name="arac_plaka" value="<?php echo $aracsor['arac_plaka'] ?>">
                  </div>





                         <div class="form-group">
                    <label for="exampleInputEmail1">Durum</label>
                    <select name="arac_durum" class="form-control">
                      <?php if ($aracsor['arac_durum']==0) { ?>
                        <option value="0">Araç Boşta</option>
                      <option value="1">Yola Çıktı</option>
                      <option value="2">Teslim Edildi</option>
                      <option value="3">Arızalı Araç</option>

                    <?php } elseif($aracsor['arac_durum']==1) {?>
                        <option value="1">Yola Çıktı</option>
                      <option value="0">Araç Boşta</option>

                      <option value="2">Teslim Edildi</option>
                      <option value="3">Arızalı Araç</option>

                     <?php }
                     elseif($aracsor['arac_durum']==2) {?>

                       <option value="2">Teslim Edildi</option>
                       <option value="0">Araç Boşta</option>
                      <option value="1">Yola Çıktı</option>

                      <option value="3">Arızalı Araç</option>

                     <?php }
                     elseif($aracsor['arac_durum']==3) {?>
                         <option value="3">Arızalı Araç</option>
                      <option value="0">Araç Boşta</option>
                      <option value="1">Yola Çıktı</option>
                      <option value="2">Teslim Edildi</option>


                     <?php }?>

                    </select>

                </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                   <input type="hidden" name="arac_id" value="<?php echo $aracsor['arac_id'] ?>">
                  <button type="submit" name="aracduzenle" class="btn btn-warning">Düzenle</button>
                </div>
              </form>

            </div>
         <?php  }elseif($_GET['sayfa']=="satisduzenle"){ ?>

                     <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">SATIŞ DÜZENLEME SAYFASI</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->





              <form action="islem.php" method="post">
                <div class="card-body">
                  <div class="form-group">
               <label for="exampleInputEmail1">Ürün</label>
               <select name="urunsatis" class="form-control">
                 <option value="<?php echo $satissor['urunsatis'] ?>" ><?php echo $satissor['urun_ad'] ?></option>

               <?php    $uruncek = $db -> prepare("select * from urunler");
                       $uruncek -> execute();
                      while ($urunsor = $uruncek-> fetch(PDO::FETCH_ASSOC)) {?>
                 <option value="<?php echo $urunsor['urun_id'] ?>"><?php echo $urunsor['urun_ad'] ?></option>
       <?php } ?>
               </select>

             </div>



                       <div class="form-group">
                    <label for="exampleInputEmail1">Personel</label>
                    <select name="personel" class="form-control">
                      <option value="<?php echo $satissor['personel'] ?>" ><?php echo $satissor['personel_ad_soyad'] ?></option>

                    <?php    $personelcek = $db -> prepare("select * from personeller");
                            $personelcek -> execute();
                           while ($personelsor = $personelcek-> fetch(PDO::FETCH_ASSOC)) {?>
                      <option value="<?php echo $personelsor['personel_id'] ?>"><?php echo $personelsor['personel_ad_soyad'] ?></option>
            <?php } ?>
                    </select>

                  </div>


                       <div class="form-group">
                    <label for="exampleInputEmail1">Cari</label>
                    <select name="cari" class="form-control">
                      <option value="<?php echo $satissor['cari'] ?>" ><?php echo $satissor['cari_adSoyad'] ?></option>

                    <?php    $caricek = $db -> prepare("select * from cariler");
                            $caricek -> execute();
                           while ($carisor = $caricek-> fetch(PDO::FETCH_ASSOC)) {?>
                      <option value="<?php echo $carisor['cari_id'] ?>"><?php echo $carisor['cari_adSoyad'] ?></option>
            <?php } ?>
                    </select>

                  </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Açıklama</label>
                    <textarea name="siparis_aciklama" class="form-control"><?php echo $satissor['siparis_aciklama'] ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sipariş No</label>
                    <input type="text" class="form-control" maxlength="10" required id="exampleInputEmail1" name="siparis_no" value="<?php echo $satissor['siparis_no'] ?>">
                  </div>

                     <div class="form-group">
                    <label for="exampleInputEmail1">Fiyat</label>
                    <input type="number" class="form-control" required id="exampleInputEmail1" name="satis_fiyat" value="<?php echo $satissor['satis_fiyat'] ?>">
                  </div>

                  <div class="form-group">
                 <label for="exampleInputEmail1">Adet</label>
                 <input type="number" class="form-control" required id="exampleInputEmail1" name="adet" value="<?php echo $satissor['adet'] ?>">
               </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Sipariş Durum</label>
                    <select name="siparis_durum" class="form-control">
                      <?php if ($satissor['siparis_durum']==0) { ?>
                      <option value="0">Ödeme Bekleniyor</option>
                      <option value="1">Onaylandı</option>
                      <option value="2">Kargoda</option>
                      <option value="3">Teslim Edildi</option>
                      <option value="4">İptal Edildi</option>

                    <?php } elseif($satissor['siparis_durum']==1) {?>
                      <option value="1">Onaylandı</option>
                      <option value="0">Ödeme Bekleniyor</option>

                      <option value="2">Kargoda</option>
                      <option value="3">Teslim Edildi</option>
                      <option value="4">İptal Edildi</option>
                     <?php }
                     elseif($satissor['siparis_durum']==2) {?>
                      <option value="2">Kargoda</option>
                      <option value="0">Ödeme Bekleniyor</option>
                      <option value="1">Onaylandı</option>

                      <option value="3">Teslim Edildi</option>
                      <option value="4">İptal Edildi</option>
                     <?php }
                     elseif($satissor['siparis_durum']==3) {?>
                      <option value="3">Teslim Edildi</option>
                     <option value="0">Ödeme Bekleniyor</option>
                      <option value="1">Onaylandı</option>
                      <option value="2">Kargoda</option>

                      <option value="4">İptal Edildi</option>

                     <?php }elseif($satissor['siparis_durum']==4) {?>
                      <option value="4">İptal Edildi</option>
                      <option value="0">Ödeme Bekleniyor</option>
                      <option value="1">Onaylandı</option>
                      <option value="2">Kargoda</option>
                      <option value="3">Teslim Edildi</option>


                     <?php }?>

                    </select>

                </div>




                         <div class="form-group">
                    <label for="exampleInputEmail1">Ödeme Yöntemi</label>
                    <select name="satis_odeme" class="form-control">
                      <?php if ($satissor['satis_odeme']==1) { ?>
                        <option value="1">Kredi Kartı</option>
                      <option value="0">Nakit</option>

                    <?php } elseif($satissor['satis_odeme']==0) {?>


                        <option value="0">Nakit</option>
                      <option value="1">Kredi Kartı</option>

                     <?php } ?>

                    </select>

                </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="hidden" name="satis_id" value="<?php echo $satissor['satis_id'] ?>">
                  <button  type="submit" name="satisduzenle" class="btn btn-warning">Güncelle</button>
                </div>
              </form>

            </div>
      <?php  }elseif($_GET['sayfa']=="markaduzenle"){ ?>

                     <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">MARKA DÜZENLEME SAYFASI</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->





              <form action="islem.php" method="post">
                <div class="card-body">
                 <div class="form-group">
                    <label for="exampleInputEmail1">Marka Adı</label>
                    <input type="text" class="form-control" value="<?php echo $markasor['marka_ad'] ?>"  id="exampleInputEmail1" name="marka_ad">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Telefon</label>
                    <input type="text" class="form-control" maxlength="11" value="<?php echo $markasor['marka_tel'] ?>"  id="exampleInputEmail1" name="marka_tel">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Adres</label>
                    <textarea name="marka_adres" class="form-control"><?php echo $markasor['marka_adres'] ?></textarea>
                  </div>


                    <div class="form-group">
                    <label for="exampleInputEmail1">Durum</label>
                    <select name="marka_durum" class="form-control">
                      <?php if ($markasor['marka_durum']==1) { ?>
                        <option value="1">Aktif</option>
                      <option value="0">Pasif</option>

                    <?php } elseif($markasor['marka_durum']==0) {?>


                        <option value="0">Pasif</option>
                      <option value="1">Aktif</option>

                    <?php } ?>

                    </select>

                </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="hidden" name="marka_id" value="<?php echo $markasor['marka_id'] ?>">
                  <button  type="submit" name="markaduzenle" class="btn btn-warning">Güncelle</button>
                </div>
              </form>

            </div>
             <?php  }elseif($_GET['sayfa']=="bankaduzenle"){ ?>

                     <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">BANKA DÜZENLEME SAYFASI</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->





              <form action="islem.php" method="post">
                <div class="card-body">
                 <div class="form-group">
                    <label for="exampleInputEmail1">Banka Adı</label>
                    <input type="text" class="form-control" value="<?php echo $bankasor['banka_ad'] ?>"  id="exampleInputEmail1" name="banka_ad">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Hesap Sahibi</label>
                    <input type="text" class="form-control" value="<?php echo $bankasor['banka_hesap_sahibi'] ?>"  id="exampleInputEmail1" name="banka_hesap_sahibi">
                  </div>



                  <div class="form-group">
                    <label for="exampleInputEmail1">İban</label>
                    <input type="text" class="form-control" maxlength="26" value="<?php echo $bankasor['banka_iban'] ?>"  id="exampleInputEmail1" name="banka_iban">
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="hidden" name="banka_id" value="<?php echo $bankasor['banka_id'] ?>">
                  <button  type="submit" name="bankaduzenle" class="btn btn-warning">Güncelle</button>
                </div>
              </form>

            </div>
            <?php  }elseif($_GET['sayfa']=="posduzenle"){ ?>

                     <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">POS CİHAZI DÜZENLEME SAYFASI</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->





              <form action="islem.php" method="post">
                <div class="card-body">
                 <div class="form-group">
                    <label for="exampleInputEmail1">Cihaz Markası</label>
                    <input type="text" class="form-control" value="<?php echo $possor['pos_marka'] ?>"  id="exampleInputEmail1" name="pos_marka">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Telefon</label>
                    <input type="text" class="form-control" maxlength="11" value="<?php echo $possor['pos_tel'] ?>"  id="exampleInputEmail1" name="pos_tel">
                  </div>



                  <div class="form-group">
                    <label for="exampleInputEmail1">Terminal No</label>
                    <input type="number" class="form-control" value="<?php echo $possor['pos_terminal'] ?>"  id="exampleInputEmail1" name="pos_terminal">
                  </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Seri No</label>
                    <input type="text" class="form-control" value="<?php echo $possor['pos_seri'] ?>"  id="exampleInputEmail1" name="pos_seri">
                  </div>

                     <div class="form-group">
                    <label for="exampleInputEmail1">Arıza Detayı</label>
                    <textarea name="pos_aciklama" class="form-control"><?php echo $possor['pos_aciklama'] ?></textarea>
                  </div>


                          <div class="form-group">
                    <label for="exampleInputEmail1">Durum</label>
                    <select name="pos_durum" class="form-control">
                      <?php if ($possor['pos_durum']==1) { ?>
                        <option value="1">Aktif</option>
                      <option value="0">Arızalı</option>

                    <?php } elseif($possor['pos_durum']==0) {?>


                        <option value="0">Arızalı</option>
                      <option value="1">Aktif</option>

                    <?php } ?>

                    </select>

                </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="hidden" name="pos_id" value="<?php echo $possor['pos_id'] ?>">
                  <button  type="submit" name="posduzenle" class="btn btn-warning">Güncelle</button>
                </div>
              </form>

            </div>
           <?php } ?>
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
