<?php

ob_start();
session_start();
require_once 'baglan.php';



if (isset($_POST['masrafekle'])) {

	$ekle = $db -> prepare("insert into masraflar set masraf_baslik=:masraf_baslik,  masraf_aciklama=:masraf_aciklama, masraf_tutar=:masraf_tutar, masraf_zaman=:masraf_zaman");

	$kaydet = $ekle -> execute(array(
		'masraf_baslik'=>htmlspecialchars($_POST['masraf_baslik']),
		'masraf_aciklama'=>htmlspecialchars($_POST['masraf_aciklama']),
		'masraf_tutar'=>htmlspecialchars($_POST['masraf_tutar']),
		'masraf_zaman'=>htmlspecialchars($_POST['masraf_zaman'])

	));

	if ($kaydet) {
		header("location:masraflar.php?masrafdurum=masrafeklendi");

	}else{
		header("location:sayfa.php?sayfa=masrafekle");

	}


}

if (isset($_POST['masrafduzenle'])) {
	$masraf_id = htmlspecialchars($_POST['masraf_id']);
	$guncelle = $db -> prepare("update masraflar set masraf_baslik=:masraf_baslik,  masraf_aciklama=:masraf_aciklama, masraf_tutar=:masraf_tutar, masraf_zaman=:masraf_zaman where masraf_id=$masraf_id");

	$update = $guncelle -> execute(array(
		'masraf_baslik'=>htmlspecialchars($_POST['masraf_baslik']),
		'masraf_aciklama'=>htmlspecialchars($_POST['masraf_aciklama']),
		'masraf_tutar'=>htmlspecialchars($_POST['masraf_tutar']),
		'masraf_zaman'=>htmlspecialchars($_POST['masraf_zaman'])

	));

	if ($update) {
		header("location:masraflar.php?masrafdurum=masrafguncellendi");

	}else{
		header("location:masraflar.php");
	}


}

if (isset($_GET['masraf_id'])) {
	$masraf_id = $_GET['masraf_id'];
	$del = $db -> prepare("DELETE from masraflar where masraf_id = ?");

	$del -> execute(array($masraf_id));

	if ($del) {
		header("Refresh:1; url=masraflar.php?silindi");

	}else{
		header("location:masraflar.php");
	}


}


if (isset($_POST['odemeekle'])) {

	$ekle = $db -> prepare("insert into odemeler set odeme_kategori=:odeme_kategori, odeme_tutar=:odeme_tutar, odeme_zaman=:odeme_zaman, odeme_kime=:odeme_kime, odeme_durum=:odeme_durum");

	$kaydet = $ekle -> execute(array(
		'odeme_kategori'=>htmlspecialchars($_POST['odeme_kategori']),
		'odeme_kime'=>htmlspecialchars($_POST['odeme_kime']),
		'odeme_tutar'=>htmlspecialchars($_POST['odeme_tutar']),
		'odeme_zaman'=>htmlspecialchars($_POST['odeme_zaman']),
		'odeme_durum'=>htmlspecialchars($_POST['odeme_durum'])


	));

 	if ($kaydet) {
		header("location:odemeler.php?odemedurum=odemeeklendi");

	}else{
		header("location:odemeler.php");
	}


}

if (isset($_POST['odemeduzenle'])) {
	$odeme_id = htmlspecialchars($_POST['odeme_id']);
	$ekle = $db -> prepare("update odemeler set odeme_kategori=:odeme_kategori, odeme_tutar=:odeme_tutar, odeme_zaman=:odeme_zaman, odeme_kime=:odeme_kime, odeme_durum=:odeme_durum where odeme_id=$odeme_id");

	$kaydet = $ekle -> execute(array(
	'odeme_kategori'=>htmlspecialchars($_POST['odeme_kategori']),
		'odeme_kime'=>htmlspecialchars($_POST['odeme_kime']),
		'odeme_tutar'=>htmlspecialchars($_POST['odeme_tutar']),
		'odeme_zaman'=>htmlspecialchars($_POST['odeme_zaman']),
		'odeme_durum'=>htmlspecialchars($_POST['odeme_durum'])


	));

 	if ($kaydet) {
		header("location:odemeler.php?odemedurum=odemeguncellendi");

	}else{
		header("location::odemeler.php");
	}


}

if (isset($_GET['odeme_id'])) {
	$odeme_id = $_GET['odeme_id'];
	$del = $db -> prepare("DELETE from odemeler where odeme_id = ?");

	$del -> execute(array($odeme_id));

	if ($del) {
		header("Refresh:1; url=odemeler.php?silindi");

	}else{
		header("location::odemeler.php");
	}


}


if (isset($_POST['personelekle'])) {
	if (!file_exists('resimler')) {
		mkdir('resimler');
	}
		$dizin ="resimler/";
		$yuklenecekResim = $dizin.$_FILES['personel_resim']['name'];

		if (move_uploaded_file($_FILES['personel_resim']['tmp_name'], $yuklenecekResim)) {
		}else{
			echo $_FILES['personel_resim']['error'];
		}

	$ekle = $db -> prepare("insert into personeller set personel_ad_soyad=:personel_ad_soyad,  personel_maas=:personel_maas, personel_resim=:personel_resim, departman=:departman, personel_adres=:personel_adres, personel_tel=:personel_tel");

	$kaydet = $ekle -> execute(array(
		'personel_ad_soyad'=>htmlspecialchars($_POST['personel_ad_soyad']),
		'personel_maas'=>htmlspecialchars($_POST['personel_maas']),
		'departman'=>htmlspecialchars($_POST['departman']),
		'personel_adres'=>htmlspecialchars($_POST['personel_adres']),
		'personel_tel'=>htmlspecialchars($_POST['personel_tel']),
		'personel_resim'=>$yuklenecekResim


	));



	if ($kaydet) {
		header("location:personeller.php?personeldurum=personeleklendi");

	}else{
		header("location:sayfa.php?sayfa=personelekle");
	}


}

