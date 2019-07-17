<?php
session_start();
session_regenerate_id(true);

require("../deep/gir.php");
#temel test
if($_SESSION['admin']==md5($_SERVER['HTTP_USER_AGENT'] . "x" . $_SERVER['REMOTE_ADDR'])){
    session_regenerate_id(true);

####################################################
    //anasayfa gücenlle
if(isset($_POST['guncelleAnasayfa'])){
    $site_adi = mysqli_real_escape_string($gir,$_POST['site_adi']);
    $site_aciklamasi = mysqli_real_escape_string($gir,$_POST['site_aciklamasi']);
    $site_keyword=mysqli_real_escape_string($gir,$_POST['site_keyword']);
    $site_logo = mysqli_real_escape_string($gir,$_POST['site_logo']);
    $sol_slider_kategorisi=$_POST['sol_slider_kategorisi'];
    $sol_slider_adet = $_POST['sol_slider_adet'];
    $slider_kategorisi= $_POST['slider_kategorisi'];
    $slider_adet= $_POST['slider_adet'];
    $ichaber_kategorisi=$_POST['ichaber_kategorisi'];
    $son_slider_kategorisi=$_POST['son_slider_kategorisi'];
    $son_slider_adet=$_POST['son_slider_adet'];
    $yatay_haberler_kategorisi=$_POST['yatay_haberler_kategorisi'];
    $yatay_haberler_adet=$_POST['yatay_haberler_adet'];

    $sql = "UPDATE site_bilgisi SET site_adi='$site_adi',site_aciklamasi='$site_aciklamasi',site_keyword='$site_keyword',site_logo='$site_logo',sol_slider_kategorisi='$sol_slider_kategorisi',sol_slider_adet='$sol_slider_adet',slider_kategorisi='$slider_kategorisi',slider_adet='$slider_adet',ichaber_kategorisi='$ichaber_kategorisi',son_slider_kategorisi='$son_slider_kategorisi',son_slider_adet='$son_slider_adet',yatay_haberler_kategorisi='$yatay_haberler_kategorisi',yatay_haberler_adet='$yatay_haberler_adet' WHERE id=1";
    $gir->query($sql);
    header('location: welcome.php');
}

#####################################################
    // kategori ekle 
if(isset($_POST['katEkle'])){
    $katAdi = mysqli_real_escape_string($gir,$_POST['katAdi']);
    $sql = "INSERT INTO site_kategori (kategori_adi) VALUES ('$katAdi')";
    $gir->query($sql);
    header('location: welcome.php');
}
    // kategori güncelle
if(isset($_POST['katDuzenle'])){
    $duzenlenecek_kat_id = $_POST['duzenlenecek_kat'];
    $yeni_kat_adi =  mysqli_real_escape_string($gir,$_POST['yeniKat_adi']);
    $sql = $sql = "UPDATE site_kategori SET kategori_adi='$yeni_kat_adi' WHERE id='$duzenlenecek_kat_id' ";
    $gir->query($sql);
    header('location: welcome.php');
}    
    // kategori sil
if(isset($_POST['silKat'])){
    $silinecekKat = $_POST['silinecekKat'];
    $sql = "DELETE FROM site_kategori WHERE id='$silinecekKat' ";
    $gir->query($sql);
    header('location: welcome.php');
}

#######################################################
    //menü ekle
if(isset($_POST['menuEkle'])){
    $menuAdi =  mysqli_real_escape_string($gir,$_POST['menuAdi']);
    $menuBagKat = $_POST['menuBagKat'];
    $menuIcon = $_POST['menuIcon'];
    $sql = "INSERT INTO site_menu (ikon,bagli_kategori,menu_adi) VALUES ('$menuIcon','$menuBagKat','$menuAdi')";
    $gir->query($sql);
    header('location: welcome.php');
}
    //menu yönlendir
if(isset($_POST['menuYonlendir'])){
    $yonlendirilecekMenu = $_POST['yonlendirilecekMenu'];
    $yonlenecekKat = $_POST['yonlenecekKat'];
    $sql = $sql = "UPDATE site_menu SET bagli_kategori='$yonlenecekKat' WHERE id='$yonlendirilecekMenu' ";
    $gir->query($sql);
    header('location: welcome.php');
}
    //menu sil
if(isset($_POST['silMenu'])){
    $silinecekMenu = $_POST['silinecekMenu'];
    $sql = "DELETE FROM site_menu WHERE id='$silinecekMenu' ";
    $gir->query($sql);
    header('location: welcome.php');
}

########################################################
    //haber ekle
if(isset($_POST['haberEkle'])){
    date_default_timezone_set('Europe/Istanbul');
    $haberTarih = date('d.m.Y H:i:s');
    $haberBaslik = mysqli_real_escape_string($gir,$_POST['haberBaslik']);
    $haberGorsel =  mysqli_real_escape_string($gir,$_POST['haberGorsel']);
    $haberIcerik = mysqli_real_escape_string($gir,$_POST['haberIcerik']);
    $haberEtiket = mysqli_real_escape_string($gir, $_POST['haberEtiket']);
    $haberKategori = $_POST['haberKategorisi'];
    

    $sql = "INSERT INTO site_icerik (icerik_baslik,icerik_icerik,icerik_tarih,icerik_etiket,icerik_resim,icerik_kategori)  VALUES ('$haberBaslik','$haberIcerik','$haberTarih','$haberEtiket','$haberGorsel','$haberKategori')";
    $gir->query($sql);
    header('location: welcome.php');
    
}
    //haber düzenle
if(isset($_POST['haberDuzenle'])){
    $haber = $_POST['haberID'];
    date_default_timezone_set('Europe/Istanbul');
    $haberTarih = date('d.m.Y H:i:s');
    $haberBaslik = mysqli_real_escape_string($gir,$_POST['haberBaslik']);
    $haberGorsel =  mysqli_real_escape_string($gir,$_POST['haberGorsel']);
    $haberIcerik = mysqli_real_escape_string($gir,$_POST['haberIcerik']);
    $haberEtiket = mysqli_real_escape_string($gir, $_POST['haberEtiket']);
    $haberKategori = $_POST['haberKategorisi'];

    $sql = "UPDATE site_icerik SET icerik_baslik='$haberBaslik', icerik_icerik='$haberIcerik',icerik_tarih='$haberTarih',icerik_etiket='$haberEtiket',icerik_resim='$haberGorsel',icerik_kategori='$haberKategori' WHERE id='$haber' ";
    $gir->query($sql);
    header('location: welcome.php');
}
    //haber sil
if(isset($_POST['haberSil'])){
    $silinecekHaber = $_POST['silinecekHaber'];
    $sql = "DELETE FROM site_icerik WHERE id='$silinecekHaber' ";
    $gir->query($sql);
    header('location: welcome.php');
}    
#########################################################
    //reklam düzenle
if(isset($_POST['reklamDegis'])){
    $rek1 = mysqli_real_escape_string($gir,$_POST['rek1']);
    $rek2 = mysqli_real_escape_string($gir,$_POST['rek2']);
    $rek3 = mysqli_real_escape_string($gir,$_POST['rek3']);

    $sql = "UPDATE site_reklam SET reklam_kodu='$rek1' WHERE id=1 ";
    $gir->query($sql);
    $sql = "UPDATE site_reklam SET reklam_kodu='$rek2' WHERE id=2 ";
    $gir->query($sql);
    $sql = "UPDATE site_reklam SET reklam_kodu='$rek3' WHERE id=3 ";
    $gir->query($sql);
    header('location: welcome.php');
}

########################################################
    //sosyal medya düzenle
if(isset($_POST['sosyalGuncelle'])){
    $facebook = mysqli_real_escape_string($gir,$_POST['facebook']);
    $twitter = mysqli_real_escape_string($gir,$_POST['twitter']);
    $instagram = mysqli_real_escape_string($gir,$_POST['instagram']);
    $youtube = mysqli_real_escape_string($gir,$_POST['youtube']);

    $sql = "UPDATE site_bilgisi SET facebook='$facebook', twitter='$twitter', instagram='$instagram', youtube='$youtube'  WHERE id=1 ";
    $gir->query($sql);
    header('location: welcome.php');
}
    // resmi sayfalar düzenle
if(isset($_POST['yasalGuncelle'])){
    $k_sozlesme = mysqli_real_escape_string($gir,$_POST['k_sozlesme']);
    $hakkimizda =  mysqli_real_escape_string($gir,$_POST['hakkimizda']);
    $iletisim = mysqli_real_escape_string($gir,$_POST['iletisim']);
    $reklam = mysqli_real_escape_string($gir, $_POST['reklam']);
    $yasal = mysqli_real_escape_string($gir,$_POST['yasal']);

    $sql = $sql = "UPDATE site_resmi SET k_sozlesme='$k_sozlesme', hakkimizda='$hakkimizda', iletisim='$iletisim', reklam='$reklam', yasal='$yasal'  WHERE id=1 ";
    $gir->query($sql);
    header('location: welcome.php');
}   



header('location:index.php');
}else{
header('location:index.php');
}#temel teste
?>