if (isset($_POST['personelduzenle'])) {

	$personel_id = htmlspecialchars($_POST['personel_id']);
		if ($_FILES['personel_resim']   ["size"]>0) {
   if (!file_exists('resimler')) {
      mkdir('resimler');
   }
      $dizin ="resimler/";
      $yuklenecekResim = $dizin.$_FILES['personel_resim']['name'];

      if (move_uploaded_file($_FILES['personel_resim']['tmp_name'], $yuklenecekResim)) {

      }else{
         echo $_FILES['personel_resim']['error'];
      }

	$guncelle = $db -> prepare("update personeller set personel_ad_soyad=:personel_ad_soyad,  departman=:departman, personel_maas=:personel_maas, personel_adres=:personel_adres, personel_resim=:personel_resim, personel_tel=:personel_tel, durum=:durum  where personel_id=$personel_id");

	$update = $guncelle -> execute(array(
		'personel_ad_soyad'=>htmlspecialchars($_POST['personel_ad_soyad']),
		'departman'=>htmlspecialchars($_POST['departman']),
		'personel_maas'=>htmlspecialchars($_POST['personel_maas']),
		'personel_adres'=>htmlspecialchars($_POST['personel_adres']),
		'personel_tel'=>htmlspecialchars($_POST['personel_tel']),
		'durum'=>htmlspecialchars($_POST['durum']),
		'personel_resim'=>$yuklenecekResim


	));

 	if ($update) {
		header("location:personeller.php?personeldurum=personelguncellendi");

	}else{
		header("location:sayfa.php?sayfa=personelduzenle");
	}
		}

		else{
				$guncelle = $db -> prepare("update personeller set personel_ad_soyad=:personel_ad_soyad,  departman=:departman, personel_maas=:personel_maas, personel_adres=:personel_adres,personel_tel=:personel_tel, durum=:durum  where personel_id=$personel_id");

	$update = $guncelle -> execute(array(
		'personel_ad_soyad'=>htmlspecialchars($_POST['personel_ad_soyad']),
		'departman'=>htmlspecialchars($_POST['departman']),
		'personel_maas'=>htmlspecialchars($_POST['personel_maas']),
		'personel_adres'=>htmlspecialchars($_POST['personel_adres']),
		'personel_tel'=>htmlspecialchars($_POST['personel_tel']),
		'durum'=>htmlspecialchars($_POST['durum'])


	));
		if ($update) {
		header("location:personeller.php?personeldurum=personelguncellendi");

	}else{
		header("location:sayfa.php?sayfa=personelduzenle");
	}
		}


}


if (isset($_GET['personel_id'])) {
	$personel_id = $_GET['personel_id'];
	$del = $db -> prepare("DELETE from personeller where personel_id = ?");

	$del -> execute(array($personel_id));

	if ($del) {
		header("Refresh:1; url=personeller.php?silindi");

	}else{
		header("location:personeller.php");
	}


}

if (isset($_POST['borcekle'])) {

	$ekle = $db -> prepare("insert into borclar set borc_tutar=:borc_tutar, borc_aciklama=:borc_aciklama, alinan_zaman=:alinan_zaman, verilecek_zaman=:verilecek_zaman");

	$kaydet = $ekle -> execute(array(
		'borc_tutar'=>htmlspecialchars($_POST['borc_tutar']),
		'borc_aciklama'=>htmlspecialchars($_POST['borc_aciklama']),
		'alinan_zaman'=>htmlspecialchars($_POST['alinan_zaman']),
		'verilecek_zaman'=>htmlspecialchars($_POST['verilecek_zaman'])

	));

	if ($kaydet) {
		header("location:borc.php?borcdurum=borceklendi");

	}else{
		header("location:sayfa.php?sayfa=borcekle");
	}


}


if (isset($_POST['borcduzenle'])) {
	$borc_id = htmlspecialchars($_POST['borc_id']);
	$guncelle = $db -> prepare("update borclar set borc_tutar=:borc_tutar,  borc_aciklama=:borc_aciklama, alinan_zaman=:alinan_zaman, verilecek_zaman=:verilecek_zaman, durum=:durum where borc_id=$borc_id");

	$update = $guncelle -> execute(array(
		'borc_tutar'=>htmlspecialchars($_POST['borc_tutar']),
		'borc_aciklama'=>htmlspecialchars($_POST['borc_aciklama']),
		'alinan_zaman'=>htmlspecialchars($_POST['alinan_zaman']),
		'verilecek_zaman'=>htmlspecialchars($_POST['verilecek_zaman']),
		'durum'=>htmlspecialchars($_POST['durum'])

	));

	if ($update) {
		header("location:borc.php?borcdurum=borcup");

	}else{
		header("location:sayfa.php?sayfa=borcduzenle");
	}


}

if (isset($_GET['borc_id'])) {
	$borc_id = $_GET['borc_id'];
	$del = $db -> prepare("DELETE from borclar where borc_id = ?");

	$del -> execute(array($borc_id));

	if ($del) {
		header("Refresh:1; url=borc.php?silindi");

	}else{
		header("location:borc.php");
	}


}


if (isset($_POST['alacakekle'])) {

	$ekle = $db -> prepare("insert into alacaklar set alacak_tutar=:alacak_tutar, alacak_aciklama=:alacak_aciklama, alinacak_zaman=:alinacak_zaman, verilen_zaman=:verilen_zaman");

	$kaydet = $ekle -> execute(array(
		'alacak_tutar'=>htmlspecialchars($_POST['alacak_tutar']),
		'alacak_aciklama'=>htmlspecialchars($_POST['alacak_aciklama']),
		'alinacak_zaman'=>htmlspecialchars($_POST['alinacak_zaman']),
		'verilen_zaman'=>htmlspecialchars($_POST['verilen_zaman'])

	));

	if ($kaydet) {
		header("location:alacak.php?alacakdurum=alacakeklendi");

	}else{
		header("location:sayfa.php?sayfa=alacakekle");
	}


}

if (isset($_POST['alacakduzenle'])) {
	$alacak_id = htmlspecialchars($_POST['alacak_id']);
	$guncelle = $db -> prepare("update alacaklar set alacak_tutar=:alacak_tutar,  alacak_aciklama=:alacak_aciklama, alinacak_zaman=:alinacak_zaman, verilen_zaman=:verilen_zaman, durum=:durum where alacak_id=$alacak_id");

	$update = $guncelle -> execute(array(
		'alacak_tutar'=>htmlspecialchars($_POST['alacak_tutar']),
		'alacak_aciklama'=>htmlspecialchars($_POST['alacak_aciklama']),
		'alinacak_zaman'=>htmlspecialchars($_POST['alinacak_zaman']),
		'verilen_zaman'=>htmlspecialchars($_POST['verilen_zaman']),
		'durum'=>htmlspecialchars($_POST['durum'])

	));

	if ($update) {
		header("location:alacak.php?alacakdurum=alacakup");

	}else{
		header("location:sayfa.php?sayfa=alacakduzenle");
	}


}

if (isset($_GET['alacak_id'])) {
	$alacak_id = $_GET['alacak_id'];
	$del = $db -> prepare("DELETE from alacaklar where alacak_id = ?");

	$del -> execute(array($alacak_id));

	if ($del) {
		header("Refresh:1; url=alacak.php?silindi");

	}else{
		header("location:alacak.php");
	}


}



if (isset($_POST['kategoriekle'])) {

	$ekle = $db -> prepare("insert into kategoriler set kategori_ad=:kategori_ad, kategori_sira=:kategori_sira");

	$kaydet = $ekle -> execute(array(
		'kategori_ad'=>htmlspecialchars($_POST['kategori_ad']),
		'kategori_sira'=>htmlspecialchars($_POST['kategori_sira'])

	));

	if ($kaydet) {
		header("location:kategoriler.php?kategoridurum=kategorieklendi");

	}else{
		header("location:kategoriler.php?kategoridurum=kategorieklenemedi");
	}


}


if (isset($_POST['kategoriduzenle'])) {
    $kategori_id = htmlspecialchars($_POST['kategori_id']);
    $guncelle = $db -> prepare("update kategoriler set kategori_ad=:kategori_ad,  kategori_sira=:kategori_sira where kategori_id=$kategori_id");

    $update = $guncelle -> execute(array(
        'kategori_ad'=>htmlspecialchars($_POST['kategori_ad']),
        'kategori_sira'=>htmlspecialchars($_POST['kategori_sira'])

    ));

    if ($update) {
        header("location:kategoriler.php?kategoridurum=kategoriup");

    }else{
        header("location:sayfa.php?sayfa=kategoriduzenle");
    }


}

if (isset($_GET['kategori_id'])) {
	$kategori_id = $_GET['kategori_id'];
	$del = $db -> prepare("DELETE from kategoriler where kategori_id = ?");

	$del -> execute(array($kategori_id));

	if ($del) {
		header("Refresh:1; url=kategoriler.php?silindi");

	}else{
		header("location:kategoriler.php");
	}


}


if (isset($_POST['departmanekle'])) {

    $ekle = $db -> prepare("insert into departmanlar set departman_ad=:departman_ad");

    $kaydet = $ekle -> execute(array(
        'departman_ad'=>htmlspecialchars($_POST['departman_ad'])

    ));

    if ($kaydet) {
        header("location:departmanlar.php?departmandurum=departmaneklendi");

    }else{
        header("location:departmanlar.php?departmandurum=departmaneklenemedi");
    }


}


if (isset($_POST['departmanduzenle'])) {
    $departman_id = htmlspecialchars($_POST['departman_id']);
      $guncelle = $db -> prepare("update departmanlar set departman_ad=:departman_ad where departman_id=$departman_id");

    $update = $guncelle -> execute(array(
    	"departman_ad"=>htmlspecialchars($_POST['departman_ad'])
    ));

    if ($update) {
        header("location:departmanlar.php?departmandurum=departmanup");

    }else{
        header("location:departmanlar.php");
    }


}

if (isset($_GET['departman_id'])) {
	$departman_id = $_GET['departman_id'];
	$del = $db -> prepare("DELETE from departmanlar where departman_id = ?");

	$del -> execute(array($departman_id));

	if ($del) {
		header("Refresh:1; url=departmanlar.php?silindi");

	}else{
		header("location:departmanlar.php");
	}


}

if (isset($_POST['urunkategoriekle'])) {

    $ekle = $db -> prepare("insert into urun_kategori set kategori_ad=:kategori_ad, kategori_sira=:kategori_sira");

    $kaydet = $ekle -> execute(array(
        'kategori_ad'=>htmlspecialchars($_POST['kategori_ad']),
        'kategori_sira'=>htmlspecialchars($_POST['kategori_sira']),

    ));

    if ($kaydet) {
        header("location:urun_kategori.php?urunkategoridurum=urunkategorieklendi");

    }else{
        header("location:urun_kategori.php?urunkategoridurum=urunkategorieklenemedi");
    }


}


if (isset($_POST['urunkategoriduzenle'])) {
    $kategori_id = htmlspecialchars($_POST['kategori_id']);
    $guncelle = $db -> prepare("update urun_kategori set kategori_ad=:kategori_ad, kategori_sira=:kategori_sira, kategori_durum=:kategori_durum where kategori_id=$kategori_id");

    $update = $guncelle -> execute(array(
        'kategori_ad'=>htmlspecialchars($_POST['kategori_ad']),
        'kategori_sira'=>htmlspecialchars($_POST['kategori_sira']),
        'kategori_durum'=>htmlspecialchars($_POST['kategori_durum'])

    ));

    if ($update) {
        header("location:urun_kategori.php?urunkategoridurum=urunkategoriup");

    }else{
        header("location:urun_kategori.php?sayfa=urunkategoriduzenle");
    }


}

if (isset($_GET['kategori_id'])) {
	$kategori_id = $_GET['kategori_id'];
	$del = $db -> prepare("DELETE from urun_kategori where kategori_id = ?");

	$del -> execute(array($kategori_id));

	if ($del) {
		header("Refresh:1; url=urun_kategori.php?silindi");

	}else{
		header("location:urun_kategori.php");
	}


}

if (isset($_POST['urunekle'])) {

	if (!file_exists('resimler/urunler')) {
		mkdir('resimler/urunler');
	}
		$dizin ="resimler/urunler/";
		$yuklenecekResim = $dizin.$_FILES['urun_resim']['name'];

		if (move_uploaded_file($_FILES['urun_resim']['tmp_name'], $yuklenecekResim)) {
		}else{
			echo $_FILES['urun_resim']['error'];
		}

    $ekle = $db -> prepare("insert into urunler set urun_ad=:urun_ad,   urun_fiyat=:urun_fiyat, urun_stok=:urun_stok, urun_sira=:urun_sira, kategori=:kategori, urun_marka=:urun_marka, urun_resim=:urun_resim, seri_no=:seri_no");

    $kaydet = $ekle -> execute(array(
        'urun_ad'=>htmlspecialchars($_POST['urun_ad']),
        'urun_fiyat'=>htmlspecialchars($_POST['urun_fiyat']),
        'urun_stok'=>htmlspecialchars($_POST['urun_stok']),
        'urun_sira'=>htmlspecialchars($_POST['urun_sira']),
        'urun_marka'=>htmlspecialchars($_POST['urun_marka']),
        'seri_no'=>htmlspecialchars($_POST['seri_no']),
        'kategori'=>htmlspecialchars($_POST['kategori']),

        'urun_resim'=>$yuklenecekResim

    ));

    if ($kaydet) {
        header("location:urunler.php?urundurum=uruneklendi");

    }else{
        header("location:urunler.php");

    }


}

if (isset($_POST['urunduzenle'])) {

   $urun_id=htmlspecialchars($_POST['urun_id']);

   if ($_FILES['urun_resim']["size"]>0) {
   if (!file_exists('resimler/urunler')) {
		mkdir('resimler/urunler');
	}
		$dizin ="resimler/urunler/";
		$yuklenecekResim = $dizin.$_FILES['urun_resim']['name'];

		if (move_uploaded_file($_FILES['urun_resim']['tmp_name'], $yuklenecekResim)) {
		}else{
			echo $_FILES['urun_resim']['error'];
		}

    $guncelle = $db -> prepare("update urunler set urun_ad=:urun_ad,  urun_fiyat=:urun_fiyat, urun_stok=:urun_stok, urun_sira=:urun_sira, kategori=:kategori, urun_aciklama=:urun_aciklama, urun_marka=:urun_marka, seri_no=:seri_no, urun_resim=:urun_resim, urun_durum=:urun_durum where urun_id=$urun_id");

    $update = $guncelle -> execute(array(
        'urun_ad'=>htmlspecialchars($_POST['urun_ad']),
        'urun_fiyat'=>htmlspecialchars($_POST['urun_fiyat']),
        'urun_stok'=>htmlspecialchars($_POST['urun_stok']),
        'urun_sira'=>htmlspecialchars($_POST['urun_sira']),
        'urun_marka'=>htmlspecialchars($_POST['urun_marka']),
        'seri_no'=>htmlspecialchars($_POST['seri_no']),
        'kategori'=>htmlspecialchars($_POST['kategori']),
        'urun_aciklama'=>htmlspecialchars($_POST['urun_aciklama']),
        'urun_durum'=>htmlspecialchars($_POST['urun_durum']),
        'urun_resim'=>$yuklenecekResim

    ));

    if ($update) {
        header("location:urunler.php?urundurum=urunup");

    }else{
        header("location:urunler.php");

    }

}

else{


	    $guncelle = $db -> prepare("update urunler set urun_ad=:urun_ad,  urun_fiyat=:urun_fiyat, urun_stok=:urun_stok, urun_sira=:urun_sira, kategori=:kategori, urun_aciklama=:urun_aciklama, urun_marka=:urun_marka, seri_no=:seri_no, urun_durum=:urun_durum where urun_id=$urun_id");

    $update = $guncelle -> execute(array(
        'urun_ad'=>htmlspecialchars($_POST['urun_ad']),
        'urun_fiyat'=>htmlspecialchars($_POST['urun_fiyat']),
        'urun_stok'=>htmlspecialchars($_POST['urun_stok']),
        'urun_sira'=>htmlspecialchars($_POST['urun_sira']),
        'urun_marka'=>htmlspecialchars($_POST['urun_marka']),
        'seri_no'=>htmlspecialchars($_POST['seri_no']),
        'kategori'=>htmlspecialchars($_POST['kategori']),
        'urun_aciklama'=>htmlspecialchars($_POST['urun_aciklama']),
        'urun_durum'=>htmlspecialchars($_POST['urun_durum'])

    ));

     if ($update) {
        header("location:urunler.php?urundurum=urunup");

    }else{
        header("location:urunler.php");

    }

}



}

if (isset($_GET['urun_id'])) {
	$urun_id = $_GET['urun_id'];
	$del = $db -> prepare("DELETE from urunler where urun_id = ?");

	$del -> execute(array($urun_id));

	if ($del) {
		header("Refresh:1; url=urunler.php?silindi");

	}else{
		header("location:urunler.php");
	}


}



if (isset($_POST['cariekle'])) {



    $ekle = $db -> prepare("insert into cariler set cari_adSoyad=:cari_adSoyad,  cari_mail=:cari_mail, cari_tel=:cari_tel, cari_mukellef=:cari_mukellef, cari_adres=:cari_adres, cari_il=:cari_il, cari_ilce=:cari_ilce, cari_vergiNo=:cari_vergiNo, cari_vergiDairesi=:cari_vergiDairesi");

    $kaydet = $ekle -> execute(array(
        'cari_adSoyad'=>htmlspecialchars($_POST['cari_adSoyad']),
        'cari_mail'=>htmlspecialchars($_POST['cari_mail']),
        'cari_tel'=>htmlspecialchars($_POST['cari_tel']),
        'cari_mukellef'=>htmlspecialchars($_POST['cari_mukellef']),
        'cari_adres'=>htmlspecialchars($_POST['cari_adres']),
        'cari_il'=>htmlspecialchars($_POST['cari_il']),
        'cari_ilce'=>htmlspecialchars($_POST['cari_ilce']),
        'cari_vergiNo'=>htmlspecialchars($_POST['cari_vergiNo']),
        'cari_vergiDairesi'=>htmlspecialchars($_POST['cari_vergiDairesi'])

    ));

    if ($kaydet) {
        header("location:cariler.php?caridurum=carieklendi");

    }else{
        header("location:cariler.php");

    }


}

if (isset($_POST['cariduzenle'])) {

   $cari_id = htmlspecialchars($_POST['cari_id']);

    $guncelle = $db -> prepare("update cariler set cari_adSoyad=:cari_adSoyad,  cari_mail=:cari_mail, cari_tel=:cari_tel, cari_mukellef=:cari_mukellef, cari_adres=:cari_adres, cari_il=:cari_il, cari_ilce=:cari_ilce, cari_vergiNo=:cari_vergiNo, cari_vergiDairesi=:cari_vergiDairesi, cari_durum=:cari_durum where cari_id=$cari_id");

    $update = $guncelle -> execute(array(
        'cari_adSoyad'=>htmlspecialchars($_POST['cari_adSoyad']),
        'cari_mail'=>htmlspecialchars($_POST['cari_mail']),
        'cari_tel'=>htmlspecialchars($_POST['cari_tel']),
        'cari_mukellef'=>htmlspecialchars($_POST['cari_mukellef']),
        'cari_adres'=>htmlspecialchars($_POST['cari_adres']),
        'cari_il'=>htmlspecialchars($_POST['cari_il']),
        'cari_ilce'=>htmlspecialchars($_POST['cari_ilce']),
        'cari_vergiNo'=>htmlspecialchars($_POST['cari_vergiNo']),
        'cari_vergiDairesi'=>htmlspecialchars($_POST['cari_vergiDairesi']),
        'cari_durum'=>htmlspecialchars($_POST['cari_durum'])


    ));

    if ($update) {
        header("location:cariler.php?caridurum=cariguncellendi");

    }else{
        header("location:cariler.php");

    }


}

if (isset($_GET['cari_id'])) {
	$cari_id = $_GET['cari_id'];
	$del = $db -> prepare("DELETE from cariler where cari_id = ?");

	$del -> execute(array($cari_id));

	if ($del) {
		header("Refresh:1; url=cariler.php?silindi");

	}else{
		header("location:cariler.php");
	}


}


if (isset($_POST['kargoekle'])) {



    $ekle = $db -> prepare("insert into kargo set kargo_ad=:kargo_ad,  kargo_mail=:kargo_mail, kargo_tel=:kargo_tel,  kargo_adres=:kargo_adres");

    $kaydet = $ekle -> execute(array(
        'kargo_ad'=>htmlspecialchars($_POST['kargo_ad']),
        'kargo_mail'=>htmlspecialchars($_POST['kargo_mail']),
        'kargo_tel'=>htmlspecialchars($_POST['kargo_tel']),
        'kargo_adres'=>htmlspecialchars($_POST['kargo_adres'])

    ));

    if ($kaydet) {
        header("location:kargo.php?kargodurum=kargoeklendi");

    }else{
        header("location:kargo.php");

    }


}



if (isset($_POST['kargoduzenle'])) {

   $kargo_id = htmlspecialchars($_POST['kargo_id']);

    $guncelle = $db -> prepare("update kargo set kargo_ad=:kargo_ad,  kargo_mail=:kargo_mail, kargo_tel=:kargo_tel,  kargo_adres=:kargo_adres, kargo_durum=:kargo_durum where kargo_id=$kargo_id");

    $update = $guncelle -> execute(array(
        'kargo_ad'=>htmlspecialchars($_POST['kargo_ad']),
        'kargo_mail'=>htmlspecialchars($_POST['kargo_mail']),
        'kargo_tel'=>htmlspecialchars($_POST['kargo_tel']),
        'kargo_adres'=>htmlspecialchars($_POST['kargo_adres']),
        'kargo_durum'=>htmlspecialchars($_POST['kargo_durum'])


    ));

    if ($update) {
        header("location:kargo.php?kargodurum=kargoguncellendi");

    }else{
        header("location:kargo.php");

    }


}

if (@$_GET['kargosil']) {
    $sil = $db -> prepare("delete from kargo where kargo_id=:kargo_id");

    $delete = $sil -> execute(array("kargo_id"=>$_GET['kargo_id']));

    if ($delete) {
        header("location:kargo.php?kargodurum=kargodel");

    }else{
        header("location:kargo.php");
    }


}

if (isset($_POST['aracekle'])) {


if (!file_exists('resimler/soforler')) {
		mkdir('resimler/soforler');
	}
		$dizin ="resimler/soforler/";
		$yuklenecekResim = $dizin.$_FILES['sofor_resim']['name'];

		if (move_uploaded_file($_FILES['sofor_resim']['tmp_name'], $yuklenecekResim)) {
		}else{
			echo $_FILES['sofor_resim']['error'];
		}


    $ekle = $db -> prepare("insert into araclar set arac_sofor=:arac_sofor,  arac_plaka=:arac_plaka, arac_tel=:arac_tel,  arac_firma=:arac_firma, sofor_resim=:sofor_resim");

    $kaydet = $ekle -> execute(array(
        'arac_sofor'=>htmlspecialchars($_POST['arac_sofor']),
        'arac_plaka'=>htmlspecialchars($_POST['arac_plaka']),
        'arac_firma'=>htmlspecialchars($_POST['arac_firma']),
        'arac_tel'=>htmlspecialchars($_POST['arac_tel']),
        'sofor_resim'=>$yuklenecekResim

    ));

    if ($kaydet) {
        header("location:araclar.php?aracdurum=araceklendi");

    }else{
        header("location:araclar.php");

    }



}






if (isset($_POST['aracduzenle'])) {

   $arac_id = htmlspecialchars($_POST['arac_id']);

    if ($_FILES['sofor_resim']["size"]>0) {

    	if (!file_exists('resimler/soforler')) {
    		mkdir('resimler/soforler');
				}
    		$dizin = "resimler/soforler/";

    		$yuklenecekResim = $dizin.$_FILES['sofor_resim']['name'];


    		if (move_uploaded_file($_FILES['sofor_resim']['tmp_name'], $yuklenecekResim)) {

    		}else{
    			echo $_FILES['sofor_resim']['error'];
    		}


    $guncelle = $db -> prepare("update araclar set arac_sofor=:arac_sofor,  arac_plaka=:arac_plaka, arac_tel=:arac_tel,  arac_firma=:arac_firma, sofor_resim=:sofor_resim, arac_durum=:arac_durum where arac_id=$arac_id");

    $update = $guncelle -> execute(array(
        'arac_sofor'=>htmlspecialchars($_POST['arac_sofor']),
        'arac_plaka'=>htmlspecialchars($_POST['arac_plaka']),
        'arac_tel'=>htmlspecialchars($_POST['arac_tel']),
        'arac_firma'=>htmlspecialchars($_POST['arac_firma']),
        'arac_durum'=>htmlspecialchars($_POST['arac_durum']),
        'sofor_resim'=>$yuklenecekResim


    ));

    if ($update) {
        header("location:araclar.php?aracdurum=aracguncellendi");

    }else{
        header("location:araclar.php");

    }
      }

      else{

    $guncelle = $db -> prepare("update araclar set arac_sofor=:arac_sofor,  arac_plaka=:arac_plaka, arac_tel=:arac_tel,  arac_firma=:arac_firma, arac_durum=:arac_durum where arac_id=$arac_id");

    $update = $guncelle -> execute(array(
        'arac_sofor'=>htmlspecialchars($_POST['arac_sofor']),
        'arac_plaka'=>htmlspecialchars($_POST['arac_plaka']),
        'arac_tel'=>htmlspecialchars($_POST['arac_tel']),
        'arac_firma'=>htmlspecialchars($_POST['arac_firma']),
        'arac_durum'=>htmlspecialchars($_POST['arac_durum'])


    ));
       if ($update) {
        header("location:araclar.php?aracdurum=aracguncellendi");

    }else{
        header("location:araclar.php");

    }
      }


}



if (isset($_GET['arac_id'])) {
	$arac_id = $_GET['arac_id'];
	$del = $db -> prepare("DELETE from araclar where arac_id = ?");

	$del -> execute(array($arac_id));

	if ($del) {
		header("Refresh:1; url=araclar.php?silindi");

	}else{
		header("location:araclar.php");
	}


}

if (isset($_POST['satisekle'])) {



    $ekle = $db -> prepare("insert into satislar set urunsatis=:urunsatis,  personel=:personel, cari=:cari,  siparis_no=:siparis_no, siparis_aciklama=:siparis_aciklama, satis_odeme=:satis_odeme,  satis_fiyat=:satis_fiyat, siparis_durum=:siparis_durum, adet=:adet");

    $kaydet = $ekle -> execute(array(

        'urunsatis'=>htmlspecialchars($_POST['urunsatis']),
        'personel'=>htmlspecialchars($_POST['personel']),
        'cari'=>htmlspecialchars($_POST['cari']),
        'siparis_no'=>htmlspecialchars($_POST['siparis_no']),
        'siparis_aciklama'=>htmlspecialchars($_POST['siparis_aciklama']),
        'satis_odeme'=>htmlspecialchars($_POST['satis_odeme']),
        'satis_fiyat'=>htmlspecialchars($_POST['satis_fiyat']),
				'adet'=>htmlspecialchars($_POST['adet']),
        'siparis_durum'=>htmlspecialchars($_POST['siparis_durum'])

    ));

    if ($kaydet) {
        header("location:satislar.php?satisdurum=satiseklendi");

    }else{
        header("location:satislar.php");

    }


}

if (isset($_POST['satisduzenle'])) {

   $satis_id = htmlspecialchars($_POST['satis_id']);
   $guncelle = $db -> prepare("UPDATE satislar set urunsatis=:urunsatis,  personel=:personel, cari=:cari,  siparis_no=:siparis_no, siparis_aciklama=:siparis_aciklama, satis_odeme=:satis_odeme, satis_fiyat=:satis_fiyat, siparis_durum=:siparis_durum, adet=:adet where satis_id=$satis_id");

    $update = $guncelle -> execute(array(
        'urunsatis'=>htmlspecialchars($_POST['urunsatis']),
        'personel'=>htmlspecialchars($_POST['personel']),
        'cari'=>htmlspecialchars($_POST['cari']),
        'siparis_no'=>htmlspecialchars($_POST['siparis_no']),
        'siparis_aciklama'=>htmlspecialchars($_POST['siparis_aciklama']),
        'satis_odeme'=>htmlspecialchars($_POST['satis_odeme']),
        'satis_fiyat'=>htmlspecialchars($_POST['satis_fiyat']),
				'adet'=>htmlspecialchars($_POST['adet']),
        'siparis_durum'=>htmlspecialchars($_POST['siparis_durum'])


    ));

    if ($update) {
        header("location:satislar.php?satisdurum=satisguncellendi");

    }else{
        header("location:satislar.php");

    }


}

if (isset($_GET['satis_id'])) {
	$satis_id = $_GET['satis_id'];
	$del = $db -> prepare("DELETE from satislar where satis_id = ?");

	$del -> execute(array($satis_id));

	if ($del) {
		header("Refresh:1; url=satislar.php?silindi");

	}else{
		header("location:satislar.php");
	}


}


if (isset($_POST['markaekle'])) {

    $ekle = $db -> prepare("insert into markalar set marka_ad=:marka_ad, marka_tel=:marka_tel, marka_adres=:marka_adres");

    $kaydet = $ekle -> execute(array(
        'marka_ad'=>htmlspecialchars($_POST['marka_ad']),
        'marka_tel'=>htmlspecialchars($_POST['marka_tel']),
        'marka_adres'=>htmlspecialchars($_POST['marka_adres'])

    ));

    if ($kaydet) {
        header("location:markalar.php?markadurum=markaeklendi");

    }else{
        header("location:markalar.php?markadurum=markaeklenemedi");
    }


}


if (isset($_POST['markaduzenle'])) {
    $marka_id = htmlspecialchars($_POST['marka_id']);
      $guncelle = $db -> prepare("update markalar set marka_ad=:marka_ad, marka_tel=:marka_tel, marka_adres=:marka_adres, marka_durum=:marka_durum where marka_id=$marka_id");

    $update = $guncelle -> execute(array(
       'marka_ad'=>htmlspecialchars($_POST['marka_ad']),
        'marka_tel'=>htmlspecialchars($_POST['marka_tel']),
        'marka_adres'=>htmlspecialchars($_POST['marka_adres']),
        'marka_durum'=>htmlspecialchars($_POST['marka_durum'])

    ));

    if ($update) {
        header("location:markalar.php?markadurum=markaup");

    }else{
        header("location:markalar.php");
    }


}

if (isset($_GET['marka_id'])) {
	$marka_id = $_GET['marka_id'];
	$del = $db -> prepare("DELETE from markalar where marka_id = ?");

	$del -> execute(array($marka_id));

	if ($del) {
		header("Refresh:1; url=markalar.php?silindi");

	}else{
		header("location:markalar.php");
	}


}

if (isset($_POST['posekle'])) {

    $ekle = $db -> prepare("insert into pos set pos_marka=:pos_marka, pos_tel=:pos_tel, pos_adres=:pos_adres, pos_terminal=:pos_terminal, pos_seri=:pos_seri");

    $kaydet = $ekle -> execute(array(
        'pos_marka'=>htmlspecialchars($_POST['pos_marka']),
        'pos_tel'=>htmlspecialchars($_POST['pos_tel']),
        'pos_adres'=>htmlspecialchars($_POST['pos_adres']),
        'pos_terminal'=>htmlspecialchars($_POST['pos_terminal']),
        'pos_seri'=>htmlspecialchars($_POST['pos_seri'])

    ));

    if ($kaydet) {
        header("location:pos.php?posdurum=poseklendi");

    }else{
        header("location:pos.php?posdurum=poseklenemedi");
    }


}


if (isset($_POST['posduzenle'])) {
    $pos_id = htmlspecialchars($_POST['pos_id']);
      $guncelle = $db -> prepare("update pos set pos_marka=:pos_marka, pos_tel=:pos_tel, pos_adres=:pos_adres, pos_terminal=:pos_terminal, pos_seri=:pos_seri, pos_aciklama=:pos_aciklama, pos_durum=:pos_durum where pos_id=$pos_id");

    $update = $guncelle -> execute(array(
       'pos_marka'=>htmlspecialchars($_POST['pos_marka']),
        'pos_tel'=>htmlspecialchars($_POST['pos_tel']),
        'pos_adres'=>htmlspecialchars($_POST['pos_adres']),
        'pos_terminal'=>htmlspecialchars($_POST['pos_terminal']),
        'pos_seri'=>htmlspecialchars($_POST['pos_seri']),
        'pos_durum'=>htmlspecialchars($_POST['pos_durum']),
        'pos_aciklama'=>htmlspecialchars($_POST['pos_aciklama'])

    ));

    if ($update) {
        header("location:pos.php?posdurum=posguncellendi");

    }else{
        header("location:pos.php");
    }


}

if (isset($_GET['pos_id'])) {
	$pos_id = $_GET['pos_id'];
	$del = $db -> prepare("DELETE from pos where pos_id = ?");

	$del -> execute(array($pos_id));

	if ($del) {
		header("Refresh:1; url=pos.php?silindi");

	}else{
		header("location:pos.php");
	}


}

if (isset($_POST['bankaekle'])) {

    $ekle = $db -> prepare("insert into banka set banka_ad=:banka_ad, banka_hesap_sahibi=:banka_hesap_sahibi, banka_iban=:banka_iban");

    $kaydet = $ekle -> execute(array(
        'banka_ad'=>htmlspecialchars($_POST['banka_ad']),
        'banka_hesap_sahibi'=>htmlspecialchars($_POST['banka_hesap_sahibi']),
        'banka_iban'=>htmlspecialchars($_POST['banka_iban'])

    ));

    if ($kaydet) {
        header("location:banka.php?bankadurum=bankaeklendi");

    }else{
        header("location:banka.php");
    }


}


if (isset($_POST['bankaduzenle'])) {
    $banka_id = htmlspecialchars($_POST['banka_id']);
      $guncelle = $db -> prepare("update banka set banka_ad=:banka_ad, banka_hesap_sahibi=:banka_hesap_sahibi, banka_iban=:banka_iban where banka_id=$banka_id");

    $update = $guncelle -> execute(array(
      'banka_ad'=>htmlspecialchars($_POST['banka_ad']),
        'banka_hesap_sahibi'=>htmlspecialchars($_POST['banka_hesap_sahibi']),
        'banka_iban'=>htmlspecialchars($_POST['banka_iban'])

    ));

    if ($update) {
        header("location:banka.php?bankadurum=bankaguncellendi");

    }else{
        header("location:banka.php");
    }


}

if (isset($_GET['banka_id'])) {
	$banka_id = $_GET['banka_id'];
	$del = $db -> prepare("DELETE from banka where banka_id = ?");

	$del -> execute(array($banka_id));

	if ($del) {
		header("Refresh:1; url=banka.php?silindi");

	}else{
		header("location:banka.php");
	}


}

if (isset($_POST['arizaekle'])) {

    $ekle = $db -> prepare("insert into ariza set urun=:urun, pos=:pos, aciklama=:aciklama");

    $kaydet = $ekle -> execute(array(
        'urun'=>htmlspecialchars($_POST['urun']),
        'pos'=>htmlspecialchars($_POST['pos']),
        'aciklama'=>htmlspecialchars($_POST['aciklama'])

    ));

    if ($kaydet) {
        header("location:pos.php?posdurum=arizaeklendi");

    }else{
        header("location:pos.php");
    }


}
 ?>
